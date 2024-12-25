@props([
    'size' => 'sm',
])

<div
    {{ $attributes->class([
        'relative mx-auto rounded-xl bg-white flex flex-col outline-none box-shadow-modal top-5 lg:top-[15%]',
        'max-w-[400px]' => $size === 'sm',
        'max-w-[800px]' => $size === 'md',
        'max-w-[1100px]' => $size === 'lg',
    ]) }}>
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
