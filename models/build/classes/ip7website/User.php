<?php



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
        return $this->getIsStudent();
    }

    /**
     * Return true if the user is a teacher.
     **/
    public function isTeacher() {
        return $this->getIsTeacher();
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

} // User
