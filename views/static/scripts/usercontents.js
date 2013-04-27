$(function() {
    if (typeof prettyPrint === 'function') {
        $('.user_content_text code').addClass('prettyprint');
        prettyPrint();
    }

    $( '.content_header h1' ).first()
        .attr( 'id', $( '.user_content' ).first().data( 'contentId' ) )
        .editable( '/api/1/edit/content/title.html', {
            indicator : 'sauvegarde…',
            tooltip : 'Cliquez pour éditer'
        });
});
