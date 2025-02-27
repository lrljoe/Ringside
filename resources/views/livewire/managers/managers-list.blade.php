<x-card>
    <x-card.header class="pt-6">
        <x-card.title>
            <x-search resource="Managers" />
        </x-card.title>

        <x-card.toolbar>
            <x-card.toolbar.actions>
                <x-buttons.create route="{{ route('managers.create') }}" resource="Manager" />
            </x-card.toolbar.actions>
        </x-card.toolbar>
    </x-card.header>

    <x-card.body class="pt-0">
        <x-table.wrapper>
            <x-table>
                <x-table.head>
                    <x-table.heading class="w-10px pe-2 sorting_disabled"><x-managers.index.check-all/></x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('name')" :direction="$sorts['name'] ?? null" class="min-w-125px sorting">manager Name</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('status')" :direction="$sorts['status'] ?? null" class="min-w-125px sorting">Status</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('start_date')" :direction="$sorts['start_date'] ?? null" class="min-w-125px sorting">Start Date</x-table.heading>
                    <x-table.heading class="text-end min-w-70px sorting_disabled">Actions</x-table.heading>
                </x-table.head>
                <x-table.body>
                    @forelse ($managers as $manager)
                        <x-table.row :class="$loop->odd ? 'odd' : 'even'" wire:loading.class.delay="opacity-50" wire:key="row-{{ $manager->id }}">
                            <x-table.cell><x-form.inputs.checkbox wire:model="selectedManagerIds" value="{{ $manager->id }}" /></x-table.cell>
                            <x-table.cell><a class="text-gray-800 text-hover-primary" href="{{ route('managers.show', $manager) }}">{{ $manager->full_name }}</a></x-table.cell>
                            <x-table.cell><div class="badge badge-{{ $manager->status->color() }}">{{ $manager->status->label() }}</div></x-table.cell>
                            <x-table.cell>{{ $manager->startedAt?->toDateString() ?? 'No Start Date Set' }}</x-table.cell>
                            <x-table.cell class="text-end">
                                @include('livewire.managers.partials.action-cell')
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row-no-data colspan="5"/>
                    @endforelse
                </x-table.body>
                <x-table.foot/>
            </x-table>
            <x-table.footer :collection="$managers"/>
        </x-table.wrapper>
    </x-card.body>
</x-card>
