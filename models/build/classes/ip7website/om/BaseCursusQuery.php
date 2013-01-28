<?php


/**
 * Base class that represents a query for the 'cursus' table.
 *
 *
 *
 * @method CursusQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CursusQuery orderByShortName($order = Criteria::ASC) Order by the short_name column
 * @method CursusQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method CursusQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method CursusQuery orderByResponsableId($order = Criteria::ASC) Order by the responsable_id column
 *
 * @method CursusQuery groupById() Group by the id column
 * @method CursusQuery groupByShortName() Group by the short_name column
 * @method CursusQuery groupByName() Group by the name column
 * @method CursusQuery groupByDescription() Group by the description column
 * @method CursusQuery groupByResponsableId() Group by the responsable_id column
 *
 * @method CursusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CursusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CursusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CursusQuery leftJoinResponsable($relationAlias = null) Adds a LEFT JOIN clause to the query using the Responsable relation
 * @method CursusQuery rightJoinResponsable($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Responsable relation
 * @method CursusQuery innerJoinResponsable($relationAlias = null) Adds a INNER JOIN clause to the query using the Responsable relation
 *
 * @method CursusQuery leftJoinCourse($relationAlias = null) Adds a LEFT JOIN clause to the query using the Course relation
 * @method CursusQuery rightJoinCourse($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Course relation
 * @method CursusQuery innerJoinCourse($relationAlias = null) Adds a INNER JOIN clause to the query using the Course relation
 *
 * @method CursusQuery leftJoinEducationalPath($relationAlias = null) Adds a LEFT JOIN clause to the query using the EducationalPath relation
 * @method CursusQuery rightJoinEducationalPath($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EducationalPath relation
 * @method CursusQuery innerJoinEducationalPath($relationAlias = null) Adds a INNER JOIN clause to the query using the EducationalPath relation
 *
 * @method CursusQuery leftJoinContent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Content relation
 * @method CursusQuery rightJoinContent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Content relation
 * @method CursusQuery innerJoinContent($relationAlias = null) Adds a INNER JOIN clause to the query using the Content relation
 *
 * @method CursusQuery leftJoinNews($relationAlias = null) Adds a LEFT JOIN clause to the query using the News relation
 * @method CursusQuery rightJoinNews($relationAlias = null) Adds a RIGHT JOIN clause to the query using the News relation
 * @method CursusQuery innerJoinNews($relationAlias = null) Adds a INNER JOIN clause to the query using the News relation
 *
 * @method CursusQuery leftJoinSchedule($relationAlias = null) Adds a LEFT JOIN clause to the query using the Schedule relation
 * @method CursusQuery rightJoinSchedule($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Schedule relation
 * @method CursusQuery innerJoinSchedule($relationAlias = null) Adds a INNER JOIN clause to the query using the Schedule relation
 *
 * @method Cursus findOne(PropelPDO $con = null) Return the first Cursus matching the query
 * @method Cursus findOneOrCreate(PropelPDO $con = null) Return the first Cursus matching the query, or a new Cursus object populated from the query conditions when no match is found
 *
 * @method Cursus findOneById(int $id) Return the first Cursus filtered by the id column
 * @method Cursus findOneByShortName(string $short_name) Return the first Cursus filtered by the short_name column
 * @method Cursus findOneByName(string $name) Return the first Cursus filtered by the name column
 * @method Cursus findOneByDescription(string $description) Return the first Cursus filtered by the description column
 * @method Cursus findOneByResponsableId(int $responsable_id) Return the first Cursus filtered by the responsable_id column
 *
 * @method array findById(int $id) Return Cursus objects filtered by the id column
 * @method array findByShortName(string $short_name) Return Cursus objects filtered by the short_name column
 * @method array findByName(string $name) Return Cursus objects filtered by the name column
 * @method array findByDescription(string $description) Return Cursus objects filtered by the description column
 * @method array findByResponsableId(int $responsable_id) Return Cursus objects filtered by the responsable_id column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseCursusQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCursusQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'Cursus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CursusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     CursusQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CursusQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CursusQuery) {
            return $criteria;
        }
        $query = new CursusQuery();
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
     * @return   Cursus|Cursus[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CursusPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CursusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Cursus A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `SHORT_NAME`, `NAME`, `RESPONSABLE_ID` FROM `cursus` WHERE `ID` = :p0';
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
            $obj = new Cursus();
            $obj->hydrate($row);
            CursusPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Cursus|Cursus[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Cursus[]|mixed the list of results, formatted by the current formatter
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
     * @return CursusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CursusPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CursusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CursusPeer::ID, $keys, Criteria::IN);
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
     * @return CursusQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(CursusPeer::ID, $id, $comparison);
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
     * @return CursusQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CursusPeer::SHORT_NAME, $shortName, $comparison);
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
     * @return CursusQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CursusPeer::NAME, $name, $comparison);
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
     * @return CursusQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CursusPeer::DESCRIPTION, $description, $comparison);
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
     * @return CursusQuery The current query, for fluid interface
     */
    public function filterByResponsableId($responsableId = null, $comparison = null)
    {
        if (is_array($responsableId)) {
            $useMinMax = false;
            if (isset($responsableId['min'])) {
                $this->addUsingAlias(CursusPeer::RESPONSABLE_ID, $responsableId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($responsableId['max'])) {
                $this->addUsingAlias(CursusPeer::RESPONSABLE_ID, $responsableId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CursusPeer::RESPONSABLE_ID, $responsableId, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CursusQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByResponsable($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(CursusPeer::RESPONSABLE_ID, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CursusPeer::RESPONSABLE_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return CursusQuery The current query, for fluid interface
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
     * Filter the query by a related Course object
     *
     * @param   Course|PropelObjectCollection $course  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CursusQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCourse($course, $comparison = null)
    {
        if ($course instanceof Course) {
            return $this
                ->addUsingAlias(CursusPeer::ID, $course->getCursusId(), $comparison);
        } elseif ($course instanceof PropelObjectCollection) {
            return $this
                ->useCourseQuery()
                ->filterByPrimaryKeys($course->getPrimaryKeys())
                ->endUse();
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
     * @return CursusQuery The current query, for fluid interface
     */
    public function joinCourse($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useCourseQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCourse($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Course', 'CourseQuery');
    }

    /**
     * Filter the query by a related EducationalPath object
     *
     * @param   EducationalPath|PropelObjectCollection $educationalPath  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CursusQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEducationalPath($educationalPath, $comparison = null)
    {
        if ($educationalPath instanceof EducationalPath) {
            return $this
                ->addUsingAlias(CursusPeer::ID, $educationalPath->getCursusId(), $comparison);
        } elseif ($educationalPath instanceof PropelObjectCollection) {
            return $this
                ->useEducationalPathQuery()
                ->filterByPrimaryKeys($educationalPath->getPrimaryKeys())
                ->endUse();
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
     * @return CursusQuery The current query, for fluid interface
     */
    public function joinEducationalPath($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useEducationalPathQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEducationalPath($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EducationalPath', 'EducationalPathQuery');
    }

    /**
     * Filter the query by a related Content object
     *
     * @param   Content|PropelObjectCollection $content  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CursusQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContent($content, $comparison = null)
    {
        if ($content instanceof Content) {
            return $this
                ->addUsingAlias(CursusPeer::ID, $content->getCursusId(), $comparison);
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
     * @return CursusQuery The current query, for fluid interface
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
     * Filter the query by a related News object
     *
     * @param   News|PropelObjectCollection $news  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CursusQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByNews($news, $comparison = null)
    {
        if ($news instanceof News) {
            return $this
                ->addUsingAlias(CursusPeer::ID, $news->getCursusId(), $comparison);
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
     * @return CursusQuery The current query, for fluid interface
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
     * Filter the query by a related Schedule object
     *
     * @param   Schedule|PropelObjectCollection $schedule  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CursusQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySchedule($schedule, $comparison = null)
    {
        if ($schedule instanceof Schedule) {
            return $this
                ->addUsingAlias(CursusPeer::ID, $schedule->getCursusId(), $comparison);
        } elseif ($schedule instanceof PropelObjectCollection) {
            return $this
                ->useScheduleQuery()
                ->filterByPrimaryKeys($schedule->getPrimaryKeys())
                ->endUse();
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
     * @return CursusQuery The current query, for fluid interface
     */
    public function joinSchedule($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useScheduleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSchedule($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Schedule', 'ScheduleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Cursus $cursus Object to remove from the list of results
     *
     * @return CursusQuery The current query, for fluid interface
     */
    public function prune($cursus = null)
    {
        if ($cursus) {
            $this->addUsingAlias(CursusPeer::ID, $cursus->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
