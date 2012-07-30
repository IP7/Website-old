<?php



/**
 * This class defines the structure of the 'newsletters_posts' table.
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
class NewsletterPostTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.NewsletterPostTableMap';

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
        $this->setName('newsletters_posts');
        $this->setPhpName('NewsletterPost');
        $this->setClassname('NewsletterPost');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('NEWSLETTER_ID', 'NewsletterId', 'INTEGER', 'newsletters', 'ID', false, null, null);
        $this->addColumn('DATE', 'Date', 'TIMESTAMP', true, null, null);
        $this->addColumn('TEXT', 'Text', 'LONGVARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Newsletter', 'Newsletter', RelationMap::MANY_TO_ONE, array('newsletter_id' => 'id', ), 'SET NULL', 'CASCADE');
    } // buildRelations()

} // NewsletterPostTableMap
