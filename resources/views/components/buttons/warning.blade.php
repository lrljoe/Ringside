@props([
    'size' => null,
])

<x-button
    {{ $attributes->merge()->class([
            'text-white bg-warning hover:bg-warning-active hover:shadow-warning-box-shadow active:bg-warning-active active:shadow-warning-box-shadow focusr:bg-warning-active focus:shadow-warning-box-shadow',
        ]) }}>
    {{ $slot }}
</x-button>
