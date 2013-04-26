<?php

function json_get_last_contents() {
    $limit = 10;

    if (has_get('l')) {
        $limit = intval($_GET['l']);
    }

    if ($limit <= 0) {
        return json(array('data' => array()));
    }

    $user_rights = is_connected() ? user()->getRights() : 0;

    $contents = ContentQuery::create()
                    ->joinWith('Content.Cursus')
                    ->filterByValidated(1)
                    ->where(  '(SELECT content_types.access_rights '
                            . 'FROM content_types '
                            . 'WHERE content_types.id = contents.content_type_id) <= ?',
                                $user_rights, PDO::PARAM_INT)
                    ->where('Access_Rights <= ?', $user_rights, PDO::PARAM_INT)
                    ->orderByCreatedAt('desc')
                    ->limit($limit)
                    ->find();

    $tpl_contents = array();

    foreach ($contents as $c) {

        $cursus = $c->getCursus();
        $course = $c->getCourse();

        $tpl_contents []= array(
            'href'  => content_url($cursus, $course, $c, true),
            'title' => $c->getTitle(),
            'date'  => $c->getCreatedAt(),

            'cursus' => $cursus ? $cursus->getShortName() : null,
            'course' => $course ? $course->getShortName() : null
        );
    }

    return json(array('data' => $tpl_contents));
}
