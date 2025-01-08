<?php

namespace App\Livewire;

use App\Models\Subscription;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Actions\Action;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberFilter;

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
            ->setAdditionalSelects(['id as id'])
            ->setConfigurableAreas([
                
                // 'toolbar-right-start' => 'livewire.add-button',
                'toolbar-right-end' => 'livewire.add-button',
            ]);
    }
    public function addSubcription()
    {
        return redirect()->route('subscriptions.create');
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

    public function filters(): array
    {
        return [
            TextFilter::make('Name') // Search by Name
                ->filter(function ($query, $value) {
                    $query->where('name', 'like', "%$value%");
                }),

            SelectFilter::make('Frequency') // Dropdown for Frequency
                ->options([
                    '' => 'All',
                    'daily' => 'Daily',
                    'weekly' => 'Weekly',
                    'monthly' => 'Monthly',
                    'yearly' => 'Yearly',
                ])
                ->filter(function ($query, $value) {
                    if ($value) {
                        $query->where('frequency', $value);
                    }
                }),

            NumberFilter::make('Trial Days') // Filter by Trial Days
                ->filter(function ($query, $value) {
                    $query->where('trial_days', $value);
                }),

            SelectFilter::make('Active Plans') // Dropdown for Active Plans
                ->options([
                    '' => 'All',
                    '0' => 'Inactive',
                    '1' => 'Active',
                ])
                ->filter(function ($query, $value) {
                    if ($value !== '') {
                        $query->where('active_plans', $value);
                    }
                }),
        ];
    }

    // public function actions(): array
    // {
    //     return [
    //         Action::make('Add Subcription Plan')
    //             ->setRoute('subscriptions/create')->wireNavigate()
    //             ->setLabelAttributes([
    //                 'class' => '',
    //                 'default' => false,
    //             ]),
    //     ];
    // }
    public function edit($id)
    {
        return redirect()->route('subscriptions.edit', $id);
    }

    public function delete($id)
    {
        $subscription = Subscription::find($id);
        if ($subscription) {
            $subscription->delete();
            $this->emit('refreshTable');
        }
    }

    public function toggleDefault($id)
    {
        Subscription::query()->update(['is_default' => false]);
        Subscription::find($id)->update(['is_default' => true]);
    }
}
