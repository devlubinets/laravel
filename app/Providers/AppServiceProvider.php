<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
//        dd('Hi');
        Blade::directive('routeactive', function ($route) {
            return "<?php echo \Illuminate\Support\Facades\Route::currentRouteNamed($route) ? ' active' : '' ?>";
        });
    }
}
