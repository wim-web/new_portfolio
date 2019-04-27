<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        //varchar(191)に制限する
        Schema::defaultStringLength(191);
    
        //httpsを使用する
        if (\App::environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
