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
?>
