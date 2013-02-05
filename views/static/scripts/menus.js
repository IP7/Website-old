;$(function() {
    
    var menus = document.getElementsByClassName('optional'),
        buttons = ['▲', '▼'];

    [].forEach.call( menus, function( m ) {

        var t  = m.childNodes[ 1 ], // 'Options' title
            ul = m.childNodes[ 3 ], // <ul>
            st = 1, // state 1: hidden, 0: shown
            bt = document.createElement( 'span' ); // button

        ul.style.display = 'none';

        bt.className = 'show-hide-button';
        bt.textContent = buttons[ st ];
        t.appendChild( bt );

        bt.addEventListener( 'click', function() {

            st = +!st;
            ul.style.display = st ? 'none' : 'block';
            bt.textContent = buttons[ st ];


        }, false );

    });
    
});
