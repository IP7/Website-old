<?php

	require_once dirname(__FILE__).'/../config.php'; 
	Config::init();

	/*
	
		#TODO
		-Cacher ou non les champs : email/addresse/téléphone #DONE
		-Permettre aux utilisateurs de changer certains champs
		-Afficher toutes les dates en type DD/MM/YYYY
		-Ajouter les commentaires

	*/

	function display_profile_page(){

		$username = params(0);
		$user = UserQuery::create()
					->filterByUsername($username)
					->findOne();

		if ( $user instanceof User ){

			$userArray = userInformationToArray($user);

			return Config::$tpl->render('profile.html', tpl_array(array(
							'page' => array(
								'title' => 'Profil de ' . $user->getUsername(),
							),
							'information' => $userArray,
					)));

		}
		else {

			return Config::$tpl->render('error.html',tpl_array(array(
							'page' => array(
								'errno' => '404',
								'errstr' => 'Profile not found',
							)
					)));

		}
		

	}

	function userInformationToArray(User $user){

		if ( $user->isStudent() ) $userStatus = "Étudiant";
		else $userStatus = "Professeur";

		$userArray = Array(
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

		if ( !$user->getConfigShowEmail() ) unset($userArray['mail']);
		if ( !$user->getConfigShowPhone() ) unset($userArray['phone']);
		if ( !$user->getConfigShowRealName() ){
			unset($userArray['userFirstName']);
			unset($userArray['userLastName']);
		}

	return $userArray;

	}

?>
