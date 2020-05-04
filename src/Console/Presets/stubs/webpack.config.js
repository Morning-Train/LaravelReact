const path = require('path');
const MomentLocalesPlugin = require('moment-locales-webpack-plugin');
const MomentTimezoneDataPlugin = require('moment-timezone-data-webpack-plugin');

module.exports = {
    resolve: {
        extensions: ['.js', '.json', '.vue'],
        alias: {
            'layouts': path.resolve(process.cwd(), 'resources/js/layouts'),
            'pages': path.resolve(process.cwd(), 'resources/js/pages'),
            'services': path.resolve(process.cwd(), 'resources/js/services'),
            'support': path.resolve(process.cwd(), 'resources/js/support'),
            'templates': path.resolve(process.cwd(), 'resources/js/templates'),
            'widgets': path.resolve(process.cwd(), 'resources/js/widgets'),
            'helpers': path.resolve(process.cwd(), 'resources/js/helpers')
        }
    },
    module: {
        rules: [
            {
                test: /\.m?js$/,
                exclude: /node_modules\/(?!(mt-.*)\/).*/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: [
                            "@babel/react"
                        ],
                        plugins: [
                            "@babel/plugin-syntax-dynamic-import",
                            "babel-plugin-webpack-alias",
                            "@babel/plugin-transform-arrow-functions",
                            "@babel/plugin-proposal-export-namespace-from",
                            "@babel/plugin-proposal-export-default-from",
                            ["@babel/plugin-proposal-decorators", { "legacy": true }],
                            ["@babel/plugin-proposal-class-properties", { "loose" : true }],
                            ["@babel/plugin-transform-spread", { "loose" : false }],
                            "@babel/plugin-transform-destructuring",
                            "@babel/plugin-proposal-object-rest-spread",
                            "@babel/plugin-transform-shorthand-properties",
                            "@babel/plugin-transform-parameters",
                            "@babel/plugin-transform-template-literals",
                            "@babel/plugin-transform-classes",
                            "@babel/plugin-proposal-optional-chaining",
                            "@babel/plugin-transform-computed-properties",
                        ]
                    }
                }
            }
        ]
    },
    optimization: {
        splitChunks: {
            name: 'vendor',
            minChunks: 2
        }
    },
    plugins: [
        new MomentLocalesPlugin({
            localesToKeep: ['en', 'da'],
        }),
        new MomentTimezoneDataPlugin({
            startYear: 2010,
            endYear: ((new Date()).getFullYear())+10
        }),
    ]
};
