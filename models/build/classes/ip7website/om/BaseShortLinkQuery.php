<?php


/**
 * Base class that represents a query for the 'shortlinks' table.
 *
 *
 *
 * @method ShortLinkQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ShortLinkQuery orderByShortUrl($order = Criteria::ASC) Order by the short_url column
 * @method ShortLinkQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method ShortLinkQuery orderByClicksCount($order = Criteria::ASC) Order by the clicks_count column
 *
 * @method ShortLinkQuery groupById() Group by the id column
 * @method ShortLinkQuery groupByShortUrl() Group by the short_url column
 * @method ShortLinkQuery groupByUrl() Group by the url column
 * @method ShortLinkQuery groupByClicksCount() Group by the clicks_count column
 *
 * @method ShortLinkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ShortLinkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ShortLinkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ShortLink findOne(PropelPDO $con = null) Return the first ShortLink matching the query
 * @method ShortLink findOneOrCreate(PropelPDO $con = null) Return the first ShortLink matching the query, or a new ShortLink object populated from the query conditions when no match is found
 *
 * @method ShortLink findOneByShortUrl(string $short_url) Return the first ShortLink filtered by the short_url column
 * @method ShortLink findOneByUrl(string $url) Return the first ShortLink filtered by the url column
 * @method ShortLink findOneByClicksCount(int $clicks_count) Return the first ShortLink filtered by the clicks_count column
 *
 * @method array findById(int $id) Return ShortLink objects filtered by the id column
 * @method array findByShortUrl(string $short_url) Return ShortLink objects filtered by the short_url column
 * @method array findByUrl(string $url) Return ShortLink objects filtered by the url column
 * @method array findByClicksCount(int $clicks_count) Return ShortLink objects filtered by the clicks_count column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseShortLinkQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseShortLinkQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'ShortLink', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ShortLinkQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ShortLinkQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ShortLinkQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ShortLinkQuery) {
            return $criteria;
        }
        $query = new ShortLinkQuery();
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
     * @return   ShortLink|ShortLink[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ShortLinkPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ShortLinkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 ShortLink A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 ShortLink A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `short_url`, `url`, `clicks_count` FROM `shortlinks` WHERE `id` = :p0';
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
            $obj = new ShortLink();
            $obj->hydrate($row);
            ShortLinkPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ShortLink|ShortLink[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ShortLink[]|mixed the list of results, formatted by the current formatter
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
     * @return ShortLinkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ShortLinkPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ShortLinkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ShortLinkPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShortLinkQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ShortLinkPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ShortLinkPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShortLinkPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the short_url column
     *
     * Example usage:
     * <code>
     * $query->filterByShortUrl('fooValue');   // WHERE short_url = 'fooValue'
     * $query->filterByShortUrl('%fooValue%'); // WHERE short_url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shortUrl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShortLinkQuery The current query, for fluid interface
     */
    public function filterByShortUrl($shortUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shortUrl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shortUrl)) {
                $shortUrl = str_replace('*', '%', $shortUrl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShortLinkPeer::SHORT_URL, $shortUrl, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%'); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShortLinkQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $url)) {
                $url = str_replace('*', '%', $url);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShortLinkPeer::URL, $url, $comparison);
    }

    /**
     * Filter the query on the clicks_count column
     *
     * Example usage:
     * <code>
     * $query->filterByClicksCount(1234); // WHERE clicks_count = 1234
     * $query->filterByClicksCount(array(12, 34)); // WHERE clicks_count IN (12, 34)
     * $query->filterByClicksCount(array('min' => 12)); // WHERE clicks_count >= 12
     * $query->filterByClicksCount(array('max' => 12)); // WHERE clicks_count <= 12
     * </code>
     *
     * @param     mixed $clicksCount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShortLinkQuery The current query, for fluid interface
     */
    public function filterByClicksCount($clicksCount = null, $comparison = null)
    {
        if (is_array($clicksCount)) {
            $useMinMax = false;
            if (isset($clicksCount['min'])) {
                $this->addUsingAlias(ShortLinkPeer::CLICKS_COUNT, $clicksCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clicksCount['max'])) {
                $this->addUsingAlias(ShortLinkPeer::CLICKS_COUNT, $clicksCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShortLinkPeer::CLICKS_COUNT, $clicksCount, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ShortLink $shortLink Object to remove from the list of results
     *
     * @return ShortLinkQuery The current query, for fluid interface
     */
    public function prune($shortLink = null)
    {
        if ($shortLink) {
            $this->addUsingAlias(ShortLinkPeer::ID, $shortLink->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
