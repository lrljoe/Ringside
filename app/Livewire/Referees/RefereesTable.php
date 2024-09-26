<?php

declare(strict_types=1);

namespace App\Livewire\Referees;

use App\Builders\RefereeBuilder;
use App\Livewire\Concerns\BaseTableTrait;
use App\Models\Referee;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class RefereesTable extends DataTableComponent
{
    use BaseTableTrait;

    protected string $databaseTableName = 'referees';

    public function configure(): void {}

    public function builder(): RefereeBuilder
    {
        return Referee::query()
            ->with('employments:id,started_at')->withWhereHas('employments', function ($query) {
                $query->where('started_at', '<=', now())->whereNull('ended_at')->limit(1);
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Name')
                ->label(fn ($row, Column $column) => ucwords($row->first_name.' '.$row->last_name))
                ->sortable(),
            Column::make(__('referees.status'), 'status')
                ->view('tables.columns.status'),
            // Column::make(__('employments.start_date'), 'started_at')
            //     ->label(fn ($row, Column $column) => $row->employments->first()->started_at->format('Y-m-d')),
            Column::make(__('core.actions'), 'actions')
                ->label(
                    fn ($row, Column $column) => view('tables.columns.action-column')->with(
                        [
                            'viewLink' => route('referees.show', $row),
                            'editLink' => route('referees.edit', $row),
                            'deleteLink' => route('referees.destroy', $row),
                        ]
                    )
                )->html(),
        ];
    }
}
