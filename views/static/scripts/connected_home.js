$(function(){
    (function display_last_contents() {

        var div = document.getElementById('last_contents');

        if (!div) { return; }

        /* Quick fix for !=Chrome
        *
        *  Chrome recognizes dates like "MM-DD-AAAA HH:MM::SS",
        *  but Firefox and others don’t.
        */
        function str2date(d) {
            var date = new Date(d), time;

            if (!isNaN(+date)) { // Chrome
                return date;
            }

            d = d.split(' ');
            date = new Date(d[0].replace(/-/g, ' '));
            
            time = d[1].split(':');

            date.setHours(time[0]);
            date.setMinutes(time[1]);
            date.setSeconds(time[2]);

            return date;
        }

        var display_error = function(e) {
                e = document.createElement('p');
                e.textContent = 'Une erreur est survenue lors du téléchargement.';
                div.replaceChild(e, loader);
                window.setTimeout(function(){$(div).fadeOut(1000)},5000);
        },

        loader = document.createElement('image'),
        t      = document.createElement('h2'),
        ul     = document.createElement('ul');

        loader.src    = '/views/static/loader.gif';
        t.textContent = 'Les derniers contenus ajoutés';

        div.appendChild(t);

        (function update_last_contents() {

            if (ul.parentNode === div)
                div.removeChild(ul);
            
            div.appendChild(loader);

            $.ajax('/api/1/contents/last.json', {
                data: { l:10 },
                error: display_error,
                success: function(response) {
                    if (!response || !response.data || !response.data.length) {
                        return display_error();
                    }
                    var contents = response.data,
                        len      = contents.length,
                        i        = 0,
                        li, a, c, date, course;

                    while (ul.hasChildNodes()) { ul.removeChild(ul.lastChild); }

                    for (; i < len; i++) {
                        c = contents[i];
                        li = document.createElement('li');
                        date = c.date;

                        /* invert month and day, since server response is DD-MM-YYYY
                           instead of MM-DD-YYYY */
                        date = date.slice(3,5) + '-' + date.slice(0,2) + date.slice(5);

                        course = c.course ? c.course + ', ' : '';

                        li.innerHTML = '<a href="' + c.href + '">' + c.title + '</a>'
                                    +  ' (' + course + c.cursus + '), '
                                    +  '<time datetime="' + str2date(date).toISOString() + '">'
                                    +  'le ' + c.date.replace(' ', ' à ') + '</time>';

                        if ($.timeago) {
                            // reusing the 'date' variable for the <time/> element
                            date = li.getElementsByTagName('time')[0];
                            if (date)
                                $(date).timeago();
                        }

                        ul.appendChild(li); 
                    }

                    div.replaceChild(ul, loader);

                    window.setTimeout(update_last_contents, 600000);
                }
            });
        })();

    })();
});
