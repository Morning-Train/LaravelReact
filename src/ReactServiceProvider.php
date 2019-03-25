<?php

namespace MorningTrain\Laravel\React;

use Illuminate\Support\ServiceProvider;
use MorningTrain\Laravel\React\Commands\ClearCache;

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
    }


}
