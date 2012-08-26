<?php



/**
 * This class defines the structure of the 'users_paths' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.ip7website.map
 */
class UsersPathsTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.UsersPathsTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('users_paths');
        $this->setPhpName('UsersPaths');
        $this->setClassname('UsersPaths');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(false);
        $this->setIsCrossRef(true);
        // columns
        $this->addForeignPrimaryKey('USER_ID', 'UserId', 'INTEGER' , 'users', 'ID', true, null, null);
        $this->addForeignPrimaryKey('PATH_ID', 'PathId', 'INTEGER' , 'educational_paths', 'ID', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('EducationalPath', 'EducationalPath', RelationMap::MANY_TO_ONE, array('path_id' => 'id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // UsersPathsTableMap
