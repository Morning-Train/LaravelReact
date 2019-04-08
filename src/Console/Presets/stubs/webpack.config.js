const path = require('path')

module.exports = {
    resolve: {
        extensions: ['.js', '.json', '.vue'],
        alias: {
            'layouts': path.resolve(process.cwd(), 'resources/js/layouts'),
            'pages': path.resolve(process.cwd(), 'resources/js/pages'),
            'services': path.resolve(process.cwd(), 'resources/js/services'),
            'support': path.resolve(process.cwd(), 'resources/js/support'),
            'templates': path.resolve(process.cwd(), 'resources/js/templates'),
            'widgets': path.resolve(process.cwd(), 'resources/js/widgets')
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
                            "babel-plugin-webpack-alias",
                            "@babel/plugin-transform-arrow-functions",
                            "@babel/plugin-proposal-export-namespace-from",
                            "@babel/plugin-proposal-export-default-from",
                            ["@babel/plugin-proposal-decorators", { "legacy": true }],
                            ["@babel/plugin-proposal-class-properties", { "loose" : true }]
                        ]
                    }
                }
            }
        ]
    }
};
