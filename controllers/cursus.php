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

    if ($cursus->countEducationalPaths() > 1) {
        return display_cursus_with_multiple_educational_paths($cursus, $msg_str, $msg_type, $base_uri, $breadcrumb);
    }

    $path = $cursus->getEducationalPath();

    if (!$path) {
        return display_empty_cursus($cursus, $base_uri, $breadcrumb);
    }

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
    
    foreach ($path->getOptionalCourses() as $c) {
        $courses['s'.$c->getSemester()]['optional'] []= array(
            'href'  => $base_uri.$c->getCode(),
            'title' => $c->getCode(),
            'name'  => $c->getName()
        );
    }
    
    foreach ($path->getMandatoryCourses() as $c) {
        $courses['s'.$c->getSemester()]['mandatory'] []= array(
            'href'  => $base_uri.$c->getCode(),
            'title' => $c->getCode(),
            'name'  => $c->getName()
        );
    }

    $news = array();

    $cursus_news = NewsQuery::create()
                    ->filterByCursus($cursus)
                    ->filterByDate(array(
                        'max' => time(),
                        'min' => time() - 3600 * 24 * 20
                    ))
                    ->orderByDate('desc')
                    ->limit(10)
                    ->find();
    
    if ($cursus_news != NULL) {
        foreach ($cursus_news as $n) {

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

    return Config::$tpl->render('cursus/base.html', tpl_array(array(
        'page' => array(
            'title'           => $cursus->getName(),

            'breadcrumb'      => $breadcrumb,

            'keywords'        => array(
                $cursus->getName(), $cursus->getShortName(),
                $path->getName(), $path->getShortName()
            ),
            'description'     => truncate_string($path->getDescription()),

            'news'            => $news,

            'cursus'          => array(
                'name'         => $cursus->getName(),
                'introduction' => $cursus->getDescription(),

                'path_name'    => $path->getName(),

                'courses'      => $courses,
                'news'         => $news,
                'other_links'  => $other_links
            ),

            // moderation
            'moderation_bar'  => $moderation_bar,
            'add_news_button' => $add_news

        )
    )));
}

function display_cursus_with_multiple_educational_paths($cursus, $msg_str, $msg_type, $base_uri, $breadcrumb) {

    $paths = $cursus->getEducationalPaths();
    $tpl_paths = array();

    foreach ($paths as $p) {
        $tpl_paths []= array(
            'name'  => $p->getName(),
            'title' => $p->getShortName(),
            'href'  => $base_uri.'parcours/'.$p->getShortName()
        );
    }

    return tpl_render('cursus/multiple_paths.html', array(
        'page' => array(
            'title'        => $cursus->getName(),
            'breadcrumb'   => $breadcrumb,
            'message'      => $msg_str,
            'message_type' => $msg_type,

            'keywords'     => array( $cursus->getName(), $cursus->getShortName() ),
            'description'  => truncate_string($cursus->getDescription()),

            'news'         => false,

            'cursus'       => array(
                'name'              => $cursus->getName(),
                'introduction'      => $cursus->getDescription(),

                'educational_paths' => $tpl_paths
            )
        )
    ));
}

function display_empty_cursus($cursus, $base_uri, $breadcrumb) {
    return tpl_render('cursus/empty.html', array(
        'page' => array(
            'title' => $cursus->getName(),
            'breadcrumb' => $breadcrumb,

            'keywords'     => array( $cursus->getName(), $cursus->getShortName() ),
            'description'  => truncate_string($cursus->getDescription()),

            'cursus' => array(
                'name' => $cursus->getName(),
                'introduction' => $cursus->getDescription(),
            ),

            'message' => 'Ce cursus n\'est lié à aucun parcours pédagogique.',
            'message_type' => 'error'

        )
    ));
}

function display_moderation_edit_cursus() {

    $name = params('name');

    $cursus = CursusQuery::create()->findOneByShortName($name);

    if ($cursus == null) {
        halt(NOT_FOUND);
    }

    $base_uri = Config::$root_uri.'cursus/'.strtoupper($cursus->getShortName()).'/';

    return tpl_render("cursus/edit.html", array(
        'page' => array(
            'title' => 'Édition de « '.$cursus->getName().' »',

            'breadcrumbs' => array(
                1 => array( 'href' => cursus_url($cursus), 'title' => $cursus->getName() ),
                2 => array( 'href' => url(),               'title' => 'Éditer' )
            ),

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
