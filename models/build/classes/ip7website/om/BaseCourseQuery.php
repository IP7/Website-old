<?php


/**
 * Base class that represents a query for the 'courses' table.
 *
 *
 *
 * @method CourseQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CourseQuery orderByCursusId($order = Criteria::ASC) Order by the cursus_id column
 * @method CourseQuery orderBySemester($order = Criteria::ASC) Order by the semester column
 * @method CourseQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method CourseQuery orderByShortName($order = Criteria::ASC) Order by the short_name column
 * @method CourseQuery orderByEcts($order = Criteria::ASC) Order by the ECTS column
 * @method CourseQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method CourseQuery groupById() Group by the id column
 * @method CourseQuery groupByCursusId() Group by the cursus_id column
 * @method CourseQuery groupBySemester() Group by the semester column
 * @method CourseQuery groupByName() Group by the name column
 * @method CourseQuery groupByShortName() Group by the short_name column
 * @method CourseQuery groupByEcts() Group by the ECTS column
 * @method CourseQuery groupByDescription() Group by the description column
 *
 * @method CourseQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CourseQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CourseQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CourseQuery leftJoinCursus($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cursus relation
 * @method CourseQuery rightJoinCursus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cursus relation
 * @method CourseQuery innerJoinCursus($relationAlias = null) Adds a INNER JOIN clause to the query using the Cursus relation
 *
 * @method CourseQuery leftJoinEducationalPathsOptionalCourses($relationAlias = null) Adds a LEFT JOIN clause to the query using the EducationalPathsOptionalCourses relation
 * @method CourseQuery rightJoinEducationalPathsOptionalCourses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EducationalPathsOptionalCourses relation
 * @method CourseQuery innerJoinEducationalPathsOptionalCourses($relationAlias = null) Adds a INNER JOIN clause to the query using the EducationalPathsOptionalCourses relation
 *
 * @method CourseQuery leftJoinEducationalPathsMandatoryCourses($relationAlias = null) Adds a LEFT JOIN clause to the query using the EducationalPathsMandatoryCourses relation
 * @method CourseQuery rightJoinEducationalPathsMandatoryCourses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EducationalPathsMandatoryCourses relation
 * @method CourseQuery innerJoinEducationalPathsMandatoryCourses($relationAlias = null) Adds a INNER JOIN clause to the query using the EducationalPathsMandatoryCourses relation
 *
 * @method CourseQuery leftJoinAlert($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alert relation
 * @method CourseQuery rightJoinAlert($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alert relation
 * @method CourseQuery innerJoinAlert($relationAlias = null) Adds a INNER JOIN clause to the query using the Alert relation
 *
 * @method CourseQuery leftJoinContent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Content relation
 * @method CourseQuery rightJoinContent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Content relation
 * @method CourseQuery innerJoinContent($relationAlias = null) Adds a INNER JOIN clause to the query using the Content relation
 *
 * @method CourseQuery leftJoinNote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Note relation
 * @method CourseQuery rightJoinNote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Note relation
 * @method CourseQuery innerJoinNote($relationAlias = null) Adds a INNER JOIN clause to the query using the Note relation
 *
 * @method CourseQuery leftJoinNews($relationAlias = null) Adds a LEFT JOIN clause to the query using the News relation
 * @method CourseQuery rightJoinNews($relationAlias = null) Adds a RIGHT JOIN clause to the query using the News relation
 * @method CourseQuery innerJoinNews($relationAlias = null) Adds a INNER JOIN clause to the query using the News relation
 *
 * @method CourseQuery leftJoinExam($relationAlias = null) Adds a LEFT JOIN clause to the query using the Exam relation
 * @method CourseQuery rightJoinExam($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Exam relation
 * @method CourseQuery innerJoinExam($relationAlias = null) Adds a INNER JOIN clause to the query using the Exam relation
 *
 * @method CourseQuery leftJoinScheduledCourse($relationAlias = null) Adds a LEFT JOIN clause to the query using the ScheduledCourse relation
 * @method CourseQuery rightJoinScheduledCourse($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ScheduledCourse relation
 * @method CourseQuery innerJoinScheduledCourse($relationAlias = null) Adds a INNER JOIN clause to the query using the ScheduledCourse relation
 *
 * @method Course findOne(PropelPDO $con = null) Return the first Course matching the query
 * @method Course findOneOrCreate(PropelPDO $con = null) Return the first Course matching the query, or a new Course object populated from the query conditions when no match is found
 *
 * @method Course findOneById(int $id) Return the first Course filtered by the id column
 * @method Course findOneByCursusId(int $cursus_id) Return the first Course filtered by the cursus_id column
 * @method Course findOneBySemester(int $semester) Return the first Course filtered by the semester column
 * @method Course findOneByName(string $name) Return the first Course filtered by the name column
 * @method Course findOneByShortName(string $short_name) Return the first Course filtered by the short_name column
 * @method Course findOneByEcts(double $ECTS) Return the first Course filtered by the ECTS column
 * @method Course findOneByDescription(string $description) Return the first Course filtered by the description column
 *
 * @method array findById(int $id) Return Course objects filtered by the id column
 * @method array findByCursusId(int $cursus_id) Return Course objects filtered by the cursus_id column
 * @method array findBySemester(int $semester) Return Course objects filtered by the semester column
 * @method array findByName(string $name) Return Course objects filtered by the name column
 * @method array findByShortName(string $short_name) Return Course objects filtered by the short_name column
 * @method array findByEcts(double $ECTS) Return Course objects filtered by the ECTS column
 * @method array findByDescription(string $description) Return Course objects filtered by the description column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseCourseQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCourseQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'Course', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CourseQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     CourseQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CourseQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CourseQuery) {
            return $criteria;
        }
        $query = new CourseQuery();
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
     * @return   Course|Course[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CoursePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CoursePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Course A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `CURSUS_ID`, `SEMESTER`, `NAME`, `SHORT_NAME`, `ECTS`, `DESCRIPTION` FROM `courses` WHERE `ID` = :p0';
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
            $obj = new Course();
            $obj->hydrate($row);
            CoursePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Course|Course[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Course[]|mixed the list of results, formatted by the current formatter
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
     * @return CourseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CoursePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CourseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CoursePeer::ID, $keys, Criteria::IN);
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
     * @return CourseQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(CoursePeer::ID, $id, $comparison);
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
     * @return CourseQuery The current query, for fluid interface
     */
    public function filterByCursusId($cursusId = null, $comparison = null)
    {
        if (is_array($cursusId)) {
            $useMinMax = false;
            if (isset($cursusId['min'])) {
                $this->addUsingAlias(CoursePeer::CURSUS_ID, $cursusId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cursusId['max'])) {
                $this->addUsingAlias(CoursePeer::CURSUS_ID, $cursusId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CoursePeer::CURSUS_ID, $cursusId, $comparison);
    }

    /**
     * Filter the query on the semester column
     *
     * Example usage:
     * <code>
     * $query->filterBySemester(1234); // WHERE semester = 1234
     * $query->filterBySemester(array(12, 34)); // WHERE semester IN (12, 34)
     * $query->filterBySemester(array('min' => 12)); // WHERE semester > 12
     * </code>
     *
     * @param     mixed $semester The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CourseQuery The current query, for fluid interface
     */
    public function filterBySemester($semester = null, $comparison = null)
    {
        if (is_array($semester)) {
            $useMinMax = false;
            if (isset($semester['min'])) {
                $this->addUsingAlias(CoursePeer::SEMESTER, $semester['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($semester['max'])) {
                $this->addUsingAlias(CoursePeer::SEMESTER, $semester['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CoursePeer::SEMESTER, $semester, $comparison);
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
     * @return CourseQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CoursePeer::NAME, $name, $comparison);
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
     * @return CourseQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CoursePeer::SHORT_NAME, $shortName, $comparison);
    }

    /**
     * Filter the query on the ECTS column
     *
     * Example usage:
     * <code>
     * $query->filterByEcts(1234); // WHERE ECTS = 1234
     * $query->filterByEcts(array(12, 34)); // WHERE ECTS IN (12, 34)
     * $query->filterByEcts(array('min' => 12)); // WHERE ECTS > 12
     * </code>
     *
     * @param     mixed $ects The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CourseQuery The current query, for fluid interface
     */
    public function filterByEcts($ects = null, $comparison = null)
    {
        if (is_array($ects)) {
            $useMinMax = false;
            if (isset($ects['min'])) {
                $this->addUsingAlias(CoursePeer::ECTS, $ects['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ects['max'])) {
                $this->addUsingAlias(CoursePeer::ECTS, $ects['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CoursePeer::ECTS, $ects, $comparison);
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
     * @return CourseQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CoursePeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related Cursus object
     *
     * @param   Cursus|PropelObjectCollection $cursus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CourseQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCursus($cursus, $comparison = null)
    {
        if ($cursus instanceof Cursus) {
            return $this
                ->addUsingAlias(CoursePeer::CURSUS_ID, $cursus->getId(), $comparison);
        } elseif ($cursus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CoursePeer::CURSUS_ID, $cursus->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return CourseQuery The current query, for fluid interface
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
     * Filter the query by a related EducationalPathsOptionalCourses object
     *
     * @param   EducationalPathsOptionalCourses|PropelObjectCollection $educationalPathsOptionalCourses  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CourseQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEducationalPathsOptionalCourses($educationalPathsOptionalCourses, $comparison = null)
    {
        if ($educationalPathsOptionalCourses instanceof EducationalPathsOptionalCourses) {
            return $this
                ->addUsingAlias(CoursePeer::ID, $educationalPathsOptionalCourses->getCourseId(), $comparison);
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
     * @return CourseQuery The current query, for fluid interface
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
     * @return   CourseQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEducationalPathsMandatoryCourses($educationalPathsMandatoryCourses, $comparison = null)
    {
        if ($educationalPathsMandatoryCourses instanceof EducationalPathsMandatoryCourses) {
            return $this
                ->addUsingAlias(CoursePeer::ID, $educationalPathsMandatoryCourses->getCourseId(), $comparison);
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
     * @return CourseQuery The current query, for fluid interface
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
     * Filter the query by a related Alert object
     *
     * @param   Alert|PropelObjectCollection $alert  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CourseQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAlert($alert, $comparison = null)
    {
        if ($alert instanceof Alert) {
            return $this
                ->addUsingAlias(CoursePeer::ID, $alert->getCourseId(), $comparison);
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
     * @return CourseQuery The current query, for fluid interface
     */
    public function joinAlert($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useAlertQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
     * @return   CourseQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContent($content, $comparison = null)
    {
        if ($content instanceof Content) {
            return $this
                ->addUsingAlias(CoursePeer::ID, $content->getCourseId(), $comparison);
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
     * @return CourseQuery The current query, for fluid interface
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
     * Filter the query by a related Note object
     *
     * @param   Note|PropelObjectCollection $note  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CourseQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByNote($note, $comparison = null)
    {
        if ($note instanceof Note) {
            return $this
                ->addUsingAlias(CoursePeer::ID, $note->getCourseId(), $comparison);
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
     * @return CourseQuery The current query, for fluid interface
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
     * @return   CourseQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByNews($news, $comparison = null)
    {
        if ($news instanceof News) {
            return $this
                ->addUsingAlias(CoursePeer::ID, $news->getCourseId(), $comparison);
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
     * @return CourseQuery The current query, for fluid interface
     */
    public function joinNews($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useNewsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinNews($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'News', 'NewsQuery');
    }

    /**
     * Filter the query by a related Exam object
     *
     * @param   Exam|PropelObjectCollection $exam  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CourseQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByExam($exam, $comparison = null)
    {
        if ($exam instanceof Exam) {
            return $this
                ->addUsingAlias(CoursePeer::ID, $exam->getCourseId(), $comparison);
        } elseif ($exam instanceof PropelObjectCollection) {
            return $this
                ->useExamQuery()
                ->filterByPrimaryKeys($exam->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExam() only accepts arguments of type Exam or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Exam relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CourseQuery The current query, for fluid interface
     */
    public function joinExam($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Exam');

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
            $this->addJoinObject($join, 'Exam');
        }

        return $this;
    }

    /**
     * Use the Exam relation Exam object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ExamQuery A secondary query class using the current class as primary query
     */
    public function useExamQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExam($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Exam', 'ExamQuery');
    }

    /**
     * Filter the query by a related ScheduledCourse object
     *
     * @param   ScheduledCourse|PropelObjectCollection $scheduledCourse  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CourseQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByScheduledCourse($scheduledCourse, $comparison = null)
    {
        if ($scheduledCourse instanceof ScheduledCourse) {
            return $this
                ->addUsingAlias(CoursePeer::ID, $scheduledCourse->getCourseId(), $comparison);
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
     * @return CourseQuery The current query, for fluid interface
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
     * Filter the query by a related EducationalPath object
     * using the educational_paths_optional_courses table as cross reference
     *
     * @param   EducationalPath $educationalPath the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CourseQuery The current query, for fluid interface
     */
    public function filterByOptionalEducationalPath($educationalPath, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useEducationalPathsOptionalCoursesQuery()
            ->filterByOptionalEducationalPath($educationalPath, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related EducationalPath object
     * using the educational_paths_mandatory_courses table as cross reference
     *
     * @param   EducationalPath $educationalPath the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CourseQuery The current query, for fluid interface
     */
    public function filterByMandatoryEducationalPath($educationalPath, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useEducationalPathsMandatoryCoursesQuery()
            ->filterByMandatoryEducationalPath($educationalPath, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   Course $course Object to remove from the list of results
     *
     * @return CourseQuery The current query, for fluid interface
     */
    public function prune($course = null)
    {
        if ($course) {
            $this->addUsingAlias(CoursePeer::ID, $course->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
