<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Producto',
        'route' => route('admin.products.index'),
    ],
    [
        'name' => 'Nuevo Producto',
    ],
]">

    @livewire('admin.products.product-create')

</x-admin-layout>
