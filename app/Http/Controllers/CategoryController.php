<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::All();
        return view('categories.index', compact(['categories']));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:2|max:20',
        ]);

        Category::create($attributes);

        return redirect('/categories');
    }
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:2|max:20',
        ]);

        $category->update(request(['name']));

        return redirect('/categories');

    }
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/categories');
    }

}
