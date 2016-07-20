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
        $this->loadViewsFrom(__DIR__ . '/../../../../resources/views', 'career');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../../../resources/lang', 'career');

        // Call pblish redources function
        $this->publishResources();

        include __DIR__ . '/../Http/routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Bind facade
        $this->app->bind('career', function ($app) {
            return $this->app->make('Litecms\Career\Career');
        });

// Bind Job to repository
        $this->app->bind(
            \Litecms\Career\Interfaces\JobRepositoryInterface::class,
            \Litecms\Career\Repositories\Eloquent\JobRepository::class
        );
        // Bind Resume to repository
        $this->app->bind(
            \Litecms\Career\Interfaces\ResumeRepositoryInterface::class,
            \Litecms\Career\Repositories\Eloquent\ResumeRepository::class
        );

        $this->app->register(\Litecms\Career\Providers\AuthServiceProvider::class);
        $this->app->register(\Litecms\Career\Providers\EventServiceProvider::class);
        $this->app->register(\Litecms\Career\Providers\RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['career'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../../../config/config.php' => config_path('package/career.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../../../resources/views' => base_path('resources/views/vendor/career')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../../../resources/lang' => base_path('resources/lang/vendor/career')], 'lang');

        // Publish migrations
        $this->publishes([__DIR__ . '/../../../../database/migrations/' => base_path('database/migrations')], 'migrations');

        // Publish seeds
        $this->publishes([__DIR__ . '/../../../../database/seeds/' => base_path('database/seeds')], 'seeds');

        // Publish public
        $this->publishes([__DIR__ . '/../../../../public/' => public_path('/')], 'uploads');
    }
}
