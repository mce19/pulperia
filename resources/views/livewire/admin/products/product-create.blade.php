<div class="card">
    <form wire:submit="save">
        <div class="card">
        {{-- mostramos los errores de validacion --}}
        <x-validation-errors class="mb-4" />

        {{-- codigo --}}
        <div class="mb-4">
            <x-label class="mb-2">
                Codigo
            </x-label>
            <x-input class="w-full" placeholder="Ingrese el codigo del producto"
            wire:model.defer="product.sku"/>
        </div>

        {{-- nombre --}}
        <div class="mb-4">
            <x-label class="mb-2">
                Nombre
            </x-label>
            <x-input class="w-full" placeholder="Ingrese el nombre del producto"
            wire:model.defer="product.name"/>
        </div>

        {{-- descripción --}}
        <div class="mb-4">
            <x-label class="mb-2">
                Descripción
            </x-label>
            <x-textarea  class="w-full" placeholder="Ingrese la descripción del producto"
            wire:model.defer="product.description"/>
        </div>

        <div class="mb-4">
            <x-label class="mb-2">Familia</x-label>
            <x-select wire:model.live="family_id">
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
            <x-select wire:model="family_id">
             <option value="" disabled>Seleccione una categoria</option>
                @foreach ($this->categories as $category)
                    <option value="{{ $category->id}}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </x-select> 
        </div>


        <div class="mb-4">
            <x-label class="mb-2">SubCategoria</x-label>
            <x-select wire:model.live="product.subcategory_id">
             <option value="" disabled>Seleccione una Subcategoria</option>
                @foreach ($this->subcategories as $subcategory)
                    <option value="{{ $subcategory->id}}">
                        {{ $subcategory->name }}
                    </option>
                @endforeach
            </x-select> 
        </div>

       



        <div class="flex justify-end">
            <x-button>Guardar</x-button>
        </div>
    </div>
   </form>
</div>


