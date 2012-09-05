<?php



/**
 * This class defines the structure of the 'content_types' table.
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
class ContentTypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.ContentTypeTableMap';

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
        $this->setName('content_types');
        $this->setPhpName('ContentType');
        $this->setClassname('ContentType');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 32, null);
        $this->addColumn('SHORT_NAME', 'ShortName', 'VARCHAR', true, 16, null);
        $this->addColumn('RIGHTS', 'Rights', 'TINYINT', false, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Alert', 'Alert', RelationMap::ONE_TO_MANY, array('id' => 'content_type_id', ), 'SET NULL', 'CASCADE', 'Alerts');
        $this->addRelation('Content', 'Content', RelationMap::ONE_TO_MANY, array('id' => 'content_type_id', ), 'SET NULL', 'CASCADE', 'Contents');
    } // buildRelations()

} // ContentTypeTableMap
