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
        'name' => $society->name,
    ],
]">

    <div class="bg-[#E4ECFA] rounded-lg shadow-lg p-8">
        <x-validation-errors class="mb-4" />
        <form action="{{ route('societies.update', $society) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div class="mb-4">
                    <x-label class="mb-1">
                        Nombre de la sociedad:
                    </x-label>

                    <x-input aria-autocomplete="false" name="name" value="{{ old('name', $society->name) }}"
                        class="w-full" placeholder="Ingresa nombre de la sociedad" />
                </div>

                <div>
                    <x-label class="mb-1">
                        Estatus:
                    </x-label>

                    <x-select name="status" class="w-full">
                        <option value="1" @selected(old('status', $society->status) == 1)>
                            Activo
                        </option>
                        <option value="0" @selected(old('status', $society->status) == 0)>
                            Inactivo
                        </option>
                    </x-select>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-between w-full space-y-4 md:space-y-0 md:space-x-4">
                <div class="flex space-x-4 w-full md:w-auto">
                    <a href="{{ route('societies.index') }}" class="btn btn-indigo w-full md:w-auto text-center">
                        Regresar
                    </a>
                    <x-button class="w-full md:w-auto">
                        Actualizar
                    </x-button>
                </div>

                <div class="flex w-full md:w-auto">
                    <x-danger-button onclick="confirmDelete()" class="w-full md:w-auto">
                        Eliminar
                    </x-danger-button>
                </div>
            </div>

        </form>
    </div>

    <form action="{{ route('societies.destroy', $society) }}" method="POST" id="delete-form">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
            function confirmDelete() {
                Swal.fire({
                    title: "Estás seguro?",
                    text: "No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminarlo!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form').submit();
                    }
                });
            }
        </script>
    @endpush

</x-app-layout>
