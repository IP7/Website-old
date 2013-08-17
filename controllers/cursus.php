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

        if ( $c->isDeleted()) {
            continue;
        }

        $courses['s'.$c->getSemester()]['optional'] []= array(
            'href'  => $base_uri.$c->getShortName(),
            'title' => $c->getShortName(),
            'name'  => $c->getName()
        );
    }
    
    foreach ($path->getMandatoryCourses() as $c) {

        if ( $c->isDeleted()) {
            continue;
        }

        $courses['s'.$c->getSemester()]['mandatory'] []= array(
            'href'  => $base_uri.$c->getShortName(),
            'title' => $c->getShortName(),
            'name'  => $c->getName()
        );
    }

    // sort courses (#302)
    uasort($courses['s1']['optional'], 'cmpTitles');
    uasort($courses['s1']['mandatory'], 'cmpTitles');
    uasort($courses['s2']['optional'], 'cmpTitles');
    uasort($courses['s2']['mandatory'], 'cmpTitles');

    $news = get_news($cursus);

    $other_links = array();

    $moderation_bar = array();
    $add_news = false;

    $responsable = $cursus->getResponsable();
    $tpl_responsable = null;

    if ( $responsable !== null ) {
        $tpl_responsable = array(

            'name' => $responsable->getPublicName(),
            'href' => user_url($responsable)

        );
    }

    $is_page_admin = (is_connected()
                        && (user()->isAdmin()
                            || user()->isResponsibleFor($cursus)));

    $tpl_cursus = array(
        'user' => array(
            'is_responsable' => $is_page_admin
        ),
        'page' => array(
            'title'           => $cursus->getName(),

            'breadcrumbs'     => $breadcrumb,

            'keywords'        => array(
                $cursus->getName(), $cursus->getShortName(),
                $path->getName(), $path->getShortName()
            ),
            'description'     => truncate_string($path->getDescription()),

            'news'            => tpl_news($news),

            'cursus'          => array(
                'id'           => $cursus->getId(),
                'name'         => $cursus->getName(),
                'introduction' => $cursus->getDescription(),

                'responsable'  => $tpl_responsable,
                'path_name'    => $path->getName(),

                'courses'      => $courses,
                'news'         => $news,
                'other_links'  => $other_links
            ),

            // moderation
            'moderation_bar'  => $moderation_bar,
            'add_news_button' => $add_news,

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

function display_cursus_dashboard($has_msg=false, $msg_str='', $msg_type='') {
    $name = params('name');
    $cursus = CursusQuery::create()->findOneByShortName($name);

    if ($cursus == null) { halt(NOT_FOUND); }

    if (params('path')) {
        // If this is a path, redirect to the main cursus dashboard
        redirect_to(cursus_url($cursus).'/dash');
    }

    if (!is_connected() || !(user()->isAdmin() || user()->isResponsibleFor($cursus))) {
        halt(HTTP_FORBIDDEN);
    }

    $has_msg &= ($msg_str && $msg_type);

    $base_uri = Config::$root_uri.'cursus/'.strtoupper($cursus->getShortName()).'/';

    $breadcrumbs = array(
        array(
            'href' => $base_uri,
            'title' => $cursus->getName()
        ),
        array(
            'href' => url(),
            'title' => 'Administration'
        )
    );

	$contents = ContentQuery::create()
							->limit(50)
                            ->filterByCursus($cursus)
							->orderById()
							->findByValidated(0);

	$tpl_contents = Array();

	if ($contents){

		foreach ( $contents as $c ){

			$user   = $c->getAuthor();
			$course = $c->getCourse();

            $tpl_c = array(
                'title' => $c->getTitle(),
                'href'  => content_url($cursus, $course, $c),
                'date'  => tpl_date($c->getCreatedAt()),
                'author' => array(
                    'href' => user_url($user),
                    'name' => $user->getPublicName()
                )
            );

            $tpl_c['cursus'] = array( 'name' => $cursus->getShortName() );

            if ($course) {
                $tpl_c ['course'] = array(
                    'name' => $course->getShortName()
                );
            }

			$tpl_contents []= $tpl_c;
		}

    }

    return tpl_render('cursus/dashboard.html', array(
        'page' => array(
            'title'        => $cursus->getName().' - Administration',
            'breadcrumbs'  => $breadcrumbs,
            'contents'     => $tpl_contents,
            'message'      => ($has_msg === true) ? $msg_str : null,
            'message_type' => ($has_msg === true) ? $msg_type : null
        )
    ));
}

function post_cursus_dashboard() {
    $name = params('name');
    $cursus = CursusQuery::create()->findOneByShortName($name);

    if ($cursus == null) { halt(NOT_FOUND); }

    if (!is_connected() || !(user()->isAdmin() || user()->isResponsibleFor($cursus))) {
        halt(HTTP_FORBIDDEN);
    }

    $msg_str = null;
 
    if (!has_post('t')) { halt(HTTP_BAD_REQUEST); }
 
    $token = $_POST['t'];
 
    $fd = FormData::create($token);
 
    if ((!use_token($token, 'POST')) || (!$fd->exists())) {
        halt(HTTP_FORBIDDEN, 'Le jeton d\'authentification est invalide ou a expiré.');
    }
 
    $content = $fd->get('proposed');
 
 	if ( !has_post('validate') && !has_post('delete') )
        return display_cursus_dashboard(true,
                    'Erreur interne (nopost:validate,delete)', 'error');
 
 	if ( has_post('validate') ) {
 		$content->setValidated(1);
 		$content->save();
 		$msg_str = 'Le contenu a bien été validé.';	
 	}
 		
 	if ( has_post('delete') ){
         $content->delete();
         $msg_str = 'Le contenu a bien été supprimé.';
 	}
 
 	return display_cursus_dashboard(true, $msg_str, 'success');
}

function display_cursus_with_multiple_educational_paths($cursus, $msg_str, $msg_type, $base_uri, $breadcrumb) {

    $paths = $cursus->getEducationalPaths();
    $tpl_paths = array();

    foreach ($paths as $p) {

        if ($p->isDeleted()) {
            continue;
        }

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
                'id'                => $cursus->getId(),
                'name'              => $cursus->getName(),
                'introduction'      => $cursus->getDescription(),

                'educational_paths' => $tpl_paths
            ),

            'feeds' => array(
                'atom' => $base_uri . 'flux.atom',
                'rss2' => $base_uri . 'flux.rss'
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
                'id'           => $cursus->getId(),
                'name'         => $cursus->getName(),
                'introduction' => $cursus->getDescription(),
            ),

            'message' => 'Ce cursus n\'est lié à aucun parcours pédagogique.',
            'message_type' => 'error',

            'feeds' => array(
                'atom' => $base_uri . 'flux.atom',
                'rss2' => $base_uri . 'flux.rss'
            )

        )
    ));
}

