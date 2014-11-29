<?php

function display_cursus() {
    $name = params('name');

    $cursus = CursusQuery::create()->findOneByShortName($name);

    if ($cursus == null) {
        halt(NOT_FOUND);
    }

    $msg_str = false;
    $msg_type = false;

    $base_uri = Config::$root_uri.'cursus/'.strtoupper($cursus->getShortName()).'/';

    $breadcrumb = array(
        array(
            'href' => $base_uri,
            'title' => $cursus->getName()
        )
    );

    $courses = array(
        's1' => array(),
        's2' => array()
    );

    foreach ($cursus->getCourses() as $c) {

        if ( $c->isDeleted()) {
            continue;
        }

        $courses['s'.$c->getSemester()] []= array(
            'href'  => $base_uri.$c->getShortName(),
            'title' => $c->getShortName(),
            'name'  => $c->getName()
        );
    }

    // sort courses (#302)
    uasort($courses['s1'], 'cmpTitles');
    uasort($courses['s2'], 'cmpTitles');

    $other_links = array();

    $moderation_bar = array();

    $is_page_admin = (is_connected() && user()->isAdmin());

    $tpl_cursus = array(
        'user' => array(
            'is_responsable' => $is_page_admin
        ),
        'page' => array(
            'title'           => $cursus->getName(),

            'breadcrumbs'     => $breadcrumb,

            'keywords'        => array(
                $cursus->getName(), $cursus->getShortName()
            ),
            'description'     => truncate_string($cursus->getDescription()),

            'cursus'          => array(
                'id'           => $cursus->getId(),
                'name'         => $cursus->getName(),
                'introduction' => $cursus->getDescription(),

                'courses'      => $courses,
                'other_links'  => $other_links
            ),

            // moderation
            'moderation_bar'  => $moderation_bar,

            'scripts' => array(
                array( 'href'  => js_url( ($is_page_admin ? 'admin' : 'simple') . '-cursus') )
            ),

            'feeds' => array(
                'atom' => $base_uri . 'flux.atom',
                'rss2' => $base_uri . 'flux.rss'
            )
        )
    );

    return tpl_render('cursus/base.html', $tpl_cursus);
}

// deprecated -> redirect to course page
function display_cursus_courses() {
    $name = params('name');
    return redirect_to(cursus_url($name));
}
