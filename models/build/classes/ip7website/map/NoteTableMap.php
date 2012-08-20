<?php



/**
 * This class defines the structure of the 'notes' table.
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
class NoteTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.NoteTableMap';

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
        $this->setName('notes');
        $this->setPhpName('Note');
        $this->setClassname('Note');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'users', 'ID', true, null, null);
        $this->addForeignKey('COURSE_ID', 'CourseId', 'INTEGER', 'courses', 'ID', true, null, null);
        $this->addColumn('SCORE', 'Score', 'FLOAT', true, null, null);
        // validators
        $this->addValidator('SCORE', 'minValue', 'propel.validator.MinValueValidator', '0', 'La note ne peut être négative.');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Course', 'Course', RelationMap::MANY_TO_ONE, array('course_id' => 'id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // NoteTableMap
