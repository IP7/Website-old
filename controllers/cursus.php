<?php

function display_cursus() {
    $name = params('cursus');

    $cursus = CursusQuery::create()->findOneByName($name);

    if ($cursus == null) {
        halt(NOT_FOUND);
    }

    $news = $cursus->getNewss();

    return Config::$tpl->render('cursus.html', tpl_array(array(
        'page' => array(
            'title' => ucfirst($cursus->getName()),

            'intro' => $cursus->getDescription(),

            'news' => $news

            # TODO

        )
    )))
}

?>

