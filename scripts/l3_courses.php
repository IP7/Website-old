<?php

$c = array(

    'educational_paths' => array(
        // short name => array( name, description )
        'info' => array('Informatique générale', '')
    ),

    'courses' => array(

        array(
            'PF5' => array(
                6, 'Programmation fonctionnelle', 'Initiation à la programation fonctionnelle avec OCaml.',
                array( 'info' ), array()
            ),
            'PO5' => array(
                6, 'Programmation orientée objets', 'Programmation orientée objets avec Java.',
                array( 'info' ), array()
            ),
            'MD5' => array(
                6, 'Mathématiques discrètes', 'Séries génératrices et automates à piles.',
                array( 'info' ), array()
            ),
            'SY5' => array(
                6, 'Programmation système', 'Programmation système en C.',
                array( 'info' ), array()
            ),
            'AL5' => array(
                6, 'Algorithmique', '',
                array( 'info' ), array()
            )
        ),

        array(
            'LO6' => array(
                5, 'Logique', '',
                array( 'info' ), array()
            ),
            'BD6' => array(
                5, 'Base de données', 'PostgreSQL.',
                array( 'info' ), array()
            ),
            'PR6' => array(
                5, 'Programmation réseau', 'Programmation réseau en Java.',
                array( 'info' ), array()
            ),
            'AS6' => array(
                5, 'Analyse Syntaxique', '',
                array( 'info' ), array()
            ),
            'Anglais' => array(
                3, 'Anglais', '',
                array( 'info' ), array()
            ),


            'CN6' => array(
                3.5, 'Calcul numérique', '',
                array(), array( 'info' )
            ),
            'GL6' => array(
                3.5, 'Génie logiciel', '',
                array(), array( 'info' )
            ),
            'ED6' => array(
                3.5, 'Environnements de développement', '',
                array(), array( 'info' )
            ),
            'MV6' => array(
                3.5, 'Machines virtuelles', '',
                array(), array( 'info' )
            ),
            'TE6' => array(
                3.5, 'Techniques d\'expressions', '',
                array(), array( 'info' )
            ),
            'LI6' => array(
                3.5, 'Linguistique informatique', '',
                array(), array( 'info' )
            ),
            #'?' => array(7, 'Probabilités', '',
            #     array(), array( 'info' )
            #)
        )
    )

);

?>
