<?php


/**
 * Base class that represents a query for the 'scheduled_courses' table.
 *
 * 
 *
 * @method     ScheduledCourseQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ScheduledCourseQuery orderByCourseId($order = Criteria::ASC) Order by the course_id column
 * @method     ScheduledCourseQuery orderByTeacherId($order = Criteria::ASC) Order by the teacher_id column
 * @method     ScheduledCourseQuery orderByTeacherName($order = Criteria::ASC) Order by the teacher_name column
 * @method     ScheduledCourseQuery orderByWeekday($order = Criteria::ASC) Order by the weekday column
 * @method     ScheduledCourseQuery orderByBeginning($order = Criteria::ASC) Order by the beginning column
 * @method     ScheduledCourseQuery orderByEnd($order = Criteria::ASC) Order by the end column
 * @method     ScheduledCourseQuery orderByPlace($order = Criteria::ASC) Order by the place column
 *
 * @method     ScheduledCourseQuery groupById() Group by the id column
 * @method     ScheduledCourseQuery groupByCourseId() Group by the course_id column
 * @method     ScheduledCourseQuery groupByTeacherId() Group by the teacher_id column
 * @method     ScheduledCourseQuery groupByTeacherName() Group by the teacher_name column
 * @method     ScheduledCourseQuery groupByWeekday() Group by the weekday column
 * @method     ScheduledCourseQuery groupByBeginning() Group by the beginning column
 * @method     ScheduledCourseQuery groupByEnd() Group by the end column
 * @method     ScheduledCourseQuery groupByPlace() Group by the place column
 *
 * @method     ScheduledCourseQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ScheduledCourseQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ScheduledCourseQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ScheduledCourseQuery leftJoinCourse($relationAlias = null) Adds a LEFT JOIN clause to the query using the Course relation
 * @method     ScheduledCourseQuery rightJoinCourse($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Course relation
 * @method     ScheduledCourseQuery innerJoinCourse($relationAlias = null) Adds a INNER JOIN clause to the query using the Course relation
 *
 * @method     ScheduledCourseQuery leftJoinTeacher($relationAlias = null) Adds a LEFT JOIN clause to the query using the Teacher relation
 * @method     ScheduledCourseQuery rightJoinTeacher($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Teacher relation
 * @method     ScheduledCourseQuery innerJoinTeacher($relationAlias = null) Adds a INNER JOIN clause to the query using the Teacher relation
 *
 * @method     ScheduledCourseQuery leftJoinSchedulesCourses($relationAlias = null) Adds a LEFT JOIN clause to the query using the SchedulesCourses relation
 * @method     ScheduledCourseQuery rightJoinSchedulesCourses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SchedulesCourses relation
 * @method     ScheduledCourseQuery innerJoinSchedulesCourses($relationAlias = null) Adds a INNER JOIN clause to the query using the SchedulesCourses relation
 *
 * @method     ScheduledCourse findOne(PropelPDO $con = null) Return the first ScheduledCourse matching the query
 * @method     ScheduledCourse findOneOrCreate(PropelPDO $con = null) Return the first ScheduledCourse matching the query, or a new ScheduledCourse object populated from the query conditions when no match is found
 *
 * @method     ScheduledCourse findOneById(int $id) Return the first ScheduledCourse filtered by the id column
 * @method     ScheduledCourse findOneByCourseId(int $course_id) Return the first ScheduledCourse filtered by the course_id column
 * @method     ScheduledCourse findOneByTeacherId(int $teacher_id) Return the first ScheduledCourse filtered by the teacher_id column
 * @method     ScheduledCourse findOneByTeacherName(string $teacher_name) Return the first ScheduledCourse filtered by the teacher_name column
 * @method     ScheduledCourse findOneByWeekday(int $weekday) Return the first ScheduledCourse filtered by the weekday column
 * @method     ScheduledCourse findOneByBeginning(string $beginning) Return the first ScheduledCourse filtered by the beginning column
 * @method     ScheduledCourse findOneByEnd(string $end) Return the first ScheduledCourse filtered by the end column
 * @method     ScheduledCourse findOneByPlace(string $place) Return the first ScheduledCourse filtered by the place column
 *
 * @method     array findById(int $id) Return ScheduledCourse objects filtered by the id column
 * @method     array findByCourseId(int $course_id) Return ScheduledCourse objects filtered by the course_id column
 * @method     array findByTeacherId(int $teacher_id) Return ScheduledCourse objects filtered by the teacher_id column
 * @method     array findByTeacherName(string $teacher_name) Return ScheduledCourse objects filtered by the teacher_name column
 * @method     array findByWeekday(int $weekday) Return ScheduledCourse objects filtered by the weekday column
 * @method     array findByBeginning(string $beginning) Return ScheduledCourse objects filtered by the beginning column
 * @method     array findByEnd(string $end) Return ScheduledCourse objects filtered by the end column
 * @method     array findByPlace(string $place) Return ScheduledCourse objects filtered by the place column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseScheduledCourseQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseScheduledCourseQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'ScheduledCourse', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ScheduledCourseQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ScheduledCourseQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ScheduledCourseQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ScheduledCourseQuery) {
            return $criteria;
        }
        $query = new ScheduledCourseQuery();
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
     * @return   ScheduledCourse|ScheduledCourse[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ScheduledCoursePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ScheduledCoursePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   ScheduledCourse A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `COURSE_ID`, `TEACHER_ID`, `TEACHER_NAME`, `WEEKDAY`, `BEGINNING`, `END`, `PLACE` FROM `scheduled_courses` WHERE `ID` = :p0';
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
            $obj = new ScheduledCourse();
            $obj->hydrate($row);
            ScheduledCoursePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ScheduledCourse|ScheduledCourse[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ScheduledCourse[]|mixed the list of results, formatted by the current formatter
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
     * @return ScheduledCourseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ScheduledCoursePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ScheduledCourseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ScheduledCoursePeer::ID, $keys, Criteria::IN);
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
     * @return ScheduledCourseQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ScheduledCoursePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the course_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCourseId(1234); // WHERE course_id = 1234
     * $query->filterByCourseId(array(12, 34)); // WHERE course_id IN (12, 34)
     * $query->filterByCourseId(array('min' => 12)); // WHERE course_id > 12
     * </code>
     *
     * @see       filterByCourse()
     *
     * @param     mixed $courseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ScheduledCourseQuery The current query, for fluid interface
     */
    public function filterByCourseId($courseId = null, $comparison = null)
    {
        if (is_array($courseId)) {
            $useMinMax = false;
            if (isset($courseId['min'])) {
                $this->addUsingAlias(ScheduledCoursePeer::COURSE_ID, $courseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($courseId['max'])) {
                $this->addUsingAlias(ScheduledCoursePeer::COURSE_ID, $courseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ScheduledCoursePeer::COURSE_ID, $courseId, $comparison);
    }

    /**
     * Filter the query on the teacher_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTeacherId(1234); // WHERE teacher_id = 1234
     * $query->filterByTeacherId(array(12, 34)); // WHERE teacher_id IN (12, 34)
     * $query->filterByTeacherId(array('min' => 12)); // WHERE teacher_id > 12
     * </code>
     *
     * @see       filterByTeacher()
     *
     * @param     mixed $teacherId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ScheduledCourseQuery The current query, for fluid interface
     */
    public function filterByTeacherId($teacherId = null, $comparison = null)
    {
        if (is_array($teacherId)) {
            $useMinMax = false;
            if (isset($teacherId['min'])) {
                $this->addUsingAlias(ScheduledCoursePeer::TEACHER_ID, $teacherId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($teacherId['max'])) {
                $this->addUsingAlias(ScheduledCoursePeer::TEACHER_ID, $teacherId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ScheduledCoursePeer::TEACHER_ID, $teacherId, $comparison);
    }

    /**
     * Filter the query on the teacher_name column
     *
     * Example usage:
     * <code>
     * $query->filterByTeacherName('fooValue');   // WHERE teacher_name = 'fooValue'
     * $query->filterByTeacherName('%fooValue%'); // WHERE teacher_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $teacherName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ScheduledCourseQuery The current query, for fluid interface
     */
    public function filterByTeacherName($teacherName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($teacherName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $teacherName)) {
                $teacherName = str_replace('*', '%', $teacherName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ScheduledCoursePeer::TEACHER_NAME, $teacherName, $comparison);
    }

    /**
     * Filter the query on the weekday column
     *
     * @param     mixed $weekday The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ScheduledCourseQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByWeekday($weekday = null, $comparison = null)
    {
        $valueSet = ScheduledCoursePeer::getValueSet(ScheduledCoursePeer::WEEKDAY);
        if (is_scalar($weekday)) {
            if (!in_array($weekday, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $weekday));
            }
            $weekday = array_search($weekday, $valueSet);
        } elseif (is_array($weekday)) {
            $convertedValues = array();
            foreach ($weekday as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $weekday = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ScheduledCoursePeer::WEEKDAY, $weekday, $comparison);
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
     * @return ScheduledCourseQuery The current query, for fluid interface
     */
    public function filterByBeginning($beginning = null, $comparison = null)
    {
        if (is_array($beginning)) {
            $useMinMax = false;
            if (isset($beginning['min'])) {
                $this->addUsingAlias(ScheduledCoursePeer::BEGINNING, $beginning['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($beginning['max'])) {
                $this->addUsingAlias(ScheduledCoursePeer::BEGINNING, $beginning['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ScheduledCoursePeer::BEGINNING, $beginning, $comparison);
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
     * @return ScheduledCourseQuery The current query, for fluid interface
     */
    public function filterByEnd($end = null, $comparison = null)
    {
        if (is_array($end)) {
            $useMinMax = false;
            if (isset($end['min'])) {
                $this->addUsingAlias(ScheduledCoursePeer::END, $end['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($end['max'])) {
                $this->addUsingAlias(ScheduledCoursePeer::END, $end['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ScheduledCoursePeer::END, $end, $comparison);
    }

    /**
     * Filter the query on the place column
     *
     * Example usage:
     * <code>
     * $query->filterByPlace('fooValue');   // WHERE place = 'fooValue'
     * $query->filterByPlace('%fooValue%'); // WHERE place LIKE '%fooValue%'
     * </code>
     *
     * @param     string $place The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ScheduledCourseQuery The current query, for fluid interface
     */
    public function filterByPlace($place = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($place)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $place)) {
                $place = str_replace('*', '%', $place);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ScheduledCoursePeer::PLACE, $place, $comparison);
    }

    /**
     * Filter the query by a related Course object
     *
     * @param   Course|PropelObjectCollection $course The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ScheduledCourseQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCourse($course, $comparison = null)
    {
        if ($course instanceof Course) {
            return $this
                ->addUsingAlias(ScheduledCoursePeer::COURSE_ID, $course->getId(), $comparison);
        } elseif ($course instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ScheduledCoursePeer::COURSE_ID, $course->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCourse() only accepts arguments of type Course or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Course relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ScheduledCourseQuery The current query, for fluid interface
     */
    public function joinCourse($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Course');

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
            $this->addJoinObject($join, 'Course');
        }

        return $this;
    }

    /**
     * Use the Course relation Course object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CourseQuery A secondary query class using the current class as primary query
     */
    public function useCourseQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCourse($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Course', 'CourseQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ScheduledCourseQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTeacher($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ScheduledCoursePeer::TEACHER_ID, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ScheduledCoursePeer::TEACHER_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTeacher() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Teacher relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ScheduledCourseQuery The current query, for fluid interface
     */
    public function joinTeacher($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Teacher');

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
            $this->addJoinObject($join, 'Teacher');
        }

        return $this;
    }

    /**
     * Use the Teacher relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserQuery A secondary query class using the current class as primary query
     */
    public function useTeacherQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTeacher($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Teacher', 'UserQuery');
    }

    /**
     * Filter the query by a related SchedulesCourses object
     *
     * @param   SchedulesCourses|PropelObjectCollection $schedulesCourses  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ScheduledCourseQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySchedulesCourses($schedulesCourses, $comparison = null)
    {
        if ($schedulesCourses instanceof SchedulesCourses) {
            return $this
                ->addUsingAlias(ScheduledCoursePeer::ID, $schedulesCourses->getScheduledCourseId(), $comparison);
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
     * @return ScheduledCourseQuery The current query, for fluid interface
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
     * Filter the query by a related Schedule object
     * using the schedules_courses table as cross reference
     *
     * @param   Schedule $schedule the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ScheduledCourseQuery The current query, for fluid interface
     */
    public function filterBySchedule($schedule, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useSchedulesCoursesQuery()
            ->filterBySchedule($schedule, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ScheduledCourse $scheduledCourse Object to remove from the list of results
     *
     * @return ScheduledCourseQuery The current query, for fluid interface
     */
    public function prune($scheduledCourse = null)
    {
        if ($scheduledCourse) {
            $this->addUsingAlias(ScheduledCoursePeer::ID, $scheduledCourse->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseScheduledCourseQuery