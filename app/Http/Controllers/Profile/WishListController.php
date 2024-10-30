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
        $validatedRequest = $request->validate([
            'user_id' => $request->header('id'),
            'product_id' => $request->input('product_id'),
        ]);
        try {
            WishList::create($validatedRequest);
            return back();
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Something Wrong!']);
        }
    }

    public function removeWishListItem(Request $request)
    {
        $userId = $request->header('id');
        $wishItem = WishList::where('id', $request->input('wishItem_id'))
            ->where('user_id', $userId)
            ->first();
        if ($wishItem) {
            $wishItem->delete();
            return back();
        } else {
            return back()->withErrors(['message' => 'Item not found']);
        }
    }
}
