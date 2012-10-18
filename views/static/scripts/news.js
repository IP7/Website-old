$(function() {

    // shortcuts
    var d  = document,
        dc = d.createElement.bind(d);


    var base_api = '/api/1/news/';

    var cursus = d.getElementsByClassName('cursus')[0],
        course = d.getElementsByClassName('course')[0],
        course_id = 0,

        cursus_id = cursus ? cursus.dataset['cursus-id'] : 0;

    if (course) {
        cursus_id = course.dataset['cursus-id'];
        course_id = course.dataset['course-id'];
    }

    // News DOM elements (<li>)
    var dom_news = d.querySelectorAll('.news[data-id]'),

    // cache for news informations
        news = {};

    // if there is no news, exit
    if (!dom_news.length) { return; }

    // fill the news object
    [].forEach.call(dom_news, function(li) {

        var be = dc('span'), // 'edit' button
            bs = dc('span'), // 'save' button
            bc = dc('span'), // 'cancel' button
            bd = dc('span'), // 'delete' button
            b_set = dc('div'), // buttons container

            id = li.dataset['id'];

        be.className = bs.className = bc.className = bd.className = 'button';
        b_set.className = 'buttons-set';

        be.textContent = 'Modifier';
        bs.textContent = 'Enregistrer';
        bc.textContent = 'Annuler';
        bd.textContent = 'Supprimer';

        // -- initialization --
        
        // only edit & delete buttons is visible
        b_set.appendChild(be);
        b_set.appendChild(bd);
        li.appendChild(b_set);

        news[id] = {
            // buttons
            buttons : {
                edit   : be,
                save   : bs,
                cancel : bc,
               'delete': bd,

               'set'   : b_set
            },

            // the news element is not currently edited
            edited : false,

            // dom element
            el: li,

            title_el : li.getElementsByClassName('title')[0],
            body_el  : li.getElementsByClassName('content')[0]
        };

        be.onclick = news[id].body_el.ondblclick = function() {

            if (news[id].edited)
                return;

            edit(id);
        };

        bs.onclick = function() {

            if (!news[id].edited)
                return;

            save(id);
        };

        bc.onclick = function() {
            
            if (!news[id].edited)
                return;

            cancel_edit(id);
        };

        bd.onclick = function() {
            
            if (!news[id])
                return;

            _delete(id);
        };
    });

    // add a button to create news
    var news_div = document.getElementsByClassName('news-container')[0];

    if (news_div) {
        var b_create = dc('span');
        b_create.className = 'small button';
        b_create.textContent = 'Nouvelle Actualité';
        b_create.onclick = create;
        news_div.insertBefore(b_create, dom_news[0].parentElement);
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

        // remove the 'save' button
        if (bt.save.parentElement) bt.set.removeChild(bt.save);

        // replace 'cancel' with 'edit'
        bt.set.replaceChild(bt.edit, bt.cancel);
    }

    function edit(id) {
        var n  = news[id],
            bt = n.buttons;

        if (n.edited) {return}

        n.edited = true;
        
        bt.set.replaceChild(bt.cancel, bt.edit);

        $.ajax(base_api+'get_one.json', {
            data: { id: id },
            success: function(resp) {
                if (!resp['data']) {
                    cancel_edit(id);
                }
                resp = resp['data'][0];

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
        var n = news[id],
            bt = n.buttons;

        if (!n || !n.edited) {return}

        bt.save.classList.add('disabled');

        $.ajax(base_api+'update.json', {
            type: 'POST',
            data: {
                id    : id,
                title : n.title_el.textContent,
                body  : n.body_el.textContent
            },
            success: function(resp) {
                if (!resp['data']) {return}

                resp = resp['data'][0];

                n.old_title = resp['title'];
                n.old_text  = resp['text'];

                bt.save.classList.remove('disabled');
                cancel_edit(id);
            },
            error: function() {
                bt.save.classList.remove('disabled');
            }
        });
    }

    function _delete(id) {
        var n = news[id];
        if (!n) {return}
        $.ajax(base_api+'delete.json', {
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
        // TODO add form with buttons → $.ajax(base_api+'create.json', etc)
    }

});
