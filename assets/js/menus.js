require(['domReady!'], function() {
    
    var menus = document.getElementsByClassName('optional'),
        buttons = [
            '&#9650;', // up arrow
            '&#9660;'  // down arrow
        ];

    [].forEach.call( menus, function( m ) {

        var t  = m.childNodes[ 1 ], // 'Options' title
            ul = m.childNodes[ 3 ], // <ul>
            st = 1, // state 1: hidden, 0: shown
            bt = document.createElement( 'span' ); // button

        ul.style.display = 'none';

        bt.className = 'show-hide-button';
        bt.innerHTML = buttons[ st ];
        t.appendChild( bt );

        t.addEventListener( 'click', function() {

            st = +!st;
            ul.style.display = st ? 'none' : 'block';
            bt.innerHTML = buttons[ st ];


        }, false );

    });
    
});
