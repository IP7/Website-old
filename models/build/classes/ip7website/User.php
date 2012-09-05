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

  /* == Types ================================================ */

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
   * Return true if the user is an alumni
   **/
  public function isAlumni() {
    return $this->getIsAnAlumni();
  }

  /* == Genders ============================================== */

  public function isMale() {
      return $this->getGender() == 'M';
  }

  public function isFemale() {
      return $this->getGender() == 'F';
  }

  /* == Ranks ================================================ */

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

  /* == Settings ============================================= */

  /**
   * Return true if the user's account is activated.
   **/
  public function isActivated() {
    return !$this->getDeactivated();
  }

  /* -- Config ----------------------------------------------- */

  private static $config_vars = array(
    'show_email'      => 'ConfigShowEmail',
    'show_phone'      => 'ConfigShowPhone',
    'show_real_name'  => 'ConfigShowRealName',
    'show_birthdate'  => 'ConfigShowBirthdate',
    'show_age'        => 'ConfigShowAge',
    'index_profile'   => 'ConfigIndexProfile',
    'private_profile' => 'ConfigPrivateProfile'
  );

  public static function getConfigVars() {
    return array_keys(self::$config_vars);
  }

  public function getConfig() {
    $opts = self::$config_vars;
    $config = array();

    foreach ($opts as $o => $m) {
      $config[$o] = call_user_func(array($this, 'get'.$m));
    }

    return $config;
  }

  // set the user's config. The argument must be an array
  // of options
  public function setConfig($c) {
    foreach (self::$config_vars as $o =>$m) {
      if (array_key_exists($o, $c)) {
        call_user_func(array($this, 'set'.$m), $c[$o]);
      }
    }
  }

  /* == Helpers ============================================== */

  /**
   * Set user's hashed password
   **/
  public function setPassword($password) {
    $password = (string)$password;
    $this->setPasswordHash(Config::$p_hasher->HashPassword($password));
    $this->save();
  }

  /**
   * Return user's last name and first name in a string
   **/
  public function getName($sep=' ') {
    return $this->getFirstName() . $sep . $this->getLastName();
  }

  /**
   * Return user's age
   **/
  public function getAge() {
    $today = new DateTime(); 
    $birthdate = get_datetime($this->getBirthdate());

    return ($birthdate ? intval($birthdate->diff($today)->format('%Y')) : NULL);
  }

  /**
   * Return user's rank
   **/
  public function getRank() {
      return $this->getType();
  }

  /* == Misc ================================================= */

  /**
   * Increment the number of visits
   **/
  public function incrementVisitsNb() {
    $this->setVisitsNb($this->getVisitsNb()+1);
    $this->save();
  }
}

