<?php

namespace App\Providers;

use Connections\UserV2\UserService;
use Illuminate\Support\ServiceProvider;

class UserV2ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserService::class, function ($app) {
            return new UserService(
                config('services.user-v2.url')
            );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
