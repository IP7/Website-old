<?php


/**
 * Base class that represents a query for the 'newsletters_posts' table.
 *
 *
 *
 * @method NewsletterPostQuery orderById($order = Criteria::ASC) Order by the id column
 * @method NewsletterPostQuery orderByNewsletterId($order = Criteria::ASC) Order by the newsletter_id column
 * @method NewsletterPostQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method NewsletterPostQuery orderByText($order = Criteria::ASC) Order by the text column
 *
 * @method NewsletterPostQuery groupById() Group by the id column
 * @method NewsletterPostQuery groupByNewsletterId() Group by the newsletter_id column
 * @method NewsletterPostQuery groupByDate() Group by the date column
 * @method NewsletterPostQuery groupByText() Group by the text column
 *
 * @method NewsletterPostQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method NewsletterPostQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method NewsletterPostQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method NewsletterPostQuery leftJoinNewsletter($relationAlias = null) Adds a LEFT JOIN clause to the query using the Newsletter relation
 * @method NewsletterPostQuery rightJoinNewsletter($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Newsletter relation
 * @method NewsletterPostQuery innerJoinNewsletter($relationAlias = null) Adds a INNER JOIN clause to the query using the Newsletter relation
 *
 * @method NewsletterPost findOne(PropelPDO $con = null) Return the first NewsletterPost matching the query
 * @method NewsletterPost findOneOrCreate(PropelPDO $con = null) Return the first NewsletterPost matching the query, or a new NewsletterPost object populated from the query conditions when no match is found
 *
 * @method NewsletterPost findOneById(int $id) Return the first NewsletterPost filtered by the id column
 * @method NewsletterPost findOneByNewsletterId(int $newsletter_id) Return the first NewsletterPost filtered by the newsletter_id column
 * @method NewsletterPost findOneByDate(string $date) Return the first NewsletterPost filtered by the date column
 * @method NewsletterPost findOneByText(string $text) Return the first NewsletterPost filtered by the text column
 *
 * @method array findById(int $id) Return NewsletterPost objects filtered by the id column
 * @method array findByNewsletterId(int $newsletter_id) Return NewsletterPost objects filtered by the newsletter_id column
 * @method array findByDate(string $date) Return NewsletterPost objects filtered by the date column
 * @method array findByText(string $text) Return NewsletterPost objects filtered by the text column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseNewsletterPostQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseNewsletterPostQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'NewsletterPost', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new NewsletterPostQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     NewsletterPostQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return NewsletterPostQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof NewsletterPostQuery) {
            return $criteria;
        }
        $query = new NewsletterPostQuery();
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
     * @return   NewsletterPost|NewsletterPost[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NewsletterPostPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(NewsletterPostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   NewsletterPost A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `NEWSLETTER_ID`, `DATE` FROM `newsletters_posts` WHERE `ID` = :p0';
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
            $obj = new NewsletterPost();
            $obj->hydrate($row);
            NewsletterPostPeer::addInstanceToPool($obj, (string) $key);
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
     * @return NewsletterPost|NewsletterPost[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|NewsletterPost[]|mixed the list of results, formatted by the current formatter
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
     * @return NewsletterPostQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NewsletterPostPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return NewsletterPostQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NewsletterPostPeer::ID, $keys, Criteria::IN);
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
     * @return NewsletterPostQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(NewsletterPostPeer::ID, $id, $comparison);
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
     * @return NewsletterPostQuery The current query, for fluid interface
     */
    public function filterByNewsletterId($newsletterId = null, $comparison = null)
    {
        if (is_array($newsletterId)) {
            $useMinMax = false;
            if (isset($newsletterId['min'])) {
                $this->addUsingAlias(NewsletterPostPeer::NEWSLETTER_ID, $newsletterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($newsletterId['max'])) {
                $this->addUsingAlias(NewsletterPostPeer::NEWSLETTER_ID, $newsletterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterPostPeer::NEWSLETTER_ID, $newsletterId, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewsletterPostQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(NewsletterPostPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(NewsletterPostPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterPostPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the text column
     *
     * Example usage:
     * <code>
     * $query->filterByText('fooValue');   // WHERE text = 'fooValue'
     * $query->filterByText('%fooValue%'); // WHERE text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $text The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewsletterPostQuery The current query, for fluid interface
     */
    public function filterByText($text = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($text)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $text)) {
                $text = str_replace('*', '%', $text);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NewsletterPostPeer::TEXT, $text, $comparison);
    }

    /**
     * Filter the query by a related Newsletter object
     *
     * @param   Newsletter|PropelObjectCollection $newsletter The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   NewsletterPostQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByNewsletter($newsletter, $comparison = null)
    {
        if ($newsletter instanceof Newsletter) {
            return $this
                ->addUsingAlias(NewsletterPostPeer::NEWSLETTER_ID, $newsletter->getId(), $comparison);
        } elseif ($newsletter instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NewsletterPostPeer::NEWSLETTER_ID, $newsletter->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return NewsletterPostQuery The current query, for fluid interface
     */
    public function joinNewsletter($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useNewsletterQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinNewsletter($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Newsletter', 'NewsletterQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   NewsletterPost $newsletterPost Object to remove from the list of results
     *
     * @return NewsletterPostQuery The current query, for fluid interface
     */
    public function prune($newsletterPost = null)
    {
        if ($newsletterPost) {
            $this->addUsingAlias(NewsletterPostPeer::ID, $newsletterPost->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
