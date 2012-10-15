$(function() {

    // News DOM elements (<li>)
    var dom_news = document.querySelectorAll('.news[data-id][data-can-edit="1"]'),

    // cache for news informations
        news = {};

    // if there is no news, exit
    if (!dom_news.length) { return; }

    // fill the news object
    [].forEach.call(dom_news, function(li) {
        var dc = document.createElement.bind(document);

        var be = dc('span'), // 'edit' button
            bs = dc('span'), // 'save' button
            bc = dc('span'), // 'cancel' button
            bd = dc('span'), // 'delete' button
            b_set = dc('div'); // buttons container

        be.className = bs.className = bc.className = bd.className = 'button';
        b_set.className = 'news-buttons-set';

        be.textContent = 'éditer';
        bs.textContent = 'enregistrer';
        bc.textContent = 'annuler';
        bd.textContent = 'supprimer';

        // -- initialization --
        
        // only edit & delete buttons is visible
        b_set.appendChild(be);
        b_set.appendChild(bd);
        li.appendChild(b_set);

        news[li.dataset['id']] = {
            // buttons
            buttons : {
                edit   : be,
                save   : bs,
                cancel : bc,
               'delete': bd,

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

        bd.onclick = function(id) {
            if (!news[id = li.dataset['id']]) {return}
            _delete(id);
        };
    });

    // add a button to create news
    var news_div = document.getElementsByClassName('news-container')[0];

    if (news_div) {
        var b_create = document.createElement('span');
        b_create.className = 'small button';
        b_create.textContent = 'Nouvelle Actualité';
        b_create.onclick = create;
        console.log(news_div.children);
        news_div.insertBefore(b_create, news_div.children[1]);
    }

    function cancel_edit(id) {
        var n  = news[id],
            bt = n.buttons;

        if (!n.edited) {return}

        n.edited = false;

        n.title_el.removeAttribute('contenteditable');
        n.body_el.removeAttribute('contenteditable');

        if (n.old_title) n.title_el.textContent = n.old_title;
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

        $.ajax('/api/1/news/get_one.json', {
            data: { id: id },
            success: function(resp) {
                if (!resp['data']) {
                    cancel_edit(id);
                }
                resp = resp['data'];

                n.title_el.setAttribute('contenteditable', true);
                n.body_el.setAttribute('contenteditable', true);

                n.title_el.textContent = resp.title;
                n.body_el.textContent  = resp.md_text;

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
        $.ajax('/api/1/news/update.json', {
            type: 'POST',
            data: {
                id    : id,
                title : n.title_el.textContent,
                body  : n.body_el.textContent
            },
            success: function(resp) {
                if (!resp['data']) {return}

                resp = resp['data'];

                n.old_title = resp['title'];
                n.old_text  = resp['text'];

                cancel_edit(id);
            }
        });
    }

    function _delete(id) {
        var n = news[id];
        if (!n) {return}
        $.ajax('/api/1/news/delete.json', {
            type: 'POST',
            data: { id : id },
            success: function(resp) {
                $(n.el).fadeOut(1000, function() {
                    n.el.parentElement.removeChild(n.el);
                });
                delete news[id];
            }
        });
    }

    function create() {
        var ref =    document.querySelector('article.course')
                  || document.querySelector('article.cursus');

        if (!ref) {return} // change this to add news on home page

        var course_id = ref.dataset['course-id'],
            cursus_id = ref.dataset['cursus-id'];

        //TODO

        /*
        $.ajax('/api/1/news/create.json', {
            type: 'POST',
            data: {
                course : course_id,
                cursus : cursus_id,
                title  : '', //TODO
                body   : '' //TODO
            },
            success: function(resp) {
                //TODO
            }
        });*/
    }

});
