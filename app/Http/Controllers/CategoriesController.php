<?php

namespace App\Http\Controllers;

use App\BookCategories;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category;
        return view('categories.form', compact('category'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|max:50'
        ]);
        
        if (!$category = Category::find(request('id'))) {
            Category::create([
                'name' => request('name')
            ]);
        } else {
            $category->name = request('name');
            $category->save();
        }

        return redirect()->route('categories');
    }

    public function edit(int $id = null)
    {
        $category = Category::findOrFail($id);
        return view('categories.form', compact('category'));
    }

    public function isRelatedToBook(int $id = null)
    {
        
        return intval(BookCategories::where('id_category', $id)->exists());
    }

    public function delete(int $id = null)
    {
        // Se borran las relaciones de libros con la categoria a eliminar
        $relatedBooks = BookCategories::where('id_category', $id)->delete();
        // Se borra la categoria
        Category::destroy($id);
        $message = 'La categoria se eliminó correctamente.';
        return $message;
    }
}
