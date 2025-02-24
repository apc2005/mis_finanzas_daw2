<x-navigator :elementos="$elementos" :title="'Edit Income'" />
<x-layouts.index :title="'Edit Income'">
    <div class="container">
        <h2 class="mb-4">Edit Income</h2>

        <x-alert/>
        <form action="{{ route('incomes.update', $income->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700">Cantidad:</label>
                <input type="number" name="amount" id="amount" class="@error('amount') border-red-500 @enderror border rounded-md p-2 w-full" value="{{ old('amount', $income->amount) }}" required>
                @error('amount')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Categoría:</label>
                <select name="category" id="category" class="@error('category') border-red-500 @enderror border rounded-md p-2 w-full" required>
                    <option value="Salary" {{ old('category', $income->category) == 'Salary' ? 'selected' : '' }}>Salary</option>
                    <option value="Freelance" {{ old('category', $income->category) == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                    <option value="Investments" {{ old('category', $income->category) == 'Investments' ? 'selected' : '' }}>Investments</option>
                </select>
                @error('category')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Fecha:</label>
                <input type="date" name="date" id="date" value="{{ old('date', $income->date) }}" class="@error('date') border-red-500 @enderror border rounded-md p-2 w-full" required>
                @error('date')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
    
            <x-button type="submit">Guardar Ingreso</x-button>
        </form>
    </div>
</x-layouts.index>
