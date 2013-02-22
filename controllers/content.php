<?php

function display_course_content() {

	$content_id  = (int)params('id');
	$cursus_sn   = (string)params('cursus');
	$course_code = (string)params('course');

	$content = ContentQuery::create()->findOneById($content_id);

    if (!$content) {
        halt(NOT_FOUND);
    }

	$user    = $content->getAuthor();
	$course	 = $content->getCourse();
	$cursus	 = $content->getCursus();

    if ((!$course && $course_code !== 'global') || !$cursus) {
        halt(NOT_FOUND);
    }

    $url_year = (string)params('year');

    // underscores are escaped since they're MySQL wildcards,
    // so we need to replace '\_' with '_'
    $url_title = preg_replace('/\\\\_/', '_', (string)params('title'));

    if ($cursus->getShortName() != $cursus_sn
         || ($course !== NULL && $course->getShortName() != $course_code)
         || ($course === NULL && $course_code !== 'global')) {


        redirect_to(content_url($cursus, $course, $content));

    }

    $rights    = $content->getAccessRights();
    $user_rank = is_connected() ? user()->getRights() : 0;

    $type      = $content->getContentType();

    if ($type && $type->getAccessRights() > $rights) {
        $rights = $type->getAccessRights();
    }

    if ($rights > $user_rank) {
        halt(HTTP_FORBIDDEN, 'Vous n\'avez pas le droit d\'accéder à ce contenu.');
    }

    $year = $content->getYear();

    if ($year) {

        $valid_url_year = $year . '-' . ($year + 1);

        // if the content has a year and
        // the url is /…/:id/<no year or title> or /…/:id/:year/<no title>
        // or the URL year is not correct
        if ($url_year != $valid_url_year) {
            redirect_to(content_url($cursus, $course, $content));
        }

    }
    else {

        // if the content has no year and the URL has no title:
        // /…/:id/<no title>
        if (!$url_title || $url_year) {
            redirect_to(content_url($cursus, $course, $content));
        }
    }

    // if the URL title is not correct
    if (name_encode($content->getTitle()) != $url_title) {
        redirect_to(content_url($cursus, $course, $content));
    }

    $msg_str  = null;
    $msg_type = null;

    $tpl_report = null;
	$tpl_proposed = null;

    $tpl_files = null;

    if (!$content->getValidated()) {
        if (!is_connected() || (user()->getId() != $user->getId() && !user()->isAdmin())) {
            halt(NOT_FOUND);
        }
        $msg_str  = 'Ce contenu est en attente de validation.';
        $msg_type = 'notice';

        $tpl_proposed = null;

        if (is_connected() && user()->isAdmin()) {
            $post_token = generate_post_token(user());
            FormData::create($post_token)->store('proposed', $content);

            $tpl_proposed = array(
                'form' => array(
                    'action' => Config::$root_uri. 'admin/content/proposed',
                    'post_token' => $post_token
                )
            );
        }

    }
    else if (is_connected() && user()->isAdmin()) {
        $report = ReportQuery::create()->findOneByContent($content);

        if ($report && is_connected() && user()->isAdmin()) {

            $post_token = generate_post_token(user());

            FormData::create($post_token)->store('report', $report);

            $r_author = $report->getAuthor();

            $tpl_report = array(
                'author' => array(
                    'name' => $r_author->getPublicName(),
                    'href' => user_url($r_author)
                ),
                'date'   => array(
                    'text'     => Lang\date_fr($report->getDate()),
                    'datetime' => datetime_attr($report->getDate())
                ),
                'form'   => array(
                    'action'      => Config::$root_uri.'admin/reports',
                    'post_token'  => $post_token
                ),
                'explication' => $report->getText()
            );
        }
    }

    $scripts = array(
        array( 'href' => js_url( 'simple-content' ) )
    );
    $styles  = array(
        array( 'href' => css_url( 'simple-content' ) )
    );

    if ($course && $course->getUseSourcecode()) {

        $scripts = array(
            array( 'href' => js_url( 'pretty-content' ) )
        );

        $styles = array(
            array( 'href' => css_url( 'pretty-content' ) )
        );

    }

    $files = FileQuery::create()
                ->filterByAccessRights(array(
                    'min' => 0,
                    'max' => $user_rank
                ))
                ->limit(10)
                ->findByContent($content);

    if ($files) {
        $tpl_files = array();

        foreach ($files as $f) {
            $tpl_files []= tpl_file($f);
        }
    }

    $tpl_type = !$type ? null : array(
        'title' => $type->getName(),
        'href'  => ($cursus && $course) ? course_url($cursus, $course).'/#'.$type->getShortName() : '#'
    );

    $tpl_year = null;

    if ($year) {
        $tpl_year = array(
            'begin' => $year,
            'end'   => $year+1
        );
    }

    $tpl_content = array(
        'title'  => $content->getTitle(),
        'text'   => $content->getText(),
        'date'   => array(
            'text'     => Lang\date_fr($content->getDate()),
            'datetime' => datetime_attr($content->getDate())
        ),
        'files'  => $tpl_files,
        'author' => array(
            'name' => $user->getPublicName(),
            'href' => user_url($user)
        ),
        'type'   => $tpl_type
    );

    $keywords = array(
        $cursus->getName()
    );

    if ($course) {
        $keywords []= $course->getName();
        $keywords []= $course->getShortName();
    }

    $breadcrumbs = array(
        1 => array(
            'href'  => cursus_url($cursus),
            'title' => $cursus->getName()
        )
    );
    $breadcrumbs_next_indice = 2;

    if ($course) {
        $breadcrumbs [$breadcrumbs_next_indice++]= array(
            'href'  => course_url($cursus, $course),
            'title' => $course->getShortName()
        );
    }

    $breadcrumbs [$breadcrumbs_next_indice]= array(
        'href'  => url(),
        'title' => $content->getTitle()
    );

	return tpl_render('contents/base.html', array(
        'page' => Array(
            'title' => $content->getTitle(),
            'keywords' => $keywords,
            'description' => truncate_string($content->getText()),

            'breadcrumbs' => $breadcrumbs,

            'proposed' => $tpl_proposed,
            'report'   => $tpl_report,
            'content'  => $tpl_content,

            'message'      => $msg_str,
            'message_type' => $msg_type,

            'scripts' => $scripts,
            'styles'  => $styles

        )
    ));

}

