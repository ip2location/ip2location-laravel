<?php

namespace Ip2location\IP2LocationLaravel;

use Illuminate\Support\ServiceProvider;

class IP2LocationLaravelServiceProvider extends ServiceProvider
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
        $config = __DIR__.'/Config/ip2locationlaravel.php';

        $this->publishes([
            $config => config_path('ip2locationlaravel.php'),
        ], 'config');

        $this->mergeConfigFrom( $config, 'ip2locationlaravel');

        $this->app['ip2locationlaravel'] = $this->app->share(function($app){
            return new IP2LocationLaravel;
        });
    }
}
