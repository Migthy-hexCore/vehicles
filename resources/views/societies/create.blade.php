<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Sociedades',
        'route' => route('societies.index'),
    ],
    [
        'name' => 'Agregar sociedad',
    ],
]">

    <div class="bg-[#E4ECFA] rounded-lg shadow-lg p-8">
        <x-validation-errors class="mb-4" />
        <form action="{{ route('societies.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <div class="mb-4">
                    <x-label class="mb-1">
                        Nombre de la sociedad:
                    </x-label>

                    <x-input aria-autocomplete="false" name="name" value="{{ old('name') }}" class="w-full"
                        placeholder="Ingresa nombre de la sociedad" />
                </div>
            </div>

            {{-- Boton de guardar --}}
            <div class="flex justify-end space-x-4">
                @hasrole('admin|super admin')
                    <x-button>
                        Guardar
                    </x-button>
                @endhasrole

                <a class="btn btn-indigo" href="{{ route('societies.index') }}">
                    Regresar
                </a>
            </div>

        </form>

    </div>

</x-app-layout>
