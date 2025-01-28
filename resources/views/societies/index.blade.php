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
        @hasrole('admin|super admin')
            <a href="{{ route('societies.create') }}" class="btn btn-blue">
                Nueva sociedad
            </a>
        @endhasrole
    </x-slot>

    @livewire('societies.society-table')

</x-app-layout>
