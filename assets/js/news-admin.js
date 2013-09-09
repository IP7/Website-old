require(['jquery'], function( $ ) {
$(function() {

    // shortcuts
    var d  = document,
        dc = d.createElement.bind(d);


    var base_api = '/api/1/news/';

    var cursus = d.querySelector('article.cursus'),
        course = d.querySelector('article.course'),
        course_id = 0,

        cursus_id = cursus ? cursus.getAttribute('data-cursus-id') : 0;

    if (course) {
        cursus_id = course.getAttribute('data-cursus-id');
        course_id = course.getAttribute('data-course-id');
    }

    // News DOM elements (<li>)
    var dom_news = d.querySelectorAll('.news[data-id]'),
        dom_news_root = d.getElementsByClassName('news-container')[0],

    // cache for news informations
        news = {};

    if (!dom_news_root) { return; }

    // fill the news object
    [].forEach.call(dom_news, function(li) {

        var be = dc('span'), // 'edit' button
            bs = dc('span'), // 'save' button
            bc = dc('span'), // 'cancel' button
            bd = dc('span'), // 'delete' button
            b_set = dc('div'), // buttons container

            id = li.getAttribute('data-id');

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

            title_el : li.getElementsByClassName('news-title')[0],
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
    var b_create,
        new_news_form;

    if (dom_news_root) {

        if (dom_news_root.getAttribute('data-empty')) {
            var t = dc('h2'),
                u = dc('ul');

            t.textContent = 'Actualités';
            u.className = 'news-list';

            dom_news_root.appendChild(t);
            dom_news_root.appendChild(u);
            dom_news_root.removeAttribute('empty');
        }

        b_create = dc('span');
        b_create.className = 'small button';
        b_create.textContent = 'Nouvelle Actualité';
        b_create.onclick = create;

        if (dom_news.length) {
            dom_news_root.insertBefore(b_create, dom_news[0].parentElement);
        } else {
            dom_news_root.appendChild(b_create);
        }
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
        if ( !n ||
             !confirm('Êtes-vous sûr(e) de vouloir '
                     +'supprimer cette actualité ?')) {return}
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

        function cancel_create() {
            if (!new_news_form || !new_news_form.parentElement)
                return;

            dom_news_root.replaceChild(b_create, new_news_form);
        }

        if (!new_news_form) {

            var form  = dc('div'),
            title = dc('h3'),
            text  = dc('div'),
            submit_b = dc('span'),
            cancel_b = dc('span'),
            b_set = dc('div');

            form.className  = 'news';
            title.className = 'title';
            text.className  = 'content';
            b_set.className = 'buttons-set';

            submit_b.className = cancel_b.className = 'button';

            title.setAttribute('contenteditable', true);
            text.setAttribute('contenteditable', true);
            submit_b.type = 'submit';

            submit_b.textContent = 'Enregistrer';
            cancel_b.textContent = 'Annuler';

            cancel_b.onclick = cancel_create;

            submit_b.onclick = function() {
                submit_b.classList.add('disabled');

                $.ajax(base_api+'create.json', {
                    data: {
                        cu_id : cursus_id,
                        co_id : course_id,
                        text  : text.textContent,
                        title : title.textContent
                    },
                    type : 'POST',
                    success : function(resp) {
                        if (!resp['data']) {
                            submit_b.classList.remove('disabled');
                            return;
                        }

                        var news_list = d.getElementsByClassName('news-list')[0],
                            tmp_node  = dc('ul');

                        tmp_node.innerHTML = resp['data'].html;
                        news_list.insertBefore(tmp_node.firstChild, news_list.firstChild);
                        cancel_create();
                    },
                    error: function() {
                        submit_b.classList.remove('disabled');
                    }
                });
            };

            form.appendChild(title);
            form.appendChild(text);
            b_set.appendChild(submit_b);
            b_set.appendChild(cancel_b);
            form.appendChild(b_set);

            new_news_form = form;
        }

        new_news_form.children[0].textContent = '';
        new_news_form.children[1].textContent = '';

        dom_news_root.replaceChild(new_news_form, b_create);

        new_news_form.children[0].focus();

        new_news_form.getElementsByClassName('button')[0].classList.remove('disabled');
    }
});
});
