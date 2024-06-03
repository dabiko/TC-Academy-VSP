<th wire:click="setSortBy('{{ $columnName }}')" scope="col"
    class="px-6 py-4">
    <button class="flex items-center">
        {{ $displayName }}
        @if($sortBy !== $columnName)
            <x-sort-none />
        @elseif($sortDirection === 'ASC')
            <x-sort-ascending />
        @else
            <x-sort-descending />
        @endif
    </button>
</th>
