<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Agencias',
        'route' => route('agencies.index'),
    ],
    [
        'name' => 'Agregar agencia',
    ],
]">

    <div class="bg-[#E4ECFA] rounded-lg shadow-lg p-8">
        <x-validation-errors class="mb-4" />
        <form action="{{ route('agencies.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <div class="mb-4">
                    <x-label class="mb-1">
                        Nombre de la agencia:
                    </x-label>

                    <x-input autocomplete="off" name="name" value="{{ old('name') }}" class="w-full"
                        placeholder="Ingresa nombre de la agencia" />
                </div>
            </div>

            <div class="flex justify-start space-x-4">
                <x-button>
                    Guardar
                </x-button>

                <a class="btn btn-indigo" href="{{ route('agencies.index') }}">
                    Regresar
                </a>
            </div>

        </form>

    </div>

</x-app-layout>
