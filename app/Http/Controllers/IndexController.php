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

    public function categoryList()
    {
        $categories = Category::select('name', 'slug')->get();
        return $categories;
    }

    public function search()
    {
        $searchText = request()->searchText;
        $products = "";
        if ($searchText != "") {
            $products = Product::where('name', 'like', "%" . $searchText . "%")
                ->orWhere('description', 'like', "%" . $searchText . "%")
                ->select('name', 'image', 'slug', 'category_id')
                ->with(['category:id,name,slug'])
                ->limit(5)->get();
        }

        return $products;
    }
}
