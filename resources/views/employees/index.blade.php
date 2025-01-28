<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Usuarios',
    ],
]">

    <x-slot name="action">
        @hasrole('admin|super amdin')
            <a href="{{ route('employees.create') }}" class="btn btn-blue">
                Nuevo usuario
            </a>
        @endhasrole
    </x-slot>

    @livewire('employees.employee-table')

</x-app-layout>
