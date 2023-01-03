<?php

namespace App\Providers;


use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        Schema::defaultStringLength(191);
        if (env('APP_ENV') === 'prod'){
            URL::forceScheme('https');
        }
    }
    public function register()
    {
        $this->loadHelpers();
        if (env('APP_ENV') === 'prod'){
            URL::forceScheme('https');
        }
        //
    }
    protected function loadHelpers()
    {
        foreach (glob(__DIR__.'/../Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
}
