<div>
    <form wire:submit="save">
        <div class="card">
        {{-- mostramos los errores de validacion --}}
        <x-validation-errors class="mb-4" />

        <div class="mb-4">
            <x-label class="mb-2">Familia</x-label>

            <x-select wire:model.live="subcategoryEdit.family_id">
             <option value="" disabled>Seleccione una familia</option>
                @foreach ($families as $family)
                    <option value="{{ $family->id}}">
                        {{ $family->name }}
                    </option>
                @endforeach
            </x-select> 

        </div>

        <div class="mb-4">
            <x-label class="mb-2">Categoria</x-label>
            <div class="relative">
                <x-select name="category_id" wire:model.live="subcategoryEdit.category_id">
                    <option value="" disabled>Seleccione una categoria</option>
                    @foreach ($this->categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                    @endforeach
                </x-select>
            </div>
        </div>

        <div class="mb-4">
            <x-label class="mb-2">
                Nombre
            </x-label>
            <x-input class="w-full" placeholder="Ingrese el nombre de la subcategoria"
            wire:model.defer="subcategoryEdit.name"/>
            
        </div>
        <div class="flex justify-end">
            <x-button>Actualizar</x-button>
        </div>
    </div>
   </form> 
</div>


