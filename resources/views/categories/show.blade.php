<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Categoría - {{ $category->name }}</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">
    <x-navigator :elementos="$elementos" :title="$title" />
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Detalles de la Categoría: {{ $category->name }}</h1>

        <!-- Tabla de Ingresos -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Ingresos</h2>
        <table class="min-w-full table-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="py-3 px-6 text-left">Fecha</th>
                    <th class="py-3 px-6 text-left">Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incomes as $income)
                    <tr class="border-b">
                        <td class="py-3 px-6 text-gray-800">{{ $income->date }}</td>
                        <td class="py-3 px-6 text-gray-800">{{ $income->amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tabla de Gastos -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Gastos</h2>
        <table class="min-w-full table-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="py-3 px-6 text-left">Fecha</th>
                    <th class="py-3 px-6 text-left">Monto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($outcomes as $outcome)
                    <tr class="border-b">
                        <td class="py-3 px-6 text-gray-800">{{ $outcome->date }}</td>
                        <td class="py-3 px-6 text-gray-800">{{ $outcome->taxes }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
