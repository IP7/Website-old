<?php



/**
 * This class defines the structure of the 'tokens' table.
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
class TokenTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.TokenTableMap';

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
        $this->setName('tokens');
        $this->setPhpName('Token');
        $this->setClassname('Token');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'users', 'ID', true, null, null);
        $this->addColumn('EXPIRATION_DATE', 'ExpirationDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('RIGHTS', 'Rights', 'TINYINT', false, null, 0);
        $this->addColumn('VALUE', 'Value', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // TokenTableMap
