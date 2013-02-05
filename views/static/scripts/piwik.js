/* piwik.js */
(function() {

    var b = ( 'http:' === document.location.protocol ? 'http' : 'https' ) + '://analytics.infop7.org/';

    $.getScript( b + 'piwik.js', function() {

        var piwikTracker = Piwik.getTracker(b + 'piwik.php', 1),
            p, navigation_time, page_load;

        // perfs
        if (   ( typeof ( p = window.performance ) === 'object' )
            && ( typeof (p = p.timing ) === 'object' ) ) {

            navigation_time = p.loadEventEnd - p.navigationStart;
            page_load       = p.loadEventEnd - p.responseEnd;

            if ( navigation_time > 0 || page_load > 0 ) {

                piwikTracker.setCustomVariable( 1, 'nt', '' + navigation_time, 'page' );
                piwikTracker.setCustomVariable( 2, 'pl', '' + page_load,       'page' );

            }

        }

        piwikTracker.trackPageView();
        piwikTracker.enableLinkTracking();

    });

})();
