<?php



/**
 * This class defines the structure of the 'alerts' table.
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
class AlertTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.AlertTableMap';

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
        $this->setName('alerts');
        $this->setPhpName('Alert');
        $this->setClassname('Alert');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('SUBSCRIBER_ID', 'SubscriberId', 'INTEGER', 'users', 'ID', true, null, null);
        $this->addForeignKey('CURSUS_ID', 'CursusId', 'INTEGER', 'cursus', 'ID', false, null, null);
        $this->addForeignKey('COURSE_ID', 'CourseId', 'INTEGER', 'courses', 'ID', false, null, null);
        $this->addForeignKey('TAG_ID', 'TagId', 'INTEGER', 'tags', 'ID', false, null, null);
        $this->addForeignKey('CONTENT_TYPE_ID', 'ContentTypeId', 'INTEGER', 'content_types', 'ID', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Subscriber', 'User', RelationMap::MANY_TO_ONE, array('subscriber_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Cursus', 'Cursus', RelationMap::MANY_TO_ONE, array('cursus_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Course', 'Course', RelationMap::MANY_TO_ONE, array('course_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Tag', 'Tag', RelationMap::MANY_TO_ONE, array('tag_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('ContentType', 'ContentType', RelationMap::MANY_TO_ONE, array('content_type_id' => 'id', ), 'SET NULL', 'CASCADE');
    } // buildRelations()

} // AlertTableMap
