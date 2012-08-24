(function(root_uri){
    (function /* check_username */($inp) {
        if (!window.$ || !($inp = $('input[name=username]'))) {return;}

        $inp.keydown(function() {
            $inp.removeClass('valid invalid');
        })

        $inp.blur(function(){
            $.ajax(root_uri+'/api/1/users/exists.json', {
                data: { username: $inp.val() },
                success: function(resp) {
                    $inp.addClass(resp['response'] ? 'invalid' : 'valid');
                }
            });
        });
    })();

})(document.location.pathname.split(/\/admin/)[0]);
