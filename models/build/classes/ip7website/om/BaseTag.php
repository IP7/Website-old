<?php


/**
 * Base class that represents a row from the 'tags' table.
 *
 *
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseTag extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'TagPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TagPeer
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
     * @var        PropelObjectCollection|Alert[] Collection to store aggregation of Alert objects.
     */
    protected $collAlerts;
    protected $collAlertsPartial;

    /**
     * @var        PropelObjectCollection|ContentsTags[] Collection to store aggregation of ContentsTags objects.
     */
    protected $collContentsTagss;
    protected $collContentsTagssPartial;

    /**
     * @var        PropelObjectCollection|AdsTags[] Collection to store aggregation of AdsTags objects.
     */
    protected $collAdsTagss;
    protected $collAdsTagssPartial;

    /**
     * @var        PropelObjectCollection|Content[] Collection to store aggregation of Content objects.
     */
    protected $collContents;

    /**
     * @var        PropelObjectCollection|Ad[] Collection to store aggregation of Ad objects.
     */
    protected $collAds;

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
    protected $adsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $alertsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $contentsTagssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $adsTagssScheduledForDeletion = null;

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
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Tag The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = TagPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Tag The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = TagPeer::NAME;
        }


        return $this;
    } // setName()

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
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 2; // 2 = TagPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Tag object", $e);
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
            $con = Propel::getConnection(TagPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TagPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collAlerts = null;

            $this->collContentsTagss = null;

            $this->collAdsTagss = null;

            $this->collContents = null;
            $this->collAds = null;
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
            $con = Propel::getConnection(TagPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TagQuery::create()
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
            $con = Propel::getConnection(TagPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                TagPeer::addInstanceToPool($this);
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
                        $pks[] = array($pk, $remotePk);
                    }
                    ContentsTagsQuery::create()
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

            if ($this->adsScheduledForDeletion !== null) {
                if (!$this->adsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->adsScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($pk, $remotePk);
                    }
                    AdsTagsQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->adsScheduledForDeletion = null;
                }

                foreach ($this->getAds() as $ad) {
                    if ($ad->isModified()) {
                        $ad->save($con);
                    }
                }
            }

            if ($this->alertsScheduledForDeletion !== null) {
                if (!$this->alertsScheduledForDeletion->isEmpty()) {
                    foreach ($this->alertsScheduledForDeletion as $alert) {
                        // need to save related object because we set the relation to null
                        $alert->save($con);
                    }
                    $this->alertsScheduledForDeletion = null;
                }
            }

            if ($this->collAlerts !== null) {
                foreach ($this->collAlerts as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->contentsTagssScheduledForDeletion !== null) {
                if (!$this->contentsTagssScheduledForDeletion->isEmpty()) {
                    ContentsTagsQuery::create()
                        ->filterByPrimaryKeys($this->contentsTagssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->contentsTagssScheduledForDeletion = null;
                }
            }

            if ($this->collContentsTagss !== null) {
                foreach ($this->collContentsTagss as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->adsTagssScheduledForDeletion !== null) {
                if (!$this->adsTagssScheduledForDeletion->isEmpty()) {
                    AdsTagsQuery::create()
                        ->filterByPrimaryKeys($this->adsTagssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->adsTagssScheduledForDeletion = null;
                }
            }

            if ($this->collAdsTagss !== null) {
                foreach ($this->collAdsTagss as $referrerFK) {
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

        $this->modifiedColumns[] = TagPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TagPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TagPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(TagPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`NAME`';
        }

        $sql = sprintf(
            'INSERT INTO `tags` (%s) VALUES (%s)',
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


            if (($retval = TagPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAlerts !== null) {
                    foreach ($this->collAlerts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collContentsTagss !== null) {
                    foreach ($this->collContentsTagss as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAdsTagss !== null) {
                    foreach ($this->collAdsTagss as $referrerFK) {
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
        $pos = TagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getName();
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
        if (isset($alreadyDumpedObjects['Tag'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Tag'][$this->getPrimaryKey()] = true;
        $keys = TagPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getName(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collAlerts) {
                $result['Alerts'] = $this->collAlerts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collContentsTagss) {
                $result['ContentsTagss'] = $this->collContentsTagss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAdsTagss) {
                $result['AdsTagss'] = $this->collAdsTagss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = TagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setName($value);
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
        $keys = TagPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TagPeer::DATABASE_NAME);

        if ($this->isColumnModified(TagPeer::ID)) $criteria->add(TagPeer::ID, $this->id);
        if ($this->isColumnModified(TagPeer::NAME)) $criteria->add(TagPeer::NAME, $this->name);

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
        $criteria = new Criteria(TagPeer::DATABASE_NAME);
        $criteria->add(TagPeer::ID, $this->id);

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
     * @param object $copyObj An object of Tag (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getAlerts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlert($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getContentsTagss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addContentsTags($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAdsTagss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAdsTags($relObj->copy($deepCopy));
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
     * @return Tag Clone of current object.
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
     * @return TagPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TagPeer();
        }

        return self::$peer;
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
        if ('Alert' == $relationName) {
            $this->initAlerts();
        }
        if ('ContentsTags' == $relationName) {
            $this->initContentsTagss();
        }
        if ('AdsTags' == $relationName) {
            $this->initAdsTagss();
        }
    }

    /**
     * Clears out the collAlerts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAlerts()
     */
    public function clearAlerts()
    {
        $this->collAlerts = null; // important to set this to null since that means it is uninitialized
        $this->collAlertsPartial = null;
    }

    /**
     * reset is the collAlerts collection loaded partially
     *
     * @return void
     */
    public function resetPartialAlerts($v = true)
    {
        $this->collAlertsPartial = $v;
    }

    /**
     * Initializes the collAlerts collection.
     *
     * By default this just sets the collAlerts collection to an empty array (like clearcollAlerts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAlerts($overrideExisting = true)
    {
        if (null !== $this->collAlerts && !$overrideExisting) {
            return;
        }
        $this->collAlerts = new PropelObjectCollection();
        $this->collAlerts->setModel('Alert');
    }

    /**
     * Gets an array of Alert objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Tag is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Alert[] List of Alert objects
     * @throws PropelException
     */
    public function getAlerts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAlertsPartial && !$this->isNew();
        if (null === $this->collAlerts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAlerts) {
                // return empty collection
                $this->initAlerts();
            } else {
                $collAlerts = AlertQuery::create(null, $criteria)
                    ->filterByTag($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAlertsPartial && count($collAlerts)) {
                      $this->initAlerts(false);

                      foreach($collAlerts as $obj) {
                        if (false == $this->collAlerts->contains($obj)) {
                          $this->collAlerts->append($obj);
                        }
                      }

                      $this->collAlertsPartial = true;
                    }

                    return $collAlerts;
                }

                if($partial && $this->collAlerts) {
                    foreach($this->collAlerts as $obj) {
                        if($obj->isNew()) {
                            $collAlerts[] = $obj;
                        }
                    }
                }

                $this->collAlerts = $collAlerts;
                $this->collAlertsPartial = false;
            }
        }

        return $this->collAlerts;
    }

    /**
     * Sets a collection of Alert objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $alerts A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setAlerts(PropelCollection $alerts, PropelPDO $con = null)
    {
        $this->alertsScheduledForDeletion = $this->getAlerts(new Criteria(), $con)->diff($alerts);

        foreach ($this->alertsScheduledForDeletion as $alertRemoved) {
            $alertRemoved->setTag(null);
        }

        $this->collAlerts = null;
        foreach ($alerts as $alert) {
            $this->addAlert($alert);
        }

        $this->collAlerts = $alerts;
        $this->collAlertsPartial = false;
    }

    /**
     * Returns the number of related Alert objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Alert objects.
     * @throws PropelException
     */
    public function countAlerts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAlertsPartial && !$this->isNew();
        if (null === $this->collAlerts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAlerts) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getAlerts());
                }
                $query = AlertQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByTag($this)
                    ->count($con);
            }
        } else {
            return count($this->collAlerts);
        }
    }

    /**
     * Method called to associate a Alert object to this object
     * through the Alert foreign key attribute.
     *
     * @param    Alert $l Alert
     * @return Tag The current object (for fluent API support)
     */
    public function addAlert(Alert $l)
    {
        if ($this->collAlerts === null) {
            $this->initAlerts();
            $this->collAlertsPartial = true;
        }
        if (!$this->collAlerts->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddAlert($l);
        }

        return $this;
    }

    /**
     * @param	Alert $alert The alert object to add.
     */
    protected function doAddAlert($alert)
    {
        $this->collAlerts[]= $alert;
        $alert->setTag($this);
    }

    /**
     * @param	Alert $alert The alert object to remove.
     */
    public function removeAlert($alert)
    {
        if ($this->getAlerts()->contains($alert)) {
            $this->collAlerts->remove($this->collAlerts->search($alert));
            if (null === $this->alertsScheduledForDeletion) {
                $this->alertsScheduledForDeletion = clone $this->collAlerts;
                $this->alertsScheduledForDeletion->clear();
            }
            $this->alertsScheduledForDeletion[]= $alert;
            $alert->setTag(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tag is new, it will return
     * an empty collection; or if this Tag has previously
     * been saved, it will retrieve related Alerts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tag.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alert[] List of Alert objects
     */
    public function getAlertsJoinSubscriber($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlertQuery::create(null, $criteria);
        $query->joinWith('Subscriber', $join_behavior);

        return $this->getAlerts($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tag is new, it will return
     * an empty collection; or if this Tag has previously
     * been saved, it will retrieve related Alerts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tag.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alert[] List of Alert objects
     */
    public function getAlertsJoinCursus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlertQuery::create(null, $criteria);
        $query->joinWith('Cursus', $join_behavior);

        return $this->getAlerts($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tag is new, it will return
     * an empty collection; or if this Tag has previously
     * been saved, it will retrieve related Alerts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tag.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alert[] List of Alert objects
     */
    public function getAlertsJoinCourse($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlertQuery::create(null, $criteria);
        $query->joinWith('Course', $join_behavior);

        return $this->getAlerts($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tag is new, it will return
     * an empty collection; or if this Tag has previously
     * been saved, it will retrieve related Alerts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tag.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alert[] List of Alert objects
     */
    public function getAlertsJoinContentType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlertQuery::create(null, $criteria);
        $query->joinWith('ContentType', $join_behavior);

        return $this->getAlerts($query, $con);
    }

    /**
     * Clears out the collContentsTagss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addContentsTagss()
     */
    public function clearContentsTagss()
    {
        $this->collContentsTagss = null; // important to set this to null since that means it is uninitialized
        $this->collContentsTagssPartial = null;
    }

    /**
     * reset is the collContentsTagss collection loaded partially
     *
     * @return void
     */
    public function resetPartialContentsTagss($v = true)
    {
        $this->collContentsTagssPartial = $v;
    }

    /**
     * Initializes the collContentsTagss collection.
     *
     * By default this just sets the collContentsTagss collection to an empty array (like clearcollContentsTagss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initContentsTagss($overrideExisting = true)
    {
        if (null !== $this->collContentsTagss && !$overrideExisting) {
            return;
        }
        $this->collContentsTagss = new PropelObjectCollection();
        $this->collContentsTagss->setModel('ContentsTags');
    }

    /**
     * Gets an array of ContentsTags objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Tag is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ContentsTags[] List of ContentsTags objects
     * @throws PropelException
     */
    public function getContentsTagss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collContentsTagssPartial && !$this->isNew();
        if (null === $this->collContentsTagss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collContentsTagss) {
                // return empty collection
                $this->initContentsTagss();
            } else {
                $collContentsTagss = ContentsTagsQuery::create(null, $criteria)
                    ->filterByTag($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collContentsTagssPartial && count($collContentsTagss)) {
                      $this->initContentsTagss(false);

                      foreach($collContentsTagss as $obj) {
                        if (false == $this->collContentsTagss->contains($obj)) {
                          $this->collContentsTagss->append($obj);
                        }
                      }

                      $this->collContentsTagssPartial = true;
                    }

                    return $collContentsTagss;
                }

                if($partial && $this->collContentsTagss) {
                    foreach($this->collContentsTagss as $obj) {
                        if($obj->isNew()) {
                            $collContentsTagss[] = $obj;
                        }
                    }
                }

                $this->collContentsTagss = $collContentsTagss;
                $this->collContentsTagssPartial = false;
            }
        }

        return $this->collContentsTagss;
    }

    /**
     * Sets a collection of ContentsTags objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $contentsTagss A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setContentsTagss(PropelCollection $contentsTagss, PropelPDO $con = null)
    {
        $this->contentsTagssScheduledForDeletion = $this->getContentsTagss(new Criteria(), $con)->diff($contentsTagss);

        foreach ($this->contentsTagssScheduledForDeletion as $contentsTagsRemoved) {
            $contentsTagsRemoved->setTag(null);
        }

        $this->collContentsTagss = null;
        foreach ($contentsTagss as $contentsTags) {
            $this->addContentsTags($contentsTags);
        }

        $this->collContentsTagss = $contentsTagss;
        $this->collContentsTagssPartial = false;
    }

    /**
     * Returns the number of related ContentsTags objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ContentsTags objects.
     * @throws PropelException
     */
    public function countContentsTagss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collContentsTagssPartial && !$this->isNew();
        if (null === $this->collContentsTagss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collContentsTagss) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getContentsTagss());
                }
                $query = ContentsTagsQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByTag($this)
                    ->count($con);
            }
        } else {
            return count($this->collContentsTagss);
        }
    }

    /**
     * Method called to associate a ContentsTags object to this object
     * through the ContentsTags foreign key attribute.
     *
     * @param    ContentsTags $l ContentsTags
     * @return Tag The current object (for fluent API support)
     */
    public function addContentsTags(ContentsTags $l)
    {
        if ($this->collContentsTagss === null) {
            $this->initContentsTagss();
            $this->collContentsTagssPartial = true;
        }
        if (!$this->collContentsTagss->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddContentsTags($l);
        }

        return $this;
    }

    /**
     * @param	ContentsTags $contentsTags The contentsTags object to add.
     */
    protected function doAddContentsTags($contentsTags)
    {
        $this->collContentsTagss[]= $contentsTags;
        $contentsTags->setTag($this);
    }

    /**
     * @param	ContentsTags $contentsTags The contentsTags object to remove.
     */
    public function removeContentsTags($contentsTags)
    {
        if ($this->getContentsTagss()->contains($contentsTags)) {
            $this->collContentsTagss->remove($this->collContentsTagss->search($contentsTags));
            if (null === $this->contentsTagssScheduledForDeletion) {
                $this->contentsTagssScheduledForDeletion = clone $this->collContentsTagss;
                $this->contentsTagssScheduledForDeletion->clear();
            }
            $this->contentsTagssScheduledForDeletion[]= $contentsTags;
            $contentsTags->setTag(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tag is new, it will return
     * an empty collection; or if this Tag has previously
     * been saved, it will retrieve related ContentsTagss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tag.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ContentsTags[] List of ContentsTags objects
     */
    public function getContentsTagssJoinContent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContentsTagsQuery::create(null, $criteria);
        $query->joinWith('Content', $join_behavior);

        return $this->getContentsTagss($query, $con);
    }

    /**
     * Clears out the collAdsTagss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAdsTagss()
     */
    public function clearAdsTagss()
    {
        $this->collAdsTagss = null; // important to set this to null since that means it is uninitialized
        $this->collAdsTagssPartial = null;
    }

    /**
     * reset is the collAdsTagss collection loaded partially
     *
     * @return void
     */
    public function resetPartialAdsTagss($v = true)
    {
        $this->collAdsTagssPartial = $v;
    }

    /**
     * Initializes the collAdsTagss collection.
     *
     * By default this just sets the collAdsTagss collection to an empty array (like clearcollAdsTagss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAdsTagss($overrideExisting = true)
    {
        if (null !== $this->collAdsTagss && !$overrideExisting) {
            return;
        }
        $this->collAdsTagss = new PropelObjectCollection();
        $this->collAdsTagss->setModel('AdsTags');
    }

    /**
     * Gets an array of AdsTags objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Tag is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AdsTags[] List of AdsTags objects
     * @throws PropelException
     */
    public function getAdsTagss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAdsTagssPartial && !$this->isNew();
        if (null === $this->collAdsTagss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAdsTagss) {
                // return empty collection
                $this->initAdsTagss();
            } else {
                $collAdsTagss = AdsTagsQuery::create(null, $criteria)
                    ->filterByTag($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAdsTagssPartial && count($collAdsTagss)) {
                      $this->initAdsTagss(false);

                      foreach($collAdsTagss as $obj) {
                        if (false == $this->collAdsTagss->contains($obj)) {
                          $this->collAdsTagss->append($obj);
                        }
                      }

                      $this->collAdsTagssPartial = true;
                    }

                    return $collAdsTagss;
                }

                if($partial && $this->collAdsTagss) {
                    foreach($this->collAdsTagss as $obj) {
                        if($obj->isNew()) {
                            $collAdsTagss[] = $obj;
                        }
                    }
                }

                $this->collAdsTagss = $collAdsTagss;
                $this->collAdsTagssPartial = false;
            }
        }

        return $this->collAdsTagss;
    }

    /**
     * Sets a collection of AdsTags objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $adsTagss A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setAdsTagss(PropelCollection $adsTagss, PropelPDO $con = null)
    {
        $this->adsTagssScheduledForDeletion = $this->getAdsTagss(new Criteria(), $con)->diff($adsTagss);

        foreach ($this->adsTagssScheduledForDeletion as $adsTagsRemoved) {
            $adsTagsRemoved->setTag(null);
        }

        $this->collAdsTagss = null;
        foreach ($adsTagss as $adsTags) {
            $this->addAdsTags($adsTags);
        }

        $this->collAdsTagss = $adsTagss;
        $this->collAdsTagssPartial = false;
    }

    /**
     * Returns the number of related AdsTags objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AdsTags objects.
     * @throws PropelException
     */
    public function countAdsTagss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAdsTagssPartial && !$this->isNew();
        if (null === $this->collAdsTagss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAdsTagss) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getAdsTagss());
                }
                $query = AdsTagsQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByTag($this)
                    ->count($con);
            }
        } else {
            return count($this->collAdsTagss);
        }
    }

    /**
     * Method called to associate a AdsTags object to this object
     * through the AdsTags foreign key attribute.
     *
     * @param    AdsTags $l AdsTags
     * @return Tag The current object (for fluent API support)
     */
    public function addAdsTags(AdsTags $l)
    {
        if ($this->collAdsTagss === null) {
            $this->initAdsTagss();
            $this->collAdsTagssPartial = true;
        }
        if (!$this->collAdsTagss->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddAdsTags($l);
        }

        return $this;
    }

    /**
     * @param	AdsTags $adsTags The adsTags object to add.
     */
    protected function doAddAdsTags($adsTags)
    {
        $this->collAdsTagss[]= $adsTags;
        $adsTags->setTag($this);
    }

    /**
     * @param	AdsTags $adsTags The adsTags object to remove.
     */
    public function removeAdsTags($adsTags)
    {
        if ($this->getAdsTagss()->contains($adsTags)) {
            $this->collAdsTagss->remove($this->collAdsTagss->search($adsTags));
            if (null === $this->adsTagssScheduledForDeletion) {
                $this->adsTagssScheduledForDeletion = clone $this->collAdsTagss;
                $this->adsTagssScheduledForDeletion->clear();
            }
            $this->adsTagssScheduledForDeletion[]= $adsTags;
            $adsTags->setTag(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tag is new, it will return
     * an empty collection; or if this Tag has previously
     * been saved, it will retrieve related AdsTagss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tag.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AdsTags[] List of AdsTags objects
     */
    public function getAdsTagssJoinAd($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AdsTagsQuery::create(null, $criteria);
        $query->joinWith('Ad', $join_behavior);

        return $this->getAdsTagss($query, $con);
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
     * to the current object by way of the contents_tags cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Tag is new, it will return
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
                    ->filterByTag($this)
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
     * to the current object by way of the contents_tags cross-reference table.
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
     * to the current object by way of the contents_tags cross-reference table.
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
                    ->filterByTag($this)
                    ->count($con);
            }
        } else {
            return count($this->collContents);
        }
    }

    /**
     * Associate a Content object to this object
     * through the contents_tags cross reference table.
     *
     * @param  Content $content The ContentsTags object to relate
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
        $contentsTags = new ContentsTags();
        $contentsTags->setContent($content);
        $this->addContentsTags($contentsTags);
    }

    /**
     * Remove a Content object to this object
     * through the contents_tags cross reference table.
     *
     * @param Content $content The ContentsTags object to relate
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
     * Clears out the collAds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAds()
     */
    public function clearAds()
    {
        $this->collAds = null; // important to set this to null since that means it is uninitialized
        $this->collAdsPartial = null;
    }

    /**
     * Initializes the collAds collection.
     *
     * By default this just sets the collAds collection to an empty collection (like clearAds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initAds()
    {
        $this->collAds = new PropelObjectCollection();
        $this->collAds->setModel('Ad');
    }

    /**
     * Gets a collection of Ad objects related by a many-to-many relationship
     * to the current object by way of the ads_tags cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Tag is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|Ad[] List of Ad objects
     */
    public function getAds($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collAds || null !== $criteria) {
            if ($this->isNew() && null === $this->collAds) {
                // return empty collection
                $this->initAds();
            } else {
                $collAds = AdQuery::create(null, $criteria)
                    ->filterByTag($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collAds;
                }
                $this->collAds = $collAds;
            }
        }

        return $this->collAds;
    }

    /**
     * Sets a collection of Ad objects related by a many-to-many relationship
     * to the current object by way of the ads_tags cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $ads A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setAds(PropelCollection $ads, PropelPDO $con = null)
    {
        $this->clearAds();
        $currentAds = $this->getAds();

        $this->adsScheduledForDeletion = $currentAds->diff($ads);

        foreach ($ads as $ad) {
            if (!$currentAds->contains($ad)) {
                $this->doAddAd($ad);
            }
        }

        $this->collAds = $ads;
    }

    /**
     * Gets the number of Ad objects related by a many-to-many relationship
     * to the current object by way of the ads_tags cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related Ad objects
     */
    public function countAds($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collAds || null !== $criteria) {
            if ($this->isNew() && null === $this->collAds) {
                return 0;
            } else {
                $query = AdQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByTag($this)
                    ->count($con);
            }
        } else {
            return count($this->collAds);
        }
    }

    /**
     * Associate a Ad object to this object
     * through the ads_tags cross reference table.
     *
     * @param  Ad $ad The AdsTags object to relate
     * @return void
     */
    public function addAd(Ad $ad)
    {
        if ($this->collAds === null) {
            $this->initAds();
        }
        if (!$this->collAds->contains($ad)) { // only add it if the **same** object is not already associated
            $this->doAddAd($ad);

            $this->collAds[]= $ad;
        }
    }

    /**
     * @param	Ad $ad The ad object to add.
     */
    protected function doAddAd($ad)
    {
        $adsTags = new AdsTags();
        $adsTags->setAd($ad);
        $this->addAdsTags($adsTags);
    }

    /**
     * Remove a Ad object to this object
     * through the ads_tags cross reference table.
     *
     * @param Ad $ad The AdsTags object to relate
     * @return void
     */
    public function removeAd(Ad $ad)
    {
        if ($this->getAds()->contains($ad)) {
            $this->collAds->remove($this->collAds->search($ad));
            if (null === $this->adsScheduledForDeletion) {
                $this->adsScheduledForDeletion = clone $this->collAds;
                $this->adsScheduledForDeletion->clear();
            }
            $this->adsScheduledForDeletion[]= $ad;
        }
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->name = null;
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
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collAlerts) {
                foreach ($this->collAlerts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collContentsTagss) {
                foreach ($this->collContentsTagss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAdsTagss) {
                foreach ($this->collAdsTagss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collContents) {
                foreach ($this->collContents as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAds) {
                foreach ($this->collAds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collAlerts instanceof PropelCollection) {
            $this->collAlerts->clearIterator();
        }
        $this->collAlerts = null;
        if ($this->collContentsTagss instanceof PropelCollection) {
            $this->collContentsTagss->clearIterator();
        }
        $this->collContentsTagss = null;
        if ($this->collAdsTagss instanceof PropelCollection) {
            $this->collAdsTagss->clearIterator();
        }
        $this->collAdsTagss = null;
        if ($this->collContents instanceof PropelCollection) {
            $this->collContents->clearIterator();
        }
        $this->collContents = null;
        if ($this->collAds instanceof PropelCollection) {
            $this->collAds->clearIterator();
        }
        $this->collAds = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TagPeer::DEFAULT_STRING_FORMAT);
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
