<?php

namespace MorningTrain\Laravel\React;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use MorningTrain\Laravel\React\Console\ClearCache;

class ReactServiceProvider extends ServiceProvider
{

    public function register()
    {
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ClearCache::class
            ]);
        }

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'mt-react');

        // Alias views
        Blade::include('mt-react::react', 'react');
    }


}
