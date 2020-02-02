<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::All();
        return view('products.index', compact(['products']));
    }
    public function create()
    {
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:1|max:7',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        Product::create($attributes);

        return redirect('/products');
    }
    public function show(Product $product)
    {
        return redirect()->action(
            'ProductController@edit', ['product' => $product]
        );
    }
    public function edit(Product $product)
    {
        $categories = Category::all();

        $description = Description::all();

        return view('product.edit', compact(['product', 'category', 'description']));
    }
    public function update(Request $request, Product $product)
    {
        $attributes = $request->validate([
            'name' => 'required|min:1|max:7',
            'description' => 'required',
            'category_id' => 'required',
            
        ]);

        $product->update($attributes);

        return redirect('/products');
    }
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products');
    }
}
