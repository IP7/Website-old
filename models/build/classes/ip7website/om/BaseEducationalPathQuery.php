<?php


/**
 * Base class that represents a query for the 'educational_paths' table.
 *
 *
 *
 * @method EducationalPathQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EducationalPathQuery orderByShortName($order = Criteria::ASC) Order by the short_name column
 * @method EducationalPathQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method EducationalPathQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method EducationalPathQuery orderByCursusId($order = Criteria::ASC) Order by the cursus_id column
 * @method EducationalPathQuery orderByResponsableId($order = Criteria::ASC) Order by the responsable_id column
 *
 * @method EducationalPathQuery groupById() Group by the id column
 * @method EducationalPathQuery groupByShortName() Group by the short_name column
 * @method EducationalPathQuery groupByName() Group by the name column
 * @method EducationalPathQuery groupByDescription() Group by the description column
 * @method EducationalPathQuery groupByCursusId() Group by the cursus_id column
 * @method EducationalPathQuery groupByResponsableId() Group by the responsable_id column
 *
 * @method EducationalPathQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EducationalPathQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EducationalPathQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EducationalPathQuery leftJoinCursus($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cursus relation
 * @method EducationalPathQuery rightJoinCursus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cursus relation
 * @method EducationalPathQuery innerJoinCursus($relationAlias = null) Adds a INNER JOIN clause to the query using the Cursus relation
 *
 * @method EducationalPathQuery leftJoinResponsable($relationAlias = null) Adds a LEFT JOIN clause to the query using the Responsable relation
 * @method EducationalPathQuery rightJoinResponsable($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Responsable relation
 * @method EducationalPathQuery innerJoinResponsable($relationAlias = null) Adds a INNER JOIN clause to the query using the Responsable relation
 *
 * @method EducationalPathQuery leftJoinUsersPaths($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsersPaths relation
 * @method EducationalPathQuery rightJoinUsersPaths($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsersPaths relation
 * @method EducationalPathQuery innerJoinUsersPaths($relationAlias = null) Adds a INNER JOIN clause to the query using the UsersPaths relation
 *
 * @method EducationalPathQuery leftJoinEducationalPathsOptionalCourses($relationAlias = null) Adds a LEFT JOIN clause to the query using the EducationalPathsOptionalCourses relation
 * @method EducationalPathQuery rightJoinEducationalPathsOptionalCourses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EducationalPathsOptionalCourses relation
 * @method EducationalPathQuery innerJoinEducationalPathsOptionalCourses($relationAlias = null) Adds a INNER JOIN clause to the query using the EducationalPathsOptionalCourses relation
 *
 * @method EducationalPathQuery leftJoinEducationalPathsMandatoryCourses($relationAlias = null) Adds a LEFT JOIN clause to the query using the EducationalPathsMandatoryCourses relation
 * @method EducationalPathQuery rightJoinEducationalPathsMandatoryCourses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EducationalPathsMandatoryCourses relation
 * @method EducationalPathQuery innerJoinEducationalPathsMandatoryCourses($relationAlias = null) Adds a INNER JOIN clause to the query using the EducationalPathsMandatoryCourses relation
 *
 * @method EducationalPath findOne(PropelPDO $con = null) Return the first EducationalPath matching the query
 * @method EducationalPath findOneOrCreate(PropelPDO $con = null) Return the first EducationalPath matching the query, or a new EducationalPath object populated from the query conditions when no match is found
 *
 * @method EducationalPath findOneById(int $id) Return the first EducationalPath filtered by the id column
 * @method EducationalPath findOneByShortName(string $short_name) Return the first EducationalPath filtered by the short_name column
 * @method EducationalPath findOneByName(string $name) Return the first EducationalPath filtered by the name column
 * @method EducationalPath findOneByDescription(string $description) Return the first EducationalPath filtered by the description column
 * @method EducationalPath findOneByCursusId(int $cursus_id) Return the first EducationalPath filtered by the cursus_id column
 * @method EducationalPath findOneByResponsableId(int $responsable_id) Return the first EducationalPath filtered by the responsable_id column
 *
 * @method array findById(int $id) Return EducationalPath objects filtered by the id column
 * @method array findByShortName(string $short_name) Return EducationalPath objects filtered by the short_name column
 * @method array findByName(string $name) Return EducationalPath objects filtered by the name column
 * @method array findByDescription(string $description) Return EducationalPath objects filtered by the description column
 * @method array findByCursusId(int $cursus_id) Return EducationalPath objects filtered by the cursus_id column
 * @method array findByResponsableId(int $responsable_id) Return EducationalPath objects filtered by the responsable_id column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseEducationalPathQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEducationalPathQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'EducationalPath', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EducationalPathQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     EducationalPathQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EducationalPathQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EducationalPathQuery) {
            return $criteria;
        }
        $query = new EducationalPathQuery();
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
     * @return   EducationalPath|EducationalPath[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EducationalPathPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EducationalPathPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   EducationalPath A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `SHORT_NAME`, `NAME`, `CURSUS_ID`, `RESPONSABLE_ID` FROM `educational_paths` WHERE `ID` = :p0';
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
            $obj = new EducationalPath();
            $obj->hydrate($row);
            EducationalPathPeer::addInstanceToPool($obj, (string) $key);
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
     * @return EducationalPath|EducationalPath[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EducationalPath[]|mixed the list of results, formatted by the current formatter
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
     * @return EducationalPathQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EducationalPathPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EducationalPathQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EducationalPathPeer::ID, $keys, Criteria::IN);
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
     * @return EducationalPathQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(EducationalPathPeer::ID, $id, $comparison);
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
     * @return EducationalPathQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EducationalPathPeer::SHORT_NAME, $shortName, $comparison);
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
     * @return EducationalPathQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EducationalPathPeer::NAME, $name, $comparison);
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
     * @return EducationalPathQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EducationalPathPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the cursus_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCursusId(1234); // WHERE cursus_id = 1234
     * $query->filterByCursusId(array(12, 34)); // WHERE cursus_id IN (12, 34)
     * $query->filterByCursusId(array('min' => 12)); // WHERE cursus_id > 12
     * </code>
     *
     * @see       filterByCursus()
     *
     * @param     mixed $cursusId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EducationalPathQuery The current query, for fluid interface
     */
    public function filterByCursusId($cursusId = null, $comparison = null)
    {
        if (is_array($cursusId)) {
            $useMinMax = false;
            if (isset($cursusId['min'])) {
                $this->addUsingAlias(EducationalPathPeer::CURSUS_ID, $cursusId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cursusId['max'])) {
                $this->addUsingAlias(EducationalPathPeer::CURSUS_ID, $cursusId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EducationalPathPeer::CURSUS_ID, $cursusId, $comparison);
    }

    /**
     * Filter the query on the responsable_id column
     *
     * Example usage:
     * <code>
     * $query->filterByResponsableId(1234); // WHERE responsable_id = 1234
     * $query->filterByResponsableId(array(12, 34)); // WHERE responsable_id IN (12, 34)
     * $query->filterByResponsableId(array('min' => 12)); // WHERE responsable_id > 12
     * </code>
     *
     * @see       filterByResponsable()
     *
     * @param     mixed $responsableId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EducationalPathQuery The current query, for fluid interface
     */
    public function filterByResponsableId($responsableId = null, $comparison = null)
    {
        if (is_array($responsableId)) {
            $useMinMax = false;
            if (isset($responsableId['min'])) {
                $this->addUsingAlias(EducationalPathPeer::RESPONSABLE_ID, $responsableId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($responsableId['max'])) {
                $this->addUsingAlias(EducationalPathPeer::RESPONSABLE_ID, $responsableId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EducationalPathPeer::RESPONSABLE_ID, $responsableId, $comparison);
    }

    /**
     * Filter the query by a related Cursus object
     *
     * @param   Cursus|PropelObjectCollection $cursus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EducationalPathQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCursus($cursus, $comparison = null)
    {
        if ($cursus instanceof Cursus) {
            return $this
                ->addUsingAlias(EducationalPathPeer::CURSUS_ID, $cursus->getId(), $comparison);
        } elseif ($cursus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EducationalPathPeer::CURSUS_ID, $cursus->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCursus() only accepts arguments of type Cursus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cursus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EducationalPathQuery The current query, for fluid interface
     */
    public function joinCursus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cursus');

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
            $this->addJoinObject($join, 'Cursus');
        }

        return $this;
    }

    /**
     * Use the Cursus relation Cursus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CursusQuery A secondary query class using the current class as primary query
     */
    public function useCursusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCursus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cursus', 'CursusQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EducationalPathQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByResponsable($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(EducationalPathPeer::RESPONSABLE_ID, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EducationalPathPeer::RESPONSABLE_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByResponsable() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Responsable relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EducationalPathQuery The current query, for fluid interface
     */
    public function joinResponsable($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Responsable');

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
            $this->addJoinObject($join, 'Responsable');
        }

        return $this;
    }

    /**
     * Use the Responsable relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserQuery A secondary query class using the current class as primary query
     */
    public function useResponsableQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinResponsable($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Responsable', 'UserQuery');
    }

    /**
     * Filter the query by a related UsersPaths object
     *
     * @param   UsersPaths|PropelObjectCollection $usersPaths  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EducationalPathQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByUsersPaths($usersPaths, $comparison = null)
    {
        if ($usersPaths instanceof UsersPaths) {
            return $this
                ->addUsingAlias(EducationalPathPeer::ID, $usersPaths->getPathId(), $comparison);
        } elseif ($usersPaths instanceof PropelObjectCollection) {
            return $this
                ->useUsersPathsQuery()
                ->filterByPrimaryKeys($usersPaths->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUsersPaths() only accepts arguments of type UsersPaths or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsersPaths relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EducationalPathQuery The current query, for fluid interface
     */
    public function joinUsersPaths($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsersPaths');

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
            $this->addJoinObject($join, 'UsersPaths');
        }

        return $this;
    }

    /**
     * Use the UsersPaths relation UsersPaths object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UsersPathsQuery A secondary query class using the current class as primary query
     */
    public function useUsersPathsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsersPaths($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsersPaths', 'UsersPathsQuery');
    }

    /**
     * Filter the query by a related EducationalPathsOptionalCourses object
     *
     * @param   EducationalPathsOptionalCourses|PropelObjectCollection $educationalPathsOptionalCourses  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EducationalPathQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEducationalPathsOptionalCourses($educationalPathsOptionalCourses, $comparison = null)
    {
        if ($educationalPathsOptionalCourses instanceof EducationalPathsOptionalCourses) {
            return $this
                ->addUsingAlias(EducationalPathPeer::ID, $educationalPathsOptionalCourses->getPathId(), $comparison);
        } elseif ($educationalPathsOptionalCourses instanceof PropelObjectCollection) {
            return $this
                ->useEducationalPathsOptionalCoursesQuery()
                ->filterByPrimaryKeys($educationalPathsOptionalCourses->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEducationalPathsOptionalCourses() only accepts arguments of type EducationalPathsOptionalCourses or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EducationalPathsOptionalCourses relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EducationalPathQuery The current query, for fluid interface
     */
    public function joinEducationalPathsOptionalCourses($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EducationalPathsOptionalCourses');

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
            $this->addJoinObject($join, 'EducationalPathsOptionalCourses');
        }

        return $this;
    }

    /**
     * Use the EducationalPathsOptionalCourses relation EducationalPathsOptionalCourses object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EducationalPathsOptionalCoursesQuery A secondary query class using the current class as primary query
     */
    public function useEducationalPathsOptionalCoursesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEducationalPathsOptionalCourses($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EducationalPathsOptionalCourses', 'EducationalPathsOptionalCoursesQuery');
    }

    /**
     * Filter the query by a related EducationalPathsMandatoryCourses object
     *
     * @param   EducationalPathsMandatoryCourses|PropelObjectCollection $educationalPathsMandatoryCourses  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EducationalPathQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEducationalPathsMandatoryCourses($educationalPathsMandatoryCourses, $comparison = null)
    {
        if ($educationalPathsMandatoryCourses instanceof EducationalPathsMandatoryCourses) {
            return $this
                ->addUsingAlias(EducationalPathPeer::ID, $educationalPathsMandatoryCourses->getPathId(), $comparison);
        } elseif ($educationalPathsMandatoryCourses instanceof PropelObjectCollection) {
            return $this
                ->useEducationalPathsMandatoryCoursesQuery()
                ->filterByPrimaryKeys($educationalPathsMandatoryCourses->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEducationalPathsMandatoryCourses() only accepts arguments of type EducationalPathsMandatoryCourses or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EducationalPathsMandatoryCourses relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EducationalPathQuery The current query, for fluid interface
     */
    public function joinEducationalPathsMandatoryCourses($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EducationalPathsMandatoryCourses');

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
            $this->addJoinObject($join, 'EducationalPathsMandatoryCourses');
        }

        return $this;
    }

    /**
     * Use the EducationalPathsMandatoryCourses relation EducationalPathsMandatoryCourses object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EducationalPathsMandatoryCoursesQuery A secondary query class using the current class as primary query
     */
    public function useEducationalPathsMandatoryCoursesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEducationalPathsMandatoryCourses($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EducationalPathsMandatoryCourses', 'EducationalPathsMandatoryCoursesQuery');
    }

    /**
     * Filter the query by a related User object
     * using the users_paths table as cross reference
     *
     * @param   User $user the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EducationalPathQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useUsersPathsQuery()
            ->filterByUser($user, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related Course object
     * using the educational_paths_optional_courses table as cross reference
     *
     * @param   Course $course the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EducationalPathQuery The current query, for fluid interface
     */
    public function filterByOptionalCourse($course, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useEducationalPathsOptionalCoursesQuery()
            ->filterByOptionalCourse($course, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related Course object
     * using the educational_paths_mandatory_courses table as cross reference
     *
     * @param   Course $course the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EducationalPathQuery The current query, for fluid interface
     */
    public function filterByMandatoryCourse($course, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useEducationalPathsMandatoryCoursesQuery()
            ->filterByMandatoryCourse($course, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   EducationalPath $educationalPath Object to remove from the list of results
     *
     * @return EducationalPathQuery The current query, for fluid interface
     */
    public function prune($educationalPath = null)
    {
        if ($educationalPath) {
            $this->addUsingAlias(EducationalPathPeer::ID, $educationalPath->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
