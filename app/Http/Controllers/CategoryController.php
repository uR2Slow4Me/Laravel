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
}
