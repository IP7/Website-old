/**
 * This script is used to concat+minify JS/CSS files for production use.
 **/

var compressor = require( 'node-minify' ),
    fs         = require( 'fs' ),
    path       = require( 'path' ),

    base_path  = path.resolve( __dirname, '..', 'views', 'static' ),
    paths      = {
        css: [ base_path, 'styles', '' ].join( path.sep ),
        js:  [ base_path, 'scripts', '' ].join( path.sep ),

        tmp: __dirname + path.sep
    };

[ 'js', 'css' ].forEach(function( type ) {

    fs.readFile( __dirname + path.sep + type + '-bundles.json', function( err, data ) {

        var bundles, count = 0;

        if ( err ) { throw err; }

        bundles = JSON.parse( data );

        bundles.forEach(function( b ) {

            var filesIn = b.files.map(function( f ){ return paths[type] + f; }),
                fileOut = paths[type] + b.name;

            fs.exists( fileOut, function( exists ) {

                var createFile = function() {

                    var headers = '/*! '
                                + b.files.join('+')
                                + ', ' + +new Date() + ' */\n',

                        tmpfile = paths.tmp + 'f' + +new Date();

                    fs.writeFile( tmpfile, headers, function( err ) {

                        if (!err) {

                            filesIn.unshift( tmpfile );

                        }

                        new compressor.minify({

                            type: 'yui-' + type,
                            fileIn: filesIn,
                            fileOut: fileOut,
                            callback: function( err ) {

                                if ( err ) { console.log( err ); }

                                fs.unlink( tmpfile );
                            
                            }

                        });

                    })

                }

                if ( !exists ) {
                    
                    return createFile();

                } else {

                    // Checking if a file of the bundle has been modified
                    fs.stat( fileOut, function( err, stats ) {

                        if ( err ) { return createFile(); }

                        var lastBundleTime = stats.mtime,
                            i  = 0,
                            l  = filesIn.length,
                            fo = fileOut.split( path.sep ),
                            st, fi;

                        fo = fo[ fo.length - 1 ];

                        for (; i<l; i++) {

                            st = fs.statSync( filesIn[ i ] );

                            if ( st && st.mtime >= lastBundleTime ) {

                                fi = filesIn[ i ].split( path.sep );

                                console.log( fi[ fi.length - 1 ]
                                           + ' modified, updating '
                                           + fo );
                                return createFile();

                            }

                        }

                    });

                }

            });

        });

    })

});
