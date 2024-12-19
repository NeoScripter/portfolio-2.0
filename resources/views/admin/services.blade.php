<x-admin-layout>
    {{-- Header Section --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Services
        </h2>
    </x-slot>

    {{-- First Section --}}
        @include('admin.services.index')

    {{-- Second Section --}}
    <x-slot name="second">
        @include('admin.services.create')
    </x-slot>
</x-admin-layout>
