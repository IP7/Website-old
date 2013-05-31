<?php



/**
 * This class defines the structure of the 'educational_paths_mandatory_courses' table.
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
class EducationalPathsMandatoryCoursesTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.EducationalPathsMandatoryCoursesTableMap';

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
        $this->setName('educational_paths_mandatory_courses');
        $this->setPhpName('EducationalPathsMandatoryCourses');
        $this->setClassname('EducationalPathsMandatoryCourses');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(false);
        $this->setIsCrossRef(true);
        // columns
        $this->addForeignPrimaryKey('course_id', 'CourseId', 'INTEGER' , 'courses', 'id', true, null, null);
        $this->addForeignPrimaryKey('path_id', 'PathId', 'INTEGER' , 'educational_paths', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MandatoryCourse', 'Course', RelationMap::MANY_TO_ONE, array('course_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('MandatoryEducationalPath', 'EducationalPath', RelationMap::MANY_TO_ONE, array('path_id' => 'id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // EducationalPathsMandatoryCoursesTableMap
