<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Auth;
use View;

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

        Schema::defaultStringLength(191);

        // $users = Auth::user();
        // $extensions = ['.png', '.jpg', '.gif', '.svg', '.jpeg'];
        // dd($users->id);
        // foreach ($extensions as $extension) {
        //     $storagePath = public_path('storage\\photos\\' . $users->id . $extension);

        //     if (file_exists($storagePath)) {
        //         $ext = $extension;
        //     }
        // }
        // View::share('users', $users);
        // View::share('ext', $ext);
        view()->composer('*', function($view)
    {
        if (Auth::check()) {
            $view->with('users', Auth::user());
        }else {
            $view->with('users', null);
        }
    });
    }
}
