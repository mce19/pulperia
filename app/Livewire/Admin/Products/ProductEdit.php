<?php

namespace App\Livewire\Admin\Products;

use App\Models\Family;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Attributes\Computed;
use Livewire\WithFileUploads;

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

    public function render()
    {
        return view('livewire.admin.products.product-edit');
    }
}
