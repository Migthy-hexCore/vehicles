<?php

namespace App\Livewire\Users;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),

            Column::make("Name", "name")
                ->sortable(),

            Column::make("Email", "email")
                ->sortable(),

            Column::make("Estatus", "status")
                ->format(function ($value) {
                    return $value ? 'Activo' : 'Inactivo';
                })
                ->searchable()
                ->sortable(),

            Column::make("Created at", "created_at")
                ->sortable(),

            Column::make("Updated at", "updated_at")
                ->sortable(),

            LinkColumn::make("Acciones")
                ->title(fn($row) => 'Editar')
                ->location(fn($row) => route('users.edit', $row))
        ];
    }
}
