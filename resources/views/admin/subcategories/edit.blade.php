<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Subcategoria',
        'route' => route('admin.subcategories.index'),
    ],
    [
        'name' => 'Editar subcategoria',
    ],
]">


@livewire('admin.subcategories.subcategory-edit', compact('subcategory'))
 

</x-admin-layout>
