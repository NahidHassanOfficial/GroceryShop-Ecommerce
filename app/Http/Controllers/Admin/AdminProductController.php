<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequests;
use App\Models\Category;
use App\Models\Product;

class AdminProductController extends Controller
{
    public function deleteProduct($id)
    {
        try {
            $product = Product::find($id);
            if ($product) {
                foreach ((json_decode($product->image)) as $img) {
                    $oldFile = public_path('images/products/' . $img);
                    if (file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                }
                $product->delete();
                return 1;
            }
        } catch (\Exception $e) {
            return 0;
        }

    }
    public function editProduct(ProductRequests $request)
    {
        $request->validated();

        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->weight = $request->weight;
        $product->size = $request->size == null ? null : json_encode($request->size);
        $product->colors = $request->colors == null ? null : json_encode($request->colors);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->product_code = $request->product_code;
        $product->product_sku = $request->product_sku;
        $product->tag = $request->tag;
        $product->stock = $request->stock;
        $product->status = $request->status == null ? 0 : 1;
        $product->slug = $request->slug;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;

        if ($request->hasFile('image')) {
            $imagesName = [];
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $index => $image) {
                    $fileName = 'product-img-' . time() . $index . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/products'), $fileName);
                    $imagesName[] = $fileName;
                }
            }
            $product->image = json_encode($imagesName);
        }
        if ($product->isDirty() || $request->hasFile('image')) {
            $product->save();
            return redirect()->back();
        }

        return redirect()->back();
    }

    public function editProductPage($id)
    {
        $product = Product::find($id);
        $categories = Category::select('id', 'name')->get();

        return view('components.back-end.edit-product', compact('product', 'categories'));

    }
    public function productsPage()
    {
        $products = Product::with(['category' => function ($query) {
            $query->select('id', 'name', 'slug');
        }])->get();
        return view('components.back-end.product', compact('products'));
    }
    public function productCreatePage()
    {
        $categories = Category::select('id', 'name')->get();

        return view('components.back-end.add-product', compact('categories'));
    }
    public function createProduct(ProductRequests $request)
    {

        $request->validated();

        try {
            $product = new Product();
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->weight = $request->weight;
            $product->size = $request->size == null ? null : json_encode($request->size);
            $product->colors = $request->colors == null ? null : json_encode($request->colors);
            $product->description = $request->description;
            $product->price = $request->price;
            $product->sale_price = $request->sale_price;
            $product->product_code = $request->product_code;
            $product->product_sku = $request->product_sku;
            $product->tag = $request->tag;
            $product->stock = $request->stock;
            $product->status = $request->status == null ? 0 : 1;
            $product->slug = $request->slug;
            $product->meta_title = $request->meta_title;
            $product->meta_description = $request->meta_description;

            $imagesName = [];
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $index => $image) {
                    $fileName = 'product-img-' . time() . $index . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/products'), $fileName);
                    $imagesName[] = $fileName;
                }
            }
            $product->image = json_encode($imagesName);
            $product->save();

            return redirect()->back();

        } catch (\Exception $e) {
            dd($e);

            return redirect()->back();

        }
    }
}
