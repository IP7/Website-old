$(function() {

    var dom_news = document.querySelectorAll('.news[data-id][data-can-edit="1"]'),

        news = {};

    if (!dom_news.length) { return; }

    [].forEach.call(dom_news, function(li) {
        var be = document.createElement('span'),
            bs = document.createElement('span'),
            bc = document.createElement('span');

        be.innerText = 'éditer';
        be.className = 'button news-edit-button';
        
        bs.innerText = 'enregistrer';
        bs.className = 'button news-edit-button';

        bc.innerText = 'annuler';
        bc.className = 'button news-edit-button';

        li.appendChild(be);
        li.dataset['edited'] = false;

        news[li.dataset['id']] = {
            buttons : {
                edit   : be,
                save   : bs,
                cancel : bc
            }
        };

        be.onclick = function() {
            if (li.dataset['edited'] === 'true') {return}
            edit(li);
        };

        bs.onclick = function() {
            if (!li.dataset['edited']) {return}
            save(li);
        };

        bc.onclick = function() {
            if (!li.dataset['edited']) {return}
            cancel_edit(li);
        };
    });

    function cancel_edit(li) {
        var id = li.dataset['id'],
            bt = news[id].buttons;

        li.dataset['edited'] = false;

        li.childNodes[0].removeAttribute('contenteditable'); 
        li.childNodes[1].removeAttribute('contenteditable'); 

        li.childNodes[0].innerText = news[id].old_title;
        li.childNodes[1].innerHTML = news[id].old_text;

        bt.edit.classList.remove('disabled');
        li.replaceChild(bt.edit, bt.cancel);
    }

    function edit(li) {
        var id = li.dataset['id'],
            bt = news[id].buttons;

        // TODO add a loading image

        $.ajax('../api/1/news/get_one.json', {
            data: { id: id },
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
                body.innerText  = resp.md_text;

                news[id].old_title = resp['title'];
                news[id].old_text  = resp['text'];

                li.replaceChild(bt.cancel, bt.edit);

                // TODO add buttons for saving

            },
            error: function() {
                edit_button.classList.remove('disabled');
            }
        });


    }

});
