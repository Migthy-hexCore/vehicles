<?php

namespace App\Livewire\Directions;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\GeneralDirection;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class DirectionTable extends DataTableComponent
{
    protected $model = GeneralDirection::class;

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

                Column::make("Nombre", "name")
                    ->searchable()
                    ->sortable(),

                Column::make("Código programatico", "program_code")
                    ->searchable()
                    ->sortable(),

                Column::make("Estatus", "status")
                    ->format(function ($value) {
                        return $value ? 'Activo' : 'Inactivo';
                    })
                    ->searchable()
                    ->sortable(),

                Column::make("Creado", "created_at")
                    ->searchable()
                    ->sortable(),

                Column::make("Editado", "updated_at")
                    ->searchable()
                    ->sortable(),

                LinkColumn::make("Acciones")
                    ->title(fn($row) => 'Editar')
                    ->location(fn($row) => route('directions.edit', $row))
            ];
        } else {
            return [
                Column::make("Id", "id")
                    ->searchable()
                    ->sortable(),

                Column::make("Nombre", "name")
                    ->searchable()
                    ->sortable(),

                Column::make("Código programatico", "program_code")
                    ->searchable()
                    ->sortable(),

                Column::make("Estatus", "status")
                    ->format(function ($value) {
                        return $value ? 'Activo' : 'Inactivo';
                    })
                    ->searchable()
                    ->sortable(),

                Column::make("Creado", "created_at")
                    ->searchable()
                    ->sortable(),

                Column::make("Editado", "updated_at")
                    ->searchable()
                    ->sortable(),
            ];
        }
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
                    $query->where('status', $value);
                }),
        ];
    }
}
