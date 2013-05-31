<?php



/**
 * This class defines the structure of the 'users' table.
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
class UserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.UserTableMap';

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
        $this->setName('users');
        $this->setPhpName('User');
        $this->setClassname('User');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('username', 'Username', 'VARCHAR', false, 16, null);
        $this->addColumn('password_hash', 'PasswordHash', 'VARCHAR', false, 255, null);
        $this->addColumn('rights', 'Rights', 'TINYINT', true, null, 0);
        $this->addColumn('firstname', 'Firstname', 'VARCHAR', true, 64, null);
        $this->addColumn('lastname', 'Lastname', 'VARCHAR', true, 128, null);
        $this->addColumn('gender', 'Gender', 'ENUM', false, null, 'N');
        $this->getColumn('gender', false)->setValueSet(array (
  0 => 'N',
  1 => 'M',
  2 => 'F',
));
        $this->addColumn('email', 'Email', 'VARCHAR', true, 255, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 20, null);
        $this->addColumn('website', 'Website', 'VARCHAR', false, 255, null);
        $this->addColumn('birth_date', 'BirthDate', 'DATE', false, null, null);
        $this->addColumn('first_entry', 'FirstEntry', 'DATE', false, null, null);
        $this->addColumn('last_entry', 'LastEntry', 'DATE', false, null, null);
        $this->addColumn('expiration_date', 'ExpirationDate', 'DATE', false, null, null);
        $this->addColumn('last_visit', 'LastVisit', 'TIMESTAMP', false, null, null);
        $this->addColumn('visits_count', 'VisitsCount', 'INTEGER', false, null, 0);
        $this->addColumn('config_show_email', 'ConfigShowEmail', 'BOOLEAN', false, 1, '0');
        $this->addColumn('config_show_phone', 'ConfigShowPhone', 'BOOLEAN', false, 1, '0');
        $this->addColumn('config_show_real_name', 'ConfigShowRealName', 'BOOLEAN', false, 1, '1');
        $this->addColumn('config_show_birthdate', 'ConfigShowBirthdate', 'BOOLEAN', false, 1, '0');
        $this->addColumn('config_show_age', 'ConfigShowAge', 'BOOLEAN', false, 1, '1');
        $this->addColumn('config_index_profile', 'ConfigIndexProfile', 'BOOLEAN', false, 1, '0');
        $this->addColumn('config_private_profile', 'ConfigPrivateProfile', 'BOOLEAN', false, 1, '0');
        $this->addColumn('activated', 'Activated', 'BOOLEAN', false, 1, '0');
        $this->addColumn('is_a_teacher', 'IsATeacher', 'BOOLEAN', false, 1, '0');
        $this->addColumn('is_a_student', 'IsAStudent', 'BOOLEAN', false, 1, '0');
        $this->addColumn('is_an_alumni', 'IsAnAlumni', 'BOOLEAN', false, 1, '0');
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, 512, null);
        $this->addColumn('remarks', 'Remarks', 'VARCHAR', false, 255, null);
        // validators
        $this->addValidator('username', 'minLength', 'propel.validator.MinLengthValidator', '3', 'Le pseudo doit faire au moins 3 caractères.');
        $this->addValidator('username', 'match', 'propel.validator.MatchValidator', '/^[_a-z][_a-z0-9]+$/i', 'Le pseudo n\'est pas valide (Doit commencer par une lettre, et être uniquement composé de caractères alphanumériques).');
        $this->addValidator('username', 'unique', 'propel.validator.UniqueValidator', '', 'Le pseudo est déjà pris.');
        $this->addValidator('firstname', 'minLength', 'propel.validator.MinLengthValidator', '1', 'Le prénom doit faire au moins 1 caractère.');
        $this->addValidator('lastname', 'minLength', 'propel.validator.MinLengthValidator', '1', 'Le nom doit faire au moins 1 caractère.');
        $this->addValidator('email', 'minLength', 'propel.validator.MinLengthValidator', '6', 'L\'e-mail doit faire au moins 6 caractères.');
        $this->addValidator('email', 'match', 'propel.validator.MatchValidator', '/^[-+\w\.]+@[-\.\w]+\.[a-z]{2,4}$/', 'L\'adresse e-mail n\'est pas valide.');
        $this->addValidator('email', 'unique', 'propel.validator.UniqueValidator', '', 'L\'email est déjà pris.');
        $this->addValidator('visits_count', 'minValue', 'propel.validator.MinValueValidator', '0', 'Le nombre de visites ne peut pas être négatif.');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CursusResponsability', 'Cursus', RelationMap::ONE_TO_MANY, array('id' => 'responsable_id', ), 'SET NULL', 'CASCADE', 'CursusResponsabilitys');
        $this->addRelation('EducationalPathResponsability', 'EducationalPath', RelationMap::ONE_TO_MANY, array('id' => 'responsable_id', ), 'SET NULL', 'CASCADE', 'EducationalPathResponsabilitys');
        $this->addRelation('UsersPaths', 'UsersPaths', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', 'CASCADE', 'UsersPathss');
        $this->addRelation('File', 'File', RelationMap::ONE_TO_MANY, array('id' => 'author_id', ), 'SET NULL', 'CASCADE', 'Files');
        $this->addRelation('Content', 'Content', RelationMap::ONE_TO_MANY, array('id' => 'author_id', ), 'SET NULL', 'CASCADE', 'Contents');
        $this->addRelation('Report', 'Report', RelationMap::ONE_TO_MANY, array('id' => 'author_id', ), 'SET NULL', 'CASCADE', 'Reports');
        $this->addRelation('News', 'News', RelationMap::ONE_TO_MANY, array('id' => 'author_id', ), 'SET NULL', 'CASCADE', 'Newss');
        $this->addRelation('Event', 'Event', RelationMap::ONE_TO_MANY, array('id' => 'author_id', ), 'SET NULL', 'CASCADE', 'Events');
        $this->addRelation('Token', 'Token', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', 'CASCADE', 'Tokens');
        $this->addRelation('EducationalPath', 'EducationalPath', RelationMap::MANY_TO_MANY, array(), 'CASCADE', 'CASCADE', 'EducationalPaths');
    } // buildRelations()

} // UserTableMap
