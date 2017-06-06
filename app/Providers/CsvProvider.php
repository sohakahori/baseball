<?php

namespace App\Providers;

use App\Lib\CsvDetail;

use Illuminate\Support\ServiceProvider;

class CsvProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton('csv', 'App\Lib\CSV');
    }
}
