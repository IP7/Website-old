$(function() {

    var dom_news = document.querySelectorAll('.news[data-id][data-can-edit="1"]');

    if (!dom_news.length) { return; }

    [].forEach.call(dom_news, function(li){
        var be = document.createElement('span');
        be.innerText = 'éditer';
        be.className = 'button news-edit-button';
        li.appendChild(be);

        be.onclick = function() {
            if (li.dataset['edited'] || be.classList.contains('disabled')) {return}
            edit(li, be);
        };
    });


    function edit(li, edit_button) {
        edit_button.classList.add('disabled');

        // TODO add a loading image

        $.ajax('/api/1/news/get_one.json', {
            data: { id:li.dataset['id'] },
            success: function(resp) {
                if (!resp['response']) {
                    edit_button.classList.remove('disabled');
                    return;
                }
                resp = resp['response'];

                li.dataset['edited'] = true;
                var title = li.childNodes[0],
                    body  = li.childNodes[1];

                title.setAttribute('contenteditable', true);
                body.setAttribute('contenteditable', true);

                title.innerText = resp.title;
                body.innerText  = resp.text;

                // TODO add buttons for save/cancel

            },
            error: function() {
                edit_button.classList.remove('disabled');
            }
        });


    }

});
