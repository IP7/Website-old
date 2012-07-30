<?php



/**
 * This class defines the structure of the 'forum_topics' table.
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
class ForumTopicTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.ForumTopicTableMap';

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
        $this->setName('forum_topics');
        $this->setPhpName('ForumTopic');
        $this->setClassname('ForumTopic');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('CATEGORY_ID', 'CategoryId', 'INTEGER', 'forum_categories', 'ID', true, null, null);
        $this->addColumn('TITLE', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('IS_LOCKED', 'IsLocked', 'BOOLEAN', false, 1, '0');
        $this->addColumn('IS_ANNOUNCEMENT', 'IsAnnouncement', 'BOOLEAN', false, 1, '0');
        // validators
        $this->addValidator('TITLE', 'minLength', 'propel.validator.MinLengthValidator', '1', 'Title must be at least 1 characters.');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Category', 'ForumCategory', RelationMap::MANY_TO_ONE, array('category_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('ForumMessage', 'ForumMessage', RelationMap::ONE_TO_MANY, array('id' => 'topic_id', ), 'CASCADE', 'CASCADE', 'ForumMessages');
    } // buildRelations()

} // ForumTopicTableMap
