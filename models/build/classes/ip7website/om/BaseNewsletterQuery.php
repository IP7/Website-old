<?php


/**
 * Base class that represents a query for the 'newsletters' table.
 *
 * 
 *
 * @method     NewsletterQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     NewsletterQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     NewsletterQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     NewsletterQuery groupById() Group by the id column
 * @method     NewsletterQuery groupByName() Group by the name column
 * @method     NewsletterQuery groupByDescription() Group by the description column
 *
 * @method     NewsletterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NewsletterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NewsletterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     NewsletterQuery leftJoinCursus($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cursus relation
 * @method     NewsletterQuery rightJoinCursus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cursus relation
 * @method     NewsletterQuery innerJoinCursus($relationAlias = null) Adds a INNER JOIN clause to the query using the Cursus relation
 *
 * @method     NewsletterQuery leftJoinNewsletterPost($relationAlias = null) Adds a LEFT JOIN clause to the query using the NewsletterPost relation
 * @method     NewsletterQuery rightJoinNewsletterPost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NewsletterPost relation
 * @method     NewsletterQuery innerJoinNewsletterPost($relationAlias = null) Adds a INNER JOIN clause to the query using the NewsletterPost relation
 *
 * @method     NewsletterQuery leftJoinNewslettersSubscribers($relationAlias = null) Adds a LEFT JOIN clause to the query using the NewslettersSubscribers relation
 * @method     NewsletterQuery rightJoinNewslettersSubscribers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NewslettersSubscribers relation
 * @method     NewsletterQuery innerJoinNewslettersSubscribers($relationAlias = null) Adds a INNER JOIN clause to the query using the NewslettersSubscribers relation
 *
 * @method     Newsletter findOne(PropelPDO $con = null) Return the first Newsletter matching the query
 * @method     Newsletter findOneOrCreate(PropelPDO $con = null) Return the first Newsletter matching the query, or a new Newsletter object populated from the query conditions when no match is found
 *
 * @method     Newsletter findOneById(int $id) Return the first Newsletter filtered by the id column
 * @method     Newsletter findOneByName(string $name) Return the first Newsletter filtered by the name column
 * @method     Newsletter findOneByDescription(string $description) Return the first Newsletter filtered by the description column
 *
 * @method     array findById(int $id) Return Newsletter objects filtered by the id column
 * @method     array findByName(string $name) Return Newsletter objects filtered by the name column
 * @method     array findByDescription(string $description) Return Newsletter objects filtered by the description column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseNewsletterQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseNewsletterQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'ip7db', $modelName = 'Newsletter', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new NewsletterQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     NewsletterQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return NewsletterQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof NewsletterQuery) {
            return $criteria;
        }
        $query = new NewsletterQuery();
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
     * @return   Newsletter|Newsletter[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NewsletterPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(NewsletterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Newsletter A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `NAME`, `DESCRIPTION` FROM `newsletters` WHERE `ID` = :p0';
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
            $obj = new Newsletter();
            $obj->hydrate($row);
            NewsletterPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Newsletter|Newsletter[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Newsletter[]|mixed the list of results, formatted by the current formatter
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
     * @return NewsletterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NewsletterPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return NewsletterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NewsletterPeer::ID, $keys, Criteria::IN);
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
     * @return NewsletterQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(NewsletterPeer::ID, $id, $comparison);
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
     * @return NewsletterQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NewsletterPeer::NAME, $name, $comparison);
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
     * @return NewsletterQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NewsletterPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related Cursus object
     *
     * @param   Cursus|PropelObjectCollection $cursus  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   NewsletterQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCursus($cursus, $comparison = null)
    {
        if ($cursus instanceof Cursus) {
            return $this
                ->addUsingAlias(NewsletterPeer::ID, $cursus->getNewsletterId(), $comparison);
        } elseif ($cursus instanceof PropelObjectCollection) {
            return $this
                ->useCursusQuery()
                ->filterByPrimaryKeys($cursus->getPrimaryKeys())
                ->endUse();
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
     * @return NewsletterQuery The current query, for fluid interface
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
     * Filter the query by a related NewsletterPost object
     *
     * @param   NewsletterPost|PropelObjectCollection $newsletterPost  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   NewsletterQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByNewsletterPost($newsletterPost, $comparison = null)
    {
        if ($newsletterPost instanceof NewsletterPost) {
            return $this
                ->addUsingAlias(NewsletterPeer::ID, $newsletterPost->getNewsletterId(), $comparison);
        } elseif ($newsletterPost instanceof PropelObjectCollection) {
            return $this
                ->useNewsletterPostQuery()
                ->filterByPrimaryKeys($newsletterPost->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNewsletterPost() only accepts arguments of type NewsletterPost or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the NewsletterPost relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return NewsletterQuery The current query, for fluid interface
     */
    public function joinNewsletterPost($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('NewsletterPost');

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
            $this->addJoinObject($join, 'NewsletterPost');
        }

        return $this;
    }

    /**
     * Use the NewsletterPost relation NewsletterPost object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   NewsletterPostQuery A secondary query class using the current class as primary query
     */
    public function useNewsletterPostQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinNewsletterPost($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'NewsletterPost', 'NewsletterPostQuery');
    }

    /**
     * Filter the query by a related NewslettersSubscribers object
     *
     * @param   NewslettersSubscribers|PropelObjectCollection $newslettersSubscribers  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   NewsletterQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByNewslettersSubscribers($newslettersSubscribers, $comparison = null)
    {
        if ($newslettersSubscribers instanceof NewslettersSubscribers) {
            return $this
                ->addUsingAlias(NewsletterPeer::ID, $newslettersSubscribers->getNewsletterId(), $comparison);
        } elseif ($newslettersSubscribers instanceof PropelObjectCollection) {
            return $this
                ->useNewslettersSubscribersQuery()
                ->filterByPrimaryKeys($newslettersSubscribers->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNewslettersSubscribers() only accepts arguments of type NewslettersSubscribers or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the NewslettersSubscribers relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return NewsletterQuery The current query, for fluid interface
     */
    public function joinNewslettersSubscribers($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('NewslettersSubscribers');

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
            $this->addJoinObject($join, 'NewslettersSubscribers');
        }

        return $this;
    }

    /**
     * Use the NewslettersSubscribers relation NewslettersSubscribers object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   NewslettersSubscribersQuery A secondary query class using the current class as primary query
     */
    public function useNewslettersSubscribersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNewslettersSubscribers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'NewslettersSubscribers', 'NewslettersSubscribersQuery');
    }

    /**
     * Filter the query by a related User object
     * using the newsletters_subscribers table as cross reference
     *
     * @param   User $user the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   NewsletterQuery The current query, for fluid interface
     */
    public function filterBySubscriber($user, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useNewslettersSubscribersQuery()
            ->filterBySubscriber($user, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   Newsletter $newsletter Object to remove from the list of results
     *
     * @return NewsletterQuery The current query, for fluid interface
     */
    public function prune($newsletter = null)
    {
        if ($newsletter) {
            $this->addUsingAlias(NewsletterPeer::ID, $newsletter->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseNewsletterQuery