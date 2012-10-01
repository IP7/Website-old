<?php

// Return news (Propel objects)
function get_news($cursus=null, $course=null) {

    $user_rights = is_connected() ? user()->getRank() : 0;

    return NewsQuery::create()
                ->filterByCursus($cursus)
                ->filterByCourse($course)
                ->where('Access_Rights <= ?', $user_rights, PDO::PARAM_INT)
                ->limit(10)
                ->find();

}

?>
