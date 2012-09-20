$(function(){
    (function display_last_contents() {

        var div    = document.getElementById('last_contents'),
            loader = document.createElement('image'),
            t;

        if (!div) { return; }

        var display_error = function(e) {
                e = document.createElement('p');
                e.innerText = 'Une erreur est survenue lors du téléchargement.';
                div.replaceChild(e, loader);
                window.setTimeout(function(){$(div).fadeOut(1000)},5000);
        };

        loader.src = '/views/static/loader.gif';
        div.appendChild(loader);

        $.ajax('/api/1/contents/last.json', {
            data: { l:10 },
            error: display_error,
            success: function(response) {
                if (!response || !response.response || !response.response.length) {
                    return display_error();
                }
                var ul       = document.createElement('ul'),
                    contents = response.response,
                    len      = contents.length,
                    i        = 0,
                    li, a, c;

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
            }
        });

        t = document.createElement('h2');
        t.innerText = 'Les derniers contenus ajoutés';
        div.insertBefore(t, loader);

    })();
});
