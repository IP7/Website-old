<?php

// check if an username already exists,
// and return the response with JSON
function json_check_username() {
    if (!has_get('username')) {
        return json(array('error' => 'no username provided.'));
    }
    $u = get_string('username', 'GET');

    $user = UserQuery::create()->findOneByUsername($u);

    return json(array('data' => ($user ? true : false)));
}

function json_get_course_intro() { // ?id=<course id>
    return json_get_description_of_course_or_cursus('course');
}

function json_get_cursus_intro() { // ?id=<cursus id>
    return json_get_description_of_course_or_cursus('cursus');
}

function json_post_course_intro() { // id=<course id>, text=<text>
    return json_post_description_of_course_or_cursus('course');
}

function json_post_cursus_intro() { // id=<cursus id>, text=<text>
    return json_post_description_of_course_or_cursus('cursus');
}

function api_create_short_url() { // url=<url>

    send_header('Content-Type: text/plain; charset='.strtolower(option('encoding')));

    if (!has_get('url')) {
        return 'ERROR';
    }

    $url   = get_string('url', 'GET');
    $short = create_short_url($url);

    return $short ? $short : $url;

}

function json_get_cursus() { // short_name=<short_name> or id=<id>

    $sn = get_string('short_name', 'GET');
    $id   = (int)get_string('id', 'GET');

    if (!$sn && !$id) {
        return json(array( 'error' => 'no id nor short name provided' ));
    }

    $cursus = CursusQuery::create();

    if ($id) {
        $cursus = $cursus->findOneById($id);
    }
    else {
        $cursus = $cursus->findOneByShortName($sn);
    }

    if (!$cursus) {
        halt(NOT_FOUND);
    }

    $resp_id = $cursus->getResponsableId();

    return json(array(

        'id'          => $cursus->getId(),
        'short_name'  => $cursus->getShortName(),
        'name'        => $cursus->getName(),
        'description' => $cursus->getDescription(),
        'responsable' => !$resp_id ? null : array(
            'id' => $resp_id
        ) 

    ));

}

function json_get_course() { // short_name=<short_name> or id=<id>

    $sn = get_string('short_name', 'GET');
    $id   = (int)get_string('id', 'GET');

    if (!$sn && !$id) {
        return json(array( 'error' => 'no id nor short name provided' ));
    }

    $course = CourseQuery::create();

    if ($id) {
        $course = $course->findOneById($id);
    }
    else {
        $course = $course->findOneByShortName($sn);
    }

    if (!$course) {
        halt(NOT_FOUND);
    }

    return json(array(

        'id' => $course->getId(),
        'cursus' => array(
            'id' => $course->getCursusId()
        ),
        'semester'      => $course->getSemester() + 1,
        'name'          => $course->getName(),
        'short_name'    => $course->getShortName(),
        'ects'          => $course->getECTS(),
        'description'   => $course->getDescription(),
        'deleted'       => $course->getDeleted()

    ));

}
