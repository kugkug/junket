<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        $app_name = config('custom.app_name');

        view()->composer('*', function($view) use ($app_name) {
            $view->with('app_name', $app_name);
        });
    }
}