{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
 --}}

<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
    ],
]">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex items-center">
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}" />

                <div class="ml-4 flex-1">
                    <h2 class="tex-lg font-semibold">Bienvenido, {{ auth()->user()->name }}</h2>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="text-sm hover:text-blue-500">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 flex items-center justify-center">
            <h2 class="text-xl font-semibold">Cualquier otra cosa</h2>
        </div>
    </div>
</x-app-layout>
