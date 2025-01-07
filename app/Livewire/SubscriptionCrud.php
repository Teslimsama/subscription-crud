<?php

namespace App\Livewire;

use App\Models\Subscription;
use Livewire\Component;

class SubscriptionCrud extends Component
{
    // public function render()
    // {
    //     return view('livewire.subscription-crud');
    // }
    public $subscriptions, $name, $price, $start_date, $end_date, $subscription_id;
    public $isOpen = false;

    public function render()
    {
        $this->subscriptions = Subscription::all();
        return view('livewire.subscription-crud');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->price = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->subscription_id = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        Subscription::updateOrCreate(['id' => $this->subscription_id], [
            'name' => $this->name,
            'price' => $this->price,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
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
        $this->start_date = $subscription->start_date;
        $this->end_date = $subscription->end_date;

        $this->openModal();
    }

    public function delete($id)
    {
        Subscription::find($id)->delete();
        session()->flash('message', 'Subscription Deleted Successfully.');
    }
}
