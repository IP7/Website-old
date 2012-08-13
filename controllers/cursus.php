<?php

function display_cursus() {
    $name = params('name');

    $cursus = CursusQuery::create()->findOneByShortName($name);

    if ($cursus == null) {
        halt(NOT_FOUND);
    }

    $msg_str = false;
    $msg_type = false;

    if (isset($_POST['content']) && is_connected() && user()->isModerator()) {

        $msg_str = 'Présentation modifiée avec succès.';
        $msg_type = 'success';

        // SQL sanitization made by Propel & HTML escaped by Twig
        $cursus->setDescription($_POST['content']);
        try {
            $cursus->save();
        } catch (PropelException $pe) {
            error_log($pe);
            $msg_type = 'error';
            $msg_str = 'Une erreur est survenue lors de l\'enregistrement. Consultez les logs.';
        }
    }

    $base_uri = Config::$root_uri.'cursus/'.strtoupper($cursus->getShortName()).'/';

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
            'href' => $base_uri./*strtoupper(*/$c->getCode()/*)*/,
            'title' => $c->getCode()
        );
    }

    $news = array();
    
    foreach ($cursus->getNewss() as $n) {

        $a = $n->getAuthor();
        $author = false;

        if ($a) {
            $author = array(
                'href' => Config::$root_uri.'p/'.$a->getUsername(),
                'name' => ($a->getConfigShowRealName() ? $a->getName() : $a->getUsername())
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

    $other_links = array();

    if ($cursus->countSchedules() > 0) {
        $other_links []= array(
            'href'  => $base_uri.'emplois-du-temps',
            'title' => 'Emplois du temps'
        );
    }

    $moderation_bar = array();
    $add_news = false;

    if (is_connected() && user()->isModerator()) {
        $moderation_bar []= array(
            'href' => $base_uri.'edit',
            'title' => 'Éditer'
        );

        $add_news = array(
            'href' => $base_uri.'add_news',
            'title' => 'Ajouter une news'
        );
    }

    $resp_q = $cursus->getResponsable();
    $responsable = false;

    if ($resp_q != null) {
        $responsable = array(
            'href'  => Config::$root_uri.'/p/'.$resp_q->getUsername(),
            'title' => ($resp_q->getConfigShowRealName() ? $resp_q->getName() : $resp_q->getUsername())
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
                'news' => $news,
                'other_links' => $other_links
            ),

            // moderation
            'moderation_bar' => $moderation_bar,
            'add_news_button' => $add_news

        )
    )));
}

function display_moderation_edit_cursus() {

    $name = params('name');

    $cursus = CursusQuery::create()->findOneByShortName($name);

    if ($cursus == null) {
        halt(NOT_FOUND);
    }

    $base_uri = Config::$root_uri.'cursus/'.strtoupper($cursus->getShortName()).'/';

    return tpl_render("edit_cursus.html", array(
        'page' => array(
            'title' => 'Édition de « '.$cursus->getName().' »',

            'cursus' => array( 'name' => $cursus->getName(), 'intro' => $cursus->getDescription() ),

            'cursus_edit_post_url' => $base_uri
        )
    ));

}

function display_moderation_add_cursus_news() {

    $name = params('name');

    $cursus = CursusQuery::create()->findOneByShortName($name);

    if ($cursus == null) {
        halt(NOT_FOUND);
    }

    $base_uri = Config::$root_uri.'cursus/'.strtoupper($cursus->getShortName()).'/';
    
    return tpl_render('news_form.html', array(

    ));
}

?>

