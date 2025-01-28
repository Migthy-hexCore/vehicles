<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Usuarios y roles',
    ],
]">

    <x-slot name="action">
            <a href="{{ route('users.create') }}" class="btn btn-blue">
                Nuevo usuario
            </a>
    </x-slot>

    @livewire('users.user-table')

</x-app-layout>
