<?php



/**
 * This class defines the structure of the 'ads' table.
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
class AdTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.AdTableMap';

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
        $this->setName('ads');
        $this->setPhpName('Ad');
        $this->setClassname('Ad');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('AUTHOR_ID', 'AuthorId', 'INTEGER', 'users', 'ID', true, null, null);
        $this->addColumn('TITLE', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('TEXT', 'Text', 'LONGVARCHAR', false, 400, null);
        $this->addColumn('DATE', 'Date', 'TIMESTAMP', true, null, null);
        $this->addColumn('VALIDATED', 'Validated', 'BOOLEAN', false, 1, '1');
        $this->addColumn('ACCESS_RIGHTS', 'AccessRights', 'TINYINT', false, null, 0);
        // validators
        $this->addValidator('TITLE', 'minLength', 'propel.validator.MinLengthValidator', '1', 'Le titre doit faire au moins 1 caractère.');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Author', 'User', RelationMap::MANY_TO_ONE, array('author_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('AdsTags', 'AdsTags', RelationMap::ONE_TO_MANY, array('id' => 'ad_id', ), 'CASCADE', 'CASCADE', 'AdsTagss');
        $this->addRelation('Tag', 'Tag', RelationMap::MANY_TO_MANY, array(), 'CASCADE', 'CASCADE', 'Tags');
    } // buildRelations()

} // AdTableMap
