<?php

	require_once dirname(__FILE__).'/../../../../config.php';
	Config::init();	

/**
 * Skeleton subclass for representing a row from the 'users' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.ip7website
 */
class User extends BaseUser {

    /**
     * Alias of getType()
     **/
    public function getRank() {
        return $this->getType();
    }

    /**
     * Return true if the user's account is activated.
     **/
    public function isActivated() {
        return !$this->getDeactivated();
    }

    /**
     * Return true if the user is a student.
     **/
    public function isStudent() {
        return $this->getIsAStudent();
    }

    /**
     * Return true if the user is a teacher.
     **/
    public function isTeacher() {
        return $this->getIsATeacher();
    }

    /**
     * Return true if the user is an admin.
     * The 'ADMIN_RANK' constant must be defined.
     **/
    public function isAdmin() {
        if (defined('ADMIN_RANK')) {
            return ($this->getType() >= ADMIN_RANK);
        }
        return false;
    }
	
	/**
	 * Return true if the user is a moderator.
	 * The 'MODERATOR_RANK' constant must be defind.
	 **/
	public function isModerator(){
		if (defined('MODERATOR_RANK')) {
			return ($this->getType() >= MODERATOR_RANK);
		}
		return false;
	}

    /**
     * Return true if the user is a member.
     * The 'MEMBER_RANK' constant must be defined.
     **/
    public function isMember() {
        if (defined('MEMBER_RANK')) {
            return ($this->getType() >= MEMBER_RANK);
        }
        return false;
    }

    /**
     * Increment the number of visits
     **/
    public function incrementVisitsNb() {
        $this->setVisitsNb($this->getVisitsNb()+1);
        $this->save();
    }

	/**
	 * Set user's hashed password
	 **/
	public function setPassword($password){
		$password = (string)$password;
		$this->setPasswordHash(Config::$p_hasher->HashPassword($password));
		$this->save();
	}

	/**
     * Return user's last name and first name in a string
	 **/
	public function getName(){
		$userNameToString = "";
		$userNameToString .= $this->getFirstName() . " " . $this->getLastName();
		return $userNameToString;	
	}

    // deprecated
    public function getConfigIndexingProfile() {
        return $this->getConfigIndexProfile();
    }


} // User

