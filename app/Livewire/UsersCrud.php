<?php

namespace App\Livewire;
// use App\Livewire\UsersCrud;
use App\Models\User;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UsersCrud extends Component
{
    // public function render()
    // {
    //     return view('livewire.users-crud');
    // }

    // protected $model = User::class;

    // public function configure(): void
    // {
    //     $this->setPrimaryKey('id');
    // }

    // public function columns(): array
    // {
    //     return [
    //         Column::make('Name')
    //         ->sortable()
    //             ->searchable(),
    //         Column::make('E-mail', 'email')
    //         ->sortable()
    //             ->searchable(),
    //         Column::make('Address', 'address.address')
    //         ->sortable()
    //             ->searchable()
    //             ->collapseOnTablet(),
    //     ];
    // }
    public function builder()
    {
        return User::query();
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')->searchable()->sortable(),
            Column::make('Email', 'email')->sortable(),
           
        ];
    }
}
