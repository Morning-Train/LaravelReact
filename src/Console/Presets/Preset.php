<?php

namespace MorningTrain\Laravel\React\Console\Presets;

use Illuminate\Support\Arr;
use Illuminate\Filesystem\Filesystem;
use Laravel\Ui\Presets\React as LaravelPreset;

class Preset extends LaravelPreset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::ensureComponentDirectoryExists();
        static::updatePackages(false);
        static::updatePackages(true);
        static::updateWebpackConfiguration();
        static::updateBootstrapping();
        static::updateComponent();
        static::removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param array $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages, $configurationKey = 'dependencies')
    {
        if ($configurationKey === 'devDependencies') {
            return [
                    "@babel/plugin-proposal-class-properties" => "^7.8.3",
                    "@babel/plugin-proposal-decorators" => "^7.8.3",
                    "@babel/plugin-proposal-export-default-from" => "^7.8.3",
                    "@babel/plugin-proposal-export-namespace-from" => "^7.8.3",
                    "@babel/plugin-proposal-object-rest-spread" => "^7.9.5",
                    "@babel/plugin-proposal-optional-chaining" => "^7.9.0",
                    "@babel/plugin-syntax-dynamic-import" => "^7.8.3",
                    "@babel/plugin-transform-arrow-functions" => "^7.8.3",
                    "@babel/plugin-transform-classes" => "^7.9.5",
                    "@babel/plugin-transform-computed-properties" => "^7.8.3",
                    "@babel/plugin-transform-destructuring" => "^7.9.5",
                    "@babel/plugin-transform-parameters" => "^7.9.5",
                    "@babel/plugin-transform-shorthand-properties" => "^7.8.3",
                    "@babel/plugin-transform-spread" => "^7.8.3",
                    "@babel/plugin-transform-template-literals" => "^7.8.3",
                    "@babel/preset-react" => "^7.9.4",
                    "babel-plugin-webpack-alias" => "^2.1.2",
                    "babel-preset-react" => "^6.24.1",
                    "cross-env" => "^7.0.2",
                    "laravel-mix" => "^5.0.4",
                    "laravel-mix-bundle-analyzer" => "^1.0.5",
                    "moment-locales-webpack-plugin" => "^1.2.0",
                    "moment-timezone-data-webpack-plugin" => "^1.2.0",
                    "resolve-url-loader" => "^3.1.0",
                    "sass" => "^1.26.3",
                    "sass-loader" => "^8.0.0"
                ] + Arr::except($packages, ['vue']);
        }

        if ($configurationKey === 'dependencies') {
            return [
                    "@bugsnag/js" => "^6.5.2",
                    "axios" => "^0.18.1",
                    "canvas-confetti" => "^0.4.2",
                    "cleave.js" => "^1.5.10",
                    "hammerjs" => "^2.0.8",
                    "laravel-echo" => "^1.7.0",
                    "lodash" => "^4.17.15",
                    "lodash-move" => "^1.1.1",
                    "mobx" => "^4.15.4",
                    "mobx-react" => "^5.0.0",
                    "mobx-utils" => "^5.5.7",
                    "moment" => "2.24.0",
                    "moment-timezone" => "^0.5.27",
                    "mt-ajax" => "^1.2.1",
                    "mt-helpers" => "^1.4.0",
                    "mt-react-app" => "^1.4.0",
                    "mt-react-auth" => "^1.5.0",
                    "mt-react-boilerplate" => "^1.0.9",
                    "mt-react-columns" => "^2.3.0",
                    "mt-react-crud" => "^2.0.1",
                    "mt-react-decorators" => "^1.1.4",
                    "mt-react-displays" => "^2.1.0",
                    "mt-react-errors" => "^1.0.3",
                    "mt-react-fields" => "^4.4.0",
                    "mt-react-fields-files" => "^2.0.0",
                    "mt-react-filters" => "^1.6.1",
                    "mt-react-modals" => "^1.3.1",
                    "mt-react-resources" => "^3.0.0",
                    "mt-react-spawner" => "file =>./modules/mt-react-spawner",
                    "mt-resources" => "^1.6.2",
                    "pikaday" => "^1.8.0",
                    "pikaday-time" => "^1.6.1",
                    "popper.js" => "^1.16.1",
                    "prop-types" => "^15.7.1",
                    "pusher-js" => "^4.4.0",
                    "react" => "^16.13.1",
                    "react-contexify" => "^4.1.1",
                    "react-datepicker" => "^2.14.1",
                    "react-dom" => "^16.13.1",
                    "react-quill" => "^1.3.5",
                    "react-toastify" => "^4.5.2",
                    "react-transition-group" => "^4.3.0",
                    "shortid" => "^2.2.15"
                ] + Arr::except($packages, ['vue']);
        }
    }

    /**
     * Update the Webpack configuration.
     *
     * @return void
     */
    protected static function updateWebpackConfiguration()
    {
        copy(__DIR__ . '/stubs/webpack.mix.js', base_path('webpack.mix.js'));
        copy(__DIR__ . '/stubs/webpack.config.js',
            base_path('webpack.config.js'));
    }

    /**
     * Update the example component.
     *
     * @return void
     */
    protected static function updateComponent()
    {
        (new Filesystem)->delete(
            resource_path('js/components/ExampleComponent.vue'),
            resource_path('js/components/Example.js'),
            resource_path('js/bootstrap.js')
        );

        //copy(
        //    __DIR__.'/stubs/Example.js',
        //    resource_path('js/components/Example.js')
        //);
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__ . '/stubs/app.js', resource_path('js/app.js'));
    }
}
