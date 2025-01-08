<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UsersTable extends Component
{
    // public function render()
    // {
    //     return view('livewire.users-table');
    // }
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableAttributes([
                'class' => 'table-auto w-full border-collapse border border-gray-200',
            ])
            ->setPaginationEnabled(true)
            ->setAdditionalSelects(['id as id']);
    }
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable(),
            Column::make('Name', 'name')
            ->sortable()
                ->searchable(),
            Column::make('Email', 'email')
            ->sortable()
                ->searchable(),
            Column::make('Created At', 'created_at')
            ->sortable(),
        ];
    }

    public function query()
    {
        return User::query();
    }
}
