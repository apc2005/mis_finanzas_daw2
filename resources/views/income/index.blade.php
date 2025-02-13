<x-navigator :elementos="$elementos" :title="$title" />
<x-layouts.index :title="$title">
<x-alert></x-alert>
    <x-table :tableData="$tableData" :routeName="'incomes'" :models="$incomes" />
    <x-button href="{{ route('incomes.create') }}">Add incomes</x-button>
</x-layouts.index>
