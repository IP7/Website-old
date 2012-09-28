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

            $no_year = array();

            foreach ($cts as $c) {
                $year = 0+$c->getYear();

                if ($year < 2000) {
                    $no_year []= array(
                        'href'  => course_url($cursus, $course).'/'.$c->getId(),
                        'title' => $c->getTitle()
                    );
                    continue;
                }
                if (!array_key_exists($year, $tpl_cts)) {
                    $tpl_cts[$year] = array(
                        'title'    => $year.'/'.($year+1),
                        'contents' => array()
                    );
                }

                $tpl_cts [$year]['contents'] []= array(
                    'href'  => course_url($cursus, $course).'/'.$c->getId(),
                    'title' => $c->getTitle()
                );
            }

            $tpl_contents []= array(
                'short_name' => $t->getShortName(),
                'title'      => Lang\plurial($t->getName()),

                'years'   => $tpl_cts,
                'no_year' => $no_year
            );
        }
    }

    return $tpl_contents;
}

?>
