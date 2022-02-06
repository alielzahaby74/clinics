<?php

namespace App\Providers;

use App\Facades\Constants;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('constants', function (){
            return new \app\Helpers\Constants;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
