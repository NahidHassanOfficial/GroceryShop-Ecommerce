<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WishListController extends Controller
{
    public function wishList(Request $request)
    {
        $userId = $request->header('id');
        $products = WishList::with(['product.category:id,slug'])
            ->where('user_id', $userId)
            ->get();

        return Inertia::render('Frontend/Profile/WishList', ['products' => $products]);
    }

    public function addWishList(Request $request)
    {
        $userId = $request->header('id');
        $productId = $request->input('productID');
        $wishList = new WishList();
        $wishList->user_id = $userId;
        $wishList->product_id = $productId;
        $wishList->save();
        return 1;

    }

    public function removeWishListItem(Request $request)
    {
        $userId = $request->header('id');
        $productId = $request->input('productID');
        $wishList = WishList::where('user_id', $userId)->where('product_id', $productId)
            ->first();
        if ($wishList) {
            $wishList->delete();
            return 1;
        } else {
            return 0;
        }

    }
}
