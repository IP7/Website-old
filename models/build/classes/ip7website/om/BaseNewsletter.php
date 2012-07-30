<?php


/**
 * Base class that represents a row from the 'newsletters' table.
 *
 * 
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseNewsletter extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'NewsletterPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        NewsletterPeer
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
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * @var        PropelObjectCollection|Cursus[] Collection to store aggregation of Cursus objects.
     */
    protected $collCursuss;

    /**
     * @var        PropelObjectCollection|NewsletterPost[] Collection to store aggregation of NewsletterPost objects.
     */
    protected $collNewsletterPosts;

    /**
     * @var        PropelObjectCollection|NewslettersSubscribers[] Collection to store aggregation of NewslettersSubscribers objects.
     */
    protected $collNewslettersSubscriberss;

    /**
     * @var        PropelObjectCollection|User[] Collection to store aggregation of User objects.
     */
    protected $collSubscribers;

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
    protected $subscribersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $cursussScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $newsletterPostsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $newslettersSubscriberssScheduledForDeletion = null;

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
     * Get the [name] column value.
     * 
     * @return   string
     */
    public function getName()
    {

        return $this->name;
    }

    /**
     * Get the [description] column value.
     * 
     * @return   string
     */
    public function getDescription()
    {

        return $this->description;
    }

    /**
     * Set the value of [id] column.
     * 
     * @param      int $v new value
     * @return   Newsletter The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = NewsletterPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [name] column.
     * 
     * @param      string $v new value
     * @return   Newsletter The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = NewsletterPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [description] column.
     * 
     * @param      string $v new value
     * @return   Newsletter The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = NewsletterPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

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
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->description = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 3; // 3 = NewsletterPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Newsletter object", $e);
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
            $con = Propel::getConnection(NewsletterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = NewsletterPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collCursuss = null;

            $this->collNewsletterPosts = null;

            $this->collNewslettersSubscriberss = null;

            $this->collSubscribers = null;
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
            $con = Propel::getConnection(NewsletterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = NewsletterQuery::create()
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
            $con = Propel::getConnection(NewsletterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                NewsletterPeer::addInstanceToPool($this);
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

            if ($this->subscribersScheduledForDeletion !== null) {
                if (!$this->subscribersScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->subscribersScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($remotePk, $pk);
                    }
                    NewslettersSubscribersQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->subscribersScheduledForDeletion = null;
                }

                foreach ($this->getSubscribers() as $subscriber) {
                    if ($subscriber->isModified()) {
                        $subscriber->save($con);
                    }
                }
            }

            if ($this->cursussScheduledForDeletion !== null) {
                if (!$this->cursussScheduledForDeletion->isEmpty()) {
                    foreach ($this->cursussScheduledForDeletion as $cursus) {
                        // need to save related object because we set the relation to null
                        $cursus->save($con);
                    }
                    $this->cursussScheduledForDeletion = null;
                }
            }

            if ($this->collCursuss !== null) {
                foreach ($this->collCursuss as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->newsletterPostsScheduledForDeletion !== null) {
                if (!$this->newsletterPostsScheduledForDeletion->isEmpty()) {
                    foreach ($this->newsletterPostsScheduledForDeletion as $newsletterPost) {
                        // need to save related object because we set the relation to null
                        $newsletterPost->save($con);
                    }
                    $this->newsletterPostsScheduledForDeletion = null;
                }
            }

            if ($this->collNewsletterPosts !== null) {
                foreach ($this->collNewsletterPosts as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->newslettersSubscriberssScheduledForDeletion !== null) {
                if (!$this->newslettersSubscriberssScheduledForDeletion->isEmpty()) {
                    NewslettersSubscribersQuery::create()
                        ->filterByPrimaryKeys($this->newslettersSubscriberssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->newslettersSubscriberssScheduledForDeletion = null;
                }
            }

            if ($this->collNewslettersSubscriberss !== null) {
                foreach ($this->collNewslettersSubscriberss as $referrerFK) {
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

        $this->modifiedColumns[] = NewsletterPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . NewsletterPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(NewsletterPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(NewsletterPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`NAME`';
        }
        if ($this->isColumnModified(NewsletterPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }

        $sql = sprintf(
            'INSERT INTO `newsletters` (%s) VALUES (%s)',
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
                    case '`NAME`':
						$stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`DESCRIPTION`':
						$stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
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


            if (($retval = NewsletterPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCursuss !== null) {
                    foreach ($this->collCursuss as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collNewsletterPosts !== null) {
                    foreach ($this->collNewsletterPosts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collNewslettersSubscriberss !== null) {
                    foreach ($this->collNewslettersSubscriberss as $referrerFK) {
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
        $pos = NewsletterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getName();
                break;
            case 2:
                return $this->getDescription();
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
        if (isset($alreadyDumpedObjects['Newsletter'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Newsletter'][$this->getPrimaryKey()] = true;
        $keys = NewsletterPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getDescription(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collCursuss) {
                $result['Cursuss'] = $this->collCursuss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNewsletterPosts) {
                $result['NewsletterPosts'] = $this->collNewsletterPosts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNewslettersSubscriberss) {
                $result['NewslettersSubscriberss'] = $this->collNewslettersSubscriberss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = NewsletterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setName($value);
                break;
            case 2:
                $this->setDescription($value);
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
        $keys = NewsletterPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(NewsletterPeer::DATABASE_NAME);

        if ($this->isColumnModified(NewsletterPeer::ID)) $criteria->add(NewsletterPeer::ID, $this->id);
        if ($this->isColumnModified(NewsletterPeer::NAME)) $criteria->add(NewsletterPeer::NAME, $this->name);
        if ($this->isColumnModified(NewsletterPeer::DESCRIPTION)) $criteria->add(NewsletterPeer::DESCRIPTION, $this->description);

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
        $criteria = new Criteria(NewsletterPeer::DATABASE_NAME);
        $criteria->add(NewsletterPeer::ID, $this->id);

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
     * @param      object $copyObj An object of Newsletter (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setDescription($this->getDescription());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getCursuss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCursus($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNewsletterPosts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNewsletterPost($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNewslettersSubscriberss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNewslettersSubscribers($relObj->copy($deepCopy));
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
     * @return                 Newsletter Clone of current object.
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
     * @return   NewsletterPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new NewsletterPeer();
        }

        return self::$peer;
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
        if ('Cursus' == $relationName) {
            $this->initCursuss();
        }
        if ('NewsletterPost' == $relationName) {
            $this->initNewsletterPosts();
        }
        if ('NewslettersSubscribers' == $relationName) {
            $this->initNewslettersSubscriberss();
        }
    }

    /**
     * Clears out the collCursuss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCursuss()
     */
    public function clearCursuss()
    {
        $this->collCursuss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collCursuss collection.
     *
     * By default this just sets the collCursuss collection to an empty array (like clearcollCursuss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCursuss($overrideExisting = true)
    {
        if (null !== $this->collCursuss && !$overrideExisting) {
            return;
        }
        $this->collCursuss = new PropelObjectCollection();
        $this->collCursuss->setModel('Cursus');
    }

    /**
     * Gets an array of Cursus objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Newsletter is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Cursus[] List of Cursus objects
     * @throws PropelException
     */
    public function getCursuss($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collCursuss || null !== $criteria) {
            if ($this->isNew() && null === $this->collCursuss) {
                // return empty collection
                $this->initCursuss();
            } else {
                $collCursuss = CursusQuery::create(null, $criteria)
                    ->filterByNewsletter($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collCursuss;
                }
                $this->collCursuss = $collCursuss;
            }
        }

        return $this->collCursuss;
    }

    /**
     * Sets a collection of Cursus objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $cursuss A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setCursuss(PropelCollection $cursuss, PropelPDO $con = null)
    {
        $this->cursussScheduledForDeletion = $this->getCursuss(new Criteria(), $con)->diff($cursuss);

        foreach ($this->cursussScheduledForDeletion as $cursusRemoved) {
            $cursusRemoved->setNewsletter(null);
        }

        $this->collCursuss = null;
        foreach ($cursuss as $cursus) {
            $this->addCursus($cursus);
        }

        $this->collCursuss = $cursuss;
    }

    /**
     * Returns the number of related Cursus objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Cursus objects.
     * @throws PropelException
     */
    public function countCursuss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collCursuss || null !== $criteria) {
            if ($this->isNew() && null === $this->collCursuss) {
                return 0;
            } else {
                $query = CursusQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByNewsletter($this)
                    ->count($con);
            }
        } else {
            return count($this->collCursuss);
        }
    }

    /**
     * Method called to associate a Cursus object to this object
     * through the Cursus foreign key attribute.
     *
     * @param    Cursus $l Cursus
     * @return   Newsletter The current object (for fluent API support)
     */
    public function addCursus(Cursus $l)
    {
        if ($this->collCursuss === null) {
            $this->initCursuss();
        }
        if (!$this->collCursuss->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddCursus($l);
        }

        return $this;
    }

    /**
     * @param	Cursus $cursus The cursus object to add.
     */
    protected function doAddCursus($cursus)
    {
        $this->collCursuss[]= $cursus;
        $cursus->setNewsletter($this);
    }

    /**
     * @param	Cursus $cursus The cursus object to remove.
     */
    public function removeCursus($cursus)
    {
        if ($this->getCursuss()->contains($cursus)) {
            $this->collCursuss->remove($this->collCursuss->search($cursus));
            if (null === $this->cursussScheduledForDeletion) {
                $this->cursussScheduledForDeletion = clone $this->collCursuss;
                $this->cursussScheduledForDeletion->clear();
            }
            $this->cursussScheduledForDeletion[]= $cursus;
            $cursus->setNewsletter(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Newsletter is new, it will return
     * an empty collection; or if this Newsletter has previously
     * been saved, it will retrieve related Cursuss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Newsletter.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Cursus[] List of Cursus objects
     */
    public function getCursussJoinResponsable($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CursusQuery::create(null, $criteria);
        $query->joinWith('Responsable', $join_behavior);

        return $this->getCursuss($query, $con);
    }

    /**
     * Clears out the collNewsletterPosts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addNewsletterPosts()
     */
    public function clearNewsletterPosts()
    {
        $this->collNewsletterPosts = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collNewsletterPosts collection.
     *
     * By default this just sets the collNewsletterPosts collection to an empty array (like clearcollNewsletterPosts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNewsletterPosts($overrideExisting = true)
    {
        if (null !== $this->collNewsletterPosts && !$overrideExisting) {
            return;
        }
        $this->collNewsletterPosts = new PropelObjectCollection();
        $this->collNewsletterPosts->setModel('NewsletterPost');
    }

    /**
     * Gets an array of NewsletterPost objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Newsletter is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|NewsletterPost[] List of NewsletterPost objects
     * @throws PropelException
     */
    public function getNewsletterPosts($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collNewsletterPosts || null !== $criteria) {
            if ($this->isNew() && null === $this->collNewsletterPosts) {
                // return empty collection
                $this->initNewsletterPosts();
            } else {
                $collNewsletterPosts = NewsletterPostQuery::create(null, $criteria)
                    ->filterByNewsletter($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collNewsletterPosts;
                }
                $this->collNewsletterPosts = $collNewsletterPosts;
            }
        }

        return $this->collNewsletterPosts;
    }

    /**
     * Sets a collection of NewsletterPost objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $newsletterPosts A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setNewsletterPosts(PropelCollection $newsletterPosts, PropelPDO $con = null)
    {
        $this->newsletterPostsScheduledForDeletion = $this->getNewsletterPosts(new Criteria(), $con)->diff($newsletterPosts);

        foreach ($this->newsletterPostsScheduledForDeletion as $newsletterPostRemoved) {
            $newsletterPostRemoved->setNewsletter(null);
        }

        $this->collNewsletterPosts = null;
        foreach ($newsletterPosts as $newsletterPost) {
            $this->addNewsletterPost($newsletterPost);
        }

        $this->collNewsletterPosts = $newsletterPosts;
    }

    /**
     * Returns the number of related NewsletterPost objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related NewsletterPost objects.
     * @throws PropelException
     */
    public function countNewsletterPosts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collNewsletterPosts || null !== $criteria) {
            if ($this->isNew() && null === $this->collNewsletterPosts) {
                return 0;
            } else {
                $query = NewsletterPostQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByNewsletter($this)
                    ->count($con);
            }
        } else {
            return count($this->collNewsletterPosts);
        }
    }

    /**
     * Method called to associate a NewsletterPost object to this object
     * through the NewsletterPost foreign key attribute.
     *
     * @param    NewsletterPost $l NewsletterPost
     * @return   Newsletter The current object (for fluent API support)
     */
    public function addNewsletterPost(NewsletterPost $l)
    {
        if ($this->collNewsletterPosts === null) {
            $this->initNewsletterPosts();
        }
        if (!$this->collNewsletterPosts->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddNewsletterPost($l);
        }

        return $this;
    }

    /**
     * @param	NewsletterPost $newsletterPost The newsletterPost object to add.
     */
    protected function doAddNewsletterPost($newsletterPost)
    {
        $this->collNewsletterPosts[]= $newsletterPost;
        $newsletterPost->setNewsletter($this);
    }

    /**
     * @param	NewsletterPost $newsletterPost The newsletterPost object to remove.
     */
    public function removeNewsletterPost($newsletterPost)
    {
        if ($this->getNewsletterPosts()->contains($newsletterPost)) {
            $this->collNewsletterPosts->remove($this->collNewsletterPosts->search($newsletterPost));
            if (null === $this->newsletterPostsScheduledForDeletion) {
                $this->newsletterPostsScheduledForDeletion = clone $this->collNewsletterPosts;
                $this->newsletterPostsScheduledForDeletion->clear();
            }
            $this->newsletterPostsScheduledForDeletion[]= $newsletterPost;
            $newsletterPost->setNewsletter(null);
        }
    }

    /**
     * Clears out the collNewslettersSubscriberss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addNewslettersSubscriberss()
     */
    public function clearNewslettersSubscriberss()
    {
        $this->collNewslettersSubscriberss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collNewslettersSubscriberss collection.
     *
     * By default this just sets the collNewslettersSubscriberss collection to an empty array (like clearcollNewslettersSubscriberss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNewslettersSubscriberss($overrideExisting = true)
    {
        if (null !== $this->collNewslettersSubscriberss && !$overrideExisting) {
            return;
        }
        $this->collNewslettersSubscriberss = new PropelObjectCollection();
        $this->collNewslettersSubscriberss->setModel('NewslettersSubscribers');
    }

    /**
     * Gets an array of NewslettersSubscribers objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Newsletter is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|NewslettersSubscribers[] List of NewslettersSubscribers objects
     * @throws PropelException
     */
    public function getNewslettersSubscriberss($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collNewslettersSubscriberss || null !== $criteria) {
            if ($this->isNew() && null === $this->collNewslettersSubscriberss) {
                // return empty collection
                $this->initNewslettersSubscriberss();
            } else {
                $collNewslettersSubscriberss = NewslettersSubscribersQuery::create(null, $criteria)
                    ->filterByNewsletter($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collNewslettersSubscriberss;
                }
                $this->collNewslettersSubscriberss = $collNewslettersSubscriberss;
            }
        }

        return $this->collNewslettersSubscriberss;
    }

    /**
     * Sets a collection of NewslettersSubscribers objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $newslettersSubscriberss A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setNewslettersSubscriberss(PropelCollection $newslettersSubscriberss, PropelPDO $con = null)
    {
        $this->newslettersSubscriberssScheduledForDeletion = $this->getNewslettersSubscriberss(new Criteria(), $con)->diff($newslettersSubscriberss);

        foreach ($this->newslettersSubscriberssScheduledForDeletion as $newslettersSubscribersRemoved) {
            $newslettersSubscribersRemoved->setNewsletter(null);
        }

        $this->collNewslettersSubscriberss = null;
        foreach ($newslettersSubscriberss as $newslettersSubscribers) {
            $this->addNewslettersSubscribers($newslettersSubscribers);
        }

        $this->collNewslettersSubscriberss = $newslettersSubscriberss;
    }

    /**
     * Returns the number of related NewslettersSubscribers objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related NewslettersSubscribers objects.
     * @throws PropelException
     */
    public function countNewslettersSubscriberss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collNewslettersSubscriberss || null !== $criteria) {
            if ($this->isNew() && null === $this->collNewslettersSubscriberss) {
                return 0;
            } else {
                $query = NewslettersSubscribersQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByNewsletter($this)
                    ->count($con);
            }
        } else {
            return count($this->collNewslettersSubscriberss);
        }
    }

    /**
     * Method called to associate a NewslettersSubscribers object to this object
     * through the NewslettersSubscribers foreign key attribute.
     *
     * @param    NewslettersSubscribers $l NewslettersSubscribers
     * @return   Newsletter The current object (for fluent API support)
     */
    public function addNewslettersSubscribers(NewslettersSubscribers $l)
    {
        if ($this->collNewslettersSubscriberss === null) {
            $this->initNewslettersSubscriberss();
        }
        if (!$this->collNewslettersSubscriberss->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddNewslettersSubscribers($l);
        }

        return $this;
    }

    /**
     * @param	NewslettersSubscribers $newslettersSubscribers The newslettersSubscribers object to add.
     */
    protected function doAddNewslettersSubscribers($newslettersSubscribers)
    {
        $this->collNewslettersSubscriberss[]= $newslettersSubscribers;
        $newslettersSubscribers->setNewsletter($this);
    }

    /**
     * @param	NewslettersSubscribers $newslettersSubscribers The newslettersSubscribers object to remove.
     */
    public function removeNewslettersSubscribers($newslettersSubscribers)
    {
        if ($this->getNewslettersSubscriberss()->contains($newslettersSubscribers)) {
            $this->collNewslettersSubscriberss->remove($this->collNewslettersSubscriberss->search($newslettersSubscribers));
            if (null === $this->newslettersSubscriberssScheduledForDeletion) {
                $this->newslettersSubscriberssScheduledForDeletion = clone $this->collNewslettersSubscriberss;
                $this->newslettersSubscriberssScheduledForDeletion->clear();
            }
            $this->newslettersSubscriberssScheduledForDeletion[]= $newslettersSubscribers;
            $newslettersSubscribers->setNewsletter(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Newsletter is new, it will return
     * an empty collection; or if this Newsletter has previously
     * been saved, it will retrieve related NewslettersSubscriberss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Newsletter.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|NewslettersSubscribers[] List of NewslettersSubscribers objects
     */
    public function getNewslettersSubscriberssJoinSubscriber($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NewslettersSubscribersQuery::create(null, $criteria);
        $query->joinWith('Subscriber', $join_behavior);

        return $this->getNewslettersSubscriberss($query, $con);
    }

    /**
     * Clears out the collSubscribers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSubscribers()
     */
    public function clearSubscribers()
    {
        $this->collSubscribers = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collSubscribers collection.
     *
     * By default this just sets the collSubscribers collection to an empty collection (like clearSubscribers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initSubscribers()
    {
        $this->collSubscribers = new PropelObjectCollection();
        $this->collSubscribers->setModel('User');
    }

    /**
     * Gets a collection of User objects related by a many-to-many relationship
     * to the current object by way of the newsletters_subscribers cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Newsletter is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|User[] List of User objects
     */
    public function getSubscribers($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collSubscribers || null !== $criteria) {
            if ($this->isNew() && null === $this->collSubscribers) {
                // return empty collection
                $this->initSubscribers();
            } else {
                $collSubscribers = UserQuery::create(null, $criteria)
                    ->filterByNewsletter($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collSubscribers;
                }
                $this->collSubscribers = $collSubscribers;
            }
        }

        return $this->collSubscribers;
    }

    /**
     * Sets a collection of User objects related by a many-to-many relationship
     * to the current object by way of the newsletters_subscribers cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $subscribers A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setSubscribers(PropelCollection $subscribers, PropelPDO $con = null)
    {
        $this->clearSubscribers();
        $currentSubscribers = $this->getSubscribers();

        $this->subscribersScheduledForDeletion = $currentSubscribers->diff($subscribers);

        foreach ($subscribers as $subscriber) {
            if (!$currentSubscribers->contains($subscriber)) {
                $this->doAddSubscriber($subscriber);
            }
        }

        $this->collSubscribers = $subscribers;
    }

    /**
     * Gets the number of User objects related by a many-to-many relationship
     * to the current object by way of the newsletters_subscribers cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      PropelPDO $con Optional connection object
     *
     * @return int the number of related User objects
     */
    public function countSubscribers($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collSubscribers || null !== $criteria) {
            if ($this->isNew() && null === $this->collSubscribers) {
                return 0;
            } else {
                $query = UserQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByNewsletter($this)
                    ->count($con);
            }
        } else {
            return count($this->collSubscribers);
        }
    }

    /**
     * Associate a User object to this object
     * through the newsletters_subscribers cross reference table.
     *
     * @param  User $user The NewslettersSubscribers object to relate
     * @return void
     */
    public function addSubscriber(User $user)
    {
        if ($this->collSubscribers === null) {
            $this->initSubscribers();
        }
        if (!$this->collSubscribers->contains($user)) { // only add it if the **same** object is not already associated
            $this->doAddSubscriber($user);

            $this->collSubscribers[]= $user;
        }
    }

    /**
     * @param	Subscriber $subscriber The subscriber object to add.
     */
    protected function doAddSubscriber($subscriber)
    {
        $newslettersSubscribers = new NewslettersSubscribers();
        $newslettersSubscribers->setSubscriber($subscriber);
        $this->addNewslettersSubscribers($newslettersSubscribers);
    }

    /**
     * Remove a User object to this object
     * through the newsletters_subscribers cross reference table.
     *
     * @param      User $user The NewslettersSubscribers object to relate
     * @return void
     */
    public function removeSubscriber(User $user)
    {
        if ($this->getSubscribers()->contains($user)) {
            $this->collSubscribers->remove($this->collSubscribers->search($user));
            if (null === $this->subscribersScheduledForDeletion) {
                $this->subscribersScheduledForDeletion = clone $this->collSubscribers;
                $this->subscribersScheduledForDeletion->clear();
            }
            $this->subscribersScheduledForDeletion[]= $user;
        }
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->name = null;
        $this->description = null;
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
            if ($this->collCursuss) {
                foreach ($this->collCursuss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNewsletterPosts) {
                foreach ($this->collNewsletterPosts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNewslettersSubscriberss) {
                foreach ($this->collNewslettersSubscriberss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSubscribers) {
                foreach ($this->collSubscribers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collCursuss instanceof PropelCollection) {
            $this->collCursuss->clearIterator();
        }
        $this->collCursuss = null;
        if ($this->collNewsletterPosts instanceof PropelCollection) {
            $this->collNewsletterPosts->clearIterator();
        }
        $this->collNewsletterPosts = null;
        if ($this->collNewslettersSubscriberss instanceof PropelCollection) {
            $this->collNewslettersSubscriberss->clearIterator();
        }
        $this->collNewslettersSubscriberss = null;
        if ($this->collSubscribers instanceof PropelCollection) {
            $this->collSubscribers->clearIterator();
        }
        $this->collSubscribers = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(NewsletterPeer::DEFAULT_STRING_FORMAT);
    }

} // BaseNewsletter
