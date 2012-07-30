<?php


/**
 * Base class that represents a row from the 'alerts' table.
 *
 * 
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseAlert extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'AlertPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        AlertPeer
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
     * The value for the subscriber_id field.
     * @var        int
     */
    protected $subscriber_id;

    /**
     * The value for the cursus_id field.
     * @var        int
     */
    protected $cursus_id;

    /**
     * The value for the course_id field.
     * @var        int
     */
    protected $course_id;

    /**
     * The value for the tag_id field.
     * @var        int
     */
    protected $tag_id;

    /**
     * The value for the content_type_id field.
     * @var        int
     */
    protected $content_type_id;

    /**
     * @var        User
     */
    protected $aSubscriber;

    /**
     * @var        Cursus
     */
    protected $aCursus;

    /**
     * @var        Course
     */
    protected $aCourse;

    /**
     * @var        Tag
     */
    protected $aTag;

    /**
     * @var        ContentType
     */
    protected $aContentType;

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
     * Get the [id] column value.
     * 
     * @return   int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [subscriber_id] column value.
     * 
     * @return   int
     */
    public function getSubscriberId()
    {

        return $this->subscriber_id;
    }

    /**
     * Get the [cursus_id] column value.
     * 
     * @return   int
     */
    public function getCursusId()
    {

        return $this->cursus_id;
    }

    /**
     * Get the [course_id] column value.
     * 
     * @return   int
     */
    public function getCourseId()
    {

        return $this->course_id;
    }

    /**
     * Get the [tag_id] column value.
     * 
     * @return   int
     */
    public function getTagId()
    {

        return $this->tag_id;
    }

    /**
     * Get the [content_type_id] column value.
     * 
     * @return   int
     */
    public function getContentTypeId()
    {

        return $this->content_type_id;
    }

    /**
     * Set the value of [id] column.
     * 
     * @param      int $v new value
     * @return   Alert The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = AlertPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [subscriber_id] column.
     * 
     * @param      int $v new value
     * @return   Alert The current object (for fluent API support)
     */
    public function setSubscriberId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->subscriber_id !== $v) {
            $this->subscriber_id = $v;
            $this->modifiedColumns[] = AlertPeer::SUBSCRIBER_ID;
        }

        if ($this->aSubscriber !== null && $this->aSubscriber->getId() !== $v) {
            $this->aSubscriber = null;
        }


        return $this;
    } // setSubscriberId()

    /**
     * Set the value of [cursus_id] column.
     * 
     * @param      int $v new value
     * @return   Alert The current object (for fluent API support)
     */
    public function setCursusId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cursus_id !== $v) {
            $this->cursus_id = $v;
            $this->modifiedColumns[] = AlertPeer::CURSUS_ID;
        }

        if ($this->aCursus !== null && $this->aCursus->getId() !== $v) {
            $this->aCursus = null;
        }


        return $this;
    } // setCursusId()

    /**
     * Set the value of [course_id] column.
     * 
     * @param      int $v new value
     * @return   Alert The current object (for fluent API support)
     */
    public function setCourseId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->course_id !== $v) {
            $this->course_id = $v;
            $this->modifiedColumns[] = AlertPeer::COURSE_ID;
        }

        if ($this->aCourse !== null && $this->aCourse->getId() !== $v) {
            $this->aCourse = null;
        }


        return $this;
    } // setCourseId()

    /**
     * Set the value of [tag_id] column.
     * 
     * @param      int $v new value
     * @return   Alert The current object (for fluent API support)
     */
    public function setTagId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->tag_id !== $v) {
            $this->tag_id = $v;
            $this->modifiedColumns[] = AlertPeer::TAG_ID;
        }

        if ($this->aTag !== null && $this->aTag->getId() !== $v) {
            $this->aTag = null;
        }


        return $this;
    } // setTagId()

    /**
     * Set the value of [content_type_id] column.
     * 
     * @param      int $v new value
     * @return   Alert The current object (for fluent API support)
     */
    public function setContentTypeId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->content_type_id !== $v) {
            $this->content_type_id = $v;
            $this->modifiedColumns[] = AlertPeer::CONTENT_TYPE_ID;
        }

        if ($this->aContentType !== null && $this->aContentType->getId() !== $v) {
            $this->aContentType = null;
        }


        return $this;
    } // setContentTypeId()

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
            $this->subscriber_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->cursus_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->course_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->tag_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->content_type_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = AlertPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Alert object", $e);
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

        if ($this->aSubscriber !== null && $this->subscriber_id !== $this->aSubscriber->getId()) {
            $this->aSubscriber = null;
        }
        if ($this->aCursus !== null && $this->cursus_id !== $this->aCursus->getId()) {
            $this->aCursus = null;
        }
        if ($this->aCourse !== null && $this->course_id !== $this->aCourse->getId()) {
            $this->aCourse = null;
        }
        if ($this->aTag !== null && $this->tag_id !== $this->aTag->getId()) {
            $this->aTag = null;
        }
        if ($this->aContentType !== null && $this->content_type_id !== $this->aContentType->getId()) {
            $this->aContentType = null;
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
            $con = Propel::getConnection(AlertPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = AlertPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSubscriber = null;
            $this->aCursus = null;
            $this->aCourse = null;
            $this->aTag = null;
            $this->aContentType = null;
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
            $con = Propel::getConnection(AlertPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = AlertQuery::create()
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
            $con = Propel::getConnection(AlertPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                AlertPeer::addInstanceToPool($this);
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

            if ($this->aSubscriber !== null) {
                if ($this->aSubscriber->isModified() || $this->aSubscriber->isNew()) {
                    $affectedRows += $this->aSubscriber->save($con);
                }
                $this->setSubscriber($this->aSubscriber);
            }

            if ($this->aCursus !== null) {
                if ($this->aCursus->isModified() || $this->aCursus->isNew()) {
                    $affectedRows += $this->aCursus->save($con);
                }
                $this->setCursus($this->aCursus);
            }

            if ($this->aCourse !== null) {
                if ($this->aCourse->isModified() || $this->aCourse->isNew()) {
                    $affectedRows += $this->aCourse->save($con);
                }
                $this->setCourse($this->aCourse);
            }

            if ($this->aTag !== null) {
                if ($this->aTag->isModified() || $this->aTag->isNew()) {
                    $affectedRows += $this->aTag->save($con);
                }
                $this->setTag($this->aTag);
            }

            if ($this->aContentType !== null) {
                if ($this->aContentType->isModified() || $this->aContentType->isNew()) {
                    $affectedRows += $this->aContentType->save($con);
                }
                $this->setContentType($this->aContentType);
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

        $this->modifiedColumns[] = AlertPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AlertPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AlertPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(AlertPeer::SUBSCRIBER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`SUBSCRIBER_ID`';
        }
        if ($this->isColumnModified(AlertPeer::CURSUS_ID)) {
            $modifiedColumns[':p' . $index++]  = '`CURSUS_ID`';
        }
        if ($this->isColumnModified(AlertPeer::COURSE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`COURSE_ID`';
        }
        if ($this->isColumnModified(AlertPeer::TAG_ID)) {
            $modifiedColumns[':p' . $index++]  = '`TAG_ID`';
        }
        if ($this->isColumnModified(AlertPeer::CONTENT_TYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`CONTENT_TYPE_ID`';
        }

        $sql = sprintf(
            'INSERT INTO `alerts` (%s) VALUES (%s)',
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
                    case '`SUBSCRIBER_ID`':
						$stmt->bindValue($identifier, $this->subscriber_id, PDO::PARAM_INT);
                        break;
                    case '`CURSUS_ID`':
						$stmt->bindValue($identifier, $this->cursus_id, PDO::PARAM_INT);
                        break;
                    case '`COURSE_ID`':
						$stmt->bindValue($identifier, $this->course_id, PDO::PARAM_INT);
                        break;
                    case '`TAG_ID`':
						$stmt->bindValue($identifier, $this->tag_id, PDO::PARAM_INT);
                        break;
                    case '`CONTENT_TYPE_ID`':
						$stmt->bindValue($identifier, $this->content_type_id, PDO::PARAM_INT);
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

            if ($this->aSubscriber !== null) {
                if (!$this->aSubscriber->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSubscriber->getValidationFailures());
                }
            }

            if ($this->aCursus !== null) {
                if (!$this->aCursus->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCursus->getValidationFailures());
                }
            }

            if ($this->aCourse !== null) {
                if (!$this->aCourse->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCourse->getValidationFailures());
                }
            }

            if ($this->aTag !== null) {
                if (!$this->aTag->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTag->getValidationFailures());
                }
            }

            if ($this->aContentType !== null) {
                if (!$this->aContentType->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aContentType->getValidationFailures());
                }
            }


            if (($retval = AlertPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = AlertPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getSubscriberId();
                break;
            case 2:
                return $this->getCursusId();
                break;
            case 3:
                return $this->getCourseId();
                break;
            case 4:
                return $this->getTagId();
                break;
            case 5:
                return $this->getContentTypeId();
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
        if (isset($alreadyDumpedObjects['Alert'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Alert'][$this->getPrimaryKey()] = true;
        $keys = AlertPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getSubscriberId(),
            $keys[2] => $this->getCursusId(),
            $keys[3] => $this->getCourseId(),
            $keys[4] => $this->getTagId(),
            $keys[5] => $this->getContentTypeId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aSubscriber) {
                $result['Subscriber'] = $this->aSubscriber->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCursus) {
                $result['Cursus'] = $this->aCursus->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCourse) {
                $result['Course'] = $this->aCourse->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTag) {
                $result['Tag'] = $this->aTag->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aContentType) {
                $result['ContentType'] = $this->aContentType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = AlertPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setSubscriberId($value);
                break;
            case 2:
                $this->setCursusId($value);
                break;
            case 3:
                $this->setCourseId($value);
                break;
            case 4:
                $this->setTagId($value);
                break;
            case 5:
                $this->setContentTypeId($value);
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
        $keys = AlertPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSubscriberId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCursusId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCourseId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTagId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setContentTypeId($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AlertPeer::DATABASE_NAME);

        if ($this->isColumnModified(AlertPeer::ID)) $criteria->add(AlertPeer::ID, $this->id);
        if ($this->isColumnModified(AlertPeer::SUBSCRIBER_ID)) $criteria->add(AlertPeer::SUBSCRIBER_ID, $this->subscriber_id);
        if ($this->isColumnModified(AlertPeer::CURSUS_ID)) $criteria->add(AlertPeer::CURSUS_ID, $this->cursus_id);
        if ($this->isColumnModified(AlertPeer::COURSE_ID)) $criteria->add(AlertPeer::COURSE_ID, $this->course_id);
        if ($this->isColumnModified(AlertPeer::TAG_ID)) $criteria->add(AlertPeer::TAG_ID, $this->tag_id);
        if ($this->isColumnModified(AlertPeer::CONTENT_TYPE_ID)) $criteria->add(AlertPeer::CONTENT_TYPE_ID, $this->content_type_id);

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
        $criteria = new Criteria(AlertPeer::DATABASE_NAME);
        $criteria->add(AlertPeer::ID, $this->id);

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
     * @param      object $copyObj An object of Alert (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSubscriberId($this->getSubscriberId());
        $copyObj->setCursusId($this->getCursusId());
        $copyObj->setCourseId($this->getCourseId());
        $copyObj->setTagId($this->getTagId());
        $copyObj->setContentTypeId($this->getContentTypeId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

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
     * @return                 Alert Clone of current object.
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
     * @return   AlertPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new AlertPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return                 Alert The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSubscriber(User $v = null)
    {
        if ($v === null) {
            $this->setSubscriberId(NULL);
        } else {
            $this->setSubscriberId($v->getId());
        }

        $this->aSubscriber = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the User object, it will not be re-added.
        if ($v !== null) {
            $v->addAlert($this);
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
    public function getSubscriber(PropelPDO $con = null)
    {
        if ($this->aSubscriber === null && ($this->subscriber_id !== null)) {
            $this->aSubscriber = UserQuery::create()->findPk($this->subscriber_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSubscriber->addAlerts($this);
             */
        }

        return $this->aSubscriber;
    }

    /**
     * Declares an association between this object and a Cursus object.
     *
     * @param                  Cursus $v
     * @return                 Alert The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCursus(Cursus $v = null)
    {
        if ($v === null) {
            $this->setCursusId(NULL);
        } else {
            $this->setCursusId($v->getId());
        }

        $this->aCursus = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Cursus object, it will not be re-added.
        if ($v !== null) {
            $v->addAlert($this);
        }


        return $this;
    }


    /**
     * Get the associated Cursus object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 Cursus The associated Cursus object.
     * @throws PropelException
     */
    public function getCursus(PropelPDO $con = null)
    {
        if ($this->aCursus === null && ($this->cursus_id !== null)) {
            $this->aCursus = CursusQuery::create()->findPk($this->cursus_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCursus->addAlerts($this);
             */
        }

        return $this->aCursus;
    }

    /**
     * Declares an association between this object and a Course object.
     *
     * @param                  Course $v
     * @return                 Alert The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCourse(Course $v = null)
    {
        if ($v === null) {
            $this->setCourseId(NULL);
        } else {
            $this->setCourseId($v->getId());
        }

        $this->aCourse = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Course object, it will not be re-added.
        if ($v !== null) {
            $v->addAlert($this);
        }


        return $this;
    }


    /**
     * Get the associated Course object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 Course The associated Course object.
     * @throws PropelException
     */
    public function getCourse(PropelPDO $con = null)
    {
        if ($this->aCourse === null && ($this->course_id !== null)) {
            $this->aCourse = CourseQuery::create()->findPk($this->course_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCourse->addAlerts($this);
             */
        }

        return $this->aCourse;
    }

    /**
     * Declares an association between this object and a Tag object.
     *
     * @param                  Tag $v
     * @return                 Alert The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTag(Tag $v = null)
    {
        if ($v === null) {
            $this->setTagId(NULL);
        } else {
            $this->setTagId($v->getId());
        }

        $this->aTag = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Tag object, it will not be re-added.
        if ($v !== null) {
            $v->addAlert($this);
        }


        return $this;
    }


    /**
     * Get the associated Tag object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 Tag The associated Tag object.
     * @throws PropelException
     */
    public function getTag(PropelPDO $con = null)
    {
        if ($this->aTag === null && ($this->tag_id !== null)) {
            $this->aTag = TagQuery::create()->findPk($this->tag_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTag->addAlerts($this);
             */
        }

        return $this->aTag;
    }

    /**
     * Declares an association between this object and a ContentType object.
     *
     * @param                  ContentType $v
     * @return                 Alert The current object (for fluent API support)
     * @throws PropelException
     */
    public function setContentType(ContentType $v = null)
    {
        if ($v === null) {
            $this->setContentTypeId(NULL);
        } else {
            $this->setContentTypeId($v->getId());
        }

        $this->aContentType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ContentType object, it will not be re-added.
        if ($v !== null) {
            $v->addAlert($this);
        }


        return $this;
    }


    /**
     * Get the associated ContentType object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 ContentType The associated ContentType object.
     * @throws PropelException
     */
    public function getContentType(PropelPDO $con = null)
    {
        if ($this->aContentType === null && ($this->content_type_id !== null)) {
            $this->aContentType = ContentTypeQuery::create()->findPk($this->content_type_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aContentType->addAlerts($this);
             */
        }

        return $this->aContentType;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->subscriber_id = null;
        $this->cursus_id = null;
        $this->course_id = null;
        $this->tag_id = null;
        $this->content_type_id = null;
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
        } // if ($deep)

        $this->aSubscriber = null;
        $this->aCursus = null;
        $this->aCourse = null;
        $this->aTag = null;
        $this->aContentType = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AlertPeer::DEFAULT_STRING_FORMAT);
    }

} // BaseAlert
