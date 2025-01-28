<x-dialog-modal wire:model="new_assignment.openModal" class="dark:bg-gray-800 dark:text-white">

    <x-slot name="title">
        <h2 class="dark:text-gray-200">{{ __('Assign vehicle') }}</h2>
    </x-slot>

    <x-slot name="content">
        <div class="mb-4">
            <x-label class="dark:text-gray-300">
                Usuario:
            </x-label>

            <x-select class="w-full dark:bg-gray-700 dark:text-white dark:border-gray-600"
                wire:model="new_assignment.employee_id">
                <option value="" disabled class="dark:text-gray-400">
                    Selecciona usuario
                </option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" class="dark:bg-gray-700 dark:text-white">
                        {{ $employee->employee_name }}
                    </option>
                @endforeach
            </x-select>
        </div>


        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Comentarios:
        </label>
        <textarea wire:model="new_assignment.comments" id="message" rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Escribe tus comentarios aquí..."></textarea>

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
