<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Divisiones',
    ],
]">

    <x-slot name="action">
        @hasrole('admin|super admin')
            <a href="{{ route('divisions.create') }}" class="btn btn-blue">
                Nueva división
            </a>
        @endhasrole
    </x-slot>

    @livewire('divisions.division-table')

</x-app-layout>
