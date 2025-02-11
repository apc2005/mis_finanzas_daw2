@props(['tableData', 'routeName', 'models'])

<table class="table-auto w-full border-collapse border border-gray-300">
    <thead>
        <tr>
            @foreach ($tableData['heading'] as $heading)
                <th class="border px-4 py-2">{{ ucfirst($heading) }}</th>
            @endforeach
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tableData['data'] as $index => $row)
            <tr>
                @foreach ($row as $cell)
                    <td class="border px-4 py-2">{{ $cell }}</td>
                @endforeach
                <td class="border px-4 py-2">
                    <!-- Botón Editar -->
                    <a href="{{ route($routeName . '.edit', $models[$index]->id) }}" 
                       class="px-4 py-2 bg-blue-500 text-white rounded mb-2">
                        Edit
                    </a>
                    <br>
                    <!-- Formulario Eliminar -->
                    <form action="{{ route($routeName . '.destroy', $models[$index]->id) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-4 py-2 bg-red-500 text-white rounded mt-2">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
