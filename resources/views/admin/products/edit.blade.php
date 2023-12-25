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
        'name' => 'Editar Producto',
    ],
]">

    @livewire('admin.products.product-edit', ['product' => $product])

</x-admin-layout>
