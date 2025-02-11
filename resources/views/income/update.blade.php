<x-navigator :elementos="$elementos" :title="'Edit Income'" />
<x-layouts.index :title="'Edit Income'">
    <div class="container">
        <h2 class="mb-4">Edit Income</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('incomes.update', $income->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $income->date) }}" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $income->category) }}" required>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount', $income->amount) }}" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-layouts.index>
