<?php

function display_cursus() {
    $name = params('name');

    $cursus = CursusQuery::create()->findOneByShortName($name);

    if ($cursus == null) {
        halt(NOT_FOUND);
    }

    $base_uri = Config::$root_uri.'cursus/'.strtolower($cursus->getShortName()).'/';

    $breadcrumb = array(
        array(
            'href' => $base_uri,
            'title' => $cursus->getName()
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
        )
    );
    
    foreach ($cursus->getCourses() as $c) {

        $type = ($c->getOptional()) ? 'optional' : 'mandatory';

        $courses['s'.$c->getSemester()][$type] []= array(
            'href' => $base_uri.strtolower($c->getCode()),
            'title' => $c->getCode()
        );
    }

    $news = array();
    
    
    foreach ($cursus->getNewss() as $n) {

        $a = $n->getAuthor();
        $author = false;

        if ($a) {
            $author = array(
                'href' => Config::$root_uri.'~'.$a->getUsername(),
                # TODO use $a->getName(), cf issue #43
                'name' => $a->getFirstName().' '.$a->getLastName()
            );
        }

        $news []= array(
            'datetime_attr' => '',
            'datetime' => '',
            'title' => $n->getTitle(),
            'content' => $n->getText(),
            'author' => $author
        );
    }

    return Config::$tpl->render('cursus.html', tpl_array(array(
        'page' => array(
            'title' => $cursus->getName(),

            'breadcrumb' => $breadcrumb,

            'news' => $news,

            'cursus' => array(
                'name' => $cursus->getName(),
                'introduction' => $cursus->getDescription(),

                'courses' => $courses,

                'other_links' => $news
            )


        )
    )));
}

?>

