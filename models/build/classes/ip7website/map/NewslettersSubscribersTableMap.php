<?php



/**
 * This class defines the structure of the 'newsletters_subscribers' table.
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
class NewslettersSubscribersTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.NewslettersSubscribersTableMap';

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
        $this->setName('newsletters_subscribers');
        $this->setPhpName('NewslettersSubscribers');
        $this->setClassname('NewslettersSubscribers');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(false);
        $this->setIsCrossRef(true);
        // columns
        $this->addForeignPrimaryKey('SUBSCRIBER_ID', 'SubscriberId', 'INTEGER' , 'users', 'ID', true, null, null);
        $this->addForeignPrimaryKey('NEWSLETTER_ID', 'NewsletterId', 'INTEGER' , 'newsletters', 'ID', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Subscriber', 'User', RelationMap::MANY_TO_ONE, array('subscriber_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Newsletter', 'Newsletter', RelationMap::MANY_TO_ONE, array('newsletter_id' => 'id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // NewslettersSubscribersTableMap
