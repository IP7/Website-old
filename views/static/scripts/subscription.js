(function(){
    (function /* check_username */($inp) {
        if (!window.$ || !($inp = $('input[name=username]'))) {return;}

        $inp.keydown(function() {
            $inp.removeClass('valid invalid');
        });

        $inp.blur(function(){
            $.ajax('/api/1/users/exists.json', {
                data: { username: $inp.val() },
                success: function(resp) {
                    $inp.addClass(resp.data ? 'invalid' : 'valid');
                }
            });
        });
    })();

})();
