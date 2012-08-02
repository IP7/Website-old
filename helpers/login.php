<?php

	require_once 'config.php';
	Config::init();

	/**
	*connection function
	*
	*@param	String $username	username
	*@param	String $password	password
	*/
	function connection($username,$password){
	
		$username = (string)$username;
		$password = (string)$password;

		/*
		BEFORE:
		$query = new UserQuery();
		$user = $query->findOneByUsername($username);
		*/
		$user = UserQuery::create()
			->findOneByUsername($username);

		if ( $user instanceof User ){
			if ( Config::$p_hasher->CheckPassword($password,$user->getPasswordHash()) ){
				if ( !$user->getDeactivated() ){
					return $user;
				}
				return DEACTIVATED_ACCOUNT;
			}
		}
		return WRONG_USERNAME_OR_PASSWORD;
	}

?>

