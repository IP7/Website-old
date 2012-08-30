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

?>
