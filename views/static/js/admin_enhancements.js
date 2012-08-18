(function(){
    function root_uri() {
        return document.location.pathname.split(/(?=\/admin\/)/)[0];
        // production:
        // return '/';
    }
    
    (function /* check_username */($inp) {
        if (!window.$ || !($inp = $('input[name=username]'))) {return;}

        $inp.keydown(function() {
            $inp.removeClass('valid invalid');
        })

        $inp.blur(function(){
            $.ajax(root_uri()+'/admin/membres/check.json', {
                data: { username: $inp.val() },
                success: function(resp) {
                    $inp.addClass((resp['response'] == 'ok') ? 'valid' : 'invalid');
                }
            });
        });
    })();

})();
