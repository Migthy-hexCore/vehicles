<div class="flex flex-col space-y-1">
    @switch($vehicle->assigned)
        @case(\App\Enums\VehicleStatus::Disponible)
            @hasrole('admin|super admin')
                <button wire:click="assignEmployee({{ $vehicle->id }})" class="underline text-indigo-600 dark:text-indigo-300 hover:no-underline">
                    Asignar
                </button>
            @endhasrole
        @break

        @case(\App\Enums\VehicleStatus::Asignado)
            @hasrole('admin|super admin')
                <button wire:click="release({{ $vehicle->id }})" class="underline text-indigo-600 dark:text-indigo-300 hover:no-underline">
                    Liberar
                </button>
            @endhasrole
        @break

        @default
    @endswitch
    <button>
        <a href="{{ route('vehicles.show', $vehicle->id) }}" class="underline text-gray-800 dark:text-gray-300 hover:no-underline">
            Ver detalles
        </a>
    </button>
</div>
