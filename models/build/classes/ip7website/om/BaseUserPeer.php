<?php


/**
 * Base static class for performing query and update operations on the 'users' table.
 *
 *
 *
 * @package propel.generator.ip7website.om
 */
abstract class BaseUserPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'infop7db';

    /** the table name for this class */
    const TABLE_NAME = 'users';

    /** the related Propel class for this table */
    const OM_CLASS = 'User';

    /** the related TableMap class for this table */
    const TM_CLASS = 'UserTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 32;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 2;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 30;

    /** the column name for the ID field */
    const ID = 'users.ID';

    /** the column name for the USERNAME field */
    const USERNAME = 'users.USERNAME';

    /** the column name for the PASSWORD_HASH field */
    const PASSWORD_HASH = 'users.PASSWORD_HASH';

    /** the column name for the TYPE field */
    const TYPE = 'users.TYPE';

    /** the column name for the FIRSTNAME field */
    const FIRSTNAME = 'users.FIRSTNAME';

    /** the column name for the LASTNAME field */
    const LASTNAME = 'users.LASTNAME';

    /** the column name for the GENDER field */
    const GENDER = 'users.GENDER';

    /** the column name for the EMAIL field */
    const EMAIL = 'users.EMAIL';

    /** the column name for the PHONE field */
    const PHONE = 'users.PHONE';

    /** the column name for the ADDRESS field */
    const ADDRESS = 'users.ADDRESS';

    /** the column name for the WEBSITE field */
    const WEBSITE = 'users.WEBSITE';

    /** the column name for the BIRTH_DATE field */
    const BIRTH_DATE = 'users.BIRTH_DATE';

    /** the column name for the FIRST_ENTRY field */
    const FIRST_ENTRY = 'users.FIRST_ENTRY';

    /** the column name for the LAST_ENTRY field */
    const LAST_ENTRY = 'users.LAST_ENTRY';

    /** the column name for the EXPIRATION_DATE field */
    const EXPIRATION_DATE = 'users.EXPIRATION_DATE';

    /** the column name for the LAST_VISIT field */
    const LAST_VISIT = 'users.LAST_VISIT';

    /** the column name for the VISITS_NB field */
    const VISITS_NB = 'users.VISITS_NB';

    /** the column name for the CONFIG_SHOW_EMAIL field */
    const CONFIG_SHOW_EMAIL = 'users.CONFIG_SHOW_EMAIL';

    /** the column name for the CONFIG_SHOW_PHONE field */
    const CONFIG_SHOW_PHONE = 'users.CONFIG_SHOW_PHONE';

    /** the column name for the CONFIG_SHOW_REAL_NAME field */
    const CONFIG_SHOW_REAL_NAME = 'users.CONFIG_SHOW_REAL_NAME';

    /** the column name for the CONFIG_SHOW_BIRTHDATE field */
    const CONFIG_SHOW_BIRTHDATE = 'users.CONFIG_SHOW_BIRTHDATE';

    /** the column name for the CONFIG_SHOW_AGE field */
    const CONFIG_SHOW_AGE = 'users.CONFIG_SHOW_AGE';

    /** the column name for the CONFIG_SHOW_ADDRESS field */
    const CONFIG_SHOW_ADDRESS = 'users.CONFIG_SHOW_ADDRESS';

    /** the column name for the CONFIG_INDEX_PROFILE field */
    const CONFIG_INDEX_PROFILE = 'users.CONFIG_INDEX_PROFILE';

    /** the column name for the CONFIG_PRIVATE_PROFILE field */
    const CONFIG_PRIVATE_PROFILE = 'users.CONFIG_PRIVATE_PROFILE';

    /** the column name for the DEACTIVATED field */
    const DEACTIVATED = 'users.DEACTIVATED';

    /** the column name for the IS_A_TEACHER field */
    const IS_A_TEACHER = 'users.IS_A_TEACHER';

    /** the column name for the IS_A_STUDENT field */
    const IS_A_STUDENT = 'users.IS_A_STUDENT';

    /** the column name for the IS_AN_ALUMNI field */
    const IS_AN_ALUMNI = 'users.IS_AN_ALUMNI';

    /** the column name for the AVATAR_ID field */
    const AVATAR_ID = 'users.AVATAR_ID';

    /** the column name for the DESCRIPTION field */
    const DESCRIPTION = 'users.DESCRIPTION';

    /** the column name for the REMARKS field */
    const REMARKS = 'users.REMARKS';

    /** The enumerated values for the GENDER field */
    const GENDER_M = 'M';
    const GENDER_F = 'F';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of User objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array User[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. UserPeer::$fieldNames[UserPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Username', 'PasswordHash', 'Type', 'Firstname', 'Lastname', 'Gender', 'Email', 'Phone', 'Address', 'Website', 'BirthDate', 'FirstEntry', 'LastEntry', 'ExpirationDate', 'LastVisit', 'VisitsNb', 'ConfigShowEmail', 'ConfigShowPhone', 'ConfigShowRealName', 'ConfigShowBirthdate', 'ConfigShowAge', 'ConfigShowAddress', 'ConfigIndexProfile', 'ConfigPrivateProfile', 'Deactivated', 'IsATeacher', 'IsAStudent', 'IsAnAlumni', 'AvatarId', 'Description', 'Remarks', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'username', 'passwordHash', 'type', 'firstname', 'lastname', 'gender', 'email', 'phone', 'address', 'website', 'birthDate', 'firstEntry', 'lastEntry', 'expirationDate', 'lastVisit', 'visitsNb', 'configShowEmail', 'configShowPhone', 'configShowRealName', 'configShowBirthdate', 'configShowAge', 'configShowAddress', 'configIndexProfile', 'configPrivateProfile', 'deactivated', 'isATeacher', 'isAStudent', 'isAnAlumni', 'avatarId', 'description', 'remarks', ),
        BasePeer::TYPE_COLNAME => array (UserPeer::ID, UserPeer::USERNAME, UserPeer::PASSWORD_HASH, UserPeer::TYPE, UserPeer::FIRSTNAME, UserPeer::LASTNAME, UserPeer::GENDER, UserPeer::EMAIL, UserPeer::PHONE, UserPeer::ADDRESS, UserPeer::WEBSITE, UserPeer::BIRTH_DATE, UserPeer::FIRST_ENTRY, UserPeer::LAST_ENTRY, UserPeer::EXPIRATION_DATE, UserPeer::LAST_VISIT, UserPeer::VISITS_NB, UserPeer::CONFIG_SHOW_EMAIL, UserPeer::CONFIG_SHOW_PHONE, UserPeer::CONFIG_SHOW_REAL_NAME, UserPeer::CONFIG_SHOW_BIRTHDATE, UserPeer::CONFIG_SHOW_AGE, UserPeer::CONFIG_SHOW_ADDRESS, UserPeer::CONFIG_INDEX_PROFILE, UserPeer::CONFIG_PRIVATE_PROFILE, UserPeer::DEACTIVATED, UserPeer::IS_A_TEACHER, UserPeer::IS_A_STUDENT, UserPeer::IS_AN_ALUMNI, UserPeer::AVATAR_ID, UserPeer::DESCRIPTION, UserPeer::REMARKS, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'USERNAME', 'PASSWORD_HASH', 'TYPE', 'FIRSTNAME', 'LASTNAME', 'GENDER', 'EMAIL', 'PHONE', 'ADDRESS', 'WEBSITE', 'BIRTH_DATE', 'FIRST_ENTRY', 'LAST_ENTRY', 'EXPIRATION_DATE', 'LAST_VISIT', 'VISITS_NB', 'CONFIG_SHOW_EMAIL', 'CONFIG_SHOW_PHONE', 'CONFIG_SHOW_REAL_NAME', 'CONFIG_SHOW_BIRTHDATE', 'CONFIG_SHOW_AGE', 'CONFIG_SHOW_ADDRESS', 'CONFIG_INDEX_PROFILE', 'CONFIG_PRIVATE_PROFILE', 'DEACTIVATED', 'IS_A_TEACHER', 'IS_A_STUDENT', 'IS_AN_ALUMNI', 'AVATAR_ID', 'DESCRIPTION', 'REMARKS', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'username', 'password_hash', 'type', 'firstname', 'lastname', 'gender', 'email', 'phone', 'address', 'website', 'birth_date', 'first_entry', 'last_entry', 'expiration_date', 'last_visit', 'visits_nb', 'config_show_email', 'config_show_phone', 'config_show_real_name', 'config_show_birthdate', 'config_show_age', 'config_show_address', 'config_index_profile', 'config_private_profile', 'deactivated', 'is_a_teacher', 'is_a_student', 'is_an_alumni', 'avatar_id', 'description', 'remarks', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. UserPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Username' => 1, 'PasswordHash' => 2, 'Type' => 3, 'Firstname' => 4, 'Lastname' => 5, 'Gender' => 6, 'Email' => 7, 'Phone' => 8, 'Address' => 9, 'Website' => 10, 'BirthDate' => 11, 'FirstEntry' => 12, 'LastEntry' => 13, 'ExpirationDate' => 14, 'LastVisit' => 15, 'VisitsNb' => 16, 'ConfigShowEmail' => 17, 'ConfigShowPhone' => 18, 'ConfigShowRealName' => 19, 'ConfigShowBirthdate' => 20, 'ConfigShowAge' => 21, 'ConfigShowAddress' => 22, 'ConfigIndexProfile' => 23, 'ConfigPrivateProfile' => 24, 'Deactivated' => 25, 'IsATeacher' => 26, 'IsAStudent' => 27, 'IsAnAlumni' => 28, 'AvatarId' => 29, 'Description' => 30, 'Remarks' => 31, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'username' => 1, 'passwordHash' => 2, 'type' => 3, 'firstname' => 4, 'lastname' => 5, 'gender' => 6, 'email' => 7, 'phone' => 8, 'address' => 9, 'website' => 10, 'birthDate' => 11, 'firstEntry' => 12, 'lastEntry' => 13, 'expirationDate' => 14, 'lastVisit' => 15, 'visitsNb' => 16, 'configShowEmail' => 17, 'configShowPhone' => 18, 'configShowRealName' => 19, 'configShowBirthdate' => 20, 'configShowAge' => 21, 'configShowAddress' => 22, 'configIndexProfile' => 23, 'configPrivateProfile' => 24, 'deactivated' => 25, 'isATeacher' => 26, 'isAStudent' => 27, 'isAnAlumni' => 28, 'avatarId' => 29, 'description' => 30, 'remarks' => 31, ),
        BasePeer::TYPE_COLNAME => array (UserPeer::ID => 0, UserPeer::USERNAME => 1, UserPeer::PASSWORD_HASH => 2, UserPeer::TYPE => 3, UserPeer::FIRSTNAME => 4, UserPeer::LASTNAME => 5, UserPeer::GENDER => 6, UserPeer::EMAIL => 7, UserPeer::PHONE => 8, UserPeer::ADDRESS => 9, UserPeer::WEBSITE => 10, UserPeer::BIRTH_DATE => 11, UserPeer::FIRST_ENTRY => 12, UserPeer::LAST_ENTRY => 13, UserPeer::EXPIRATION_DATE => 14, UserPeer::LAST_VISIT => 15, UserPeer::VISITS_NB => 16, UserPeer::CONFIG_SHOW_EMAIL => 17, UserPeer::CONFIG_SHOW_PHONE => 18, UserPeer::CONFIG_SHOW_REAL_NAME => 19, UserPeer::CONFIG_SHOW_BIRTHDATE => 20, UserPeer::CONFIG_SHOW_AGE => 21, UserPeer::CONFIG_SHOW_ADDRESS => 22, UserPeer::CONFIG_INDEX_PROFILE => 23, UserPeer::CONFIG_PRIVATE_PROFILE => 24, UserPeer::DEACTIVATED => 25, UserPeer::IS_A_TEACHER => 26, UserPeer::IS_A_STUDENT => 27, UserPeer::IS_AN_ALUMNI => 28, UserPeer::AVATAR_ID => 29, UserPeer::DESCRIPTION => 30, UserPeer::REMARKS => 31, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'USERNAME' => 1, 'PASSWORD_HASH' => 2, 'TYPE' => 3, 'FIRSTNAME' => 4, 'LASTNAME' => 5, 'GENDER' => 6, 'EMAIL' => 7, 'PHONE' => 8, 'ADDRESS' => 9, 'WEBSITE' => 10, 'BIRTH_DATE' => 11, 'FIRST_ENTRY' => 12, 'LAST_ENTRY' => 13, 'EXPIRATION_DATE' => 14, 'LAST_VISIT' => 15, 'VISITS_NB' => 16, 'CONFIG_SHOW_EMAIL' => 17, 'CONFIG_SHOW_PHONE' => 18, 'CONFIG_SHOW_REAL_NAME' => 19, 'CONFIG_SHOW_BIRTHDATE' => 20, 'CONFIG_SHOW_AGE' => 21, 'CONFIG_SHOW_ADDRESS' => 22, 'CONFIG_INDEX_PROFILE' => 23, 'CONFIG_PRIVATE_PROFILE' => 24, 'DEACTIVATED' => 25, 'IS_A_TEACHER' => 26, 'IS_A_STUDENT' => 27, 'IS_AN_ALUMNI' => 28, 'AVATAR_ID' => 29, 'DESCRIPTION' => 30, 'REMARKS' => 31, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'username' => 1, 'password_hash' => 2, 'type' => 3, 'firstname' => 4, 'lastname' => 5, 'gender' => 6, 'email' => 7, 'phone' => 8, 'address' => 9, 'website' => 10, 'birth_date' => 11, 'first_entry' => 12, 'last_entry' => 13, 'expiration_date' => 14, 'last_visit' => 15, 'visits_nb' => 16, 'config_show_email' => 17, 'config_show_phone' => 18, 'config_show_real_name' => 19, 'config_show_birthdate' => 20, 'config_show_age' => 21, 'config_show_address' => 22, 'config_index_profile' => 23, 'config_private_profile' => 24, 'deactivated' => 25, 'is_a_teacher' => 26, 'is_a_student' => 27, 'is_an_alumni' => 28, 'avatar_id' => 29, 'description' => 30, 'remarks' => 31, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        UserPeer::GENDER => array(
            UserPeer::GENDER_M,
            UserPeer::GENDER_F,
        ),
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = UserPeer::getFieldNames($toType);
        $key = isset(UserPeer::$fieldKeys[$fromType][$name]) ? UserPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(UserPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, UserPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return UserPeer::$fieldNames[$type];
    }

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return UserPeer::$enumValueSets;
    }

    /**
     * Gets the list of values for an ENUM column
     *
     * @param string $colname The ENUM column name.
     *
     * @return array list of possible values for the column
     */
    public static function getValueSet($colname)
    {
        $valueSets = UserPeer::getValueSets();

        return $valueSets[$colname];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. UserPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(UserPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(UserPeer::ID);
            $criteria->addSelectColumn(UserPeer::USERNAME);
            $criteria->addSelectColumn(UserPeer::PASSWORD_HASH);
            $criteria->addSelectColumn(UserPeer::TYPE);
            $criteria->addSelectColumn(UserPeer::FIRSTNAME);
            $criteria->addSelectColumn(UserPeer::LASTNAME);
            $criteria->addSelectColumn(UserPeer::GENDER);
            $criteria->addSelectColumn(UserPeer::EMAIL);
            $criteria->addSelectColumn(UserPeer::PHONE);
            $criteria->addSelectColumn(UserPeer::ADDRESS);
            $criteria->addSelectColumn(UserPeer::WEBSITE);
            $criteria->addSelectColumn(UserPeer::BIRTH_DATE);
            $criteria->addSelectColumn(UserPeer::FIRST_ENTRY);
            $criteria->addSelectColumn(UserPeer::LAST_ENTRY);
            $criteria->addSelectColumn(UserPeer::EXPIRATION_DATE);
            $criteria->addSelectColumn(UserPeer::LAST_VISIT);
            $criteria->addSelectColumn(UserPeer::VISITS_NB);
            $criteria->addSelectColumn(UserPeer::CONFIG_SHOW_EMAIL);
            $criteria->addSelectColumn(UserPeer::CONFIG_SHOW_PHONE);
            $criteria->addSelectColumn(UserPeer::CONFIG_SHOW_REAL_NAME);
            $criteria->addSelectColumn(UserPeer::CONFIG_SHOW_BIRTHDATE);
            $criteria->addSelectColumn(UserPeer::CONFIG_SHOW_AGE);
            $criteria->addSelectColumn(UserPeer::CONFIG_SHOW_ADDRESS);
            $criteria->addSelectColumn(UserPeer::CONFIG_INDEX_PROFILE);
            $criteria->addSelectColumn(UserPeer::CONFIG_PRIVATE_PROFILE);
            $criteria->addSelectColumn(UserPeer::DEACTIVATED);
            $criteria->addSelectColumn(UserPeer::IS_A_TEACHER);
            $criteria->addSelectColumn(UserPeer::IS_A_STUDENT);
            $criteria->addSelectColumn(UserPeer::IS_AN_ALUMNI);
            $criteria->addSelectColumn(UserPeer::AVATAR_ID);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.USERNAME');
            $criteria->addSelectColumn($alias . '.PASSWORD_HASH');
            $criteria->addSelectColumn($alias . '.TYPE');
            $criteria->addSelectColumn($alias . '.FIRSTNAME');
            $criteria->addSelectColumn($alias . '.LASTNAME');
            $criteria->addSelectColumn($alias . '.GENDER');
            $criteria->addSelectColumn($alias . '.EMAIL');
            $criteria->addSelectColumn($alias . '.PHONE');
            $criteria->addSelectColumn($alias . '.ADDRESS');
            $criteria->addSelectColumn($alias . '.WEBSITE');
            $criteria->addSelectColumn($alias . '.BIRTH_DATE');
            $criteria->addSelectColumn($alias . '.FIRST_ENTRY');
            $criteria->addSelectColumn($alias . '.LAST_ENTRY');
            $criteria->addSelectColumn($alias . '.EXPIRATION_DATE');
            $criteria->addSelectColumn($alias . '.LAST_VISIT');
            $criteria->addSelectColumn($alias . '.VISITS_NB');
            $criteria->addSelectColumn($alias . '.CONFIG_SHOW_EMAIL');
            $criteria->addSelectColumn($alias . '.CONFIG_SHOW_PHONE');
            $criteria->addSelectColumn($alias . '.CONFIG_SHOW_REAL_NAME');
            $criteria->addSelectColumn($alias . '.CONFIG_SHOW_BIRTHDATE');
            $criteria->addSelectColumn($alias . '.CONFIG_SHOW_AGE');
            $criteria->addSelectColumn($alias . '.CONFIG_SHOW_ADDRESS');
            $criteria->addSelectColumn($alias . '.CONFIG_INDEX_PROFILE');
            $criteria->addSelectColumn($alias . '.CONFIG_PRIVATE_PROFILE');
            $criteria->addSelectColumn($alias . '.DEACTIVATED');
            $criteria->addSelectColumn($alias . '.IS_A_TEACHER');
            $criteria->addSelectColumn($alias . '.IS_A_STUDENT');
            $criteria->addSelectColumn($alias . '.IS_AN_ALUMNI');
            $criteria->addSelectColumn($alias . '.AVATAR_ID');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UserPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UserPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(UserPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 User
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = UserPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return UserPeer::populateObjects(UserPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement durirectly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            UserPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(UserPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      User $obj A User object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            UserPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A User object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof User) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or User object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(UserPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   User Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(UserPeer::$instances[$key])) {
                return UserPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool()
    {
        UserPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to users
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in CursusPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        CursusPeer::clearInstancePool();
        // Invalidate objects in UsersCursusPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        UsersCursusPeer::clearInstancePool();
        // Invalidate objects in FilePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        FilePeer::clearInstancePool();
        // Invalidate objects in NewslettersSubscribersPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        NewslettersSubscribersPeer::clearInstancePool();
        // Invalidate objects in AlertPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        AlertPeer::clearInstancePool();
        // Invalidate objects in ContentPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ContentPeer::clearInstancePool();
        // Invalidate objects in CommentPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        CommentPeer::clearInstancePool();
        // Invalidate objects in ReportPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ReportPeer::clearInstancePool();
        // Invalidate objects in NotePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        NotePeer::clearInstancePool();
        // Invalidate objects in NewsPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        NewsPeer::clearInstancePool();
        // Invalidate objects in AdPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        AdPeer::clearInstancePool();
        // Invalidate objects in TransactionPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        TransactionPeer::clearInstancePool();
        // Invalidate objects in ForumMessagePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ForumMessagePeer::clearInstancePool();
        // Invalidate objects in ScheduledCoursePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ScheduledCoursePeer::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = UserPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = UserPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = UserPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UserPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (User object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = UserPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = UserPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + UserPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UserPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            UserPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Avatar table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAvatar(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UserPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UserPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(UserPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UserPeer::AVATAR_ID, FilePeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of User objects pre-filled with their File objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of User objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAvatar(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UserPeer::DATABASE_NAME);
        }

        UserPeer::addSelectColumns($criteria);
        $startcol = UserPeer::NUM_HYDRATE_COLUMNS;
        FilePeer::addSelectColumns($criteria);

        $criteria->addJoin(UserPeer::AVATAR_ID, FilePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UserPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UserPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = UserPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UserPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = FilePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = FilePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = FilePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    FilePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (User) to $obj2 (File)
                $obj2->addUserRelatedByAvatarId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UserPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UserPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(UserPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UserPeer::AVATAR_ID, FilePeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of User objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of User objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UserPeer::DATABASE_NAME);
        }

        UserPeer::addSelectColumns($criteria);
        $startcol2 = UserPeer::NUM_HYDRATE_COLUMNS;

        FilePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + FilePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(UserPeer::AVATAR_ID, FilePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UserPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UserPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = UserPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UserPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined File rows

            $key2 = FilePeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = FilePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = FilePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    FilePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (User) to the collection in $obj2 (File)
                $obj2->addUserRelatedByAvatarId($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(UserPeer::DATABASE_NAME)->getTable(UserPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseUserPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseUserPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new UserTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass()
    {
        return UserPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a User or Criteria object.
     *
     * @param      mixed $values Criteria or User object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from User object
        }

        if ($criteria->containsKey(UserPeer::ID) && $criteria->keyContainsValue(UserPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UserPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(UserPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a User or Criteria object.
     *
     * @param      mixed $values Criteria or User object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(UserPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(UserPeer::ID);
            $value = $criteria->remove(UserPeer::ID);
            if ($value) {
                $selectCriteria->add(UserPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(UserPeer::TABLE_NAME);
            }

        } else { // $values is User object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(UserPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the users table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += UserPeer::doOnDeleteCascade(new Criteria(UserPeer::DATABASE_NAME), $con);
            UserPeer::doOnDeleteSetNull(new Criteria(UserPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(UserPeer::TABLE_NAME, $con, UserPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UserPeer::clearInstancePool();
            UserPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a User or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or User object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof User) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UserPeer::DATABASE_NAME);
            $criteria->add(UserPeer::ID, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(UserPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += UserPeer::doOnDeleteCascade($c, $con);

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            UserPeer::doOnDeleteSetNull($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                UserPeer::clearInstancePool();
            } elseif ($values instanceof User) { // it's a model object
                UserPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    UserPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            UserPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * This is a method for emulating ON DELETE CASCADE for DBs that don't support this
     * feature (like MySQL or SQLite).
     *
     * This method is not very speedy because it must perform a query first to get
     * the implicated records and then perform the deletes by calling those Peer classes.
     *
     * This method should be used within a transaction if possible.
     *
     * @param      Criteria $criteria
     * @param      PropelPDO $con
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con)
    {
        // initialize var to track total num of affected rows
        $affectedRows = 0;

        // first find the objects that are implicated by the $criteria
        $objects = UserPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related UsersCursus objects
            $criteria = new Criteria(UsersCursusPeer::DATABASE_NAME);

            $criteria->add(UsersCursusPeer::USER_ID, $obj->getId());
            $affectedRows += UsersCursusPeer::doDelete($criteria, $con);

            // delete related NewslettersSubscribers objects
            $criteria = new Criteria(NewslettersSubscribersPeer::DATABASE_NAME);

            $criteria->add(NewslettersSubscribersPeer::SUBSCRIBER_ID, $obj->getId());
            $affectedRows += NewslettersSubscribersPeer::doDelete($criteria, $con);

            // delete related Alert objects
            $criteria = new Criteria(AlertPeer::DATABASE_NAME);

            $criteria->add(AlertPeer::SUBSCRIBER_ID, $obj->getId());
            $affectedRows += AlertPeer::doDelete($criteria, $con);

            // delete related Comment objects
            $criteria = new Criteria(CommentPeer::DATABASE_NAME);

            $criteria->add(CommentPeer::AUTHOR_ID, $obj->getId());
            $affectedRows += CommentPeer::doDelete($criteria, $con);

            // delete related Note objects
            $criteria = new Criteria(NotePeer::DATABASE_NAME);

            $criteria->add(NotePeer::USER_ID, $obj->getId());
            $affectedRows += NotePeer::doDelete($criteria, $con);

            // delete related Ad objects
            $criteria = new Criteria(AdPeer::DATABASE_NAME);

            $criteria->add(AdPeer::AUTHOR_ID, $obj->getId());
            $affectedRows += AdPeer::doDelete($criteria, $con);

            // delete related ForumMessage objects
            $criteria = new Criteria(ForumMessagePeer::DATABASE_NAME);

            $criteria->add(ForumMessagePeer::AUTHOR_ID, $obj->getId());
            $affectedRows += ForumMessagePeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * This is a method for emulating ON DELETE SET NULL DBs that don't support this
     * feature (like MySQL or SQLite).
     *
     * This method is not very speedy because it must perform a query first to get
     * the implicated records and then perform the deletes by calling those Peer classes.
     *
     * This method should be used within a transaction if possible.
     *
     * @param      Criteria $criteria
     * @param      PropelPDO $con
     * @return void
     */
    protected static function doOnDeleteSetNull(Criteria $criteria, PropelPDO $con)
    {

        // first find the objects that are implicated by the $criteria
        $objects = UserPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {

            // set fkey col in related Cursus rows to null
            $selectCriteria = new Criteria(UserPeer::DATABASE_NAME);
            $updateValues = new Criteria(UserPeer::DATABASE_NAME);
            $selectCriteria->add(CursusPeer::RESPONSABLE_ID, $obj->getId());
            $updateValues->add(CursusPeer::RESPONSABLE_ID, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related File rows to null
            $selectCriteria = new Criteria(UserPeer::DATABASE_NAME);
            $updateValues = new Criteria(UserPeer::DATABASE_NAME);
            $selectCriteria->add(FilePeer::AUTHOR_ID, $obj->getId());
            $updateValues->add(FilePeer::AUTHOR_ID, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related Content rows to null
            $selectCriteria = new Criteria(UserPeer::DATABASE_NAME);
            $updateValues = new Criteria(UserPeer::DATABASE_NAME);
            $selectCriteria->add(ContentPeer::AUTHOR_ID, $obj->getId());
            $updateValues->add(ContentPeer::AUTHOR_ID, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related Report rows to null
            $selectCriteria = new Criteria(UserPeer::DATABASE_NAME);
            $updateValues = new Criteria(UserPeer::DATABASE_NAME);
            $selectCriteria->add(ReportPeer::AUTHOR_ID, $obj->getId());
            $updateValues->add(ReportPeer::AUTHOR_ID, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related News rows to null
            $selectCriteria = new Criteria(UserPeer::DATABASE_NAME);
            $updateValues = new Criteria(UserPeer::DATABASE_NAME);
            $selectCriteria->add(NewsPeer::AUTHOR_ID, $obj->getId());
            $updateValues->add(NewsPeer::AUTHOR_ID, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related Transaction rows to null
            $selectCriteria = new Criteria(UserPeer::DATABASE_NAME);
            $updateValues = new Criteria(UserPeer::DATABASE_NAME);
            $selectCriteria->add(TransactionPeer::USER_ID, $obj->getId());
            $updateValues->add(TransactionPeer::USER_ID, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related ScheduledCourse rows to null
            $selectCriteria = new Criteria(UserPeer::DATABASE_NAME);
            $updateValues = new Criteria(UserPeer::DATABASE_NAME);
            $selectCriteria->add(ScheduledCoursePeer::TEACHER_ID, $obj->getId());
            $updateValues->add(ScheduledCoursePeer::TEACHER_ID, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

        }
    }

    /**
     * Validates all modified columns of given User object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      User $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(UserPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(UserPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        if ($obj->isNew() || $obj->isColumnModified(UserPeer::USERNAME))
            $columns[UserPeer::USERNAME] = $obj->getUsername();

        if ($obj->isNew() || $obj->isColumnModified(UserPeer::FIRSTNAME))
            $columns[UserPeer::FIRSTNAME] = $obj->getFirstname();

        if ($obj->isNew() || $obj->isColumnModified(UserPeer::LASTNAME))
            $columns[UserPeer::LASTNAME] = $obj->getLastname();

        if ($obj->isNew() || $obj->isColumnModified(UserPeer::EMAIL))
            $columns[UserPeer::EMAIL] = $obj->getEmail();

        if ($obj->isNew() || $obj->isColumnModified(UserPeer::WEBSITE))
            $columns[UserPeer::WEBSITE] = $obj->getWebsite();

        if ($obj->isNew() || $obj->isColumnModified(UserPeer::VISITS_NB))
            $columns[UserPeer::VISITS_NB] = $obj->getVisitsNb();

        }

        return BasePeer::doValidate(UserPeer::DATABASE_NAME, UserPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return User
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = UserPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(UserPeer::DATABASE_NAME);
        $criteria->add(UserPeer::ID, $pk);

        $v = UserPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return User[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(UserPeer::DATABASE_NAME);
            $criteria->add(UserPeer::ID, $pks, Criteria::IN);
            $objs = UserPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseUserPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseUserPeer::buildTableMap();

