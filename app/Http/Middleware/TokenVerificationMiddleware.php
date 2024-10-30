<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use App\Helper\Response;
use Closure;
use Illuminate\Http\Request;

class TokenVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->cookie('token');
        $result = JWTToken::verifyToken(token: $token);
        if ($result == "unauthorized") {
            return redirect()->guest(route('user.login'));
        } else {
            $request->headers->set('email', $result->userEmail);
            $request->headers->set('id', $result->userID);
            return $next($request);
        }
    }
}
