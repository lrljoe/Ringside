<x-container-fixed>
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
        <div class="flex flex-col justify-center gap-2">
            <h1 class="text-xl font-medium leading-none text-gray-900">
                Venues
            </h1>
            <div class="flex items-center flex-wrap gap-1.5 font-medium">
                <span class="text-md text-gray-600">
                    All Venues:
                </span>
                <span class="text-md gray-800 font-semibold me-2">
                    {{ $this->builder()->count() }}
                </span>
            </div>
        </div>
        <div class="flex items-center gap-2.5">
            <button
                class="inline-flex items-center cursor-pointer leading-4 rounded-md border border-solid border-transparent outline-none h-8 ps-3 pe-3 font-medium text-xs gap-[.275rem] text-white bg-[#1b84ff]">
                Add Venue
            </button>
        </div>
    </div>
</x-container-fixed>
