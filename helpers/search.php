<?php

function user_to_search_result($u) {
    return array(
        'title' => $u->getPublicName(),
        'href'  => user_url($u)
    );
}

function cursus_to_search_result($c) {
    return array(
        'title' => $c->getName().' ('.$c->getShortName().')',
        'href'  => cursus_url($c)
    );
}

function educational_path_to_search_result($e) {

    $c = $e->getCursus();

    if (!$c) {
        return null;
    }

    return array(
        'title' => $e->getName().' ('.$c->getShortName().' '.$e->getShortName().')',
        'href'  => cursus_url($c).'/parcours/'.$e->getShortName()
    );
}

function course_to_search_result($c) {

    $cursus = $c->getCursus();

    if (!$cursus) {
        return null;
    } 

    return array(
        'title' => $c->getName().' ('.$c->getCode().')',
        'href'  => course_url($cursus, $c)
    );
}

function search_users($q, $limit=10) {

    // usernames
    $users = UserQuery::create()
                ->filterByPublicProfile()

                ->condition('no_tmp',   'Username not like ?', '_tmp_%', PDO::PARAM_STR)

                // usernames
                ->condition('username', 'Username like ?', $q, PDO::PARAM_STR)

                // first names
                ->condition('firstname', 'Firstname like ?', $q, PDO::PARAM_STR)
                // last name
                ->condition('lastname', 'Lastname like ?', $q, PDO::PARAM_STR)

                ->combine(array('firstname', 'lastname'), 'or', 'name_parts')

                // we don't search in first/last names if the user doesn't want to
                // show their real name
                ->condition('publicname', 'Config_Show_Real_Name = \'1\'')
                ->combine(array('name_parts', 'publicname'), 'and', 'name')

                // email (idem)
                ->condition('email1', 'Config_Show_Email = ?', '1', PDO::PARAM_INT)
                ->condition('email2', 'Email like ?', $q, PDO::PARAM_STR)

                ->combine(array('email1', 'email2'), 'and', 'email')

                ->combine(array('username', 'name', 'email'), 'or', 'q')

                ->where(array('no_tmp', 'q'), 'and');

    $users = (is_connected() && user()->isAdmin()) ? $users->find() : $users->findByDeactivated(0);

    $results = array();

    foreach ($users as $u) {
        $results []= user_to_search_result($u);
    }

    return $results;
}

function search_contents($q, $limit=10) {
    return array(); //TODO
}

function search_cursus($q, $limit=10) {
    $cursus = CursusQuery::create()
                ->limit($limit)
                // short name
                ->condition('shortname', 'Short_Name like ?', $q, PDO::PARAM_STR)
                // name
                ->condition('name', 'Name like ?', $q, PDO::PARAM_STR)

                ->where(array('shortname', 'name'), 'or')

                ->find();

    $results = array();

    foreach ($cursus as $c) {
        $results []= cursus_to_search_result($c);
    }

    return $results;
}

function search_educational_paths($q, $limit=10) {
    $paths = EducationalPathQuery::create()
                ->limit($limit)
                // short name
                ->condition('shortname', 'Short_Name like ?', $q, PDO::PARAM_STR)
                // name
                ->condition('name', 'Name like ?', $q, PDO::PARAM_STR)

                ->where(array('shortname', 'name'), 'or')
                ->find();

    $results = array();

    foreach ($paths as $c) {
        $results []= educational_path_to_search_result($c);
    }

    return $results;
}

function search_courses($q, $limit=10) {
    $courses = CourseQuery::create()
                    ->limit($limit)
                    // name
                    ->condition('name', 'Name like ?', $q, PDO::PARAM_STR)
                    // code
                    ->condition('code', 'Code like ?', $q, PDO::PARAM_STR)

                    ->where(array('name', 'code'), 'or')
                    ->find();

    $results = array();

    foreach ($courses as $c) {
        $results []= course_to_search_result($c);
    }

    return $results;
}

function perform_search($q, $full_text=false, $category_limit=10) {
    $q = '%'.$q.'%';
    $results = array(
        'users'             => array(
            'title'  => 'Utilisateurs',
            'values' => search_users($q, $category_limit)
        ),
        'cursus'            => array(
            'title'  => 'Cursus',
            'values' => search_cursus($q, $category_limit)
        ),
        'educational_paths' => array(
            'title'  => 'Parcours pédagogiques',
            'values' => search_educational_paths($q, $category_limit)
        ),
        'courses'           => array(
            'title'  => 'Cours',
            'values' => search_courses($q, $category_limit)
        ),
        'contents'          => array(
            'title'  => 'Contenus',
            'values' => search_contents($q, $category_limit)
        )
        // add others categories here
    );
    
    return $results;
}

?>
