<?php

	require_once dirname(__FILE__).'/../config.php'; 
	Config::init();

	/*
	
		#TODO
		-Cacher ou non les champs : email/addresse/téléphone
		-Permettre aux utilisateurs de changer certains champs
		-Afficher toutes les dates en type DD/MM/YYYY

	*/

	function display_profile_page(){

		$username = params(0);
		$user = UserQuery::create()
					->filterByUsername($username)
					->findOne();

		if ( $user instanceof User ){

			if ( $user->isStudent() ) $userStatus = "Étudiant";
			else $userStatus = "Professeur";


			return Config::$tpl->render('profile.html', tpl_array(array(
							'page' => array(
								'title' => 'Profil de ' . $user->getUsername(),
								'username' => $user->getUsername(),
								'status' => $userStatus,
								'userFirstName' => $user->getFirstName(),
								'userLastName' => $user->getLastName(),
								'birthDate' => $user->getBirthDate(),
								'mail' => $user->getEmail(),
								'address' => $user->getAddress(),
								'phone' => $user->getPhone(),
								'website' => $user->getWebsite(),
								'firstEntry' => $user->getFirstEntry(),
								'lastVisit' => $user->getLastVisit(),
								'description' => $user->getDescription(),
							)
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

?>
