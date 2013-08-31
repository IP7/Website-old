$(function() {
    if (typeof prettyPrint === 'function') {
        $('.user_content_text code').addClass('prettyprint');
        prettyPrint();
    }

    var cid   = $( '.user_content' ).first().data( 'contentId' ),
        years = {},
        d     = new Date(),
        // if we are after july 2042 (for example), the current year is 2042/2043,
        // while if we are before, it's 2041/2042.
        year  = d.getMonth() > 6 ? d.getFullYear() : d.getFullYear() - 1,
        $ctitle = $( '.content_header h1' ).first(),
        $cyear = $('.content_header .content-year').first(),
        
        ctitle = $ctitle.text(),
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
        saveurl: '/jsapi/edit/content/title.html',

        callback: function( ctitle2 ) {

            document.title = document.title.replace(ctitle, ctitle2);
            ctitle = ctitle2;

        }
    });

    IP7W.setEditable({
        target: $cyear,
        id: cid,
        type: 'select',
        event: 'click',
        data: years,
        indicator: cyear,
        saveurl: '/jsapi/edit/content/year.html',
        onblur: 'cancel',

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
        }
    });

    $cyear.on('change', 'select', function() {
        $cyear.find( 'form' ).first().submit();
    }).on('focus mouseover', 'select', function() {
        // sort with mre recent years first (#352)
        var $opts = $cyear.find('option').sort(function(a, b) {
            var atext = a.text, btext = b.text;
            return (atext < btext) ? 1 : (atext > btext) ? -1 : 0;
        });
        $cyear.find('select').empty().append( $opts );
    });

});
