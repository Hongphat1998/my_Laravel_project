<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // View::share('name',"Phát");    
        // date_default_timezone_set('Asia/Bangkok');    
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
