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
            <a href="{{ route('agencies.create') }}" class="btn btn-blue">
                Nueva agencia
            </a>
        @endhasrole
    </x-slot>

    @livewire('agencies.agency-table')

</x-app-layout>
