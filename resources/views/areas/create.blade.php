<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Áreas',
        'route' => route('areas.index'),
    ],
    [
        'name' => 'Agregar area',
    ],
]">

    <div class="bg-[#E4ECFA] rounded-lg shadow-lg p-8">
        <x-validation-errors class="mb-4" />
        <form action="{{ route('areas.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <div class="mb-4">
                    <x-label class="mb-1">
                        Nombre del área
                    </x-label>

                    <x-input autocomplete="off" name="name" value="{{ old('name') }}" class="w-full"
                        placeholder="Ingresa nombre del área" />
                </div>
            </div>

            <div class="flex justify-start space-x-4">
                @hasrole('admin|super admin')
                    <x-button>
                        Guardar
                    </x-button>
                @endhasrole

                <a class="btn btn-indigo" href="{{ route('areas.index') }}">
                    Regresar
                </a>
            </div>

        </form>

    </div>

</x-app-layout>
