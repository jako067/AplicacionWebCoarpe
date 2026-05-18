<?php

use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\IsForemanMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RoleMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'is_admin' => IsAdminMiddleware::class,
            'is_foreman' => IsForemanMiddleware::class,
            'is_admin_or_foreman' => \App\Http\Middleware\IsAdminOrForemanMiddleware::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
