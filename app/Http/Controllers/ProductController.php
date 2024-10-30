<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productView(Request $request, $categorySlug, $productSlug)
    {

        $product = Product::select('products.*', 'categories.name as categoryName', 'categories.slug as categorySlug')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.slug', $productSlug)
            ->first();
        return view('components.front-end.product-page', compact('product'));
    }

    public function productInfo($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }
}
