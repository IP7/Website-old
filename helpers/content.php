<?php

// check if the sent content is correct
function check_sent_content() {
    if (!has_post('t')) {
       halt(HTTP_FORBIDDEN, 'Un jeton d\'authentification est nécessaire.'); 
    }
    if (!has_post('title')) {
        halt(HTTP_BAD_REQUEST, 'Le titre du contenu est requis.');
    }
    else if (strlen($_POST['title']) > 140) {
        halt(HTTP_BAD_REQUEST, 'Le titre du contenu est trop long (140 caractères max).');
    }
}

// get the previous and next contents of the same cursus, course,
// type, and year
function get_prev_next_contents($content, $cursus=null, $course=null) {

    if (!$content) { return array(); }

    if (!$cursus) { $cursus = $content->getCursus(); }
    if (!$course) { $course = $content->getCourse(); }

    $contents = ContentQuery::create()
                    ->filterByCursus($cursus)
                    ->filterByCourse($course)
                    ->filterByYear($content->getYear())
                    ->filterByContentType($content->getContentType())
                    ->filterByDeleted(0)
                    ->filterByValidated(1)
                    ->limit(100)
                    ->find();

    $tpl_contents = array();
    foreach ($contents as $_ => $c) {

        $tpl_contents [] = array(
            'href'  => content_url($cursus, $course, $c),
            'title' => $c->getTitle(),
            'id'    => $c->getId()
        );

    }
    uasort($tpl_contents, 'cmpTitles');

    $prev = null;
    $next = null;
    $id   = $content->getId();
    $len  = count($tpl_contents);

    foreach ($tpl_contents as $k => $c) {

        if ($c['id'] === $id) {
            if ($len > $k+1) { $next = $tpl_contents[$k+1]; }
            break;
        }

        $prev = $c;

    }

    return array( 'next' => $next, 'prev' => $prev, 'both' => $prev && $next );

}
