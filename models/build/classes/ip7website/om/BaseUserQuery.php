<?php


/**
 * Base class that represents a query for the 'users' table.
 *
 *
 *
 * @method UserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method UserQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method UserQuery orderByPasswordHash($order = Criteria::ASC) Order by the password_hash column
 * @method UserQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method UserQuery orderByFirstname($order = Criteria::ASC) Order by the firstname column
 * @method UserQuery orderByLastname($order = Criteria::ASC) Order by the lastname column
 * @method UserQuery orderByGender($order = Criteria::ASC) Order by the gender column
 * @method UserQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method UserQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method UserQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method UserQuery orderByWebsite($order = Criteria::ASC) Order by the website column
 * @method UserQuery orderByBirthDate($order = Criteria::ASC) Order by the birth_date column
 * @method UserQuery orderByFirstEntry($order = Criteria::ASC) Order by the first_entry column
 * @method UserQuery orderByLastEntry($order = Criteria::ASC) Order by the last_entry column
 * @method UserQuery orderByExpirationDate($order = Criteria::ASC) Order by the expiration_date column
 * @method UserQuery orderByLastVisit($order = Criteria::ASC) Order by the last_visit column
 * @method UserQuery orderByVisitsNb($order = Criteria::ASC) Order by the visits_nb column
 * @method UserQuery orderByConfigShowEmail($order = Criteria::ASC) Order by the config_show_email column
 * @method UserQuery orderByConfigShowPhone($order = Criteria::ASC) Order by the config_show_phone column
 * @method UserQuery orderByConfigShowRealName($order = Criteria::ASC) Order by the config_show_real_name column
 * @method UserQuery orderByConfigShowBirthdate($order = Criteria::ASC) Order by the config_show_birthdate column
 * @method UserQuery orderByConfigShowAge($order = Criteria::ASC) Order by the config_show_age column
 * @method UserQuery orderByConfigShowAddress($order = Criteria::ASC) Order by the config_show_address column
 * @method UserQuery orderByConfigIndexProfile($order = Criteria::ASC) Order by the config_index_profile column
 * @method UserQuery orderByDeactivated($order = Criteria::ASC) Order by the deactivated column
 * @method UserQuery orderByIsATeacher($order = Criteria::ASC) Order by the is_a_teacher column
 * @method UserQuery orderByIsAStudent($order = Criteria::ASC) Order by the is_a_student column
 * @method UserQuery orderByAvatarId($order = Criteria::ASC) Order by the avatar_id column
 * @method UserQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method UserQuery orderByRemarks($order = Criteria::ASC) Order by the remarks column
 *
 * @method UserQuery groupById() Group by the id column
 * @method UserQuery groupByUsername() Group by the username column
 * @method UserQuery groupByPasswordHash() Group by the password_hash column
 * @method UserQuery groupByType() Group by the type column
 * @method UserQuery groupByFirstname() Group by the firstname column
 * @method UserQuery groupByLastname() Group by the lastname column
 * @method UserQuery groupByGender() Group by the gender column
 * @method UserQuery groupByEmail() Group by the email column
 * @method UserQuery groupByPhone() Group by the phone column
 * @method UserQuery groupByAddress() Group by the address column
 * @method UserQuery groupByWebsite() Group by the website column
 * @method UserQuery groupByBirthDate() Group by the birth_date column
 * @method UserQuery groupByFirstEntry() Group by the first_entry column
 * @method UserQuery groupByLastEntry() Group by the last_entry column
 * @method UserQuery groupByExpirationDate() Group by the expiration_date column
 * @method UserQuery groupByLastVisit() Group by the last_visit column
 * @method UserQuery groupByVisitsNb() Group by the visits_nb column
 * @method UserQuery groupByConfigShowEmail() Group by the config_show_email column
 * @method UserQuery groupByConfigShowPhone() Group by the config_show_phone column
 * @method UserQuery groupByConfigShowRealName() Group by the config_show_real_name column
 * @method UserQuery groupByConfigShowBirthdate() Group by the config_show_birthdate column
 * @method UserQuery groupByConfigShowAge() Group by the config_show_age column
 * @method UserQuery groupByConfigShowAddress() Group by the config_show_address column
 * @method UserQuery groupByConfigIndexProfile() Group by the config_index_profile column
 * @method UserQuery groupByDeactivated() Group by the deactivated column
 * @method UserQuery groupByIsATeacher() Group by the is_a_teacher column
 * @method UserQuery groupByIsAStudent() Group by the is_a_student column
 * @method UserQuery groupByAvatarId() Group by the avatar_id column
 * @method UserQuery groupByDescription() Group by the description column
 * @method UserQuery groupByRemarks() Group by the remarks column
 *
 * @method UserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UserQuery leftJoinAvatar($relationAlias = null) Adds a LEFT JOIN clause to the query using the Avatar relation
 * @method UserQuery rightJoinAvatar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Avatar relation
 * @method UserQuery innerJoinAvatar($relationAlias = null) Adds a INNER JOIN clause to the query using the Avatar relation
 *
 * @method UserQuery leftJoinCursusResponsability($relationAlias = null) Adds a LEFT JOIN clause to the query using the CursusResponsability relation
 * @method UserQuery rightJoinCursusResponsability($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CursusResponsability relation
 * @method UserQuery innerJoinCursusResponsability($relationAlias = null) Adds a INNER JOIN clause to the query using the CursusResponsability relation
 *
 * @method UserQuery leftJoinUsersCursus($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsersCursus relation
 * @method UserQuery rightJoinUsersCursus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsersCursus relation
 * @method UserQuery innerJoinUsersCursus($relationAlias = null) Adds a INNER JOIN clause to the query using the UsersCursus relation
 *
 * @method UserQuery leftJoinFileRelatedByAuthorId($relationAlias = null) Adds a LEFT JOIN clause to the query using the FileRelatedByAuthorId relation
 * @method UserQuery rightJoinFileRelatedByAuthorId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FileRelatedByAuthorId relation
 * @method UserQuery innerJoinFileRelatedByAuthorId($relationAlias = null) Adds a INNER JOIN clause to the query using the FileRelatedByAuthorId relation
 *
 * @method UserQuery leftJoinNewslettersSubscribers($relationAlias = null) Adds a LEFT JOIN clause to the query using the NewslettersSubscribers relation
 * @method UserQuery rightJoinNewslettersSubscribers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NewslettersSubscribers relation
 * @method UserQuery innerJoinNewslettersSubscribers($relationAlias = null) Adds a INNER JOIN clause to the query using the NewslettersSubscribers relation
 *
 * @method UserQuery leftJoinAlert($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alert relation
 * @method UserQuery rightJoinAlert($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alert relation
 * @method UserQuery innerJoinAlert($relationAlias = null) Adds a INNER JOIN clause to the query using the Alert relation
 *
 * @method UserQuery leftJoinContent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Content relation
 * @method UserQuery rightJoinContent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Content relation
 * @method UserQuery innerJoinContent($relationAlias = null) Adds a INNER JOIN clause to the query using the Content relation
 *
 * @method UserQuery leftJoinComment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Comment relation
 * @method UserQuery rightJoinComment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Comment relation
 * @method UserQuery innerJoinComment($relationAlias = null) Adds a INNER JOIN clause to the query using the Comment relation
 *
 * @method UserQuery leftJoinReport($relationAlias = null) Adds a LEFT JOIN clause to the query using the Report relation
 * @method UserQuery rightJoinReport($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Report relation
 * @method UserQuery innerJoinReport($relationAlias = null) Adds a INNER JOIN clause to the query using the Report relation
 *
 * @method UserQuery leftJoinNote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Note relation
 * @method UserQuery rightJoinNote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Note relation
 * @method UserQuery innerJoinNote($relationAlias = null) Adds a INNER JOIN clause to the query using the Note relation
 *
 * @method UserQuery leftJoinNews($relationAlias = null) Adds a LEFT JOIN clause to the query using the News relation
 * @method UserQuery rightJoinNews($relationAlias = null) Adds a RIGHT JOIN clause to the query using the News relation
 * @method UserQuery innerJoinNews($relationAlias = null) Adds a INNER JOIN clause to the query using the News relation
 *
 * @method UserQuery leftJoinAd($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ad relation
 * @method UserQuery rightJoinAd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ad relation
 * @method UserQuery innerJoinAd($relationAlias = null) Adds a INNER JOIN clause to the query using the Ad relation
 *
 * @method UserQuery leftJoinTransaction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Transaction relation
 * @method UserQuery rightJoinTransaction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Transaction relation
 * @method UserQuery innerJoinTransaction($relationAlias = null) Adds a INNER JOIN clause to the query using the Transaction relation
 *
 * @method UserQuery leftJoinForumMessage($relationAlias = null) Adds a LEFT JOIN clause to the query using the ForumMessage relation
 * @method UserQuery rightJoinForumMessage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ForumMessage relation
 * @method UserQuery innerJoinForumMessage($relationAlias = null) Adds a INNER JOIN clause to the query using the ForumMessage relation
 *
 * @method UserQuery leftJoinScheduledCourse($relationAlias = null) Adds a LEFT JOIN clause to the query using the ScheduledCourse relation
 * @method UserQuery rightJoinScheduledCourse($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ScheduledCourse relation
 * @method UserQuery innerJoinScheduledCourse($relationAlias = null) Adds a INNER JOIN clause to the query using the ScheduledCourse relation
 *
 * @method User findOne(PropelPDO $con = null) Return the first User matching the query
 * @method User findOneOrCreate(PropelPDO $con = null) Return the first User matching the query, or a new User object populated from the query conditions when no match is found
 *
 * @method User findOneById(int $id) Return the first User filtered by the id column
 * @method User findOneByUsername(string $username) Return the first User filtered by the username column
 * @method User findOneByPasswordHash(string $password_hash) Return the first User filtered by the password_hash column
 * @method User findOneByType(int $type) Return the first User filtered by the type column
 * @method User findOneByFirstname(string $firstname) Return the first User filtered by the firstname column
 * @method User findOneByLastname(string $lastname) Return the first User filtered by the lastname column
 * @method User findOneByGender(int $gender) Return the first User filtered by the gender column
 * @method User findOneByEmail(string $email) Return the first User filtered by the email column
 * @method User findOneByPhone(string $phone) Return the first User filtered by the phone column
 * @method User findOneByAddress(string $address) Return the first User filtered by the address column
 * @method User findOneByWebsite(string $website) Return the first User filtered by the website column
 * @method User findOneByBirthDate(string $birth_date) Return the first User filtered by the birth_date column
 * @method User findOneByFirstEntry(string $first_entry) Return the first User filtered by the first_entry column
 * @method User findOneByLastEntry(string $last_entry) Return the first User filtered by the last_entry column
 * @method User findOneByExpirationDate(string $expiration_date) Return the first User filtered by the expiration_date column
 * @method User findOneByLastVisit(string $last_visit) Return the first User filtered by the last_visit column
 * @method User findOneByVisitsNb(int $visits_nb) Return the first User filtered by the visits_nb column
 * @method User findOneByConfigShowEmail(boolean $config_show_email) Return the first User filtered by the config_show_email column
 * @method User findOneByConfigShowPhone(boolean $config_show_phone) Return the first User filtered by the config_show_phone column
 * @method User findOneByConfigShowRealName(boolean $config_show_real_name) Return the first User filtered by the config_show_real_name column
 * @method User findOneByConfigShowBirthdate(boolean $config_show_birthdate) Return the first User filtered by the config_show_birthdate column
 * @method User findOneByConfigShowAge(boolean $config_show_age) Return the first User filtered by the config_show_age column
 * @method User findOneByConfigShowAddress(boolean $config_show_address) Return the first User filtered by the config_show_address column
 * @method User findOneByConfigIndexProfile(boolean $config_index_profile) Return the first User filtered by the config_index_profile column
 * @method User findOneByDeactivated(boolean $deactivated) Return the first User filtered by the deactivated column
 * @method User findOneByIsATeacher(boolean $is_a_teacher) Return the first User filtered by the is_a_teacher column
 * @method User findOneByIsAStudent(boolean $is_a_student) Return the first User filtered by the is_a_student column
 * @method User findOneByAvatarId(int $avatar_id) Return the first User filtered by the avatar_id column
 * @method User findOneByDescription(string $description) Return the first User filtered by the description column
 * @method User findOneByRemarks(string $remarks) Return the first User filtered by the remarks column
 *
 * @method array findById(int $id) Return User objects filtered by the id column
 * @method array findByUsername(string $username) Return User objects filtered by the username column
 * @method array findByPasswordHash(string $password_hash) Return User objects filtered by the password_hash column
 * @method array findByType(int $type) Return User objects filtered by the type column
 * @method array findByFirstname(string $firstname) Return User objects filtered by the firstname column
 * @method array findByLastname(string $lastname) Return User objects filtered by the lastname column
 * @method array findByGender(int $gender) Return User objects filtered by the gender column
 * @method array findByEmail(string $email) Return User objects filtered by the email column
 * @method array findByPhone(string $phone) Return User objects filtered by the phone column
 * @method array findByAddress(string $address) Return User objects filtered by the address column
 * @method array findByWebsite(string $website) Return User objects filtered by the website column
 * @method array findByBirthDate(string $birth_date) Return User objects filtered by the birth_date column
 * @method array findByFirstEntry(string $first_entry) Return User objects filtered by the first_entry column
 * @method array findByLastEntry(string $last_entry) Return User objects filtered by the last_entry column
 * @method array findByExpirationDate(string $expiration_date) Return User objects filtered by the expiration_date column
 * @method array findByLastVisit(string $last_visit) Return User objects filtered by the last_visit column
 * @method array findByVisitsNb(int $visits_nb) Return User objects filtered by the visits_nb column
 * @method array findByConfigShowEmail(boolean $config_show_email) Return User objects filtered by the config_show_email column
 * @method array findByConfigShowPhone(boolean $config_show_phone) Return User objects filtered by the config_show_phone column
 * @method array findByConfigShowRealName(boolean $config_show_real_name) Return User objects filtered by the config_show_real_name column
 * @method array findByConfigShowBirthdate(boolean $config_show_birthdate) Return User objects filtered by the config_show_birthdate column
 * @method array findByConfigShowAge(boolean $config_show_age) Return User objects filtered by the config_show_age column
 * @method array findByConfigShowAddress(boolean $config_show_address) Return User objects filtered by the config_show_address column
 * @method array findByConfigIndexProfile(boolean $config_index_profile) Return User objects filtered by the config_index_profile column
 * @method array findByDeactivated(boolean $deactivated) Return User objects filtered by the deactivated column
 * @method array findByIsATeacher(boolean $is_a_teacher) Return User objects filtered by the is_a_teacher column
 * @method array findByIsAStudent(boolean $is_a_student) Return User objects filtered by the is_a_student column
 * @method array findByAvatarId(int $avatar_id) Return User objects filtered by the avatar_id column
 * @method array findByDescription(string $description) Return User objects filtered by the description column
 * @method array findByRemarks(string $remarks) Return User objects filtered by the remarks column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseUserQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUserQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'User', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     UserQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UserQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UserQuery) {
            return $criteria;
        }
        $query = new UserQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   User|User[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UserPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   User A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `USERNAME`, `PASSWORD_HASH`, `TYPE`, `FIRSTNAME`, `LASTNAME`, `GENDER`, `EMAIL`, `PHONE`, `ADDRESS`, `WEBSITE`, `BIRTH_DATE`, `FIRST_ENTRY`, `LAST_ENTRY`, `EXPIRATION_DATE`, `LAST_VISIT`, `VISITS_NB`, `CONFIG_SHOW_EMAIL`, `CONFIG_SHOW_PHONE`, `CONFIG_SHOW_REAL_NAME`, `CONFIG_SHOW_BIRTHDATE`, `CONFIG_SHOW_AGE`, `CONFIG_SHOW_ADDRESS`, `CONFIG_INDEX_PROFILE`, `DEACTIVATED`, `IS_A_TEACHER`, `IS_A_STUDENT`, `AVATAR_ID` FROM `users` WHERE `ID` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new User();
            $obj->hydrate($row);
            UserPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return User|User[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|User[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UserPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UserPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(UserPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $username)) {
                $username = str_replace('*', '%', $username);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the password_hash column
     *
     * Example usage:
     * <code>
     * $query->filterByPasswordHash('fooValue');   // WHERE password_hash = 'fooValue'
     * $query->filterByPasswordHash('%fooValue%'); // WHERE password_hash LIKE '%fooValue%'
     * </code>
     *
     * @param     string $passwordHash The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByPasswordHash($passwordHash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($passwordHash)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $passwordHash)) {
                $passwordHash = str_replace('*', '%', $passwordHash);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::PASSWORD_HASH, $passwordHash, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType(1234); // WHERE type = 1234
     * $query->filterByType(array(12, 34)); // WHERE type IN (12, 34)
     * $query->filterByType(array('min' => 12)); // WHERE type > 12
     * </code>
     *
     * @param     mixed $type The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_array($type)) {
            $useMinMax = false;
            if (isset($type['min'])) {
                $this->addUsingAlias(UserPeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(UserPeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserPeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the firstname column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstname('fooValue');   // WHERE firstname = 'fooValue'
     * $query->filterByFirstname('%fooValue%'); // WHERE firstname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstname)) {
                $firstname = str_replace('*', '%', $firstname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::FIRSTNAME, $firstname, $comparison);
    }

    /**
     * Filter the query on the lastname column
     *
     * Example usage:
     * <code>
     * $query->filterByLastname('fooValue');   // WHERE lastname = 'fooValue'
     * $query->filterByLastname('%fooValue%'); // WHERE lastname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastname)) {
                $lastname = str_replace('*', '%', $lastname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the gender column
     *
     * @param     mixed $gender The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByGender($gender = null, $comparison = null)
    {
        $valueSet = UserPeer::getValueSet(UserPeer::GENDER);
        if (is_scalar($gender)) {
            if (!in_array($gender, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $gender));
            }
            $gender = array_search($gender, $valueSet);
        } elseif (is_array($gender)) {
            $convertedValues = array();
            foreach ($gender as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $gender = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserPeer::GENDER, $gender, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%'); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address)) {
                $address = str_replace('*', '%', $address);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the website column
     *
     * Example usage:
     * <code>
     * $query->filterByWebsite('fooValue');   // WHERE website = 'fooValue'
     * $query->filterByWebsite('%fooValue%'); // WHERE website LIKE '%fooValue%'
     * </code>
     *
     * @param     string $website The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByWebsite($website = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($website)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $website)) {
                $website = str_replace('*', '%', $website);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::WEBSITE, $website, $comparison);
    }

    /**
     * Filter the query on the birth_date column
     *
     * Example usage:
     * <code>
     * $query->filterByBirthDate('2011-03-14'); // WHERE birth_date = '2011-03-14'
     * $query->filterByBirthDate('now'); // WHERE birth_date = '2011-03-14'
     * $query->filterByBirthDate(array('max' => 'yesterday')); // WHERE birth_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $birthDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByBirthDate($birthDate = null, $comparison = null)
    {
        if (is_array($birthDate)) {
            $useMinMax = false;
            if (isset($birthDate['min'])) {
                $this->addUsingAlias(UserPeer::BIRTH_DATE, $birthDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($birthDate['max'])) {
                $this->addUsingAlias(UserPeer::BIRTH_DATE, $birthDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserPeer::BIRTH_DATE, $birthDate, $comparison);
    }

    /**
     * Filter the query on the first_entry column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstEntry('2011-03-14'); // WHERE first_entry = '2011-03-14'
     * $query->filterByFirstEntry('now'); // WHERE first_entry = '2011-03-14'
     * $query->filterByFirstEntry(array('max' => 'yesterday')); // WHERE first_entry > '2011-03-13'
     * </code>
     *
     * @param     mixed $firstEntry The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByFirstEntry($firstEntry = null, $comparison = null)
    {
        if (is_array($firstEntry)) {
            $useMinMax = false;
            if (isset($firstEntry['min'])) {
                $this->addUsingAlias(UserPeer::FIRST_ENTRY, $firstEntry['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($firstEntry['max'])) {
                $this->addUsingAlias(UserPeer::FIRST_ENTRY, $firstEntry['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserPeer::FIRST_ENTRY, $firstEntry, $comparison);
    }

    /**
     * Filter the query on the last_entry column
     *
     * Example usage:
     * <code>
     * $query->filterByLastEntry('2011-03-14'); // WHERE last_entry = '2011-03-14'
     * $query->filterByLastEntry('now'); // WHERE last_entry = '2011-03-14'
     * $query->filterByLastEntry(array('max' => 'yesterday')); // WHERE last_entry > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastEntry The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByLastEntry($lastEntry = null, $comparison = null)
    {
        if (is_array($lastEntry)) {
            $useMinMax = false;
            if (isset($lastEntry['min'])) {
                $this->addUsingAlias(UserPeer::LAST_ENTRY, $lastEntry['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastEntry['max'])) {
                $this->addUsingAlias(UserPeer::LAST_ENTRY, $lastEntry['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserPeer::LAST_ENTRY, $lastEntry, $comparison);
    }

    /**
     * Filter the query on the expiration_date column
     *
     * Example usage:
     * <code>
     * $query->filterByExpirationDate('2011-03-14'); // WHERE expiration_date = '2011-03-14'
     * $query->filterByExpirationDate('now'); // WHERE expiration_date = '2011-03-14'
     * $query->filterByExpirationDate(array('max' => 'yesterday')); // WHERE expiration_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $expirationDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByExpirationDate($expirationDate = null, $comparison = null)
    {
        if (is_array($expirationDate)) {
            $useMinMax = false;
            if (isset($expirationDate['min'])) {
                $this->addUsingAlias(UserPeer::EXPIRATION_DATE, $expirationDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expirationDate['max'])) {
                $this->addUsingAlias(UserPeer::EXPIRATION_DATE, $expirationDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserPeer::EXPIRATION_DATE, $expirationDate, $comparison);
    }

    /**
     * Filter the query on the last_visit column
     *
     * Example usage:
     * <code>
     * $query->filterByLastVisit('2011-03-14'); // WHERE last_visit = '2011-03-14'
     * $query->filterByLastVisit('now'); // WHERE last_visit = '2011-03-14'
     * $query->filterByLastVisit(array('max' => 'yesterday')); // WHERE last_visit > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastVisit The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByLastVisit($lastVisit = null, $comparison = null)
    {
        if (is_array($lastVisit)) {
            $useMinMax = false;
            if (isset($lastVisit['min'])) {
                $this->addUsingAlias(UserPeer::LAST_VISIT, $lastVisit['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastVisit['max'])) {
                $this->addUsingAlias(UserPeer::LAST_VISIT, $lastVisit['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserPeer::LAST_VISIT, $lastVisit, $comparison);
    }

    /**
     * Filter the query on the visits_nb column
     *
     * Example usage:
     * <code>
     * $query->filterByVisitsNb(1234); // WHERE visits_nb = 1234
     * $query->filterByVisitsNb(array(12, 34)); // WHERE visits_nb IN (12, 34)
     * $query->filterByVisitsNb(array('min' => 12)); // WHERE visits_nb > 12
     * </code>
     *
     * @param     mixed $visitsNb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByVisitsNb($visitsNb = null, $comparison = null)
    {
        if (is_array($visitsNb)) {
            $useMinMax = false;
            if (isset($visitsNb['min'])) {
                $this->addUsingAlias(UserPeer::VISITS_NB, $visitsNb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($visitsNb['max'])) {
                $this->addUsingAlias(UserPeer::VISITS_NB, $visitsNb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserPeer::VISITS_NB, $visitsNb, $comparison);
    }

    /**
     * Filter the query on the config_show_email column
     *
     * Example usage:
     * <code>
     * $query->filterByConfigShowEmail(true); // WHERE config_show_email = true
     * $query->filterByConfigShowEmail('yes'); // WHERE config_show_email = true
     * </code>
     *
     * @param     boolean|string $configShowEmail The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByConfigShowEmail($configShowEmail = null, $comparison = null)
    {
        if (is_string($configShowEmail)) {
            $config_show_email = in_array(strtolower($configShowEmail), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserPeer::CONFIG_SHOW_EMAIL, $configShowEmail, $comparison);
    }

    /**
     * Filter the query on the config_show_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByConfigShowPhone(true); // WHERE config_show_phone = true
     * $query->filterByConfigShowPhone('yes'); // WHERE config_show_phone = true
     * </code>
     *
     * @param     boolean|string $configShowPhone The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByConfigShowPhone($configShowPhone = null, $comparison = null)
    {
        if (is_string($configShowPhone)) {
            $config_show_phone = in_array(strtolower($configShowPhone), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserPeer::CONFIG_SHOW_PHONE, $configShowPhone, $comparison);
    }

    /**
     * Filter the query on the config_show_real_name column
     *
     * Example usage:
     * <code>
     * $query->filterByConfigShowRealName(true); // WHERE config_show_real_name = true
     * $query->filterByConfigShowRealName('yes'); // WHERE config_show_real_name = true
     * </code>
     *
     * @param     boolean|string $configShowRealName The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByConfigShowRealName($configShowRealName = null, $comparison = null)
    {
        if (is_string($configShowRealName)) {
            $config_show_real_name = in_array(strtolower($configShowRealName), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserPeer::CONFIG_SHOW_REAL_NAME, $configShowRealName, $comparison);
    }

    /**
     * Filter the query on the config_show_birthdate column
     *
     * Example usage:
     * <code>
     * $query->filterByConfigShowBirthdate(true); // WHERE config_show_birthdate = true
     * $query->filterByConfigShowBirthdate('yes'); // WHERE config_show_birthdate = true
     * </code>
     *
     * @param     boolean|string $configShowBirthdate The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByConfigShowBirthdate($configShowBirthdate = null, $comparison = null)
    {
        if (is_string($configShowBirthdate)) {
            $config_show_birthdate = in_array(strtolower($configShowBirthdate), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserPeer::CONFIG_SHOW_BIRTHDATE, $configShowBirthdate, $comparison);
    }

    /**
     * Filter the query on the config_show_age column
     *
     * Example usage:
     * <code>
     * $query->filterByConfigShowAge(true); // WHERE config_show_age = true
     * $query->filterByConfigShowAge('yes'); // WHERE config_show_age = true
     * </code>
     *
     * @param     boolean|string $configShowAge The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByConfigShowAge($configShowAge = null, $comparison = null)
    {
        if (is_string($configShowAge)) {
            $config_show_age = in_array(strtolower($configShowAge), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserPeer::CONFIG_SHOW_AGE, $configShowAge, $comparison);
    }

    /**
     * Filter the query on the config_show_address column
     *
     * Example usage:
     * <code>
     * $query->filterByConfigShowAddress(true); // WHERE config_show_address = true
     * $query->filterByConfigShowAddress('yes'); // WHERE config_show_address = true
     * </code>
     *
     * @param     boolean|string $configShowAddress The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByConfigShowAddress($configShowAddress = null, $comparison = null)
    {
        if (is_string($configShowAddress)) {
            $config_show_address = in_array(strtolower($configShowAddress), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserPeer::CONFIG_SHOW_ADDRESS, $configShowAddress, $comparison);
    }

    /**
     * Filter the query on the config_index_profile column
     *
     * Example usage:
     * <code>
     * $query->filterByConfigIndexProfile(true); // WHERE config_index_profile = true
     * $query->filterByConfigIndexProfile('yes'); // WHERE config_index_profile = true
     * </code>
     *
     * @param     boolean|string $configIndexProfile The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByConfigIndexProfile($configIndexProfile = null, $comparison = null)
    {
        if (is_string($configIndexProfile)) {
            $config_index_profile = in_array(strtolower($configIndexProfile), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserPeer::CONFIG_INDEX_PROFILE, $configIndexProfile, $comparison);
    }

    /**
     * Filter the query on the deactivated column
     *
     * Example usage:
     * <code>
     * $query->filterByDeactivated(true); // WHERE deactivated = true
     * $query->filterByDeactivated('yes'); // WHERE deactivated = true
     * </code>
     *
     * @param     boolean|string $deactivated The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByDeactivated($deactivated = null, $comparison = null)
    {
        if (is_string($deactivated)) {
            $deactivated = in_array(strtolower($deactivated), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserPeer::DEACTIVATED, $deactivated, $comparison);
    }

    /**
     * Filter the query on the is_a_teacher column
     *
     * Example usage:
     * <code>
     * $query->filterByIsATeacher(true); // WHERE is_a_teacher = true
     * $query->filterByIsATeacher('yes'); // WHERE is_a_teacher = true
     * </code>
     *
     * @param     boolean|string $isATeacher The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByIsATeacher($isATeacher = null, $comparison = null)
    {
        if (is_string($isATeacher)) {
            $is_a_teacher = in_array(strtolower($isATeacher), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserPeer::IS_A_TEACHER, $isATeacher, $comparison);
    }

    /**
     * Filter the query on the is_a_student column
     *
     * Example usage:
     * <code>
     * $query->filterByIsAStudent(true); // WHERE is_a_student = true
     * $query->filterByIsAStudent('yes'); // WHERE is_a_student = true
     * </code>
     *
     * @param     boolean|string $isAStudent The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByIsAStudent($isAStudent = null, $comparison = null)
    {
        if (is_string($isAStudent)) {
            $is_a_student = in_array(strtolower($isAStudent), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserPeer::IS_A_STUDENT, $isAStudent, $comparison);
    }

    /**
     * Filter the query on the avatar_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAvatarId(1234); // WHERE avatar_id = 1234
     * $query->filterByAvatarId(array(12, 34)); // WHERE avatar_id IN (12, 34)
     * $query->filterByAvatarId(array('min' => 12)); // WHERE avatar_id > 12
     * </code>
     *
     * @see       filterByAvatar()
     *
     * @param     mixed $avatarId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByAvatarId($avatarId = null, $comparison = null)
    {
        if (is_array($avatarId)) {
            $useMinMax = false;
            if (isset($avatarId['min'])) {
                $this->addUsingAlias(UserPeer::AVATAR_ID, $avatarId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($avatarId['max'])) {
                $this->addUsingAlias(UserPeer::AVATAR_ID, $avatarId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserPeer::AVATAR_ID, $avatarId, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the remarks column
     *
     * Example usage:
     * <code>
     * $query->filterByRemarks('fooValue');   // WHERE remarks = 'fooValue'
     * $query->filterByRemarks('%fooValue%'); // WHERE remarks LIKE '%fooValue%'
     * </code>
     *
     * @param     string $remarks The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByRemarks($remarks = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remarks)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $remarks)) {
                $remarks = str_replace('*', '%', $remarks);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::REMARKS, $remarks, $comparison);
    }

    /**
     * Filter the query by a related File object
     *
     * @param   File|PropelObjectCollection $file The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAvatar($file, $comparison = null)
    {
        if ($file instanceof File) {
            return $this
                ->addUsingAlias(UserPeer::AVATAR_ID, $file->getId(), $comparison);
        } elseif ($file instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UserPeer::AVATAR_ID, $file->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAvatar() only accepts arguments of type File or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Avatar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinAvatar($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Avatar');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Avatar');
        }

        return $this;
    }

    /**
     * Use the Avatar relation File object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   FileQuery A secondary query class using the current class as primary query
     */
    public function useAvatarQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAvatar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Avatar', 'FileQuery');
    }

    /**
     * Filter the query by a related Cursus object
     *
     * @param   Cursus|PropelObjectCollection $cursus  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCursusResponsability($cursus, $comparison = null)
    {
        if ($cursus instanceof Cursus) {
            return $this
                ->addUsingAlias(UserPeer::ID, $cursus->getResponsableId(), $comparison);
        } elseif ($cursus instanceof PropelObjectCollection) {
            return $this
                ->useCursusResponsabilityQuery()
                ->filterByPrimaryKeys($cursus->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCursusResponsability() only accepts arguments of type Cursus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CursusResponsability relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinCursusResponsability($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CursusResponsability');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CursusResponsability');
        }

        return $this;
    }

    /**
     * Use the CursusResponsability relation Cursus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CursusQuery A secondary query class using the current class as primary query
     */
    public function useCursusResponsabilityQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCursusResponsability($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CursusResponsability', 'CursusQuery');
    }

    /**
     * Filter the query by a related UsersCursus object
     *
     * @param   UsersCursus|PropelObjectCollection $usersCursus  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByUsersCursus($usersCursus, $comparison = null)
    {
        if ($usersCursus instanceof UsersCursus) {
            return $this
                ->addUsingAlias(UserPeer::ID, $usersCursus->getUserId(), $comparison);
        } elseif ($usersCursus instanceof PropelObjectCollection) {
            return $this
                ->useUsersCursusQuery()
                ->filterByPrimaryKeys($usersCursus->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUsersCursus() only accepts arguments of type UsersCursus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsersCursus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinUsersCursus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsersCursus');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'UsersCursus');
        }

        return $this;
    }

    /**
     * Use the UsersCursus relation UsersCursus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UsersCursusQuery A secondary query class using the current class as primary query
     */
    public function useUsersCursusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsersCursus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsersCursus', 'UsersCursusQuery');
    }

    /**
     * Filter the query by a related File object
     *
     * @param   File|PropelObjectCollection $file  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByFileRelatedByAuthorId($file, $comparison = null)
    {
        if ($file instanceof File) {
            return $this
                ->addUsingAlias(UserPeer::ID, $file->getAuthorId(), $comparison);
        } elseif ($file instanceof PropelObjectCollection) {
            return $this
                ->useFileRelatedByAuthorIdQuery()
                ->filterByPrimaryKeys($file->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFileRelatedByAuthorId() only accepts arguments of type File or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FileRelatedByAuthorId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinFileRelatedByAuthorId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FileRelatedByAuthorId');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'FileRelatedByAuthorId');
        }

        return $this;
    }

    /**
     * Use the FileRelatedByAuthorId relation File object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   FileQuery A secondary query class using the current class as primary query
     */
    public function useFileRelatedByAuthorIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinFileRelatedByAuthorId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FileRelatedByAuthorId', 'FileQuery');
    }

    /**
     * Filter the query by a related NewslettersSubscribers object
     *
     * @param   NewslettersSubscribers|PropelObjectCollection $newslettersSubscribers  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByNewslettersSubscribers($newslettersSubscribers, $comparison = null)
    {
        if ($newslettersSubscribers instanceof NewslettersSubscribers) {
            return $this
                ->addUsingAlias(UserPeer::ID, $newslettersSubscribers->getSubscriberId(), $comparison);
        } elseif ($newslettersSubscribers instanceof PropelObjectCollection) {
            return $this
                ->useNewslettersSubscribersQuery()
                ->filterByPrimaryKeys($newslettersSubscribers->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNewslettersSubscribers() only accepts arguments of type NewslettersSubscribers or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the NewslettersSubscribers relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinNewslettersSubscribers($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('NewslettersSubscribers');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'NewslettersSubscribers');
        }

        return $this;
    }

    /**
     * Use the NewslettersSubscribers relation NewslettersSubscribers object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   NewslettersSubscribersQuery A secondary query class using the current class as primary query
     */
    public function useNewslettersSubscribersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNewslettersSubscribers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'NewslettersSubscribers', 'NewslettersSubscribersQuery');
    }

    /**
     * Filter the query by a related Alert object
     *
     * @param   Alert|PropelObjectCollection $alert  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAlert($alert, $comparison = null)
    {
        if ($alert instanceof Alert) {
            return $this
                ->addUsingAlias(UserPeer::ID, $alert->getSubscriberId(), $comparison);
        } elseif ($alert instanceof PropelObjectCollection) {
            return $this
                ->useAlertQuery()
                ->filterByPrimaryKeys($alert->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlert() only accepts arguments of type Alert or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Alert relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinAlert($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Alert');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Alert');
        }

        return $this;
    }

    /**
     * Use the Alert relation Alert object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AlertQuery A secondary query class using the current class as primary query
     */
    public function useAlertQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAlert($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Alert', 'AlertQuery');
    }

    /**
     * Filter the query by a related Content object
     *
     * @param   Content|PropelObjectCollection $content  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContent($content, $comparison = null)
    {
        if ($content instanceof Content) {
            return $this
                ->addUsingAlias(UserPeer::ID, $content->getAuthorId(), $comparison);
        } elseif ($content instanceof PropelObjectCollection) {
            return $this
                ->useContentQuery()
                ->filterByPrimaryKeys($content->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByContent() only accepts arguments of type Content or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Content relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinContent($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Content');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Content');
        }

        return $this;
    }

    /**
     * Use the Content relation Content object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContentQuery A secondary query class using the current class as primary query
     */
    public function useContentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinContent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Content', 'ContentQuery');
    }

    /**
     * Filter the query by a related Comment object
     *
     * @param   Comment|PropelObjectCollection $comment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByComment($comment, $comparison = null)
    {
        if ($comment instanceof Comment) {
            return $this
                ->addUsingAlias(UserPeer::ID, $comment->getAuthorId(), $comparison);
        } elseif ($comment instanceof PropelObjectCollection) {
            return $this
                ->useCommentQuery()
                ->filterByPrimaryKeys($comment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByComment() only accepts arguments of type Comment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Comment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinComment($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Comment');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Comment');
        }

        return $this;
    }

    /**
     * Use the Comment relation Comment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CommentQuery A secondary query class using the current class as primary query
     */
    public function useCommentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinComment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Comment', 'CommentQuery');
    }

    /**
     * Filter the query by a related Report object
     *
     * @param   Report|PropelObjectCollection $report  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByReport($report, $comparison = null)
    {
        if ($report instanceof Report) {
            return $this
                ->addUsingAlias(UserPeer::ID, $report->getAuthorId(), $comparison);
        } elseif ($report instanceof PropelObjectCollection) {
            return $this
                ->useReportQuery()
                ->filterByPrimaryKeys($report->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByReport() only accepts arguments of type Report or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Report relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinReport($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Report');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Report');
        }

        return $this;
    }

    /**
     * Use the Report relation Report object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ReportQuery A secondary query class using the current class as primary query
     */
    public function useReportQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinReport($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Report', 'ReportQuery');
    }

    /**
     * Filter the query by a related Note object
     *
     * @param   Note|PropelObjectCollection $note  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByNote($note, $comparison = null)
    {
        if ($note instanceof Note) {
            return $this
                ->addUsingAlias(UserPeer::ID, $note->getUserId(), $comparison);
        } elseif ($note instanceof PropelObjectCollection) {
            return $this
                ->useNoteQuery()
                ->filterByPrimaryKeys($note->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNote() only accepts arguments of type Note or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Note relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinNote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Note');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Note');
        }

        return $this;
    }

    /**
     * Use the Note relation Note object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   NoteQuery A secondary query class using the current class as primary query
     */
    public function useNoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Note', 'NoteQuery');
    }

    /**
     * Filter the query by a related News object
     *
     * @param   News|PropelObjectCollection $news  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByNews($news, $comparison = null)
    {
        if ($news instanceof News) {
            return $this
                ->addUsingAlias(UserPeer::ID, $news->getAuthorId(), $comparison);
        } elseif ($news instanceof PropelObjectCollection) {
            return $this
                ->useNewsQuery()
                ->filterByPrimaryKeys($news->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNews() only accepts arguments of type News or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the News relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinNews($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('News');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'News');
        }

        return $this;
    }

    /**
     * Use the News relation News object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   NewsQuery A secondary query class using the current class as primary query
     */
    public function useNewsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNews($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'News', 'NewsQuery');
    }

    /**
     * Filter the query by a related Ad object
     *
     * @param   Ad|PropelObjectCollection $ad  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAd($ad, $comparison = null)
    {
        if ($ad instanceof Ad) {
            return $this
                ->addUsingAlias(UserPeer::ID, $ad->getAuthorId(), $comparison);
        } elseif ($ad instanceof PropelObjectCollection) {
            return $this
                ->useAdQuery()
                ->filterByPrimaryKeys($ad->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAd() only accepts arguments of type Ad or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ad relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinAd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ad');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Ad');
        }

        return $this;
    }

    /**
     * Use the Ad relation Ad object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AdQuery A secondary query class using the current class as primary query
     */
    public function useAdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ad', 'AdQuery');
    }

    /**
     * Filter the query by a related Transaction object
     *
     * @param   Transaction|PropelObjectCollection $transaction  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTransaction($transaction, $comparison = null)
    {
        if ($transaction instanceof Transaction) {
            return $this
                ->addUsingAlias(UserPeer::ID, $transaction->getUserId(), $comparison);
        } elseif ($transaction instanceof PropelObjectCollection) {
            return $this
                ->useTransactionQuery()
                ->filterByPrimaryKeys($transaction->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTransaction() only accepts arguments of type Transaction or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Transaction relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinTransaction($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Transaction');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Transaction');
        }

        return $this;
    }

    /**
     * Use the Transaction relation Transaction object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TransactionQuery A secondary query class using the current class as primary query
     */
    public function useTransactionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTransaction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Transaction', 'TransactionQuery');
    }

    /**
     * Filter the query by a related ForumMessage object
     *
     * @param   ForumMessage|PropelObjectCollection $forumMessage  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByForumMessage($forumMessage, $comparison = null)
    {
        if ($forumMessage instanceof ForumMessage) {
            return $this
                ->addUsingAlias(UserPeer::ID, $forumMessage->getAuthorId(), $comparison);
        } elseif ($forumMessage instanceof PropelObjectCollection) {
            return $this
                ->useForumMessageQuery()
                ->filterByPrimaryKeys($forumMessage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByForumMessage() only accepts arguments of type ForumMessage or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ForumMessage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinForumMessage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ForumMessage');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ForumMessage');
        }

        return $this;
    }

    /**
     * Use the ForumMessage relation ForumMessage object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ForumMessageQuery A secondary query class using the current class as primary query
     */
    public function useForumMessageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinForumMessage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ForumMessage', 'ForumMessageQuery');
    }

    /**
     * Filter the query by a related ScheduledCourse object
     *
     * @param   ScheduledCourse|PropelObjectCollection $scheduledCourse  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByScheduledCourse($scheduledCourse, $comparison = null)
    {
        if ($scheduledCourse instanceof ScheduledCourse) {
            return $this
                ->addUsingAlias(UserPeer::ID, $scheduledCourse->getTeacherId(), $comparison);
        } elseif ($scheduledCourse instanceof PropelObjectCollection) {
            return $this
                ->useScheduledCourseQuery()
                ->filterByPrimaryKeys($scheduledCourse->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByScheduledCourse() only accepts arguments of type ScheduledCourse or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ScheduledCourse relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinScheduledCourse($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ScheduledCourse');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ScheduledCourse');
        }

        return $this;
    }

    /**
     * Use the ScheduledCourse relation ScheduledCourse object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ScheduledCourseQuery A secondary query class using the current class as primary query
     */
    public function useScheduledCourseQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinScheduledCourse($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ScheduledCourse', 'ScheduledCourseQuery');
    }

    /**
     * Filter the query by a related Cursus object
     * using the users_cursus table as cross reference
     *
     * @param   Cursus $cursus the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     */
    public function filterByCursus($cursus, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useUsersCursusQuery()
            ->filterByCursus($cursus, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related Newsletter object
     * using the newsletters_subscribers table as cross reference
     *
     * @param   Newsletter $newsletter the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserQuery The current query, for fluid interface
     */
    public function filterByNewsletter($newsletter, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useNewslettersSubscribersQuery()
            ->filterByNewsletter($newsletter, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   User $user Object to remove from the list of results
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function prune($user = null)
    {
        if ($user) {
            $this->addUsingAlias(UserPeer::ID, $user->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
