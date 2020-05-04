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
        static::updatePackages();
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
    protected static function updatePackageArray(array $packages)
    {
        return [
                "@babel/plugin-proposal-class-properties"      => "^7.4.0",
                "@babel/plugin-proposal-decorators"            => "^7.4.0",
                "@babel/plugin-proposal-export-default-from"   => "^7.2.0",
                "@babel/plugin-proposal-export-namespace-from" => "^7.2.0",
                "@babel/plugin-transform-arrow-functions"      => "^7.2.0",
                "@babel/preset-react"                          => "^7.0.0",
                "@bugsnag/js"                                  => "^6.0.0",
                "axios"                                        => "^0.18",
                "babel-plugin-webpack-alias"                   => "^2.1.2",
                "babel-preset-react"                           => "^6.24.1",
                "cleave.js"                                    => "^1.4.10",
                "cross-env"                                    => "^5.1",
                "es5-shim"                                     => "*",
                "es6-map"                                      => "^0.1.5",
                "es6-promise"                                  => "^4.2.6",
                "es6-shim"                                     => "*",
                "es6-weak-map"                                 => "^2.0.2",
                "es7-shim"                                     => "*",
                "laravel-mix"                                  => "^4.0.7",
                "laravel-mix-bundle-analyzer"                  => "^1.0.2",
                "laravel-translator"                           => "file:./modules/laravel-translator",
                "mobx"                                         => "^4.9.4",
                "mobx-react"                                   => "^5.3.6",
                "mobx-utils"                                   => "^5.2.0",
                "moment-timezone"                              => "^0.5.23",
                "mt-ajax"                                      => "^1.0.1",
                "mt-helpers"                                   => "^1",
                "mt-react-app"                                 => "^1.0.3",
                "mt-react-boilerplate"                         => "^1.0.9",
                "mt-react-core"                                => "file:./modules/mt-react-core",
                "mt-react-decorators"                          => "^1",
                "mt-react-fields"                              => "file:./modules/mt-react-fields",
                "mt-react-modals"                              => "file:./modules/mt-react-modals",
                "mt-react-polyfill"                            => "file:./modules/mt-react-polyfill",
                "mt-react-resources"                           => "^1.0.5",
                "mt-resources"                                 => "^1.0.1",
                "pikaday"                                      => "^1.8.0",
                "pikaday-time"                                 => "^1.6.1",
                "popper.js"                                    => "^1.15.0",
                "prop-types"                                   => "^15.7.1",
                "pusher-js"                                    => "^4.4.0",
                "react-quill"                                  => "^1.3.3",
                "react-toastify"                               => "^4.5.2",
                "resolve-url-loader"                           => "^2.3.1",
                "sass"                                         => "^1.17.4",
                "sass-loader"                                  => "^7.1.0",
                "shortid"                                      => "^2.2.14",
                "url-search-params-polyfill"                   => "^5.1.0",
            ] + Arr::except($packages, ['vue']);
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
