<?php

function display_cursus() {
    $name = params('name');

    $cursus = CursusQuery::create()->findOneByShortName($name);

    if ($cursus == null) {
        halt(NOT_FOUND);
    }

    $courses = $cursus->getCourses();
    $news = $cursus->getNewss();

    return Config::$tpl->render('cursus.html', tpl_array(array(
        'page' => array(
            'title' => $cursus->getName(),

            'news' => array(),

            'cursus' => array(
                'name' => $cursus->getName(),
                'introduction' => $cursus->getDescription(),

                'courses' => array(),

                'other_links' => array()
            )


        )
    )));
}

?>

