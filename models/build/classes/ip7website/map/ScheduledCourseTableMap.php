<?php



/**
 * This class defines the structure of the 'scheduled_courses' table.
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
class ScheduledCourseTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.ScheduledCourseTableMap';

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
        $this->setName('scheduled_courses');
        $this->setPhpName('ScheduledCourse');
        $this->setClassname('ScheduledCourse');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('COURSE_ID', 'CourseId', 'INTEGER', 'courses', 'ID', true, null, null);
        $this->addForeignKey('TEACHER_ID', 'TeacherId', 'INTEGER', 'users', 'ID', false, null, null);
        $this->addColumn('TEACHER_NAME', 'TeacherName', 'VARCHAR', false, 32, null);
        $this->addColumn('WEEKDAY', 'Weekday', 'ENUM', false, null, null);
        $this->getColumn('WEEKDAY', false)->setValueSet(array (
  0 => 'monday|tuesday|wednesday|thursday|friday|saturday',
));
        $this->addColumn('BEGINNING', 'Beginning', 'TIME', false, null, null);
        $this->addColumn('END', 'End', 'TIME', false, null, null);
        $this->addColumn('PLACE', 'Place', 'VARCHAR', false, 32, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Course', 'Course', RelationMap::MANY_TO_ONE, array('course_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Teacher', 'User', RelationMap::MANY_TO_ONE, array('teacher_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('SchedulesCourses', 'SchedulesCourses', RelationMap::ONE_TO_MANY, array('id' => 'scheduled_course_id', ), 'CASCADE', 'CASCADE', 'SchedulesCoursess');
        $this->addRelation('Schedule', 'Schedule', RelationMap::MANY_TO_MANY, array(), 'CASCADE', 'CASCADE', 'Schedules');
    } // buildRelations()

} // ScheduledCourseTableMap
