<div>
    <input type="checkbox"
           wire:click="$emit('toggleDefault', {{ $row->id }})"
           {{ $row->is_default ? 'checked' : '' }}>
    @if($row->is_default)
        <span class="badge badge-success">Default Plan</span>
    @endif
</div>
