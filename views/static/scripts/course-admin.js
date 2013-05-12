$(function() {

    $( '.course-infos .intro' )
       .attr( 'id', $( 'article.course' ).data( 'courseId' ) )
       .editable('/api/1/edit/course/intro.html', {
           loadurl : '/api/1/edit/course/intro.md',
           type : 'textarea',
           submit : 'OK',
           cols : 80,
           rows : 8,
           placeholder : '(pas de description)',
           indicator : 'sauvegarde…',
           tooltip : 'Cliquez pour éditer',
           event : 'dblclick'
    });

});
