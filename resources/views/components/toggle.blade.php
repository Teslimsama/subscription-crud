<button 
    wire:click="toggleDefault({{ $row->id }})"
    class="px-4 py-2 rounded text-white {{ $row->is_default ? 'bg-green-500' : 'bg-gray-500 hover:bg-gray-600' }}">
    {{ $row->is_default ? 'Default' : 'Set Default' }}
</button>
