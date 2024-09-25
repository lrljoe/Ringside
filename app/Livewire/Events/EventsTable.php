<?php

declare(strict_types=1);

namespace App\Livewire\Events;

use App\Builders\EventBuilder;
use App\Models\Event;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;

class EventsTable extends DataTableComponent
{
    public function builder(): EventBuilder
    {
        return Event::query();
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setSearchPlaceholder('search events')
            ->setColumnSelectDisabled()
            ->setPaginationEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make(__('events.name'), 'name')
                ->sortable()
                ->searchable(),
            DateColumn::make(__('events.date'), 'date')
                ->sortable()
                ->searchable(),
            Column::make(__('events.status'), 'status')
                ->view('status'),
            Column::make(__('core.actions'), 'actions')
                ->label(
                    fn ($row, Column $column) => view('components.livewire.datatables.action-column')->with(
                        [
                            'viewLink' => route('events.show', $row),
                            'editLink' => route('events.edit', $row),
                            'deleteLink' => route('events.destroy', $row),
                        ]
                    )
                )->html(),
        ];
    }
}
