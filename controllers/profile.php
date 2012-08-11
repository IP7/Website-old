<?php

	require_once dirname(__FILE__).'/../config.php'; 
	Config::init();

	/*
	
		#TODO
		-Permettre aux utilisateurs de changer certains champs #DONE
		-Faire la fonction pour changer les données
		-Afficher toutes les dates en type DD/MM/YYYY
		-Ajouter les commentaires

	*/

    function user2tplarray($user, $only_public=true) {
        $name = ($user->getConfigShowRealName()) ? $user->getName() : $user->getUsername();
        
         $userStatus = '';
 
         #TODO adapter au genre, cf issue #48 -> étudiantE, enseignantE
         if ($user->isStudent()) {
             $userStatus .= 'Étudiant';
         }
 
         if ($user->isTeacher()) {
             $userStatus .= ($userStatus=='') ? 'Enseignant' : ' enseignant';
         }

         return array(
            'page' => array(
                'title' => 'Profil de '.$name,
                'noindex' => !$user->getConfigIndexingProfile(),

                'user' => array(
                    'name'        => $name,
                    'pseudo'      => $user->getUsername(),
                    'status'      => $userStatus,
                    'firstname'   => (!$only_public || $user->getConfigShowRealName()) ? $user->getFirstName() : false,
                    'lastname'    => (!$only_public || $user->getConfigShowRealName()) ? $user->getLastName() : false,
                    'birthdate'   => false, #TODO, cf issue #49
                    'age'         => false, #TODO, cf issue #50
                    'email'       => (!$only_public || $user->getConfigShowEmail()) ? $user->getEmail() : false,
                    'phone'       => false, #TODO, cf issue #51
                    'address'     => false, #TODO, cf issue #41
                    'website'     => $user->getWebsite(),
                    'entry_date'  => $user->getFirstEntry(),
                    'last_visit'  => date_fr($user->getLastVisit()),
                    'description' => $user->getDescription()
                ),

            )
         );

    }

	function display_profile_page($username, $me=false) {
        if (!$me) {
            if (empty($username)) {
                halt(NOT_FOUND);
            }

            $user = UserQuery::create()->findOneByUsername($username);
        } else {
            if (!is_connected()) {
                halt(NOT_FOUND);
            }
            $user = user();
        }

		if ( $user == NULL ) {
            halt(NOT_FOUND);
        }

        $page = array();

        if ($me) {
            $page['href'] = Config::$root_uri.'profile';
            $page['title'] = 'Mon profil';
        }
        else {
            $page['href'] = Config::$root_uri.'p/'.$user->getUsername();
            $page['title'] = 'Profil de '.($user->getConfigShowRealName() ? $user->getName() : $user->getUsername());
        }

        return Config::$tpl->render('public_profile.html', tpl_array(user2tplarray($user), array(
            'page' => array(
                'breadcrumb' => array( $page ),
                'edit_button' => (!$me ? false : array( 'href' => Config::$root_uri.'profile/edit', 'title' => 'Éditer' ))
            )
        ),
        ($me? array('page' => array('title' => 'Mon Profil')) : array())));
	
	}

	function display_my_profile_page(){
        return display_profile_page(null, true);
	}

	function display_edit_profile_page(){
        if (!is_connected()) {
            halt(NOT_FOUND);
        }

		return Config::$tpl->render('profile_edit.html', tpl_array(user2tplarray(user(), false), Array(
            'page' => array(
                'title' => 'Edition du profil',
                'edit_form' => array( 'action' => Config::$root_uri.'profile/edit' )
            )
        )));
	}

    # TODO
    function post_edit_profile_page() {
        echo('TEST: $_POST=');
        var_dump($_POST);
        return "";
    }

?>
