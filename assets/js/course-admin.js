require(['domReady!', 'jquery', 'editable', 'api'], function( _, $, editable, api ) {
    editable.setEditable({
        target: $( '.course-infos .intro' ),
        id: $( 'article.course' ).data( 'courseId' ),
        loadurl : api.edit.course.intro.load,
        saveurl : api.edit.course.intro.save,
        type : 'textarea',
        submit : 'OK',
        placeholder : '(pas de description)'
    });
});

