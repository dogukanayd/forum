<?php

namespace App\Providers;

use App\Channel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

Extracting to View Composers

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
       /* Schema::defaultStringLength(191);
        \View::composer('*', function ($view){
            $view->with('channels', \App\Channel::all());
        });*/

        /* @or */
        \View::share('channels', Channel::all() );


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
