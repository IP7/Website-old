$(function() {
    if (typeof prettyPrint === 'function') {
        $('.user_content_text code').addClass('prettyprint');
        prettyPrint();
    }

    var cid   = $( '.user_content' ).first().data( 'contentId' ),
        years = {},
        d     = new Date(),
        // if we are after august 2042 (for example), the current year is 2042/2043,
        // while if we are before, it's 2041/2042.
        year  = d.getMonth > 9 ? d.getFullYear() : d.getFullYear() - 1,
        $cyear = $('.content_header .content-year').first(),
        cyear  = $cyear.text(),
        i=2006, text;

    for (; i<=year; i++) {
        text = i + '/' + (i + 1);
        years[i] = text;

        if (!years.selected && text === cyear) {
            years.selected = i;
        }
    }

    IP7W.setEditable({
        target: $( '.content_header h1' ).first(),
        id: cid,
        saveurl: '/jsapi/edit/content/title.html'
    });

    IP7W.setEditable({
        target: $cyear,
        id: cid,
        type: 'select',
        event: 'click',
        data: years,
        indicator: cyear,
        saveurl: '/jsapi/edit/content/year.html',
        onblur: 'cancel'/*,

        // FIXME: this is not error-proof, since that if the year
        // cannot be changed and the server return an error, we won't know about
        // it, and won't return to the previous title/path. Unfortunately Jeditable
        // does not provide any 'success/error' callbacks, so we may have to use
        // a custom function to perform the AJAX stuff.
        callback: function( cyear2 ) {
            if (   !window.history
                || typeof window.history.replaceState !== 'function') {
                return;
            }

            history.replaceState(null, '',
                window.location.pathname.replace(cyear.replace('/', '-'),
                                                 cyear2.replace('/', '-')));
            document.title = document.title.replace(cyear, cyear2);
            cyear = cyear2;
        }*/
    });

    $cyear.on('change', 'select', function() {
        $cyear.find( 'form' ).first().submit();
    });

});
