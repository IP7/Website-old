<?php


/**
 * Base class that represents a query for the 'contents' table.
 *
 *
 *
 * @method ContentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ContentQuery orderByAuthorId($order = Criteria::ASC) Order by the author_id column
 * @method ContentQuery orderByContentTypeId($order = Criteria::ASC) Order by the content_type_id column
 * @method ContentQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method ContentQuery orderByAccessRights($order = Criteria::ASC) Order by the access_rights column
 * @method ContentQuery orderByValidated($order = Criteria::ASC) Order by the validated column
 * @method ContentQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method ContentQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method ContentQuery orderByCursusId($order = Criteria::ASC) Order by the cursus_id column
 * @method ContentQuery orderByCourseId($order = Criteria::ASC) Order by the course_id column
 *
 * @method ContentQuery groupById() Group by the id column
 * @method ContentQuery groupByAuthorId() Group by the author_id column
 * @method ContentQuery groupByContentTypeId() Group by the content_type_id column
 * @method ContentQuery groupByDate() Group by the date column
 * @method ContentQuery groupByAccessRights() Group by the access_rights column
 * @method ContentQuery groupByValidated() Group by the validated column
 * @method ContentQuery groupByTitle() Group by the title column
 * @method ContentQuery groupByText() Group by the text column
 * @method ContentQuery groupByCursusId() Group by the cursus_id column
 * @method ContentQuery groupByCourseId() Group by the course_id column
 *
 * @method ContentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ContentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ContentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ContentQuery leftJoinAuthor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Author relation
 * @method ContentQuery rightJoinAuthor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Author relation
 * @method ContentQuery innerJoinAuthor($relationAlias = null) Adds a INNER JOIN clause to the query using the Author relation
 *
 * @method ContentQuery leftJoinCursus($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cursus relation
 * @method ContentQuery rightJoinCursus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cursus relation
 * @method ContentQuery innerJoinCursus($relationAlias = null) Adds a INNER JOIN clause to the query using the Cursus relation
 *
 * @method ContentQuery leftJoinCourse($relationAlias = null) Adds a LEFT JOIN clause to the query using the Course relation
 * @method ContentQuery rightJoinCourse($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Course relation
 * @method ContentQuery innerJoinCourse($relationAlias = null) Adds a INNER JOIN clause to the query using the Course relation
 *
 * @method ContentQuery leftJoinContentType($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContentType relation
 * @method ContentQuery rightJoinContentType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContentType relation
 * @method ContentQuery innerJoinContentType($relationAlias = null) Adds a INNER JOIN clause to the query using the ContentType relation
 *
 * @method ContentQuery leftJoinContentsFiles($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContentsFiles relation
 * @method ContentQuery rightJoinContentsFiles($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContentsFiles relation
 * @method ContentQuery innerJoinContentsFiles($relationAlias = null) Adds a INNER JOIN clause to the query using the ContentsFiles relation
 *
 * @method ContentQuery leftJoinComment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Comment relation
 * @method ContentQuery rightJoinComment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Comment relation
 * @method ContentQuery innerJoinComment($relationAlias = null) Adds a INNER JOIN clause to the query using the Comment relation
 *
 * @method ContentQuery leftJoinContentsTags($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContentsTags relation
 * @method ContentQuery rightJoinContentsTags($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContentsTags relation
 * @method ContentQuery innerJoinContentsTags($relationAlias = null) Adds a INNER JOIN clause to the query using the ContentsTags relation
 *
 * @method ContentQuery leftJoinReport($relationAlias = null) Adds a LEFT JOIN clause to the query using the Report relation
 * @method ContentQuery rightJoinReport($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Report relation
 * @method ContentQuery innerJoinReport($relationAlias = null) Adds a INNER JOIN clause to the query using the Report relation
 *
 * @method Content findOne(PropelPDO $con = null) Return the first Content matching the query
 * @method Content findOneOrCreate(PropelPDO $con = null) Return the first Content matching the query, or a new Content object populated from the query conditions when no match is found
 *
 * @method Content findOneById(int $id) Return the first Content filtered by the id column
 * @method Content findOneByAuthorId(int $author_id) Return the first Content filtered by the author_id column
 * @method Content findOneByContentTypeId(int $content_type_id) Return the first Content filtered by the content_type_id column
 * @method Content findOneByDate(string $date) Return the first Content filtered by the date column
 * @method Content findOneByAccessRights(int $access_rights) Return the first Content filtered by the access_rights column
 * @method Content findOneByValidated(boolean $validated) Return the first Content filtered by the validated column
 * @method Content findOneByTitle(string $title) Return the first Content filtered by the title column
 * @method Content findOneByText(string $text) Return the first Content filtered by the text column
 * @method Content findOneByCursusId(int $cursus_id) Return the first Content filtered by the cursus_id column
 * @method Content findOneByCourseId(int $course_id) Return the first Content filtered by the course_id column
 *
 * @method array findById(int $id) Return Content objects filtered by the id column
 * @method array findByAuthorId(int $author_id) Return Content objects filtered by the author_id column
 * @method array findByContentTypeId(int $content_type_id) Return Content objects filtered by the content_type_id column
 * @method array findByDate(string $date) Return Content objects filtered by the date column
 * @method array findByAccessRights(int $access_rights) Return Content objects filtered by the access_rights column
 * @method array findByValidated(boolean $validated) Return Content objects filtered by the validated column
 * @method array findByTitle(string $title) Return Content objects filtered by the title column
 * @method array findByText(string $text) Return Content objects filtered by the text column
 * @method array findByCursusId(int $cursus_id) Return Content objects filtered by the cursus_id column
 * @method array findByCourseId(int $course_id) Return Content objects filtered by the course_id column
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseContentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseContentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'infop7db', $modelName = 'Content', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ContentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ContentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ContentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ContentQuery) {
            return $criteria;
        }
        $query = new ContentQuery();
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
     * @return   Content|Content[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ContentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ContentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Content A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `AUTHOR_ID`, `CONTENT_TYPE_ID`, `DATE`, `ACCESS_RIGHTS`, `VALIDATED`, `TITLE`, `CURSUS_ID`, `COURSE_ID` FROM `contents` WHERE `ID` = :p0';
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
            $obj = new Content();
            $obj->hydrate($row);
            ContentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Content|Content[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Content[]|mixed the list of results, formatted by the current formatter
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
     * @return ContentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContentPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ContentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContentPeer::ID, $keys, Criteria::IN);
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
     * @return ContentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ContentPeer::ID, $id, $comparison);
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
     * @return ContentQuery The current query, for fluid interface
     */
    public function filterByAuthorId($authorId = null, $comparison = null)
    {
        if (is_array($authorId)) {
            $useMinMax = false;
            if (isset($authorId['min'])) {
                $this->addUsingAlias(ContentPeer::AUTHOR_ID, $authorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($authorId['max'])) {
                $this->addUsingAlias(ContentPeer::AUTHOR_ID, $authorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContentPeer::AUTHOR_ID, $authorId, $comparison);
    }

    /**
     * Filter the query on the content_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByContentTypeId(1234); // WHERE content_type_id = 1234
     * $query->filterByContentTypeId(array(12, 34)); // WHERE content_type_id IN (12, 34)
     * $query->filterByContentTypeId(array('min' => 12)); // WHERE content_type_id > 12
     * </code>
     *
     * @see       filterByContentType()
     *
     * @param     mixed $contentTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContentQuery The current query, for fluid interface
     */
    public function filterByContentTypeId($contentTypeId = null, $comparison = null)
    {
        if (is_array($contentTypeId)) {
            $useMinMax = false;
            if (isset($contentTypeId['min'])) {
                $this->addUsingAlias(ContentPeer::CONTENT_TYPE_ID, $contentTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contentTypeId['max'])) {
                $this->addUsingAlias(ContentPeer::CONTENT_TYPE_ID, $contentTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContentPeer::CONTENT_TYPE_ID, $contentTypeId, $comparison);
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
     * @return ContentQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(ContentPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(ContentPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContentPeer::DATE, $date, $comparison);
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
     * @return ContentQuery The current query, for fluid interface
     */
    public function filterByAccessRights($accessRights = null, $comparison = null)
    {
        if (is_array($accessRights)) {
            $useMinMax = false;
            if (isset($accessRights['min'])) {
                $this->addUsingAlias(ContentPeer::ACCESS_RIGHTS, $accessRights['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accessRights['max'])) {
                $this->addUsingAlias(ContentPeer::ACCESS_RIGHTS, $accessRights['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContentPeer::ACCESS_RIGHTS, $accessRights, $comparison);
    }

    /**
     * Filter the query on the validated column
     *
     * Example usage:
     * <code>
     * $query->filterByValidated(true); // WHERE validated = true
     * $query->filterByValidated('yes'); // WHERE validated = true
     * </code>
     *
     * @param     boolean|string $validated The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContentQuery The current query, for fluid interface
     */
    public function filterByValidated($validated = null, $comparison = null)
    {
        if (is_string($validated)) {
            $validated = in_array(strtolower($validated), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ContentPeer::VALIDATED, $validated, $comparison);
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
     * @return ContentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ContentPeer::TITLE, $title, $comparison);
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
     * @return ContentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ContentPeer::TEXT, $text, $comparison);
    }

    /**
     * Filter the query on the cursus_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCursusId(1234); // WHERE cursus_id = 1234
     * $query->filterByCursusId(array(12, 34)); // WHERE cursus_id IN (12, 34)
     * $query->filterByCursusId(array('min' => 12)); // WHERE cursus_id > 12
     * </code>
     *
     * @see       filterByCursus()
     *
     * @param     mixed $cursusId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContentQuery The current query, for fluid interface
     */
    public function filterByCursusId($cursusId = null, $comparison = null)
    {
        if (is_array($cursusId)) {
            $useMinMax = false;
            if (isset($cursusId['min'])) {
                $this->addUsingAlias(ContentPeer::CURSUS_ID, $cursusId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cursusId['max'])) {
                $this->addUsingAlias(ContentPeer::CURSUS_ID, $cursusId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContentPeer::CURSUS_ID, $cursusId, $comparison);
    }

    /**
     * Filter the query on the course_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCourseId(1234); // WHERE course_id = 1234
     * $query->filterByCourseId(array(12, 34)); // WHERE course_id IN (12, 34)
     * $query->filterByCourseId(array('min' => 12)); // WHERE course_id > 12
     * </code>
     *
     * @see       filterByCourse()
     *
     * @param     mixed $courseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContentQuery The current query, for fluid interface
     */
    public function filterByCourseId($courseId = null, $comparison = null)
    {
        if (is_array($courseId)) {
            $useMinMax = false;
            if (isset($courseId['min'])) {
                $this->addUsingAlias(ContentPeer::COURSE_ID, $courseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($courseId['max'])) {
                $this->addUsingAlias(ContentPeer::COURSE_ID, $courseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContentPeer::COURSE_ID, $courseId, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAuthor($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ContentPeer::AUTHOR_ID, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContentPeer::AUTHOR_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ContentQuery The current query, for fluid interface
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
     * Filter the query by a related Cursus object
     *
     * @param   Cursus|PropelObjectCollection $cursus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCursus($cursus, $comparison = null)
    {
        if ($cursus instanceof Cursus) {
            return $this
                ->addUsingAlias(ContentPeer::CURSUS_ID, $cursus->getId(), $comparison);
        } elseif ($cursus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContentPeer::CURSUS_ID, $cursus->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ContentQuery The current query, for fluid interface
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
     * Filter the query by a related Course object
     *
     * @param   Course|PropelObjectCollection $course The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCourse($course, $comparison = null)
    {
        if ($course instanceof Course) {
            return $this
                ->addUsingAlias(ContentPeer::COURSE_ID, $course->getId(), $comparison);
        } elseif ($course instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContentPeer::COURSE_ID, $course->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCourse() only accepts arguments of type Course or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Course relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContentQuery The current query, for fluid interface
     */
    public function joinCourse($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Course');

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
            $this->addJoinObject($join, 'Course');
        }

        return $this;
    }

    /**
     * Use the Course relation Course object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CourseQuery A secondary query class using the current class as primary query
     */
    public function useCourseQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCourse($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Course', 'CourseQuery');
    }

    /**
     * Filter the query by a related ContentType object
     *
     * @param   ContentType|PropelObjectCollection $contentType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContentType($contentType, $comparison = null)
    {
        if ($contentType instanceof ContentType) {
            return $this
                ->addUsingAlias(ContentPeer::CONTENT_TYPE_ID, $contentType->getId(), $comparison);
        } elseif ($contentType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContentPeer::CONTENT_TYPE_ID, $contentType->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByContentType() only accepts arguments of type ContentType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ContentType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContentQuery The current query, for fluid interface
     */
    public function joinContentType($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ContentType');

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
            $this->addJoinObject($join, 'ContentType');
        }

        return $this;
    }

    /**
     * Use the ContentType relation ContentType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContentTypeQuery A secondary query class using the current class as primary query
     */
    public function useContentTypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinContentType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ContentType', 'ContentTypeQuery');
    }

    /**
     * Filter the query by a related ContentsFiles object
     *
     * @param   ContentsFiles|PropelObjectCollection $contentsFiles  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContentsFiles($contentsFiles, $comparison = null)
    {
        if ($contentsFiles instanceof ContentsFiles) {
            return $this
                ->addUsingAlias(ContentPeer::ID, $contentsFiles->getContentId(), $comparison);
        } elseif ($contentsFiles instanceof PropelObjectCollection) {
            return $this
                ->useContentsFilesQuery()
                ->filterByPrimaryKeys($contentsFiles->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByContentsFiles() only accepts arguments of type ContentsFiles or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ContentsFiles relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContentQuery The current query, for fluid interface
     */
    public function joinContentsFiles($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ContentsFiles');

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
            $this->addJoinObject($join, 'ContentsFiles');
        }

        return $this;
    }

    /**
     * Use the ContentsFiles relation ContentsFiles object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContentsFilesQuery A secondary query class using the current class as primary query
     */
    public function useContentsFilesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContentsFiles($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ContentsFiles', 'ContentsFilesQuery');
    }

    /**
     * Filter the query by a related Comment object
     *
     * @param   Comment|PropelObjectCollection $comment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByComment($comment, $comparison = null)
    {
        if ($comment instanceof Comment) {
            return $this
                ->addUsingAlias(ContentPeer::ID, $comment->getContentId(), $comparison);
        } elseif ($comment instanceof PropelObjectCollection) {
            return $this
                ->useCommentQuery()
                ->filterByPrimaryKeys($comment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByComment() only accepts arguments of type Comment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Comment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContentQuery The current query, for fluid interface
     */
    public function joinComment($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Comment');

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
            $this->addJoinObject($join, 'Comment');
        }

        return $this;
    }

    /**
     * Use the Comment relation Comment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CommentQuery A secondary query class using the current class as primary query
     */
    public function useCommentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinComment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Comment', 'CommentQuery');
    }

    /**
     * Filter the query by a related ContentsTags object
     *
     * @param   ContentsTags|PropelObjectCollection $contentsTags  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContentsTags($contentsTags, $comparison = null)
    {
        if ($contentsTags instanceof ContentsTags) {
            return $this
                ->addUsingAlias(ContentPeer::ID, $contentsTags->getContentId(), $comparison);
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
     * @return ContentQuery The current query, for fluid interface
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
     * Filter the query by a related Report object
     *
     * @param   Report|PropelObjectCollection $report  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByReport($report, $comparison = null)
    {
        if ($report instanceof Report) {
            return $this
                ->addUsingAlias(ContentPeer::ID, $report->getContentId(), $comparison);
        } elseif ($report instanceof PropelObjectCollection) {
            return $this
                ->useReportQuery()
                ->filterByPrimaryKeys($report->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByReport() only accepts arguments of type Report or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Report relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContentQuery The current query, for fluid interface
     */
    public function joinReport($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Report');

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
            $this->addJoinObject($join, 'Report');
        }

        return $this;
    }

    /**
     * Use the Report relation Report object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ReportQuery A secondary query class using the current class as primary query
     */
    public function useReportQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinReport($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Report', 'ReportQuery');
    }

    /**
     * Filter the query by a related File object
     * using the contents_files table as cross reference
     *
     * @param   File $file the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContentQuery The current query, for fluid interface
     */
    public function filterByFile($file, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useContentsFilesQuery()
            ->filterByFile($file, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related Tag object
     * using the contents_tags table as cross reference
     *
     * @param   Tag $tag the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContentQuery The current query, for fluid interface
     */
    public function filterByTag($tag, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useContentsTagsQuery()
            ->filterByTag($tag, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   Content $content Object to remove from the list of results
     *
     * @return ContentQuery The current query, for fluid interface
     */
    public function prune($content = null)
    {
        if ($content) {
            $this->addUsingAlias(ContentPeer::ID, $content->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
