<?php


/**
 * Base class that represents a query for the 'newsletters_subscribers' table.
 *
 * 
 *
 * @method     NewslettersSubscribersQuery orderBySubscriberId($order = Criteria::ASC) Order by the subscriber_id column
 * @method     NewslettersSubscribersQuery orderByNewsletterId($order = Criteria::ASC) Order by the newsletter_id column
 *
 * @method     NewslettersSubscribersQuery groupBySubscriberId() Group by the subscriber_id column
 * @method     NewslettersSubscribersQuery groupByNewsletterId() Group by the newsletter_id column
 *
 * @method     NewslettersSubscribersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NewslettersSubscribersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NewslettersSubscribersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     NewslettersSubscribersQuery leftJoinSubscriber($relationAlias = null) Adds a LEFT JOIN clause to the query using the Subscriber relation
 * @method     NewslettersSubscribersQuery rightJoinSubscriber($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Subscriber relation
 * @method     NewslettersSubscribersQuery innerJoinSubscriber($relationAlias = null) Adds a INNER JOIN clause to the query using the Subscriber relation
 *
 * @method     NewslettersSubscribersQuery leftJoinNewsletter($relationAlias = null) Adds a LEFT JOIN clause to the query using the Newsletter relation
 * @method     NewslettersSubscribersQuery rightJoinNewsletter($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Newsletter relation
 * @method     NewslettersSubscribersQuery innerJoinNewsletter($relationAlias = null) Adds a INNER JOIN clause to the query using the Newsletter relation
 *
 * @method     NewslettersSubscribers findOne(PropelPDO $con = null) Return the first NewslettersSubscribers matching the query
 * @method     NewslettersSubscribers findOneOrCreate(PropelPDO $con = null) Return the first NewslettersSubscribers matching the query, or a new NewslettersSubscribers object populated from the query conditions when no match is found
 *
 * @method     NewslettersSubscribers findOneBySubscriberId(int $subscriber_id) Return the first NewslettersSubscribers filtered by the subscriber_id column
 * @method     NewslettersSubscribers findOneByNewsletterId(int $newsletter_id) Return the first NewslettersSubscribers filtered by the newsletter_id column
 *
 * @method     array findBySubscriberId(int $subscriber_id) Return NewslettersSubscribers objects filtered by the subscriber_id column
 * @method     array findByNewsletterId(int $newsletter_id) Return NewslettersSubscribers objects filtered by the newsletter_id column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseNewslettersSubscribersQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseNewslettersSubscribersQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'NewslettersSubscribers', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new NewslettersSubscribersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     NewslettersSubscribersQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return NewslettersSubscribersQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof NewslettersSubscribersQuery) {
            return $criteria;
        }
        $query = new NewslettersSubscribersQuery();
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
                         A Primary key composition: [$subscriber_id, $newsletter_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   NewslettersSubscribers|NewslettersSubscribers[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NewslettersSubscribersPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(NewslettersSubscribersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   NewslettersSubscribers A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `SUBSCRIBER_ID`, `NEWSLETTER_ID` FROM `newsletters_subscribers` WHERE `SUBSCRIBER_ID` = :p0 AND `NEWSLETTER_ID` = :p1';
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
            $obj = new NewslettersSubscribers();
            $obj->hydrate($row);
            NewslettersSubscribersPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return NewslettersSubscribers|NewslettersSubscribers[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|NewslettersSubscribers[]|mixed the list of results, formatted by the current formatter
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
     * @return NewslettersSubscribersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(NewslettersSubscribersPeer::SUBSCRIBER_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(NewslettersSubscribersPeer::NEWSLETTER_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return NewslettersSubscribersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(NewslettersSubscribersPeer::SUBSCRIBER_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(NewslettersSubscribersPeer::NEWSLETTER_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the subscriber_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySubscriberId(1234); // WHERE subscriber_id = 1234
     * $query->filterBySubscriberId(array(12, 34)); // WHERE subscriber_id IN (12, 34)
     * $query->filterBySubscriberId(array('min' => 12)); // WHERE subscriber_id > 12
     * </code>
     *
     * @see       filterBySubscriber()
     *
     * @param     mixed $subscriberId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewslettersSubscribersQuery The current query, for fluid interface
     */
    public function filterBySubscriberId($subscriberId = null, $comparison = null)
    {
        if (is_array($subscriberId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(NewslettersSubscribersPeer::SUBSCRIBER_ID, $subscriberId, $comparison);
    }

    /**
     * Filter the query on the newsletter_id column
     *
     * Example usage:
     * <code>
     * $query->filterByNewsletterId(1234); // WHERE newsletter_id = 1234
     * $query->filterByNewsletterId(array(12, 34)); // WHERE newsletter_id IN (12, 34)
     * $query->filterByNewsletterId(array('min' => 12)); // WHERE newsletter_id > 12
     * </code>
     *
     * @see       filterByNewsletter()
     *
     * @param     mixed $newsletterId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewslettersSubscribersQuery The current query, for fluid interface
     */
    public function filterByNewsletterId($newsletterId = null, $comparison = null)
    {
        if (is_array($newsletterId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(NewslettersSubscribersPeer::NEWSLETTER_ID, $newsletterId, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   NewslettersSubscribersQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySubscriber($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(NewslettersSubscribersPeer::SUBSCRIBER_ID, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NewslettersSubscribersPeer::SUBSCRIBER_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySubscriber() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Subscriber relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return NewslettersSubscribersQuery The current query, for fluid interface
     */
    public function joinSubscriber($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Subscriber');

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
            $this->addJoinObject($join, 'Subscriber');
        }

        return $this;
    }

    /**
     * Use the Subscriber relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserQuery A secondary query class using the current class as primary query
     */
    public function useSubscriberQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSubscriber($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Subscriber', 'UserQuery');
    }

    /**
     * Filter the query by a related Newsletter object
     *
     * @param   Newsletter|PropelObjectCollection $newsletter The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   NewslettersSubscribersQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByNewsletter($newsletter, $comparison = null)
    {
        if ($newsletter instanceof Newsletter) {
            return $this
                ->addUsingAlias(NewslettersSubscribersPeer::NEWSLETTER_ID, $newsletter->getId(), $comparison);
        } elseif ($newsletter instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NewslettersSubscribersPeer::NEWSLETTER_ID, $newsletter->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByNewsletter() only accepts arguments of type Newsletter or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Newsletter relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return NewslettersSubscribersQuery The current query, for fluid interface
     */
    public function joinNewsletter($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Newsletter');

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
            $this->addJoinObject($join, 'Newsletter');
        }

        return $this;
    }

    /**
     * Use the Newsletter relation Newsletter object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   NewsletterQuery A secondary query class using the current class as primary query
     */
    public function useNewsletterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNewsletter($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Newsletter', 'NewsletterQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   NewslettersSubscribers $newslettersSubscribers Object to remove from the list of results
     *
     * @return NewslettersSubscribersQuery The current query, for fluid interface
     */
    public function prune($newslettersSubscribers = null)
    {
        if ($newslettersSubscribers) {
            $this->addCond('pruneCond0', $this->getAliasedColName(NewslettersSubscribersPeer::SUBSCRIBER_ID), $newslettersSubscribers->getSubscriberId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(NewslettersSubscribersPeer::NEWSLETTER_ID), $newslettersSubscribers->getNewsletterId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

} // BaseNewslettersSubscribersQuery