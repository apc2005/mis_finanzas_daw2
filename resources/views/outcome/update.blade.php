<x-navigator :elementos="$elementos" :title="'Edit Outcome'" />
<x-layouts.index :title="'Edit Outcome'">
    <div class="container">
        <h2 class="mb-4">Edit Outcome</h2>

        <x-alert/>
        <form action="{{ route('outcomes.update', $outcome->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $outcome->date) }}" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $outcome->category) }}" required>
                @error('category')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="taxes" class="form-label">Taxes</label>
                <input type="number" class="form-control" id="taxes" name="taxes" value="{{ old('taxes', $outcome->taxes) }}" step="0.01" required>
                @error('taxes')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-layouts.index>
