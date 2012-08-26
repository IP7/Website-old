<?php



/**
 * This class defines the structure of the 'courses' table.
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
class CourseTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.CourseTableMap';

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
        $this->setName('courses');
        $this->setPhpName('Course');
        $this->setClassname('Course');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('CURSUS_ID', 'CursusId', 'INTEGER', 'cursus', 'ID', false, null, null);
        $this->addColumn('SEMESTER', 'Semester', 'TINYINT', false, null, 0);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 64, null);
        $this->addColumn('CODE', 'Code', 'VARCHAR', true, 16, null);
        $this->addColumn('ECTS', 'Ects', 'FLOAT', false, null, 3);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, 1024, null);
        // validators
        $this->addValidator('CODE', 'match', 'propel.validator.MatchValidator', '/^[a-z0-9]+$/i', 'Le code n\'est pas valide (caractères alphanumériques uniquement).');
        $this->addValidator('NAME', 'minLength', 'propel.validator.MinLengthValidator', '3', 'Le nom doit faire au moins 3 caractères.');
        $this->addValidator('SEMESTER', 'minValue', 'propel.validator.MinValueValidator', '0', 'Le semestre doit être 1 ou 2.');
        $this->addValidator('SEMESTER', 'maxValue', 'propel.validator.MaxValueValidator', '3', 'Le semestre doit être 1 ou 2.');
        $this->addValidator('ECTS', 'minValue', 'propel.validator.MinValueValidator', '0', 'Le nombre d\'ECTS ne peut pas être négatif.');
        $this->addValidator('ECTS', 'maxValue', 'propel.validator.MaxValueValidator', '30', 'Le nombre d\'ECTS ne peut pas être supérieur à 30.');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cursus', 'Cursus', RelationMap::MANY_TO_ONE, array('cursus_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('EducationalPathsOptionalCourses', 'EducationalPathsOptionalCourses', RelationMap::ONE_TO_MANY, array('id' => 'course_id', ), 'CASCADE', 'CASCADE', 'EducationalPathsOptionalCoursess');
        $this->addRelation('EducationalPathsMandatoryCourses', 'EducationalPathsMandatoryCourses', RelationMap::ONE_TO_MANY, array('id' => 'course_id', ), 'CASCADE', 'CASCADE', 'EducationalPathsMandatoryCoursess');
        $this->addRelation('Alert', 'Alert', RelationMap::ONE_TO_MANY, array('id' => 'course_id', ), 'CASCADE', 'CASCADE', 'Alerts');
        $this->addRelation('Content', 'Content', RelationMap::ONE_TO_MANY, array('id' => 'course_id', ), 'CASCADE', 'CASCADE', 'Contents');
        $this->addRelation('Note', 'Note', RelationMap::ONE_TO_MANY, array('id' => 'course_id', ), 'CASCADE', 'CASCADE', 'Notes');
        $this->addRelation('News', 'News', RelationMap::ONE_TO_MANY, array('id' => 'course_id', ), 'CASCADE', 'CASCADE', 'Newss');
        $this->addRelation('Exam', 'Exam', RelationMap::ONE_TO_MANY, array('id' => 'course_id', ), 'CASCADE', 'CASCADE', 'Exams');
        $this->addRelation('ScheduledCourse', 'ScheduledCourse', RelationMap::ONE_TO_MANY, array('id' => 'course_id', ), 'CASCADE', 'CASCADE', 'ScheduledCourses');
        $this->addRelation('OptionalEducationalPath', 'EducationalPath', RelationMap::MANY_TO_MANY, array(), 'CASCADE', 'CASCADE', 'OptionalEducationalPaths');
        $this->addRelation('MandatoryEducationalPath', 'EducationalPath', RelationMap::MANY_TO_MANY, array(), 'CASCADE', 'CASCADE', 'MandatoryEducationalPaths');
    } // buildRelations()

} // CourseTableMap
