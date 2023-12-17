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
        'name' => 'Nueva Subcategoria',
    ],
]">

    {{-- <div class="card">
        <form action="{{ route('admin.subcategories.store') }}" method="POST">

            @csrf

            
            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label class="mb-2">Categoria</x-label>
                <div class="relative">
                    <x-select name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>
           
            <div class="mb-4">
                <x-label class="mb-2">
                    Nombre
                </x-label>
                <x-input class="w-full" type="text" name="name" placeholder="Ingrese el nombre de la subcategoria"
                    value="{{ old('name') }}" />
            </div>
            <div class="flex justify-end">
                <x-button>Guardar</x-button>
            </div>


        </form>

    </div>  --}}

    @livewire('admin.subcategories.subcategory-create')

</x-admin-layout>
