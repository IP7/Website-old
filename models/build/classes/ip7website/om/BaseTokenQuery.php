<?php


/**
 * Base class that represents a query for the 'tokens' table.
 *
 *
 *
 * @method TokenQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TokenQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method TokenQuery orderByExpirationDate($order = Criteria::ASC) Order by the expiration_date column
 * @method TokenQuery orderByRights($order = Criteria::ASC) Order by the rights column
 * @method TokenQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method TokenQuery orderByMethod($order = Criteria::ASC) Order by the method column
 *
 * @method TokenQuery groupById() Group by the id column
 * @method TokenQuery groupByUserId() Group by the user_id column
 * @method TokenQuery groupByExpirationDate() Group by the expiration_date column
 * @method TokenQuery groupByRights() Group by the rights column
 * @method TokenQuery groupByValue() Group by the value column
 * @method TokenQuery groupByMethod() Group by the method column
 *
 * @method TokenQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TokenQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TokenQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TokenQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method TokenQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method TokenQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Token findOne(PropelPDO $con = null) Return the first Token matching the query
 * @method Token findOneOrCreate(PropelPDO $con = null) Return the first Token matching the query, or a new Token object populated from the query conditions when no match is found
 *
 * @method Token findOneById(int $id) Return the first Token filtered by the id column
 * @method Token findOneByUserId(int $user_id) Return the first Token filtered by the user_id column
 * @method Token findOneByExpirationDate(string $expiration_date) Return the first Token filtered by the expiration_date column
 * @method Token findOneByRights(int $rights) Return the first Token filtered by the rights column
 * @method Token findOneByValue(string $value) Return the first Token filtered by the value column
 * @method Token findOneByMethod(int $method) Return the first Token filtered by the method column
 *
 * @method array findById(int $id) Return Token objects filtered by the id column
 * @method array findByUserId(int $user_id) Return Token objects filtered by the user_id column
 * @method array findByExpirationDate(string $expiration_date) Return Token objects filtered by the expiration_date column
 * @method array findByRights(int $rights) Return Token objects filtered by the rights column
 * @method array findByValue(string $value) Return Token objects filtered by the value column
 * @method array findByMethod(int $method) Return Token objects filtered by the method column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseTokenQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTokenQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'Token', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TokenQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TokenQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TokenQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TokenQuery) {
            return $criteria;
        }
        $query = new TokenQuery();
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
     * @return   Token|Token[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TokenPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TokenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Token A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `USER_ID`, `EXPIRATION_DATE`, `RIGHTS`, `VALUE`, `METHOD` FROM `tokens` WHERE `ID` = :p0';
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
            $obj = new Token();
            $obj->hydrate($row);
            TokenPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Token|Token[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Token[]|mixed the list of results, formatted by the current formatter
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
     * @return TokenQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TokenPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TokenQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TokenPeer::ID, $keys, Criteria::IN);
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
     * @return TokenQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TokenPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TokenQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(TokenPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(TokenPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TokenPeer::USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the expiration_date column
     *
     * Example usage:
     * <code>
     * $query->filterByExpirationDate('2011-03-14'); // WHERE expiration_date = '2011-03-14'
     * $query->filterByExpirationDate('now'); // WHERE expiration_date = '2011-03-14'
     * $query->filterByExpirationDate(array('max' => 'yesterday')); // WHERE expiration_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $expirationDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TokenQuery The current query, for fluid interface
     */
    public function filterByExpirationDate($expirationDate = null, $comparison = null)
    {
        if (is_array($expirationDate)) {
            $useMinMax = false;
            if (isset($expirationDate['min'])) {
                $this->addUsingAlias(TokenPeer::EXPIRATION_DATE, $expirationDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expirationDate['max'])) {
                $this->addUsingAlias(TokenPeer::EXPIRATION_DATE, $expirationDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TokenPeer::EXPIRATION_DATE, $expirationDate, $comparison);
    }

    /**
     * Filter the query on the rights column
     *
     * Example usage:
     * <code>
     * $query->filterByRights(1234); // WHERE rights = 1234
     * $query->filterByRights(array(12, 34)); // WHERE rights IN (12, 34)
     * $query->filterByRights(array('min' => 12)); // WHERE rights > 12
     * </code>
     *
     * @param     mixed $rights The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TokenQuery The current query, for fluid interface
     */
    public function filterByRights($rights = null, $comparison = null)
    {
        if (is_array($rights)) {
            $useMinMax = false;
            if (isset($rights['min'])) {
                $this->addUsingAlias(TokenPeer::RIGHTS, $rights['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rights['max'])) {
                $this->addUsingAlias(TokenPeer::RIGHTS, $rights['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TokenPeer::RIGHTS, $rights, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%'); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TokenQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $value)) {
                $value = str_replace('*', '%', $value);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TokenPeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query on the method column
     *
     * @param     mixed $method The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TokenQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByMethod($method = null, $comparison = null)
    {
        $valueSet = TokenPeer::getValueSet(TokenPeer::METHOD);
        if (is_scalar($method)) {
            if (!in_array($method, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $method));
            }
            $method = array_search($method, $valueSet);
        } elseif (is_array($method)) {
            $convertedValues = array();
            foreach ($method as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $method = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TokenPeer::METHOD, $method, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TokenQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(TokenPeer::USER_ID, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TokenPeer::USER_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TokenQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

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
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Token $token Object to remove from the list of results
     *
     * @return TokenQuery The current query, for fluid interface
     */
    public function prune($token = null)
    {
        if ($token) {
            $this->addUsingAlias(TokenPeer::ID, $token->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
