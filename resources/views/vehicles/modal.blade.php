{{-- <x-dialog-modal wire:model="new_assignment.openModal">
    
    <x-slot name="title">
        {{ __('Assign vehicle') }}
    </x-slot>

    <x-slot name="content">
        <x-label>
            Usuario:
        </x-label>

        <x-select class="w-full" wire:model="new_assignment.employee_id">
            <option value="" disabled>
                Selecciona usuario
            </option>
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}">
                    {{ $employee->employee_name }}
                </option>
            @endforeach
        </x-select>

        <x-input-error for="new_assignment.employee_id" />
    </x-slot>

    <x-slot name="footer">
        <x-danger-button wire:click="$set('new_assignment.openModal', false)">
            {{ __('Cancel') }}
        </x-danger-button>

        <x-button class="ml-2" wire:click="saveAssignment">
            {{ __('Save') }}
        </x-button>
    </x-slot>

</x-dialog-modal> --}}


<x-dialog-modal wire:model="new_assignment.openModal" class="dark:bg-gray-800 dark:text-white">
    
    <x-slot name="title">
        <h2 class="dark:text-gray-200">{{ __('Assign vehicle') }}</h2>
    </x-slot>

    <x-slot name="content">
        <x-label class="dark:text-gray-300">
            Usuario:
        </x-label>

        <x-select class="w-full dark:bg-gray-700 dark:text-white dark:border-gray-600" wire:model="new_assignment.employee_id">
            <option value="" disabled class="dark:text-gray-400">
                Selecciona usuario
            </option>
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}" class="dark:bg-gray-700 dark:text-white">
                    {{ $employee->employee_name }}
                </option>
            @endforeach
        </x-select>

        <x-input-error for="new_assignment.employee_id" class="dark:text-red-400" />
    </x-slot>

    <x-slot name="footer">
        <x-danger-button wire:click="$set('new_assignment.openModal', false)"
            class="dark:bg-red-600 dark:hover:bg-red-700 dark:text-white dark:border-gray-600">
            {{ __('Cancel') }}
        </x-danger-button>

        <x-button class="ml-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:text-white dark:border-gray-600"
            wire:click="saveAssignment">
            {{ __('Save') }}
        </x-button>
    </x-slot>

</x-dialog-modal>
