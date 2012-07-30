<?php


/**
 * Base class that represents a query for the 'forum_topics' table.
 *
 * 
 *
 * @method     ForumTopicQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ForumTopicQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     ForumTopicQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ForumTopicQuery orderByIsLocked($order = Criteria::ASC) Order by the is_locked column
 * @method     ForumTopicQuery orderByIsAnnouncement($order = Criteria::ASC) Order by the is_announcement column
 *
 * @method     ForumTopicQuery groupById() Group by the id column
 * @method     ForumTopicQuery groupByCategoryId() Group by the category_id column
 * @method     ForumTopicQuery groupByTitle() Group by the title column
 * @method     ForumTopicQuery groupByIsLocked() Group by the is_locked column
 * @method     ForumTopicQuery groupByIsAnnouncement() Group by the is_announcement column
 *
 * @method     ForumTopicQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ForumTopicQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ForumTopicQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ForumTopicQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method     ForumTopicQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method     ForumTopicQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method     ForumTopicQuery leftJoinForumMessage($relationAlias = null) Adds a LEFT JOIN clause to the query using the ForumMessage relation
 * @method     ForumTopicQuery rightJoinForumMessage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ForumMessage relation
 * @method     ForumTopicQuery innerJoinForumMessage($relationAlias = null) Adds a INNER JOIN clause to the query using the ForumMessage relation
 *
 * @method     ForumTopic findOne(PropelPDO $con = null) Return the first ForumTopic matching the query
 * @method     ForumTopic findOneOrCreate(PropelPDO $con = null) Return the first ForumTopic matching the query, or a new ForumTopic object populated from the query conditions when no match is found
 *
 * @method     ForumTopic findOneById(int $id) Return the first ForumTopic filtered by the id column
 * @method     ForumTopic findOneByCategoryId(int $category_id) Return the first ForumTopic filtered by the category_id column
 * @method     ForumTopic findOneByTitle(string $title) Return the first ForumTopic filtered by the title column
 * @method     ForumTopic findOneByIsLocked(boolean $is_locked) Return the first ForumTopic filtered by the is_locked column
 * @method     ForumTopic findOneByIsAnnouncement(boolean $is_announcement) Return the first ForumTopic filtered by the is_announcement column
 *
 * @method     array findById(int $id) Return ForumTopic objects filtered by the id column
 * @method     array findByCategoryId(int $category_id) Return ForumTopic objects filtered by the category_id column
 * @method     array findByTitle(string $title) Return ForumTopic objects filtered by the title column
 * @method     array findByIsLocked(boolean $is_locked) Return ForumTopic objects filtered by the is_locked column
 * @method     array findByIsAnnouncement(boolean $is_announcement) Return ForumTopic objects filtered by the is_announcement column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseForumTopicQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseForumTopicQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'ip7db', $modelName = 'ForumTopic', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ForumTopicQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ForumTopicQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ForumTopicQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ForumTopicQuery) {
            return $criteria;
        }
        $query = new ForumTopicQuery();
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
     * @return   ForumTopic|ForumTopic[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ForumTopicPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ForumTopicPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   ForumTopic A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `CATEGORY_ID`, `TITLE`, `IS_LOCKED`, `IS_ANNOUNCEMENT` FROM `forum_topics` WHERE `ID` = :p0';
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
            $obj = new ForumTopic();
            $obj->hydrate($row);
            ForumTopicPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ForumTopic|ForumTopic[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ForumTopic[]|mixed the list of results, formatted by the current formatter
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
     * @return ForumTopicQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ForumTopicPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ForumTopicQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ForumTopicPeer::ID, $keys, Criteria::IN);
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
     * @return ForumTopicQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ForumTopicPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the category_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryId(1234); // WHERE category_id = 1234
     * $query->filterByCategoryId(array(12, 34)); // WHERE category_id IN (12, 34)
     * $query->filterByCategoryId(array('min' => 12)); // WHERE category_id > 12
     * </code>
     *
     * @see       filterByCategory()
     *
     * @param     mixed $categoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ForumTopicQuery The current query, for fluid interface
     */
    public function filterByCategoryId($categoryId = null, $comparison = null)
    {
        if (is_array($categoryId)) {
            $useMinMax = false;
            if (isset($categoryId['min'])) {
                $this->addUsingAlias(ForumTopicPeer::CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryId['max'])) {
                $this->addUsingAlias(ForumTopicPeer::CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ForumTopicPeer::CATEGORY_ID, $categoryId, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ForumTopicQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ForumTopicPeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the is_locked column
     *
     * Example usage:
     * <code>
     * $query->filterByIsLocked(true); // WHERE is_locked = true
     * $query->filterByIsLocked('yes'); // WHERE is_locked = true
     * </code>
     *
     * @param     boolean|string $isLocked The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ForumTopicQuery The current query, for fluid interface
     */
    public function filterByIsLocked($isLocked = null, $comparison = null)
    {
        if (is_string($isLocked)) {
            $is_locked = in_array(strtolower($isLocked), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ForumTopicPeer::IS_LOCKED, $isLocked, $comparison);
    }

    /**
     * Filter the query on the is_announcement column
     *
     * Example usage:
     * <code>
     * $query->filterByIsAnnouncement(true); // WHERE is_announcement = true
     * $query->filterByIsAnnouncement('yes'); // WHERE is_announcement = true
     * </code>
     *
     * @param     boolean|string $isAnnouncement The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ForumTopicQuery The current query, for fluid interface
     */
    public function filterByIsAnnouncement($isAnnouncement = null, $comparison = null)
    {
        if (is_string($isAnnouncement)) {
            $is_announcement = in_array(strtolower($isAnnouncement), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ForumTopicPeer::IS_ANNOUNCEMENT, $isAnnouncement, $comparison);
    }

    /**
     * Filter the query by a related ForumCategory object
     *
     * @param   ForumCategory|PropelObjectCollection $forumCategory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ForumTopicQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCategory($forumCategory, $comparison = null)
    {
        if ($forumCategory instanceof ForumCategory) {
            return $this
                ->addUsingAlias(ForumTopicPeer::CATEGORY_ID, $forumCategory->getId(), $comparison);
        } elseif ($forumCategory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ForumTopicPeer::CATEGORY_ID, $forumCategory->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCategory() only accepts arguments of type ForumCategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Category relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ForumTopicQuery The current query, for fluid interface
     */
    public function joinCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Category');

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
            $this->addJoinObject($join, 'Category');
        }

        return $this;
    }

    /**
     * Use the Category relation ForumCategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ForumCategoryQuery A secondary query class using the current class as primary query
     */
    public function useCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Category', 'ForumCategoryQuery');
    }

    /**
     * Filter the query by a related ForumMessage object
     *
     * @param   ForumMessage|PropelObjectCollection $forumMessage  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ForumTopicQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByForumMessage($forumMessage, $comparison = null)
    {
        if ($forumMessage instanceof ForumMessage) {
            return $this
                ->addUsingAlias(ForumTopicPeer::ID, $forumMessage->getTopicId(), $comparison);
        } elseif ($forumMessage instanceof PropelObjectCollection) {
            return $this
                ->useForumMessageQuery()
                ->filterByPrimaryKeys($forumMessage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByForumMessage() only accepts arguments of type ForumMessage or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ForumMessage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ForumTopicQuery The current query, for fluid interface
     */
    public function joinForumMessage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ForumMessage');

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
            $this->addJoinObject($join, 'ForumMessage');
        }

        return $this;
    }

    /**
     * Use the ForumMessage relation ForumMessage object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ForumMessageQuery A secondary query class using the current class as primary query
     */
    public function useForumMessageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinForumMessage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ForumMessage', 'ForumMessageQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ForumTopic $forumTopic Object to remove from the list of results
     *
     * @return ForumTopicQuery The current query, for fluid interface
     */
    public function prune($forumTopic = null)
    {
        if ($forumTopic) {
            $this->addUsingAlias(ForumTopicPeer::ID, $forumTopic->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseForumTopicQuery