<?php

use Illuminate\Foundation\Application;
use Illuminate\Contracts\Http\Kernel as HttpKernel;
use App\Http\Middleware\AdminCheck;

// Make sure that Laravel's application is loaded properly
$app = new Application(
    realpath(__DIR__.'/../')
);

// Register the HttpKernel singleton for handling HTTP requests
$app->singleton(HttpKernel::class, function ($app) {
    return new class($app) extends \Illuminate\Foundation\Http\Kernel {
        protected $middleware = [
            // Add global middleware if needed
        ];

        protected $routeMiddleware = [
            'auth' => \App\Http\Middleware\Authenticate::class,
            'admin_check' => AdminCheck::class,  // Register your custom middleware
        ];
    };
});

// Return the application instance with routing and middleware configurations
return $app->configure()
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function ($middleware) {
        // Add global middleware if needed
    })
    ->withExceptions(function ($exceptions) {
        // Handle exceptions if needed
    })
    ->create();
