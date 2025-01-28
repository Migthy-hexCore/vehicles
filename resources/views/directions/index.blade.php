<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Agencias',
    ],
]">

    <x-slot name="action">
        @hasrole('admin|super admin')
            <a href="{{ route('directions.create') }}" class="btn btn-blue">
                Nueva dirección gral.
            </a>
        @endhasrole
    </x-slot>

    @livewire('directions.direction-table')

</x-app-layout>
