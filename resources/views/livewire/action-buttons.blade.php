<div class="flex space-x-2">
    <button 
        wire:click="edit({{ $row->id }})"
        class="text-blue-500 hover:underline">
        Edit
    </button>
    <button 
        wire:click="delete({{ $row->id }})"
        class="text-red-500 hover:underline">
        Delete
    </button>
</div>
