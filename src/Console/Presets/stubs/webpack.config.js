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
    }
};