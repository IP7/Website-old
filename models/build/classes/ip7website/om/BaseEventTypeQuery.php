<?php


/**
 * Base class that represents a query for the 'events_types' table.
 *
 *
 *
 * @method EventTypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EventTypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method EventTypeQuery orderByShortName($order = Criteria::ASC) Order by the short_name column
 * @method EventTypeQuery orderByAccessRights($order = Criteria::ASC) Order by the access_rights column
 *
 * @method EventTypeQuery groupById() Group by the id column
 * @method EventTypeQuery groupByName() Group by the name column
 * @method EventTypeQuery groupByShortName() Group by the short_name column
 * @method EventTypeQuery groupByAccessRights() Group by the access_rights column
 *
 * @method EventTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EventTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EventTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EventType findOne(PropelPDO $con = null) Return the first EventType matching the query
 * @method EventType findOneOrCreate(PropelPDO $con = null) Return the first EventType matching the query, or a new EventType object populated from the query conditions when no match is found
 *
 * @method EventType findOneByName(string $name) Return the first EventType filtered by the name column
 * @method EventType findOneByShortName(string $short_name) Return the first EventType filtered by the short_name column
 * @method EventType findOneByAccessRights(int $access_rights) Return the first EventType filtered by the access_rights column
 *
 * @method array findById(int $id) Return EventType objects filtered by the id column
 * @method array findByName(string $name) Return EventType objects filtered by the name column
 * @method array findByShortName(string $short_name) Return EventType objects filtered by the short_name column
 * @method array findByAccessRights(int $access_rights) Return EventType objects filtered by the access_rights column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseEventTypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEventTypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'EventType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EventTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EventTypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EventTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EventTypeQuery) {
            return $criteria;
        }
        $query = new EventTypeQuery();
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
     * @return   EventType|EventType[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventTypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EventTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 EventType A model object, or null if the key is not found
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
     * @return                 EventType A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `name`, `short_name`, `access_rights` FROM `events_types` WHERE `id` = :p0';
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
            $obj = new EventType();
            $obj->hydrate($row);
            EventTypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return EventType|EventType[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EventType[]|mixed the list of results, formatted by the current formatter
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
     * @return EventTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EventTypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EventTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EventTypePeer::ID, $keys, Criteria::IN);
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
     * @return EventTypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EventTypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EventTypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventTypePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventTypeQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventTypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the short_name column
     *
     * Example usage:
     * <code>
     * $query->filterByShortName('fooValue');   // WHERE short_name = 'fooValue'
     * $query->filterByShortName('%fooValue%'); // WHERE short_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shortName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventTypeQuery The current query, for fluid interface
     */
    public function filterByShortName($shortName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shortName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shortName)) {
                $shortName = str_replace('*', '%', $shortName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventTypePeer::SHORT_NAME, $shortName, $comparison);
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
     * @return EventTypeQuery The current query, for fluid interface
     */
    public function filterByAccessRights($accessRights = null, $comparison = null)
    {
        if (is_array($accessRights)) {
            $useMinMax = false;
            if (isset($accessRights['min'])) {
                $this->addUsingAlias(EventTypePeer::ACCESS_RIGHTS, $accessRights['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accessRights['max'])) {
                $this->addUsingAlias(EventTypePeer::ACCESS_RIGHTS, $accessRights['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventTypePeer::ACCESS_RIGHTS, $accessRights, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   EventType $eventType Object to remove from the list of results
     *
     * @return EventTypeQuery The current query, for fluid interface
     */
    public function prune($eventType = null)
    {
        if ($eventType) {
            $this->addUsingAlias(EventTypePeer::ID, $eventType->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
