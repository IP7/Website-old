<?php



/**
 * This class defines the structure of the 'reports' table.
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
class ReportTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.ReportTableMap';

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
        $this->setName('reports');
        $this->setPhpName('Report');
        $this->setClassname('Report');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('CONTENT_ID', 'ContentId', 'INTEGER', 'contents', 'ID', false, null, null);
        $this->addForeignKey('AUTHOR_ID', 'AuthorId', 'INTEGER', 'users', 'ID', false, null, null);
        $this->addColumn('DATE', 'Date', 'TIMESTAMP', true, null, null);
        $this->addColumn('TEXT', 'Text', 'VARCHAR', false, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Content', 'Content', RelationMap::MANY_TO_ONE, array('content_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Author', 'User', RelationMap::MANY_TO_ONE, array('author_id' => 'id', ), 'SET NULL', 'CASCADE');
    } // buildRelations()

} // ReportTableMap
