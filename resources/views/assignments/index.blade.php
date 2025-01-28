<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Asignaciones',
    ],
]">

    @livewire('assignments.assignment-table')

</x-app-layout>
