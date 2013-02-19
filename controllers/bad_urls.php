<?php

# These controllers are called if no route match
# on any URL like: /:name/**
#
# They try to redirect the user to an existing page

function bad_url() {
    return bad_url_try_with_cursus();
}

function bad_url_try_with_cursus() {

    $cursus_sn = params('name');
    $url_end   = params(1);

    $cursus = CursusQuery::create()
                ->findOneByShortName($cursus_sn);

    if ($cursus) {
        redirect_to( cursus_url($cursus) . '/' . $url_end );
    }

    return bad_url_try_with_course();
}

function bad_url_try_with_course() {

    $course_sn = params('name');
    $url_end   = params(1);

    $course = CourseQuery::create()
                ->joinWith('Course.Cursus')
                ->findOneByShortName($course_sn);

    if ($course) {
        redirect_to( course_url($course->getCursus(), $course) . '/' . $url_end );
    }

    return bad_url_404();
}

function bad_url_404() {
    halt(NOT_FOUND);
}

# -- Called from other controllers -- #

function bad_url_try_with_course_alias( $code ) {

    $alias = CourseAliasQuery::create()
                ->findOneByShortName($code);

    if ($alias) {

        $course = $alias->getCourse();

        if ($course) {
            redirect_to( course_url($course->getCursus(), $course) );
        }

    }

    return bad_url_404();

}
