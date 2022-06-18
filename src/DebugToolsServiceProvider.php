<?php

namespace Akshitarora\DebugTools;

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
    }
}
