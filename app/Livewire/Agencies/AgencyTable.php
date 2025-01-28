<?php

namespace App\Livewire\Agencies;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Agency;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class AgencyTable extends DataTableComponent
{
    protected $model = Agency::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        if (Auth::user()->hasRole('super admin|admin')) {
            return [
                Column::make("Id", "id")
                    ->sortable()
                    ->searchable(),

                Column::make("Numero", "name")
                    ->sortable()
                    ->searchable(),

                Column::make("Estatus", "status")
                    ->format(function ($value) {
                        return $value ? 'Activo' : 'Inactivo';
                    })
                    ->searchable()
                    ->sortable(),

                Column::make("Creado", "created_at")
                    ->format(function ($value) {
                        return $value->format('d/m/Y');
                    })
                    ->sortable(),

                Column::make("Actualizado", "updated_at")
                    ->format(function ($value) {
                        return $value->format('d/m/Y');
                    })
                    ->searchable()
                    ->sortable(),

                LinkColumn::make("Acciones")
                    ->title(fn($row) => 'Editar')
                    ->location(fn($row) => route('agencies.edit', $row))

            ];
        } else {
            return [
                Column::make("Id", "id")
                    ->sortable()
                    ->searchable(),

                Column::make("Numero", "name")
                    ->sortable()
                    ->searchable(),

                Column::make("Estatus", "status")
                    ->format(function ($value) {
                        return $value ? 'Activo' : 'Inactivo';
                    })
                    ->searchable()
                    ->sortable(),

                Column::make("Creado", "created_at")
                    ->format(function ($value) {
                        return $value->format('d/m/Y');
                    })
                    ->sortable(),

                Column::make("Actualizado", "updated_at")
                    ->format(function ($value) {
                        return $value->format('d/m/Y');
                    })
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
