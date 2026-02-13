<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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
        if ($this->app->environment('production')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        Inertia::setRootView('app');

        Blade::if('canAccess', function ($permission) {
            $user = auth()->guard()->user();
            return $user && in_array($permission, $user->role->permissions->pluck('name')->toArray());
        });
    }
}