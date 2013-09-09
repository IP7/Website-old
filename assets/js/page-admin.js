require(['jquery', 'editable'], function( $, editable ) {
    $(function() {
        var $page = $( 'article.page' ).first();

        editable.setEditable({
            target: $page,
            submit: 'OK',
            tooltip: false,
            type: 'textarea',
            rows: 16,
            saveurl: '/jsapi/edit/page.html',
            loadurl: '/jsapi/edit/page.md',
            id: $page.data( 'pageId' )
        });
    });
});
