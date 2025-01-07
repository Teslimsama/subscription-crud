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
    public function builder()
    {
        return Subscription::query();
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')->searchable()->sortable(),
            Column::make('Price', 'price')->sortable(),
            Column::make('Start Date', 'start_date')->sortable(),
            Column::make('End Date', 'end_date')->sortable(),
            Column::make('Actions')
                ->format(fn($value, $column, $row) => view('livewire.partials.actions', ['id' => $row->id])),
        ];
    }
}
