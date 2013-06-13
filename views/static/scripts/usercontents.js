$(function() {
    if (typeof prettyPrint === 'function') {
        $('.user_content_text code').addClass('prettyprint');
        prettyPrint();
    }

    IP7W.setEditable({
        target: $( '.content_header h1' ).first(),
        id: $( '.user_content' ).first().data( 'contentId' ),
        saveurl: '/api/1/edit/content/title.html'
    });
});
