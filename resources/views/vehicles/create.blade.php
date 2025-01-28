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
        'name' => 'Agregar vehículo',
    ],
]">

    <div class="bg-[#E4ECFA] rounded-lg shadow-lg p-8">
        <x-validation-errors class="mb-4" />
        <form action="{{ route('vehicles.store') }}" method="POST">
            @csrf

            {{-- Sociedad, No. activo fijo, No. control, Placas --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-1">
                <div class="mb-4">
                    <x-label class="mb-1">
                        Sociedad:
                    </x-label>

                    <x-select class="w-full" name="society_id">
                        <option value="" selected disabled>
                            Selecciona sociedad
                        </option>
                        @foreach ($societies as $society)
                            <option value="{{ $society->id }}"
                                {{ old('society_id') == $society->id ? 'selected' : '' }}>
                                {{ $society->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        No. activo fijo:
                    </x-label>

                    <x-input name="fixed_asset_number" value="{{ old('fixed_asset_number') }}" class="w-full"
                        placeholder="Ingresa No. activo fijo" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        No. control:
                    </x-label>

                    <x-input name="control_number" value="{{ old('control_number') }}" class="w-full"
                        placeholder="Ingresa numero de control" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Placas:
                    </x-label>

                    <x-input name="plates" value="{{ old('plates') }}" class="w-full"
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
                        <option value="" selected disabled>
                            Selecciona división
                        </option>
                        @foreach ($divisions as $division)
                            <option value="{{ $division->id }}"
                                {{ old('division') == $division->id ? 'selected' : '' }}>
                                {{ $division->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Numero de serie:
                    </x-label>

                    <x-input name="serial_number" value="{{ old('serial_number') }}" class="w-full"
                        placeholder="Ingresa numero de serie" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Numero de factura:
                    </x-label>

                    <x-input name="invoice_number" value="{{ old('invoice_number') }}" class="w-full"
                        placeholder="Ingresa numero de factura" />
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
                            <option value="{{ $agency->id }}"
                                {{ old('agency_id') == $agency->id ? 'selected' : '' }}>
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

                    <x-input name="engine_number" value="{{ old('engine_number') }}" class="w-full"
                        placeholder="Ingresa numero de motor" />
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
                            <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Tipo:
                    </x-label>

                    <x-input name="type" value="{{ old('type') }}" class="w-full" placeholder="Ingresa tipo" />
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
                            <option value="{{ $year }}" {{ old('model') == $year ? 'selected' : '' }}>
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
                        <option value="" selected disabled>
                            Selecciona numero de cilindros
                        </option>
                        <option value="4" {{ old('cylinders') == '4' ? 'selected' : '' }}>
                            4
                        </option>
                        <option value="6" {{ old('cylinders') == '6' ? 'selected' : '' }}>
                            6
                        </option>
                        <option value="8" {{ old('cylinders') == '8' ? 'selected' : '' }}>
                            8
                        </option>
                        <option value="14" {{ old('cylinders') == '14' ? 'selected' : '' }}>
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
                        <option value="" selected disabled>
                            Selecciona numero de puertas
                        </option>
                        <option value=0 {{ old('doors') == '0' ? 'selected' : '' }}>
                            0
                        </option>
                        <option value=2 {{ old('doors') == '2' ? 'selected' : '' }}>
                            2
                        </option>
                        <option value=4 {{ old('doors') == '4' ? 'selected' : '' }}>
                            4
                        </option>
                        <option value=5 {{ old('doors') == '5' ? 'selected' : '' }}>
                            5
                        </option>
                    </x-select>
                </div>

                {{-- funcion --}}
                <div class="mb-4">
                    <x-label class="mb-1">
                        Función:
                    </x-label>

                    <x-input name="function" value="{{ old('function') }}" class="w-full"
                        placeholder="Ingresa función" />
                </div>

                {{-- pasajeros --}}
                <div>
                    <x-label class="mb-1">
                        Pasajeros:
                    </x-label>

                    <x-select name="passenger_capacity" class="w-full">
                        <option value="" selected disabled>
                            Selecciona cantidad pasajeros
                        </option>
                        @for ($passenger = 0; $passenger <= 8; $passenger++)
                            <option value="{{ $passenger }}"
                                {{ (old('passenger_capacity') ?? '') == $passenger ? 'selected' : '' }}>
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
                        <option value="" selected disabled>
                            Selecciona transmisión
                        </option>
                        <option value="manual" {{ old('transmission') == 'manual' ? 'selected' : '' }}>
                            Manual
                        </option>
                        <option value="automatico" {{ old('transmission') == 'automatico' ? 'selected' : '' }}>
                            Automático
                        </option>
                        <option value="cvt" {{ old('transmission') == 'cvt' ? 'selected' : '' }}>
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
                            <option value="{{ $id }}">
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

                        <option value="Administrativo"
                            {{ old('vehicle_level') == 'Administrativo' ? 'selected' : '' }}>
                            Administrativo
                        </option>

                        <option value="Operativo" {{ old('vehicle_level') == 'Operativo' ? 'selected' : '' }}>
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
                            <option value="{{ $id }}" {{ old('ownership') == $id ? 'selected' : '' }}>
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

                    <x-input name="acquisition_value" value="{{ old('acquisition_value') }}" class="w-full"
                        placeholder="Ingresa valor de adquisición" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        N° de documento de adquisición:
                    </x-label>

                    <x-input name="purchase_document_number" value="{{ old('purchase_document_number') }}"
                        class="w-full" placeholder="Ingresa Numero de documento de adquisición" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1">
                        Registro estatal:
                    </x-label>

                    <x-input name="state_record" value="{{ old('state_record') }}" class="w-full"
                        placeholder="Ingresa registro estatal" />
                </div>

            </div>

            {{-- Boton de guardar --}}
            <div class="flex justify-end space-x-4 mt-4">
                @hasrole('admin' | 'super-admin')
                    <x-button>
                        Guardar
                    </x-button>
                @endhasrole

                <a class="btn btn-indigo" href="{{ route('vehicles.index') }}">
                    Regresar
                </a>
            </div>

        </form>

    </div>

</x-app-layout>
