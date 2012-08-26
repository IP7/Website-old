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
            'IA' => array(
                6, 'Intelligence Artificielle', 'Introduction à l’IA et à la théorie des jeux',
                array(), array( 'MPRI' )
            ),
            'BDAv' => array(
                6, 'Bases de données avancées', '',
                array( 'SRI' ), array( 'LP' )
            ),
            'CircArch' => array(
                6, 'Circuits et architecture', '',
                array(), array( 'LP', 'SRI' )
            ),
            'LObjAv' => array(
                6, 'Langages à Objets avancés', '',
                array( 'LP' ), array( 'SRI', 'LC' )
            ),
            'ProgSyst' => array(
                6, 'Programmation système', '',
                array( 'SRI' ), array( 'LP', 'LC' )
            ),
            'Compil' => array(
                6, 'Compilation', '', 
                array( 'LP', 'MPRI' ), array( 'SRI', 'LC' )
            ),
            'Prolog1' => array(
                6, 'Prolog et programmation par contraintes', '',
                array( 'LP' ), array( 'LC', 'MPRI' )
            ),
            'Algo' => array(
                6, 'Algorithmique', '',
                array( 'SRI', 'LC', 'MPRI' ), array( 'LP' )
            ),
            'CalcComp' => array(
                6, 'Calculabilité et complexité', '',
                array( 'MPRI' ), array( 'LP', 'SRI', 'LC' )
            ),
            'ProtRes' => array(
                6, 'Protocoles réseaux', '',
                array(), array( 'SRI' )
            )

        ),
        array(
            'GenLogAv' => array(
                6, 'Génie logiciel avancé', '',
                array( 'LP' ), array( 'SRI', 'LC' )
            ),
            'IntGraph' => array(
                6, 'Infographie', '',
                array(), array( 'SRI', 'MPRI' )
            ),
            'PFAv' => array(
                6, 'Programmation fonctionnelle avancée', '',
                array( 'LP' ), array( 'SRI', 'LC', 'MPRI' )
            ),
            'ThPrConc' => array(
                6, 'Théorie et pratique de la concurrence', '',
                array( 'LC' ), array( 'LP', 'SRI', 'MPRI' )
            ),
            'PreuvesM' => array(
                6, 'Preuves assistées par ordinateur', '',
                array( 'LC' ), array( 'LP', 'MPRI' )
            ),
            'SemLP' => array(
                6, 'Sémantique des langages de programmation', '',
                array(), array( 'LP', 'LC', 'MPRI')
            ),
            'AlgAv' => array(
                6, 'Algorithmique avancée', '',
                array(), array( 'LC', 'MPRI' )
            ),
            'AnPerf' => array(
                6, 'Analyse de performance et simulation', '',
                array(), array()
            ),
            'Stage' => array(
                6, 'Stage en entreprise', '',
                array(), array( 'LP', 'SRI', 'LC' )
            ),
            'Proj' => array(
                6, 'Projets de programmation', '',
                array(), array( 'LP', 'SRI', 'LC' )
            ),
            'TRE' => array(
                6, 'Travaux de recherche encadrés', '',
                array( 'MPRI' ), array( 'LC' )
            ),
            'DroitInf' => array(
                3, 'Droit de l\'informatique', '',
                array(), array( 'LP', 'SRI' )
            ),
            'LogLib' => array(
                3, 'Logiciels libres', '',
                array(), array( 'LP', 'SRI' )
            ),
            'NTWeb' => array(
                3, 'Nouvelles tendances du Web', '',
                array(), array( 'LP', 'SRI' )
            ),
            // '?' => array(
            //     6, 'Technologies émergentes', '',
            //     array(), array( 'LP', 'SRI', 'LC' )
            // ),
            'TecExp' => array(
                3, 'Techniques d\'expression', '',
                array(), array( 'LP', 'SRI', 'LC' )
            )
        )
    )
);
?>

