<?php


/**
 * Base class that represents a row from the 'educational_paths' table.
 *
 *
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseEducationalPath extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'EducationalPathPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        EducationalPathPeer
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
     * The value for the short_name field.
     * @var        string
     */
    protected $short_name;

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
     * Whether the lazy-loaded $description value has been loaded from database.
     * This is necessary to avoid repeated lookups if $description column is null in the db.
     * @var        boolean
     */
    protected $description_isLoaded = false;

    /**
     * The value for the cursus_id field.
     * @var        int
     */
    protected $cursus_id;

    /**
     * The value for the responsable_id field.
     * @var        int
     */
    protected $responsable_id;

    /**
     * @var        Cursus
     */
    protected $aCursus;

    /**
     * @var        User
     */
    protected $aResponsable;

    /**
     * @var        PropelObjectCollection|UsersPaths[] Collection to store aggregation of UsersPaths objects.
     */
    protected $collUsersPathss;
    protected $collUsersPathssPartial;

    /**
     * @var        PropelObjectCollection|EducationalPathsOptionalCourses[] Collection to store aggregation of EducationalPathsOptionalCourses objects.
     */
    protected $collEducationalPathsOptionalCoursess;
    protected $collEducationalPathsOptionalCoursessPartial;

    /**
     * @var        PropelObjectCollection|EducationalPathsMandatoryCourses[] Collection to store aggregation of EducationalPathsMandatoryCourses objects.
     */
    protected $collEducationalPathsMandatoryCoursess;
    protected $collEducationalPathsMandatoryCoursessPartial;

    /**
     * @var        PropelObjectCollection|Schedule[] Collection to store aggregation of Schedule objects.
     */
    protected $collSchedules;
    protected $collSchedulesPartial;

    /**
     * @var        PropelObjectCollection|User[] Collection to store aggregation of User objects.
     */
    protected $collUsers;

    /**
     * @var        PropelObjectCollection|Course[] Collection to store aggregation of Course objects.
     */
    protected $collOptionalCourses;

    /**
     * @var        PropelObjectCollection|Course[] Collection to store aggregation of Course objects.
     */
    protected $collMandatoryCourses;

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
    protected $usersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $optionalCoursesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mandatoryCoursesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $usersPathssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $educationalPathsOptionalCoursessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $educationalPathsMandatoryCoursessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $schedulesScheduledForDeletion = null;

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
     * Get the [short_name] column value.
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->short_name;
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
     * Get the [description] column value.
     *
     * @param PropelPDO $con An optional PropelPDO connection to use for fetching this lazy-loaded column.
     * @return string
     */
    public function getDescription(PropelPDO $con = null)
    {
        if (!$this->description_isLoaded && $this->description === null && !$this->isNew()) {
            $this->loadDescription($con);
        }

        return $this->description;
    }

    /**
     * Load the value for the lazy-loaded [description] column.
     *
     * This method performs an additional query to return the value for
     * the [description] column, since it is not populated by
     * the hydrate() method.
     *
     * @param  PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - any underlying error will be wrapped and re-thrown.
     */
    protected function loadDescription(PropelPDO $con = null)
    {
        $c = $this->buildPkeyCriteria();
        $c->addSelectColumn(EducationalPathPeer::DESCRIPTION);
        try {
            $stmt = EducationalPathPeer::doSelectStmt($c, $con);
            $row = $stmt->fetch(PDO::FETCH_NUM);
            $stmt->closeCursor();
            $this->description = ($row[0] !== null) ? (string) $row[0] : null;
            $this->description_isLoaded = true;
        } catch (Exception $e) {
            throw new PropelException("Error loading value for [description] column on demand.", $e);
        }
    }
    /**
     * Get the [cursus_id] column value.
     *
     * @return int
     */
    public function getCursusId()
    {
        return $this->cursus_id;
    }

    /**
     * Get the [responsable_id] column value.
     *
     * @return int
     */
    public function getResponsableId()
    {
        return $this->responsable_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return EducationalPath The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = EducationalPathPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [short_name] column.
     *
     * @param string $v new value
     * @return EducationalPath The current object (for fluent API support)
     */
    public function setShortName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->short_name !== $v) {
            $this->short_name = $v;
            $this->modifiedColumns[] = EducationalPathPeer::SHORT_NAME;
        }


        return $this;
    } // setShortName()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return EducationalPath The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = EducationalPathPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return EducationalPath The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        // explicitly set the is-loaded flag to true for this lazy load col;
        // it doesn't matter if the value is actually set or not (logic below) as
        // any attempt to set the value means that no db lookup should be performed
        // when the getDescription() method is called.
        $this->description_isLoaded = true;

        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = EducationalPathPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [cursus_id] column.
     *
     * @param int $v new value
     * @return EducationalPath The current object (for fluent API support)
     */
    public function setCursusId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cursus_id !== $v) {
            $this->cursus_id = $v;
            $this->modifiedColumns[] = EducationalPathPeer::CURSUS_ID;
        }

        if ($this->aCursus !== null && $this->aCursus->getId() !== $v) {
            $this->aCursus = null;
        }


        return $this;
    } // setCursusId()

    /**
     * Set the value of [responsable_id] column.
     *
     * @param int $v new value
     * @return EducationalPath The current object (for fluent API support)
     */
    public function setResponsableId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->responsable_id !== $v) {
            $this->responsable_id = $v;
            $this->modifiedColumns[] = EducationalPathPeer::RESPONSABLE_ID;
        }

        if ($this->aResponsable !== null && $this->aResponsable->getId() !== $v) {
            $this->aResponsable = null;
        }


        return $this;
    } // setResponsableId()

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
            $this->short_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->cursus_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->responsable_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 5; // 5 = EducationalPathPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating EducationalPath object", $e);
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

        if ($this->aCursus !== null && $this->cursus_id !== $this->aCursus->getId()) {
            $this->aCursus = null;
        }
        if ($this->aResponsable !== null && $this->responsable_id !== $this->aResponsable->getId()) {
            $this->aResponsable = null;
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
            $con = Propel::getConnection(EducationalPathPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = EducationalPathPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        // Reset the description lazy-load column
        $this->description = null;
        $this->description_isLoaded = false;

        if ($deep) {  // also de-associate any related objects?

            $this->aCursus = null;
            $this->aResponsable = null;
            $this->collUsersPathss = null;

            $this->collEducationalPathsOptionalCoursess = null;

            $this->collEducationalPathsMandatoryCoursess = null;

            $this->collSchedules = null;

            $this->collUsers = null;
            $this->collOptionalCourses = null;
            $this->collMandatoryCourses = null;
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
            $con = Propel::getConnection(EducationalPathPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = EducationalPathQuery::create()
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
            $con = Propel::getConnection(EducationalPathPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                EducationalPathPeer::addInstanceToPool($this);
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

            if ($this->aCursus !== null) {
                if ($this->aCursus->isModified() || $this->aCursus->isNew()) {
                    $affectedRows += $this->aCursus->save($con);
                }
                $this->setCursus($this->aCursus);
            }

            if ($this->aResponsable !== null) {
                if ($this->aResponsable->isModified() || $this->aResponsable->isNew()) {
                    $affectedRows += $this->aResponsable->save($con);
                }
                $this->setResponsable($this->aResponsable);
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

            if ($this->usersScheduledForDeletion !== null) {
                if (!$this->usersScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->usersScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($remotePk, $pk);
                    }
                    UsersPathsQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->usersScheduledForDeletion = null;
                }

                foreach ($this->getUsers() as $user) {
                    if ($user->isModified()) {
                        $user->save($con);
                    }
                }
            }

            if ($this->optionalCoursesScheduledForDeletion !== null) {
                if (!$this->optionalCoursesScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->optionalCoursesScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($remotePk, $pk);
                    }
                    EducationalPathsOptionalCoursesQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->optionalCoursesScheduledForDeletion = null;
                }

                foreach ($this->getOptionalCourses() as $optionalCourse) {
                    if ($optionalCourse->isModified()) {
                        $optionalCourse->save($con);
                    }
                }
            }

            if ($this->mandatoryCoursesScheduledForDeletion !== null) {
                if (!$this->mandatoryCoursesScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->mandatoryCoursesScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($remotePk, $pk);
                    }
                    EducationalPathsMandatoryCoursesQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->mandatoryCoursesScheduledForDeletion = null;
                }

                foreach ($this->getMandatoryCourses() as $mandatoryCourse) {
                    if ($mandatoryCourse->isModified()) {
                        $mandatoryCourse->save($con);
                    }
                }
            }

            if ($this->usersPathssScheduledForDeletion !== null) {
                if (!$this->usersPathssScheduledForDeletion->isEmpty()) {
                    UsersPathsQuery::create()
                        ->filterByPrimaryKeys($this->usersPathssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->usersPathssScheduledForDeletion = null;
                }
            }

            if ($this->collUsersPathss !== null) {
                foreach ($this->collUsersPathss as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->educationalPathsOptionalCoursessScheduledForDeletion !== null) {
                if (!$this->educationalPathsOptionalCoursessScheduledForDeletion->isEmpty()) {
                    EducationalPathsOptionalCoursesQuery::create()
                        ->filterByPrimaryKeys($this->educationalPathsOptionalCoursessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->educationalPathsOptionalCoursessScheduledForDeletion = null;
                }
            }

            if ($this->collEducationalPathsOptionalCoursess !== null) {
                foreach ($this->collEducationalPathsOptionalCoursess as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->educationalPathsMandatoryCoursessScheduledForDeletion !== null) {
                if (!$this->educationalPathsMandatoryCoursessScheduledForDeletion->isEmpty()) {
                    EducationalPathsMandatoryCoursesQuery::create()
                        ->filterByPrimaryKeys($this->educationalPathsMandatoryCoursessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->educationalPathsMandatoryCoursessScheduledForDeletion = null;
                }
            }

            if ($this->collEducationalPathsMandatoryCoursess !== null) {
                foreach ($this->collEducationalPathsMandatoryCoursess as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->schedulesScheduledForDeletion !== null) {
                if (!$this->schedulesScheduledForDeletion->isEmpty()) {
                    foreach ($this->schedulesScheduledForDeletion as $schedule) {
                        // need to save related object because we set the relation to null
                        $schedule->save($con);
                    }
                    $this->schedulesScheduledForDeletion = null;
                }
            }

            if ($this->collSchedules !== null) {
                foreach ($this->collSchedules as $referrerFK) {
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

        $this->modifiedColumns[] = EducationalPathPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EducationalPathPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EducationalPathPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(EducationalPathPeer::SHORT_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`SHORT_NAME`';
        }
        if ($this->isColumnModified(EducationalPathPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`NAME`';
        }
        if ($this->isColumnModified(EducationalPathPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }
        if ($this->isColumnModified(EducationalPathPeer::CURSUS_ID)) {
            $modifiedColumns[':p' . $index++]  = '`CURSUS_ID`';
        }
        if ($this->isColumnModified(EducationalPathPeer::RESPONSABLE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`RESPONSABLE_ID`';
        }

        $sql = sprintf(
            'INSERT INTO `educational_paths` (%s) VALUES (%s)',
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
                    case '`SHORT_NAME`':
                        $stmt->bindValue($identifier, $this->short_name, PDO::PARAM_STR);
                        break;
                    case '`NAME`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`DESCRIPTION`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`CURSUS_ID`':
                        $stmt->bindValue($identifier, $this->cursus_id, PDO::PARAM_INT);
                        break;
                    case '`RESPONSABLE_ID`':
                        $stmt->bindValue($identifier, $this->responsable_id, PDO::PARAM_INT);
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

            if ($this->aCursus !== null) {
                if (!$this->aCursus->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCursus->getValidationFailures());
                }
            }

            if ($this->aResponsable !== null) {
                if (!$this->aResponsable->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aResponsable->getValidationFailures());
                }
            }


            if (($retval = EducationalPathPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collUsersPathss !== null) {
                    foreach ($this->collUsersPathss as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collEducationalPathsOptionalCoursess !== null) {
                    foreach ($this->collEducationalPathsOptionalCoursess as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collEducationalPathsMandatoryCoursess !== null) {
                    foreach ($this->collEducationalPathsMandatoryCoursess as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSchedules !== null) {
                    foreach ($this->collSchedules as $referrerFK) {
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
        $pos = EducationalPathPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getShortName();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getDescription();
                break;
            case 4:
                return $this->getCursusId();
                break;
            case 5:
                return $this->getResponsableId();
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
        if (isset($alreadyDumpedObjects['EducationalPath'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['EducationalPath'][$this->getPrimaryKey()] = true;
        $keys = EducationalPathPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getShortName(),
            $keys[2] => $this->getName(),
            $keys[3] => ($includeLazyLoadColumns) ? $this->getDescription() : null,
            $keys[4] => $this->getCursusId(),
            $keys[5] => $this->getResponsableId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aCursus) {
                $result['Cursus'] = $this->aCursus->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aResponsable) {
                $result['Responsable'] = $this->aResponsable->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collUsersPathss) {
                $result['UsersPathss'] = $this->collUsersPathss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEducationalPathsOptionalCoursess) {
                $result['EducationalPathsOptionalCoursess'] = $this->collEducationalPathsOptionalCoursess->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEducationalPathsMandatoryCoursess) {
                $result['EducationalPathsMandatoryCoursess'] = $this->collEducationalPathsMandatoryCoursess->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSchedules) {
                $result['Schedules'] = $this->collSchedules->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = EducationalPathPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setShortName($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setDescription($value);
                break;
            case 4:
                $this->setCursusId($value);
                break;
            case 5:
                $this->setResponsableId($value);
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
        $keys = EducationalPathPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setShortName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setCursusId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setResponsableId($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EducationalPathPeer::DATABASE_NAME);

        if ($this->isColumnModified(EducationalPathPeer::ID)) $criteria->add(EducationalPathPeer::ID, $this->id);
        if ($this->isColumnModified(EducationalPathPeer::SHORT_NAME)) $criteria->add(EducationalPathPeer::SHORT_NAME, $this->short_name);
        if ($this->isColumnModified(EducationalPathPeer::NAME)) $criteria->add(EducationalPathPeer::NAME, $this->name);
        if ($this->isColumnModified(EducationalPathPeer::DESCRIPTION)) $criteria->add(EducationalPathPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(EducationalPathPeer::CURSUS_ID)) $criteria->add(EducationalPathPeer::CURSUS_ID, $this->cursus_id);
        if ($this->isColumnModified(EducationalPathPeer::RESPONSABLE_ID)) $criteria->add(EducationalPathPeer::RESPONSABLE_ID, $this->responsable_id);

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
        $criteria = new Criteria(EducationalPathPeer::DATABASE_NAME);
        $criteria->add(EducationalPathPeer::ID, $this->id);

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
     * @param object $copyObj An object of EducationalPath (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setShortName($this->getShortName());
        $copyObj->setName($this->getName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setCursusId($this->getCursusId());
        $copyObj->setResponsableId($this->getResponsableId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getUsersPathss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUsersPaths($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEducationalPathsOptionalCoursess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEducationalPathsOptionalCourses($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEducationalPathsMandatoryCoursess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEducationalPathsMandatoryCourses($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSchedules() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSchedule($relObj->copy($deepCopy));
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
     * @return EducationalPath Clone of current object.
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
     * @return EducationalPathPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new EducationalPathPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Cursus object.
     *
     * @param             Cursus $v
     * @return EducationalPath The current object (for fluent API support)
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
            $v->addEducationalPath($this);
        }


        return $this;
    }


    /**
     * Get the associated Cursus object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return Cursus The associated Cursus object.
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
                $this->aCursus->addEducationalPaths($this);
             */
        }

        return $this->aCursus;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param             User $v
     * @return EducationalPath The current object (for fluent API support)
     * @throws PropelException
     */
    public function setResponsable(User $v = null)
    {
        if ($v === null) {
            $this->setResponsableId(NULL);
        } else {
            $this->setResponsableId($v->getId());
        }

        $this->aResponsable = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the User object, it will not be re-added.
        if ($v !== null) {
            $v->addEducationalPathResponsability($this);
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
    public function getResponsable(PropelPDO $con = null)
    {
        if ($this->aResponsable === null && ($this->responsable_id !== null)) {
            $this->aResponsable = UserQuery::create()->findPk($this->responsable_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aResponsable->addEducationalPathResponsabilitys($this);
             */
        }

        return $this->aResponsable;
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
        if ('UsersPaths' == $relationName) {
            $this->initUsersPathss();
        }
        if ('EducationalPathsOptionalCourses' == $relationName) {
            $this->initEducationalPathsOptionalCoursess();
        }
        if ('EducationalPathsMandatoryCourses' == $relationName) {
            $this->initEducationalPathsMandatoryCoursess();
        }
        if ('Schedule' == $relationName) {
            $this->initSchedules();
        }
    }

    /**
     * Clears out the collUsersPathss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addUsersPathss()
     */
    public function clearUsersPathss()
    {
        $this->collUsersPathss = null; // important to set this to null since that means it is uninitialized
        $this->collUsersPathssPartial = null;
    }

    /**
     * reset is the collUsersPathss collection loaded partially
     *
     * @return void
     */
    public function resetPartialUsersPathss($v = true)
    {
        $this->collUsersPathssPartial = $v;
    }

    /**
     * Initializes the collUsersPathss collection.
     *
     * By default this just sets the collUsersPathss collection to an empty array (like clearcollUsersPathss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUsersPathss($overrideExisting = true)
    {
        if (null !== $this->collUsersPathss && !$overrideExisting) {
            return;
        }
        $this->collUsersPathss = new PropelObjectCollection();
        $this->collUsersPathss->setModel('UsersPaths');
    }

    /**
     * Gets an array of UsersPaths objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this EducationalPath is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|UsersPaths[] List of UsersPaths objects
     * @throws PropelException
     */
    public function getUsersPathss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUsersPathssPartial && !$this->isNew();
        if (null === $this->collUsersPathss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUsersPathss) {
                // return empty collection
                $this->initUsersPathss();
            } else {
                $collUsersPathss = UsersPathsQuery::create(null, $criteria)
                    ->filterByEducationalPath($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUsersPathssPartial && count($collUsersPathss)) {
                      $this->initUsersPathss(false);

                      foreach($collUsersPathss as $obj) {
                        if (false == $this->collUsersPathss->contains($obj)) {
                          $this->collUsersPathss->append($obj);
                        }
                      }

                      $this->collUsersPathssPartial = true;
                    }

                    return $collUsersPathss;
                }

                if($partial && $this->collUsersPathss) {
                    foreach($this->collUsersPathss as $obj) {
                        if($obj->isNew()) {
                            $collUsersPathss[] = $obj;
                        }
                    }
                }

                $this->collUsersPathss = $collUsersPathss;
                $this->collUsersPathssPartial = false;
            }
        }

        return $this->collUsersPathss;
    }

    /**
     * Sets a collection of UsersPaths objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $usersPathss A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setUsersPathss(PropelCollection $usersPathss, PropelPDO $con = null)
    {
        $this->usersPathssScheduledForDeletion = $this->getUsersPathss(new Criteria(), $con)->diff($usersPathss);

        foreach ($this->usersPathssScheduledForDeletion as $usersPathsRemoved) {
            $usersPathsRemoved->setEducationalPath(null);
        }

        $this->collUsersPathss = null;
        foreach ($usersPathss as $usersPaths) {
            $this->addUsersPaths($usersPaths);
        }

        $this->collUsersPathss = $usersPathss;
        $this->collUsersPathssPartial = false;
    }

    /**
     * Returns the number of related UsersPaths objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related UsersPaths objects.
     * @throws PropelException
     */
    public function countUsersPathss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUsersPathssPartial && !$this->isNew();
        if (null === $this->collUsersPathss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUsersPathss) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getUsersPathss());
                }
                $query = UsersPathsQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByEducationalPath($this)
                    ->count($con);
            }
        } else {
            return count($this->collUsersPathss);
        }
    }

    /**
     * Method called to associate a UsersPaths object to this object
     * through the UsersPaths foreign key attribute.
     *
     * @param    UsersPaths $l UsersPaths
     * @return EducationalPath The current object (for fluent API support)
     */
    public function addUsersPaths(UsersPaths $l)
    {
        if ($this->collUsersPathss === null) {
            $this->initUsersPathss();
            $this->collUsersPathssPartial = true;
        }
        if (!$this->collUsersPathss->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddUsersPaths($l);
        }

        return $this;
    }

    /**
     * @param	UsersPaths $usersPaths The usersPaths object to add.
     */
    protected function doAddUsersPaths($usersPaths)
    {
        $this->collUsersPathss[]= $usersPaths;
        $usersPaths->setEducationalPath($this);
    }

    /**
     * @param	UsersPaths $usersPaths The usersPaths object to remove.
     */
    public function removeUsersPaths($usersPaths)
    {
        if ($this->getUsersPathss()->contains($usersPaths)) {
            $this->collUsersPathss->remove($this->collUsersPathss->search($usersPaths));
            if (null === $this->usersPathssScheduledForDeletion) {
                $this->usersPathssScheduledForDeletion = clone $this->collUsersPathss;
                $this->usersPathssScheduledForDeletion->clear();
            }
            $this->usersPathssScheduledForDeletion[]= $usersPaths;
            $usersPaths->setEducationalPath(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EducationalPath is new, it will return
     * an empty collection; or if this EducationalPath has previously
     * been saved, it will retrieve related UsersPathss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EducationalPath.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UsersPaths[] List of UsersPaths objects
     */
    public function getUsersPathssJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UsersPathsQuery::create(null, $criteria);
        $query->joinWith('User', $join_behavior);

        return $this->getUsersPathss($query, $con);
    }

    /**
     * Clears out the collEducationalPathsOptionalCoursess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEducationalPathsOptionalCoursess()
     */
    public function clearEducationalPathsOptionalCoursess()
    {
        $this->collEducationalPathsOptionalCoursess = null; // important to set this to null since that means it is uninitialized
        $this->collEducationalPathsOptionalCoursessPartial = null;
    }

    /**
     * reset is the collEducationalPathsOptionalCoursess collection loaded partially
     *
     * @return void
     */
    public function resetPartialEducationalPathsOptionalCoursess($v = true)
    {
        $this->collEducationalPathsOptionalCoursessPartial = $v;
    }

    /**
     * Initializes the collEducationalPathsOptionalCoursess collection.
     *
     * By default this just sets the collEducationalPathsOptionalCoursess collection to an empty array (like clearcollEducationalPathsOptionalCoursess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEducationalPathsOptionalCoursess($overrideExisting = true)
    {
        if (null !== $this->collEducationalPathsOptionalCoursess && !$overrideExisting) {
            return;
        }
        $this->collEducationalPathsOptionalCoursess = new PropelObjectCollection();
        $this->collEducationalPathsOptionalCoursess->setModel('EducationalPathsOptionalCourses');
    }

    /**
     * Gets an array of EducationalPathsOptionalCourses objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this EducationalPath is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|EducationalPathsOptionalCourses[] List of EducationalPathsOptionalCourses objects
     * @throws PropelException
     */
    public function getEducationalPathsOptionalCoursess($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collEducationalPathsOptionalCoursessPartial && !$this->isNew();
        if (null === $this->collEducationalPathsOptionalCoursess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEducationalPathsOptionalCoursess) {
                // return empty collection
                $this->initEducationalPathsOptionalCoursess();
            } else {
                $collEducationalPathsOptionalCoursess = EducationalPathsOptionalCoursesQuery::create(null, $criteria)
                    ->filterByOptionalEducationalPath($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collEducationalPathsOptionalCoursessPartial && count($collEducationalPathsOptionalCoursess)) {
                      $this->initEducationalPathsOptionalCoursess(false);

                      foreach($collEducationalPathsOptionalCoursess as $obj) {
                        if (false == $this->collEducationalPathsOptionalCoursess->contains($obj)) {
                          $this->collEducationalPathsOptionalCoursess->append($obj);
                        }
                      }

                      $this->collEducationalPathsOptionalCoursessPartial = true;
                    }

                    return $collEducationalPathsOptionalCoursess;
                }

                if($partial && $this->collEducationalPathsOptionalCoursess) {
                    foreach($this->collEducationalPathsOptionalCoursess as $obj) {
                        if($obj->isNew()) {
                            $collEducationalPathsOptionalCoursess[] = $obj;
                        }
                    }
                }

                $this->collEducationalPathsOptionalCoursess = $collEducationalPathsOptionalCoursess;
                $this->collEducationalPathsOptionalCoursessPartial = false;
            }
        }

        return $this->collEducationalPathsOptionalCoursess;
    }

    /**
     * Sets a collection of EducationalPathsOptionalCourses objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $educationalPathsOptionalCoursess A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setEducationalPathsOptionalCoursess(PropelCollection $educationalPathsOptionalCoursess, PropelPDO $con = null)
    {
        $this->educationalPathsOptionalCoursessScheduledForDeletion = $this->getEducationalPathsOptionalCoursess(new Criteria(), $con)->diff($educationalPathsOptionalCoursess);

        foreach ($this->educationalPathsOptionalCoursessScheduledForDeletion as $educationalPathsOptionalCoursesRemoved) {
            $educationalPathsOptionalCoursesRemoved->setOptionalEducationalPath(null);
        }

        $this->collEducationalPathsOptionalCoursess = null;
        foreach ($educationalPathsOptionalCoursess as $educationalPathsOptionalCourses) {
            $this->addEducationalPathsOptionalCourses($educationalPathsOptionalCourses);
        }

        $this->collEducationalPathsOptionalCoursess = $educationalPathsOptionalCoursess;
        $this->collEducationalPathsOptionalCoursessPartial = false;
    }

    /**
     * Returns the number of related EducationalPathsOptionalCourses objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related EducationalPathsOptionalCourses objects.
     * @throws PropelException
     */
    public function countEducationalPathsOptionalCoursess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collEducationalPathsOptionalCoursessPartial && !$this->isNew();
        if (null === $this->collEducationalPathsOptionalCoursess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEducationalPathsOptionalCoursess) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getEducationalPathsOptionalCoursess());
                }
                $query = EducationalPathsOptionalCoursesQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByOptionalEducationalPath($this)
                    ->count($con);
            }
        } else {
            return count($this->collEducationalPathsOptionalCoursess);
        }
    }

    /**
     * Method called to associate a EducationalPathsOptionalCourses object to this object
     * through the EducationalPathsOptionalCourses foreign key attribute.
     *
     * @param    EducationalPathsOptionalCourses $l EducationalPathsOptionalCourses
     * @return EducationalPath The current object (for fluent API support)
     */
    public function addEducationalPathsOptionalCourses(EducationalPathsOptionalCourses $l)
    {
        if ($this->collEducationalPathsOptionalCoursess === null) {
            $this->initEducationalPathsOptionalCoursess();
            $this->collEducationalPathsOptionalCoursessPartial = true;
        }
        if (!$this->collEducationalPathsOptionalCoursess->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddEducationalPathsOptionalCourses($l);
        }

        return $this;
    }

    /**
     * @param	EducationalPathsOptionalCourses $educationalPathsOptionalCourses The educationalPathsOptionalCourses object to add.
     */
    protected function doAddEducationalPathsOptionalCourses($educationalPathsOptionalCourses)
    {
        $this->collEducationalPathsOptionalCoursess[]= $educationalPathsOptionalCourses;
        $educationalPathsOptionalCourses->setOptionalEducationalPath($this);
    }

    /**
     * @param	EducationalPathsOptionalCourses $educationalPathsOptionalCourses The educationalPathsOptionalCourses object to remove.
     */
    public function removeEducationalPathsOptionalCourses($educationalPathsOptionalCourses)
    {
        if ($this->getEducationalPathsOptionalCoursess()->contains($educationalPathsOptionalCourses)) {
            $this->collEducationalPathsOptionalCoursess->remove($this->collEducationalPathsOptionalCoursess->search($educationalPathsOptionalCourses));
            if (null === $this->educationalPathsOptionalCoursessScheduledForDeletion) {
                $this->educationalPathsOptionalCoursessScheduledForDeletion = clone $this->collEducationalPathsOptionalCoursess;
                $this->educationalPathsOptionalCoursessScheduledForDeletion->clear();
            }
            $this->educationalPathsOptionalCoursessScheduledForDeletion[]= $educationalPathsOptionalCourses;
            $educationalPathsOptionalCourses->setOptionalEducationalPath(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EducationalPath is new, it will return
     * an empty collection; or if this EducationalPath has previously
     * been saved, it will retrieve related EducationalPathsOptionalCoursess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EducationalPath.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|EducationalPathsOptionalCourses[] List of EducationalPathsOptionalCourses objects
     */
    public function getEducationalPathsOptionalCoursessJoinOptionalCourse($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EducationalPathsOptionalCoursesQuery::create(null, $criteria);
        $query->joinWith('OptionalCourse', $join_behavior);

        return $this->getEducationalPathsOptionalCoursess($query, $con);
    }

    /**
     * Clears out the collEducationalPathsMandatoryCoursess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEducationalPathsMandatoryCoursess()
     */
    public function clearEducationalPathsMandatoryCoursess()
    {
        $this->collEducationalPathsMandatoryCoursess = null; // important to set this to null since that means it is uninitialized
        $this->collEducationalPathsMandatoryCoursessPartial = null;
    }

    /**
     * reset is the collEducationalPathsMandatoryCoursess collection loaded partially
     *
     * @return void
     */
    public function resetPartialEducationalPathsMandatoryCoursess($v = true)
    {
        $this->collEducationalPathsMandatoryCoursessPartial = $v;
    }

    /**
     * Initializes the collEducationalPathsMandatoryCoursess collection.
     *
     * By default this just sets the collEducationalPathsMandatoryCoursess collection to an empty array (like clearcollEducationalPathsMandatoryCoursess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEducationalPathsMandatoryCoursess($overrideExisting = true)
    {
        if (null !== $this->collEducationalPathsMandatoryCoursess && !$overrideExisting) {
            return;
        }
        $this->collEducationalPathsMandatoryCoursess = new PropelObjectCollection();
        $this->collEducationalPathsMandatoryCoursess->setModel('EducationalPathsMandatoryCourses');
    }

    /**
     * Gets an array of EducationalPathsMandatoryCourses objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this EducationalPath is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|EducationalPathsMandatoryCourses[] List of EducationalPathsMandatoryCourses objects
     * @throws PropelException
     */
    public function getEducationalPathsMandatoryCoursess($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collEducationalPathsMandatoryCoursessPartial && !$this->isNew();
        if (null === $this->collEducationalPathsMandatoryCoursess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEducationalPathsMandatoryCoursess) {
                // return empty collection
                $this->initEducationalPathsMandatoryCoursess();
            } else {
                $collEducationalPathsMandatoryCoursess = EducationalPathsMandatoryCoursesQuery::create(null, $criteria)
                    ->filterByMandatoryEducationalPath($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collEducationalPathsMandatoryCoursessPartial && count($collEducationalPathsMandatoryCoursess)) {
                      $this->initEducationalPathsMandatoryCoursess(false);

                      foreach($collEducationalPathsMandatoryCoursess as $obj) {
                        if (false == $this->collEducationalPathsMandatoryCoursess->contains($obj)) {
                          $this->collEducationalPathsMandatoryCoursess->append($obj);
                        }
                      }

                      $this->collEducationalPathsMandatoryCoursessPartial = true;
                    }

                    return $collEducationalPathsMandatoryCoursess;
                }

                if($partial && $this->collEducationalPathsMandatoryCoursess) {
                    foreach($this->collEducationalPathsMandatoryCoursess as $obj) {
                        if($obj->isNew()) {
                            $collEducationalPathsMandatoryCoursess[] = $obj;
                        }
                    }
                }

                $this->collEducationalPathsMandatoryCoursess = $collEducationalPathsMandatoryCoursess;
                $this->collEducationalPathsMandatoryCoursessPartial = false;
            }
        }

        return $this->collEducationalPathsMandatoryCoursess;
    }

    /**
     * Sets a collection of EducationalPathsMandatoryCourses objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $educationalPathsMandatoryCoursess A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setEducationalPathsMandatoryCoursess(PropelCollection $educationalPathsMandatoryCoursess, PropelPDO $con = null)
    {
        $this->educationalPathsMandatoryCoursessScheduledForDeletion = $this->getEducationalPathsMandatoryCoursess(new Criteria(), $con)->diff($educationalPathsMandatoryCoursess);

        foreach ($this->educationalPathsMandatoryCoursessScheduledForDeletion as $educationalPathsMandatoryCoursesRemoved) {
            $educationalPathsMandatoryCoursesRemoved->setMandatoryEducationalPath(null);
        }

        $this->collEducationalPathsMandatoryCoursess = null;
        foreach ($educationalPathsMandatoryCoursess as $educationalPathsMandatoryCourses) {
            $this->addEducationalPathsMandatoryCourses($educationalPathsMandatoryCourses);
        }

        $this->collEducationalPathsMandatoryCoursess = $educationalPathsMandatoryCoursess;
        $this->collEducationalPathsMandatoryCoursessPartial = false;
    }

    /**
     * Returns the number of related EducationalPathsMandatoryCourses objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related EducationalPathsMandatoryCourses objects.
     * @throws PropelException
     */
    public function countEducationalPathsMandatoryCoursess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collEducationalPathsMandatoryCoursessPartial && !$this->isNew();
        if (null === $this->collEducationalPathsMandatoryCoursess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEducationalPathsMandatoryCoursess) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getEducationalPathsMandatoryCoursess());
                }
                $query = EducationalPathsMandatoryCoursesQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByMandatoryEducationalPath($this)
                    ->count($con);
            }
        } else {
            return count($this->collEducationalPathsMandatoryCoursess);
        }
    }

    /**
     * Method called to associate a EducationalPathsMandatoryCourses object to this object
     * through the EducationalPathsMandatoryCourses foreign key attribute.
     *
     * @param    EducationalPathsMandatoryCourses $l EducationalPathsMandatoryCourses
     * @return EducationalPath The current object (for fluent API support)
     */
    public function addEducationalPathsMandatoryCourses(EducationalPathsMandatoryCourses $l)
    {
        if ($this->collEducationalPathsMandatoryCoursess === null) {
            $this->initEducationalPathsMandatoryCoursess();
            $this->collEducationalPathsMandatoryCoursessPartial = true;
        }
        if (!$this->collEducationalPathsMandatoryCoursess->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddEducationalPathsMandatoryCourses($l);
        }

        return $this;
    }

    /**
     * @param	EducationalPathsMandatoryCourses $educationalPathsMandatoryCourses The educationalPathsMandatoryCourses object to add.
     */
    protected function doAddEducationalPathsMandatoryCourses($educationalPathsMandatoryCourses)
    {
        $this->collEducationalPathsMandatoryCoursess[]= $educationalPathsMandatoryCourses;
        $educationalPathsMandatoryCourses->setMandatoryEducationalPath($this);
    }

    /**
     * @param	EducationalPathsMandatoryCourses $educationalPathsMandatoryCourses The educationalPathsMandatoryCourses object to remove.
     */
    public function removeEducationalPathsMandatoryCourses($educationalPathsMandatoryCourses)
    {
        if ($this->getEducationalPathsMandatoryCoursess()->contains($educationalPathsMandatoryCourses)) {
            $this->collEducationalPathsMandatoryCoursess->remove($this->collEducationalPathsMandatoryCoursess->search($educationalPathsMandatoryCourses));
            if (null === $this->educationalPathsMandatoryCoursessScheduledForDeletion) {
                $this->educationalPathsMandatoryCoursessScheduledForDeletion = clone $this->collEducationalPathsMandatoryCoursess;
                $this->educationalPathsMandatoryCoursessScheduledForDeletion->clear();
            }
            $this->educationalPathsMandatoryCoursessScheduledForDeletion[]= $educationalPathsMandatoryCourses;
            $educationalPathsMandatoryCourses->setMandatoryEducationalPath(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EducationalPath is new, it will return
     * an empty collection; or if this EducationalPath has previously
     * been saved, it will retrieve related EducationalPathsMandatoryCoursess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EducationalPath.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|EducationalPathsMandatoryCourses[] List of EducationalPathsMandatoryCourses objects
     */
    public function getEducationalPathsMandatoryCoursessJoinMandatoryCourse($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EducationalPathsMandatoryCoursesQuery::create(null, $criteria);
        $query->joinWith('MandatoryCourse', $join_behavior);

        return $this->getEducationalPathsMandatoryCoursess($query, $con);
    }

    /**
     * Clears out the collSchedules collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSchedules()
     */
    public function clearSchedules()
    {
        $this->collSchedules = null; // important to set this to null since that means it is uninitialized
        $this->collSchedulesPartial = null;
    }

    /**
     * reset is the collSchedules collection loaded partially
     *
     * @return void
     */
    public function resetPartialSchedules($v = true)
    {
        $this->collSchedulesPartial = $v;
    }

    /**
     * Initializes the collSchedules collection.
     *
     * By default this just sets the collSchedules collection to an empty array (like clearcollSchedules());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSchedules($overrideExisting = true)
    {
        if (null !== $this->collSchedules && !$overrideExisting) {
            return;
        }
        $this->collSchedules = new PropelObjectCollection();
        $this->collSchedules->setModel('Schedule');
    }

    /**
     * Gets an array of Schedule objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this EducationalPath is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Schedule[] List of Schedule objects
     * @throws PropelException
     */
    public function getSchedules($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSchedulesPartial && !$this->isNew();
        if (null === $this->collSchedules || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSchedules) {
                // return empty collection
                $this->initSchedules();
            } else {
                $collSchedules = ScheduleQuery::create(null, $criteria)
                    ->filterByEducationalPath($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSchedulesPartial && count($collSchedules)) {
                      $this->initSchedules(false);

                      foreach($collSchedules as $obj) {
                        if (false == $this->collSchedules->contains($obj)) {
                          $this->collSchedules->append($obj);
                        }
                      }

                      $this->collSchedulesPartial = true;
                    }

                    return $collSchedules;
                }

                if($partial && $this->collSchedules) {
                    foreach($this->collSchedules as $obj) {
                        if($obj->isNew()) {
                            $collSchedules[] = $obj;
                        }
                    }
                }

                $this->collSchedules = $collSchedules;
                $this->collSchedulesPartial = false;
            }
        }

        return $this->collSchedules;
    }

    /**
     * Sets a collection of Schedule objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $schedules A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setSchedules(PropelCollection $schedules, PropelPDO $con = null)
    {
        $this->schedulesScheduledForDeletion = $this->getSchedules(new Criteria(), $con)->diff($schedules);

        foreach ($this->schedulesScheduledForDeletion as $scheduleRemoved) {
            $scheduleRemoved->setEducationalPath(null);
        }

        $this->collSchedules = null;
        foreach ($schedules as $schedule) {
            $this->addSchedule($schedule);
        }

        $this->collSchedules = $schedules;
        $this->collSchedulesPartial = false;
    }

    /**
     * Returns the number of related Schedule objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Schedule objects.
     * @throws PropelException
     */
    public function countSchedules(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSchedulesPartial && !$this->isNew();
        if (null === $this->collSchedules || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSchedules) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getSchedules());
                }
                $query = ScheduleQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByEducationalPath($this)
                    ->count($con);
            }
        } else {
            return count($this->collSchedules);
        }
    }

    /**
     * Method called to associate a Schedule object to this object
     * through the Schedule foreign key attribute.
     *
     * @param    Schedule $l Schedule
     * @return EducationalPath The current object (for fluent API support)
     */
    public function addSchedule(Schedule $l)
    {
        if ($this->collSchedules === null) {
            $this->initSchedules();
            $this->collSchedulesPartial = true;
        }
        if (!$this->collSchedules->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddSchedule($l);
        }

        return $this;
    }

    /**
     * @param	Schedule $schedule The schedule object to add.
     */
    protected function doAddSchedule($schedule)
    {
        $this->collSchedules[]= $schedule;
        $schedule->setEducationalPath($this);
    }

    /**
     * @param	Schedule $schedule The schedule object to remove.
     */
    public function removeSchedule($schedule)
    {
        if ($this->getSchedules()->contains($schedule)) {
            $this->collSchedules->remove($this->collSchedules->search($schedule));
            if (null === $this->schedulesScheduledForDeletion) {
                $this->schedulesScheduledForDeletion = clone $this->collSchedules;
                $this->schedulesScheduledForDeletion->clear();
            }
            $this->schedulesScheduledForDeletion[]= $schedule;
            $schedule->setEducationalPath(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EducationalPath is new, it will return
     * an empty collection; or if this EducationalPath has previously
     * been saved, it will retrieve related Schedules from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EducationalPath.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Schedule[] List of Schedule objects
     */
    public function getSchedulesJoinCursus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ScheduleQuery::create(null, $criteria);
        $query->joinWith('Cursus', $join_behavior);

        return $this->getSchedules($query, $con);
    }

    /**
     * Clears out the collUsers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addUsers()
     */
    public function clearUsers()
    {
        $this->collUsers = null; // important to set this to null since that means it is uninitialized
        $this->collUsersPartial = null;
    }

    /**
     * Initializes the collUsers collection.
     *
     * By default this just sets the collUsers collection to an empty collection (like clearUsers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initUsers()
    {
        $this->collUsers = new PropelObjectCollection();
        $this->collUsers->setModel('User');
    }

    /**
     * Gets a collection of User objects related by a many-to-many relationship
     * to the current object by way of the users_paths cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this EducationalPath is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|User[] List of User objects
     */
    public function getUsers($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collUsers || null !== $criteria) {
            if ($this->isNew() && null === $this->collUsers) {
                // return empty collection
                $this->initUsers();
            } else {
                $collUsers = UserQuery::create(null, $criteria)
                    ->filterByEducationalPath($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collUsers;
                }
                $this->collUsers = $collUsers;
            }
        }

        return $this->collUsers;
    }

    /**
     * Sets a collection of User objects related by a many-to-many relationship
     * to the current object by way of the users_paths cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $users A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setUsers(PropelCollection $users, PropelPDO $con = null)
    {
        $this->clearUsers();
        $currentUsers = $this->getUsers();

        $this->usersScheduledForDeletion = $currentUsers->diff($users);

        foreach ($users as $user) {
            if (!$currentUsers->contains($user)) {
                $this->doAddUser($user);
            }
        }

        $this->collUsers = $users;
    }

    /**
     * Gets the number of User objects related by a many-to-many relationship
     * to the current object by way of the users_paths cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related User objects
     */
    public function countUsers($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collUsers || null !== $criteria) {
            if ($this->isNew() && null === $this->collUsers) {
                return 0;
            } else {
                $query = UserQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByEducationalPath($this)
                    ->count($con);
            }
        } else {
            return count($this->collUsers);
        }
    }

    /**
     * Associate a User object to this object
     * through the users_paths cross reference table.
     *
     * @param  User $user The UsersPaths object to relate
     * @return void
     */
    public function addUser(User $user)
    {
        if ($this->collUsers === null) {
            $this->initUsers();
        }
        if (!$this->collUsers->contains($user)) { // only add it if the **same** object is not already associated
            $this->doAddUser($user);

            $this->collUsers[]= $user;
        }
    }

    /**
     * @param	User $user The user object to add.
     */
    protected function doAddUser($user)
    {
        $usersPaths = new UsersPaths();
        $usersPaths->setUser($user);
        $this->addUsersPaths($usersPaths);
    }

    /**
     * Remove a User object to this object
     * through the users_paths cross reference table.
     *
     * @param User $user The UsersPaths object to relate
     * @return void
     */
    public function removeUser(User $user)
    {
        if ($this->getUsers()->contains($user)) {
            $this->collUsers->remove($this->collUsers->search($user));
            if (null === $this->usersScheduledForDeletion) {
                $this->usersScheduledForDeletion = clone $this->collUsers;
                $this->usersScheduledForDeletion->clear();
            }
            $this->usersScheduledForDeletion[]= $user;
        }
    }

    /**
     * Clears out the collOptionalCourses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addOptionalCourses()
     */
    public function clearOptionalCourses()
    {
        $this->collOptionalCourses = null; // important to set this to null since that means it is uninitialized
        $this->collOptionalCoursesPartial = null;
    }

    /**
     * Initializes the collOptionalCourses collection.
     *
     * By default this just sets the collOptionalCourses collection to an empty collection (like clearOptionalCourses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initOptionalCourses()
    {
        $this->collOptionalCourses = new PropelObjectCollection();
        $this->collOptionalCourses->setModel('Course');
    }

    /**
     * Gets a collection of Course objects related by a many-to-many relationship
     * to the current object by way of the educational_paths_optional_courses cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this EducationalPath is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|Course[] List of Course objects
     */
    public function getOptionalCourses($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collOptionalCourses || null !== $criteria) {
            if ($this->isNew() && null === $this->collOptionalCourses) {
                // return empty collection
                $this->initOptionalCourses();
            } else {
                $collOptionalCourses = CourseQuery::create(null, $criteria)
                    ->filterByOptionalEducationalPath($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collOptionalCourses;
                }
                $this->collOptionalCourses = $collOptionalCourses;
            }
        }

        return $this->collOptionalCourses;
    }

    /**
     * Sets a collection of Course objects related by a many-to-many relationship
     * to the current object by way of the educational_paths_optional_courses cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $optionalCourses A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setOptionalCourses(PropelCollection $optionalCourses, PropelPDO $con = null)
    {
        $this->clearOptionalCourses();
        $currentOptionalCourses = $this->getOptionalCourses();

        $this->optionalCoursesScheduledForDeletion = $currentOptionalCourses->diff($optionalCourses);

        foreach ($optionalCourses as $optionalCourse) {
            if (!$currentOptionalCourses->contains($optionalCourse)) {
                $this->doAddOptionalCourse($optionalCourse);
            }
        }

        $this->collOptionalCourses = $optionalCourses;
    }

    /**
     * Gets the number of Course objects related by a many-to-many relationship
     * to the current object by way of the educational_paths_optional_courses cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related Course objects
     */
    public function countOptionalCourses($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collOptionalCourses || null !== $criteria) {
            if ($this->isNew() && null === $this->collOptionalCourses) {
                return 0;
            } else {
                $query = CourseQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByOptionalEducationalPath($this)
                    ->count($con);
            }
        } else {
            return count($this->collOptionalCourses);
        }
    }

    /**
     * Associate a Course object to this object
     * through the educational_paths_optional_courses cross reference table.
     *
     * @param  Course $course The EducationalPathsOptionalCourses object to relate
     * @return void
     */
    public function addOptionalCourse(Course $course)
    {
        if ($this->collOptionalCourses === null) {
            $this->initOptionalCourses();
        }
        if (!$this->collOptionalCourses->contains($course)) { // only add it if the **same** object is not already associated
            $this->doAddOptionalCourse($course);

            $this->collOptionalCourses[]= $course;
        }
    }

    /**
     * @param	OptionalCourse $optionalCourse The optionalCourse object to add.
     */
    protected function doAddOptionalCourse($optionalCourse)
    {
        $educationalPathsOptionalCourses = new EducationalPathsOptionalCourses();
        $educationalPathsOptionalCourses->setOptionalCourse($optionalCourse);
        $this->addEducationalPathsOptionalCourses($educationalPathsOptionalCourses);
    }

    /**
     * Remove a Course object to this object
     * through the educational_paths_optional_courses cross reference table.
     *
     * @param Course $course The EducationalPathsOptionalCourses object to relate
     * @return void
     */
    public function removeOptionalCourse(Course $course)
    {
        if ($this->getOptionalCourses()->contains($course)) {
            $this->collOptionalCourses->remove($this->collOptionalCourses->search($course));
            if (null === $this->optionalCoursesScheduledForDeletion) {
                $this->optionalCoursesScheduledForDeletion = clone $this->collOptionalCourses;
                $this->optionalCoursesScheduledForDeletion->clear();
            }
            $this->optionalCoursesScheduledForDeletion[]= $course;
        }
    }

    /**
     * Clears out the collMandatoryCourses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMandatoryCourses()
     */
    public function clearMandatoryCourses()
    {
        $this->collMandatoryCourses = null; // important to set this to null since that means it is uninitialized
        $this->collMandatoryCoursesPartial = null;
    }

    /**
     * Initializes the collMandatoryCourses collection.
     *
     * By default this just sets the collMandatoryCourses collection to an empty collection (like clearMandatoryCourses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initMandatoryCourses()
    {
        $this->collMandatoryCourses = new PropelObjectCollection();
        $this->collMandatoryCourses->setModel('Course');
    }

    /**
     * Gets a collection of Course objects related by a many-to-many relationship
     * to the current object by way of the educational_paths_mandatory_courses cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this EducationalPath is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|Course[] List of Course objects
     */
    public function getMandatoryCourses($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collMandatoryCourses || null !== $criteria) {
            if ($this->isNew() && null === $this->collMandatoryCourses) {
                // return empty collection
                $this->initMandatoryCourses();
            } else {
                $collMandatoryCourses = CourseQuery::create(null, $criteria)
                    ->filterByMandatoryEducationalPath($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collMandatoryCourses;
                }
                $this->collMandatoryCourses = $collMandatoryCourses;
            }
        }

        return $this->collMandatoryCourses;
    }

    /**
     * Sets a collection of Course objects related by a many-to-many relationship
     * to the current object by way of the educational_paths_mandatory_courses cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mandatoryCourses A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setMandatoryCourses(PropelCollection $mandatoryCourses, PropelPDO $con = null)
    {
        $this->clearMandatoryCourses();
        $currentMandatoryCourses = $this->getMandatoryCourses();

        $this->mandatoryCoursesScheduledForDeletion = $currentMandatoryCourses->diff($mandatoryCourses);

        foreach ($mandatoryCourses as $mandatoryCourse) {
            if (!$currentMandatoryCourses->contains($mandatoryCourse)) {
                $this->doAddMandatoryCourse($mandatoryCourse);
            }
        }

        $this->collMandatoryCourses = $mandatoryCourses;
    }

    /**
     * Gets the number of Course objects related by a many-to-many relationship
     * to the current object by way of the educational_paths_mandatory_courses cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related Course objects
     */
    public function countMandatoryCourses($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collMandatoryCourses || null !== $criteria) {
            if ($this->isNew() && null === $this->collMandatoryCourses) {
                return 0;
            } else {
                $query = CourseQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByMandatoryEducationalPath($this)
                    ->count($con);
            }
        } else {
            return count($this->collMandatoryCourses);
        }
    }

    /**
     * Associate a Course object to this object
     * through the educational_paths_mandatory_courses cross reference table.
     *
     * @param  Course $course The EducationalPathsMandatoryCourses object to relate
     * @return void
     */
    public function addMandatoryCourse(Course $course)
    {
        if ($this->collMandatoryCourses === null) {
            $this->initMandatoryCourses();
        }
        if (!$this->collMandatoryCourses->contains($course)) { // only add it if the **same** object is not already associated
            $this->doAddMandatoryCourse($course);

            $this->collMandatoryCourses[]= $course;
        }
    }

    /**
     * @param	MandatoryCourse $mandatoryCourse The mandatoryCourse object to add.
     */
    protected function doAddMandatoryCourse($mandatoryCourse)
    {
        $educationalPathsMandatoryCourses = new EducationalPathsMandatoryCourses();
        $educationalPathsMandatoryCourses->setMandatoryCourse($mandatoryCourse);
        $this->addEducationalPathsMandatoryCourses($educationalPathsMandatoryCourses);
    }

    /**
     * Remove a Course object to this object
     * through the educational_paths_mandatory_courses cross reference table.
     *
     * @param Course $course The EducationalPathsMandatoryCourses object to relate
     * @return void
     */
    public function removeMandatoryCourse(Course $course)
    {
        if ($this->getMandatoryCourses()->contains($course)) {
            $this->collMandatoryCourses->remove($this->collMandatoryCourses->search($course));
            if (null === $this->mandatoryCoursesScheduledForDeletion) {
                $this->mandatoryCoursesScheduledForDeletion = clone $this->collMandatoryCourses;
                $this->mandatoryCoursesScheduledForDeletion->clear();
            }
            $this->mandatoryCoursesScheduledForDeletion[]= $course;
        }
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->short_name = null;
        $this->name = null;
        $this->description = null;
        $this->description_isLoaded = false;
        $this->cursus_id = null;
        $this->responsable_id = null;
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
            if ($this->collUsersPathss) {
                foreach ($this->collUsersPathss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEducationalPathsOptionalCoursess) {
                foreach ($this->collEducationalPathsOptionalCoursess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEducationalPathsMandatoryCoursess) {
                foreach ($this->collEducationalPathsMandatoryCoursess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSchedules) {
                foreach ($this->collSchedules as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUsers) {
                foreach ($this->collUsers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOptionalCourses) {
                foreach ($this->collOptionalCourses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMandatoryCourses) {
                foreach ($this->collMandatoryCourses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collUsersPathss instanceof PropelCollection) {
            $this->collUsersPathss->clearIterator();
        }
        $this->collUsersPathss = null;
        if ($this->collEducationalPathsOptionalCoursess instanceof PropelCollection) {
            $this->collEducationalPathsOptionalCoursess->clearIterator();
        }
        $this->collEducationalPathsOptionalCoursess = null;
        if ($this->collEducationalPathsMandatoryCoursess instanceof PropelCollection) {
            $this->collEducationalPathsMandatoryCoursess->clearIterator();
        }
        $this->collEducationalPathsMandatoryCoursess = null;
        if ($this->collSchedules instanceof PropelCollection) {
            $this->collSchedules->clearIterator();
        }
        $this->collSchedules = null;
        if ($this->collUsers instanceof PropelCollection) {
            $this->collUsers->clearIterator();
        }
        $this->collUsers = null;
        if ($this->collOptionalCourses instanceof PropelCollection) {
            $this->collOptionalCourses->clearIterator();
        }
        $this->collOptionalCourses = null;
        if ($this->collMandatoryCourses instanceof PropelCollection) {
            $this->collMandatoryCourses->clearIterator();
        }
        $this->collMandatoryCourses = null;
        $this->aCursus = null;
        $this->aResponsable = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EducationalPathPeer::DEFAULT_STRING_FORMAT);
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
