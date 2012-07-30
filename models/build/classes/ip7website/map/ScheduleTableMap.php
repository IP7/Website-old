<?php



/**
 * This class defines the structure of the 'schedules' table.
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
class ScheduleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.ScheduleTableMap';

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
        $this->setName('schedules');
        $this->setPhpName('Schedule');
        $this->setClassname('Schedule');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('CURSUS_ID', 'CursusId', 'INTEGER', 'cursus', 'ID', false, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 32, null);
        $this->addColumn('BEGINNING', 'Beginning', 'DATE', false, null, null);
        $this->addColumn('END', 'End', 'DATE', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cursus', 'Cursus', RelationMap::MANY_TO_ONE, array('cursus_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('SchedulesCourses', 'SchedulesCourses', RelationMap::ONE_TO_MANY, array('id' => 'schedule_id', ), 'CASCADE', 'CASCADE', 'SchedulesCoursess');
        $this->addRelation('ScheduledCourse', 'ScheduledCourse', RelationMap::MANY_TO_MANY, array(), 'CASCADE', 'CASCADE', 'ScheduledCourses');
    } // buildRelations()

} // ScheduleTableMap
