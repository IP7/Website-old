<?php


/**
 * Base class that represents a query for the 'tags' table.
 *
 *
 *
 * @method TagQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TagQuery orderByTitle($order = Criteria::ASC) Order by the title column
 *
 * @method TagQuery groupById() Group by the id column
 * @method TagQuery groupByTitle() Group by the title column
 *
 * @method TagQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TagQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TagQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TagQuery leftJoinAlert($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alert relation
 * @method TagQuery rightJoinAlert($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alert relation
 * @method TagQuery innerJoinAlert($relationAlias = null) Adds a INNER JOIN clause to the query using the Alert relation
 *
 * @method TagQuery leftJoinContentsTags($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContentsTags relation
 * @method TagQuery rightJoinContentsTags($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContentsTags relation
 * @method TagQuery innerJoinContentsTags($relationAlias = null) Adds a INNER JOIN clause to the query using the ContentsTags relation
 *
 * @method TagQuery leftJoinAdsTags($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdsTags relation
 * @method TagQuery rightJoinAdsTags($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdsTags relation
 * @method TagQuery innerJoinAdsTags($relationAlias = null) Adds a INNER JOIN clause to the query using the AdsTags relation
 *
 * @method Tag findOne(PropelPDO $con = null) Return the first Tag matching the query
 * @method Tag findOneOrCreate(PropelPDO $con = null) Return the first Tag matching the query, or a new Tag object populated from the query conditions when no match is found
 *
 * @method Tag findOneById(int $id) Return the first Tag filtered by the id column
 * @method Tag findOneByTitle(string $title) Return the first Tag filtered by the title column
 *
 * @method array findById(int $id) Return Tag objects filtered by the id column
 * @method array findByTitle(string $title) Return Tag objects filtered by the title column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseTagQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTagQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'Tag', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TagQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TagQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TagQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TagQuery) {
            return $criteria;
        }
        $query = new TagQuery();
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
     * @return   Tag|Tag[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TagPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TagPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Tag A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `TITLE` FROM `tags` WHERE `ID` = :p0';
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
            $obj = new Tag();
            $obj->hydrate($row);
            TagPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Tag|Tag[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Tag[]|mixed the list of results, formatted by the current formatter
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
     * @return TagQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TagPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TagQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TagPeer::ID, $keys, Criteria::IN);
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
     * @return TagQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TagPeer::ID, $id, $comparison);
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
     * @return TagQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TagPeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query by a related Alert object
     *
     * @param   Alert|PropelObjectCollection $alert  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TagQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAlert($alert, $comparison = null)
    {
        if ($alert instanceof Alert) {
            return $this
                ->addUsingAlias(TagPeer::ID, $alert->getTagId(), $comparison);
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
     * @return TagQuery The current query, for fluid interface
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
     * Filter the query by a related ContentsTags object
     *
     * @param   ContentsTags|PropelObjectCollection $contentsTags  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TagQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContentsTags($contentsTags, $comparison = null)
    {
        if ($contentsTags instanceof ContentsTags) {
            return $this
                ->addUsingAlias(TagPeer::ID, $contentsTags->getTagId(), $comparison);
        } elseif ($contentsTags instanceof PropelObjectCollection) {
            return $this
                ->useContentsTagsQuery()
                ->filterByPrimaryKeys($contentsTags->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByContentsTags() only accepts arguments of type ContentsTags or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ContentsTags relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TagQuery The current query, for fluid interface
     */
    public function joinContentsTags($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ContentsTags');

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
            $this->addJoinObject($join, 'ContentsTags');
        }

        return $this;
    }

    /**
     * Use the ContentsTags relation ContentsTags object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContentsTagsQuery A secondary query class using the current class as primary query
     */
    public function useContentsTagsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContentsTags($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ContentsTags', 'ContentsTagsQuery');
    }

    /**
     * Filter the query by a related AdsTags object
     *
     * @param   AdsTags|PropelObjectCollection $adsTags  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TagQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAdsTags($adsTags, $comparison = null)
    {
        if ($adsTags instanceof AdsTags) {
            return $this
                ->addUsingAlias(TagPeer::ID, $adsTags->getTagId(), $comparison);
        } elseif ($adsTags instanceof PropelObjectCollection) {
            return $this
                ->useAdsTagsQuery()
                ->filterByPrimaryKeys($adsTags->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAdsTags() only accepts arguments of type AdsTags or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AdsTags relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TagQuery The current query, for fluid interface
     */
    public function joinAdsTags($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AdsTags');

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
            $this->addJoinObject($join, 'AdsTags');
        }

        return $this;
    }

    /**
     * Use the AdsTags relation AdsTags object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AdsTagsQuery A secondary query class using the current class as primary query
     */
    public function useAdsTagsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAdsTags($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AdsTags', 'AdsTagsQuery');
    }

    /**
     * Filter the query by a related Content object
     * using the contents_tags table as cross reference
     *
     * @param   Content $content the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TagQuery The current query, for fluid interface
     */
    public function filterByContent($content, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useContentsTagsQuery()
            ->filterByContent($content, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related Ad object
     * using the ads_tags table as cross reference
     *
     * @param   Ad $ad the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TagQuery The current query, for fluid interface
     */
    public function filterByAd($ad, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useAdsTagsQuery()
            ->filterByAd($ad, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   Tag $tag Object to remove from the list of results
     *
     * @return TagQuery The current query, for fluid interface
     */
    public function prune($tag = null)
    {
        if ($tag) {
            $this->addUsingAlias(TagPeer::ID, $tag->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
