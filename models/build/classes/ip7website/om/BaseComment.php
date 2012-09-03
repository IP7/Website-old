<?php


/**
 * Base class that represents a row from the 'content_comments' table.
 *
 * 
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseComment extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'CommentPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        CommentPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the reply_to_id field.
     * @var        int
     */
    protected $reply_to_id;

    /**
     * The value for the content_id field.
     * @var        int
     */
    protected $content_id;

    /**
     * The value for the author_id field.
     * @var        int
     */
    protected $author_id;

    /**
     * The value for the date field.
     * @var        string
     */
    protected $date;

    /**
     * The value for the text field.
     * @var        string
     */
    protected $text;

    /**
     * Whether the lazy-loaded $text value has been loaded from database.
     * This is necessary to avoid repeated lookups if $text column is NULL in the db.
     * @var        boolean
     */
    protected $text_isLoaded = false;

    /**
     * @var        Comment
     */
    protected $aReplyToComment;

    /**
     * @var        Content
     */
    protected $aContent;

    /**
     * @var        User
     */
    protected $aAuthor;

    /**
     * @var        PropelObjectCollection|Comment[] Collection to store aggregation of Comment objects.
     */
    protected $collCommentsRelatedById;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $commentsRelatedByIdScheduledForDeletion = null;

    /**
     * Get the [id] column value.
     * 
     * @return   int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [reply_to_id] column value.
     * 
     * @return   int
     */
    public function getReplyToId()
    {

        return $this->reply_to_id;
    }

    /**
     * Get the [content_id] column value.
     * 
     * @return   int
     */
    public function getContentId()
    {

        return $this->content_id;
    }

    /**
     * Get the [author_id] column value.
     * 
     * @return   int
     */
    public function getAuthorId()
    {

        return $this->author_id;
    }

    /**
     * Get the [optionally formatted] temporal [date] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDate($format = '{d-m-Y H:i:s}')
    {
        if ($this->date === null) {
            return null;
        }


        if ($this->date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of NULL,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->date);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date, true), $x);
            }
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is TRUE, we return a DateTime object.
            return $dt;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        } else {
            return $dt->format($format);
        }
    }

    /**
     * Get the [text] column value.
     * 
     * @param      PropelPDO $con An optional PropelPDO connection to use for fetching this lazy-loaded column.
     * @return   string
     */
    public function getText(PropelPDO $con = null)
    {
        if (!$this->text_isLoaded && $this->text === null && !$this->isNew()) {
            $this->loadText($con);
        }


        return $this->text;
    }

    /**
     * Load the value for the lazy-loaded [text] column.
     *
     * This method performs an additional query to return the value for
     * the [text] column, since it is not populated by
     * the hydrate() method.
     *
     * @param  PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - any underlying error will be wrapped and re-thrown.
     */
    protected function loadText(PropelPDO $con = null)
    {
        $c = $this->buildPkeyCriteria();
        $c->addSelectColumn(CommentPeer::TEXT);
        try {
            $stmt = CommentPeer::doSelectStmt($c, $con);
            $row = $stmt->fetch(PDO::FETCH_NUM);
            $stmt->closeCursor();
            $this->text = ($row[0] !== null) ? (string) $row[0] : null;
            $this->text_isLoaded = true;
        } catch (Exception $e) {
            throw new PropelException("Error loading value for [text] column on demand.", $e);
        }
    }
    /**
     * Set the value of [id] column.
     * 
     * @param      int $v new value
     * @return   Comment The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = CommentPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [reply_to_id] column.
     * 
     * @param      int $v new value
     * @return   Comment The current object (for fluent API support)
     */
    public function setReplyToId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reply_to_id !== $v) {
            $this->reply_to_id = $v;
            $this->modifiedColumns[] = CommentPeer::REPLY_TO_ID;
        }

        if ($this->aReplyToComment !== null && $this->aReplyToComment->getId() !== $v) {
            $this->aReplyToComment = null;
        }


        return $this;
    } // setReplyToId()

    /**
     * Set the value of [content_id] column.
     * 
     * @param      int $v new value
     * @return   Comment The current object (for fluent API support)
     */
    public function setContentId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->content_id !== $v) {
            $this->content_id = $v;
            $this->modifiedColumns[] = CommentPeer::CONTENT_ID;
        }

        if ($this->aContent !== null && $this->aContent->getId() !== $v) {
            $this->aContent = null;
        }


        return $this;
    } // setContentId()

    /**
     * Set the value of [author_id] column.
     * 
     * @param      int $v new value
     * @return   Comment The current object (for fluent API support)
     */
    public function setAuthorId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->author_id !== $v) {
            $this->author_id = $v;
            $this->modifiedColumns[] = CommentPeer::AUTHOR_ID;
        }

        if ($this->aAuthor !== null && $this->aAuthor->getId() !== $v) {
            $this->aAuthor = null;
        }


        return $this;
    } // setAuthorId()

    /**
     * Sets the value of [date] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   Comment The current object (for fluent API support)
     */
    public function setDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date !== null || $dt !== null) {
            $currentDateAsString = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->date = $newDateAsString;
                $this->modifiedColumns[] = CommentPeer::DATE;
            }
        } // if either are not null


        return $this;
    } // setDate()

    /**
     * Set the value of [text] column.
     * 
     * @param      string $v new value
     * @return   Comment The current object (for fluent API support)
     */
    public function setText($v)
    {
        // explicitly set the is-loaded flag to true for this lazy load col;
        // it doesn't matter if the value is actually set or not (logic below) as
        // any attempt to set the value means that no db lookup should be performed
        // when the getText() method is called.
        $this->text_isLoaded = true;

        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->text !== $v) {
            $this->text = $v;
            $this->modifiedColumns[] = CommentPeer::TEXT;
        }


        return $this;
    } // setText()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->reply_to_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->content_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->author_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->date = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 5; // 5 = CommentPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Comment object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aReplyToComment !== null && $this->reply_to_id !== $this->aReplyToComment->getId()) {
            $this->aReplyToComment = null;
        }
        if ($this->aContent !== null && $this->content_id !== $this->aContent->getId()) {
            $this->aContent = null;
        }
        if ($this->aAuthor !== null && $this->author_id !== $this->aAuthor->getId()) {
            $this->aAuthor = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(CommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = CommentPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        // Reset the text lazy-load column
        $this->text = null;
        $this->text_isLoaded = false;

        if ($deep) {  // also de-associate any related objects?

            $this->aReplyToComment = null;
            $this->aContent = null;
            $this->aAuthor = null;
            $this->collCommentsRelatedById = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(CommentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = CommentQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(CommentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                CommentPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aReplyToComment !== null) {
                if ($this->aReplyToComment->isModified() || $this->aReplyToComment->isNew()) {
                    $affectedRows += $this->aReplyToComment->save($con);
                }
                $this->setReplyToComment($this->aReplyToComment);
            }

            if ($this->aContent !== null) {
                if ($this->aContent->isModified() || $this->aContent->isNew()) {
                    $affectedRows += $this->aContent->save($con);
                }
                $this->setContent($this->aContent);
            }

            if ($this->aAuthor !== null) {
                if ($this->aAuthor->isModified() || $this->aAuthor->isNew()) {
                    $affectedRows += $this->aAuthor->save($con);
                }
                $this->setAuthor($this->aAuthor);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->commentsRelatedByIdScheduledForDeletion !== null) {
                if (!$this->commentsRelatedByIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->commentsRelatedByIdScheduledForDeletion as $commentRelatedById) {
                        // need to save related object because we set the relation to null
                        $commentRelatedById->save($con);
                    }
                    $this->commentsRelatedByIdScheduledForDeletion = null;
                }
            }

            if ($this->collCommentsRelatedById !== null) {
                foreach ($this->collCommentsRelatedById as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = CommentPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CommentPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CommentPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(CommentPeer::REPLY_TO_ID)) {
            $modifiedColumns[':p' . $index++]  = '`REPLY_TO_ID`';
        }
        if ($this->isColumnModified(CommentPeer::CONTENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`CONTENT_ID`';
        }
        if ($this->isColumnModified(CommentPeer::AUTHOR_ID)) {
            $modifiedColumns[':p' . $index++]  = '`AUTHOR_ID`';
        }
        if ($this->isColumnModified(CommentPeer::DATE)) {
            $modifiedColumns[':p' . $index++]  = '`DATE`';
        }
        if ($this->isColumnModified(CommentPeer::TEXT)) {
            $modifiedColumns[':p' . $index++]  = '`TEXT`';
        }

        $sql = sprintf(
            'INSERT INTO `content_comments` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`ID`':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`REPLY_TO_ID`':
						$stmt->bindValue($identifier, $this->reply_to_id, PDO::PARAM_INT);
                        break;
                    case '`CONTENT_ID`':
						$stmt->bindValue($identifier, $this->content_id, PDO::PARAM_INT);
                        break;
                    case '`AUTHOR_ID`':
						$stmt->bindValue($identifier, $this->author_id, PDO::PARAM_INT);
                        break;
                    case '`DATE`':
						$stmt->bindValue($identifier, $this->date, PDO::PARAM_STR);
                        break;
                    case '`TEXT`':
						$stmt->bindValue($identifier, $this->text, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
			$pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param      mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        } else {
            $this->validationFailures = $res;

            return false;
        }
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param      array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aReplyToComment !== null) {
                if (!$this->aReplyToComment->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aReplyToComment->getValidationFailures());
                }
            }

            if ($this->aContent !== null) {
                if (!$this->aContent->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aContent->getValidationFailures());
                }
            }

            if ($this->aAuthor !== null) {
                if (!$this->aAuthor->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAuthor->getValidationFailures());
                }
            }


            if (($retval = CommentPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCommentsRelatedById !== null) {
                    foreach ($this->collCommentsRelatedById as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = CommentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getReplyToId();
                break;
            case 2:
                return $this->getContentId();
                break;
            case 3:
                return $this->getAuthorId();
                break;
            case 4:
                return $this->getDate();
                break;
            case 5:
                return $this->getText();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Comment'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Comment'][$this->getPrimaryKey()] = true;
        $keys = CommentPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getReplyToId(),
            $keys[2] => $this->getContentId(),
            $keys[3] => $this->getAuthorId(),
            $keys[4] => $this->getDate(),
            $keys[5] => ($includeLazyLoadColumns) ? $this->getText() : null,
        );
        if ($includeForeignObjects) {
            if (null !== $this->aReplyToComment) {
                $result['ReplyToComment'] = $this->aReplyToComment->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aContent) {
                $result['Content'] = $this->aContent->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAuthor) {
                $result['Author'] = $this->aAuthor->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collCommentsRelatedById) {
                $result['CommentsRelatedById'] = $this->collCommentsRelatedById->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param      string $name peer name
     * @param      mixed $value field value
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = CommentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @param      mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setReplyToId($value);
                break;
            case 2:
                $this->setContentId($value);
                break;
            case 3:
                $this->setAuthorId($value);
                break;
            case 4:
                $this->setDate($value);
                break;
            case 5:
                $this->setText($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = CommentPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setReplyToId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setContentId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setAuthorId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setText($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CommentPeer::DATABASE_NAME);

        if ($this->isColumnModified(CommentPeer::ID)) $criteria->add(CommentPeer::ID, $this->id);
        if ($this->isColumnModified(CommentPeer::REPLY_TO_ID)) $criteria->add(CommentPeer::REPLY_TO_ID, $this->reply_to_id);
        if ($this->isColumnModified(CommentPeer::CONTENT_ID)) $criteria->add(CommentPeer::CONTENT_ID, $this->content_id);
        if ($this->isColumnModified(CommentPeer::AUTHOR_ID)) $criteria->add(CommentPeer::AUTHOR_ID, $this->author_id);
        if ($this->isColumnModified(CommentPeer::DATE)) $criteria->add(CommentPeer::DATE, $this->date);
        if ($this->isColumnModified(CommentPeer::TEXT)) $criteria->add(CommentPeer::TEXT, $this->text);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(CommentPeer::DATABASE_NAME);
        $criteria->add(CommentPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return   int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of Comment (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setReplyToId($this->getReplyToId());
        $copyObj->setContentId($this->getContentId());
        $copyObj->setAuthorId($this->getAuthorId());
        $copyObj->setDate($this->getDate());
        $copyObj->setText($this->getText());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getCommentsRelatedById() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCommentRelatedById($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return                 Comment Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return   CommentPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new CommentPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Comment object.
     *
     * @param                  Comment $v
     * @return                 Comment The current object (for fluent API support)
     * @throws PropelException
     */
    public function setReplyToComment(Comment $v = null)
    {
        if ($v === null) {
            $this->setReplyToId(NULL);
        } else {
            $this->setReplyToId($v->getId());
        }

        $this->aReplyToComment = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Comment object, it will not be re-added.
        if ($v !== null) {
            $v->addCommentRelatedById($this);
        }


        return $this;
    }


    /**
     * Get the associated Comment object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 Comment The associated Comment object.
     * @throws PropelException
     */
    public function getReplyToComment(PropelPDO $con = null)
    {
        if ($this->aReplyToComment === null && ($this->reply_to_id !== null)) {
            $this->aReplyToComment = CommentQuery::create()->findPk($this->reply_to_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aReplyToComment->addCommentsRelatedById($this);
             */
        }

        return $this->aReplyToComment;
    }

    /**
     * Declares an association between this object and a Content object.
     *
     * @param                  Content $v
     * @return                 Comment The current object (for fluent API support)
     * @throws PropelException
     */
    public function setContent(Content $v = null)
    {
        if ($v === null) {
            $this->setContentId(NULL);
        } else {
            $this->setContentId($v->getId());
        }

        $this->aContent = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Content object, it will not be re-added.
        if ($v !== null) {
            $v->addComment($this);
        }


        return $this;
    }


    /**
     * Get the associated Content object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 Content The associated Content object.
     * @throws PropelException
     */
    public function getContent(PropelPDO $con = null)
    {
        if ($this->aContent === null && ($this->content_id !== null)) {
            $this->aContent = ContentQuery::create()->findPk($this->content_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aContent->addComments($this);
             */
        }

        return $this->aContent;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return                 Comment The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAuthor(User $v = null)
    {
        if ($v === null) {
            $this->setAuthorId(NULL);
        } else {
            $this->setAuthorId($v->getId());
        }

        $this->aAuthor = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the User object, it will not be re-added.
        if ($v !== null) {
            $v->addComment($this);
        }


        return $this;
    }


    /**
     * Get the associated User object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 User The associated User object.
     * @throws PropelException
     */
    public function getAuthor(PropelPDO $con = null)
    {
        if ($this->aAuthor === null && ($this->author_id !== null)) {
            $this->aAuthor = UserQuery::create()->findPk($this->author_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAuthor->addComments($this);
             */
        }

        return $this->aAuthor;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('CommentRelatedById' == $relationName) {
            $this->initCommentsRelatedById();
        }
    }

    /**
     * Clears out the collCommentsRelatedById collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCommentsRelatedById()
     */
    public function clearCommentsRelatedById()
    {
        $this->collCommentsRelatedById = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collCommentsRelatedById collection.
     *
     * By default this just sets the collCommentsRelatedById collection to an empty array (like clearcollCommentsRelatedById());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCommentsRelatedById($overrideExisting = true)
    {
        if (null !== $this->collCommentsRelatedById && !$overrideExisting) {
            return;
        }
        $this->collCommentsRelatedById = new PropelObjectCollection();
        $this->collCommentsRelatedById->setModel('Comment');
    }

    /**
     * Gets an array of Comment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Comment is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Comment[] List of Comment objects
     * @throws PropelException
     */
    public function getCommentsRelatedById($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collCommentsRelatedById || null !== $criteria) {
            if ($this->isNew() && null === $this->collCommentsRelatedById) {
                // return empty collection
                $this->initCommentsRelatedById();
            } else {
                $collCommentsRelatedById = CommentQuery::create(null, $criteria)
                    ->filterByReplyToComment($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collCommentsRelatedById;
                }
                $this->collCommentsRelatedById = $collCommentsRelatedById;
            }
        }

        return $this->collCommentsRelatedById;
    }

    /**
     * Sets a collection of CommentRelatedById objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $commentsRelatedById A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setCommentsRelatedById(PropelCollection $commentsRelatedById, PropelPDO $con = null)
    {
        $this->commentsRelatedByIdScheduledForDeletion = $this->getCommentsRelatedById(new Criteria(), $con)->diff($commentsRelatedById);

        foreach ($this->commentsRelatedByIdScheduledForDeletion as $commentRelatedByIdRemoved) {
            $commentRelatedByIdRemoved->setReplyToComment(null);
        }

        $this->collCommentsRelatedById = null;
        foreach ($commentsRelatedById as $commentRelatedById) {
            $this->addCommentRelatedById($commentRelatedById);
        }

        $this->collCommentsRelatedById = $commentsRelatedById;
    }

    /**
     * Returns the number of related Comment objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Comment objects.
     * @throws PropelException
     */
    public function countCommentsRelatedById(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collCommentsRelatedById || null !== $criteria) {
            if ($this->isNew() && null === $this->collCommentsRelatedById) {
                return 0;
            } else {
                $query = CommentQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByReplyToComment($this)
                    ->count($con);
            }
        } else {
            return count($this->collCommentsRelatedById);
        }
    }

    /**
     * Method called to associate a Comment object to this object
     * through the Comment foreign key attribute.
     *
     * @param    Comment $l Comment
     * @return   Comment The current object (for fluent API support)
     */
    public function addCommentRelatedById(Comment $l)
    {
        if ($this->collCommentsRelatedById === null) {
            $this->initCommentsRelatedById();
        }
        if (!$this->collCommentsRelatedById->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddCommentRelatedById($l);
        }

        return $this;
    }

    /**
     * @param	CommentRelatedById $commentRelatedById The commentRelatedById object to add.
     */
    protected function doAddCommentRelatedById($commentRelatedById)
    {
        $this->collCommentsRelatedById[]= $commentRelatedById;
        $commentRelatedById->setReplyToComment($this);
    }

    /**
     * @param	CommentRelatedById $commentRelatedById The commentRelatedById object to remove.
     */
    public function removeCommentRelatedById($commentRelatedById)
    {
        if ($this->getCommentsRelatedById()->contains($commentRelatedById)) {
            $this->collCommentsRelatedById->remove($this->collCommentsRelatedById->search($commentRelatedById));
            if (null === $this->commentsRelatedByIdScheduledForDeletion) {
                $this->commentsRelatedByIdScheduledForDeletion = clone $this->collCommentsRelatedById;
                $this->commentsRelatedByIdScheduledForDeletion->clear();
            }
            $this->commentsRelatedByIdScheduledForDeletion[]= $commentRelatedById;
            $commentRelatedById->setReplyToComment(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Comment is new, it will return
     * an empty collection; or if this Comment has previously
     * been saved, it will retrieve related CommentsRelatedById from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Comment.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Comment[] List of Comment objects
     */
    public function getCommentsRelatedByIdJoinContent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CommentQuery::create(null, $criteria);
        $query->joinWith('Content', $join_behavior);

        return $this->getCommentsRelatedById($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Comment is new, it will return
     * an empty collection; or if this Comment has previously
     * been saved, it will retrieve related CommentsRelatedById from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Comment.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Comment[] List of Comment objects
     */
    public function getCommentsRelatedByIdJoinAuthor($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CommentQuery::create(null, $criteria);
        $query->joinWith('Author', $join_behavior);

        return $this->getCommentsRelatedById($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->reply_to_id = null;
        $this->content_id = null;
        $this->author_id = null;
        $this->date = null;
        $this->text = null;
        $this->text_isLoaded = false;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collCommentsRelatedById) {
                foreach ($this->collCommentsRelatedById as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collCommentsRelatedById instanceof PropelCollection) {
            $this->collCommentsRelatedById->clearIterator();
        }
        $this->collCommentsRelatedById = null;
        $this->aReplyToComment = null;
        $this->aContent = null;
        $this->aAuthor = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CommentPeer::DEFAULT_STRING_FORMAT);
    }

} // BaseComment
