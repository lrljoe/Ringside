<?php

declare(strict_types=1);

namespace App\Livewire\Managers;

use App\Builders\ManagerBuilder;
use App\Models\Manager;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ManagersTable extends DataTableComponent
{
    public function builder(): ManagerBuilder
    {
        return Manager::query()
            ->with('employments:id,started_at')->withWhereHas('employments', function ($query) {
                $query->where('started_at', '<=', now())->whereNull('ended_at')->limit(1);
            });
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setSearchPlaceholder('search managers')
            ->setColumnSelectDisabled()
            ->setPaginationEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make('Name')
                ->label(fn ($row, Column $column) => ucwords($row->first_name.' '.$row->last_name))
                ->sortable(),
            Column::make(__('managers.status'), 'status')
                ->view('status'),
            Column::make(__('employments.start_date'), 'started_at')
                ->label(fn ($row, Column $column) => $row->employments->first()->started_at->format('Y-m-d')),
            Column::make(__('core.actions'), 'actions')
                ->label(
                    fn ($row, Column $column) => view('components.livewire.datatables.action-column')->with(
                        [
                            'viewLink' => route('managers.show', $row),
                            'editLink' => route('managers.edit', $row),
                            'deleteLink' => route('managers.destroy', $row),
                        ]
                    )
                )->html(),
        ];
    }
}
