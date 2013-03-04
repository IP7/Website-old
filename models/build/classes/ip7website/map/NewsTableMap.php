<?php



/**
 * This class defines the structure of the 'news' table.
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
class NewsTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.NewsTableMap';

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
        $this->setName('news');
        $this->setPhpName('News');
        $this->setClassname('News');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('AUTHOR_ID', 'AuthorId', 'INTEGER', 'users', 'ID', true, null, null);
        $this->addColumn('TITLE', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('TEXT', 'Text', 'LONGVARCHAR', true, 1024, null);
        $this->addColumn('EXPIRATION_DATE', 'ExpirationDate', 'TIMESTAMP', false, null, null);
        $this->addForeignKey('CURSUS_ID', 'CursusId', 'INTEGER', 'cursus', 'ID', false, null, null);
        $this->addForeignKey('COURSE_ID', 'CourseId', 'INTEGER', 'courses', 'ID', false, null, null);
        $this->addColumn('ACCESS_RIGHTS', 'AccessRights', 'TINYINT', false, null, 0);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
        $this->addValidator('TITLE', 'minLength', 'propel.validator.MinLengthValidator', '1', 'Le titre doit faire au moins 1 caractère.');
        $this->addValidator('TEXT', 'minLength', 'propel.validator.MinLengthValidator', '1', 'Le texte doit faire au moins 1 caractère.');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Author', 'User', RelationMap::MANY_TO_ONE, array('author_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('Course', 'Course', RelationMap::MANY_TO_ONE, array('course_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Cursus', 'Cursus', RelationMap::MANY_TO_ONE, array('cursus_id' => 'id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_updated_at' => 'false', ),
        );
    } // getBehaviors()

} // NewsTableMap
