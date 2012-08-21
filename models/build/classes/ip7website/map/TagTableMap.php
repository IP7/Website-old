<?php



/**
 * This class defines the structure of the 'tags' table.
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
class TagTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.TagTableMap';

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
        $this->setName('tags');
        $this->setPhpName('Tag');
        $this->setClassname('Tag');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 16, null);
        // validators
        $this->addValidator('NAME', 'minLength', 'propel.validator.MinLengthValidator', '1', 'Le nom doit faire au moins 1 caractère.');
        $this->addValidator('NAME', 'unique', 'propel.validator.UniqueValidator', '', 'Le nom existe déjà.');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Alert', 'Alert', RelationMap::ONE_TO_MANY, array('id' => 'tag_id', ), 'CASCADE', 'CASCADE', 'Alerts');
        $this->addRelation('ContentsTags', 'ContentsTags', RelationMap::ONE_TO_MANY, array('id' => 'tag_id', ), 'CASCADE', 'CASCADE', 'ContentsTagss');
        $this->addRelation('AdsTags', 'AdsTags', RelationMap::ONE_TO_MANY, array('id' => 'tag_id', ), 'CASCADE', 'CASCADE', 'AdsTagss');
        $this->addRelation('Content', 'Content', RelationMap::MANY_TO_MANY, array(), 'CASCADE', 'CASCADE', 'Contents');
        $this->addRelation('Ad', 'Ad', RelationMap::MANY_TO_MANY, array(), 'CASCADE', 'CASCADE', 'Ads');
    } // buildRelations()

} // TagTableMap
