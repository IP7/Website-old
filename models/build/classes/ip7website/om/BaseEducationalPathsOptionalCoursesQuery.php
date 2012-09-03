<?php


/**
 * Base class that represents a query for the 'educational_paths_optional_courses' table.
 *
 * 
 *
 * @method     EducationalPathsOptionalCoursesQuery orderByCourseId($order = Criteria::ASC) Order by the course_id column
 * @method     EducationalPathsOptionalCoursesQuery orderByPathId($order = Criteria::ASC) Order by the path_id column
 *
 * @method     EducationalPathsOptionalCoursesQuery groupByCourseId() Group by the course_id column
 * @method     EducationalPathsOptionalCoursesQuery groupByPathId() Group by the path_id column
 *
 * @method     EducationalPathsOptionalCoursesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EducationalPathsOptionalCoursesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EducationalPathsOptionalCoursesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     EducationalPathsOptionalCoursesQuery leftJoinOptionalCourse($relationAlias = null) Adds a LEFT JOIN clause to the query using the OptionalCourse relation
 * @method     EducationalPathsOptionalCoursesQuery rightJoinOptionalCourse($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OptionalCourse relation
 * @method     EducationalPathsOptionalCoursesQuery innerJoinOptionalCourse($relationAlias = null) Adds a INNER JOIN clause to the query using the OptionalCourse relation
 *
 * @method     EducationalPathsOptionalCoursesQuery leftJoinOptionalEducationalPath($relationAlias = null) Adds a LEFT JOIN clause to the query using the OptionalEducationalPath relation
 * @method     EducationalPathsOptionalCoursesQuery rightJoinOptionalEducationalPath($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OptionalEducationalPath relation
 * @method     EducationalPathsOptionalCoursesQuery innerJoinOptionalEducationalPath($relationAlias = null) Adds a INNER JOIN clause to the query using the OptionalEducationalPath relation
 *
 * @method     EducationalPathsOptionalCourses findOne(PropelPDO $con = null) Return the first EducationalPathsOptionalCourses matching the query
 * @method     EducationalPathsOptionalCourses findOneOrCreate(PropelPDO $con = null) Return the first EducationalPathsOptionalCourses matching the query, or a new EducationalPathsOptionalCourses object populated from the query conditions when no match is found
 *
 * @method     EducationalPathsOptionalCourses findOneByCourseId(int $course_id) Return the first EducationalPathsOptionalCourses filtered by the course_id column
 * @method     EducationalPathsOptionalCourses findOneByPathId(int $path_id) Return the first EducationalPathsOptionalCourses filtered by the path_id column
 *
 * @method     array findByCourseId(int $course_id) Return EducationalPathsOptionalCourses objects filtered by the course_id column
 * @method     array findByPathId(int $path_id) Return EducationalPathsOptionalCourses objects filtered by the path_id column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseEducationalPathsOptionalCoursesQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseEducationalPathsOptionalCoursesQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'EducationalPathsOptionalCourses', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EducationalPathsOptionalCoursesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     EducationalPathsOptionalCoursesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EducationalPathsOptionalCoursesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EducationalPathsOptionalCoursesQuery) {
            return $criteria;
        }
        $query = new EducationalPathsOptionalCoursesQuery();
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
                         A Primary key composition: [$course_id, $path_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   EducationalPathsOptionalCourses|EducationalPathsOptionalCourses[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EducationalPathsOptionalCoursesPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EducationalPathsOptionalCoursesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   EducationalPathsOptionalCourses A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `COURSE_ID`, `PATH_ID` FROM `educational_paths_optional_courses` WHERE `COURSE_ID` = :p0 AND `PATH_ID` = :p1';
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
            $obj = new EducationalPathsOptionalCourses();
            $obj->hydrate($row);
            EducationalPathsOptionalCoursesPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return EducationalPathsOptionalCourses|EducationalPathsOptionalCourses[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EducationalPathsOptionalCourses[]|mixed the list of results, formatted by the current formatter
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
     * @return EducationalPathsOptionalCoursesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(EducationalPathsOptionalCoursesPeer::COURSE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(EducationalPathsOptionalCoursesPeer::PATH_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EducationalPathsOptionalCoursesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(EducationalPathsOptionalCoursesPeer::COURSE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(EducationalPathsOptionalCoursesPeer::PATH_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @see       filterByOptionalCourse()
     *
     * @param     mixed $courseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EducationalPathsOptionalCoursesQuery The current query, for fluid interface
     */
    public function filterByCourseId($courseId = null, $comparison = null)
    {
        if (is_array($courseId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(EducationalPathsOptionalCoursesPeer::COURSE_ID, $courseId, $comparison);
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
     * @see       filterByOptionalEducationalPath()
     *
     * @param     mixed $pathId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EducationalPathsOptionalCoursesQuery The current query, for fluid interface
     */
    public function filterByPathId($pathId = null, $comparison = null)
    {
        if (is_array($pathId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(EducationalPathsOptionalCoursesPeer::PATH_ID, $pathId, $comparison);
    }

    /**
     * Filter the query by a related Course object
     *
     * @param   Course|PropelObjectCollection $course The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EducationalPathsOptionalCoursesQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByOptionalCourse($course, $comparison = null)
    {
        if ($course instanceof Course) {
            return $this
                ->addUsingAlias(EducationalPathsOptionalCoursesPeer::COURSE_ID, $course->getId(), $comparison);
        } elseif ($course instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EducationalPathsOptionalCoursesPeer::COURSE_ID, $course->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOptionalCourse() only accepts arguments of type Course or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OptionalCourse relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EducationalPathsOptionalCoursesQuery The current query, for fluid interface
     */
    public function joinOptionalCourse($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OptionalCourse');

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
            $this->addJoinObject($join, 'OptionalCourse');
        }

        return $this;
    }

    /**
     * Use the OptionalCourse relation Course object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CourseQuery A secondary query class using the current class as primary query
     */
    public function useOptionalCourseQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOptionalCourse($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OptionalCourse', 'CourseQuery');
    }

    /**
     * Filter the query by a related EducationalPath object
     *
     * @param   EducationalPath|PropelObjectCollection $educationalPath The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EducationalPathsOptionalCoursesQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByOptionalEducationalPath($educationalPath, $comparison = null)
    {
        if ($educationalPath instanceof EducationalPath) {
            return $this
                ->addUsingAlias(EducationalPathsOptionalCoursesPeer::PATH_ID, $educationalPath->getId(), $comparison);
        } elseif ($educationalPath instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EducationalPathsOptionalCoursesPeer::PATH_ID, $educationalPath->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOptionalEducationalPath() only accepts arguments of type EducationalPath or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OptionalEducationalPath relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EducationalPathsOptionalCoursesQuery The current query, for fluid interface
     */
    public function joinOptionalEducationalPath($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OptionalEducationalPath');

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
            $this->addJoinObject($join, 'OptionalEducationalPath');
        }

        return $this;
    }

    /**
     * Use the OptionalEducationalPath relation EducationalPath object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EducationalPathQuery A secondary query class using the current class as primary query
     */
    public function useOptionalEducationalPathQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOptionalEducationalPath($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OptionalEducationalPath', 'EducationalPathQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   EducationalPathsOptionalCourses $educationalPathsOptionalCourses Object to remove from the list of results
     *
     * @return EducationalPathsOptionalCoursesQuery The current query, for fluid interface
     */
    public function prune($educationalPathsOptionalCourses = null)
    {
        if ($educationalPathsOptionalCourses) {
            $this->addCond('pruneCond0', $this->getAliasedColName(EducationalPathsOptionalCoursesPeer::COURSE_ID), $educationalPathsOptionalCourses->getCourseId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(EducationalPathsOptionalCoursesPeer::PATH_ID), $educationalPathsOptionalCourses->getPathId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

} // BaseEducationalPathsOptionalCoursesQuery