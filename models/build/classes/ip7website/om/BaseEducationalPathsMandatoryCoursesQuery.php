<?php


/**
 * Base class that represents a query for the 'educational_paths_mandatory_courses' table.
 *
 *
 *
 * @method EducationalPathsMandatoryCoursesQuery orderByCourseId($order = Criteria::ASC) Order by the course_id column
 * @method EducationalPathsMandatoryCoursesQuery orderByPathId($order = Criteria::ASC) Order by the path_id column
 *
 * @method EducationalPathsMandatoryCoursesQuery groupByCourseId() Group by the course_id column
 * @method EducationalPathsMandatoryCoursesQuery groupByPathId() Group by the path_id column
 *
 * @method EducationalPathsMandatoryCoursesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EducationalPathsMandatoryCoursesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EducationalPathsMandatoryCoursesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EducationalPathsMandatoryCoursesQuery leftJoinMandatoryCourse($relationAlias = null) Adds a LEFT JOIN clause to the query using the MandatoryCourse relation
 * @method EducationalPathsMandatoryCoursesQuery rightJoinMandatoryCourse($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MandatoryCourse relation
 * @method EducationalPathsMandatoryCoursesQuery innerJoinMandatoryCourse($relationAlias = null) Adds a INNER JOIN clause to the query using the MandatoryCourse relation
 *
 * @method EducationalPathsMandatoryCoursesQuery leftJoinMandatoryEducationalPath($relationAlias = null) Adds a LEFT JOIN clause to the query using the MandatoryEducationalPath relation
 * @method EducationalPathsMandatoryCoursesQuery rightJoinMandatoryEducationalPath($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MandatoryEducationalPath relation
 * @method EducationalPathsMandatoryCoursesQuery innerJoinMandatoryEducationalPath($relationAlias = null) Adds a INNER JOIN clause to the query using the MandatoryEducationalPath relation
 *
 * @method EducationalPathsMandatoryCourses findOne(PropelPDO $con = null) Return the first EducationalPathsMandatoryCourses matching the query
 * @method EducationalPathsMandatoryCourses findOneOrCreate(PropelPDO $con = null) Return the first EducationalPathsMandatoryCourses matching the query, or a new EducationalPathsMandatoryCourses object populated from the query conditions when no match is found
 *
 * @method EducationalPathsMandatoryCourses findOneByCourseId(int $course_id) Return the first EducationalPathsMandatoryCourses filtered by the course_id column
 * @method EducationalPathsMandatoryCourses findOneByPathId(int $path_id) Return the first EducationalPathsMandatoryCourses filtered by the path_id column
 *
 * @method array findByCourseId(int $course_id) Return EducationalPathsMandatoryCourses objects filtered by the course_id column
 * @method array findByPathId(int $path_id) Return EducationalPathsMandatoryCourses objects filtered by the path_id column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseEducationalPathsMandatoryCoursesQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEducationalPathsMandatoryCoursesQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'EducationalPathsMandatoryCourses', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EducationalPathsMandatoryCoursesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     EducationalPathsMandatoryCoursesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EducationalPathsMandatoryCoursesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EducationalPathsMandatoryCoursesQuery) {
            return $criteria;
        }
        $query = new EducationalPathsMandatoryCoursesQuery();
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
     * @return   EducationalPathsMandatoryCourses|EducationalPathsMandatoryCourses[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EducationalPathsMandatoryCoursesPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EducationalPathsMandatoryCoursesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   EducationalPathsMandatoryCourses A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `COURSE_ID`, `PATH_ID` FROM `educational_paths_mandatory_courses` WHERE `COURSE_ID` = :p0 AND `PATH_ID` = :p1';
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
            $obj = new EducationalPathsMandatoryCourses();
            $obj->hydrate($row);
            EducationalPathsMandatoryCoursesPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return EducationalPathsMandatoryCourses|EducationalPathsMandatoryCourses[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EducationalPathsMandatoryCourses[]|mixed the list of results, formatted by the current formatter
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
     * @return EducationalPathsMandatoryCoursesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(EducationalPathsMandatoryCoursesPeer::COURSE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(EducationalPathsMandatoryCoursesPeer::PATH_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EducationalPathsMandatoryCoursesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(EducationalPathsMandatoryCoursesPeer::COURSE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(EducationalPathsMandatoryCoursesPeer::PATH_ID, $key[1], Criteria::EQUAL);
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
     * @see       filterByMandatoryCourse()
     *
     * @param     mixed $courseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EducationalPathsMandatoryCoursesQuery The current query, for fluid interface
     */
    public function filterByCourseId($courseId = null, $comparison = null)
    {
        if (is_array($courseId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(EducationalPathsMandatoryCoursesPeer::COURSE_ID, $courseId, $comparison);
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
     * @see       filterByMandatoryEducationalPath()
     *
     * @param     mixed $pathId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EducationalPathsMandatoryCoursesQuery The current query, for fluid interface
     */
    public function filterByPathId($pathId = null, $comparison = null)
    {
        if (is_array($pathId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(EducationalPathsMandatoryCoursesPeer::PATH_ID, $pathId, $comparison);
    }

    /**
     * Filter the query by a related Course object
     *
     * @param   Course|PropelObjectCollection $course The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EducationalPathsMandatoryCoursesQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByMandatoryCourse($course, $comparison = null)
    {
        if ($course instanceof Course) {
            return $this
                ->addUsingAlias(EducationalPathsMandatoryCoursesPeer::COURSE_ID, $course->getId(), $comparison);
        } elseif ($course instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EducationalPathsMandatoryCoursesPeer::COURSE_ID, $course->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMandatoryCourse() only accepts arguments of type Course or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MandatoryCourse relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EducationalPathsMandatoryCoursesQuery The current query, for fluid interface
     */
    public function joinMandatoryCourse($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MandatoryCourse');

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
            $this->addJoinObject($join, 'MandatoryCourse');
        }

        return $this;
    }

    /**
     * Use the MandatoryCourse relation Course object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CourseQuery A secondary query class using the current class as primary query
     */
    public function useMandatoryCourseQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMandatoryCourse($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MandatoryCourse', 'CourseQuery');
    }

    /**
     * Filter the query by a related EducationalPath object
     *
     * @param   EducationalPath|PropelObjectCollection $educationalPath The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   EducationalPathsMandatoryCoursesQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByMandatoryEducationalPath($educationalPath, $comparison = null)
    {
        if ($educationalPath instanceof EducationalPath) {
            return $this
                ->addUsingAlias(EducationalPathsMandatoryCoursesPeer::PATH_ID, $educationalPath->getId(), $comparison);
        } elseif ($educationalPath instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EducationalPathsMandatoryCoursesPeer::PATH_ID, $educationalPath->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMandatoryEducationalPath() only accepts arguments of type EducationalPath or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MandatoryEducationalPath relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EducationalPathsMandatoryCoursesQuery The current query, for fluid interface
     */
    public function joinMandatoryEducationalPath($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MandatoryEducationalPath');

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
            $this->addJoinObject($join, 'MandatoryEducationalPath');
        }

        return $this;
    }

    /**
     * Use the MandatoryEducationalPath relation EducationalPath object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EducationalPathQuery A secondary query class using the current class as primary query
     */
    public function useMandatoryEducationalPathQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMandatoryEducationalPath($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MandatoryEducationalPath', 'EducationalPathQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   EducationalPathsMandatoryCourses $educationalPathsMandatoryCourses Object to remove from the list of results
     *
     * @return EducationalPathsMandatoryCoursesQuery The current query, for fluid interface
     */
    public function prune($educationalPathsMandatoryCourses = null)
    {
        if ($educationalPathsMandatoryCourses) {
            $this->addCond('pruneCond0', $this->getAliasedColName(EducationalPathsMandatoryCoursesPeer::COURSE_ID), $educationalPathsMandatoryCourses->getCourseId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(EducationalPathsMandatoryCoursesPeer::PATH_ID), $educationalPathsMandatoryCourses->getPathId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
