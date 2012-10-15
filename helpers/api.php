<?php

function json_get_description_of_course_or_cursus($type) {

    if (!has_get('id')) {
        return json(array('error' => 'bad id.'));
    }

    $id = intval(get_string('id', 'GET'));

    $query = $type === 'cursus' ? CursusQuery::create() : CourseQuery::create();

    $result = $query->findOneById($id);

    if (!$result) {
        return json(array('error' => 'bad id.'));
    }

    return json(array(
        'data' => array(
            'md_text' => $result->getDescription(),
            'text'    => tpl_render('utils/md.html', array('content'=>$result->getDescription()))
        )
    ));

}
