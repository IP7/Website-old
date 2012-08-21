<?php



/**
 * This class defines the structure of the 'forum_messages' table.
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
class ForumMessageTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.ForumMessageTableMap';

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
        $this->setName('forum_messages');
        $this->setPhpName('ForumMessage');
        $this->setClassname('ForumMessage');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('AUTHOR_ID', 'AuthorId', 'INTEGER', 'users', 'ID', true, null, null);
        $this->addForeignKey('TOPIC_ID', 'TopicId', 'INTEGER', 'forum_topics', 'ID', true, null, null);
        $this->addColumn('LAST_MODIFICATION', 'LastModification', 'TIMESTAMP', true, null, null);
        $this->addColumn('TEXT', 'Text', 'LONGVARCHAR', true, null, null);
        // validators
        $this->addValidator('TEXT', 'minLength', 'propel.validator.MinLengthValidator', '1', 'Le texte doit faire au moins 1 caractère.');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Author', 'User', RelationMap::MANY_TO_ONE, array('author_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Topic', 'ForumTopic', RelationMap::MANY_TO_ONE, array('topic_id' => 'id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ForumMessageTableMap
