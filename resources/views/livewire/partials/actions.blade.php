<div>
    <button wire:click="$emit('edit', {{ $id }})">Edit</button>
    <button wire:click="$emit('delete', {{ $id }})">Delete</button>
</div>