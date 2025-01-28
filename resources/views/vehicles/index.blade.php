<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Vehículos',
    ],
]">

    <x-slot name="action">
        @hasrole('admin')
            <a href="{{ route('vehicles.create') }}" class="btn btn-blue">
                Nuevo vehículo
            </a>
        @endhasrole
    </x-slot>

    @livewire('vehicles.vehicle-table')

</x-app-layout>
