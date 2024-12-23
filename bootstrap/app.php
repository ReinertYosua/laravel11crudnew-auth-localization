<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->alias([
        //     App\Http\Middleware\SetLocale::class, // Middleware SetLocale ditambahkan di sini
        // ]);
        $middleware->web([
            \App\Http\Middleware\SetLocale::class,
            // Middleware lainnya
        ]);

        $middleware->alias([
            'CekRole' => \App\Http\Middleware\CekRole::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
