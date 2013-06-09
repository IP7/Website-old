<?php


/**
 * Base class that represents a query for the 'files_archives' table.
 *
 *
 *
 * @method FilesArchiveQuery orderById($order = Criteria::ASC) Order by the id column
 * @method FilesArchiveQuery orderByFilesIds($order = Criteria::ASC) Order by the files_ids column
 * @method FilesArchiveQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method FilesArchiveQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method FilesArchiveQuery orderByPath($order = Criteria::ASC) Order by the path column
 * @method FilesArchiveQuery orderByAccessRights($order = Criteria::ASC) Order by the access_rights column
 * @method FilesArchiveQuery orderByDownloadsCount($order = Criteria::ASC) Order by the downloads_count column
 * @method FilesArchiveQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 *
 * @method FilesArchiveQuery groupById() Group by the id column
 * @method FilesArchiveQuery groupByFilesIds() Group by the files_ids column
 * @method FilesArchiveQuery groupByTitle() Group by the title column
 * @method FilesArchiveQuery groupByDate() Group by the date column
 * @method FilesArchiveQuery groupByPath() Group by the path column
 * @method FilesArchiveQuery groupByAccessRights() Group by the access_rights column
 * @method FilesArchiveQuery groupByDownloadsCount() Group by the downloads_count column
 * @method FilesArchiveQuery groupByDeleted() Group by the deleted column
 *
 * @method FilesArchiveQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method FilesArchiveQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method FilesArchiveQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method FilesArchive findOne(PropelPDO $con = null) Return the first FilesArchive matching the query
 * @method FilesArchive findOneOrCreate(PropelPDO $con = null) Return the first FilesArchive matching the query, or a new FilesArchive object populated from the query conditions when no match is found
 *
 * @method FilesArchive findOneByFilesIds(string $files_ids) Return the first FilesArchive filtered by the files_ids column
 * @method FilesArchive findOneByTitle(string $title) Return the first FilesArchive filtered by the title column
 * @method FilesArchive findOneByDate(string $date) Return the first FilesArchive filtered by the date column
 * @method FilesArchive findOneByPath(string $path) Return the first FilesArchive filtered by the path column
 * @method FilesArchive findOneByAccessRights(int $access_rights) Return the first FilesArchive filtered by the access_rights column
 * @method FilesArchive findOneByDownloadsCount(int $downloads_count) Return the first FilesArchive filtered by the downloads_count column
 * @method FilesArchive findOneByDeleted(boolean $deleted) Return the first FilesArchive filtered by the deleted column
 *
 * @method array findById(int $id) Return FilesArchive objects filtered by the id column
 * @method array findByFilesIds(string $files_ids) Return FilesArchive objects filtered by the files_ids column
 * @method array findByTitle(string $title) Return FilesArchive objects filtered by the title column
 * @method array findByDate(string $date) Return FilesArchive objects filtered by the date column
 * @method array findByPath(string $path) Return FilesArchive objects filtered by the path column
 * @method array findByAccessRights(int $access_rights) Return FilesArchive objects filtered by the access_rights column
 * @method array findByDownloadsCount(int $downloads_count) Return FilesArchive objects filtered by the downloads_count column
 * @method array findByDeleted(boolean $deleted) Return FilesArchive objects filtered by the deleted column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseFilesArchiveQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseFilesArchiveQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'FilesArchive', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new FilesArchiveQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   FilesArchiveQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return FilesArchiveQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof FilesArchiveQuery) {
            return $criteria;
        }
        $query = new FilesArchiveQuery();
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
     * @return   FilesArchive|FilesArchive[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FilesArchivePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(FilesArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 FilesArchive A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 FilesArchive A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `files_ids`, `title`, `date`, `path`, `access_rights`, `downloads_count`, `deleted` FROM `files_archives` WHERE `id` = :p0';
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
            $obj = new FilesArchive();
            $obj->hydrate($row);
            FilesArchivePeer::addInstanceToPool($obj, (string) $key);
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
     * @return FilesArchive|FilesArchive[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|FilesArchive[]|mixed the list of results, formatted by the current formatter
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
     * @return FilesArchiveQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FilesArchivePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return FilesArchiveQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FilesArchivePeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FilesArchiveQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(FilesArchivePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(FilesArchivePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FilesArchivePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the files_ids column
     *
     * Example usage:
     * <code>
     * $query->filterByFilesIds('fooValue');   // WHERE files_ids = 'fooValue'
     * $query->filterByFilesIds('%fooValue%'); // WHERE files_ids LIKE '%fooValue%'
     * </code>
     *
     * @param     string $filesIds The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FilesArchiveQuery The current query, for fluid interface
     */
    public function filterByFilesIds($filesIds = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filesIds)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $filesIds)) {
                $filesIds = str_replace('*', '%', $filesIds);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FilesArchivePeer::FILES_IDS, $filesIds, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FilesArchiveQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FilesArchivePeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FilesArchiveQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(FilesArchivePeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(FilesArchivePeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FilesArchivePeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the path column
     *
     * Example usage:
     * <code>
     * $query->filterByPath('fooValue');   // WHERE path = 'fooValue'
     * $query->filterByPath('%fooValue%'); // WHERE path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $path The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FilesArchiveQuery The current query, for fluid interface
     */
    public function filterByPath($path = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($path)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $path)) {
                $path = str_replace('*', '%', $path);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FilesArchivePeer::PATH, $path, $comparison);
    }

    /**
     * Filter the query on the access_rights column
     *
     * Example usage:
     * <code>
     * $query->filterByAccessRights(1234); // WHERE access_rights = 1234
     * $query->filterByAccessRights(array(12, 34)); // WHERE access_rights IN (12, 34)
     * $query->filterByAccessRights(array('min' => 12)); // WHERE access_rights >= 12
     * $query->filterByAccessRights(array('max' => 12)); // WHERE access_rights <= 12
     * </code>
     *
     * @param     mixed $accessRights The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FilesArchiveQuery The current query, for fluid interface
     */
    public function filterByAccessRights($accessRights = null, $comparison = null)
    {
        if (is_array($accessRights)) {
            $useMinMax = false;
            if (isset($accessRights['min'])) {
                $this->addUsingAlias(FilesArchivePeer::ACCESS_RIGHTS, $accessRights['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accessRights['max'])) {
                $this->addUsingAlias(FilesArchivePeer::ACCESS_RIGHTS, $accessRights['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FilesArchivePeer::ACCESS_RIGHTS, $accessRights, $comparison);
    }

    /**
     * Filter the query on the downloads_count column
     *
     * Example usage:
     * <code>
     * $query->filterByDownloadsCount(1234); // WHERE downloads_count = 1234
     * $query->filterByDownloadsCount(array(12, 34)); // WHERE downloads_count IN (12, 34)
     * $query->filterByDownloadsCount(array('min' => 12)); // WHERE downloads_count >= 12
     * $query->filterByDownloadsCount(array('max' => 12)); // WHERE downloads_count <= 12
     * </code>
     *
     * @param     mixed $downloadsCount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FilesArchiveQuery The current query, for fluid interface
     */
    public function filterByDownloadsCount($downloadsCount = null, $comparison = null)
    {
        if (is_array($downloadsCount)) {
            $useMinMax = false;
            if (isset($downloadsCount['min'])) {
                $this->addUsingAlias(FilesArchivePeer::DOWNLOADS_COUNT, $downloadsCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($downloadsCount['max'])) {
                $this->addUsingAlias(FilesArchivePeer::DOWNLOADS_COUNT, $downloadsCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FilesArchivePeer::DOWNLOADS_COUNT, $downloadsCount, $comparison);
    }

    /**
     * Filter the query on the deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByDeleted(true); // WHERE deleted = true
     * $query->filterByDeleted('yes'); // WHERE deleted = true
     * </code>
     *
     * @param     boolean|string $deleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FilesArchiveQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FilesArchivePeer::DELETED, $deleted, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   FilesArchive $filesArchive Object to remove from the list of results
     *
     * @return FilesArchiveQuery The current query, for fluid interface
     */
    public function prune($filesArchive = null)
    {
        if ($filesArchive) {
            $this->addUsingAlias(FilesArchivePeer::ID, $filesArchive->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
