<?php


/**
 * Base class that represents a query for the 'ads_tags' table.
 *
 *
 *
 * @method AdsTagsQuery orderByTagId($order = Criteria::ASC) Order by the tag_id column
 * @method AdsTagsQuery orderByAdId($order = Criteria::ASC) Order by the ad_id column
 *
 * @method AdsTagsQuery groupByTagId() Group by the tag_id column
 * @method AdsTagsQuery groupByAdId() Group by the ad_id column
 *
 * @method AdsTagsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AdsTagsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AdsTagsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AdsTagsQuery leftJoinTag($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tag relation
 * @method AdsTagsQuery rightJoinTag($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tag relation
 * @method AdsTagsQuery innerJoinTag($relationAlias = null) Adds a INNER JOIN clause to the query using the Tag relation
 *
 * @method AdsTagsQuery leftJoinAd($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ad relation
 * @method AdsTagsQuery rightJoinAd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ad relation
 * @method AdsTagsQuery innerJoinAd($relationAlias = null) Adds a INNER JOIN clause to the query using the Ad relation
 *
 * @method AdsTags findOne(PropelPDO $con = null) Return the first AdsTags matching the query
 * @method AdsTags findOneOrCreate(PropelPDO $con = null) Return the first AdsTags matching the query, or a new AdsTags object populated from the query conditions when no match is found
 *
 * @method AdsTags findOneByTagId(int $tag_id) Return the first AdsTags filtered by the tag_id column
 * @method AdsTags findOneByAdId(int $ad_id) Return the first AdsTags filtered by the ad_id column
 *
 * @method array findByTagId(int $tag_id) Return AdsTags objects filtered by the tag_id column
 * @method array findByAdId(int $ad_id) Return AdsTags objects filtered by the ad_id column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseAdsTagsQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAdsTagsQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'AdsTags', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AdsTagsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     AdsTagsQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AdsTagsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AdsTagsQuery) {
            return $criteria;
        }
        $query = new AdsTagsQuery();
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
                         A Primary key composition: [$tag_id, $ad_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   AdsTags|AdsTags[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AdsTagsPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AdsTagsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   AdsTags A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `TAG_ID`, `AD_ID` FROM `ads_tags` WHERE `TAG_ID` = :p0 AND `AD_ID` = :p1';
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
            $obj = new AdsTags();
            $obj->hydrate($row);
            AdsTagsPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return AdsTags|AdsTags[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AdsTags[]|mixed the list of results, formatted by the current formatter
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
     * @return AdsTagsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(AdsTagsPeer::TAG_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(AdsTagsPeer::AD_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AdsTagsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(AdsTagsPeer::TAG_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(AdsTagsPeer::AD_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the tag_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTagId(1234); // WHERE tag_id = 1234
     * $query->filterByTagId(array(12, 34)); // WHERE tag_id IN (12, 34)
     * $query->filterByTagId(array('min' => 12)); // WHERE tag_id > 12
     * </code>
     *
     * @see       filterByTag()
     *
     * @param     mixed $tagId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdsTagsQuery The current query, for fluid interface
     */
    public function filterByTagId($tagId = null, $comparison = null)
    {
        if (is_array($tagId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(AdsTagsPeer::TAG_ID, $tagId, $comparison);
    }

    /**
     * Filter the query on the ad_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAdId(1234); // WHERE ad_id = 1234
     * $query->filterByAdId(array(12, 34)); // WHERE ad_id IN (12, 34)
     * $query->filterByAdId(array('min' => 12)); // WHERE ad_id > 12
     * </code>
     *
     * @see       filterByAd()
     *
     * @param     mixed $adId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdsTagsQuery The current query, for fluid interface
     */
    public function filterByAdId($adId = null, $comparison = null)
    {
        if (is_array($adId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(AdsTagsPeer::AD_ID, $adId, $comparison);
    }

    /**
     * Filter the query by a related Tag object
     *
     * @param   Tag|PropelObjectCollection $tag The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   AdsTagsQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTag($tag, $comparison = null)
    {
        if ($tag instanceof Tag) {
            return $this
                ->addUsingAlias(AdsTagsPeer::TAG_ID, $tag->getId(), $comparison);
        } elseif ($tag instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AdsTagsPeer::TAG_ID, $tag->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTag() only accepts arguments of type Tag or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tag relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AdsTagsQuery The current query, for fluid interface
     */
    public function joinTag($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tag');

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
            $this->addJoinObject($join, 'Tag');
        }

        return $this;
    }

    /**
     * Use the Tag relation Tag object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TagQuery A secondary query class using the current class as primary query
     */
    public function useTagQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTag($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tag', 'TagQuery');
    }

    /**
     * Filter the query by a related Ad object
     *
     * @param   Ad|PropelObjectCollection $ad The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   AdsTagsQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAd($ad, $comparison = null)
    {
        if ($ad instanceof Ad) {
            return $this
                ->addUsingAlias(AdsTagsPeer::AD_ID, $ad->getId(), $comparison);
        } elseif ($ad instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AdsTagsPeer::AD_ID, $ad->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAd() only accepts arguments of type Ad or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ad relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AdsTagsQuery The current query, for fluid interface
     */
    public function joinAd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ad');

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
            $this->addJoinObject($join, 'Ad');
        }

        return $this;
    }

    /**
     * Use the Ad relation Ad object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AdQuery A secondary query class using the current class as primary query
     */
    public function useAdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ad', 'AdQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   AdsTags $adsTags Object to remove from the list of results
     *
     * @return AdsTagsQuery The current query, for fluid interface
     */
    public function prune($adsTags = null)
    {
        if ($adsTags) {
            $this->addCond('pruneCond0', $this->getAliasedColName(AdsTagsPeer::TAG_ID), $adsTags->getTagId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(AdsTagsPeer::AD_ID), $adsTags->getAdId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
