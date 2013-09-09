require(['domReady!', 'jquery', 'editable', 'api'], function( _, $, editable, api ) {
    editable.setEditable({
        target: $( 'article.cursus .intro' ),
        id: $( 'article.cursus' ).data( 'cursusId' ),
        loadurl : api.edit.cursus.intro.load,
        saveurl : api.edit.cursus.intro.save,
        type : 'textarea',
        submit : 'OK',
        placeholder : '(pas de description)'
    });
});
