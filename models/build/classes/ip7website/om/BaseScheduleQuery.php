<?php


/**
 * Base class that represents a query for the 'schedules' table.
 *
 * 
 *
 * @method     ScheduleQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ScheduleQuery orderByCursusId($order = Criteria::ASC) Order by the cursus_id column
 * @method     ScheduleQuery orderByPathId($order = Criteria::ASC) Order by the path_id column
 * @method     ScheduleQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ScheduleQuery orderByBeginning($order = Criteria::ASC) Order by the beginning column
 * @method     ScheduleQuery orderByEnd($order = Criteria::ASC) Order by the end column
 *
 * @method     ScheduleQuery groupById() Group by the id column
 * @method     ScheduleQuery groupByCursusId() Group by the cursus_id column
 * @method     ScheduleQuery groupByPathId() Group by the path_id column
 * @method     ScheduleQuery groupByName() Group by the name column
 * @method     ScheduleQuery groupByBeginning() Group by the beginning column
 * @method     ScheduleQuery groupByEnd() Group by the end column
 *
 * @method     ScheduleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ScheduleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ScheduleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ScheduleQuery leftJoinCursus($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cursus relation
 * @method     ScheduleQuery rightJoinCursus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cursus relation
 * @method     ScheduleQuery innerJoinCursus($relationAlias = null) Adds a INNER JOIN clause to the query using the Cursus relation
 *
 * @method     ScheduleQuery leftJoinEducationalPath($relationAlias = null) Adds a LEFT JOIN clause to the query using the EducationalPath relation
 * @method     ScheduleQuery rightJoinEducationalPath($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EducationalPath relation
 * @method     ScheduleQuery innerJoinEducationalPath($relationAlias = null) Adds a INNER JOIN clause to the query using the EducationalPath relation
 *
 * @method     ScheduleQuery leftJoinSchedulesCourses($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchedulesCourses relation
 * @method     ScheduleQuery rightJoinSchedulesCourses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchedulesCourses relation
 * @method     ScheduleQuery innerJoinSchedulesCourses($relationAlias = null) Adds a INNER JOIN clause to the query using the SchedulesCourses relation
 *
 * @method     Schedule findOne(PropelPDO $con = null) Return the first Schedule matching the query
 * @method     Schedule findOneOrCreate(PropelPDO $con = null) Return the first Schedule matching the query, or a new Schedule object populated from the query conditions when no match is found
 *
 * @method     Schedule findOneById(int $id) Return the first Schedule filtered by the id column
 * @method     Schedule findOneByCursusId(int $cursus_id) Return the first Schedule filtered by the cursus_id column
 * @method     Schedule findOneByPathId(int $path_id) Return the first Schedule filtered by the path_id column
 * @method     Schedule findOneByName(string $name) Return the first Schedule filtered by the name column
 * @method     Schedule findOneByBeginning(string $beginning) Return the first Schedule filtered by the beginning column
 * @method     Schedule findOneByEnd(string $end) Return the first Schedule filtered by the end column
 *
 * @method     array findById(int $id) Return Schedule objects filtered by the id column
 * @method     array findByCursusId(int $cursus_id) Return Schedule objects filtered by the cursus_id column
 * @method     array findByPathId(int $path_id) Return Schedule objects filtered by the path_id column
 * @method     array findByName(string $name) Return Schedule objects filtered by the name column
 * @method     array findByBeginning(string $beginning) Return Schedule objects filtered by the beginning column
 * @method     array findByEnd(string $end) Return Schedule objects filtered by the end column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseScheduleQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseScheduleQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'Schedule', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ScheduleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ScheduleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ScheduleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ScheduleQuery) {
            return $criteria;
        }
        $query = new ScheduleQuery();
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
     * @return   Schedule|Schedule[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SchedulePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SchedulePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Schedule A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `CURSUS_ID`, `PATH_ID`, `NAME`, `BEGINNING`, `END` FROM `schedules` WHERE `ID` = :p0';
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
            $obj = new Schedule();
            $obj->hydrate($row);
            SchedulePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Schedule|Schedule[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Schedule[]|mixed the list of results, formatted by the current formatter
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
     * @return ScheduleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SchedulePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ScheduleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SchedulePeer::ID, $keys, Criteria::IN);
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
     * @return ScheduleQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(SchedulePeer::ID, $id, $comparison);
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
     * @return ScheduleQuery The current query, for fluid interface
     */
    public function filterByCursusId($cursusId = null, $comparison = null)
    {
        if (is_array($cursusId)) {
            $useMinMax = false;
            if (isset($cursusId['min'])) {
                $this->addUsingAlias(SchedulePeer::CURSUS_ID, $cursusId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cursusId['max'])) {
                $this->addUsingAlias(SchedulePeer::CURSUS_ID, $cursusId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchedulePeer::CURSUS_ID, $cursusId, $comparison);
    }

    /**
     * Filter the query on the path_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPathId(1234); // WHERE path_id = 1234
     * $query->filterByPathId(array(12, 34)); // WHERE path_id IN (12, 34)
     * $query->filterByPathId(array('min' => 12)); // WHERE path_id > 12
     * </code>
     *
     * @see       filterByEducationalPath()
     *
     * @param     mixed $pathId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ScheduleQuery The current query, for fluid interface
     */
    public function filterByPathId($pathId = null, $comparison = null)
    {
        if (is_array($pathId)) {
            $useMinMax = false;
            if (isset($pathId['min'])) {
                $this->addUsingAlias(SchedulePeer::PATH_ID, $pathId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pathId['max'])) {
                $this->addUsingAlias(SchedulePeer::PATH_ID, $pathId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchedulePeer::PATH_ID, $pathId, $comparison);
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
     * @return ScheduleQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SchedulePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the beginning column
     *
     * Example usage:
     * <code>
     * $query->filterByBeginning('2011-03-14'); // WHERE beginning = '2011-03-14'
     * $query->filterByBeginning('now'); // WHERE beginning = '2011-03-14'
     * $query->filterByBeginning(array('max' => 'yesterday')); // WHERE beginning > '2011-03-13'
     * </code>
     *
     * @param     mixed $beginning The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ScheduleQuery The current query, for fluid interface
     */
    public function filterByBeginning($beginning = null, $comparison = null)
    {
        if (is_array($beginning)) {
            $useMinMax = false;
            if (isset($beginning['min'])) {
                $this->addUsingAlias(SchedulePeer::BEGINNING, $beginning['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($beginning['max'])) {
                $this->addUsingAlias(SchedulePeer::BEGINNING, $beginning['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchedulePeer::BEGINNING, $beginning, $comparison);
    }

    /**
     * Filter the query on the end column
     *
     * Example usage:
     * <code>
     * $query->filterByEnd('2011-03-14'); // WHERE end = '2011-03-14'
     * $query->filterByEnd('now'); // WHERE end = '2011-03-14'
     * $query->filterByEnd(array('max' => 'yesterday')); // WHERE end > '2011-03-13'
     * </code>
     *
     * @param     mixed $end The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ScheduleQuery The current query, for fluid interface
     */
    public function filterByEnd($end = null, $comparison = null)
    {
        if (is_array($end)) {
            $useMinMax = false;
            if (isset($end['min'])) {
                $this->addUsingAlias(SchedulePeer::END, $end['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($end['max'])) {
                $this->addUsingAlias(SchedulePeer::END, $end['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SchedulePeer::END, $end, $comparison);
    }

    /**
     * Filter the query by a related Cursus object
     *
     * @param   Cursus|PropelObjectCollection $cursus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ScheduleQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCursus($cursus, $comparison = null)
    {
        if ($cursus instanceof Cursus) {
            return $this
                ->addUsingAlias(SchedulePeer::CURSUS_ID, $cursus->getId(), $comparison);
        } elseif ($cursus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchedulePeer::CURSUS_ID, $cursus->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ScheduleQuery The current query, for fluid interface
     */
    public function joinCursus($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useCursusQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCursus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cursus', 'CursusQuery');
    }

    /**
     * Filter the query by a related EducationalPath object
     *
     * @param   EducationalPath|PropelObjectCollection $educationalPath The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ScheduleQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEducationalPath($educationalPath, $comparison = null)
    {
        if ($educationalPath instanceof EducationalPath) {
            return $this
                ->addUsingAlias(SchedulePeer::PATH_ID, $educationalPath->getId(), $comparison);
        } elseif ($educationalPath instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchedulePeer::PATH_ID, $educationalPath->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByEducationalPath() only accepts arguments of type EducationalPath or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EducationalPath relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ScheduleQuery The current query, for fluid interface
     */
    public function joinEducationalPath($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EducationalPath');

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
            $this->addJoinObject($join, 'EducationalPath');
        }

        return $this;
    }

    /**
     * Use the EducationalPath relation EducationalPath object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EducationalPathQuery A secondary query class using the current class as primary query
     */
    public function useEducationalPathQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEducationalPath($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EducationalPath', 'EducationalPathQuery');
    }

    /**
     * Filter the query by a related SchedulesCourses object
     *
     * @param   SchedulesCourses|PropelObjectCollection $schedulesCourses  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ScheduleQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySchedulesCourses($schedulesCourses, $comparison = null)
    {
        if ($schedulesCourses instanceof SchedulesCourses) {
            return $this
                ->addUsingAlias(SchedulePeer::ID, $schedulesCourses->getScheduleId(), $comparison);
        } elseif ($schedulesCourses instanceof PropelObjectCollection) {
            return $this
                ->useSchedulesCoursesQuery()
                ->filterByPrimaryKeys($schedulesCourses->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySchedulesCourses() only accepts arguments of type SchedulesCourses or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SchedulesCourses relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ScheduleQuery The current query, for fluid interface
     */
    public function joinSchedulesCourses($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SchedulesCourses');

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
            $this->addJoinObject($join, 'SchedulesCourses');
        }

        return $this;
    }

    /**
     * Use the SchedulesCourses relation SchedulesCourses object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SchedulesCoursesQuery A secondary query class using the current class as primary query
     */
    public function useSchedulesCoursesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSchedulesCourses($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SchedulesCourses', 'SchedulesCoursesQuery');
    }

    /**
     * Filter the query by a related ScheduledCourse object
     * using the schedules_courses table as cross reference
     *
     * @param   ScheduledCourse $scheduledCourse the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ScheduleQuery The current query, for fluid interface
     */
    public function filterByScheduledCourse($scheduledCourse, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useSchedulesCoursesQuery()
            ->filterByScheduledCourse($scheduledCourse, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   Schedule $schedule Object to remove from the list of results
     *
     * @return ScheduleQuery The current query, for fluid interface
     */
    public function prune($schedule = null)
    {
        if ($schedule) {
            $this->addUsingAlias(SchedulePeer::ID, $schedule->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseScheduleQuery