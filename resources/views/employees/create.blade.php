<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Usuarios',
        'route' => route('employees.index'),
    ],
    [
        'name' => 'Agregar usuario',
    ],
]">

    <div class="bg-[#E4ECFA] rounded-lg shadow-lg p-8">
        <x-validation-errors class="mb-4" />
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-1">

                <div class="mb-4">
                    <x-label class="mb-1">
                        Nombre:
                    </x-label>

                    <x-input name="employee_name" value="{{ old('employee_name') }}" class="w-full"
                        placeholder="Ingresa nombre del usuario" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Numero del usuario:
                    </x-label>

                    <x-input name="employee_number" value="{{ old('employee_number') }}" class="w-full"
                        placeholder="Ingresa numero del usuario" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Nivel del usuario:
                    </x-label>

                    <x-select class="w-full" name="level_id">
                        <option value="" selected disabled>
                            Selecciona nivel:
                        </option>
                        @foreach ($levels as $level)
                            <option value="{{ $level->id }}" {{ old('level_id') == $level->id ? 'selected' : '' }}>
                                {{ $level->level }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-1">

                <div class="mb-4">
                    <x-label class="mb-1">
                        Nombre del puesto:
                    </x-label>

                    <x-input name="position_name" value="{{ old('position_name') }}" class="w-full"
                        placeholder="Ingresa puesto del usuario" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Dependencia del usuario:
                    </x-label>

                    <x-select class="w-full" name="dependency_id">
                        <option value="" selected disabled>
                            Selecciona nivel:
                        </option>
                        @foreach ($dependencies as $dependecy)
                            <option value="{{ $dependecy->id }}"
                                {{ old('dependency_id') == $dependecy->id ? 'selected' : '' }}>
                                {{ $dependecy->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Direccion general:
                    </x-label>

                    <x-select class="w-full" name="general_direction_id">
                        <option value="" selected disabled>
                            Selecciona dirección general:
                        </option>
                        @foreach ($generalDirections as $generalDirection)
                            <option value="{{ $generalDirection->id }}"
                                {{ old('general_direction_id') == $generalDirection->id ? 'selected' : '' }}>
                                {{ $generalDirection->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-1">

                <div class="mb-4">
                    <x-label class="mb-1">
                        Area del usuario:
                    </x-label>

                    <x-select class="w-full" name="area_id">
                        <option value="" selected disabled>
                            Selecciona dirección general:
                        </option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
                                {{ $area->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <x-button>
                    Guardar
                </x-button>

                <a class="btn btn-indigo" href="{{ route('employees.index') }}">
                    Regresar
                </a>
            </div>

        </form>

    </div>

</x-app-layout>
