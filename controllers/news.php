<?php

function display_news_archives() {

    $news = get_news(null, null, 50, true);

    $news_tpl = array();

    foreach ($news as $_ => $n) {
        $news_tpl []= array(
            'id'    => $n->getId(),
            'title' => $n->getTitle(),
            'text'  => $n->getText(), // Markdown
            'date'  => tpl_date($n->getCreatedAt())
        );
    }

    return tpl_render('news_page.html', array(
        'page' => array(
            'title' => 'Archives des actualités',

            'news' => $news_tpl
        )
    ));
}
