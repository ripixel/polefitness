<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        |--------------------------------------------------------------------------
        | Extend blade so we can run php
        | @php $variable = "whatever"
        | @php executeSomeCommand()
        |--------------------------------------------------------------------------
        */
        Blade::extend(function($value) {
            return preg_replace('/\@php(.+)/', '<?php ${1}; ?>', $value);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}