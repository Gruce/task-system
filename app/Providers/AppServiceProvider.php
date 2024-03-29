<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;    // Must Must use
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->is_admin == 1;
        });

        Blade::if('employee', function () {
            return auth()->check() && auth()->user()->is_admin == 0;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
