<?php



/**
 * This class defines the structure of the 'files' table.
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
class FileTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.FileTableMap';

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
        $this->setName('files');
        $this->setPhpName('File');
        $this->setClassname('File');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('AUTHOR_ID', 'AuthorId', 'INTEGER', 'users', 'ID', false, null, null);
        $this->addColumn('TITLE', 'Title', 'VARCHAR', true, 128, null);
        $this->addColumn('DATE', 'Date', 'TIMESTAMP', true, null, null);
        $this->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 255, null);
        $this->addColumn('FILE_TYPE', 'FileType', 'ENUM', false, null, null);
        $this->getColumn('FILE_TYPE', false)->setValueSet(array (
  0 => 'archive',
  1 => 'text',
  2 => 'image',
  3 => 'video',
  4 => 'audio',
  5 => 'pdf',
  6 => 'binary',
));
        $this->addColumn('PATH', 'Path', 'VARCHAR', true, 255, null);
        $this->addColumn('ACCESS_RIGHTS', 'AccessRights', 'TINYINT', false, null, 0);
        $this->addColumn('DOWNLOADS_COUNT', 'DownloadsCount', 'INTEGER', false, null, 0);
        $this->addColumn('DELETED', 'Deleted', 'BOOLEAN', false, 1, '0');
        // validators
        $this->addValidator('TITLE', 'minLength', 'propel.validator.MinLengthValidator', '3', 'Le nom doit faire au moins 3 caractères.');
        $this->addValidator('PATH', 'minLength', 'propel.validator.MinLengthValidator', '3', 'Le chemin doit faire au moins 3 caractères.');
        $this->addValidator('PATH', 'notMatch', 'propel.validator.NotMatchValidator', '/^[a-z]:\/\//i', 'Le fichier ne peut être distant.');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Author', 'User', RelationMap::MANY_TO_ONE, array('author_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('ContentsFiles', 'ContentsFiles', RelationMap::ONE_TO_MANY, array('id' => 'file_id', ), 'CASCADE', 'CASCADE', 'ContentsFiless');
        $this->addRelation('Content', 'Content', RelationMap::MANY_TO_MANY, array(), 'CASCADE', 'CASCADE', 'Contents');
    } // buildRelations()

} // FileTableMap
