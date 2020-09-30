<?php

namespace MichaelThuren\SlackLaravelClient;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/slack-laravel-client.php';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(self::CONFIG_PATH, 'slack-laravel-client');

        $this->app->singleton(Slack::class, function ($app) {
            return new Slack($app['config']->get('slack-laravel-client'));
        });

        $this->app->alias(Slack::class, 'slack');
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([self::CONFIG_PATH => config_path('slack-laravel-client.php')], 'config');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Slack::class];
    }
}
