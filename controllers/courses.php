<?php

function display_course() {
    $cursus_n = params('cursus');
    $code     = params('course');

    $cursus = CursusQuery::create()->findOneByShortName($cursus_n);

    if ($cursus == null) {
        halt(NOT_FOUND);
    }

    $course = CourseQuery::create()
                ->filterByCursus($cursus)
                ->findOneByCode($code);

    if ($course == null) {
        halt(NOT_FOUND);
    }

    $base_uri  = Config::$root_uri.'cursus/'.$cursus->getShortName().'/';
    $base_uri .= $course->getCode();

    $breadcrumbs = array(
        array(
            'href'  => Config::$root_uri.'cursus/'.$cursus->getShortName(),
            'title' => $cursus->getName()
        ),
        array(
            'href'  => $base_uri,
            'title' => $course->getCode()
        )
    );

    return tpl_render('course.html', array(
        'page' => array(
            'title' => $course->getName().' ('.$course->getCode().')',
            'breadcrumb' => $breadcrumbs,

            'news' => false,

            'course' => array(
                'name'  => $course->getName().' ('.$course->getCode().')',
                'intro' => $course->getDescription()
            )
        )
    ));
}

?>
