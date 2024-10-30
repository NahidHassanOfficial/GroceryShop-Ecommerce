<?php

namespace App\Http\Controllers\Auth;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use App\Models\Administrator;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'required|boolean',
        ]);
        try {
            $email = $request->input('email');
            $password = $request->input('password');
            $user = Administrator::where('email', $email)->where('password', $password)->first();
            if ($user) {
                if ($request->input('remember') === true) {
                    $time = time() + 60 * 60 * 24 * 30;
                } else {
                    $time = time() + 60 * 60 * 24;
                }
                $token = JWTToken::createToken($email, $user->id, $time);
                return redirect()->intended(default:route('dashboard'))->cookie('token', $token, $time);
            } else {
                return back()->withErrors(['message' => 'Invalid Credentials']);
            }

        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Something']);
        }
    }
}
