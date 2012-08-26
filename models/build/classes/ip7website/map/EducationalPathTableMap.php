<?php



/**
 * This class defines the structure of the 'educational_paths' table.
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
class EducationalPathTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.EducationalPathTableMap';

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
        $this->setName('educational_paths');
        $this->setPhpName('EducationalPath');
        $this->setClassname('EducationalPath');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('SHORT_NAME', 'ShortName', 'VARCHAR', true, 8, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 50, null);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, 1024, null);
        $this->addForeignKey('CURSUS_ID', 'CursusId', 'INTEGER', 'cursus', 'ID', true, null, null);
        $this->addForeignKey('RESPONSABLE_ID', 'ResponsableId', 'INTEGER', 'users', 'ID', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cursus', 'Cursus', RelationMap::MANY_TO_ONE, array('cursus_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Responsable', 'User', RelationMap::MANY_TO_ONE, array('responsable_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('UsersPaths', 'UsersPaths', RelationMap::ONE_TO_MANY, array('id' => 'path_id', ), 'CASCADE', 'CASCADE', 'UsersPathss');
        $this->addRelation('EducationalPathsOptionalCourses', 'EducationalPathsOptionalCourses', RelationMap::ONE_TO_MANY, array('id' => 'path_id', ), 'CASCADE', 'CASCADE', 'EducationalPathsOptionalCoursess');
        $this->addRelation('EducationalPathsMandatoryCourses', 'EducationalPathsMandatoryCourses', RelationMap::ONE_TO_MANY, array('id' => 'path_id', ), 'CASCADE', 'CASCADE', 'EducationalPathsMandatoryCoursess');
        $this->addRelation('Schedule', 'Schedule', RelationMap::ONE_TO_MANY, array('id' => 'path_id', ), 'CASCADE', 'CASCADE', 'Schedules');
        $this->addRelation('User', 'User', RelationMap::MANY_TO_MANY, array(), 'CASCADE', 'CASCADE', 'Users');
        $this->addRelation('OptionalCourse', 'Course', RelationMap::MANY_TO_MANY, array(), 'CASCADE', 'CASCADE', 'OptionalCourses');
        $this->addRelation('MandatoryCourse', 'Course', RelationMap::MANY_TO_MANY, array(), 'CASCADE', 'CASCADE', 'MandatoryCourses');
    } // buildRelations()

} // EducationalPathTableMap
