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

	function display_profile_page(){

		$username = params(0);
		$user = UserQuery::create()
					->filterByUsername($username)
					->findOne();

		if ( $user instanceof User ){

			$userArray = userInformationToArray($user,false);

			return Config::$tpl->render('public_profile.html', tpl_array(array(
							'page' => array(
								'title' => 'Profil de ' . $user->getUsername(),
							),
							'information' => $userArray,
					)));

		}
	
        halt(NOT_FOUND);
	}

	function display_my_profile_page(){

		$userArray = userInformationToArray(user(),true);
		
		return Config::$tpl->render('public_profile.html', tpl_array(Array(
						'page' => Array(
							'title' => 'Profil de ' . user()->getUsername(),
						),
						'information' => $userArray,
						'editButton' => Array(
							'label' => 'Edit',
							'href' => Config::$root_uri . 'profile/edit'
						)
				)));

	}

	function display_edit_profile_page(){

		$userArray = userInformationToArray(user(),true);

		return Config::$tpl->render('profile_edit.html', tpl_array(Array(
					'page' => array(
						'title' => 'Edition du profil de ' . user()->getUsername(),
					),
					'information' => $userArray
			)));

	}

	function userInformationToArray(User $user, $profilPerso){

        $userStatus = '';

        if ($user->isStudent()) {
            $userStatus .= 'Étudiant';
        }

        if ($user->isTeacher()) {
            $userStatus .= ($userStatus=='') ? 'Enseignant' : ' enseignant';
        }

		$userArray = array(
            'username' => $user->getUsername(),
            'status' => $userStatus,
            'userFirstName' => $user->getFirstName(),
            'userLastName' => $user->getLastName(),
            'birthDate' => $user->getBirthDate(),
            'mail' => $user->getEmail(),
            'phone' => $user->getPhone(),
            'website' => $user->getWebsite(),
            'firstEntry' => $user->getFirstEntry(),
            'lastVisit' => $user->getLastVisit(),
            'description' => $user->getDescription(),
        );

		if ( !$profilPerso ){
			if ( !$user->getConfigShowEmail() ) unset($userArray['mail']);
			if ( !$user->getConfigShowPhone() ) unset($userArray['phone']);
			if ( !$user->getConfigShowRealName() ){
				unset($userArray['userFirstName']);
				unset($userArray['userLastName']);
			}
		}

        return $userArray;

	}

?>
