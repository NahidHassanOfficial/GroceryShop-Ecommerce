<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::select('name', 'slug', 'image')->get();

        $products = Product::select('id', 'name', 'image', 'price', 'sale_price', 'tag', 'slug', 'category_id')
            ->with(['category:id,name,slug'])
            ->get();

        return Inertia::render('Frontend/Home', ['categories' => $categories, 'products' => $products]);
    }
}
