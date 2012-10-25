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

function json_post_description_of_course_or_cursus($type) {

    if (!has_post('id')) {
        return json(array('error' => 'bad id.'));
    }

    $id = intval(get_string('id', 'POST'));
    $text = has_post('text') ? get_string('text', 'POST') : '';

    $query = $type === 'cursus' ? CursusQuery::create() : CourseQuery::create();

    $result = $query->findOneById($id);

    if (!$result) {
        return json(array('error' => 'bad id.'));
    }

    $result->setDescription($text);
    
    if (!$result->validate()) {
        return json(array('error' => 'bad text.'));
    }

    $result->save();

    return json(array(
        'data' => array(
            'md_text' => $result->getDescription(),
            'text'    => tpl_render('utils/md.html', array('content'=>$result->getDescription()))
        )
    ));

}
