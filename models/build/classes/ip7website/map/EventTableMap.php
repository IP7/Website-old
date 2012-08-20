<?php



/**
 * This class defines the structure of the 'events' table.
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
class EventTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.EventTableMap';

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
        $this->setName('events');
        $this->setPhpName('Event');
        $this->setClassname('Event');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
        $this->addForeignKey('EVENT_TYPE_ID', 'EventTypeId', 'INTEGER', 'event_types', 'ID', false, null, null);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('DATE', 'Date', 'DATE', false, null, null);
        $this->addColumn('BEGINNING', 'Beginning', 'TIME', false, null, null);
        $this->addColumn('END', 'End', 'TIME', false, null, null);
        $this->addColumn('PLACE', 'Place', 'VARCHAR', false, 255, null);
        $this->addColumn('ACCESS_RIGHTS', 'AccessRights', 'TINYINT', false, null, 0);
        // validators
        $this->addValidator('NAME', 'minLength', 'propel.validator.MinLengthValidator', '3', 'Le nom doit faire au moins 3 caractères.');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('EventType', 'EventType', RelationMap::MANY_TO_ONE, array('event_type_id' => 'id', ), 'SET NULL', 'CASCADE');
    } // buildRelations()

} // EventTableMap
