<?php

namespace Litecms\Career\Providers;

use Illuminate\Support\ServiceProvider;

class CareerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'career');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'career');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // Call pblish redources function
        $this->publishResources();

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'litecms.career');

        // Bind facade
        $this->app->bind('litecms.career', function ($app) {
            return $this->app->make('Litecms\Career\Career');
        });

        // Bind Resume to repository
        $this->app->bind(
            'Litecms\Career\Interfaces\ResumeRepositoryInterface',
            \Litecms\Career\Repositories\Eloquent\ResumeRepository::class
        );
        // Bind Job to repository
        $this->app->bind(
            'Litecms\Career\Interfaces\JobRepositoryInterface',
            \Litecms\Career\Repositories\Eloquent\JobRepository::class
        );

        $this->app->register(\Litecms\Career\Providers\AuthServiceProvider::class);

        $this->app->register(\Litecms\Career\Providers\RouteServiceProvider::class);

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['litecms.career'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../config/config.php' => config_path('litecms/career.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../resources/views' => base_path('resources/views/vendor/career')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/career')], 'lang');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
