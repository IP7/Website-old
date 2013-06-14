$(function() {

    IP7W.setEditable({
        target: $( 'article.cursus .intro' ),
        id: $( 'article.cursus' ).data( 'cursusId' ),
        loadurl : '/jsapi/edit/cursus/intro.md',
        saveurl : '/jsapi/edit/cursus/intro.html',
        type : 'textarea',
        submit : 'OK',
        placeholder : '(pas de description)'
    })

});
