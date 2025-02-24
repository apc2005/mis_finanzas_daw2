<x-navigator :elementos="$elementos" :title="$title" />
<x-layouts.index :title="$title">
    <x-alert></x-alert>
    <x-table :columns="$tableData['heading']" :models="$tableData['data']" :routeName="$routeName" />
    <x-button href="{{ route('incomes.create') }}">Add incomes</x-button>
</x-layouts.index>
