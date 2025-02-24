<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">
    <x-navigator :elementos="$elementos" :title="$title" />
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Lista de Categorías</h1>

        <!-- Table -->
        <table class="min-w-full table-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="py-3 px-6 text-left">Categoría</th>
                    <th class="py-3 px-6 text-left">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="border-b">
                        <td class="py-3 px-6 text-gray-800">{{ $category->name }}</td> <!-- Mostrar solo el nombre de la categoría -->
                        <td class="py-3 px-6">
                            <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="text-blue-500 hover:text-blue-700 font-semibold">Ver Ingresos</a> <!-- Usar el ID de la categoría -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
