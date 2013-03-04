<?php



/**
 * This class defines the structure of the 'contents' table.
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
class ContentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.ContentTableMap';

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
        $this->setName('contents');
        $this->setPhpName('Content');
        $this->setClassname('Content');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('AUTHOR_ID', 'AuthorId', 'INTEGER', 'users', 'ID', false, null, null);
        $this->addForeignKey('CONTENT_TYPE_ID', 'ContentTypeId', 'INTEGER', 'content_types', 'ID', false, null, null);
        $this->addColumn('ACCESS_RIGHTS', 'AccessRights', 'TINYINT', false, null, 0);
        $this->addColumn('VALIDATED', 'Validated', 'BOOLEAN', false, 1, '0');
        $this->addColumn('TITLE', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('TEXT', 'Text', 'LONGVARCHAR', false, null, null);
        $this->addForeignKey('CURSUS_ID', 'CursusId', 'INTEGER', 'cursus', 'ID', false, null, null);
        $this->addForeignKey('COURSE_ID', 'CourseId', 'INTEGER', 'courses', 'ID', false, null, null);
        $this->addColumn('YEAR', 'Year', 'INTEGER', false, null, null);
        $this->addColumn('DELETED', 'Deleted', 'BOOLEAN', false, 1, '0');
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Author', 'User', RelationMap::MANY_TO_ONE, array('author_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('Cursus', 'Cursus', RelationMap::MANY_TO_ONE, array('cursus_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Course', 'Course', RelationMap::MANY_TO_ONE, array('course_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('ContentType', 'ContentType', RelationMap::MANY_TO_ONE, array('content_type_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('ContentsFiles', 'ContentsFiles', RelationMap::ONE_TO_MANY, array('id' => 'content_id', ), 'CASCADE', 'CASCADE', 'ContentsFiless');
        $this->addRelation('Comment', 'Comment', RelationMap::ONE_TO_MANY, array('id' => 'content_id', ), 'CASCADE', 'CASCADE', 'Comments');
        $this->addRelation('Report', 'Report', RelationMap::ONE_TO_MANY, array('id' => 'content_id', ), 'CASCADE', 'CASCADE', 'Reports');
        $this->addRelation('File', 'File', RelationMap::MANY_TO_MANY, array(), 'CASCADE', 'CASCADE', 'Files');
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_updated_at' => 'false', ),
        );
    } // getBehaviors()

} // ContentTableMap
