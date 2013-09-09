require(function() {
    var body = document.getElementsByTagName( 'body' )[0];

    body.addEventListener( 'click', function( ev ) {
        var el = ev.target, cl;
        if (el && (cl=el.className) && cl.indexOf('news-title') >= 0) {
            document.location.hash = el.parentElement.id;
        }
    }, true );
});
