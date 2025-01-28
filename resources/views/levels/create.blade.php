<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Niveles',
        'route' => route('levels.index'),
    ],
    [
        'name' => 'Agregar nivel',
    ],
]">

    <div class="bg-[#E4ECFA] rounded-lg shadow-lg p-8">
        <x-validation-errors class="mb-4" />
        <form action="{{ route('levels.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <div class="mb-4">
                    <x-label class="mb-1">
                        Nivel de usuario
                    </x-label>

                    <x-input autocomplete="off" name="level" value="{{ old('level') }}" class="w-full"
                        placeholder="Ingresa el nivel" />
                </div>
            </div>

            {{-- Boton de guardar --}}
            <div class="flex justify-start space-x-4">
                <x-button>
                    Guardar
                </x-button>

                <a class="btn btn-indigo" href="{{ route('brands.index') }}">
                    Regresar
                </a>
            </div>

        </form>

    </div>

</x-app-layout>
