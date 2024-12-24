<div
    class="relative mx-auto rounded-xl bg-white flex flex-col outline-none box-shadow-modal max-w-[500px] top-5 lg:top-[15%]">
    <x-modal.header />
    <x-modal.body>
        {{ $slot }}
    </x-modal.body>
    @if ($footer->isNotEmpty())
        <x-modal.footer>
            {{ $footer }}
        </x-modal.footer>
    @endif
</div>
