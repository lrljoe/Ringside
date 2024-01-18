<?php

declare(strict_types=1);

namespace App\Http\Livewire\Events;

use App\Builders\EventBuilder;
use App\Http\Livewire\Datatable\WithSorting;
use App\Models\Event;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class EventsList extends Component
{
    use WithPagination;
    use WithSorting;

    /**
     * Determines if the filters should be shown.
     *
     * @var bool
     */
    public bool $showFilters = false;

    /**
     * Shows list of accepted filters and direction to be displayed.
     *
     * @var array<string, string>
     */
    public array $filters = [
        'search' => '',
    ];

    /**
     * Display a listing of the resource.
     */
    public function render(): View
    {
        $query = Event::query()
            ->when(
                $this->filters['search'],
                function (EventBuilder $query, string $search) {
                    $query->where('name', 'like', '%'.$search.'%');
                }
            )
            ->oldest('name');

        $query = $this->applySorting($query);

        $events = $query->paginate();

        return view('livewire.events.events-list', [
            'events' => $events,
        ]);
    }
}
