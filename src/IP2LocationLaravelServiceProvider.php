<?php

namespace Ip2location\IP2LocationLaravel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class IP2LocationLaravelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('ip2locationlaravel', IP2LocationLaravel::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
		//Dynamically add IP2LocationLaravel alias
		AliasLoader::getInstance()->alias('IP2LocationLaravel', 'Ip2location\IP2LocationLaravel\Facade\IP2LocationLaravel');
		
        $config = __DIR__.'/Config/ip2locationlaravel.php';

        $this->publishes([
            $config => config_path('ip2locationlaravel.php'),
        ], 'config');

        $this->mergeConfigFrom( $config, 'ip2locationlaravel');

        // $this->app['ip2locationlaravel'] = $this->app->share(function($app){
            // return new IP2LocationLaravel;
        // });
    }
}
