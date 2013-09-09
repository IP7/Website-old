require(['gravatar', 'imgs', 'pretty_inputs'], function( gravatar, imgs ) {

    var username = document.getElementById('_inp_username'),
        avatar   = document.getElementById('avatar'),
        iforgot  = document.getElementById('iforgot'),
        cache    = {};

    if (!username && !avatar && !iforgot) { return; }

    username.onkeydown =
        username.onkeyup =
            username.onkeypress =
                username.onchange = function() {

        var text = username.value;

        if (text.indexOf('@') < 1) {
            avatar.src = imgs.logo128transp;
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
});
