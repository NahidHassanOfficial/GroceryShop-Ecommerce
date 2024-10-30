<?php

namespace App\Http\Controllers\Auth;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedRequest = $request->validate([
            'firstName' => 'required|between:4,20',
            'lastName' => 'sometimes|between:4,10',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:11|numeric',
            'password' => 'required|min:8',
        ]);

        try {
            $user = User::create($validatedRequest);
            return redirect()->route('user.login')->with('success', 'Registration successful');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Something Wrong!']);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'remember' => 'required|boolean',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->where('password', $password)->first();
        if ($user) {
            if ($request->input('remember') === true) {
                $time = time() + 60 * 60 * 24 * 30;
            } else {
                $time = time() + 60 * 60 * 24;
            }
            $token = JWTToken::createToken($email, $user->id, $time);
            $intendedUrl = $request->session()->pull('intended_url');
            return redirect()->intended($intendedUrl ?? route('profile'))->cookie('token', $token, $time);
        } else {
            return back()->withErrors(['message' => 'Invalid Credentials']);
        }
    }

    public function logout()
    {
        return redirect(route('index'))->cookie('token', '', -1);
    }
}
