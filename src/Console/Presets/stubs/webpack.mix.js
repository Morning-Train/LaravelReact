const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig(require('./webpack.config'));

mix.react('resources/js/app.js', 'public/js')
    .extract(['axios', 'react', 'react-dom', 'mobx', 'mobx-react', 'moment', 'moment-timezone'])
    .sass('resources/sass/app.scss', 'public/css')
    .version()
    .sourceMaps();