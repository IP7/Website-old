<?php



/**
 * This class defines the structure of the 'content_comments' table.
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
class CommentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.CommentTableMap';

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
        $this->setName('content_comments');
        $this->setPhpName('Comment');
        $this->setClassname('Comment');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('REPLY_TO_ID', 'ReplyToId', 'INTEGER', 'content_comments', 'ID', false, null, null);
        $this->addForeignKey('CONTENT_ID', 'ContentId', 'INTEGER', 'contents', 'ID', false, null, null);
        $this->addForeignKey('AUTHOR_ID', 'AuthorId', 'INTEGER', 'users', 'ID', false, null, null);
        $this->addColumn('DATE', 'Date', 'TIMESTAMP', true, null, null);
        $this->addColumn('TEXT', 'Text', 'LONGVARCHAR', true, 2048, null);
        // validators
        $this->addValidator('TEXT', 'minLength', 'propel.validator.MinLengthValidator', '2', 'Le texte doit faire au moins 2 caractères.');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ReplyToComment', 'Comment', RelationMap::MANY_TO_ONE, array('reply_to_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('Content', 'Content', RelationMap::MANY_TO_ONE, array('content_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Author', 'User', RelationMap::MANY_TO_ONE, array('author_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('CommentRelatedById', 'Comment', RelationMap::ONE_TO_MANY, array('id' => 'reply_to_id', ), 'SET NULL', 'CASCADE', 'CommentsRelatedById');
    } // buildRelations()

} // CommentTableMap
