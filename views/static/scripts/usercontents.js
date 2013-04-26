$(function() {
    if (typeof prettyPrint === 'function') {
        $('.user_content_text code').addClass('prettyprint');
        prettyPrint();
    }

    $( '.content_header h1' ).first()
        .attr( 'id', $( '.user_content' ).first().data( 'contentId' ) )
        .editable( '/api/1/content/title', {
            indicator : 'sauvegarde…',
            tooltip : 'Cliquez pour éditer'
        });
});
