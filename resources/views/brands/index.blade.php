<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Marcas',
    ],
]">

    <x-slot name="action">
        @hasrole('admin|super admin')
            <a href="{{ route('brands.create') }}" class="btn btn-blue">
                Nueva marca
            </a>
        @endhasrole
    </x-slot>

    @livewire('brands.brand-table')

</x-app-layout>
