<?php

use App\Http\Middleware\CheckJWTAuth;
use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //inertia middleware
        $middleware->web(append: [
            HandleInertiaRequests::class,
        ]);

        $middleware->alias([
            'check.auth' => CheckJWTAuth::class,
            'user.auth' => TokenVerificationMiddleware::class,
        ]);

        $middleware->validateCsrfTokens(except: [
            '/payment/success',
            '/payment/failed',
            '/payment/canceled',
            '/payment/ipn',
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
