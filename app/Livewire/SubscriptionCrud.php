<?php

namespace App\Livewire;

use App\Models\Subscription;
use Livewire\Component;

class SubscriptionCrud extends Component
{
    public $subscriptions, $name, $price, $frequency, $trial_days, $active_plans, $is_default, $subscription_id;
    public $isOpen = false;

    public function render()
    {
        $this->subscriptions = Subscription::all();
        return view('livewire.subscription-crud');
    }

    public function create()
    {
        $this->resetInputFields();
        // $this->openModal();
    }

    // public function openModal()
    // {
    //     $this->isOpen = true;
    // }

    // public function closeModal()
    // {
    //     $this->isOpen = false;
    // }

    public function resetInputFields()
    {
        $this->name = '';
        $this->price = '';
        $this->frequency = '';
        $this->trial_days = '';
        $this->active_plans = false;
        $this->is_default = false;
        $this->subscription_id = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'frequency' => 'required|string|in:Month,Year',
            'trial_days' => 'required|integer|min:0',
            'active_plans' => 'boolean',
            'is_default' => 'boolean',
        ]);

        Subscription::updateOrCreate(['id' => $this->subscription_id], [
            'name' => $this->name,
            'price' => $this->price,
            'frequency' => $this->frequency,
            'trial_days' => $this->trial_days,
            'active_plans' => $this->active_plans,
            'is_default' => $this->is_default,
        ]);

        session()->flash(
            'message',
            $this->subscription_id ? 'Subscription Updated Successfully.' : 'Subscription Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $subscription = Subscription::findOrFail($id);
        $this->subscription_id = $id;
        $this->name = $subscription->name;
        $this->price = $subscription->price;
        $this->frequency = $subscription->frequency;
        $this->trial_days = $subscription->trial_days;
        $this->active_plans = $subscription->active_plans;
        $this->is_default = $subscription->is_default;

        // $this->openModal();
    }

    public function delete($id)
    {
        Subscription::find($id)->delete();
        session()->flash('message', 'Subscription Deleted Successfully.');
    }
}
