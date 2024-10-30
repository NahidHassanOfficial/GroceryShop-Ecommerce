<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function categoryPage()
    {
        $categories = Category::withCount('products')->get();
        return inertia('Backend/Categories', ['categories' => $categories]);
    }
    public function createCategory(Request $request)
    {
        $validatedRequest = $request->validate([
            'name' => 'required|max:30',
            'slug' => 'required|alpha_dash|unique:categories,slug',
            'description' => 'required',
            'image' => 'required|image|max:2048',
            'status' => 'boolean',
            'meta_title' => 'required|max:30',
            'meta_desc' => 'required|max:100',
        ]);

        if ($validatedRequest) {
            $category = new Category;
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->description = $request->description;
            $category->status = $request->status == null ? 0 : 1;
            $category->meta_title = $request->meta_title;
            $category->meta_description = $request->meta_desc;

            $image = $request->file('image');
            $imageName = "category" . '-' . $request->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categories'), $imageName);
            $category->image = $imageName;
            $category->save();

            return redirect()->back();
        }

        return redirect()->back();
    }

    public function editCategoryPage($id)
    {
        $category = Category::find($id);
        return view('components.back-end.edit-category', compact('category'));
    }

    public function editCategory(Request $request)
    {
        $validatedRequest = $request->validate([
            'id' => 'required|exists:categories,id',
            'name' => 'required|max:30',
            'slug' => 'required|alpha_dash|unique:categories,slug,' . $request->id,
            'description' => 'required',
            'image' => 'image|max:2048',
            'status' => 'boolean',
            'meta_title' => 'required|max:30',
            'meta_desc' => 'required|max:100',
        ]);
        if ($validatedRequest) {
            $category = Category::find($request->id);
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->description = $request->description;
            $category->status = $request->status == null ? 0 : 1;
            $category->meta_title = $request->meta_title;
            $category->meta_description = $request->meta_desc;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = "category" . '-' . $request->slug . '.' . $image->
                    getClientOriginalExtension();
                $image->move(public_path('images/categories'), $imageName);
                $category->image = $imageName;
            }
            if ($category->isDirty() || $request->hasFile('image')) {
                $category->save();
                return redirect()->back();
            }

            return redirect()->back();
        }

    }

    public function deleteCategory($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
            return 1;
        } catch (\Exception $e) {
            return 0;
        }
    }
}
