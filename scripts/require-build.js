({
    baseUrl: "../assets/js",
    optimize: 'uglify2',
    include: ['almond', 'main'],
    wrap: true,
    mainConfig: '../assets/js/main.js',
    out: "../public/js/main.min.js",
    map: {
        '*': {
            // use jquery-private instead of jquery
            'jquery':    'jquery-private',
            'jquery-ui': 'jquery-ui-1.8.23.custom.min',
            'prettify':  'prettify.min'
        },
        'jquery-private': {
            'jquery':    'jquery-1.9.1'
        }
    },
    preserveLicenseComments: false,
    generateSourceMaps: true
})
