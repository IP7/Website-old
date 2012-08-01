<?php

	/**
	*
	* TODO : Utiliser la variable $_SESSION
	*
	*/


	include 'controllers/scriptError.php';
	require_once 'config.php';
	Config::init();

	function connection($login,$password){
	
		$i = tryToGetUser($login,$password);
	
		if ( $i instanceof User ){
			echo "You're login in : " . $i->getUsername();
		}
		else {
			if ( $i == 1 ) echo "Wrong Username";
			else if ( $i == 2 )  echo "Wrong Password";
			else echo "Deactivated account";	
		}
	}


	function tryToGetUser($login,$password){

		$login = (string)$login;
		$password = (string)$password;

		$query = new UserQuery();
		$user = new User();

		$password_h = Config::$p_hasher->HashPassword($password);

		$user = $query->findOneByUsername($login);

		if ( $user instanceof User ){
			if ( Config::$p_hasher->CheckPassword($password,$user->getPasswordHash()) ){
				if ( !$user->getDeactivated() ){
					return $user;
				}
				else return 3;
			}
			else return 2;
		}
		else return 1;
	}


?>

