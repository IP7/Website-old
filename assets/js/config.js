define(['domReady!'], function( $ ) {

    var sconf = document.body.getAttribute('data-jsconfig'),
        conf;

    try {
        conf = JSON.parse(sconf);
    } catch(_) {
        conf = {};
    }

    return function(k, v) {
        switch ( arguments.length ) {
            case 0: return conf;
            case 1: return conf[k];
            case 2: return conf[k] = v;
        }
    }
});
