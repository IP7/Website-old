<?php

// check if an username already exists,
// and return the response with JSON
function json_check_username() {
    if (!has_get('username')) {
        return '';
    }
    $u = get_string('username', 'GET');

    $user = UserQuery::create()->findOneByUsername($u);

    return json(array('response' => ($user ? true : false)));
}

// 
function json_global_search() {
    if (!has_get('q')) {
        return json(array('response' => array()));
    }

    $raw_results = perform_search(escape_mysql_wildcards(get_string('q', 'GET')), false, 5);

    $results = array();

    foreach ($raw_results as $k => $cat_results) {
        foreach ($cat_results['values'] as $_ => $v) {
            $results []= $v;
        }
    }

    return json(array('response' => $results));
}

function json_get_last_contents() {
    $limit = 10;

    if (has_get('l')) {
        $limit = intval($_GET['l']);
    }

    if ($limit <= 0) {
        return json(array('response' => array()));
    }

    $user_rights = is_connected() ? user()->getRank() : 0;

    $contents = ContentQuery::create()
                    ->joinWith('Content.Cursus')
                    ->joinWith('Content.Course')
                    ->filterByValidated(1)
                        ->useContentTypeQuery()
                        ->where('Rights <= ?', $user_rights, PDO::PARAM_INT)
                        ->endUse()
                    ->orderByDate('desc')
                    ->limit($limit)
                    ->find();

    $tpl_contents = array();

    foreach ($contents as $c) {

        $cursus = $c->getCursus();
        $course = $c->getCourse();

        $tpl_contents []= array(
            'href'  => content_url($cursus, $course, $c),
            'title' => $c->getTitle(),
            'date'  => $c->getDate(),

            'cursus' => $cursus ? $cursus->getShortName() : null,
            'course' => $course ? $course->getCode() : null
        );
    }

    return json(array('response' => $tpl_contents));
}

function json_get_news_by_id() {
    $id = intval(get_string('id', 'GET'));
    if (!$id) { return json(array('error' => 'Bad id.')); }

    $user_rights = is_connected() ? user()->getRank() : 0;

    $news = NewsQuery::create()
                ->where('Access_Rights <= ?', $user_rights, PDO::PARAM_INT)
                ->findOneById($id);

    if (!$news) { return json(array('error' => 'Bad id.')); }

    return json(array(
        'response' => array(
            'title'   => $news->getTitle(),
            'md_text' => $news->getText(),
            'text'    => tpl_render('utils/md.html', array('content'=>$news->getText()))
        )
    ));
}

function json_post_update_news() {
    $id = intval(get_string('id', 'POST'));
    if (!$id) { return json(array('error' => 'Bad id.')); }

    if (!is_connected() || !user()->isAdmin()) {
        halt(HTTP_FORBIDDEN);
    }

    $news = NewsQuery::create()->findOneById($id);
    if (!$news) { return json(array('error' => 'Bad id.')); }

    if ($news->getAccessRights() > user()->getRank()) {
        halt(HTTP_FORBIDDEN);
    }

    if (!user()->isAdmin()) {
        $cursus = $news->getCursus();
        if (!$cursus || !user()->isResponsibleFor($cursus)) {
            halt(HTTP_FORBIDDEN);
        }
    }

    $title = get_string('title', 'POST');
    $body  = get_string('body',  'POST');

    if (!$title || strlen($title) > 255)  {
        return json(array('error' => 'Bad title.'));
    }

    if (!$body || strlen($body) > 1024) {
        return json(array('error' => 'Bad body'));
    }

    $news->setTitle($title);
    $news->setText($body);
    $news->save();

    return json(array(
        'response' => array(
            'title'   => $title,
            'md_text' => $body,
            'text'    => tpl_render('utils/md.html', array('content'=>$body))
        )
    ));
}

?>
