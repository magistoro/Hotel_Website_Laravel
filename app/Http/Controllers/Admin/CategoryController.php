<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
       return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.category.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $category = new Category($data);
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Категория '.$category['title'].' успешно добавлена!');
    }


    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }


    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.category.edit', compact('category', 'categories'));
    }


    public function update(UpdateRequest $request, Category $category)
    {
         // Получаем валидированные данные из формы
         $data = $request->validated(); 
 
         $category->update($data);
 
         return redirect()->route('admin.category.show', $category->id)->with('success', 'Категория '.$category['name'].' успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success',  'Категория '.$category['name'].' успешно удалена!');
    }
}
