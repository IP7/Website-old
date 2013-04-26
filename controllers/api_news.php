<?php

function json_get_news_by_id() {
    $id = intval(get_string('id', 'GET'));
    if (!$id) { return json(array('error' => 'Bad id.')); }

    $user_rights = is_connected() ? user()->getRights() : 0;

    $news = NewsQuery::create()
                ->where('Access_Rights <= ?', $user_rights, PDO::PARAM_INT)
                ->findOneById($id);

    if (!$news) { return json(array('error' => 'Bad id.')); }

    return json(array(
        'data' => array(
            array(
                'title'   => $news->getTitle(),
                'md_text' => $news->getText(),
                'text'    => tpl_render('utils/md.html', array('content'=>$news->getText()))
            )
        )
    ));
}

function json_post_update_news() {
    $id = intval(get_string('id', 'POST'));
    if (!$id) { return json(array('error' => 'Bad id.')); }

    if (!is_connected()) {
        halt(HTTP_FORBIDDEN);
    }

    $news = NewsQuery::create()->findOneById($id);
    if (!$news) { return json(array('error' => 'Bad id.')); }

    if ($news->getAccessRights() > user()->getRights()) {
        halt(HTTP_FORBIDDEN);
    }

    $cursus = $news->getCursus();

    if (!user()->isAdmin()) {
        if (!$cursus || !user()->isResponsibleFor($cursus)) {
            halt(HTTP_FORBIDDEN);
        }
    }

    $title = get_string('title', 'POST');
    $body  = get_string('body',  'POST');

    $err = check_and_save_news($title, $body, $news, $cursus);

    if ($err) {
        return $err;
    }

    return json(array(
        'data' => array(
            array(
                'title'   => $news->getTitle(),
                'md_text' => $news->getText(),
                'text'    => tpl_render('utils/md.html', array(
                    'content' => $news->getText()
                ))
            )
        )
    ));
}

function json_post_delete_news() {
    $id = intval(get_string('id', 'POST'));
    if (!$id) { return json(array('error' => 'Bad id.')); }

    if (!is_connected()) {
        halt(HTTP_FORBIDDEN);
    }

    $news = NewsQuery::create()->findOneById($id);
    if (!$news) { return json(array('error' => 'Bad id.')); }

    if ($news->getAccessRights() > user()->getRights()) {
        halt(HTTP_FORBIDDEN);
    }

    if (!user()->isAdmin()) {
        $cursus = $news->getCursus();
        if (!$cursus || !user()->isResponsibleFor($cursus)) {
            halt(HTTP_FORBIDDEN);
        }
    }

    $news->delete();

    return json(array('status' => 'ok'));
}

// post cu_id=<cursus_id>&co_id=<course_id>&title=<title>&text=<text>
function json_post_create_news() {

    $cursus_id = intval(get_string('cu_id', 'POST'));
    $course_id = intval(get_string('co_id', 'POST'));
    $title     = get_string('title', 'POST');
    $text      = get_string('text',  'POST');

    $cursus = ($cursus_id > 0) ? CursusQuery::create()->findOneById($cursus_id) : null;
    $course = ($course_id > 0) ? CourseQuery::create()->findOneById($course_id) : null;

    $news = null;

    $err = check_and_save_news($title, $text, $news, $cursus, $course);

    if ($err) {
        return $err;
    }

    return json(array(
        'data' => array(
            'title'   => $news->getTitle(),
            'md_text' => $news->getText(),
            'text'    => tpl_render('utils/md.html', array(
                'content' => $news->getText()
            )),
            'html'    => tpl_render('utils/one_news.html', array(
                'news' => array(
                    'id'            => $news->getId(),
                    'title'         => $news->getTitle(),
                    'content'       => $news->getText(),
                    'datetime_attr' => datetime_attr($news->getCreatedAt()),
                    'datetime'      => Lang\date_fr($news->getCreatedAt()),
                    'author'        => array(
                        'href' => Config::$root_uri.'p/'.user()->getUsername(),
                        'name' => user()->getPublicName()
                    )
                )
            ))
        )
    ));
}

// helper
function _json_post_news_mark_as( $old = true ) { // ?id=<news id>

    $id = intval(get_string('id', 'POST'));
    if (!$id) { return json(array('error' => 'Bad id.')); }

    if (!is_connected()) {
        halt(HTTP_FORBIDDEN);
    }

    $news = NewsQuery::create()->findOneById($id);
    if (!$news) { return json(array('error' => 'Bad id.')); }

    if ($news->getAccessRights() > user()->getRights()) {
        halt(HTTP_FORBIDDEN);
    }

    if (!user()->isAdmin()) {
        $cursus = $news->getCursus();
        if (!$cursus || !user()->isResponsibleFor($cursus)) {
            halt(HTTP_FORBIDDEN);
        }
    }

    $news->setExpirationDate( $old ? 'now' : NULL );

    return json(array('status' => 'ok'));

}

function json_post_news_mark_as_old() {
    return _json_post_news_mark_as(true);
}

function json_post_news_mark_as_not_old() {
    return _json_post_news_mark_as(false);
}
