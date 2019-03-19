<?php

namespace MorningTrain\LaravelReact;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use MorningTrain\LaravelReact\Commands\ClearCache;

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