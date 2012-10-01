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

    $moderation_bar = null;

    if (is_connected() && user()->isMember()) {
        $moderation_bar = array(
            array(
                'href' => $base_uri.'/proposer',
                'title' => 'Proposer un contenu'
            )
        );
    }

    $news = get_news($cursus, $course);

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
            'title'          => $course->getName().' ('.$course->getCode().')',
            'breadcrumbs'    => $breadcrumbs,

            'keywords'       => array( $course->getName(), $course->getCode() ),
            'description'    => truncate_string($course->getDescription()),

            'news'           => tpl_news($news),

            'course'         => array(
                'name'  => $course->getName().' ('.$course->getCode().')',
                'intro' => $course->getDescription(),

                'content_types' => tpl_course_contents($cursus, $course)
            ),

            'styles' => array(
                array( 'href' => css_url('tabs') )
            ),

            'scripts' => array(
                array( 'href'  => js_url('tabs') )
            ),

            'moderation_bar' => $moderation_bar
        )
    ));
}

?>
