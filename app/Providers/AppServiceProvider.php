<?php
namespace App\Providers;

use App\Http\Middleware\LoginCheck;
use App\Http\Middleware\AdminCheck;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Reģistrē jebkuru pakalpojumu konteinerā.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Reģistrē maršrutus, middleware un citas globālas konfigurācijas.
     *
     * @return void
     */
    public function boot()
    {
        // Reģistrējot admin_check
        Route::aliasMiddleware('admin_check', AdminCheck::class);
        // Reģistrē login_chack
        Route::aliasMiddleware('login_check', LoginCheck::class);
    }
}


