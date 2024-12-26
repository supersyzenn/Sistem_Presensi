<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::aliasMiddleware('checkRole', \App\Http\Middleware\CheckRole::class);
        Paginator::defaultView('vendor.pagination.tailwind');

        // if (config('app.env') === 'local') {
        //     URL::forceScheme('https');
        // }
    }
}
