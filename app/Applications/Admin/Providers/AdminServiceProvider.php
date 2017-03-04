<?php

namespace App\Applications\Admin\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Applications\Admin\Http\Controllers';


    public function boot()
    {
        $this->registerRoutes($this->app['router']);
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'admin');
        $this->loadTranslationsFrom('', 'adminlte_lang');
    }

    protected function registerRoutes(Router $router)
    {
        $options = [
            'namespace' => $this->namespace,
            'middleware' => ['web', 'auth'],
            'prefix' => 'painel',
            'as' => 'admin.',
        ];

        $router->group($options, function ($router) {
            require app_path('Applications/Admin/routes/web.php');
        });
    }

}