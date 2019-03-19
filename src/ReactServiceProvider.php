<?php

namespace MorningTrain\Laravel\React;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use MorningTrain\Laravel\React\Commands\ClearCache;

class ReactServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(ReactService::class, function () {
            return new ReactService();
        });

        $this->commands([
            ClearCache::class
        ]);
    }

    public function boot()
    {

    }


}