<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Default path for redirection after login or register
     */
    public const HOME = '/dashboard'; // default fallback

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        // Ini penting untuk route file
        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
        });
    }
}
