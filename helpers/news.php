<?php

// Return news (Propel objects)
function get_news($cursus=null, $course=null) {

    $user_rights = is_connected() ? user()->getRank() : 0;

    $q = NewsQuery::create()
                ->where('Access_Rights <= ?', $user_rights, PDO::PARAM_INT)
                ->limit(10)
                ->orderByDate('desc');

    if ($cursus) {
        $q = $q->filterByCursus($cursus);
    }

    if ($course) {
        $q = $q->filterByCourse($course);
    }

    return $q->find();
}

?>
