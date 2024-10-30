<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserProfileController extends Controller
{
    public function userAddress()
    {
        return Inertia::render('Frontend/Profile/UserAddress');
    }
    public function userOrders()
    {
        return Inertia::render('Frontend/Profile/ProfileOrders');
    }
    public function userInfo(Request $request)
    {
        $userId = $request->header('id');
        $user = User::find($userId)->makeHidden(['id', 'password']);

        return Inertia::render('Frontend/Profile/ProfileSetting', ['user' => $user]);
    }
}
