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
    const NUM_COLUMNS = 29;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 2;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 27;

    /** the column name for the ID field */
    const ID = 'users.ID';

    /** the column name for the USERNAME field */
    const USERNAME = 'users.USERNAME';

    /** the column name for the PASSWORD_HASH field */
    const PASSWORD_HASH = 'users.PASSWORD_HASH';

    /** the column name for the RIGHTS field */
    const RIGHTS = 'users.RIGHTS';

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

    /** the column name for the VISITS_COUNT field */
    const VISITS_COUNT = 'users.VISITS_COUNT';

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

    /** the column name for the CONFIG_INDEX_PROFILE field */
    const CONFIG_INDEX_PROFILE = 'users.CONFIG_INDEX_PROFILE';

    /** the column name for the CONFIG_PRIVATE_PROFILE field */
    const CONFIG_PRIVATE_PROFILE = 'users.CONFIG_PRIVATE_PROFILE';

    /** the column name for the ACTIVATED field */
    const ACTIVATED = 'users.ACTIVATED';

    /** the column name for the IS_A_TEACHER field */
    const IS_A_TEACHER = 'users.IS_A_TEACHER';

    /** the column name for the IS_A_STUDENT field */
    const IS_A_STUDENT = 'users.IS_A_STUDENT';

    /** the column name for the IS_AN_ALUMNI field */
    const IS_AN_ALUMNI = 'users.IS_AN_ALUMNI';

    /** the column name for the DESCRIPTION field */
    const DESCRIPTION = 'users.DESCRIPTION';

    /** the column name for the REMARKS field */
    const REMARKS = 'users.REMARKS';

    /** The enumerated values for the GENDER field */
    const GENDER_N = 'N';
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
        BasePeer::TYPE_PHPNAME => array ('Id', 'Username', 'PasswordHash', 'Rights', 'Firstname', 'Lastname', 'Gender', 'Email', 'Phone', 'Website', 'BirthDate', 'FirstEntry', 'LastEntry', 'ExpirationDate', 'LastVisit', 'VisitsCount', 'ConfigShowEmail', 'ConfigShowPhone', 'ConfigShowRealName', 'ConfigShowBirthdate', 'ConfigShowAge', 'ConfigIndexProfile', 'ConfigPrivateProfile', 'Activated', 'IsATeacher', 'IsAStudent', 'IsAnAlumni', 'Description', 'Remarks', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'username', 'passwordHash', 'rights', 'firstname', 'lastname', 'gender', 'email', 'phone', 'website', 'birthDate', 'firstEntry', 'lastEntry', 'expirationDate', 'lastVisit', 'visitsCount', 'configShowEmail', 'configShowPhone', 'configShowRealName', 'configShowBirthdate', 'configShowAge', 'configIndexProfile', 'configPrivateProfile', 'activated', 'isATeacher', 'isAStudent', 'isAnAlumni', 'description', 'remarks', ),
        BasePeer::TYPE_COLNAME => array (UserPeer::ID, UserPeer::USERNAME, UserPeer::PASSWORD_HASH, UserPeer::RIGHTS, UserPeer::FIRSTNAME, UserPeer::LASTNAME, UserPeer::GENDER, UserPeer::EMAIL, UserPeer::PHONE, UserPeer::WEBSITE, UserPeer::BIRTH_DATE, UserPeer::FIRST_ENTRY, UserPeer::LAST_ENTRY, UserPeer::EXPIRATION_DATE, UserPeer::LAST_VISIT, UserPeer::VISITS_COUNT, UserPeer::CONFIG_SHOW_EMAIL, UserPeer::CONFIG_SHOW_PHONE, UserPeer::CONFIG_SHOW_REAL_NAME, UserPeer::CONFIG_SHOW_BIRTHDATE, UserPeer::CONFIG_SHOW_AGE, UserPeer::CONFIG_INDEX_PROFILE, UserPeer::CONFIG_PRIVATE_PROFILE, UserPeer::ACTIVATED, UserPeer::IS_A_TEACHER, UserPeer::IS_A_STUDENT, UserPeer::IS_AN_ALUMNI, UserPeer::DESCRIPTION, UserPeer::REMARKS, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'USERNAME', 'PASSWORD_HASH', 'RIGHTS', 'FIRSTNAME', 'LASTNAME', 'GENDER', 'EMAIL', 'PHONE', 'WEBSITE', 'BIRTH_DATE', 'FIRST_ENTRY', 'LAST_ENTRY', 'EXPIRATION_DATE', 'LAST_VISIT', 'VISITS_COUNT', 'CONFIG_SHOW_EMAIL', 'CONFIG_SHOW_PHONE', 'CONFIG_SHOW_REAL_NAME', 'CONFIG_SHOW_BIRTHDATE', 'CONFIG_SHOW_AGE', 'CONFIG_INDEX_PROFILE', 'CONFIG_PRIVATE_PROFILE', 'ACTIVATED', 'IS_A_TEACHER', 'IS_A_STUDENT', 'IS_AN_ALUMNI', 'DESCRIPTION', 'REMARKS', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'username', 'password_hash', 'rights', 'firstname', 'lastname', 'gender', 'email', 'phone', 'website', 'birth_date', 'first_entry', 'last_entry', 'expiration_date', 'last_visit', 'visits_count', 'config_show_email', 'config_show_phone', 'config_show_real_name', 'config_show_birthdate', 'config_show_age', 'config_index_profile', 'config_private_profile', 'activated', 'is_a_teacher', 'is_a_student', 'is_an_alumni', 'description', 'remarks', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. UserPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Username' => 1, 'PasswordHash' => 2, 'Rights' => 3, 'Firstname' => 4, 'Lastname' => 5, 'Gender' => 6, 'Email' => 7, 'Phone' => 8, 'Website' => 9, 'BirthDate' => 10, 'FirstEntry' => 11, 'LastEntry' => 12, 'ExpirationDate' => 13, 'LastVisit' => 14, 'VisitsCount' => 15, 'ConfigShowEmail' => 16, 'ConfigShowPhone' => 17, 'ConfigShowRealName' => 18, 'ConfigShowBirthdate' => 19, 'ConfigShowAge' => 20, 'ConfigIndexProfile' => 21, 'ConfigPrivateProfile' => 22, 'Activated' => 23, 'IsATeacher' => 24, 'IsAStudent' => 25, 'IsAnAlumni' => 26, 'Description' => 27, 'Remarks' => 28, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'username' => 1, 'passwordHash' => 2, 'rights' => 3, 'firstname' => 4, 'lastname' => 5, 'gender' => 6, 'email' => 7, 'phone' => 8, 'website' => 9, 'birthDate' => 10, 'firstEntry' => 11, 'lastEntry' => 12, 'expirationDate' => 13, 'lastVisit' => 14, 'visitsCount' => 15, 'configShowEmail' => 16, 'configShowPhone' => 17, 'configShowRealName' => 18, 'configShowBirthdate' => 19, 'configShowAge' => 20, 'configIndexProfile' => 21, 'configPrivateProfile' => 22, 'activated' => 23, 'isATeacher' => 24, 'isAStudent' => 25, 'isAnAlumni' => 26, 'description' => 27, 'remarks' => 28, ),
        BasePeer::TYPE_COLNAME => array (UserPeer::ID => 0, UserPeer::USERNAME => 1, UserPeer::PASSWORD_HASH => 2, UserPeer::RIGHTS => 3, UserPeer::FIRSTNAME => 4, UserPeer::LASTNAME => 5, UserPeer::GENDER => 6, UserPeer::EMAIL => 7, UserPeer::PHONE => 8, UserPeer::WEBSITE => 9, UserPeer::BIRTH_DATE => 10, UserPeer::FIRST_ENTRY => 11, UserPeer::LAST_ENTRY => 12, UserPeer::EXPIRATION_DATE => 13, UserPeer::LAST_VISIT => 14, UserPeer::VISITS_COUNT => 15, UserPeer::CONFIG_SHOW_EMAIL => 16, UserPeer::CONFIG_SHOW_PHONE => 17, UserPeer::CONFIG_SHOW_REAL_NAME => 18, UserPeer::CONFIG_SHOW_BIRTHDATE => 19, UserPeer::CONFIG_SHOW_AGE => 20, UserPeer::CONFIG_INDEX_PROFILE => 21, UserPeer::CONFIG_PRIVATE_PROFILE => 22, UserPeer::ACTIVATED => 23, UserPeer::IS_A_TEACHER => 24, UserPeer::IS_A_STUDENT => 25, UserPeer::IS_AN_ALUMNI => 26, UserPeer::DESCRIPTION => 27, UserPeer::REMARKS => 28, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'USERNAME' => 1, 'PASSWORD_HASH' => 2, 'RIGHTS' => 3, 'FIRSTNAME' => 4, 'LASTNAME' => 5, 'GENDER' => 6, 'EMAIL' => 7, 'PHONE' => 8, 'WEBSITE' => 9, 'BIRTH_DATE' => 10, 'FIRST_ENTRY' => 11, 'LAST_ENTRY' => 12, 'EXPIRATION_DATE' => 13, 'LAST_VISIT' => 14, 'VISITS_COUNT' => 15, 'CONFIG_SHOW_EMAIL' => 16, 'CONFIG_SHOW_PHONE' => 17, 'CONFIG_SHOW_REAL_NAME' => 18, 'CONFIG_SHOW_BIRTHDATE' => 19, 'CONFIG_SHOW_AGE' => 20, 'CONFIG_INDEX_PROFILE' => 21, 'CONFIG_PRIVATE_PROFILE' => 22, 'ACTIVATED' => 23, 'IS_A_TEACHER' => 24, 'IS_A_STUDENT' => 25, 'IS_AN_ALUMNI' => 26, 'DESCRIPTION' => 27, 'REMARKS' => 28, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'username' => 1, 'password_hash' => 2, 'rights' => 3, 'firstname' => 4, 'lastname' => 5, 'gender' => 6, 'email' => 7, 'phone' => 8, 'website' => 9, 'birth_date' => 10, 'first_entry' => 11, 'last_entry' => 12, 'expiration_date' => 13, 'last_visit' => 14, 'visits_count' => 15, 'config_show_email' => 16, 'config_show_phone' => 17, 'config_show_real_name' => 18, 'config_show_birthdate' => 19, 'config_show_age' => 20, 'config_index_profile' => 21, 'config_private_profile' => 22, 'activated' => 23, 'is_a_teacher' => 24, 'is_a_student' => 25, 'is_an_alumni' => 26, 'description' => 27, 'remarks' => 28, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        UserPeer::GENDER => array(
            UserPeer::GENDER_N,
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
            $criteria->addSelectColumn(UserPeer::RIGHTS);
            $criteria->addSelectColumn(UserPeer::FIRSTNAME);
            $criteria->addSelectColumn(UserPeer::LASTNAME);
            $criteria->addSelectColumn(UserPeer::GENDER);
            $criteria->addSelectColumn(UserPeer::EMAIL);
            $criteria->addSelectColumn(UserPeer::PHONE);
            $criteria->addSelectColumn(UserPeer::WEBSITE);
            $criteria->addSelectColumn(UserPeer::BIRTH_DATE);
            $criteria->addSelectColumn(UserPeer::FIRST_ENTRY);
            $criteria->addSelectColumn(UserPeer::LAST_ENTRY);
            $criteria->addSelectColumn(UserPeer::EXPIRATION_DATE);
            $criteria->addSelectColumn(UserPeer::LAST_VISIT);
            $criteria->addSelectColumn(UserPeer::VISITS_COUNT);
            $criteria->addSelectColumn(UserPeer::CONFIG_SHOW_EMAIL);
            $criteria->addSelectColumn(UserPeer::CONFIG_SHOW_PHONE);
            $criteria->addSelectColumn(UserPeer::CONFIG_SHOW_REAL_NAME);
            $criteria->addSelectColumn(UserPeer::CONFIG_SHOW_BIRTHDATE);
            $criteria->addSelectColumn(UserPeer::CONFIG_SHOW_AGE);
            $criteria->addSelectColumn(UserPeer::CONFIG_INDEX_PROFILE);
            $criteria->addSelectColumn(UserPeer::CONFIG_PRIVATE_PROFILE);
            $criteria->addSelectColumn(UserPeer::ACTIVATED);
            $criteria->addSelectColumn(UserPeer::IS_A_TEACHER);
            $criteria->addSelectColumn(UserPeer::IS_A_STUDENT);
            $criteria->addSelectColumn(UserPeer::IS_AN_ALUMNI);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.USERNAME');
            $criteria->addSelectColumn($alias . '.PASSWORD_HASH');
            $criteria->addSelectColumn($alias . '.RIGHTS');
            $criteria->addSelectColumn($alias . '.FIRSTNAME');
            $criteria->addSelectColumn($alias . '.LASTNAME');
            $criteria->addSelectColumn($alias . '.GENDER');
            $criteria->addSelectColumn($alias . '.EMAIL');
            $criteria->addSelectColumn($alias . '.PHONE');
            $criteria->addSelectColumn($alias . '.WEBSITE');
            $criteria->addSelectColumn($alias . '.BIRTH_DATE');
            $criteria->addSelectColumn($alias . '.FIRST_ENTRY');
            $criteria->addSelectColumn($alias . '.LAST_ENTRY');
            $criteria->addSelectColumn($alias . '.EXPIRATION_DATE');
            $criteria->addSelectColumn($alias . '.LAST_VISIT');
            $criteria->addSelectColumn($alias . '.VISITS_COUNT');
            $criteria->addSelectColumn($alias . '.CONFIG_SHOW_EMAIL');
            $criteria->addSelectColumn($alias . '.CONFIG_SHOW_PHONE');
            $criteria->addSelectColumn($alias . '.CONFIG_SHOW_REAL_NAME');
            $criteria->addSelectColumn($alias . '.CONFIG_SHOW_BIRTHDATE');
            $criteria->addSelectColumn($alias . '.CONFIG_SHOW_AGE');
            $criteria->addSelectColumn($alias . '.CONFIG_INDEX_PROFILE');
            $criteria->addSelectColumn($alias . '.CONFIG_PRIVATE_PROFILE');
            $criteria->addSelectColumn($alias . '.ACTIVATED');
            $criteria->addSelectColumn($alias . '.IS_A_TEACHER');
            $criteria->addSelectColumn($alias . '.IS_A_STUDENT');
            $criteria->addSelectColumn($alias . '.IS_AN_ALUMNI');
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
        // Invalidate objects in EducationalPathPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        EducationalPathPeer::clearInstancePool();
        // Invalidate objects in UsersPathsPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        UsersPathsPeer::clearInstancePool();
        // Invalidate objects in FilePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        FilePeer::clearInstancePool();
        // Invalidate objects in ContentPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ContentPeer::clearInstancePool();
        // Invalidate objects in CommentPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        CommentPeer::clearInstancePool();
        // Invalidate objects in ReportPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ReportPeer::clearInstancePool();
        // Invalidate objects in NewsPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        NewsPeer::clearInstancePool();
        // Invalidate objects in TransactionPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        TransactionPeer::clearInstancePool();
        // Invalidate objects in ScheduledCoursePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ScheduledCoursePeer::clearInstancePool();
        // Invalidate objects in TokenPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        TokenPeer::clearInstancePool();
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


            // delete related UsersPaths objects
            $criteria = new Criteria(UsersPathsPeer::DATABASE_NAME);

            $criteria->add(UsersPathsPeer::USER_ID, $obj->getId());
            $affectedRows += UsersPathsPeer::doDelete($criteria, $con);

            // delete related Comment objects
            $criteria = new Criteria(CommentPeer::DATABASE_NAME);

            $criteria->add(CommentPeer::AUTHOR_ID, $obj->getId());
            $affectedRows += CommentPeer::doDelete($criteria, $con);

            // delete related Token objects
            $criteria = new Criteria(TokenPeer::DATABASE_NAME);

            $criteria->add(TokenPeer::USER_ID, $obj->getId());
            $affectedRows += TokenPeer::doDelete($criteria, $con);
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

            // set fkey col in related EducationalPath rows to null
            $selectCriteria = new Criteria(UserPeer::DATABASE_NAME);
            $updateValues = new Criteria(UserPeer::DATABASE_NAME);
            $selectCriteria->add(EducationalPathPeer::RESPONSABLE_ID, $obj->getId());
            $updateValues->add(EducationalPathPeer::RESPONSABLE_ID, null);

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

        if ($obj->isNew() || $obj->isColumnModified(UserPeer::VISITS_COUNT))
            $columns[UserPeer::VISITS_COUNT] = $obj->getVisitsCount();

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

