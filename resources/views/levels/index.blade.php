<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Sociedades',
    ],
]">

    <x-slot name="action">
        @hasrole('admin|super amdin')
            <a href="{{ route('levels.create') }}" class="btn btn-blue">
                Nuevo nivel
            </a>
        @endhasrole
    </x-slot>

    @livewire('levels.level-table')

</x-app-layout>
