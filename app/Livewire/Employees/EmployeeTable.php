<?php

namespace App\Livewire\Employees;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class EmployeeTable extends DataTableComponent
{
    protected $model = Employee::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        if (Auth::user()->hasRole('super admin|admin')) {
            return [
                Column::make("Id", "id")
                    ->searchable()
                    ->sortable(),

                Column::make("Nombre", "employee_name")
                    ->searchable()
                    ->sortable(),

                Column::make("Numero", "employee_number")
                    ->searchable()
                    ->sortable(),

                Column::make("Nivel", "level.level")
                    ->searchable()
                    ->sortable(),

                Column::make("Puesto", "position_name")
                    ->searchable()
                    ->sortable(),

                Column::make("Dependencia", "dependency.name")
                    ->searchable()
                    ->sortable(),

                Column::make("Dirección gral.", "generalDirection.name")
                    ->searchable()
                    ->sortable(),

                Column::make("Estatus", "status")
                    ->format(function ($value) {
                        return $value ? 'Activo' : 'Inactivo';
                    })
                    ->searchable()
                    ->sortable(),

                LinkColumn::make("Acciones")
                    ->title(fn($row) => 'Editar')
                    ->location(fn($row) => route('employees.edit', $row))
            ];
        } else {
            return [
                Column::make("Id", "id")
                    ->searchable()
                    ->sortable(),

                Column::make("Nombre", "employee_name")
                    ->searchable()
                    ->sortable(),

                Column::make("Numero", "employee_number")
                    ->searchable()
                    ->sortable(),

                Column::make("Nivel", "level.level")
                    ->searchable()
                    ->sortable(),

                Column::make("Puesto", "position_name")
                    ->searchable()
                    ->sortable(),

                Column::make("Dependencia", "dependency.name")
                    ->searchable()
                    ->sortable(),

                Column::make("Dirección gral.", "generalDirection.name")
                    ->searchable()
                    ->sortable(),

                Column::make("Estatus", "status")
                    ->format(function ($value) {
                        return $value ? 'Activo' : 'Inactivo';
                    })
                    ->searchable()
                    ->sortable(),
            ];
        }
        return [
            Column::make("Id", "id")
                ->searchable()
                ->sortable(),

            Column::make("Nombre", "employee_name")
                ->searchable()
                ->sortable(),

            Column::make("Numero", "employee_number")
                ->searchable()
                ->sortable(),

            Column::make("Nivel", "level.level")
                ->searchable()
                ->sortable(),

            Column::make("Puesto", "position_name")
                ->searchable()
                ->sortable(),

            Column::make("Dependencia", "dependency.name")
                ->searchable()
                ->sortable(),

            Column::make("Dirección gral.", "generalDirection.name")
                ->searchable()
                ->sortable(),

            Column::make("Estatus", "status")
                ->format(function ($value) {
                    return $value ? 'Activo' : 'Inactivo';
                })
                ->searchable()
                ->sortable(),

            LinkColumn::make("Acciones")
                ->title(fn($row) => 'Editar')
                ->location(fn($row) => route('employees.edit', $row))

            /* Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(), */
        ];
    }
    public function filters(): array
    {
        return [
            SelectFilter::make('Número')
                ->options([
                    '' => 'Todos',
                    1 => 'Activo',
                    0 => 'Inactivo',
                ])->filter(function ($query, $value) {
                    $query->where('status', $value);
                }),
        ];
    }
}
