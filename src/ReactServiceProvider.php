<?php

namespace MorningTrain\Laravel\React;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;
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

        UiCommand::macro('react', function ($command) {

            Preset::install();

            $command->info('Morningtrain React scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }


}
