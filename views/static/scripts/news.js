$(function() {

    // TODO add a form to add news

    // News DOM elements (<li>)
    var dom_news = document.querySelectorAll('.news[data-id][data-can-edit="1"]'),

    // cache for news informations
        news = {};

    // if there is no news, exit
    if (!dom_news.length) { return; }

    // fill the news object
    [].forEach.call(dom_news, function(li) {

        var be = document.createElement('span'), // 'edit' button
            bs = document.createElement('span'), // 'save' button
            bc = document.createElement('span'), // 'cancel' button
            b_set = document.createElement('div'); // buttons container

        be.className = bs.className = bc.className = 'button';
        b_set.className = 'news-buttons-set';

        be.innerText = 'éditer';
        bs.innerText = 'enregistrer';
        bc.innerText = 'annuler';

        // -- initialization --
        
        // only the edit button is visible
        b_set.appendChild(be);
        li.appendChild(b_set);

        news[li.dataset['id']] = {
            // buttons
            buttons : {
                edit   : be,
                save   : bs,
                cancel : bc,

                'set'  : b_set
            },

            // the news element is not currently edited
            edited : false,

            // dom element
            el: li,

            title_el : li.childNodes[0],
            body_el  : li.childNodes[1]
        };

        be.onclick = function(id) {
            if (news[id = li.dataset['id']].edited) {return}
            edit(id);
        };

        bs.onclick = function(id) {
            if (!news[id = li.dataset['id']].edited) {return}
            save(id);
        };

        bc.onclick = function(id) {
            if (!news[id = li.dataset['id']].edited) {return}
            cancel_edit(id);
        };
    });

    function cancel_edit(id) {
        var n  = news[id],
            bt = n.buttons;

        if (!n.edited) {return}

        n.edited = false;

        n.title_el.removeAttribute('contenteditable');
        n.body_el.removeAttribute('contenteditable');

        if (n.old_title) n.title_el.innerText = n.old_title;
        if (n.old_text)  n.body_el.innerHTML  = n.old_text;

        bt.edit.classList.remove('disabled');

        if (bt.save.parentElement) bt.set.removeChild(bt.save);
        bt.set.replaceChild(bt.edit, bt.cancel);
    }

    function edit(id) {
        var n  = news[id],
            bt = n.buttons;

        if (n.edited) {return}

        n.edited = true;
        bt.edit.classList.add('disabled');
        bt.set.replaceChild(bt.cancel, bt.edit);

        $.ajax('../api/1/news/get_one.json', {
            data: { id: id },
            success: function(resp) {
                if (!resp['response']) {
                    cancel_edit(id);
                }
                resp = resp['response'];

                n.title_el.setAttribute('contenteditable', true);
                n.body_el.setAttribute('contenteditable', true);

                n.title_el.innerText = resp.title;
                n.body_el.innerText  = resp.md_text;

                n.old_title = resp['title'];
                n.old_text  = resp['text'];

                bt.set.appendChild(bt.save);
            },
            error: function() {
                cancel_edit(id);
            }
        });
    }

    function save(id) {
        var n = news[id];
        if (!n || !n.edited) {return}
        $.ajax('../api/1/news/update.json', {
            type: 'POST',
            data: {
                id    : id,
                title : n.title_el.textContent,
                body  : n.body_el.textContent
            },
            success: function(resp) {
                if (!resp['response']) {return}

                resp = resp['response'];

                n.old_title = resp['title'];
                n.old_text  = resp['text'];

                cancel_edit(id);
            }
        });
    }

});
