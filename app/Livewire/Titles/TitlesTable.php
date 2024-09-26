<?php

declare(strict_types=1);

namespace App\Livewire\Titles;

use App\Builders\TitleBuilder;
use App\Livewire\Concerns\BaseTableTrait;
use App\Models\Title;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TitlesTable extends DataTableComponent
{
    use BaseTableTrait;

    protected string $databaseTableName = 'titles';

    public function configure(): void {}

    public function builder(): TitleBuilder
    {
        return Title::query()
            ->with('activations:id,started_at')->withWhereHas('activations', function ($query) {
                $query->where('started_at', '<=', now())->whereNull('ended_at')->limit(1);
            });
    }

    public function columns(): array
    {
        return [
            Column::make(__('titles.name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('titles.status'), 'status')
                ->view('tables.columns.status'),
            Column::make(__('activations.start_date'), 'started_at')
                ->label(fn ($row, Column $column) => $row->activations->first()->started_at->format('Y-m-d')),
            Column::make(__('core.actions'), 'actions')
                ->label(
                    fn ($row, Column $column) => view('tables.columns.action-column')->with(
                        [
                            'viewLink' => route('titles.show', $row),
                            'editLink' => route('titles.edit', $row),
                            'deleteLink' => route('titles.destroy', $row),
                        ]
                    )
                )->html(),
        ];
    }
}
