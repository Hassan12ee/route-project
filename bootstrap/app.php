<?php

use App\Http\Middleware\Api_Auth;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\lang;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\App;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        
        $middleware->alias([
            'Isadmin' => IsAdmin::class,
            'Api_Auth' => Api_Auth::class,
         

        ]);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
    $locale = env('APP_LOCALE', 'en');
    App::setLocale($locale);
    $app->middleware([
        \App\Http\Middleware\lang::class,
    ]);