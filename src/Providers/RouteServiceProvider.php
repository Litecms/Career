<?php

namespace Litecms\Career\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Litecms\Career\Models\Career;
use Request;
use Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Litecms\Career\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param   \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot()
    {
        parent::boot();

        if (Request::is('*/career/resume/*')) {
            Route::bind('resume', function ($resume) {
                $resumerepo = $this->app->make('Litecms\Career\Interfaces\ResumeRepositoryInterface');
                return $resumerepo->findorNew($resume);
            });
        }

        if (Request::is('*/career/job/*')) {
            Route::bind('job', function ($job) {
                $jobrepo = $this->app->make('Litecms\Career\Interfaces\JobRepositoryInterface');
                return $jobrepo->findorNew($job);
            });
        }

    }

    /**
     * Define the routes for the package.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the package.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        if (request()->segment(1) == 'api' || request()->segment(2) == 'api') {
            return;
        }
        
        Route::group([
            'middleware' => 'web',
            'namespace'  => $this->namespace,
            'prefix'     => trans_setlocale(),
        ], function ($router) {
            require (__DIR__ . '/../../routes/web.php');
        });
    }

}
