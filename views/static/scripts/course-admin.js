$(function() {

    IP7W.setEditable({
        target: $( '.course-infos .intro' ),
        id: $( 'article.course' ).data( 'courseId' ),
        loadurl : '/api/1/edit/course/intro.md',
        saveurl : '/api/1/edit/course/intro.html',
        type : 'textarea',
        submit : 'OK',
        placeholder : '(pas de description)'
    })

});
