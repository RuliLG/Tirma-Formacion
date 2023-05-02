<div>
    <input type="text" wire:model="query" placeholder="Search by name..." class="bg-white border border-gray-300 w-full p-4 rounded">
    <table class="w-full mt-8">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>¿Está activa?</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td class="px-4 py-2">{{ $category->name }}</td>
                <td class="px-4 py-2">
                    @if ($category->is_active)
                    <svg class="text-green-500 h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    @else
                    <svg class="text-red-500 h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    @endif
                </td>
                <td>
                    <a href="{{ route('categories.show', ['category' => $category->id]) }}">Ver</a>
                    <form method="POST" action="{{ route('categories.destroy', ['category' => $category->id]) }}" x-data="{ confirm: false }">
                        @csrf
                        @method('DELETE')
                        <button type="button" x-show="!confirm" x-on:click="confirm = true">Eliminar</button>
                        <button type="submit" x-show="confirm">Confirmar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
