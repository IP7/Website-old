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

    $tpl_content_types = array();

    $content_types = ContentTypeQuery::create()->find();

    foreach ($tontent_types as $t) {
        $tpl_content_types []= array(
            array( 'value' => $t->getId(), 'name' => $t->getName() )
        );
    }

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

            'token' => generate_post_token(user()),

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

function display_member_proposed_content_preview() {

}

?>
