<?php



/**
 * This class defines the structure of the 'cursus' table.
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
class CursusTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.CursusTableMap';

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
        $this->setName('cursus');
        $this->setPhpName('Cursus');
        $this->setClassname('Cursus');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('SHORT_NAME', 'ShortName', 'CHAR', true, 2, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 16, null);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, 1024, null);
        $this->addForeignKey('RESPONSABLE_ID', 'ResponsableId', 'INTEGER', 'users', 'ID', false, null, null);
        $this->addForeignKey('NEWSLETTER_ID', 'NewsletterId', 'INTEGER', 'newsletters', 'ID', false, null, null);
        // validators
        $this->addValidator('NAME', 'minLength', 'propel.validator.MinLengthValidator', '1', 'Le nom doit faire au moins 1 caractère.');
        $this->addValidator('NAME', 'unique', 'propel.validator.UniqueValidator', '', 'Le nom existe déjà.');
        $this->addValidator('SHORT_NAME', 'minLength', 'propel.validator.MinLengthValidator', '1', 'Le nom court doit faire au moins 1 caractère.');
        $this->addValidator('SHORT_NAME', 'unique', 'propel.validator.UniqueValidator', '', 'Le nom court existe déjà.');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Responsable', 'User', RelationMap::MANY_TO_ONE, array('responsable_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('Newsletter', 'Newsletter', RelationMap::MANY_TO_ONE, array('newsletter_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('Course', 'Course', RelationMap::ONE_TO_MANY, array('id' => 'cursus_id', ), 'CASCADE', 'CASCADE', 'Courses');
        $this->addRelation('EducationalPath', 'EducationalPath', RelationMap::ONE_TO_MANY, array('id' => 'cursus_id', ), 'CASCADE', 'CASCADE', 'EducationalPaths');
        $this->addRelation('Alert', 'Alert', RelationMap::ONE_TO_MANY, array('id' => 'cursus_id', ), 'CASCADE', 'CASCADE', 'Alerts');
        $this->addRelation('Content', 'Content', RelationMap::ONE_TO_MANY, array('id' => 'cursus_id', ), 'CASCADE', 'CASCADE', 'Contents');
        $this->addRelation('News', 'News', RelationMap::ONE_TO_MANY, array('id' => 'cursus_id', ), 'CASCADE', 'CASCADE', 'Newss');
        $this->addRelation('Schedule', 'Schedule', RelationMap::ONE_TO_MANY, array('id' => 'cursus_id', ), 'CASCADE', 'CASCADE', 'Schedules');
    } // buildRelations()

} // CursusTableMap
