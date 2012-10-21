(function() {

    var username = document.getElementById('_inp_username'),
        avatar   = document.getElementById('avatar'),
        iforgot  = document.getElementById('iforgot'),
        cache    = {};

    username.onkeydown =
        username.onkeyup =
            username.onkeypress =
                username.onchange = function() {

        var text = username.value;

        if (text.indexOf('@') < 1) {
            avatar.src = '/views/static/images/logo128transp.png';
            return;
        }

        if (text in cache) {
            avatar.src = cache[text];
            return;
        }

        avatar.src = cache[text] = gravatar(text, 100);
    };

    iforgot.onclick = function() {
        this.href += '?username=' + username.value;
    };

})();
