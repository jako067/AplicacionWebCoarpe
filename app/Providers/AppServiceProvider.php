<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

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
        Blade::if('isadmin',fn() => Auth::user()->rol=== 'admin');
        Blade::if('isadminorforeman',fn() => (Auth::user()->rol=== 'admin')||(Auth::user()->rol=== 'foreman'));

    }
}
