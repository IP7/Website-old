<?php

function display_educational_path() {
    $cursus_name = params('cursus');
    $path_name   = params('path');

    $cursus = CursusQuery::create()->findOneByShortName($cursus_name);

    if (!$cursus) {
        halt(NOT_FOUND);
    }

    $path = EducationalPathQuery::create()
                ->filterByCursus($cursus)
                ->findOneByShortName($path_name);

    if (!$path || $path->isDeleted()) {
        halt(NOT_FOUND);
    }

    // if there is only one educational path for this cursus
    if ($cursus->countEducationalPaths() == 1) {
        redirect_to(cursus_url($cursus), array('status' => HTTP_MOVED_PERMANENTLY));
    }

    $cursus_uri = cursus_url($cursus);
    $base_uri = educpath_url($cursus, $path);

    $breadcrumbs = array(
        1 => array(
            'href' => $cursus_uri,
            'title' => $cursus->getName()
        ),
        2 => array(
            'href' => $base_uri,
            'title' => $path->getName()
        )
    );

    $courses = array(
        's1' => array(
            'mandatory' => array(),
            'optional'  => array()
        ),
        's2' => array(
            'mandatory' => array(),
            'optional'  => array()
        ),
        // special courses
        's3' => array(
            'mandatory' => array(),
            'optional'  => array()
        )
    );
    
    foreach ($path->getOptionalCourses() as $c) {

        if ( $c->isDeleted()) {
            continue;
        }

        $courses['s'.$c->getSemester()]['optional'] []= array(
            'href'  => $cursus_uri.'/'.$c->getShortName(),
            'title' => $c->getShortName(),
            'name'  => $c->getName()
        );
    }
    
    foreach ($path->getMandatoryCourses() as $c) {

        if ( $c->isDeleted()) {
            continue;
        }

        $courses['s'.$c->getSemester()]['mandatory'] []= array(
            'href'  => $cursus_uri.'/'.$c->getShortName(),
            'title' => $c->getShortName(),
            'name'  => $c->getName()
        );
    }

    $news = array();

    $path_news = get_news($cursus);
    
    if ($path_news != NULL) {
        foreach ($path_news as $n) {

            $a = $n->getAuthor();
            $author = false;

            if ($a) {
                $author = array(
                    'href' => user_url($a),
                    'name' => $a->getPublicName()
                );
            }

            $news []= array(
                'datetime_attr' => datetime_attr($n->getDate()),
                'datetime'      => Lang\date_fr($n->getDate()),
                'title'         => $n->getTitle(),
                'content'       => $n->getText(),
                'author'        => $author,
                'id'            => $n->getId()
            );
        }
    }

    $other_links = array();

    if ($path->countSchedules() > 0) {
        $other_links []= array(
            'href'  => $base_uri.'emplois-du-temps',
            'title' => 'Emplois du temps'
        );
    }

    $is_page_admin = is_connected() && (user()->isAdmin() || user()->isResponsibleFor($cursus));

    $responsable = $cursus->getResponsable();
    $tpl_responsable = null;

    if ( $responsable !== null ) {
        $tpl_responsable = array(

            'name' => $responsable->getPublicName(),
            'href' => user_url($responsable)

        );
    }

    return Config::$tpl->render('cursus/educational_path.html', tpl_array(array(
        'page' => array(
            'title'           => $path->getName(),

            'breadcrumbs'     => $breadcrumbs,

            'keywords'        => array( $path->getName(), $path->getShortName() ),
            'description'     => truncate_string($path->getDescription()),

            'news'            => $news,

            'cursus'          => array(
                'id'           => $cursus->getId(),
                'name'         => $cursus->getName(),
                'introduction' => $path->getDescription(),

                'path_name'    => $path->getName(),

                'responsable'  => $tpl_responsable,
                'courses'      => $courses,
                'news'         => $news,
                'other_links'  => $other_links
            ),

            'scripts' => array(
                array( 'href'  => js_url( ($is_page_admin ? 'admin' : 'simple') . '-course') )
            )
        )
    )));
}

?>
