<x-app-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Vehículos',
        'route' => route('vehicles.index'),
    ],
    [
        'name' => $vehicle->brand->name . ' ' . $vehicle->type . ' ' . $vehicle->model,
    ],
]">

    <div class="bg-[#E4ECFA] rounded-lg shadow-lg p-8">
        <x-validation-errors class="mb-4" />
        <form action="{{ route('vehicles.update', $vehicle) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Sociedad, No. activo fijo, No. control, Placas --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-1">
                {{-- Sociedad --}}
                <div class="mb-4">
                    <x-label class="mb-1">
                        Sociedad:
                    </x-label>

                    <x-select class="w-full" name="society_id">
                        <option value="" disabled>
                            Selecciona sociedad
                        </option>
                        @foreach ($societies as $society)
                            <option value="{{ $society->id }}" @selected($society->id == old('society', $vehicle->society))>
                                {{ $society->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

                {{-- num activo fijo --}}
                <div class="mb-4">
                    <x-label class="mb-1">
                        No. activo fijo:
                    </x-label>

                    <x-input name="fixed_asset_number"
                        value="{{ old('fixed_asset_number', $vehicle->fixed_asset_number) }}" class="w-full"
                        placeholder="Ingresa No. activo fijo" />
                </div>

                {{-- num control --}}
                <div class="mb-4">
                    <x-label class="mb-1">
                        No. control:
                    </x-label>

                    <x-input name="control_number" value="{{ old('control_number', $vehicle->control_number) }}"
                        class="w-full" placeholder="Ingresa numero de control" />
                </div>

                {{-- Placas --}}
                <div class="mb-4">
                    <x-label class="mb-1">
                        Placas:
                    </x-label>

                    <x-input name="plates" value="{{ old('plates', $vehicle->plates) }}" class="w-full"
                        placeholder="Ingresa numero de placa" />
                </div>
            </div>

            {{-- División, Numero de serie, Numero de factura, Numero de motor --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-1">
                <div class="mb-4">
                    <x-label class="mb-1">
                        División:
                    </x-label>

                    <x-select class="w-full" name="division_id">
                        <option value="" disabled>
                            Selecciona división
                        </option>
                        @foreach ($divisions as $division)
                            <option value="{{ $division->id }}" @selected($division->id == old('division', $vehicle->division))>
                                {{ $division->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Numero de serie:
                    </x-label>

                    <x-input name="serial_number" value="{{ old('serial_number', $vehicle->serial_number) }}"
                        class="w-full" placeholder="Ingresa numero de serie" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Numero de factura:
                    </x-label>

                    <x-input name="invoice_number" value="{{ old('invoice_number', $vehicle->invoice_number) }}"
                        class="w-full" placeholder="Ingresa numero de factura" />
                </div>

                <div>
                    <x-label class="mb-1">
                        Agencia:
                    </x-label>

                    <x-select class="w-full" name="agency_id">
                        <option value="" selected disabled>
                            Selecciona una agencia
                        </option>
                        @foreach ($agencies as $agency)
                            <option value="{{ $agency->id }}" @selected($agency->id == old('agency_id', $vehicle->agency_id))>
                                {{ $agency->name }}
                            </option>
                        @endforeach
                    </x-select>

                </div>
            </div>

            {{-- Agencia, Marca, Tipo, Modelo --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-1">
                <div class="mb-4">
                    <x-label class="mb-1">
                        Numero de motor:
                    </x-label>

                    <x-input name="engine_number" value="{{ old('engine_number', $vehicle->engine_number) }}"
                        class="w-full" placeholder="Ingresa numero de motor" />
                </div>

                <div>
                    <x-label class="mb-1">
                        Marca:
                    </x-label>

                    <x-select name="brand_id" class="w-full">
                        <option value="" selected disabled>
                            Selecciona una marca
                        </option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" @selected($brand->id == old('brand_id', $vehicle->brand_id))>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Tipo:
                    </x-label>

                    <x-input name="type" value="{{ old('type', $vehicle->type) }}" class="w-full"
                        placeholder="Ingresa tipo" />
                </div>

                <div>
                    <x-label class="mb-1">
                        Modelo:
                    </x-label>

                    <x-select name="model" class="w-full">
                        <option value="" selected disabled>
                            Selecciona un modelo
                        </option>
                        @for ($year = 2006; $year <= date('Y'); $year++)
                            <option value="{{ $year }}" @selected($year == old('model', $vehicle->model))>
                                {{ $year }}
                            </option>
                        @endfor
                    </x-select>
                </div>
            </div>

            {{-- Numero de cilindros, Función, Pasajeros, Transmisión --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-1">
                {{-- cilindros --}}
                <div class="mb-4">
                    <x-label class="mb-1">
                        Numero de cilindros:
                    </x-label>

                    <x-select name="cylinders" class="w-full">
                        <option value="" disabled>
                            Selecciona numero de cilindros
                        </option>
                        <option value="4" @selected(old('cylinders', $vehicle->cylinders) == '4')>
                            4
                        </option>
                        <option value="6" @selected(old('cylinders', $vehicle->cylinders) == '6')>
                            6
                        </option>
                        <option value="8" @selected(old('cylinders', $vehicle->cylinders) == '8')>
                            8
                        </option>
                        <option value="14" @selected(old('cylinders', $vehicle->cylinders) == '14')>
                            14
                        </option>
                    </x-select>
                </div>

                {{-- puertas --}}
                <div class="mb-4">
                    <x-label class="mb-1">
                        Numero de puertas:
                    </x-label>

                    <x-select name="doors" class="w-full">
                        <option value="" disabled>
                            Selecciona numero de puertas
                        </option>
                        <option value=0 @selected(old('doors', $vehicle->doors) == 0)>
                            0
                        </option>
                        <option value=2 @selected(old('doors', $vehicle->doors) == 2)>
                            2
                        </option>
                        <option value=4 @selected(old('doors', $vehicle->doors) == 4)>
                            4
                        </option>
                        <option value=5 @selected(old('doors', $vehicle->doors) == 5)>
                            5
                        </option>
                    </x-select>
                </div>

                {{-- funcion --}}
                <div class="mb-4">
                    <x-label class="mb-1">
                        Función:
                    </x-label>

                    <x-input name="function" value="{{ old('function', $vehicle->function) }}" class="w-full"
                        placeholder="Ingresa función" />
                </div>

                {{-- pasajeros --}}
                <div>
                    <x-label class="mb-1">
                        Pasajeros:
                    </x-label>

                    <x-select name="passenger_capacity" class="w-full">
                        <option value="" disabled>
                            Selecciona cantidad pasajeros
                        </option>
                        @for ($passenger = 0; $passenger <= 8; $passenger++)
                            <option value="{{ $passenger }}"
                                {{ (old('passenger_capacity') ?? $vehicle->passenger_capacity) == $passenger ? 'selected' : '' }}>
                                {{ $passenger }}
                            </option>
                        @endfor
                    </x-select>

                </div>
            </div>

            {{-- Transmision, Color, Nivel vehicular, Propiedad --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-1">

                {{-- transmision --}}
                <div>
                    <x-label class="mb-1">
                        Transmisión:
                    </x-label>

                    <x-select name="transmission" class="w-full">
                        <option value="" disabled>
                            Selecciona transmisión
                        </option>
                        <option value="manual" @selected(old('transmission', $vehicle->transmission) == 'manual')>
                            Manual
                        </option>
                        <option value="automatico" @selected(old('transmission', $vehicle->transmission) == 'automatico')>
                            Automático
                        </option>
                        <option value="cvt" @selected(old('transmission', $vehicle->transmission) == 'cvt')>
                            CVT
                        </option>
                    </x-select>

                </div>

                {{-- color --}}
                <div>
                    <x-label class="mb-1">
                        Color:
                    </x-label>

                    <x-select name="color" class="w-full">
                        <option value="" selected disabled>
                            Selecciona color
                        </option>
                        @foreach ($colors as $id => $name)
                            <option value="{{ $id }}" @selected($id == old('color', $vehicle->color))>
                                {{ $name }}
                            </option>
                        @endforeach
                    </x-select>

                </div>

                {{-- nivel vehicular --}}
                <div>
                    <x-label class="mb-1">
                        Nivel vehicular:
                    </x-label>

                    <x-select name="vehicle_level" class="w-full">
                        <option value="" selected disabled>
                            Selecciona nivel vehicular
                        </option>

                        <option value="Administrativo" @selected(old('vehicle_level', $vehicle->vehicle_level) == 'Administrativo')>
                            Administrativo
                        </option>

                        <option value="Operativo" @selected(old('vehicle_level', $vehicle->vehicle_level) == 'Operativo')>
                            Operativo
                        </option>

                    </x-select>
                </div>

                {{-- Propiedad --}}
                <div>
                    <x-label class="mb-1">
                        Propiedad:
                    </x-label>

                    <x-select name="ownership" class="w-full">
                        <option value="" selected disabled>
                            Selecciona propiedad
                        </option>
                        @foreach ($owners as $id => $name)
                            <option value="{{ $id }}" @selected($id == old('ownership', $vehicle->ownership))>
                                {{ $name }}
                            </option>
                        @endforeach
                    </x-select>

                </div>
            </div>

            {{-- Valor de adqusicion --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6 mb-1">
                <div class="mb-4">
                    <x-label class="mb-1">
                        Valor de adquisición:
                    </x-label>

                    <x-input name="acquisition_value"
                        value="{{ old('acquisition_value', $vehicle->acquisition_value) }}" class="w-full"
                        placeholder="Ingresa valor de adquisición" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        N° de documento de adquisición:
                    </x-label>

                    <x-input name="purchase_document_number"
                        value="{{ old('purchase_document_number', $vehicle->purchase_document_number) }}"
                        class="w-full" placeholder="Ingresa Numero de documento de adquisición" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Registro estatal:
                    </x-label>

                    <x-input name="state_record" value="{{ old('state_record', $vehicle->state_record) }}"
                        class="w-full" placeholder="Ingresa registro estatal" />
                </div>

                <div>
                    <x-label class="mb-1">
                        Estatus:
                    </x-label>

                    <x-select name="status" class="w-full">
                        <option value="1" @selected(old('status', $vehicle->status) == 1)>
                            Activo
                        </option>
                        <option value="0" @selected(old('status', $vehicle->status) == 0)>
                            Inactivo
                        </option>
                    </x-select>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-between w-full space-y-4 md:space-y-0 md:space-x-4">
                <div class="flex space-x-4 w-full md:w-auto">

                    <a href="{{ route('vehicles.index') }}" class="btn btn-indigo w-full md:w-auto text-center">
                        Regresar
                    </a>
                    @hasrole('admin|super admin')
                        <x-button class="w-full md:w-auto">
                            Actualizar
                        </x-button>
                    @endhasrole
                </div>

                <div class="flex w-full md:w-auto">
                    @hasrole('admin|super admin')
                        <x-danger-button onclick="confirmDelete()" class="w-full md:w-auto">
                            Eliminar
                        </x-danger-button>
                    @endhasrole
                </div>
            </div>
        </form>
    </div>

    <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" id="delete-form">
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
