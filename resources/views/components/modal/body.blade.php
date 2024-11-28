<div class="relative mx-auto rounded-xl flex flex-col outline-none bg-white max-w-[600px] top-[10%]">
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
