<?php


/**
 * Base class that represents a query for the 'forum_categories' table.
 *
 *
 *
 * @method ForumCategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ForumCategoryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ForumCategoryQuery orderByParentId($order = Criteria::ASC) Order by the parent_id column
 * @method ForumCategoryQuery orderByAccessRights($order = Criteria::ASC) Order by the access_rights column
 *
 * @method ForumCategoryQuery groupById() Group by the id column
 * @method ForumCategoryQuery groupByName() Group by the name column
 * @method ForumCategoryQuery groupByParentId() Group by the parent_id column
 * @method ForumCategoryQuery groupByAccessRights() Group by the access_rights column
 *
 * @method ForumCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ForumCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ForumCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ForumCategoryQuery leftJoinParentCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the ParentCategory relation
 * @method ForumCategoryQuery rightJoinParentCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ParentCategory relation
 * @method ForumCategoryQuery innerJoinParentCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the ParentCategory relation
 *
 * @method ForumCategoryQuery leftJoinForumCategoryRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the ForumCategoryRelatedById relation
 * @method ForumCategoryQuery rightJoinForumCategoryRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ForumCategoryRelatedById relation
 * @method ForumCategoryQuery innerJoinForumCategoryRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the ForumCategoryRelatedById relation
 *
 * @method ForumCategoryQuery leftJoinForumTopic($relationAlias = null) Adds a LEFT JOIN clause to the query using the ForumTopic relation
 * @method ForumCategoryQuery rightJoinForumTopic($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ForumTopic relation
 * @method ForumCategoryQuery innerJoinForumTopic($relationAlias = null) Adds a INNER JOIN clause to the query using the ForumTopic relation
 *
 * @method ForumCategory findOne(PropelPDO $con = null) Return the first ForumCategory matching the query
 * @method ForumCategory findOneOrCreate(PropelPDO $con = null) Return the first ForumCategory matching the query, or a new ForumCategory object populated from the query conditions when no match is found
 *
 * @method ForumCategory findOneById(int $id) Return the first ForumCategory filtered by the id column
 * @method ForumCategory findOneByName(string $name) Return the first ForumCategory filtered by the name column
 * @method ForumCategory findOneByParentId(int $parent_id) Return the first ForumCategory filtered by the parent_id column
 * @method ForumCategory findOneByAccessRights(int $access_rights) Return the first ForumCategory filtered by the access_rights column
 *
 * @method array findById(int $id) Return ForumCategory objects filtered by the id column
 * @method array findByName(string $name) Return ForumCategory objects filtered by the name column
 * @method array findByParentId(int $parent_id) Return ForumCategory objects filtered by the parent_id column
 * @method array findByAccessRights(int $access_rights) Return ForumCategory objects filtered by the access_rights column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseForumCategoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseForumCategoryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'ForumCategory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ForumCategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ForumCategoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ForumCategoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ForumCategoryQuery) {
            return $criteria;
        }
        $query = new ForumCategoryQuery();
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
     * @return   ForumCategory|ForumCategory[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ForumCategoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ForumCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   ForumCategory A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `NAME`, `PARENT_ID`, `ACCESS_RIGHTS` FROM `forum_categories` WHERE `ID` = :p0';
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
            $obj = new ForumCategory();
            $obj->hydrate($row);
            ForumCategoryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ForumCategory|ForumCategory[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ForumCategory[]|mixed the list of results, formatted by the current formatter
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
     * @return ForumCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ForumCategoryPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ForumCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ForumCategoryPeer::ID, $keys, Criteria::IN);
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
     * @return ForumCategoryQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ForumCategoryPeer::ID, $id, $comparison);
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
     * @return ForumCategoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ForumCategoryPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the parent_id column
     *
     * Example usage:
     * <code>
     * $query->filterByParentId(1234); // WHERE parent_id = 1234
     * $query->filterByParentId(array(12, 34)); // WHERE parent_id IN (12, 34)
     * $query->filterByParentId(array('min' => 12)); // WHERE parent_id > 12
     * </code>
     *
     * @see       filterByParentCategory()
     *
     * @param     mixed $parentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ForumCategoryQuery The current query, for fluid interface
     */
    public function filterByParentId($parentId = null, $comparison = null)
    {
        if (is_array($parentId)) {
            $useMinMax = false;
            if (isset($parentId['min'])) {
                $this->addUsingAlias(ForumCategoryPeer::PARENT_ID, $parentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentId['max'])) {
                $this->addUsingAlias(ForumCategoryPeer::PARENT_ID, $parentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumCategoryPeer::PARENT_ID, $parentId, $comparison);
    }

    /**
     * Filter the query on the access_rights column
     *
     * Example usage:
     * <code>
     * $query->filterByAccessRights(1234); // WHERE access_rights = 1234
     * $query->filterByAccessRights(array(12, 34)); // WHERE access_rights IN (12, 34)
     * $query->filterByAccessRights(array('min' => 12)); // WHERE access_rights > 12
     * </code>
     *
     * @param     mixed $accessRights The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ForumCategoryQuery The current query, for fluid interface
     */
    public function filterByAccessRights($accessRights = null, $comparison = null)
    {
        if (is_array($accessRights)) {
            $useMinMax = false;
            if (isset($accessRights['min'])) {
                $this->addUsingAlias(ForumCategoryPeer::ACCESS_RIGHTS, $accessRights['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accessRights['max'])) {
                $this->addUsingAlias(ForumCategoryPeer::ACCESS_RIGHTS, $accessRights['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumCategoryPeer::ACCESS_RIGHTS, $accessRights, $comparison);
    }

    /**
     * Filter the query by a related ForumCategory object
     *
     * @param   ForumCategory|PropelObjectCollection $forumCategory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ForumCategoryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByParentCategory($forumCategory, $comparison = null)
    {
        if ($forumCategory instanceof ForumCategory) {
            return $this
                ->addUsingAlias(ForumCategoryPeer::PARENT_ID, $forumCategory->getId(), $comparison);
        } elseif ($forumCategory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ForumCategoryPeer::PARENT_ID, $forumCategory->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByParentCategory() only accepts arguments of type ForumCategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ParentCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ForumCategoryQuery The current query, for fluid interface
     */
    public function joinParentCategory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ParentCategory');

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
            $this->addJoinObject($join, 'ParentCategory');
        }

        return $this;
    }

    /**
     * Use the ParentCategory relation ForumCategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ForumCategoryQuery A secondary query class using the current class as primary query
     */
    public function useParentCategoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinParentCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ParentCategory', 'ForumCategoryQuery');
    }

    /**
     * Filter the query by a related ForumCategory object
     *
     * @param   ForumCategory|PropelObjectCollection $forumCategory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ForumCategoryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByForumCategoryRelatedById($forumCategory, $comparison = null)
    {
        if ($forumCategory instanceof ForumCategory) {
            return $this
                ->addUsingAlias(ForumCategoryPeer::ID, $forumCategory->getParentId(), $comparison);
        } elseif ($forumCategory instanceof PropelObjectCollection) {
            return $this
                ->useForumCategoryRelatedByIdQuery()
                ->filterByPrimaryKeys($forumCategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByForumCategoryRelatedById() only accepts arguments of type ForumCategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ForumCategoryRelatedById relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ForumCategoryQuery The current query, for fluid interface
     */
    public function joinForumCategoryRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ForumCategoryRelatedById');

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
            $this->addJoinObject($join, 'ForumCategoryRelatedById');
        }

        return $this;
    }

    /**
     * Use the ForumCategoryRelatedById relation ForumCategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ForumCategoryQuery A secondary query class using the current class as primary query
     */
    public function useForumCategoryRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinForumCategoryRelatedById($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ForumCategoryRelatedById', 'ForumCategoryQuery');
    }

    /**
     * Filter the query by a related ForumTopic object
     *
     * @param   ForumTopic|PropelObjectCollection $forumTopic  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ForumCategoryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByForumTopic($forumTopic, $comparison = null)
    {
        if ($forumTopic instanceof ForumTopic) {
            return $this
                ->addUsingAlias(ForumCategoryPeer::ID, $forumTopic->getCategoryId(), $comparison);
        } elseif ($forumTopic instanceof PropelObjectCollection) {
            return $this
                ->useForumTopicQuery()
                ->filterByPrimaryKeys($forumTopic->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByForumTopic() only accepts arguments of type ForumTopic or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ForumTopic relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ForumCategoryQuery The current query, for fluid interface
     */
    public function joinForumTopic($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ForumTopic');

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
            $this->addJoinObject($join, 'ForumTopic');
        }

        return $this;
    }

    /**
     * Use the ForumTopic relation ForumTopic object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ForumTopicQuery A secondary query class using the current class as primary query
     */
    public function useForumTopicQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinForumTopic($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ForumTopic', 'ForumTopicQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ForumCategory $forumCategory Object to remove from the list of results
     *
     * @return ForumCategoryQuery The current query, for fluid interface
     */
    public function prune($forumCategory = null)
    {
        if ($forumCategory) {
            $this->addUsingAlias(ForumCategoryPeer::ID, $forumCategory->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
