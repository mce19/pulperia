<?php

namespace App\Http\Controllers\Admin;

use App\Models\Family;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')
        ->with('family')
        ->paginate(10);
        
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $families = Family::all();
        return view('admin.categories.create', compact('families'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'family_id' => 'required|exists:families,id',
            'name' => 'required'
        ]);

        Category::create($request->all());

        //    session()->flash('swal', [
        //     'icon' =>'success',
        //     'title' => '¡Bien hecho!',
        //     'text' => 'Categoria creada correctamente.'
        //    ]);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $families = Family::all();
        return view('admin.categories.edit', compact('category', 'families'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
            'family_id' => 'required|exists:families,id',
            'name' => 'required'
        ]);

        //    session()->flash('swal', [
        //     'icon' =>'success',
        //     'title' => '¡Bien hecho!',
        //     'text' => 'Categoria actualizada correctamente.'
        //    ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->subcategoria->count() > 0) {
            //    session()->flash('swal', [
            //     'icon' =>'success',
            //     'title' => '¡Ups!',
            //     'text' => 'No se puede eliminar la categoria porque contiene una subcategoria.'
            //    ]);
            return redirect()->route('admin.categories.edit', $category);
        }

        $category->delete();
        //    session()->flash('swal', [
        //     'icon' =>'success',
        //     'title' => '¡Bien hecho!',
        //     'text' => 'Categoría eliminada correctamente.'
        //    ]);

        return redirect()->route('admin.categories.index', $category);
    }
}
