<?php

namespace MorningTrain\Laravel\React;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use MorningTrain\Laravel\React\Console\ClearCache;
use MorningTrain\Laravel\React\Console\Presets\Preset;

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

        Command::macro('mt-react', function ($command) {
            Preset::install();

            $command->info('Morningtrain React scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }


}
