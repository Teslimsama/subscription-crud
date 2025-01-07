<!-- resources/views/livewire/subscription-crud.blade.php -->
<div>
    <button wire:click="create()" class="btn btn-primary">Create Subscription</button>

    @if($isOpen)
        <div class="modal">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <input type="text" wire:model="name" placeholder="Name" required>
                    <input type="number" step="0.01" wire:model="price" placeholder="Price" required>
                    <input type="date" wire:model="start_date" required>
                    <input type="date" wire:model="end_date" required>
                    <button type="submit">Save</button>
                </form>
                <button wire:click="closeModal()">Close</button>
            </div>
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subscriptions as $subscription)
                <tr>
                    <td>{{ $subscription->name }}</td>
                    <td>{{ $subscription->price }}</td>
                    <td>{{ $subscription->start_date }}</td>
                    <td>{{ $subscription->end_date }}</td>
                    <td>
                        <button wire:click="edit({{ $subscription->id }})">Edit</button>
                        <button wire:click="delete({{ $subscription->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
