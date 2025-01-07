<?php

namespace App\Livewire;

use App\Models\Subscription;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class SubscriptionTable extends DataTableComponent
{
    public $model = Subscription::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
             ->setTableAttributes([
                 'class' => 'table-auto w-full border-collapse border border-gray-200',
             ])
             ->setPaginationEnabled(true)
        ->setAdditionalSelects(['id as id']);;
    }

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
            
            Column::make('Name')
            ->view('livewire.action-buttons'),
        ];
    }


    public function edit($id)
    {
        // Redirect or handle the edit functionality (you can open a modal, for instance)
        return redirect()->route('subscriptions.edit', $id);
    }

    public function delete($id)
    {
        // Delete the record and refresh the table
        $subscription = Subscription::find($id);
        if ($subscription) {
            $subscription->delete();
            // Optionally, emit an event to refresh the table
            $this->emit('refreshTable');
        }
    }

    public function toggleDefault($id)
    {
        // Reset all subscriptions to 'false'
        Subscription::query()->update(['is_default' => false]);

        // Set the selected subscription to 'true'
        Subscription::find($id)->update(['is_default' => true]);
    }
}
