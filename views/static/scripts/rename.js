(function() {

    function sendEdit( el ) {
        var $e = $(el),
            id = $e.data( 'id' );

        $.ajax({
            type: 'post',
            url: '/api/1/files/rename.json',
            data: {
                id: id,
                name: $e.val()
            },
            success: function( d ) {
                if ( d.error ) {
                    console.log( 'Error: ' + id + ', ' + d.error );
                }
                else {
                    console.log( id +' → ' + d.data.filename )
                }
            }
        });

    }

    $( 'td.edit' )
        .click(function($e){$e.target.removeAttribute('disabled');})
        .find( 'input' )
            .bind( 'blur', function($e){$e.target.setAttribute('disabled', 'true');sendEdit($e.target)})
        .end();

})();
