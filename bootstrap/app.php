<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckAdminMiddleware;
use App\Http\Middleware\CheckAccountStatus;
use Illuminate\Auth\Middleware\Authenticate;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => CheckAdminMiddleware::class,
        ]);
        $middleware->prependToGroup('auth-user', [
            Authenticate::class,
            CheckAccountStatus::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
