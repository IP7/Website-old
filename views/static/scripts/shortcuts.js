$(function(d,u,l,r){
    var search = (d=document).getElementById('q'),
        b      = d.body,
        transform_body = function(v) {
            /* Set:
             *  body {
             *    -webkit-transform: rotate(180deg);
             *       -moz-transform: rotate(180deg);
             *        -ms-transform: rotate(180deg);
             *         -o-transform: rotate(180deg);
             *            transform: rotate(180deg);
             *  }
             */ 
            ['O','Moz','Ms','Webkit'].forEach(function(s){b.style[s+'Transform'] = v});
            b.style.transform = v;
        };

    // focus on search with '/'
    if (search) {
        Mousetrap.bind('/', function(){
            return !!search.focus();    
        });
    }

    // shortcuts to some pages
    [
        ['h', '/'],
        ['p', '/profile'],
        ['l 1', '/cursus/L1'],
        ['l 2', '/cursus/L2'],
        ['l 3', '/cursus/L3'],
        ['m 1', '/cursus/M1'],
        ['m 2', '/cursus/M2']

    ].forEach(function(s) {
        Mousetrap.bind(s[0], function(){ window.location.pathname = s[1]});
    });

    // Konami code
    // up up down down left right left right (obfuscated)
    Mousetrap.bind((u='up ')+u+(d='down ')+d+(l='left ')+(r='right ')+l+r+' b a', function(){
        transform_body('rot'+'ate(18'+'0deg)');
        b.dataset['k'] = true;
    });

    // reset the page after the Konami code
    Mousetrap.bind('esc', function(){
        if (!b.dataset['k']) {return;}
        b.dataset['k'] = false;
        transform_body('');
    });
});
