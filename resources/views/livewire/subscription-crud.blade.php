    <div class="p-6 bg-white shadow rounded">

 

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            
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