function display_member_proposing_content_form() {

    $cursus_name = params('cursus');
    $course_name = params('course');

    $cursus = CursusQuery::create()->findOneByShortName($cursus_name);

    if (!$cursus) {
        halt(NOT_FOUND);
    }

    $course = CourseQuery::create()
                            ->filterByDeleted(false)
                            ->filterByCursus($cursus)
                            ->findOneByShortName($course_name);

    if (!$course) {
        halt(NOT_FOUND);
    }

    $url = course_url($cursus, $course).'/proposer';

    $tpl_content_types = array(
        array( 'value' => 0, 'name' => '' )
    );

    $content_types = ContentTypeQuery::create()->find();

    foreach ($content_types as $t) {
        $tpl_content_types []= array(
            'value' => $t->getId(),
            'name'  => $t->getName()
        );
    }

    $token = generate_post_token(user());

    // years
    $current_year = get_current_year();

    $tpl_years = array();

    for ($i=$current_year, $l=$current_year-6; $i>=$l; $i--) {
        $tpl_years []= array(
            'value' => $i,
            'name'  => $i.'/'.($i+1)
        );
    }


    $fd = FormData::create($token)
            ->store('course', $course)
            ->store('cursus', $cursus);

    return tpl_render('contents/proposing.html', array(
        'page' => array(
            'title' => 'Proposer un contenu '.Lang\de($course->getShortName()),

            'breadcrumbs' => array(
                1 => array(
                    'href'  => cursus_url($cursus),
                    'title' => $cursus->getName()
                ),
                2 => array(
                    'href'  => course_url($cursus,$course),
                    'title' => $course->getShortName()
                ),
                3 => array(
                    'href'  => $url,
                    'title' => 'Proposer un contenu'
                )
            ),

            'token' => $token,

            'form' => array(
                'action' => $url.'/prévisualiser',

                'values' => array(
                    'title' => '',
                    'text' => '',
                    'type' => ''
                ),

                'years' => $tpl_years,

                'max_files_nb' => MAX_FILES_PER_CONTENT,

                'types' => $tpl_content_types
            ),

            'scripts' => array(
                array( 'href' => js_url('proposing-content') )
            ),

            'styles' => array(
                array( 'href' => css_url('markdown-editor') )
            )
        )
    ));
}

