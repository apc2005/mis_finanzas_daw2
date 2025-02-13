<x-layouts.index :title="'Añadir Ingreso'">
    @if ($errors->any())
        <x-alert/>
    @endif

    <h1 class="text-xl font-bold mb-4">Añadir Ingreso</h1>
    <form action="{{ route('incomes.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="amount" class="block text-sm font-medium text-gray-700">Cantidad:</label>
            <input type="number" name="amount" id="amount" class="border rounded-md p-2 w-full" value="{{ old('amount') }}" required>
            @error('amount')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Descripción:</label>
            <input type="text" name="category" id="category" class="border rounded-md p-2 w-full" value="{{ old('category') }}" required>
            @error('category')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700">Fecha:</label>
            <input type="date" name="date" id="date" class="border rounded-md p-2 w-full" value="{{ old('date') }}" required>
            @error('date')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <x-button type="submit">Guardar Ingreso</x-button>
    </form>
</x-layouts.index>
