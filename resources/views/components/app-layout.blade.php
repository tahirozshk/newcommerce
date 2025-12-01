@props(['header'])

<x-dashboard-layout>
    @if(isset($header))
        <x-slot name="header">
            {{ $header }}
        </x-slot>
    @endif

    {{ $slot }}
</x-dashboard-layout>

