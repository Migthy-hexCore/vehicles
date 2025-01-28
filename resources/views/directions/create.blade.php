<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Direcciones generales',
        'route' => route('directions.index'),
    ],
    [
        'name' => 'Agregar dirección general',
    ],
]">

    <div class="bg-[#E4ECFA] rounded-lg shadow-lg p-8">
        <x-validation-errors class="mb-4" />
        <form action="{{ route('directions.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-4 mb-1">
                <div class="mb-4">
                    <x-label class="mb-1">
                        Nombre de la dirección general:
                    </x-label>

                    <x-input autocomplete="off" name="name" value="{{ old('name') }}" class="w-full"
                        placeholder="Ingresa nombre de la dirección general" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Código programático:
                    </x-label>

                    <x-input autocomplete="off" name="program_code" value="{{ old('program_code') }}" class="w-full"
                        placeholder="Ingresa código programático" />
                </div>
            </div>

            {{-- Boton de guardar --}}
            <div class="flex justify-start space-x-4">
                @hasrole('admin|super admin')
                    <x-button>
                        Guardar
                    </x-button>
                @endhasrole

                <a class="btn btn-indigo" href="{{ route('directions.index') }}">
                    Regresar
                </a>
            </div>

        </form>

    </div>

</x-app-layout>
