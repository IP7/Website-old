<?php



/**
 * This class defines the structure of the 'forum_categories' table.
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
class ForumCategoryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.ForumCategoryTableMap';

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
        $this->setName('forum_categories');
        $this->setPhpName('ForumCategory');
        $this->setClassname('ForumCategory');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 32, null);
        $this->addForeignKey('PARENT_ID', 'ParentId', 'INTEGER', 'forum_categories', 'ID', false, null, null);
        $this->addColumn('ACCESS_RIGHTS', 'AccessRights', 'TINYINT', false, null, 0);
        // validators
        $this->addValidator('NAME', 'minLength', 'propel.validator.MinLengthValidator', '1', 'Le nom doit faire au moins 1 caractère.');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ParentCategory', 'ForumCategory', RelationMap::MANY_TO_ONE, array('parent_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('ForumCategoryRelatedById', 'ForumCategory', RelationMap::ONE_TO_MANY, array('id' => 'parent_id', ), 'SET NULL', 'CASCADE', 'ForumCategorysRelatedById');
        $this->addRelation('ForumTopic', 'ForumTopic', RelationMap::ONE_TO_MANY, array('id' => 'category_id', ), 'CASCADE', 'CASCADE', 'ForumTopics');
    } // buildRelations()

} // ForumCategoryTableMap
