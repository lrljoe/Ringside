<?php

declare(strict_types=1);

namespace App\Livewire\TagTeams;

use App\Builders\TagTeamBuilder;
use App\Models\TagTeam;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TagTeamsTable extends DataTableComponent
{
    public function builder(): TagTeamBuilder
    {
        return TagTeam::query();
        // ->with('employments:id,started_at')->withWhereHas('employments', function ($query) {
        //     $query->where('started_at', '<=', now())->whereNull('ended_at')->limit(1);
        // });
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
            Column::make(__('tag-teams.name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('tag-teams.status'), 'status')
                ->view('status'),
            Column::make(__('tag-teams.combined_weight'), 'combined_weight'),
            // Column::make(__('employments.start_date'), 'started_at')
            //     ->label(fn ($row, Column $column) => $row->employments->first()->started_at->format('Y-m-d')),
            Column::make(__('core.actions'), 'actions')
                ->label(
                    fn ($row, Column $column) => view('components.livewire.datatables.action-column')->with(
                        [
                            'viewLink' => route('tag-teams.show', $row),
                            'editLink' => route('tag-teams.edit', $row),
                            'deleteLink' => route('tag-teams.destroy', $row),
                        ]
                    )
                )->html(),
        ];
    }
}
