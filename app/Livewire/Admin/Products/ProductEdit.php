<?php

namespace App\Livewire\Admin\Products;

use App\Models\Family;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Storage;

class ProductEdit extends Component
{
    
    use WithFileUploads;

    public $families;
    public $family_id = '';
    public $category_id = '';
    public $product;
    public $productEdit;
    public $image;

    public function mount($product)
    {
        $this->productEdit = $product->only('sku', 'name', 'description', 'image_path', 'price', 'subcategory_id');

        $this->families = Family::all();
        $this->category_id = $product->subcategory->category->id;
        $this->family_id = $product->subcategory->category->family_id;
    }

    // public function boot($value)
    // {
    //     $this->withValidator(function($validator){

    //         if($validator->fails()){

    //             $this->dispatch('swl',[
    //             'icon' => 'error',
    //             'title' => '¡Error!',
    //             'text' => 'El formulario contiene errores varificalo por favor'
    //             ]);
    //         }
    //     });
    // }


    //si seleciono una familia  los select de categoria y subcategoria vuelven a vacion
    public function updatedFamilyId()
    {
        $this->category_id = '';
        $this->productEdit['subcategory_id'] = '';
    }

    //si seleciono una categoria el select de subcategoria vuelven a vacion
    public function updatedCategoryId()
    {

        $this->productEdit['subcategory_id'] = '';
    }

    #[Computed()]
    public function categories()
    {

        return  Category::where('family_id', $this->family_id)->get();
    }


    #[Computed()]
    public function subcategories()
    {

    return  Subcategory::where('category_id', $this->category_id)->get();
    }


    public function store(){

        $this->validate([
            'image' => 'nullable|image|max:1024',
            'productEdit.sku' => 'required|unique:products,sku, ' . $this->product->id,
            'productEdit.name' => 'required|max:255',
            'productEdit.description' => 'required',
            'productEdit.price' => 'required|numeric|min:0',
            'productEdit.subcategory_id' => 'required|exists:subcategories,id',
        ]);
        
        if ($this->image) {
            Storage::delete($this->productEdit['image_path']);

            $this->productEdit['image_path'] = $this->image->store('products');
        }

        $this->product->update($this->productEdit);
    
        // session()->flash('swal', [

        // 'icon' => 'success',
        // 'title' => '¡Producto actualizado!',
        // 'text' => 'El producto se actualizo correctamente',

        // ]);
 
        return redirect()->route('admin.products.index');
    }

    public function render()
    {
        return view('livewire.admin.products.product-edit');
    }
}
