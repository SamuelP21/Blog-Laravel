<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        //return $category;
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|min:3|unique:categories,name',
            'slug' => 'required|unique:categories,slug',
        ]);
    
         // Guardar los cambios en la base de datos
        Category::create($request->all());

        // Puedes devolver una respuesta de éxito, redireccionar a una página, etc.
        return redirect()->route('admin.category.index')->with('success', 'Categoría creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //return $category;
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //return $request->slug;
        $request->validate([
            'name' => 'required|min:3|unique:categories,name,' .$category->id,
            'slug' => 'required|unique:categories,slug,' .$category->id,
        ]);

            // Guardar los cambios en la base de datos
            $category->update($request->all());

            // Puedes devolver una respuesta de éxito, redireccionar a una página, etc.
            return redirect()->route('admin.category.index')->with('success', 'Categoría actualizada correctamente');
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Categoría a sido borrado correctamente');
    }
}
