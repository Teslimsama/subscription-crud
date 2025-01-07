<?php

namespace App\Livewire;

use App\Models\Subscription;
use Livewire\Component;

class SubscriptionForm extends Component
{
    public $subscriptionId; // For editing
    public $name, $price, $frequency, $trial_days, $currency;

    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'frequency' => 'required|string|in:Month,Year',
        'trial_days' => 'required|integer|min:0',
        'currency' => 'required|string',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $subscription = Subscription    ::findOrFail($id);
            $this->subscriptionId = $subscription->id;
            $this->name = $subscription->name;
            $this->price = $subscription->price;
            $this->frequency = $subscription->frequency;
            $this->trial_days = $subscription->trial_days;
            $this->currency = $subscription->currency;
        }
    }

    public function save()
    {
        $this->validate();

        Subscription::updateOrCreate(
            ['id' => $this->subscriptionId],
            [
                'name' => $this->name,
                'price' => $this->price,
                'frequency' => $this->frequency,
                'trial_days' => $this->trial_days,
                'currency' => $this->currency,
            ]
        );

        session()->flash('message', $this->subscriptionId ? 'Subscription updated successfully!' : 'Subscription created successfully!');

        return redirect()->route('subscriptions.index');
    }

    public function render()
    {
        return view('livewire.subscription-form');
    }
}
