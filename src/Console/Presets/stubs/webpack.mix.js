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

mix
    .react('resources/js/app.js', 'public/js')
    .react('resources/js/admin.js', 'public/js')
    .extract()
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .version()
    .sourceMaps();

if (process.env.NODE_ENV === 'development') {
        mix.setResourceRoot(process.env.APP_URL);
}

require('laravel-mix-bundle-analyzer');

if (mix.isWatching() && process.env.DISABLE_WEBPACK_ANALYZER !== 'true') {
        mix.bundleAnalyzer({
                analyzerHost: '0.0.0.0',
                openAnalyzer: false,
        });
}
