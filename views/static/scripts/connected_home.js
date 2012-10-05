$(function(){
    (function display_last_contents() {

        var div    = document.getElementById('last_contents');

        if (!div) { return; }

        var display_error = function(e) {
                e = document.createElement('p');
                e.textContent = 'Une erreur est survenue lors du téléchargement.';
                div.replaceChild(e, loader);
                window.setTimeout(function(){$(div).fadeOut(1000)},5000);
        },

        loader = document.createElement('image'),
        t = document.createElement('h2'),
        ul = document.createElement('ul');

        loader.src = '/views/static/loader.gif';
        t.textContent = 'Les derniers contenus ajoutés';

        div.appendChild(t);

        (function update_last_contents() {

            if (ul.parentNode === div) { div.removeChild(ul); }
            div.appendChild(loader);

            $.ajax('/api/1/contents/last.json', {
                data: { l:10 },
                error: display_error,
                success: function(response) {
                    if (!response || !response.response || !response.response.length) {
                        return display_error();
                    }
                    var contents = response.response,
                        len      = contents.length,
                        i        = 0,
                        li, a, c;

                    while (ul.hasChildNodes()) { ul.removeChild(ul.lastChild); }

                    for (; i < len; i++) {
                        c = contents[i];
                        li = document.createElement('li');
                        li.innerHTML = '<a href="' + c.href + '">' + c.title + '</a>'
                                    +  ' (' + c.course + ', ' + c.cursus + '), le '
                                    +  '<date datetime="' + c.date + '">'
                                    +  c.date.replace(' ', ' à ') + '</date>';

                        ul.appendChild(li); 
                    }

                    div.replaceChild(ul, loader);

                    window.setTimeout(update_last_contents, 600000);
                }
            });
        })();

    })();
});
