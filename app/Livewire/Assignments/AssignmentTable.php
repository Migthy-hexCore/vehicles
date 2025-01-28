<?php

namespace App\Livewire\Assignments;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Assignment;

class AssignmentTable extends DataTableComponent
{
    protected $model = Assignment::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),

            Column::make("Placas", "vehicle.plates")
                ->sortable(),

            Column::make("Usuario", "employee.employee_name")
                ->sortable(),

            column::make("Estado", "status")
                ->format(function ($value) {
                    return $value == 0 ? "Retirado" : "Asignado";
                })
                ->sortable(),

            Column::make("Asignado", "assigned_at")
                ->sortable(),

            Column::make("Retirado", "returned_at")
                ->sortable(),
        ];
    }
}
