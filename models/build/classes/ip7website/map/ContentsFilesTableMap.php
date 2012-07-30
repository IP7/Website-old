<?php



/**
 * This class defines the structure of the 'contents_files' table.
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
class ContentsFilesTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.ContentsFilesTableMap';

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
        $this->setName('contents_files');
        $this->setPhpName('ContentsFiles');
        $this->setClassname('ContentsFiles');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(false);
        $this->setIsCrossRef(true);
        // columns
        $this->addForeignPrimaryKey('CONTENT_ID', 'ContentId', 'INTEGER' , 'contents', 'ID', true, null, null);
        $this->addForeignPrimaryKey('FILE_ID', 'FileId', 'INTEGER' , 'files', 'ID', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Content', 'Content', RelationMap::MANY_TO_ONE, array('content_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('File', 'File', RelationMap::MANY_TO_ONE, array('file_id' => 'id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ContentsFilesTableMap
