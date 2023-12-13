<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categoria',
        'route' => route('admin.categories.index'),
    ],
    [
        'name' => 'Editar categoria',
    ],
]">

    <div class="card">
        <form action="{{ route('admin.categories.update', $category)}}" method="POST">
            @csrf

            @method('PUT')

            {{-- <div class="mb-4">
             <x-label class="mb-2">Familia</x-label>
             <select name="family_id" id="family_id" >
                @foreach ($families as $family)
                <option value="{{$family->id}}">{{$family->name}}</option>
                @endforeach
             </select>
            </div> --}}

            {{-- mostramos los errores de validacion --}}
            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label class="mb-2">Familia</x-label>
                <div class="relative">
                    <x-select>
                        @foreach ($families as $family)
                        <option value="{{ $family->id }}"
                            @selected(old('family_id', $category->family->id) == $family->id)>
                                {{ $family->name }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>

            <div class="mb-4">
                <x-label class="mb-2">
                    Nombre
                </x-label>
                <x-input class="w-full" type="text" name="name" placeholder="Ingrese el nombre de la categoria"
                    value="{{old('name', $category->name)}}"/>
            </div>

            <div class="flex justify-end">
                <x-button>Actualizar</x-button>
            </div>


        </form>
    </div>

</x-admin-layout>
