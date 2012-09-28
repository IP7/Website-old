(function() {
    
    var menus = document.getElementsByClassName('optional'),
        bs = ['▲', '▼'];
    
    function toggle_menu(b, $list) {
        $list.toggle();
        b.innerHTML = bs[b.dataset['v']=(+b.dataset['v']+1)%2];
    }
    
    [].slice.call(menus).forEach(function(m){
       
        var t = m.childNodes[1],
            $u = $(m.childNodes[3]),
            b = document.createElement('span');

        $u.hide();
        b.innerHTML = '▼';
        b.dataset['v'] = 1;
        b.className = 'show-hide-button';
        b.onclick = toggle_menu.bind(null, b, $u);
        t.insertBefore(b, t.firstChild);
        
    });
    
})();
