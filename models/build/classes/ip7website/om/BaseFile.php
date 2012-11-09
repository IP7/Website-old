<?php


/**
 * Base class that represents a row from the 'files' table.
 *
 *
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseFile extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'FilePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        FilePeer
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
     * The value for the author_id field.
     * @var        int
     */
    protected $author_id;

    /**
     * The value for the title field.
     * @var        string
     */
    protected $title;

    /**
     * The value for the date field.
     * @var        string
     */
    protected $date;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the file_type field.
     * @var        int
     */
    protected $file_type;

    /**
     * The value for the path field.
     * @var        string
     */
    protected $path;

    /**
     * The value for the access_rights field.
     * Note: this column has a database default value of: (expression) 0
     * @var        int
     */
    protected $access_rights;

    /**
     * The value for the downloads_count field.
     * Note: this column has a database default value of: (expression) 0
     * @var        int
     */
    protected $downloads_count;

    /**
     * @var        User
     */
    protected $aAuthor;

    /**
     * @var        PropelObjectCollection|ContentsFiles[] Collection to store aggregation of ContentsFiles objects.
     */
    protected $collContentsFiless;
    protected $collContentsFilessPartial;

    /**
     * @var        PropelObjectCollection|Content[] Collection to store aggregation of Content objects.
     */
    protected $collContents;

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
    protected $contentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $contentsFilessScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
    }

    /**
     * Initializes internal state of BaseFile object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [author_id] column value.
     *
     * @return int
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [optionally formatted] temporal [date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDate($format = 'd-m-Y H:i:s')
    {
        if ($this->date === null) {
            return null;
        }

        if ($this->date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
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
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        } else {
            return $dt->format($format);
        }
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [file_type] column value.
     *
     * @return int
     * @throws PropelException - if the stored enum key is unknown.
     */
    public function getFileType()
    {
        if (null === $this->file_type) {
            return null;
        }
        $valueSet = FilePeer::getValueSet(FilePeer::FILE_TYPE);
        if (!isset($valueSet[$this->file_type])) {
            throw new PropelException('Unknown stored enum key: ' . $this->file_type);
        }

        return $valueSet[$this->file_type];
    }

    /**
     * Get the [path] column value.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Get the [access_rights] column value.
     *
     * @return int
     */
    public function getAccessRights()
    {
        return $this->access_rights;
    }

    /**
     * Get the [downloads_count] column value.
     *
     * @return int
     */
    public function getDownloadsCount()
    {
        return $this->downloads_count;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return File The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = FilePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [author_id] column.
     *
     * @param int $v new value
     * @return File The current object (for fluent API support)
     */
    public function setAuthorId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->author_id !== $v) {
            $this->author_id = $v;
            $this->modifiedColumns[] = FilePeer::AUTHOR_ID;
        }

        if ($this->aAuthor !== null && $this->aAuthor->getId() !== $v) {
            $this->aAuthor = null;
        }


        return $this;
    } // setAuthorId()

    /**
     * Set the value of [title] column.
     *
     * @param string $v new value
     * @return File The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[] = FilePeer::TITLE;
        }


        return $this;
    } // setTitle()

    /**
     * Sets the value of [date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return File The current object (for fluent API support)
     */
    public function setDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date !== null || $dt !== null) {
            $currentDateAsString = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->date = $newDateAsString;
                $this->modifiedColumns[] = FilePeer::DATE;
            }
        } // if either are not null


        return $this;
    } // setDate()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return File The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = FilePeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [file_type] column.
     *
     * @param int $v new value
     * @return File The current object (for fluent API support)
     * @throws PropelException - if the value is not accepted by this enum.
     */
    public function setFileType($v)
    {
        if ($v !== null) {
            $valueSet = FilePeer::getValueSet(FilePeer::FILE_TYPE);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->file_type !== $v) {
            $this->file_type = $v;
            $this->modifiedColumns[] = FilePeer::FILE_TYPE;
        }


        return $this;
    } // setFileType()

    /**
     * Set the value of [path] column.
     *
     * @param string $v new value
     * @return File The current object (for fluent API support)
     */
    public function setPath($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->path !== $v) {
            $this->path = $v;
            $this->modifiedColumns[] = FilePeer::PATH;
        }


        return $this;
    } // setPath()

    /**
     * Set the value of [access_rights] column.
     *
     * @param int $v new value
     * @return File The current object (for fluent API support)
     */
    public function setAccessRights($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->access_rights !== $v) {
            $this->access_rights = $v;
            $this->modifiedColumns[] = FilePeer::ACCESS_RIGHTS;
        }


        return $this;
    } // setAccessRights()

    /**
     * Set the value of [downloads_count] column.
     *
     * @param int $v new value
     * @return File The current object (for fluent API support)
     */
    public function setDownloadsCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->downloads_count !== $v) {
            $this->downloads_count = $v;
            $this->modifiedColumns[] = FilePeer::DOWNLOADS_COUNT;
        }


        return $this;
    } // setDownloadsCount()

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
        // otherwise, everything was equal, so return true
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
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->author_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->title = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->date = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->description = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->file_type = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->path = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->access_rights = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->downloads_count = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 9; // 9 = FilePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating File object", $e);
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

        if ($this->aAuthor !== null && $this->author_id !== $this->aAuthor->getId()) {
            $this->aAuthor = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
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
            $con = Propel::getConnection(FilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = FilePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aAuthor = null;
            $this->collContentsFiless = null;

            $this->collContents = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
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
            $con = Propel::getConnection(FilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = FileQuery::create()
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
     * @param PropelPDO $con
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
            $con = Propel::getConnection(FilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                FilePeer::addInstanceToPool($this);
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
     * @param PropelPDO $con
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

            if ($this->contentsScheduledForDeletion !== null) {
                if (!$this->contentsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->contentsScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($remotePk, $pk);
                    }
                    ContentsFilesQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->contentsScheduledForDeletion = null;
                }

                foreach ($this->getContents() as $content) {
                    if ($content->isModified()) {
                        $content->save($con);
                    }
                }
            }

            if ($this->contentsFilessScheduledForDeletion !== null) {
                if (!$this->contentsFilessScheduledForDeletion->isEmpty()) {
                    ContentsFilesQuery::create()
                        ->filterByPrimaryKeys($this->contentsFilessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->contentsFilessScheduledForDeletion = null;
                }
            }

            if ($this->collContentsFiless !== null) {
                foreach ($this->collContentsFiless as $referrerFK) {
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
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = FilePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . FilePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(FilePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(FilePeer::AUTHOR_ID)) {
            $modifiedColumns[':p' . $index++]  = '`AUTHOR_ID`';
        }
        if ($this->isColumnModified(FilePeer::TITLE)) {
            $modifiedColumns[':p' . $index++]  = '`TITLE`';
        }
        if ($this->isColumnModified(FilePeer::DATE)) {
            $modifiedColumns[':p' . $index++]  = '`DATE`';
        }
        if ($this->isColumnModified(FilePeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }
        if ($this->isColumnModified(FilePeer::FILE_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`FILE_TYPE`';
        }
        if ($this->isColumnModified(FilePeer::PATH)) {
            $modifiedColumns[':p' . $index++]  = '`PATH`';
        }
        if ($this->isColumnModified(FilePeer::ACCESS_RIGHTS)) {
            $modifiedColumns[':p' . $index++]  = '`ACCESS_RIGHTS`';
        }
        if ($this->isColumnModified(FilePeer::DOWNLOADS_COUNT)) {
            $modifiedColumns[':p' . $index++]  = '`DOWNLOADS_COUNT`';
        }

        $sql = sprintf(
            'INSERT INTO `files` (%s) VALUES (%s)',
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
                    case '`AUTHOR_ID`':
                        $stmt->bindValue($identifier, $this->author_id, PDO::PARAM_INT);
                        break;
                    case '`TITLE`':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case '`DATE`':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_STR);
                        break;
                    case '`DESCRIPTION`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`FILE_TYPE`':
                        $stmt->bindValue($identifier, $this->file_type, PDO::PARAM_INT);
                        break;
                    case '`PATH`':
                        $stmt->bindValue($identifier, $this->path, PDO::PARAM_STR);
                        break;
                    case '`ACCESS_RIGHTS`':
                        $stmt->bindValue($identifier, $this->access_rights, PDO::PARAM_INT);
                        break;
                    case '`DOWNLOADS_COUNT`':
                        $stmt->bindValue($identifier, $this->downloads_count, PDO::PARAM_INT);
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
     * @param PropelPDO $con
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
     * @param mixed $columns Column name or an array of column names.
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
     * @param array $columns Array of column names to validate.
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

            if ($this->aAuthor !== null) {
                if (!$this->aAuthor->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAuthor->getValidationFailures());
                }
            }


            if (($retval = FilePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collContentsFiless !== null) {
                    foreach ($this->collContentsFiless as $referrerFK) {
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
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = FilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getAuthorId();
                break;
            case 2:
                return $this->getTitle();
                break;
            case 3:
                return $this->getDate();
                break;
            case 4:
                return $this->getDescription();
                break;
            case 5:
                return $this->getFileType();
                break;
            case 6:
                return $this->getPath();
                break;
            case 7:
                return $this->getAccessRights();
                break;
            case 8:
                return $this->getDownloadsCount();
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
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['File'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['File'][$this->getPrimaryKey()] = true;
        $keys = FilePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getAuthorId(),
            $keys[2] => $this->getTitle(),
            $keys[3] => $this->getDate(),
            $keys[4] => $this->getDescription(),
            $keys[5] => $this->getFileType(),
            $keys[6] => $this->getPath(),
            $keys[7] => $this->getAccessRights(),
            $keys[8] => $this->getDownloadsCount(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aAuthor) {
                $result['Author'] = $this->aAuthor->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collContentsFiless) {
                $result['ContentsFiless'] = $this->collContentsFiless->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = FilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setAuthorId($value);
                break;
            case 2:
                $this->setTitle($value);
                break;
            case 3:
                $this->setDate($value);
                break;
            case 4:
                $this->setDescription($value);
                break;
            case 5:
                $valueSet = FilePeer::getValueSet(FilePeer::FILE_TYPE);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setFileType($value);
                break;
            case 6:
                $this->setPath($value);
                break;
            case 7:
                $this->setAccessRights($value);
                break;
            case 8:
                $this->setDownloadsCount($value);
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
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = FilePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setAuthorId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTitle($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDate($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDescription($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setFileType($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setPath($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setAccessRights($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setDownloadsCount($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(FilePeer::DATABASE_NAME);

        if ($this->isColumnModified(FilePeer::ID)) $criteria->add(FilePeer::ID, $this->id);
        if ($this->isColumnModified(FilePeer::AUTHOR_ID)) $criteria->add(FilePeer::AUTHOR_ID, $this->author_id);
        if ($this->isColumnModified(FilePeer::TITLE)) $criteria->add(FilePeer::TITLE, $this->title);
        if ($this->isColumnModified(FilePeer::DATE)) $criteria->add(FilePeer::DATE, $this->date);
        if ($this->isColumnModified(FilePeer::DESCRIPTION)) $criteria->add(FilePeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(FilePeer::FILE_TYPE)) $criteria->add(FilePeer::FILE_TYPE, $this->file_type);
        if ($this->isColumnModified(FilePeer::PATH)) $criteria->add(FilePeer::PATH, $this->path);
        if ($this->isColumnModified(FilePeer::ACCESS_RIGHTS)) $criteria->add(FilePeer::ACCESS_RIGHTS, $this->access_rights);
        if ($this->isColumnModified(FilePeer::DOWNLOADS_COUNT)) $criteria->add(FilePeer::DOWNLOADS_COUNT, $this->downloads_count);

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
        $criteria = new Criteria(FilePeer::DATABASE_NAME);
        $criteria->add(FilePeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
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
     * @param object $copyObj An object of File (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setAuthorId($this->getAuthorId());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setDate($this->getDate());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setFileType($this->getFileType());
        $copyObj->setPath($this->getPath());
        $copyObj->setAccessRights($this->getAccessRights());
        $copyObj->setDownloadsCount($this->getDownloadsCount());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getContentsFiless() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addContentsFiles($relObj->copy($deepCopy));
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
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return File Clone of current object.
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
     * @return FilePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new FilePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param             User $v
     * @return File The current object (for fluent API support)
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
            $v->addFile($this);
        }


        return $this;
    }


    /**
     * Get the associated User object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return User The associated User object.
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
                $this->aAuthor->addFiles($this);
             */
        }

        return $this->aAuthor;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('ContentsFiles' == $relationName) {
            $this->initContentsFiless();
        }
    }

    /**
     * Clears out the collContentsFiless collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addContentsFiless()
     */
    public function clearContentsFiless()
    {
        $this->collContentsFiless = null; // important to set this to null since that means it is uninitialized
        $this->collContentsFilessPartial = null;
    }

    /**
     * reset is the collContentsFiless collection loaded partially
     *
     * @return void
     */
    public function resetPartialContentsFiless($v = true)
    {
        $this->collContentsFilessPartial = $v;
    }

    /**
     * Initializes the collContentsFiless collection.
     *
     * By default this just sets the collContentsFiless collection to an empty array (like clearcollContentsFiless());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initContentsFiless($overrideExisting = true)
    {
        if (null !== $this->collContentsFiless && !$overrideExisting) {
            return;
        }
        $this->collContentsFiless = new PropelObjectCollection();
        $this->collContentsFiless->setModel('ContentsFiles');
    }

    /**
     * Gets an array of ContentsFiles objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this File is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ContentsFiles[] List of ContentsFiles objects
     * @throws PropelException
     */
    public function getContentsFiless($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collContentsFilessPartial && !$this->isNew();
        if (null === $this->collContentsFiless || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collContentsFiless) {
                // return empty collection
                $this->initContentsFiless();
            } else {
                $collContentsFiless = ContentsFilesQuery::create(null, $criteria)
                    ->filterByFile($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collContentsFilessPartial && count($collContentsFiless)) {
                      $this->initContentsFiless(false);

                      foreach($collContentsFiless as $obj) {
                        if (false == $this->collContentsFiless->contains($obj)) {
                          $this->collContentsFiless->append($obj);
                        }
                      }

                      $this->collContentsFilessPartial = true;
                    }

                    return $collContentsFiless;
                }

                if($partial && $this->collContentsFiless) {
                    foreach($this->collContentsFiless as $obj) {
                        if($obj->isNew()) {
                            $collContentsFiless[] = $obj;
                        }
                    }
                }

                $this->collContentsFiless = $collContentsFiless;
                $this->collContentsFilessPartial = false;
            }
        }

        return $this->collContentsFiless;
    }

    /**
     * Sets a collection of ContentsFiles objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $contentsFiless A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setContentsFiless(PropelCollection $contentsFiless, PropelPDO $con = null)
    {
        $this->contentsFilessScheduledForDeletion = $this->getContentsFiless(new Criteria(), $con)->diff($contentsFiless);

        foreach ($this->contentsFilessScheduledForDeletion as $contentsFilesRemoved) {
            $contentsFilesRemoved->setFile(null);
        }

        $this->collContentsFiless = null;
        foreach ($contentsFiless as $contentsFiles) {
            $this->addContentsFiles($contentsFiles);
        }

        $this->collContentsFiless = $contentsFiless;
        $this->collContentsFilessPartial = false;
    }

    /**
     * Returns the number of related ContentsFiles objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ContentsFiles objects.
     * @throws PropelException
     */
    public function countContentsFiless(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collContentsFilessPartial && !$this->isNew();
        if (null === $this->collContentsFiless || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collContentsFiless) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getContentsFiless());
                }
                $query = ContentsFilesQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByFile($this)
                    ->count($con);
            }
        } else {
            return count($this->collContentsFiless);
        }
    }

    /**
     * Method called to associate a ContentsFiles object to this object
     * through the ContentsFiles foreign key attribute.
     *
     * @param    ContentsFiles $l ContentsFiles
     * @return File The current object (for fluent API support)
     */
    public function addContentsFiles(ContentsFiles $l)
    {
        if ($this->collContentsFiless === null) {
            $this->initContentsFiless();
            $this->collContentsFilessPartial = true;
        }
        if (!$this->collContentsFiless->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddContentsFiles($l);
        }

        return $this;
    }

    /**
     * @param	ContentsFiles $contentsFiles The contentsFiles object to add.
     */
    protected function doAddContentsFiles($contentsFiles)
    {
        $this->collContentsFiless[]= $contentsFiles;
        $contentsFiles->setFile($this);
    }

    /**
     * @param	ContentsFiles $contentsFiles The contentsFiles object to remove.
     */
    public function removeContentsFiles($contentsFiles)
    {
        if ($this->getContentsFiless()->contains($contentsFiles)) {
            $this->collContentsFiless->remove($this->collContentsFiless->search($contentsFiles));
            if (null === $this->contentsFilessScheduledForDeletion) {
                $this->contentsFilessScheduledForDeletion = clone $this->collContentsFiless;
                $this->contentsFilessScheduledForDeletion->clear();
            }
            $this->contentsFilessScheduledForDeletion[]= $contentsFiles;
            $contentsFiles->setFile(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this File is new, it will return
     * an empty collection; or if this File has previously
     * been saved, it will retrieve related ContentsFiless from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in File.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ContentsFiles[] List of ContentsFiles objects
     */
    public function getContentsFilessJoinContent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContentsFilesQuery::create(null, $criteria);
        $query->joinWith('Content', $join_behavior);

        return $this->getContentsFiless($query, $con);
    }

    /**
     * Clears out the collContents collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addContents()
     */
    public function clearContents()
    {
        $this->collContents = null; // important to set this to null since that means it is uninitialized
        $this->collContentsPartial = null;
    }

    /**
     * Initializes the collContents collection.
     *
     * By default this just sets the collContents collection to an empty collection (like clearContents());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initContents()
    {
        $this->collContents = new PropelObjectCollection();
        $this->collContents->setModel('Content');
    }

    /**
     * Gets a collection of Content objects related by a many-to-many relationship
     * to the current object by way of the contents_files cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this File is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|Content[] List of Content objects
     */
    public function getContents($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collContents || null !== $criteria) {
            if ($this->isNew() && null === $this->collContents) {
                // return empty collection
                $this->initContents();
            } else {
                $collContents = ContentQuery::create(null, $criteria)
                    ->filterByFile($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collContents;
                }
                $this->collContents = $collContents;
            }
        }

        return $this->collContents;
    }

    /**
     * Sets a collection of Content objects related by a many-to-many relationship
     * to the current object by way of the contents_files cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $contents A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setContents(PropelCollection $contents, PropelPDO $con = null)
    {
        $this->clearContents();
        $currentContents = $this->getContents();

        $this->contentsScheduledForDeletion = $currentContents->diff($contents);

        foreach ($contents as $content) {
            if (!$currentContents->contains($content)) {
                $this->doAddContent($content);
            }
        }

        $this->collContents = $contents;
    }

    /**
     * Gets the number of Content objects related by a many-to-many relationship
     * to the current object by way of the contents_files cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related Content objects
     */
    public function countContents($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collContents || null !== $criteria) {
            if ($this->isNew() && null === $this->collContents) {
                return 0;
            } else {
                $query = ContentQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByFile($this)
                    ->count($con);
            }
        } else {
            return count($this->collContents);
        }
    }

    /**
     * Associate a Content object to this object
     * through the contents_files cross reference table.
     *
     * @param  Content $content The ContentsFiles object to relate
     * @return void
     */
    public function addContent(Content $content)
    {
        if ($this->collContents === null) {
            $this->initContents();
        }
        if (!$this->collContents->contains($content)) { // only add it if the **same** object is not already associated
            $this->doAddContent($content);

            $this->collContents[]= $content;
        }
    }

    /**
     * @param	Content $content The content object to add.
     */
    protected function doAddContent($content)
    {
        $contentsFiles = new ContentsFiles();
        $contentsFiles->setContent($content);
        $this->addContentsFiles($contentsFiles);
    }

    /**
     * Remove a Content object to this object
     * through the contents_files cross reference table.
     *
     * @param Content $content The ContentsFiles object to relate
     * @return void
     */
    public function removeContent(Content $content)
    {
        if ($this->getContents()->contains($content)) {
            $this->collContents->remove($this->collContents->search($content));
            if (null === $this->contentsScheduledForDeletion) {
                $this->contentsScheduledForDeletion = clone $this->collContents;
                $this->contentsScheduledForDeletion->clear();
            }
            $this->contentsScheduledForDeletion[]= $content;
        }
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->author_id = null;
        $this->title = null;
        $this->date = null;
        $this->description = null;
        $this->file_type = null;
        $this->path = null;
        $this->access_rights = null;
        $this->downloads_count = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
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
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collContentsFiless) {
                foreach ($this->collContentsFiless as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collContents) {
                foreach ($this->collContents as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collContentsFiless instanceof PropelCollection) {
            $this->collContentsFiless->clearIterator();
        }
        $this->collContentsFiless = null;
        if ($this->collContents instanceof PropelCollection) {
            $this->collContents->clearIterator();
        }
        $this->collContents = null;
        $this->aAuthor = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(FilePeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
