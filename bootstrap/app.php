<?php

use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsModerator;
use App\Http\Middleware\moderatorAccessToUser;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => IsAdmin::class,
            'moderator' => IsModerator::class,
            'moderatorAccessToUser' => moderatorAccessToUser::class,
            'throttleRedirect' => \App\Http\Middleware\RedirectOnThrottle::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
