<?php

declare(strict_types=1);

namespace App\Livewire\Titles;

use App\Builders\TitleBuilder;
use App\Models\Title;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TitlesTable extends DataTableComponent
{
    public function builder(): TitleBuilder
    {
        return Title::query()
            ->with('activations:id,started_at')->withWhereHas('activations', function ($query) {
                $query->where('started_at', '<=', now())->whereNull('ended_at')->limit(1);
            });
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setSearchPlaceholder('search wrestlers')
            ->setColumnSelectDisabled()
            ->setPaginationEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make(__('titles.name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('titles.status'), 'status')
                ->view('status'),
            Column::make(__('activations.start_date'), 'started_at')
                ->label(fn ($row, Column $column) => $row->activations->first()->started_at->format('Y-m-d')),
            Column::make(__('core.actions'), 'actions')
                ->label(
                    fn ($row, Column $column) => view('components.livewire.datatables.action-column')->with(
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
