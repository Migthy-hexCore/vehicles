<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Dependencias',
        'route' => route('dependencies.index'),
    ],
    [
        'name' => 'Agregar dependencia',
    ],
]">

    <div class="bg-[#E4ECFA] rounded-lg shadow-lg p-8">
        <x-validation-errors class="mb-4" />
        <form action="{{ route('dependencies.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <div class="mb-4">
                    <x-label class="mb-1">
                        Nombre de la dependencia:
                    </x-label>

                    <x-input autocomplete="off" name="name" value="{{ old('name') }}" class="w-full"
                        placeholder="Ingresa nombre de la dependencia" />
                </div>
            </div>

            {{-- Boton de guardar --}}
            <div class="flex justify-start space-x-4">
                @hasrole('admin|super admin')
                    <x-button>
                        Guardar
                    </x-button>
                @endhasrole

                <a class="btn btn-indigo" href="{{ route('dependencies.index') }}">
                    Regresar
                </a>
            </div>

        </form>

    </div>

</x-app-layout>
