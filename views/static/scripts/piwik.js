/* piwik.js */
(function() {

    var b = ( 'http:' === document.location.protocol ? 'http' : 'https' ) + '://analytics.infop7.org/';

    $.getScript( b + 'piwik.js', function() {

        var piwikTracker = Piwik.getTracker(b + 'piwik.php', 1);

        piwikTracker.trackPageView();
        piwikTracker.enableLinkTracking();

    });

})();
