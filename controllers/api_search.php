<?php

// return a list of objects {title: <title>, href: <url>}
// for all entities of the given types, up to 150 for each type
// currently supported types:
//  - course
//  - cursus
//  - educational_path
//  - user
function json_get_entities_links_list() { // ?types=<type1,type2,...>

    $types = get_string('types', 'GET');

    if (!$types) {
        return json(array());
    }

    $types = array_unique(explode(',', $types));

    if (count($types) === 0) {
        return json(array());
    }

    $links = array();

    foreach ($types as $t) {

        if ($t === 'user') {
            $q = UserQuery::create()
                    ->limit(150)
                    ->findByActivated(1);

            foreach ($q as $_ => $u) {

                if ($u->hasTempUsername()) { continue; }

                $n = $u->getPublicName();
                if ($n != $u->getUsername()) {
                    $n .= ' (' . $u->getUsername() . ')';
                }

                $links []= array(
                    'title' => $n,
                    'href' => user_url($u)
                );
            }
        } else if ($t === 'course') {
            $q = CourseQuery::create()
                    ->limit(150)
                    ->findByDeleted(0);

            foreach ($q as $_ => $c) {
                $links []= array(
                    'title' => $c->getName() . ' (' . $c->getShortName() . ')',
                    'href' => course_url($c->getCursus(), $c)
                );
            }
        } else if ($t === 'cursus') {
            $q = CursusQuery::create()
                    ->limit(150)
                    ->find();

            foreach ($q as $_ => $c) {
                $links []= array(
                    'title' => $c->getName() . ' (' . $c->getShortName() . ')',
                    'href' => cursus_url($c)
                );
            }
        } else if ($t === 'educational_path') {
            $q = EducationalPathQuery::create()
                    ->limit(150)
                    ->findByDeleted(0);

            foreach ($q as $_ => $e) {
                $c = $e->getCursus();
                $links []= array(
                    'title' => $e->getName() . ' (' . $e->getShortName() . ', ' . $c->getShortName() . ')',
                    'href' => educpath_url($c, $e)
                );
            }
        }

    }


    return json($links);
}
