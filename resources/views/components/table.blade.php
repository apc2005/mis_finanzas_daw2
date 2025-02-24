@props(['columns', 'models', 'routeName'])
<table class="table-auto w-full border-collapse">
    <thead>
        <tr>
            @foreach ($columns as $column)
                <th class="border px-4 py-2">{{ $column }}</th>
            @endforeach
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($models as $model)
            <tr>
                @foreach ($model as $cell)
                    <td class="border px-4 py-2">{{ $cell }}</td>
                @endforeach
                <td class="border px-4 py-2">
                    <a href="{{ route($routeName . '.edit', $model['id']) }}" class="px-4 py-2 bg-blue-500 text-white rounded mb-2">Edit</a>
                    <br>
                    <form action="{{ route($routeName . '.destroy', $model['id']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded mt-2">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
