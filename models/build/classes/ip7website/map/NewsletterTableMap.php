<?php



/**
 * This class defines the structure of the 'newsletters' table.
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
class NewsletterTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.NewsletterTableMap';

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
        $this->setName('newsletters');
        $this->setPhpName('Newsletter');
        $this->setClassname('Newsletter');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cursus', 'Cursus', RelationMap::ONE_TO_MANY, array('id' => 'newsletter_id', ), 'SET NULL', 'CASCADE', 'Cursuss');
        $this->addRelation('NewsletterPost', 'NewsletterPost', RelationMap::ONE_TO_MANY, array('id' => 'newsletter_id', ), 'SET NULL', 'CASCADE', 'NewsletterPosts');
        $this->addRelation('NewslettersSubscribers', 'NewslettersSubscribers', RelationMap::ONE_TO_MANY, array('id' => 'newsletter_id', ), 'CASCADE', 'CASCADE', 'NewslettersSubscriberss');
        $this->addRelation('Subscriber', 'User', RelationMap::MANY_TO_MANY, array(), 'CASCADE', 'CASCADE', 'Subscribers');
    } // buildRelations()

} // NewsletterTableMap
