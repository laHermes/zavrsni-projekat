<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {

        View::composer('profile', 'App\Http\ViewComposers\ProfileComposer');

        View::composer('dashboard', function($view)
        {

        });
    }

    /**
     * Register services.
     *
    //  * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
    //  * @return void
     */
}
