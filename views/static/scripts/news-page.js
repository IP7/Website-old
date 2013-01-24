$(function() {

    $( '.news-title' ).click(function( ev ) {

        document.location.hash = ev.target.parentElement.id;

    });

});
