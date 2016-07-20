<?php

namespace Litecms\Career\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Litecms\Career\Models\Career;
use Request;

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
    public function boot(Router $router)
    {
        parent::boot($router);

        if (Request::is('*/career/job/*')) {
            $router->bind('job', function ($id) {
                $job = $this->app->make('\Litecms\Career\Interfaces\JobRepositoryInterface');
                return $job->findorNew($id);
            });
        }
if (Request::is('*/career/resume/*')) {
            $router->bind('resume', function ($id) {
                $resume = $this->app->make('\Litecms\Career\Interfaces\ResumeRepositoryInterface');
                return $resume->findorNew($id);
            });
        }

    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require __DIR__ . '/../Http/routes.php';
        });
    }
}
