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

	function display_profile_page($me=false) {

        if (!$me) {
            $username = params(0);
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

        $name = ($user->getConfigShowRealName()) ? $user->getName() : $user->getUsername();
        
         $userStatus = '';
 
         #TODO adapter au genre, cf issue #48 -> étudiantE, enseignantE
         if ($user->isStudent()) {
             $userStatus .= 'Étudiant';
         }
 
         if ($user->isTeacher()) {
             $userStatus .= ($userStatus=='') ? 'Enseignant' : ' enseignant';
         }

        return Config::$tpl->render('public_profile.html', tpl_array(array(
            'page' => array(
                'title' => 'Profil de '.$name,
                'noindex' => !$user->getConfigIndexingProfile(),

                'user' => array(
                    'name'        => $name,
                    'pseudo'      => $user->getUsername(),
                    'status'      => $userStatus,
                    'firstname'   => ($user->getConfigShowRealName()) ? $user->getFirstName() : false,
                    'lastname'    => ($user->getConfigShowRealName()) ? $user->getLastName() : false,
                    'birthdate'   => false, #TODO, cf issue #49
                    'age'         => false, #TODO, cf issue #50
                    'email'       => ($user->getConfigShowEmail()) ? $user->getEmail() : false,
                    'phone'       => false, #TODO, cf issue #51
                    'address'     => false, #TODO, cf issue #41
                    'website'     => $user->getWebsite(),
                    'entry_date'  => $user->getFirstEntry(),
                    'last_visit'  => date_fr($user->getLastVisit()),
                    'description' => $user->getDescription()
                ),

                'edit_button' => (!$me ? false : array( 'href' => Config::$root_uri.'profile/edit', 'title' => 'Éditer' ))
            )
        )));
	
	}

	function display_my_profile_page(){
        return display_profile_page(true);
	}

	function display_edit_profile_page(){

        #FIXME
		$userArray = userInformationToArray(user(),true);

		return Config::$tpl->render('profile_edit.html', tpl_array(Array(
					'page' => array(
						'title' => 'Edition du profil de ' . user()->getUsername(),
					),
					'information' => $userArray
			)));

	}

?>
