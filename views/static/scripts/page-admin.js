$(function() {

    var $page = $( 'article.page' ).first();

    IP7W.setEditable({
        target: $page,
        submit: 'OK',
        type: 'textarea',
        rows: 16,
        saveurl: '/jsapi/edit/page.html',
        loadurl: '/jsapi/edit/page.md',
        id: $page.data( 'pageId' )
    });
});
