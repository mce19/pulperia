<div>

    <form wire:submit="store">
        {{-- con {{asset}} nos pocisionamos en la carpeta public del proyecto --}}
        <div class="mb-4">
            <div
                class="w-full sm:w-3/4 md:w-1/2 mx-auto text-center mt-2 justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <figure class="mb-4">
                    <img class="aspect-[16/9] object-cover mx-auto rounded-md"
                        src="{{ $image ? $image->temporaryUrl() : Storage::url($productEdit['image_path']) }}" alt="agregar imagen">
                </figure>
                <x-validation-errors class="mb-4"/>
                <div class="mt-4 text-sm leading-6 text-gray-600">
                    <label
                        class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                        <span>Subir imagen</span>
                        <input accept="image/*" wire:model="image" name="file-upload" type="file" class="sr-only">
                    </label>
                </div>
                <p class="text-xs leading-5 text-gray-600">PNG, JPG, peso maximo de 10MB</p>
            </div>
        </div>
        
        <div class="card">
            {{-- mostramos los errores de validacion --}}
            <x-validation-errors class="mb-4" />

            {{-- codigo --}}
            <div class="mb-4">
                <x-label class="mb-2">
                    Codigo
                </x-label>
                <x-input wire:model.defer="productEdit.sku" class="w-full" placeholder="Ingrese el codigo del producto" />
            </div>

            {{-- nombre --}}
            <div class="mb-4">
                <x-label class="mb-2">
                    Nombre
                </x-label>
                <x-input wire:model.defer="productEdit.name" class="w-full" placeholder="Ingrese el nombre del producto" />
            </div>

            {{-- descripción --}}
            <div class="mb-4">
                <x-label class="mb-2">
                    Descripción
                </x-label>
                <x-textarea wire:model.defer="productEdit.description" class="w-full"
                    placeholder="Ingrese la descripción del producto" />
            </div>

            {{-- familie --}}
            <div class="mb-4">
                <x-label class="mb-2">Familia</x-label>
                <x-select wire:model.live="family_id">
                    <option value="" disabled>Seleccione una familia</option>
                    @foreach ($families as $family)
                        <option value="{{ $family->id }}">
                            {{ $family->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            {{-- categorie --}}
            <div class="mb-4">
                <x-label class="mb-2">Categoria</x-label>
                <x-select wire:model.live="category_id">
                    <option value="" disabled>
                        Seleccione una categoria
                    </option>
                    @foreach ($this->categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            {{-- description --}}
            <div class="mb-4">
                <x-label class="mb-2">SubCategoria</x-label>
                <x-select wire:model.live="productEdit.subcategory_id">
                    <option value="" disabled>Seleccione una Subcategoria</option>
                    @foreach ($this->subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">
                            {{ $subcategory->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>

                {{-- price --}}
                <div class="mb-4">
                    <x-label class="mb-2">
                        Precio
                    </x-label>
                    <x-input wire:model.defer="productEdit.price" 
                    type="number"
                    step="0.01"
                    class="w-full"
                        placeholder="Ingrese el precio del producto" />
                </div>

            <div class="flex justify-end">
                <x-button>
                    Actualizar producto
                </x-button>
            </div>
        </div>
    </form>

</div>
 