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
                ->findOneByShortName($code);

    if ($course == null) {
        halt(NOT_FOUND);
    }

    $base_uri  = Config::$root_uri.'cursus/'.$cursus->getShortName().'/';
    $base_uri .= $course->getShortName();

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
            'title' => $course->getShortName()
        )
    );

    $tpl_course = array(
        'page' => array(
            'title'          => $course->getName().' ('.$course->getShortName().')',
            'breadcrumbs'    => $breadcrumbs,

            'keywords'       => array( $course->getName(), $course->getShortName() ),
            'description'    => truncate_string($course->getDescription()),

            'news'           => tpl_news($news),

            'course'         => array(
                'name'  => $course->getName().' ('.$course->getShortName().')',
                'intro' => $course->getDescription(),

                'id'    => $course->getId(),

                'content_types' => tpl_course_contents($cursus, $course)
            ),

            'cursus'         => array(
                'id'    => $cursus->getId()
            ),

            'styles' => array(
                array( 'href' => css_url('tabs') )
            ),

            'scripts' => array(
                array( 'href'  => js_url('tabs') )
            ),

            'moderation_bar' => $moderation_bar
        )
    );

    if (is_connected() && (user()->isAdmin() || user()->getId() === $cursus->getResponsableId())) {
        $tpl_course['page']['scripts'] []= array( 'href' => js_url('news') );
    }

    return tpl_render('course.html', $tpl_course);
}

?>
