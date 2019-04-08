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
    .extract([
        '@bugsnag/js',
        'axios',
        'cleave.js',
        'lodash',
        'mobx',
        'mobx-react',
        'mobx-utils',
        'moment',
        'moment-timezone',
        'pikaday',
        'pikaday-time',
        'prop-types',
        'pusher-js',
        'react',
        'react-dom',
        'react-quill',
        'react-toastify',
        'shortid',
        "mt-ajax",
        "mt-helpers",
        "mt-react-app",
        "mt-react-core",
        "mt-react-decorators",
        "mt-react-errors",
        "mt-react-filters",
        "mt-react-fields",
        "mt-react-modals",
        "mt-react-polyfill",
        "mt-react-resources",
        "mt-resources",
    ])
    .sass('resources/sass/app.scss', 'public/css')
    .version()
    .sourceMaps();

require('laravel-mix-bundle-analyzer');
//if (mix.isWatching()) {
mix.bundleAnalyzer({
    openAnalyzer: false,
});
//}
