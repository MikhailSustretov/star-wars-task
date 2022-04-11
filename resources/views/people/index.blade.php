<x-layout>
    <x-header-text>Star Wars Persons Table</x-header-text>

    @component('components.people-table', ['column_names' => $column_names, 'people'=>$people]) @endcomponent
</x-layout>
