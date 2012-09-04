<?php



/**
 * Skeleton subclass for performing query and update operations on the 'users' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.ip7website
 */
class UserQuery extends BaseUserQuery {

    /**
     * Keep only profiles that are visibles for the current user
     **/
    public function filterByPublicProfile() {
        return is_connected() ? $this : $this->filterByConfigPrivateProfile(0);
    }

} // UserQuery
