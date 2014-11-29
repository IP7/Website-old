/**
 * This file is used for server-side logging
 **/

(function(global) {

    global.IP7W = global.IP7W || {};

    ua = navigator && navigator.userAgent;

    function mklog(level) {
        return function() {
            var msg = [].join.call(arguments, ' ');
            $.post('/jsapi/log.json', {
                level : level,
                message: msg + ' (UA="' + ua + '")'
            });
        };
    }

    global.IP7W.debug = mklog('debug');
    global.IP7W.error = mklog('error');
    global.IP7W.log   = mklog('info');

    window.onerror = function( msg, url, lineNum ) {

        global.IP7W.error([
            'window#error: "' + msg + '"',
            'url: ' + url,
            'line ' + lineNum + '.'
        ].join(', '));

    };

})(window);
