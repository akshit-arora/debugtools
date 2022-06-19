<?php

namespace AkshitArora\DebugTools;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class DebugToolsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/debugtools.php' => config_path('debugtools.php'),
        ]);

        $this->registerRoutes();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'debugtools');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/debugtools.php', 'debugtools');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function() {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('debugtools.route_prefix'),
            'middleware' => config('debugtools.route_middleware'),
        ];
    }
}
