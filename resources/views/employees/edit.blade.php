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
        <form action="{{ route('employees.update', $employee) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-1">

                <div class="mb-4">
                    <x-label class="mb-1">
                        Nombre:
                    </x-label>

                    <x-input name="employee_name" value="{{ old('employee_name', $employee->employee_name) }}"
                        class="w-full" placeholder="Ingresa nombre del usuario" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Numero del usuario:
                    </x-label>

                    <x-input name="employee_number" value="{{ old('employee_number', $employee->employee_number) }}"
                        class="w-full" placeholder="Ingresa numero del usuario" />
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
                            <option value="{{ $level->id }}" @selected($employee->level_id == old('level_id', $employee->level_id))>
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

                    <x-input name="position_name" value="{{ old('position_name', $employee->position_name) }}"
                        class="w-full" placeholder="Ingresa puesto del usuario" />
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
                            <option value="{{ $dependecy->id }}" @selected($employee->dependency_id == old('dependency_id', $employee->dependency_id))>
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
                            <option value="{{ $generalDirection->id }}" @selected($employee->general_direction_id == old('general_direction_id', $employee->general_direction_id))>
                                {{ $generalDirection->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8 md:mb-1">

                <div class="mb-4">
                    <x-label class="mb-1">
                        Area del usuario:
                    </x-label>

                    <x-select class="w-full" name="area_id">
                        <option value="" selected disabled>
                            Selecciona dirección general:
                        </option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}" @selected($employee->area_id == old('area_id', $employee->area_id))>
                                {{ $area->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

                <div>
                    <x-label class="mb-1">
                        Estatus:
                    </x-label>

                    <x-select name="status" class="w-full">
                        <option value="1" @selected(old('status', $employee->status) == 1)>
                            Activo
                        </option>
                        <option value="0" @selected(old('status', $employee->status) == 0)>
                            Inactivo
                        </option>
                    </x-select>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-between w-full space-y-4 md:space-y-0 md:space-x-4">
                <div class="flex space-x-4 w-full md:w-auto">
                    <a href="{{ route('employees.index') }}" class="btn btn-indigo w-full md:w-auto text-center">
                        Regresar
                    </a>
                    @hasrole('admin|super admin')
                        <x-button class="w-full md:w-auto">
                            Actualizar
                        </x-button>
                    @endhasrole
                </div>

                <div class="flex w-full md:w-auto">
                    @hasrole('admin|super amdin')
                        <x-danger-button onclick="confirmDelete()" class="w-full md:w-auto">
                            Eliminar
                        </x-danger-button>
                    @endhasrole
                </div>
            </div>

        </form>
    </div>

    <form action="{{ route('employees.destroy', $employee) }}" method="POST" id="delete-form">
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
