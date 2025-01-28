<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Dependencias',
    ],
]">

    <x-slot name="action">
        @hasrole('admin|super admin')
            <a href="{{ route('dependencies.create') }}" class="btn btn-blue">
                Nueva dependencia
            </a>
        @endhasrole
    </x-slot>

    @livewire('dependencies.dependency-table')

</x-app-layout>
