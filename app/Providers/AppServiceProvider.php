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

    'mongo' => [
    'uri' => env('MONGO_URI'),
    'uriOptions' => env('MONGO_URI_OPTIONS'),
    'driverOptions' => env('MONGO_DRIVER_OPTIONS'),
	],
}
