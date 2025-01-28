<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Divisiones',
        'route' => route('divisions.index'),
    ],
    [
        'name' => 'Agregar división',
    ],
]">

    <div class="bg-[#E4ECFA] rounded-lg shadow-lg p-8">
        <x-validation-errors class="mb-4" />
        <form action="{{ route('divisions.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <div class="mb-4">
                    <x-label class="mb-1">
                        Numero de la división:
                    </x-label>

                    <x-input aria-autocomplete="false" name="name" value="{{ old('name') }}" class="w-full"
                        placeholder="Ingresa numero de la división" />
                </div>
            </div>

            {{-- Boton de guardar --}}
            <div class="flex justify-end space-x-4">
                <x-button>
                    Guardar
                </x-button>

                <a class="btn btn-indigo" href="{{ route('divisions.index') }}">
                    Regresar
                </a>
            </div>

        </form>

    </div>

</x-app-layout>
