<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subscription;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SubscriptionTable extends Component
{
    // public function render()
    // {
    //     return view('livewire.subscription-table');
    // }
    public $model = Subscription::class;

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->searchable()
                ->sortable(),
            Column::make('Price', 'price')
                ->sortable(),
            Column::make('Frequency', 'frequency')
                ->sortable(),
            Column::make('Trial Days', 'trial_days')
                ->sortable(),
            Column::make('Active Plans', 'active_plans')
                ->sortable(),
            Column::make('Make Default', 'is_default')
                ->format(fn($value, $row) => view('components.toggle', ['row' => $row])),
            Column::make('Action')
                ->format(fn($value, $row) => view('components.actions', ['row' => $row])),
        ];
    }

    public function toggleDefault($id)
    {
        Subscription::query()->update(['is_default' => false]); // Reset all to false
        Subscription::find($id)->update(['is_default' => true]); // Set the selected row to true
    }
}
