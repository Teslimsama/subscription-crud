<div>
    <div class="p-6 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">{{ $subscriptionId ? 'Edit Subscription Plan' : 'Add Subscription Plan' }}</h2>

    <form wire:submit.prevent="save">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium">Name:</label>
                <input type="text" wire:model="name" class="mt-1 block w-full border rounded" placeholder="Enter Plan Name" />
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Currency:</label>
                <select wire:model="currency" class="mt-1 block w-full border rounded">
                    <option value="">Select Currency</option>
                    <option value="USD">USD</option>
                    <option value="INR">INR</option>
                    <!-- Add more currencies as needed -->
                </select>
                @error('currency') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Price:</label>
                <input type="number" wire:model="price" step="0.01" class="mt-1 block w-full border rounded" placeholder="Enter Price" />
                @error('price') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Frequency:</label>
                <select wire:model="frequency" class="mt-1 block w-full border rounded">
                    <option value="Month">Month</option>
                    <option value="Year">Year</option>
                </select>
                @error('frequency') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Trial Days:</label>
                <input type="number" wire:model="trial_days" class="mt-1 block w-full border rounded" placeholder="Enter Trial Days" />
                @error('trial_days') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mt-6 flex justify-between">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                {{ $subscriptionId ? 'Update' : 'Create' }}
            </button>
            <a href="{{ route('subscriptions.table') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700">
                Cancel to Livewire table
            </a>
            <a href="{{ route('subscriptions.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700">
                Cancel to normal table
            </a>
        </div>
    </form>
</div>
</div>