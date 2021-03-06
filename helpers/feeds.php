<?php

// used to sort dated feed elements
function feedElCmp($a, $b) {
    if ($a['date'] === $b['date']) { return 0; }
    return ($a['date'] < $b['date']) ? 1 : -1; // reverse sorting
}

/**
 * Helper to generate feeds for cursus/courses. It includes
 * 25 last publicly added contents (default)
 *
 * $cursus_sn: cursus short name, given in the URL
 * $course_sn: course short name, given in the URL. May be null, if
 *             we use the helper for a cursus
 * $type:      feed type, 'rss' or 'atom'
 * $nc:        deprecated, always 0
 **/
function feed_helper($cursus_sn, $course_sn, $type='atom',
                     $nc=0, $contents_count=25) {

    $cursus = null;
    if ($cursus_sn !== null) {
        $cursus = CursusQuery::create()
                    ->findOneByShortName($cursus_sn);

        if ($cursus === null) {
            halt(NOT_FOUND);
        }
    }

    $course = null;
    if ($course_sn !== null) {
        $course = CourseQuery::create()
                    ->filterByCursus($cursus)
                    ->filterByDeleted(false)
                    ->findOneByShortName($course_sn);

        if ($course === null) {
            halt(NOT_FOUND);
        }
    }

    $user_rights = is_connected() ? user()->getRights() : 0;

    $title = 'IP7';

    if ($course) {
        $title = $course->getName();
    } else if ($cursus) {
        $title = $cursus->getName();
    }

    $desc = 'Nouveaux contenus';

    $isRSS = ($type === 'rss'); // RSS2 or Atom
    $time  = time();
    $root  = 'http://www.infop7.org';
    $url   = $root . url();

    $feed = $isRSS ? new \FeedWriter\RSS2() : new \FeedWriter\Atom();

    $feed->setTitle($title);
    $feed->setLink($url);
    $feed->setDescription($desc . \Lang\de($title));

    if ($isRSS) {

        $feed->setImage($title, $url, 'http://www.infop7.org/views/static/images/logo32transp.png');
        $feed->setChannelElement('pubDate', date(DATE_RSS , $time));
        $feed->setChannelElement('language', 'fr');

    } else {

        $feed->setChannelElement('updated', date(DATE_ATOM , $time));
        $feed->setChannelElement('author', array('name'=>'InfoP7'));

    }

    if ($contents_count > 0) {

        $contents = ContentQuery::create()
                            ->filterByValidated(true)
                            ->filterByDeleted(false)
                            ->where(  '(SELECT content_types.access_rights '
                                    . 'FROM content_types '
                                    . 'WHERE content_types.id = contents.content_type_id) <= ?',
                            $user_rights, PDO::PARAM_INT)
                            ->where('Access_Rights <= ?', $user_rights, PDO::PARAM_INT)
                            ->orderByCreatedAt('desc')
                            ->limit($contents_count);

        if ($cursus) {
            $contents = $contents->joinWith('Content.Course')->filterByCursus($cursus);
        }

        if ($course) {
            $contents = $contents->filterByCourse($course);
        }

        $contents = $contents->find();

    } else {
        $contents = array();
    }

    $els = array();

    foreach ($contents as $_ => $c) {

        $link = $root . content_url($cursus, $c->getCourse(), $c, true);
        $text = $c->getText();

        $els []= array(

            'title' => 'Ajout d\'un contenu : ' . $c->getTitle(),
            'link'  => $link,
            'date'  => $c->getCreatedAt(),
            'desc'  => $text ? $text : ' ',
            'guid'  => $link,
            'perma' => 'true'

        );

    }

    if ($contents_count > 0) {
        usort($els, 'feedElCmp');
    }

    foreach ($els as $_ => $e) {

        $item = $feed->createNewItem();
        $item->setTitle($e['title']);
        $item->setLink($e['link']);
        $item->setDate($e['date']);
        $item->setDescription($e['desc']);

        if ($isRSS) {
            $item->addElement('guid', $e['guid'], array('isPermaLink' => $e['perma']));
        }

        $feed->addItem($item);

    }

    # RSS2
    $contentType = 'application/rss+xml';

    if (!$isRSS) {
        $contentType = 'application/atom+xml';
    }

    send_header('Content-Type: ' . $contentType . '; charset='.strtolower(option('encoding')));
    return $feed->generateFeed();

}
