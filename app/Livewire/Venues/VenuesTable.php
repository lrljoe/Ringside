<?php

declare(strict_types=1);

namespace App\Livewire\Venues;

use App\Livewire\Concerns\BaseTableTrait;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class VenuesTable extends DataTableComponent
{
    use BaseTableTrait;

    protected string $databaseTableName = "venues";

    public function configure(): void
    {
    }

    public function builder(): Builder
    {
        return Venue::query();
    }

    public function columns(): array
    {
        return [
            Column::make(__('venues.name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('venues.street_address'), 'street_address'),
            Column::make(__('venues.city'), 'city'),
            Column::make(__('venues.state'), 'state'),
            Column::make(__('venues.zipcode'), 'zipcode'),
            Column::make(__('core.actions'), 'actions')
                ->label(
                    fn ($row, Column $column) => view('tables.columns.action-column')->with(
                        [
                            'viewLink' => route('venues.show', $row),
                            'editLink' => route('venues.edit', $row),
                            'deleteLink' => route('venues.destroy', $row),
                        ]
                    )
                )->html(),
        ];
    }
}
