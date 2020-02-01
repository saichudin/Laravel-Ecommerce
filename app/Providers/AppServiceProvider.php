<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->concord->registerModel(\Konekt\User\Contracts\User::class, \App\User::class);
        //$this->app->concord->registerModel(\Vanilo\Product\Contracts\Product::class, \App\Product::class);
    }
}
