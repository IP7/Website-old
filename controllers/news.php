<?php

function display_news_archives() {

    $news = get_news(null, null, 20);

    $news_tpl = array();

    //TODO add cursus/courses names, + link (cf issue #218)
    foreach ($news as $_ => $n) {
        $news_tpl []= array(
            'id'    => $n->getId(),
            'title' => $n->getTitle(),
            'text'  => $n->getText(), // Markdown
            'date'  => $n->getDate()
        );
    }

    return tpl_render('news_page.html', array(
        'page' => array(
            'title' => 'Archives des actualités',

            'news' => $news_tpl
        )
    ));
}
