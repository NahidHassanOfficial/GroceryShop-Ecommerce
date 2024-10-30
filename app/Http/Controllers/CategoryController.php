<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryView(Request $request)
    {
        return view('components.front-end.category-page');

    }
}
