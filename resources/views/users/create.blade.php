<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Usuarios y roles',
        'route' => route('users.index'),
    ],
    [
        'name' => 'Nuevo usuario',
    ],
]">

    <div class="bg-[#E4ECFA] rounded-lg shadow-lg p-8">

        <x-validation-errors class="mb-4" />

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-1">
                <div class="mb-4">
                    <x-label class="mb-1">
                        Nombre de usuario:
                    </x-label>

                    <x-input autocomplete="off" name="name" value="{{ old('name') }}" class="w-full"
                        placeholder="Ingresa nombre del usuario" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Email:
                    </x-label>

                    <x-input autocomplete="off" type="email"  name="email" value="{{ old('email') }}"
                        class="w-full" placeholder="Ingresa email del usuario" />
                </div>


            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-1">
                <div class="mb-4">
                    <x-label class="mb-1">
                        Contraseña:
                    </x-label>

                    <x-input autocomplete="off" name="password" value="{{ old('password') }}" class="w-full"
                        placeholder="Ingresa contraseña del usuario" />
                </div>

                <div class="mb-4">
                    <x-label>
                        Rol:
                    </x-label>

                    <x-select class="w-full" name="role_name">
                        <option value="" selected disabled>
                            Selecciona rol:
                        </option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" {{ old('id') == $role->id ? 'selected' : '' }}>
                                {{ ucwords($role->name) }}
                            </option>
                        @endforeach
                    </x-select>

                </div>

            </div>

            {{-- Boton de guardar --}}
            <div class="flex justify-end space-x-4">
                <x-button>
                    Guardar
                </x-button>

                <a class="btn btn-indigo" href="{{ route('users.index') }}">
                    Regresar
                </a>
            </div>

        </form>

    </div>

</x-app-layout>