function display_post_member_proposed_content_preview() {
    check_sent_content();

    $msg_str = '';
    $msg_type = null;

    // ** Token **

    $token = $_POST['t'];

    if (!use_token($token, 'POST')) {
        halt(HTTP_FORBIDDEN, 'Le jeton d\'authentification est invalide ou a expiré.');
    }

    $fd = FormData::create($token);

    if (!$fd->exists()) {
        halt(
            HTTP_INTERNAL_SERVER_ERROR,
              'Un problème interne est survenu avec le jeton d\'authentification'
            . ', veuillez réessayer.'
        );
    }

    // transfer of course/cursus to a new token
    $token2 = generate_post_token(user());
    $fd2 = FormData::create($token2)->store($fd->get());
    $fd->destroy();

    // ** Content type **

    $c_type_title = null;

    if (has_post('type', true)) {
        $c_type = ContentTypeQuery::create()->findOneById(intval($_POST['type']));

        if ($c_type) {
            if ($c_type->getAccessRights() > user()->getRights()) {
                halt(
                    HTTP_FORBIDDEN,
                      'Vous ne disposez pas des droits suffisant pour proposer '
                    . 'ce type de contenu.'
                );
            }
            $fd2->store('type', $c_type);

            $c_type_title = $c_type->getName();
        }
    }

    // ** Year **
    $tpl_year = null;
    $year = null;

    if (has_post('year')) {
        $year = intval(get_string('year', 'post'));

        if ($year) {
            $fd2->store('year', intval(get_string('year', 'post')));
            $tpl_year = array(
                'begin' => $year,
                'end'   => $year+1
            );
        }
    }

    // ** Title **

    // passing content informations via $_SESSION instead of <input type="hidden"/>
    $title = get_string('title', 'post');

    $title_exists = ContentQuery::create()
                        ->filterByCursus($fd2->get('cursus'))
                        ->filterByCourse($fd2->get('course'))
                        ->filterByYear($year)
                        ->findOneByTitle($title);

    if ($title_exists) {
        halt(HTTP_BAD_REQUEST, 'Ce titre est déjà pris.');
    }

    $fd2->store('title', $title);

    // ** Files **

    if (has_file('userfiles')) {
        $desc = has_post('desc') ? $_POST['desc'] : '';

        $fd2->store('files',
                upload_user_file(user(), 'userfiles', $desc, &$msg_str, &$msg_type));
    }

    $tpl_files = array();

    foreach($fd2->get('files') as $k => $file) {
        $tpl_files []= array( 'name' => $file->getTitle() );
    }

    // ** Text **

    $text = has_post('text') ? $_POST['text'] : '';

    if (!count($fd2->get('files')) && !$text) {
        halt(HTTP_BAD_REQUEST, 'Ce contenu est vide.');
    }

    $fd2->store('text', get_string('text', 'post'));

    return tpl_render('contents/proposing_preview.html', array(
        'page' => array(
            'title' => 'Prévisualisation de « '.$title.' »',

            'message'      => $msg_str,
            'message_type' => $msg_type,

            'breadcrumbs' => false,

            'content' => array(
                'title' => $title,
                'text'  => $text,
                'type'  => $c_type_title,
                'year'  => $tpl_year,
                'files' => $tpl_files
            ),

            'form' => array(
                'token' => $token2,
                'action' => course_url($fd2->get('cursus'), $fd2->get('course')).'/proposer'
            ),

            'styles' => array(
                array( 'href' => css_url( 'simple-content' ) )
            ),
            'scripts' => array(
                array( 'href' => js_url( 'simple-content' ) )
            )
        )
    ));
}

function display_post_member_proposed_content() {
    $token = $_POST['t'];

    $fd = FormData::create($token);

    if (!use_token($token, 'POST') || !$fd->exists()) {
        halt(HTTP_FORBIDDEN, 'Le jeton d\'authentification est invalide ou a expiré.');
    }

    $course = $fd->get('course');
    $cursus = $fd->get('cursus');

    $title  = $fd->get('title');
    $text   = $fd->get('text');

    $year   = $fd->get('year');

    $type   = $fd->get('type');

    $files  = $fd->get('files');

    $fd->destroy();

    $c = new Content();

    $c->setTitle($title);
    $c->setText($text);
    $c->setAuthor(user());
    $c->setDate(time());
    $c->setCursus($cursus);
    $c->setCourse($course);
    $c->setYear($year);

    if ($type) {
        $c->setContentType($type);
        $c->setAccessRights($type->getAccessRights());
    }

    foreach ($files as $k => $file) {
        $c->addFile($file);
    }

    if (!$c->validate()) {
        halt(HTTP_INTERNAL_SERVER_ERROR, "Le contenu n'est pas valide.");
    }
    else {
        $c->save();
        redirect_to(content_url($cursus, $course, $c));
    }
}

?>
