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

    if (!$course || !$cursus) {
        halt(NOT_FOUND);
    }

    if ($course->getCode() != $course_code || $cursus->getShortName() != $cursus_sn) {
        redirect_to('/cursus/'.$cursus->getShortName().'/'.$course->getCode().'/'.$content_id);
    }

    $rights = $content->getAccessRights();

    $type = $content->getContentType();

    if ($type && $type->getRights() > $rights) {
        $rights = $type->getRights();
    }

    if (   (!is_connected() && $rights > 0)
        || (is_connected()  && $rights > user()->getRank())) {
        halt(HTTP_FORBIDDEN, 'Vous n\'avez pas le droit d\'accéder à ce contenu.');
    }

    $msg_str  = null;
    $msg_type = null;

    $tpl_report = null;

    if (!$content->getValidated()) {
        if (!is_connected() || (user()->getId() != $user->getId() && !user()->isAdmin())) {
            halt(NOT_FOUND);
        }
        $msg_str  = 'Ce contenu est en attente de validation.';
        $msg_type = 'notice';
    }
    else {
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
                    'action'      => Config::$root_uri.'/admin/reports',
                    'post_token'  => $post_token
                ),
                'explication' => $report->getText()
            );
        }
    }

    $type_name = null;

    if ($type) {
        $type_name = $type->getName();
    }

    $tpl_content = array(
        'title'  => $content->getTitle(),
        'text'   => format_text($content->getText()),
        'date'   => array(
            'text'     => Lang\date_fr($content->getDate()),
            'datetime' => datetime_attr($content->getDate())
        ),
        'author' => array(
            'name' => $user->getPublicName(),
            'href' => Config::$root_uri.'p/'.$user->getUsername()
        ),
        'type'   => $type_name
    );

	return tpl_render('content_view.html', array(
        'page' => Array(
            'title' => $content->getTitle(),
            'keywords' => array( $cursus->getName(), $course->getName(), $course->getCode() ),
            'description' => '',

            'breadcrumbs' => array(
                1 => array(
                    'href'  => cursus_url($cursus),
                    'title' => $cursus->getName()
                ),
                2 => array(
                    'href'  => course_url($cursus,$course),
                    'title' => $course->getCode()
                ),
                3 => array(
                    'href'  => url(),
                    'title' => $content->getTitle()
                )
            ),

            'report'   => $tpl_report,
            'content'  => $tpl_content,

            'message'      => $msg_str,
            'message_type' => $msg_type
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
                            ->filterByCursus($cursus)
                            ->findOneByCode($course_name);

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

    $fd = FormData::create($token)
            ->store('course', $course)
            ->store('cursus', $cursus);

    return tpl_render('contents/proposing.html', array(
        'page' => array(
            'title' => 'Proposer un contenu '.Lang\de($course->getCode()),

            'breadcrumbs' => array(
                1 => array(
                    'href'  => cursus_url($cursus),
                    'title' => $cursus->getName()
                ),
                2 => array(
                    'href'  => course_url($cursus,$course),
                    'title' => $course->getCode()
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

                'types' => $tpl_content_types
            )
        )
    ));
}

function display_post_member_proposed_content_preview() {
    check_sent_content();

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

    if (has_post('type', true)) {
        $c_type = ContentTypeQuery::create()->findOneById(intval($_POST['type']));

        if ($c_type) {
            if ($c_type->getRights() > user()->getRank()) {
                halt(
                    HTTP_FORBIDDEN,
                      'Vous ne disposez pas des droits suffisant pour proposer '
                    . 'ce type de contenu.'
                );
            }
            $fd2->store('type', $c_type);
        }
    }

    $text = has_post('text') ? format_text($_POST['text']) : '';

    // passing content informations via $_SESSION instead of <input type="hidden"/>
    $fd2->store('title', get_string('title', 'post'));
    $fd2->store('text', get_string('text', 'post'));

    return tpl_render('contents/proposing_preview.html', array(
        'page' => array(
            'title' => 'Prévisualisation de « '.$_POST['title'].' »',

            'breadcrumbs' => false,

            'content' => array(
                'title' => $_POST['title'],
                'text'  => $text
            ),

            'form' => array(
                'token' => $token2,
                'action' => course_url($fd2->get('cursus'), $fd2->get('course')).'/proposer'
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

    $type   = $fd->get('type');

    $fd->destroy();

    $c = new Content();
    $c->setTitle($title);
    $c->setText($text);
    $c->setAuthor(user());
    $c->setDate(time());
    $c->setCursus($cursus);
    $c->setCourse($course);

    if ($type) {
        $c->setContentType($type);
        $c->setAccessRights($type->getRights());
    }

    if (!$c->validate()) {
        return 'validation error.'; //TODO
    }
    else {
        $c->save();
        redirect_to('/cursus/'.$cursus->getShortName().'/'.$course->getCode().'/'.$c->getId());
    }
}

?>
