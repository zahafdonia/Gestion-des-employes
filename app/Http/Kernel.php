<?php

namespace App\Http;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Console\Commands\HashUserPasswords;
class Kernel extends HttpKernel
{
    /**
     * Les paramètres de middleware global.
     *
     * @var array
     */
    protected $middleware = [

        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Http\Middleware\ValidatePostSize::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ];

    /**
     * Les groupes de middleware.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [

            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        /*'api' => [
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],*/
        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

    ];

    /**
     * Les middlewares d'alias.
     *
     * @var array
     */
    protected $routeMiddleware = [

        'auth' => \App\Http\Middleware\Authenticate::class,
        'role' => \App\Http\Middleware\RoleMiddleware::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'admin' => \App\Http\Middleware\IsAdmin::class,

    ];
    protected $commands = [

        \App\Console\Commands\HashUserPasswords::class,
        HashUserPasswords::class,
    ];

}
