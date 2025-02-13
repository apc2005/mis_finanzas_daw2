<x-navigator :elementos="$elementos" :title="$title" />
<x-layouts.index :title="$title">
  <x-alert></x-alert>
    <x-table :tableData="$tableData" :routeName="$routeName" :models="$models" />
    <x-button href="{{ route('incomes.create') }}">Add Outcome</x-button>
</x-layouts.index>
