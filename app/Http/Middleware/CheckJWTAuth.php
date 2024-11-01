<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use App\Models\WishList;
use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class CheckJWTAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Retrieve the JWT token from the request header or cookie
        $token = $request->bearerToken() ?? $request->cookie('token');

        if (!$token) {
            return $next($request);
        }
        try {
            // Decode the JWT token
            $decoded = JWTToken::verifyToken($token);
            if ($decoded !== 'unauthorized') {
                Inertia::share('isAuth', true);
                $wishlistCount = WishList::where('user_id', $decoded->userID)->count();
                Inertia::share('wishlistCount', $wishlistCount);

                return $next($request);
            }

        } catch (\Exception $e) {
            return $next($request);
        }
        return $next($request);
    }
}
