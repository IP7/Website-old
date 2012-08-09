<?php

// Cursus

# $l1 = new Cursus();
# $l1->setName('Licence 1');
# $l1->setDescription('Première année de licence.');
# $l1->save();
# 
# $l2 = new Cursus();
# $l2->setName('Licence 2');
# $l2->setDescription('Deuxième année de licence.');
# $l2->save();
# 
# $l3 = new Cursus();
# $l3->setName('Licence 3');
# $l3->setDescription('Troisième et dernière année de licence.');
# $l3->save();
# 
# $m1 = new Cursus();
# $m1->setName('Master 1');
# $m1->setDescription('Première année de master');
# $m1->save();
# 
# $m2 = new Cursus();
# $m2->setName('Master 2');
# $m2->setDescription('Seconde et dernière année de master.');
# $m2->save();
# 
# // Courses
# 
# $pf1 = new Course();
# $pf1->setCursus($l1);
# $pf1->setSemester(1);
# $pf1->setOptional(false);
# $pf1->setName('PF1');
# $pf1->setDescription('Principe de Fonctionnement des machines binaires.');
# $pf1->save();
# 
# $if1 = new Course();
# $if1->setCursus($l1);
# $if1->setSemester(1);
# $if1->setOptional(false);
# $if1->setName('IF1');
# $if1->setDescription('Initiation à la programmation avec Java.');
# $if1->save();
# 
# $io2 = new Course();
# $io2->setCursus($l1);
# $io2->setSemester(2);
# $io2->setOptional(false);
# $io2->setName('IO2');
# $io2->setDescription('Internet et Outils : HTML, CSS, PHP, MySQL');
# $io2->save();

// Users

$admin = new User();
$admin->setUsername('admin');
$admin->setPassword('infop7');
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

?>

