<x-layouts.app>
    <x-container-fixed>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-7.5">
            <div class="col-span-1">
                <div class="grid gap-5 lg:gap-7.5">
                    <x-wrestlers.show.general-info :$wrestler />
                </div>
            </div>
            <div class="col-span-2">
                <div class="flex flex-col gap-5 lg:gap-7.5">
                    {{-- <livewire:wrestlers.previous-title-championships-list :$wrestler />
                    <livewire:wrestlers.wrestler-matches-list :$wrestler />
                    <livewire:wrestlers.wrestler-tag-teams-list :$wrestler />
                    <livewire:wrestlers.wrestler-managers-list :$wrestler />
                    <livewire:wrestlers.wrestler-stables-list :$wrestler /> --}}
                </div>
            </div>
        </div>
    </x-container-fixed>
</x-layouts.app>
