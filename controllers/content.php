<?php

function display_content_view(){

	$contentId = (int)params('id');
	$cursusSN = (string)params('cursus');
	$courseCode = (string)params('course');

	$content	= ContentQuery::create()->findOneById($contentId);
	$user		= $content->getAuthor();
	$course	= $content->getCourse();
	$cursus	= $content->getCursus();

	$report = ReportQuery::create()->findOneByContentId($contentId);
	$reportArray = Array();

	if ( ((strtoupper($cursusSN) != $cursus->getShortName()) && (strtoupper($courseCode) != $course->getCode())) || !$content->isValidate() )
		halt(NOT_FOUND);

	if ( user()->isAdmin() && $report instanceof Report ){

		$option = Array(
				Array(	'title' => 'Valider'),
				Array(	'title' => 'Supprimer')
			);
	
		$reportArray = Array(
				'reportId' => $report->getId(),
				'contentId' => $contentId,
				'author' => $report->getAuthor()->getUsername(),
				'reportDate' => $report->getDate(),
				'reason' => $report->getText(),
				'href' => Config::$root_uri . 'admin/reports',
				'options' => $option
			);

	}

	$contentArray = Array(
				'title' => $content->getTitle(),
				'cursus' => $cursus->getName(),
				'contentText' => $content->getText(),
				'courseName' => $course->getName(),
				'courseCode' => $course->getCode(),
				'date' => $content->getDate(),
				'username' => $user->getUsername()
			);

	return Config::$tpl->render('content_view.html', tpl_array(admin_tpl_default(),array(
					'page' => Array(
                        'title' => $content->getTitle(),
                        'keywords' => array( $cursus->getName(), $course->getName(), $course->getCode() ),
                        'description' => '',

						'report' => $reportArray,
						'content' => $contentArray
					)
		)));

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

    $_SESSION['forms_data'][$token] = array(
        'course' => $course,
        'cursus' => $cursus
    );

    return tpl_render('contents/proposing.html', array(
        'page' => array(
            'title' => 'Proposer un contenu '.de($course->getCode()),

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

    $forms_data = $_SESSION['forms_data'];

    if (!array_key_exists($token, $forms_data)) {
        halt(
            HTTP_INTERNAL_SERVER_ERROR,
              'Un problème interne est survenu avec le jeton d\'authentification'
            . ', veuillez réessayer.'
        );
    }

    $course = $forms_data[$token]['course'];
    $cursus = $forms_data[$token]['cursus'];

    $token2 = generate_post_token(user());

    $_SESSION['forms_data'][$token2] = $_SESSION['forms_data'][$token];
    unset($_SESSION['forms_data'][$token]);

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
            $_SESSION['forms_data'][$token2]['type'] = $c_type;
        }
    }

    $text = has_post('text') ? format_text($_POST['text']) : '';

    // passing content informations via $_SESSION instead of <input type="hidden"/>
    $_SESSION['forms_data'][$token2]['title'] = $_POST['title'];
    $_SESSION['forms_data'][$token2]['text']  = $_POST['text'];

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
                'action' => course_url($cursus, $course).'/proposer'
            )
        )
    ));
}

function display_post_member_proposed_content() {
    $token = $_POST['t'];

    if (!use_token($token, 'POST')) {
        halt(HTTP_FORBIDDEN, 'Le jeton d\'authentification est invalide ou a expiré.');
    }

    $forms_data = $_SESSION['forms_data'];

    if (!array_key_exists($token, $forms_data)) {
        halt(
            HTTP_INTERNAL_SERVER_ERROR,
              'Un problème interne est survenu avec le jeton d\'authentification'
            . ', veuillez réessayer.'
        );
    }

    $forms_data = $forms_data[$token];

    $course = $forms_data['course'];
    $cursus = $forms_data['cursus'];

    $title = $forms_data['title'];
    $text  = $forms_data['text'];

    unset($_SESSION['forms_data'][$token]);

    $c = new Content();
    $c->setTitle($title);
    $c->setText($text);
    $c->setAuthor(user());
    $c->setDate(time());
    $c->setCursus($cursus);
    $c->setCourse($course);

    if (has_post('type')) {

        $type_id = intval($_POST['type']);

        if ($type_id > 0) {
            $type = ContentTypeQuery::create()->findOneById($type_id);

            if ($type) {
                $c->setType($type);
                $c->setRights($type->getRights());
            }
        }
    }

    if (!$c->validate()) {
        //TODO
    }
    else {
        $c->save();
        return "ok."; //TODO
    }
}

?>
