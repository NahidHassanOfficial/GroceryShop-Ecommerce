<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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

    public function updateProfileInfo()
    {
        $user_id = request()->header('id');
        $validatedRequest = request()->validate([
            'firstName' => 'required|between:4,20',
            'lastName' => 'between:4,10',
            'email' => 'required|email',
            'phone' => 'required|digits:11|numeric',
            Rule::unique('users', 'email')->ignore($user_id),
        ]);
        try {
            $user = User::find($user_id);
            $user->fill($validatedRequest);
            if ($user->isDirty()) {
                $user->save();
                return back();
            } else {
                return back()->withErrors(['message' => 'No changes made!']);
            }

        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Something Wrong!']);
        }

    }

    public function updateProfilePasswd()
    {
        $user_id = request()->header('id');
        $validatedRequest = request()->validate([
            'currentPass' => 'required',
            'newPass' => 'required|min:8',
        ]);

        try {
            $user = User::find($user_id);
            if ($user->password == $validatedRequest['currentPass']) {
                $user->password = $validatedRequest['newPass'];
                $user->save();
                return back();
            } else {
                return back()->withErrors(['message' => 'Password validation failed']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Something Wrong!']);
        }
    }

    public function profileDelete()
    {
        $user_id = request()->header('id');
        try {
            $user = User::find($user_id);
            if ($user->password == request()->input('password')) {
                $user->delete();
                return redirect()->route('index')->cookie('token', '', -1);
            } else {
                return back()->withErrors(['message' => 'Password validation failed']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Something Wrong!']);
        }
    }
}
