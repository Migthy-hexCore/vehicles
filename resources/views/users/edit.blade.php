<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Usuarios y roles',
        'route' => route('societies.index'),
    ],
    [
        'name' => $user->name,
    ],
]">

    <div class="bg-[#E4ECFA] rounded-lg shadow-lg p-8">
        <x-validation-errors class="mb-4" />
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div class="mb-4">
                    <x-label class="mb-1">
                        Nombre del usuario:
                    </x-label>

                    <x-input autocomplete="false" name="name" value="{{ old('name', $user->name) }}" class="w-full"
                        placeholder="Ingresa nombre del usuario" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Email del usuario:
                    </x-label>

                    <x-input autocomplete="false" name="email" value="{{ old('email', $user->email) }}" class="w-full"
                        placeholder="Ingresa email del usuario" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Contraseña:
                    </x-label>

                    <x-input autocomplete="off" name="password" class="w-full"
                        placeholder="Nueva contraseña del usuario" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div class="mb-4">
                    <x-label>
                        Rol:
                    </x-label>

                    <x-select class="w-full" name="role_name" id="">
                        <option value="" disabled selected>
                            Selecciona rol:
                        </option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                {{ ucwords($role->name) }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

                <div>
                    <x-label class="mb-1">
                        Estatus:
                    </x-label>

                    <x-select name="status" class="w-full">
                        <option value="1" @selected(old('status', $user->status) == 1)>
                            Activo
                        </option>
                        <option value="0" @selected(old('status', $user->status) == 0)>
                            Inactivo
                        </option>
                    </x-select>
                </div>

            </div>

            <div class="flex flex-col md:flex-row justify-between w-full space-y-4 md:space-y-0 md:space-x-4">
                <div class="flex space-x-4 w-full md:w-auto">
                    <a href="{{ route('users.index') }}" class="btn btn-indigo w-full md:w-auto text-center">
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

    <form action="{{ route('users.destroy', $user) }}" method="POST" id="delete-form">
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
