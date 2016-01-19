<?php

namespace SendPulse\SendPulseLaravel;

use Illuminate\Support\ServiceProvider;
use SendPulse\SendpulseApi;

class SendPulseLaravelServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Setup configuration publishing.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/SendPulseConfig.php' => config_path('sendpulse.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('SendPulse\SendpulseApi', function($app) {

            $config = $app['config']['sendpulse'];

            return (new SendpulseApi($config['apiUserId'], $config['apiSecret'], $config['tokenStorage']));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['SendPulse\SendpulseApi'];
    }
}
