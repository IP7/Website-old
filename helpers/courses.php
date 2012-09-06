<?php

// return an array for contents which will be used
// in the template.
function tpl_course_contents($cursus, $course) {

    $user_rights = (is_connected()) ? user()->getRank() : 0;

    $types = ContentTypeQuery::create()
                ->where('Rights <= ?', $user_rights, PDO::PARAM_INT)
                ->find();

    if (!$types) {
        return null;
    }

    $tpl_contents = array();

    foreach($types as $t) {

        $tpl_cts = array();

        $cts = ContentQuery::create()
                ->filterByContentType($t)
                ->filterByCourse($course)
                ->filterByValidated(1)
                ->where('Access_Rights <= ?', $user_rights, PDO::PARAM_INT)
                ->find();

        if (count($cts)) {

            foreach ($cts as $c) {
                $tpl_cts []= array(
                    'href'  => course_url($cursus, $course).'/'.$c->getId(),
                    'title' => $c->getTitle()
                );
            }

            $tpl_contents []= array(
                'short_name' => $t->getShortName(),
                'title'      => Lang\plurial($t->getName()),

                'contents'   => $tpl_cts
            );
        }
    }

    return $tpl_contents;
}

?>
