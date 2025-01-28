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
        'name' => 'Ver detalles de: ' . $vehicle->plates,
    ],
]">

    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-8 text-center">
            Detalles del Vehículo
        </h2>

        <div class="grid grid-cols-1 mb-6">
            <div
                class="bg-gray-50 dark:bg-gray-700 p-1 rounded-lg shadow-sm border border-gray-200 dark:border-gray-600">
                <p class="text-sm font-bold text-indigo-600 dark:text-indigo-400 uppercase tracking-wide text-center">
                    Asignado a :
                </p>
                <p class="text-lg font-semibold text-gray-800 dark:text-gray-300 mt-1 text-center">
                    @if ($vehicle->assigned == \App\Enums\VehicleStatus::Asignado)
                        {{ $vehicle->lastAssignment->employee->employee_name }}
                    @else
                        <span class="text-red-400">Sin asignar</span>
                    @endif
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach ([
        'Sociedad' => $vehicle->society->name,
        'Número de activo fijo' => $vehicle->fixed_asset_number,
        'Número de control' => $vehicle->control_number,
        'División' => $vehicle->division->name,
        'Placas' => $vehicle->plates,
        'Número de Serie' => $vehicle->serial_number,
        'Número de factura' => $vehicle->invoice_number,
        'Número de motor' => $vehicle->engine_number,
        'Agencia' => $vehicle->agency->name,
        'Marca' => $vehicle->brand->name,
        'Tipo' => $vehicle->type,
        'Modelo' => $vehicle->model,
        'Cilindros' => $vehicle->cylinders,
        'Puertas' => $vehicle->doors,
        'Función' => $vehicle->function,
        'Pasajeros' => $vehicle->passenger_capacity,
        'Transmisión' => $vehicle->transmission,
        'Color' => $vehicle->color,
        'Nivel vehicular' => $vehicle->vehicle_level,
        'Propiedad' => $vehicle->ownership,
        'Registro estatal' => $vehicle->state_record,
        'Fecha de adquisición' => $vehicle->acquisition_date,
        'Estatus' => $vehicle->status ? 'Activo' : 'Inactivo',
        'Valor de adquisición' => '$' . $vehicle->acquisition_value . ' MXN',
    ] as $label => $value)
                <div
                    class="bg-gray-50 dark:bg-gray-700 p-1 rounded-lg shadow-sm border border-gray-200 dark:border-gray-600">
                    <p
                        class="text-sm font-bold text-indigo-600 dark:text-indigo-400 uppercase tracking-wide text-center">
                        {{ $label }} :
                    </p>
                    @isset($value)
                        <p class="text-lg font-semibold text-gray-800 dark:text-gray-300 mt-1 text-center truncate"
                            title="{{ $value }}">
                            {{ $value }}
                        </p>
                    @else
                        <p class="text-lg font-semibold text-red-400 mt-1 text-center">
                            Sin información
                        </p>
                    @endisset
                </div>
            @endforeach
        </div>

        <div class="flex justify-center space-x-4 mt-8">
            <a href="{{ route('vehicles.index') }}"
                class="px-6 py-3 bg-indigo-600 dark:bg-indigo-500 text-white font-semibold rounded-lg hover:bg-indigo-700 dark:hover:bg-indigo-600 transition shadow-md">
                Ver todos los vehículos
            </a>
            @hasrole('admin' | 'super-admin')
                <a href="{{ route('vehicles.edit', $vehicle) }}"
                    class="px-6 py-3 bg-blue-600 dark:bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition shadow-md">
                    Editar
                </a>
            @endhasrole
        </div>
    </div>

</x-app-layout>
