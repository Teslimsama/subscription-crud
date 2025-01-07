    <div class="p-6 bg-white shadow rounded">

    {{-- <div>
    <button wire:click="create()" class="px-4 py-2 bg-blue-500 text-white rounded">Add Subscription</button>

    @if ($isOpen)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-lg font-bold">{{ $subscription_id ? 'Edit Subscription' : 'Add Subscription' }}</h2>

                <form wire:submit.prevent="store">
                    <div class="mt-4">
                        <label for="name" class="block text-sm font-medium">Name</label>
                        <input type="text" id="name" wire:model="name" class="block w-full border rounded" />
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-4">
                        <label for="price" class="block text-sm font-medium">Price</label>
                        <input type="number" id="price" wire:model="price" step="0.01" class="block w-full border rounded" />
                        @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-4">
                        <label for="frequency" class="block text-sm font-medium">Frequency</label>
                        <select id="frequency" wire:model="frequency" class="block w-full border rounded">
                            <option value="">Select Frequency</option>
                            <option value="Month">Month</option>
                            <option value="Year">Year</option>
                        </select>
                        @error('frequency') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-4">
                        <label for="trial_days" class="block text-sm font-medium">Trial Days</label>
                        <input type="number" id="trial_days" wire:model="trial_days" class="block w-full border rounded" />
                        @error('trial_days') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-4">
                        <label for="active_plans" class="block text-sm font-medium">Active Plans</label>
                        <input type="checkbox" id="active_plans" wire:model="active_plans" class="block" />
                        @error('active_plans') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-4">
                        <label for="is_default" class="block text-sm font-medium">Is Default</label>
                        <input type="checkbox" id="is_default" wire:model="is_default" class="block" />
                        @error('is_default') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">
                            {{ $subscription_id ? 'Update' : 'Create' }}
                        </button>
                        <button type="button" wire:click="closeModal()" class="px-4 py-2 bg-gray-500 text-white rounded">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    @endif --}}

    {{-- </div> --}}

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="add_table">
                <a href="{{ route('subscriptions.create') }}"
                    class="btn btn-primary text-blue-500 hover:underline">Add</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped mt-6 w-full border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Name</th>
                            <th class="border border-gray-300 px-4 py-2">Price</th>
                            <th class="border border-gray-300 px-4 py-2">Frequency</th>
                            <th class="border border-gray-300 px-4 py-2">Trial Days</th>
                            <th class="border border-gray-300 px-4 py-2">Active Plans</th>
                            <th class="border border-gray-300 px-4 py-2">Is Default</th>
                            <th class="border border-gray-300 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $subscription)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $subscription->name }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $subscription->price }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $subscription->frequency }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $subscription->trial_days }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $subscription->active_plans ? 'Yes' : 'No' }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $subscription->is_default ? 'Yes' : 'No' }}
                                </td>
                                {{-- <td class="border border-gray-300 px-4 py-2">
                                    <button wire:click="edit({{ $subscription->id }})"
                                        class="text-blue-500 hover:underline">Edit</button>
                                    <button wire:click="delete({{ $subscription->id }})"
                                        class="text-red-500 hover:underline">Delete</button>
                                </td> --}}
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="{{ route('subscriptions.edit', $subscription->id) }}" class=" btn text-blue-500 hover:underline">Edit</a>
                                    <button wire:click="delete({{ $subscription->id }})"
                                        class="text-red-500 hover:underline">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
