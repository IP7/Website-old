<?php

$c = array(

    'educational_paths' => array(
        // short name => array( name, description )
        'info' => array('Informatique générale', '')
    ),

    'courses' => array(

        // S1
        array(

            // code => array(
            //  ects, name, description,
            //  mandatory_for, optional_for
            // )

            'IF1' => array(
                6, 'Initiation à la programmation',  'Initiation à la programmation avec Java.',
                array( 'info' ), array()
            ),
            'IS1' => array(
                3, 'Initiation aux systèmes d\'exploitation', '',
                array( 'info' ), array()
            ),
            'PF1' => array(
                3, 'Principe de fonctionnement des machines binaires', '',
                array( 'info' ), array()
            ),
            'OBi' => array(
                3, 'Outils bureautique et internet', 'Matière commune à tous les étudiants.',
                array( 'info' ), array()
            ),
            'MM1' => array(
                9, 'Mathématiques élémentaires', '',
                array( 'info' ), array()
            ),

            'BC1' => array(
                6, 'Biologie cellulaire et moléculaire expérimentale','',
                array(), array( 'info' )
            ),
            'CH1' => array(
                6, 'Chimie : Atomes et molécules','',
                array(), array( 'info' )
            ),
            'AR1' => array(
                3, 'Géosciences : Actualité de la recherche','',
                array(), array( 'info' )
            ),
            'TB1' => array(
                3, 'La Terre est bleue comme une orange','',
                array(), array( 'info' )
            ),
            'PA1' => array(
                3, 'Géosciences : Panorama 1','',
                array(), array( 'info' )
            ),
            'LM1' => array(
                3, 'Langage mathématique','',
                array(), array( 'info' )
            ),
            'SD1' => array(
                3, 'Statistiques descriptives','',
                array(), array( 'info' )
            ),
            'PH1' => array(
                6, 'Physique','',
                array(), array( 'info' )
            ),
            'OP1' => array(
                3, 'Physique de la lumière','',
                array(), array( 'info' )
            ),
            'DV1' => array(
                6, 'Diversité et évolution des organismes vivants','',
                array(), array( 'info' )
            )

        ),

        // S2
        array(

            'TO2'      => array(
                6, 'Types de données et objets','',
                array( 'info' ), array()
            ),
            'CI2'      => array(
                3, 'Concepts Informatique','',
                array( 'info' ), array()
            ),
            'IO2'      => array(
                6, 'Internet et outils', 'Conception d\'un site Web avec HTML, CSS, PHP et MySQL.',
                array( 'info' ), array()
            ),
            'MI2'      => array(
                9, 'Mathématiques générales','',
                array( 'info' ), array()
            ),
            'Anglais'  => array(
                3, 'Anglais','Autoformation.',
                array( 'info' ), array()
            )

        )

    )

);
?>
