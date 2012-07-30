<?php


/**
 * Base class that represents a query for the 'schedules_courses' table.
 *
 * 
 *
 * @method     SchedulesCoursesQuery orderByScheduleId($order = Criteria::ASC) Order by the schedule_id column
 * @method     SchedulesCoursesQuery orderByScheduledCourseId($order = Criteria::ASC) Order by the scheduled_course_id column
 *
 * @method     SchedulesCoursesQuery groupByScheduleId() Group by the schedule_id column
 * @method     SchedulesCoursesQuery groupByScheduledCourseId() Group by the scheduled_course_id column
 *
 * @method     SchedulesCoursesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SchedulesCoursesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SchedulesCoursesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SchedulesCoursesQuery leftJoinSchedule($relationAlias = null) Adds a LEFT JOIN clause to the query using the Schedule relation
 * @method     SchedulesCoursesQuery rightJoinSchedule($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Schedule relation
 * @method     SchedulesCoursesQuery innerJoinSchedule($relationAlias = null) Adds a INNER JOIN clause to the query using the Schedule relation
 *
 * @method     SchedulesCoursesQuery leftJoinScheduledCourse($relationAlias = null) Adds a LEFT JOIN clause to the query using the ScheduledCourse relation
 * @method     SchedulesCoursesQuery rightJoinScheduledCourse($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ScheduledCourse relation
 * @method     SchedulesCoursesQuery innerJoinScheduledCourse($relationAlias = null) Adds a INNER JOIN clause to the query using the ScheduledCourse relation
 *
 * @method     SchedulesCourses findOne(PropelPDO $con = null) Return the first SchedulesCourses matching the query
 * @method     SchedulesCourses findOneOrCreate(PropelPDO $con = null) Return the first SchedulesCourses matching the query, or a new SchedulesCourses object populated from the query conditions when no match is found
 *
 * @method     SchedulesCourses findOneByScheduleId(int $schedule_id) Return the first SchedulesCourses filtered by the schedule_id column
 * @method     SchedulesCourses findOneByScheduledCourseId(int $scheduled_course_id) Return the first SchedulesCourses filtered by the scheduled_course_id column
 *
 * @method     array findByScheduleId(int $schedule_id) Return SchedulesCourses objects filtered by the schedule_id column
 * @method     array findByScheduledCourseId(int $scheduled_course_id) Return SchedulesCourses objects filtered by the scheduled_course_id column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseSchedulesCoursesQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseSchedulesCoursesQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'ip7db', $modelName = 'SchedulesCourses', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SchedulesCoursesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     SchedulesCoursesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SchedulesCoursesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SchedulesCoursesQuery) {
            return $criteria;
        }
        $query = new SchedulesCoursesQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query 
                         A Primary key composition: [$schedule_id, $scheduled_course_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   SchedulesCourses|SchedulesCourses[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SchedulesCoursesPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SchedulesCoursesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   SchedulesCourses A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `SCHEDULE_ID`, `SCHEDULED_COURSE_ID` FROM `schedules_courses` WHERE `SCHEDULE_ID` = :p0 AND `SCHEDULED_COURSE_ID` = :p1';
        try {
            $stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new SchedulesCourses();
            $obj->hydrate($row);
            SchedulesCoursesPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return SchedulesCourses|SchedulesCourses[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|SchedulesCourses[]|mixed the list of results, formatted by the current formatter
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
     * @return SchedulesCoursesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SchedulesCoursesPeer::SCHEDULE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SchedulesCoursesPeer::SCHEDULED_COURSE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SchedulesCoursesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SchedulesCoursesPeer::SCHEDULE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SchedulesCoursesPeer::SCHEDULED_COURSE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the schedule_id column
     *
     * Example usage:
     * <code>
     * $query->filterByScheduleId(1234); // WHERE schedule_id = 1234
     * $query->filterByScheduleId(array(12, 34)); // WHERE schedule_id IN (12, 34)
     * $query->filterByScheduleId(array('min' => 12)); // WHERE schedule_id > 12
     * </code>
     *
     * @see       filterBySchedule()
     *
     * @param     mixed $scheduleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchedulesCoursesQuery The current query, for fluid interface
     */
    public function filterByScheduleId($scheduleId = null, $comparison = null)
    {
        if (is_array($scheduleId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(SchedulesCoursesPeer::SCHEDULE_ID, $scheduleId, $comparison);
    }

    /**
     * Filter the query on the scheduled_course_id column
     *
     * Example usage:
     * <code>
     * $query->filterByScheduledCourseId(1234); // WHERE scheduled_course_id = 1234
     * $query->filterByScheduledCourseId(array(12, 34)); // WHERE scheduled_course_id IN (12, 34)
     * $query->filterByScheduledCourseId(array('min' => 12)); // WHERE scheduled_course_id > 12
     * </code>
     *
     * @see       filterByScheduledCourse()
     *
     * @param     mixed $scheduledCourseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SchedulesCoursesQuery The current query, for fluid interface
     */
    public function filterByScheduledCourseId($scheduledCourseId = null, $comparison = null)
    {
        if (is_array($scheduledCourseId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(SchedulesCoursesPeer::SCHEDULED_COURSE_ID, $scheduledCourseId, $comparison);
    }

    /**
     * Filter the query by a related Schedule object
     *
     * @param   Schedule|PropelObjectCollection $schedule The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SchedulesCoursesQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySchedule($schedule, $comparison = null)
    {
        if ($schedule instanceof Schedule) {
            return $this
                ->addUsingAlias(SchedulesCoursesPeer::SCHEDULE_ID, $schedule->getId(), $comparison);
        } elseif ($schedule instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchedulesCoursesPeer::SCHEDULE_ID, $schedule->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySchedule() only accepts arguments of type Schedule or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Schedule relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SchedulesCoursesQuery The current query, for fluid interface
     */
    public function joinSchedule($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Schedule');

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
            $this->addJoinObject($join, 'Schedule');
        }

        return $this;
    }

    /**
     * Use the Schedule relation Schedule object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ScheduleQuery A secondary query class using the current class as primary query
     */
    public function useScheduleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSchedule($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Schedule', 'ScheduleQuery');
    }

    /**
     * Filter the query by a related ScheduledCourse object
     *
     * @param   ScheduledCourse|PropelObjectCollection $scheduledCourse The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SchedulesCoursesQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByScheduledCourse($scheduledCourse, $comparison = null)
    {
        if ($scheduledCourse instanceof ScheduledCourse) {
            return $this
                ->addUsingAlias(SchedulesCoursesPeer::SCHEDULED_COURSE_ID, $scheduledCourse->getId(), $comparison);
        } elseif ($scheduledCourse instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SchedulesCoursesPeer::SCHEDULED_COURSE_ID, $scheduledCourse->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return SchedulesCoursesQuery The current query, for fluid interface
     */
    public function joinScheduledCourse($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useScheduledCourseQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinScheduledCourse($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ScheduledCourse', 'ScheduledCourseQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SchedulesCourses $schedulesCourses Object to remove from the list of results
     *
     * @return SchedulesCoursesQuery The current query, for fluid interface
     */
    public function prune($schedulesCourses = null)
    {
        if ($schedulesCourses) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SchedulesCoursesPeer::SCHEDULE_ID), $schedulesCourses->getScheduleId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SchedulesCoursesPeer::SCHEDULED_COURSE_ID), $schedulesCourses->getScheduledCourseId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

} // BaseSchedulesCoursesQuery