function display_cursus_courses() {
    $name = params('name');

    $cursus = CursusQuery::create()->findOneByShortName($name);

    if ($cursus == null) {
        halt(NOT_FOUND);
    }

    $cursus_uri = cursus_url($cursus);

    $breadcrumbs = array(
        1 => array(
            'href' => $cursus_uri,
            'title' => $cursus->getName()
        ),
        2 => array(
            'href'  => url(),
            'title' => 'Matières'
        )
    );

    $tpl_courses = array(
        's1' => array(),
        's2' => array()
    );

    $courses = CourseQuery::create()
                    ->filterByDeleted(0)
                    ->filterByCursus($cursus)
                    ->find();

    foreach ($courses as $c) {

        $s = $c->getSemester();

        if ($s !== 1 && $s !== 2) {
            continue;
        }

        $tpl_courses['s'.$s] []= array(
            'href'       => course_url($cursus, $c),
            'title'      => $c->getName() . ' (' . $c->getShortName() . ')'
        );

    }

    // natural sorting
    uasort($tpl_courses['s1'], 'cmpTitles');
    uasort($tpl_courses['s2'], 'cmpTitles');

    $tpl_cursus = array(
        'page' => array(
            'title'           => 'Matières ' . Lang\de($cursus->getName()),

            'breadcrumbs'     => $breadcrumbs,

            'keywords'        => array(
                $cursus->getName(), $cursus->getShortName(), 'matières'
            ),
            'description'     => '',

            'cursus'          => array(
                'id'           => $cursus->getId(),
                'href'         => $cursus_uri,
                'name'         => $cursus->getName(),

                'courses'      => $tpl_courses
            )
        )
    );

    return tpl_render('cursus/courses.html', $tpl_cursus);
}
