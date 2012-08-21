<?php

// Cursus

$cursus = array(
    'l1' => array(
        'Licence 1',
        'Première année de licence.'
    ),

    'l2' => array(
        'Licence 2',
        'Deuxième année de licence.'
    ),

    'l3' => array(
        'Licence 3',
        'Troisième et dernière année de licence.'
    ),

    'm1' => array(
        'Master 1',
        'Première année de master.'
    ),

    'm2' => array(
        'Master 2',
        'Seconde et dernière année de master.'
    )
);

foreach ($cursus as $k => $opts) {
    $q = CursusQuery::create()->findOneByShortName($k);

    if ($q != NULL) {
        $cursus[$k] = $q;
        continue;
    }

    $c = new Cursus();
    $c->setName($opts[0]);
    $c->setShortName($k);
    $c->setDescription($opts[1]);
    $c->save();
    $cursus[$k] = $c;
}

// Courses

$d = dirname(__FILE__);

foreach($cursus as $k => $v) {

    $semesters = array(1, 2);
    $option = array(0,1);

    if (file_exists($d.'/'.$k.'_courses.php')) {
        include $d.'/'.$k.'_courses.php';

        foreach ($semesters as $n => $s) {

            foreach ($option as $opt) {

                foreach ($c[$n][$opt] as $code => $desc) {

                    $q = CourseQuery::create()->findOneByCode($code);

                    if ($q != NULL) {
                        continue;
                    }

                    $course = new Course();
                    $course->setCode($code);
                    $course->setName($desc[1]);
                    $course->setECTS((int)$desc[0]);
                    $course->setCursus($cursus[$k]);
                    $course->setSemester($s);
                    $course->setOptional((bool)$opt);
                    $course->setDescription($desc[2]);
                    $course->save();
                }
            }
        }
    }
}

// Users
$q = UserQuery::create()->findOneByUsername('admin');
if (!$q) {
    $admin = new User();
    $admin->setUsername('admin');
    $admin->setPassword('infop7');
    $admin->setGender('M');
    $admin->setType(ADMIN_RANK);
    $admin->setFirstName('Admin');
    $admin->setLastName('Istrateur');
    $admin->setEmail('batifon@yahoo.fr');
    $admin->setPhone('0102030405');
    $admin->setAddress('12 rue des Universités, 75016 Paris');
    $admin->setWebsite('http://www.google.com');
    $admin->setBirthDate('1994-04-23');
    $admin->setFirstEntry('2012-08-09');
    $admin->setLastEntry('2012-08-09');
    $admin->setLastVisit(time());
    $admin->setDescription('Utilisateur administrateur de test');
    $admin->setRemarks('tralala');
    $admin->save();
}

// Content Proposed
$q = ContentQuery::create()->findOneById(1);
if (!$q){
	$content = new Content();
	$content->setAuthorId(1);
	$content->setDate('2012-08-15 10:10:10');
	$content->setValidated(false);
	$content->setTitle('Test de proposition');
	$content->setText('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent gravida cursus risus. Curabitur pellentesque diam nisi. Maecenas pharetra urna eu enim aliquet sit amet congue metus facilisis. Vestibulum et augue arcu. Aliquam bibendum diam sed tortor auctor vitae dapibus lacus rutrum. Vivamus diam ligula, congue vitae pharetra ac, lobortis quis lorem. In vel nisi eu metus auctor tincidunt. Vestibulum accumsan diam diam, ut euismod magna. Pellentesque eu erat vitae tellus vestibulum fermentum. Quisque vitae tempus nulla.

Nunc eget tristique nisl. Suspendisse cursus, orci id consectetur euismod, neque leo dignissim urna, a faucibus erat neque at dolor. Phasellus eget placerat sapien. Morbi ornare lectus sit amet turpis tristique volutpat. Nulla facilisi. Etiam hendrerit, massa at vulputate tempor, ante lorem lacinia odio, a lobortis orci metus sit amet erat. Pellentesque ut mauris in dui tempor hendrerit eget a massa. Ut mattis lacus quis lorem mollis pretium.

Vestibulum est odio, ornare eget adipiscing a, vehicula at mi. Donec pretium sagittis tortor, non rutrum velit elementum eu. Nullam pretium eleifend metus, ut adipiscing mi convallis nec. Aenean nec justo lacus. Cras venenatis nisl ac lacus aliquam ultricies. Nulla est urna, faucibus at placerat vitae, mattis in odio. In gravida, nunc at feugiat tempus, felis purus porta nisl, nec facilisis nisl magna vitae metus. Donec laoreet nulla et erat volutpat non mattis turpis molestie. Fusce nec arcu id nunc varius bibendum.');
	$content->setCursusId(1);
	$content->setCourseId(1);
	$content->save();
}

$q = ReportQuery::create()->findOneById(1);
if (!$q){
	$report = new Report();
	$report->setContentId(1);
	$report->setAuthorId(1);
	$report->setDate('2012-08-15 10:10:11');
	$report->setText('Reporté car tout est écrit en latin. Et que le latin c\'le mal !');
	$report->save();
}
?>
