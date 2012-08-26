<?php

function display_path() {
    $cursus_name = params('cursus');
    $path_name   = params('path');

    $cursus = CursusQuery::create()->findOneByShortName($cursus_name);

    if (!$cursus) {
        halt(NOT_FOUND);
    }

    $path = EducationalPathQuery::create()
                ->filterByCursus($cursus)
                ->findOneByShortName($path_name);

    if (!$path) {
        halt(NOT_FOUND);
    }

    // if there is only one educational path for this cursus
    if ($cursus->countEducationalPaths() == 1) {
        redirect_to('/cursus/'.$cursus->getShortName(), array('status' => HTTP_MOVED_PERMANENTLY));
    }

    //TODO
    return 'Test: '.$path->getName();
}

?>

