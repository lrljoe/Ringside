<div class="relative">
    <x-modal.header />
    <x-modal.body>
        {{ $slot }}
    </x-modal.body>
    @if ($footer->isNotEmpty())
        <x-modal.footer>
            {{ $footer }}
        </x-modal.footer>
    @endisset
</div>
