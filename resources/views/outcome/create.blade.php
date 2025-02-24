<x-layouts.index :title="'Añadir Gasto'">
    <h1 class="text-xl font-bold mb-4">Añadir Gasto</h1>

        <x-alert/>

  
    <form action="{{ route('outcomes.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="taxes" class="block text-sm font-medium text-gray-700">Cantidad:</label>
            <input type="number" name="taxes" id="taxes" class="border rounded-md p-2 w-full" required>
            @error('taxes')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>
  
        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Descripción:</label>
            <input type="text" name="category" id="category" class="border rounded-md p-2 w-full" required>
            @error('category')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700">Fecha:</label>
            <input type="date" name="date" id="date" class="border rounded-md p-2 w-full" required>
            @error('date')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>
        
        <x-button type="submit">Guardar Gasto</x-button>
    </form>

</x-layouts.index>
