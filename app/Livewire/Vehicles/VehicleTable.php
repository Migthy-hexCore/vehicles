<?php

namespace App\Livewire\Vehicles;

use App\Enums\AssignmentStatus;
use App\Enums\VehicleStatus;
use App\Models\Assignment;
use App\Models\Employee;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Vehicle;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class VehicleTable extends DataTableComponent
{
    protected $model = Vehicle::class;

    public $employees;

    public $new_assignment = [
        'openModal' => false,
        'vehicle_id' => '',
        'employee_id' => '',
        'comments' => '',
    ];

    public function mount()
    {
        $this->employees = Employee::where('status', 1)->get();
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("No", "id")
                ->searchable()
                ->sortable(),

            Column::make("Placas", "plates")
                ->searchable()
                ->sortable(),

            Column::make("Agencia", "agency.name")
                ->searchable()
                ->sortable(),

            Column::make("Marca", "brand.name")
                ->searchable()
                ->sortable(),

            Column::make("Tipo", "type")
                ->searchable()
                ->sortable(),

            Column::make("Creado", "created_at")
                ->format(function ($value) {
                    return $value->format('d/m/Y');
                })
                ->searchable()
                ->sortable(),

            Column::make("Editado", "updated_at")
                ->format(function ($value) {
                    return $value->format('d/m/Y');
                })
                ->searchable()
                ->sortable(),

            Column::make("Disponibilidad", "assigned")
                ->format(function ($value) {
                    return $value->name;
                })
                ->searchable()
                ->sortable(),

            Column::make("Estatus", "status")
                ->format(function ($value) {
                    return $value ? 'Activo' : 'Inactivo';
                })
                ->searchable()
                ->sortable(),

            Column::make('Acción')
                ->label(function ($row) {
                    return view('vehicles.actions', ['vehicle' => $row]);
                }),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Estatus')
                ->options([
                    '' => 'Todos',
                    1 => 'Activo',
                    0 => 'Inactivo',
                ])->filter(function ($query, $value) {
                    $query->where('vehicles.status', $value);
                }),
            SelectFilter::make('Disponibilidad')
                ->options([
                    '' => 'Todos',
                    0 => 'Disponible',
                    1 => 'Asignado',
                ])->filter(function ($query, $value) {
                    $query->where('vehicles.assigned', $value);
                }),
        ];
    }

    public function assignEmployee(Vehicle $vehicle)
    {
        $this->new_assignment['vehicle_id'] = $vehicle->id;
        $this->new_assignment['openModal'] = true;
    }

    public function release(Vehicle $vehicle)
    {
        $vehicle->assigned = VehicleStatus::Disponible;
        $vehicle->save();

        $assignment = Assignment::where('vehicle_id', $vehicle->id)
            ->whereNull('returned_at')
            ->first();

        $assignment->returned_at = now();
        $assignment->status = AssignmentStatus::Retirado;
        $assignment->save();
    }

    public function customView(): string
    {
        return 'vehicles.modal';
    }

    public function saveAssignment()
    {
        $this->validate([
            'new_assignment.employee_id' => 'required | exists:employees,id',
        ]);

        $vehicle = Vehicle::find($this->new_assignment['vehicle_id']);

        $vehicle->assigned = VehicleStatus::Asignado;
        $vehicle->status = 1;
        $vehicle->save();

        $vehicle->assignments()->create([
            'employee_id' => $this->new_assignment['employee_id'],
            'comments' => $this->new_assignment['comments'],
            'assigned_at' => now(),
        ]);

        $this->reset('new_assignment');
    }
}
