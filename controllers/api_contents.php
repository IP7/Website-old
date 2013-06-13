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
                    ->filterByDeleted(0)
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

// used by Jeditable
function api_post_change_content_title() {

    $content_id = (int)get_string('id', 'POST');
    $newvalue   = get_string('value', 'POST');

    $content = ContentQuery::create()->findOneById($content_id);

    if (!$content) { halt(HTTP_NOT_FOUND); }

    $len = strlen($newvalue);

    if ($len === 0) {
        return $content->getTitle();
    }

    $cursus = $content->getCursus();

    // user can only edit the title if he/she is a moderator/admin and/or the
    // content has not been validated yet and he/she is its author.
    if (   !is_connected()
        || (   !is_moderator()
            && !user()->isResponsibleFor($cursus)
            && ($content->isValidated()
                || user()->getId() !== $content->getAuthorId() ))) {

        halt(HTTP_FORBIDDEN);

    }

    if ($content->isDeleted()) {
        halt(HTTP_NOT_FOUND);
    }

    $title_is_taken = ContentQuery::create()
                        ->filterByCursus($cursus)
                        ->filterByCourseId($content->getCourseId())
                        ->filterByYear($content->getYear())
                        ->filterByDeleted(0)
                        ->findOneByTitle($newvalue);

    if ($title_is_taken && $title_is_taken->getId() !== $content->getId()) {

        halt(HTTP_BAD_REQUEST);
    }

    $content->setTitle($newvalue);
    $content->save();

    return htmlentities($content->getTitle(), ENT_COMPAT, 'UTF-8');
}
