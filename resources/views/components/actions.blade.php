<div class="d-flex gap-2">
    <a href="{{ route('subscriptions.show', $row->id) }}" class="btn btn-sm btn-primary">View</a>
    <a href="{{ route('subscriptions.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>
    <button wire:click="delete({{ $row->id }})" class="btn btn-sm btn-danger">Delete</button>
</div>
