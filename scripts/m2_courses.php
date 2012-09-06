<?php

$c = array(

    'educational_paths' => array(
        'LC'   => array( 'Logiciels Critiques', '' ),
        'LP'   => array( 'Langages et Programmation', ''),
        'SRI'  => array( 'Système, Réseaux, Internet', '' ),
        'MPRI' => array( 'Master Parisien de Recherche en Informatique', '')
    ),

    'courses' => array(
        array(

            'Ang' => array(
                3, 'Anglais', 'Doit être pris au S1 ou au S2.',
                array( 'LC', 'LP', 'SRI' ), array()
            ),
            'ModSpec' => array(
                3, 'Modélisation et spécification', '',
                array( 'LC'), array( 'LP', 'SRI' )
            ),
            'ProgSync' => array(
                3, 'Programmation synchrone', '',
                array( 'LC' ), array( 'LP', 'SRI' )
            ),
            'Secur' => array(
                3, 'Sécurité', '',
                array( 'LC' ), array( 'SRI' )
            ),
            'ProtInt' => array(
                3, 'Protocoles Internet', '',
                array(), array( 'SRI', 'LC' )
            ),
            'PooCA' => array(
                3, 'Programmation Objet : concepts avancés', '',
                array( 'LP' ), array( 'SRI', 'LC' )
            ),
            'CompilAv' => array(
                3, 'Compilation avancée', '',
                array( 'LP' ), array( 'LC' )
            ),
            'IngProt' => array(
                3, 'Ingénierie des protocoles', '',
                array(), array( 'SRI', 'LC' )
            ),
            'GRI' => array(
                3, 'Grands réseaux d\'interaction', '',
                array(), array( 'SRI' )
            ),
            'CavBD' => array(
                3, 'Concepts avancés de base de données', '',
                array(), array( 'LP' )
            ),
            //'?' => array(
            //    3, 'Entrepôts de données', '',
            //    array(), array()
            //),
            'Formats' => array(
                3, 'Formats de documents et compression', '',
                array(), array( 'SRI' )
            ),
            'PrLogAv' => array(
                3, 'Programmation logique et par contraintes avancées', '',
                array(), array( 'LP' )
            ),
            'Typage' => array(
                3, 'Typage', '',
                array(), array( 'LP' )
            ),
            'MacOS-X' => array(
                3, 'Interfaces et outils de MacOS X', '',
                array(), array( 'SRI' )
            )
        ),
        array(
            'AlgVerif' => array(
                3, 'Méthodes algorithmiques pour la vérification', '',
                array( 'LC' ), array( 'LP' )
            ),
            'PreuvePr' => array(
                3, 'Preuves de programmes', '',
                array( 'LP' ), array( 'LC' )
            ),
            'AnStatPr' => array(
                3, 'Analyse statique de programmes', '',
                array( 'LP' ), array( 'LC' )
            ),
            'MethTest' => array(
                3, 'Méthodes de test', '',
                array( 'LP' ), array( 'LC' )
            ),
            'ProgComp' => array(
                3, 'Programmation comparée', '',
                array( 'LC' ), array( 'LP' )
            ),
            'IntAutom' => array(
                3, 'Introduction à l\'automatique', '',
                array( 'LC' ), array()
            ),
            // '?' => array(
            //     3, 'Informatique embarquée', '',
            //     array(), array( 'SRI', 'LC' )
            // ),
            'MotRech' => array(
                3, 'Moteurs de recherche', '',
                array(), array( 'SRI' )
            ),
            'MobGril' => array(
                3, 'Mobilité et grille de calculs', '',
                array(), array( 'SRI' )
            ),
            'AlgRep' => array(
                3, 'Algorithmique répartie', '',
                array(), array( 'SRI' )
            ),
            'ProgRep' => array(
                3, 'Programmation répartie', '',
                array(), array( 'LP', 'SRI' )
            ),
            // '?' => array(
            //     3, 'Réseaux sécurisés', '',
            //     array(), array( 'SRI', 'LC' )
            // ),
            'AdminSysR' => array(
                3, 'Administration système et réseau', '',
                array(), array( 'SRI' )
            ),
            'XML' => array(
                3, 'XML', '',
                array(), array( 'LP', 'SRI' )
            ),
            'ArchSI' => array(
                3, 'Architecture des systèmes d\'information', '',
                array(), array( 'LP' )
            ),
            // '?' => array(
            //     3, 'Fouilles de données et aide à la décision', '',
            //     array(), array()
            // ),
            'SystAv' => array(
                3, 'Systèmes avancés', '',
                array(), array( 'SRI' )
            ),
            'Stage' => array(
                24, 'Stage en entreprise', '',
                array( 'LP', 'SRI', 'LC' ), array()
            )
        )
    )
);
?>

