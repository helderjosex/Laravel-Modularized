<?php

namespace App\Applications\Api\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Applications\Api\Http\Controllers';


    public function boot()
    {
        $this->registerRoutes($this->app['router']);

    }

    protected function registerRoutes(Router $router)
    {
        $options = [
            'namespace' => $this->namespace,
            'middleware' => 'api',
            'prefix' => 'api',
            'as' => 'api.',
        ];

        $router->group($options, function ($router) {
            require app_path('Applications/Api/routes/api.php');
        });
    }

}