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

		$query = new UserQuery();
		$user = new User();

		$user = $query->findOneByUsername($username);

		if ( $user instanceof User ){
			if ( Config::$p_hasher->CheckPassword($password,$user->getPasswordHash()) ){
				if ( !$user->getDeactivated() ){
					return $user;
				}
                return DEACTIVED_ACCOUNT;
			}
		}
        return WRONG_USERNAME_OR_PASSWORD;
	}
	
?>

