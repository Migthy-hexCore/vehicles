<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Áreas',
    ],
]">

    <x-slot name="action">
        @hasrole('admin|super admin')
            <a href="{{ route('areas.create') }}" class="btn btn-blue">
                Nueva Área
            </a>
        @endhasrole
    </x-slot>

    @livewire('areas.area-table')

</x-app-layout>
