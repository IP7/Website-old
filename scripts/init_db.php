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

$d = dirname(__FILE__);

$semesters = array(1,2);

foreach($cursus as $k => $v) {

    $paths_refs = array();

    if (file_exists($d.'/'.$k.'_courses.php')) {
        include $d.'/'.$k.'_courses.php';

        $paths = $c['educational_paths'];

        foreach ($paths as $s => $p) {

            $p_query = EducationalPathQuery::create()->findOneByShortName($s);

            if ($p_query) {
                $paths_refs[$s] = $p_query;
                continue;
            }

            $path = new EducationalPath();
            $path->setShortName($s);
            $path->setName($p[0]);
            $path->setDescription($p[1]);
            $path->setCursus($cursus[$k]);
            $path->save();

            $paths_refs[$s] = $path;
        }

        $courses = $c['courses'];

        foreach ($courses as $n => $s) {

            // semester number
            $s_n = $n + 1;

            foreach ($s as $code => $course) {
                $c = CourseQuery::create()->findOneByCode($code);

                if (!$c) {
                    $c = new Course();
                    $c->setCode($code);
                    $c->setECTS((float)($course[0]));
                    $c->setCursus($cursus[$k]);
                    $c->setName($course[1]);
                    $c->setDescription($course[2]);
                    $c->setSemester($s_n);
                }

                foreach ($course[3] as $_ => $mandatory_for) {
                    $c->addMandatoryEducationalPath($paths_refs[$mandatory_for]);
                }

                foreach ($course[4] as $_ => $optional_for) {
                    $c->addOptionalEducationalPath($paths_refs[$optional_for]);
                }

                $c->save();
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
	 $admin->setDeactivated(0);
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
	$content->setText('Lorem ipsum dolor sit amet');
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
