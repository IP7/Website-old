<?php


/**
 * Base class that represents a query for the 'content_comments' table.
 *
 * 
 *
 * @method     CommentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CommentQuery orderByReplyToId($order = Criteria::ASC) Order by the reply_to_id column
 * @method     CommentQuery orderByContentId($order = Criteria::ASC) Order by the content_id column
 * @method     CommentQuery orderByAuthorId($order = Criteria::ASC) Order by the author_id column
 * @method     CommentQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     CommentQuery orderByText($order = Criteria::ASC) Order by the text column
 *
 * @method     CommentQuery groupById() Group by the id column
 * @method     CommentQuery groupByReplyToId() Group by the reply_to_id column
 * @method     CommentQuery groupByContentId() Group by the content_id column
 * @method     CommentQuery groupByAuthorId() Group by the author_id column
 * @method     CommentQuery groupByDate() Group by the date column
 * @method     CommentQuery groupByText() Group by the text column
 *
 * @method     CommentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CommentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CommentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CommentQuery leftJoinReplyToComment($relationAlias = null) Adds a LEFT JOIN clause to the query using the ReplyToComment relation
 * @method     CommentQuery rightJoinReplyToComment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ReplyToComment relation
 * @method     CommentQuery innerJoinReplyToComment($relationAlias = null) Adds a INNER JOIN clause to the query using the ReplyToComment relation
 *
 * @method     CommentQuery leftJoinContent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Content relation
 * @method     CommentQuery rightJoinContent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Content relation
 * @method     CommentQuery innerJoinContent($relationAlias = null) Adds a INNER JOIN clause to the query using the Content relation
 *
 * @method     CommentQuery leftJoinAuthor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Author relation
 * @method     CommentQuery rightJoinAuthor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Author relation
 * @method     CommentQuery innerJoinAuthor($relationAlias = null) Adds a INNER JOIN clause to the query using the Author relation
 *
 * @method     CommentQuery leftJoinCommentRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the CommentRelatedById relation
 * @method     CommentQuery rightJoinCommentRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CommentRelatedById relation
 * @method     CommentQuery innerJoinCommentRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the CommentRelatedById relation
 *
 * @method     Comment findOne(PropelPDO $con = null) Return the first Comment matching the query
 * @method     Comment findOneOrCreate(PropelPDO $con = null) Return the first Comment matching the query, or a new Comment object populated from the query conditions when no match is found
 *
 * @method     Comment findOneById(int $id) Return the first Comment filtered by the id column
 * @method     Comment findOneByReplyToId(int $reply_to_id) Return the first Comment filtered by the reply_to_id column
 * @method     Comment findOneByContentId(int $content_id) Return the first Comment filtered by the content_id column
 * @method     Comment findOneByAuthorId(int $author_id) Return the first Comment filtered by the author_id column
 * @method     Comment findOneByDate(string $date) Return the first Comment filtered by the date column
 * @method     Comment findOneByText(string $text) Return the first Comment filtered by the text column
 *
 * @method     array findById(int $id) Return Comment objects filtered by the id column
 * @method     array findByReplyToId(int $reply_to_id) Return Comment objects filtered by the reply_to_id column
 * @method     array findByContentId(int $content_id) Return Comment objects filtered by the content_id column
 * @method     array findByAuthorId(int $author_id) Return Comment objects filtered by the author_id column
 * @method     array findByDate(string $date) Return Comment objects filtered by the date column
 * @method     array findByText(string $text) Return Comment objects filtered by the text column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseCommentQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseCommentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'Comment', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CommentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     CommentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CommentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CommentQuery) {
            return $criteria;
        }
        $query = new CommentQuery();
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
     * @return   Comment|Comment[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CommentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Comment A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `REPLY_TO_ID`, `CONTENT_ID`, `AUTHOR_ID`, `DATE` FROM `content_comments` WHERE `ID` = :p0';
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
            $obj = new Comment();
            $obj->hydrate($row);
            CommentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Comment|Comment[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Comment[]|mixed the list of results, formatted by the current formatter
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
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CommentPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CommentPeer::ID, $keys, Criteria::IN);
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
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(CommentPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the reply_to_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReplyToId(1234); // WHERE reply_to_id = 1234
     * $query->filterByReplyToId(array(12, 34)); // WHERE reply_to_id IN (12, 34)
     * $query->filterByReplyToId(array('min' => 12)); // WHERE reply_to_id > 12
     * </code>
     *
     * @see       filterByReplyToComment()
     *
     * @param     mixed $replyToId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByReplyToId($replyToId = null, $comparison = null)
    {
        if (is_array($replyToId)) {
            $useMinMax = false;
            if (isset($replyToId['min'])) {
                $this->addUsingAlias(CommentPeer::REPLY_TO_ID, $replyToId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($replyToId['max'])) {
                $this->addUsingAlias(CommentPeer::REPLY_TO_ID, $replyToId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentPeer::REPLY_TO_ID, $replyToId, $comparison);
    }

    /**
     * Filter the query on the content_id column
     *
     * Example usage:
     * <code>
     * $query->filterByContentId(1234); // WHERE content_id = 1234
     * $query->filterByContentId(array(12, 34)); // WHERE content_id IN (12, 34)
     * $query->filterByContentId(array('min' => 12)); // WHERE content_id > 12
     * </code>
     *
     * @see       filterByContent()
     *
     * @param     mixed $contentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByContentId($contentId = null, $comparison = null)
    {
        if (is_array($contentId)) {
            $useMinMax = false;
            if (isset($contentId['min'])) {
                $this->addUsingAlias(CommentPeer::CONTENT_ID, $contentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contentId['max'])) {
                $this->addUsingAlias(CommentPeer::CONTENT_ID, $contentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentPeer::CONTENT_ID, $contentId, $comparison);
    }

    /**
     * Filter the query on the author_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthorId(1234); // WHERE author_id = 1234
     * $query->filterByAuthorId(array(12, 34)); // WHERE author_id IN (12, 34)
     * $query->filterByAuthorId(array('min' => 12)); // WHERE author_id > 12
     * </code>
     *
     * @see       filterByAuthor()
     *
     * @param     mixed $authorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByAuthorId($authorId = null, $comparison = null)
    {
        if (is_array($authorId)) {
            $useMinMax = false;
            if (isset($authorId['min'])) {
                $this->addUsingAlias(CommentPeer::AUTHOR_ID, $authorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($authorId['max'])) {
                $this->addUsingAlias(CommentPeer::AUTHOR_ID, $authorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentPeer::AUTHOR_ID, $authorId, $comparison);
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
     * @return CommentQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(CommentPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(CommentPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentPeer::DATE, $date, $comparison);
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
     * @return CommentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CommentPeer::TEXT, $text, $comparison);
    }

    /**
     * Filter the query by a related Comment object
     *
     * @param   Comment|PropelObjectCollection $comment The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CommentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByReplyToComment($comment, $comparison = null)
    {
        if ($comment instanceof Comment) {
            return $this
                ->addUsingAlias(CommentPeer::REPLY_TO_ID, $comment->getId(), $comparison);
        } elseif ($comment instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CommentPeer::REPLY_TO_ID, $comment->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByReplyToComment() only accepts arguments of type Comment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ReplyToComment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function joinReplyToComment($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ReplyToComment');

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
            $this->addJoinObject($join, 'ReplyToComment');
        }

        return $this;
    }

    /**
     * Use the ReplyToComment relation Comment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CommentQuery A secondary query class using the current class as primary query
     */
    public function useReplyToCommentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinReplyToComment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ReplyToComment', 'CommentQuery');
    }

    /**
     * Filter the query by a related Content object
     *
     * @param   Content|PropelObjectCollection $content The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CommentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContent($content, $comparison = null)
    {
        if ($content instanceof Content) {
            return $this
                ->addUsingAlias(CommentPeer::CONTENT_ID, $content->getId(), $comparison);
        } elseif ($content instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CommentPeer::CONTENT_ID, $content->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return CommentQuery The current query, for fluid interface
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
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CommentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAuthor($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(CommentPeer::AUTHOR_ID, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CommentPeer::AUTHOR_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAuthor() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Author relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function joinAuthor($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Author');

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
            $this->addJoinObject($join, 'Author');
        }

        return $this;
    }

    /**
     * Use the Author relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserQuery A secondary query class using the current class as primary query
     */
    public function useAuthorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAuthor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Author', 'UserQuery');
    }

    /**
     * Filter the query by a related Comment object
     *
     * @param   Comment|PropelObjectCollection $comment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CommentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCommentRelatedById($comment, $comparison = null)
    {
        if ($comment instanceof Comment) {
            return $this
                ->addUsingAlias(CommentPeer::ID, $comment->getReplyToId(), $comparison);
        } elseif ($comment instanceof PropelObjectCollection) {
            return $this
                ->useCommentRelatedByIdQuery()
                ->filterByPrimaryKeys($comment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCommentRelatedById() only accepts arguments of type Comment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CommentRelatedById relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function joinCommentRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CommentRelatedById');

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
            $this->addJoinObject($join, 'CommentRelatedById');
        }

        return $this;
    }

    /**
     * Use the CommentRelatedById relation Comment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CommentQuery A secondary query class using the current class as primary query
     */
    public function useCommentRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCommentRelatedById($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CommentRelatedById', 'CommentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Comment $comment Object to remove from the list of results
     *
     * @return CommentQuery The current query, for fluid interface
     */
    public function prune($comment = null)
    {
        if ($comment) {
            $this->addUsingAlias(CommentPeer::ID, $comment->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseCommentQuery