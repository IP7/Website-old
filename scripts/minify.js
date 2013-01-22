/**
 * This script is used to concat+minify JS/CSS files for production use.
 **/

var compressor = require( 'node-minify' ),
    fs         = require( 'fs' ),
    path       = require( 'path' ),

    base_path  = path.resolve( __dirname, '..', 'views', 'static' ),
    paths      = {
        css: [ base_path, 'styles', '' ].join( path.sep ),
        js:  [ base_path, 'scripts', '' ].join( path.sep )
    };

[ 'js', 'css' ].forEach(function( type ) {

    fs.readFile( __dirname + path.sep + type + '-bundles.json', function( err, data ) {

        var bundles, count = 0;

        if ( err ) { throw err; }

        bundles = JSON.parse( data );

        bundles.forEach(function( b ) {

            count++;

            new compressor.minify({

                type: 'yui-' + type,
                fileIn: b.files.map(function( f ){ return paths[type] + f; }),
                fileOut: paths[type] + b.name,
                callback: function( err ) {
                    if ( err ) { console.log( err ); }

                    if ( --count === 0 ) {
                        console.log( type.toLocaleUpperCase() + ": ok." );
                    }
                }

            });

        });

    })

});
