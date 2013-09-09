define(['jquery'], function( $ ) {

    var exports = {},
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

    exports.debug = mklog('debug');
    exports.error = mklog('error');
    exports.log   = mklog('info');

    window.onerror = function( msg, url, lineNum ) {

        exports.error([
            'window#error: "' + msg + '"',
            'url: ' + url,
            'line ' + lineNum + '.'
        ].join(', '));

    };

    return exports;
    
});
