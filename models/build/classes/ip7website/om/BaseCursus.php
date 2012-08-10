<?php


/**
 * Base class that represents a row from the 'cursus' table.
 *
 *
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseCursus extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CursusPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        CursusPeer
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
     * The value for the responsable_id field.
     * @var        int
     */
    protected $responsable_id;

    /**
     * The value for the newsletter_id field.
     * @var        int
     */
    protected $newsletter_id;

    /**
     * @var        User
     */
    protected $aResponsable;

    /**
     * @var        Newsletter
     */
    protected $aNewsletter;

    /**
     * @var        PropelObjectCollection|UsersCursus[] Collection to store aggregation of UsersCursus objects.
     */
    protected $collUsersCursuss;
    protected $collUsersCursussPartial;

    /**
     * @var        PropelObjectCollection|Course[] Collection to store aggregation of Course objects.
     */
    protected $collCourses;
    protected $collCoursesPartial;

    /**
     * @var        PropelObjectCollection|Alert[] Collection to store aggregation of Alert objects.
     */
    protected $collAlerts;
    protected $collAlertsPartial;

    /**
     * @var        PropelObjectCollection|Content[] Collection to store aggregation of Content objects.
     */
    protected $collContents;
    protected $collContentsPartial;

    /**
     * @var        PropelObjectCollection|News[] Collection to store aggregation of News objects.
     */
    protected $collNewss;
    protected $collNewssPartial;

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
    protected $usersCursussScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $coursesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $alertsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $contentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $newssScheduledForDeletion = null;

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
        $c->addSelectColumn(CursusPeer::DESCRIPTION);
        try {
            $stmt = CursusPeer::doSelectStmt($c, $con);
            $row = $stmt->fetch(PDO::FETCH_NUM);
            $stmt->closeCursor();
            $this->description = ($row[0] !== null) ? (string) $row[0] : null;
            $this->description_isLoaded = true;
        } catch (Exception $e) {
            throw new PropelException("Error loading value for [description] column on demand.", $e);
        }
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
     * Get the [newsletter_id] column value.
     *
     * @return int
     */
    public function getNewsletterId()
    {
        return $this->newsletter_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Cursus The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = CursusPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [short_name] column.
     *
     * @param string $v new value
     * @return Cursus The current object (for fluent API support)
     */
    public function setShortName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->short_name !== $v) {
            $this->short_name = $v;
            $this->modifiedColumns[] = CursusPeer::SHORT_NAME;
        }


        return $this;
    } // setShortName()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Cursus The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = CursusPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Cursus The current object (for fluent API support)
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
            $this->modifiedColumns[] = CursusPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [responsable_id] column.
     *
     * @param int $v new value
     * @return Cursus The current object (for fluent API support)
     */
    public function setResponsableId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->responsable_id !== $v) {
            $this->responsable_id = $v;
            $this->modifiedColumns[] = CursusPeer::RESPONSABLE_ID;
        }

        if ($this->aResponsable !== null && $this->aResponsable->getId() !== $v) {
            $this->aResponsable = null;
        }


        return $this;
    } // setResponsableId()

    /**
     * Set the value of [newsletter_id] column.
     *
     * @param int $v new value
     * @return Cursus The current object (for fluent API support)
     */
    public function setNewsletterId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->newsletter_id !== $v) {
            $this->newsletter_id = $v;
            $this->modifiedColumns[] = CursusPeer::NEWSLETTER_ID;
        }

        if ($this->aNewsletter !== null && $this->aNewsletter->getId() !== $v) {
            $this->aNewsletter = null;
        }


        return $this;
    } // setNewsletterId()

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
            $this->responsable_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->newsletter_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 5; // 5 = CursusPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Cursus object", $e);
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

        if ($this->aResponsable !== null && $this->responsable_id !== $this->aResponsable->getId()) {
            $this->aResponsable = null;
        }
        if ($this->aNewsletter !== null && $this->newsletter_id !== $this->aNewsletter->getId()) {
            $this->aNewsletter = null;
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
            $con = Propel::getConnection(CursusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = CursusPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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

            $this->aResponsable = null;
            $this->aNewsletter = null;
            $this->collUsersCursuss = null;

            $this->collCourses = null;

            $this->collAlerts = null;

            $this->collContents = null;

            $this->collNewss = null;

            $this->collSchedules = null;

            $this->collUsers = null;
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
            $con = Propel::getConnection(CursusPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = CursusQuery::create()
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
            $con = Propel::getConnection(CursusPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                CursusPeer::addInstanceToPool($this);
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

            if ($this->aResponsable !== null) {
                if ($this->aResponsable->isModified() || $this->aResponsable->isNew()) {
                    $affectedRows += $this->aResponsable->save($con);
                }
                $this->setResponsable($this->aResponsable);
            }

            if ($this->aNewsletter !== null) {
                if ($this->aNewsletter->isModified() || $this->aNewsletter->isNew()) {
                    $affectedRows += $this->aNewsletter->save($con);
                }
                $this->setNewsletter($this->aNewsletter);
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
                    UsersCursusQuery::create()
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

            if ($this->usersCursussScheduledForDeletion !== null) {
                if (!$this->usersCursussScheduledForDeletion->isEmpty()) {
                    UsersCursusQuery::create()
                        ->filterByPrimaryKeys($this->usersCursussScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->usersCursussScheduledForDeletion = null;
                }
            }

            if ($this->collUsersCursuss !== null) {
                foreach ($this->collUsersCursuss as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->coursesScheduledForDeletion !== null) {
                if (!$this->coursesScheduledForDeletion->isEmpty()) {
                    foreach ($this->coursesScheduledForDeletion as $course) {
                        // need to save related object because we set the relation to null
                        $course->save($con);
                    }
                    $this->coursesScheduledForDeletion = null;
                }
            }

            if ($this->collCourses !== null) {
                foreach ($this->collCourses as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
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

            if ($this->contentsScheduledForDeletion !== null) {
                if (!$this->contentsScheduledForDeletion->isEmpty()) {
                    foreach ($this->contentsScheduledForDeletion as $content) {
                        // need to save related object because we set the relation to null
                        $content->save($con);
                    }
                    $this->contentsScheduledForDeletion = null;
                }
            }

            if ($this->collContents !== null) {
                foreach ($this->collContents as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->newssScheduledForDeletion !== null) {
                if (!$this->newssScheduledForDeletion->isEmpty()) {
                    foreach ($this->newssScheduledForDeletion as $news) {
                        // need to save related object because we set the relation to null
                        $news->save($con);
                    }
                    $this->newssScheduledForDeletion = null;
                }
            }

            if ($this->collNewss !== null) {
                foreach ($this->collNewss as $referrerFK) {
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

        $this->modifiedColumns[] = CursusPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CursusPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CursusPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(CursusPeer::SHORT_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`SHORT_NAME`';
        }
        if ($this->isColumnModified(CursusPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`NAME`';
        }
        if ($this->isColumnModified(CursusPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }
        if ($this->isColumnModified(CursusPeer::RESPONSABLE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`RESPONSABLE_ID`';
        }
        if ($this->isColumnModified(CursusPeer::NEWSLETTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`NEWSLETTER_ID`';
        }

        $sql = sprintf(
            'INSERT INTO `cursus` (%s) VALUES (%s)',
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
                    case '`RESPONSABLE_ID`':
                        $stmt->bindValue($identifier, $this->responsable_id, PDO::PARAM_INT);
                        break;
                    case '`NEWSLETTER_ID`':
                        $stmt->bindValue($identifier, $this->newsletter_id, PDO::PARAM_INT);
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

            if ($this->aResponsable !== null) {
                if (!$this->aResponsable->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aResponsable->getValidationFailures());
                }
            }

            if ($this->aNewsletter !== null) {
                if (!$this->aNewsletter->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aNewsletter->getValidationFailures());
                }
            }


            if (($retval = CursusPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collUsersCursuss !== null) {
                    foreach ($this->collUsersCursuss as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCourses !== null) {
                    foreach ($this->collCourses as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAlerts !== null) {
                    foreach ($this->collAlerts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collContents !== null) {
                    foreach ($this->collContents as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collNewss !== null) {
                    foreach ($this->collNewss as $referrerFK) {
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
        $pos = CursusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getResponsableId();
                break;
            case 5:
                return $this->getNewsletterId();
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
        if (isset($alreadyDumpedObjects['Cursus'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Cursus'][$this->getPrimaryKey()] = true;
        $keys = CursusPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getShortName(),
            $keys[2] => $this->getName(),
            $keys[3] => ($includeLazyLoadColumns) ? $this->getDescription() : null,
            $keys[4] => $this->getResponsableId(),
            $keys[5] => $this->getNewsletterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aResponsable) {
                $result['Responsable'] = $this->aResponsable->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aNewsletter) {
                $result['Newsletter'] = $this->aNewsletter->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collUsersCursuss) {
                $result['UsersCursuss'] = $this->collUsersCursuss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCourses) {
                $result['Courses'] = $this->collCourses->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAlerts) {
                $result['Alerts'] = $this->collAlerts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collContents) {
                $result['Contents'] = $this->collContents->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNewss) {
                $result['Newss'] = $this->collNewss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = CursusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setResponsableId($value);
                break;
            case 5:
                $this->setNewsletterId($value);
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
        $keys = CursusPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setShortName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setResponsableId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setNewsletterId($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CursusPeer::DATABASE_NAME);

        if ($this->isColumnModified(CursusPeer::ID)) $criteria->add(CursusPeer::ID, $this->id);
        if ($this->isColumnModified(CursusPeer::SHORT_NAME)) $criteria->add(CursusPeer::SHORT_NAME, $this->short_name);
        if ($this->isColumnModified(CursusPeer::NAME)) $criteria->add(CursusPeer::NAME, $this->name);
        if ($this->isColumnModified(CursusPeer::DESCRIPTION)) $criteria->add(CursusPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(CursusPeer::RESPONSABLE_ID)) $criteria->add(CursusPeer::RESPONSABLE_ID, $this->responsable_id);
        if ($this->isColumnModified(CursusPeer::NEWSLETTER_ID)) $criteria->add(CursusPeer::NEWSLETTER_ID, $this->newsletter_id);

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
        $criteria = new Criteria(CursusPeer::DATABASE_NAME);
        $criteria->add(CursusPeer::ID, $this->id);

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
     * @param object $copyObj An object of Cursus (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setShortName($this->getShortName());
        $copyObj->setName($this->getName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setResponsableId($this->getResponsableId());
        $copyObj->setNewsletterId($this->getNewsletterId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getUsersCursuss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUsersCursus($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCourses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCourse($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAlerts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlert($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getContents() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addContent($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNewss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNews($relObj->copy($deepCopy));
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
     * @return Cursus Clone of current object.
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
     * @return CursusPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new CursusPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param             User $v
     * @return Cursus The current object (for fluent API support)
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
            $v->addCursusResponsability($this);
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
                $this->aResponsable->addCursusResponsabilitys($this);
             */
        }

        return $this->aResponsable;
    }

    /**
     * Declares an association between this object and a Newsletter object.
     *
     * @param             Newsletter $v
     * @return Cursus The current object (for fluent API support)
     * @throws PropelException
     */
    public function setNewsletter(Newsletter $v = null)
    {
        if ($v === null) {
            $this->setNewsletterId(NULL);
        } else {
            $this->setNewsletterId($v->getId());
        }

        $this->aNewsletter = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Newsletter object, it will not be re-added.
        if ($v !== null) {
            $v->addCursus($this);
        }


        return $this;
    }


    /**
     * Get the associated Newsletter object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return Newsletter The associated Newsletter object.
     * @throws PropelException
     */
    public function getNewsletter(PropelPDO $con = null)
    {
        if ($this->aNewsletter === null && ($this->newsletter_id !== null)) {
            $this->aNewsletter = NewsletterQuery::create()->findPk($this->newsletter_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aNewsletter->addCursuss($this);
             */
        }

        return $this->aNewsletter;
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
        if ('UsersCursus' == $relationName) {
            $this->initUsersCursuss();
        }
        if ('Course' == $relationName) {
            $this->initCourses();
        }
        if ('Alert' == $relationName) {
            $this->initAlerts();
        }
        if ('Content' == $relationName) {
            $this->initContents();
        }
        if ('News' == $relationName) {
            $this->initNewss();
        }
        if ('Schedule' == $relationName) {
            $this->initSchedules();
        }
    }

    /**
     * Clears out the collUsersCursuss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addUsersCursuss()
     */
    public function clearUsersCursuss()
    {
        $this->collUsersCursuss = null; // important to set this to null since that means it is uninitialized
        $this->collUsersCursussPartial = null;
    }

    /**
     * reset is the collUsersCursuss collection loaded partially
     *
     * @return void
     */
    public function resetPartialUsersCursuss($v = true)
    {
        $this->collUsersCursussPartial = $v;
    }

    /**
     * Initializes the collUsersCursuss collection.
     *
     * By default this just sets the collUsersCursuss collection to an empty array (like clearcollUsersCursuss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUsersCursuss($overrideExisting = true)
    {
        if (null !== $this->collUsersCursuss && !$overrideExisting) {
            return;
        }
        $this->collUsersCursuss = new PropelObjectCollection();
        $this->collUsersCursuss->setModel('UsersCursus');
    }

    /**
     * Gets an array of UsersCursus objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Cursus is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|UsersCursus[] List of UsersCursus objects
     * @throws PropelException
     */
    public function getUsersCursuss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUsersCursussPartial && !$this->isNew();
        if (null === $this->collUsersCursuss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUsersCursuss) {
                // return empty collection
                $this->initUsersCursuss();
            } else {
                $collUsersCursuss = UsersCursusQuery::create(null, $criteria)
                    ->filterByCursus($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUsersCursussPartial && count($collUsersCursuss)) {
                      $this->initUsersCursuss(false);

                      foreach($collUsersCursuss as $obj) {
                        if (false == $this->collUsersCursuss->contains($obj)) {
                          $this->collUsersCursuss->append($obj);
                        }
                      }

                      $this->collUsersCursussPartial = true;
                    }

                    return $collUsersCursuss;
                }

                if($partial && $this->collUsersCursuss) {
                    foreach($this->collUsersCursuss as $obj) {
                        if($obj->isNew()) {
                            $collUsersCursuss[] = $obj;
                        }
                    }
                }

                $this->collUsersCursuss = $collUsersCursuss;
                $this->collUsersCursussPartial = false;
            }
        }

        return $this->collUsersCursuss;
    }

    /**
     * Sets a collection of UsersCursus objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $usersCursuss A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setUsersCursuss(PropelCollection $usersCursuss, PropelPDO $con = null)
    {
        $this->usersCursussScheduledForDeletion = $this->getUsersCursuss(new Criteria(), $con)->diff($usersCursuss);

        foreach ($this->usersCursussScheduledForDeletion as $usersCursusRemoved) {
            $usersCursusRemoved->setCursus(null);
        }

        $this->collUsersCursuss = null;
        foreach ($usersCursuss as $usersCursus) {
            $this->addUsersCursus($usersCursus);
        }

        $this->collUsersCursuss = $usersCursuss;
        $this->collUsersCursussPartial = false;
    }

    /**
     * Returns the number of related UsersCursus objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related UsersCursus objects.
     * @throws PropelException
     */
    public function countUsersCursuss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUsersCursussPartial && !$this->isNew();
        if (null === $this->collUsersCursuss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUsersCursuss) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getUsersCursuss());
                }
                $query = UsersCursusQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByCursus($this)
                    ->count($con);
            }
        } else {
            return count($this->collUsersCursuss);
        }
    }

    /**
     * Method called to associate a UsersCursus object to this object
     * through the UsersCursus foreign key attribute.
     *
     * @param    UsersCursus $l UsersCursus
     * @return Cursus The current object (for fluent API support)
     */
    public function addUsersCursus(UsersCursus $l)
    {
        if ($this->collUsersCursuss === null) {
            $this->initUsersCursuss();
            $this->collUsersCursussPartial = true;
        }
        if (!$this->collUsersCursuss->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddUsersCursus($l);
        }

        return $this;
    }

    /**
     * @param	UsersCursus $usersCursus The usersCursus object to add.
     */
    protected function doAddUsersCursus($usersCursus)
    {
        $this->collUsersCursuss[]= $usersCursus;
        $usersCursus->setCursus($this);
    }

    /**
     * @param	UsersCursus $usersCursus The usersCursus object to remove.
     */
    public function removeUsersCursus($usersCursus)
    {
        if ($this->getUsersCursuss()->contains($usersCursus)) {
            $this->collUsersCursuss->remove($this->collUsersCursuss->search($usersCursus));
            if (null === $this->usersCursussScheduledForDeletion) {
                $this->usersCursussScheduledForDeletion = clone $this->collUsersCursuss;
                $this->usersCursussScheduledForDeletion->clear();
            }
            $this->usersCursussScheduledForDeletion[]= $usersCursus;
            $usersCursus->setCursus(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cursus is new, it will return
     * an empty collection; or if this Cursus has previously
     * been saved, it will retrieve related UsersCursuss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cursus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UsersCursus[] List of UsersCursus objects
     */
    public function getUsersCursussJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UsersCursusQuery::create(null, $criteria);
        $query->joinWith('User', $join_behavior);

        return $this->getUsersCursuss($query, $con);
    }

    /**
     * Clears out the collCourses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCourses()
     */
    public function clearCourses()
    {
        $this->collCourses = null; // important to set this to null since that means it is uninitialized
        $this->collCoursesPartial = null;
    }

    /**
     * reset is the collCourses collection loaded partially
     *
     * @return void
     */
    public function resetPartialCourses($v = true)
    {
        $this->collCoursesPartial = $v;
    }

    /**
     * Initializes the collCourses collection.
     *
     * By default this just sets the collCourses collection to an empty array (like clearcollCourses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCourses($overrideExisting = true)
    {
        if (null !== $this->collCourses && !$overrideExisting) {
            return;
        }
        $this->collCourses = new PropelObjectCollection();
        $this->collCourses->setModel('Course');
    }

    /**
     * Gets an array of Course objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Cursus is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Course[] List of Course objects
     * @throws PropelException
     */
    public function getCourses($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCoursesPartial && !$this->isNew();
        if (null === $this->collCourses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCourses) {
                // return empty collection
                $this->initCourses();
            } else {
                $collCourses = CourseQuery::create(null, $criteria)
                    ->filterByCursus($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCoursesPartial && count($collCourses)) {
                      $this->initCourses(false);

                      foreach($collCourses as $obj) {
                        if (false == $this->collCourses->contains($obj)) {
                          $this->collCourses->append($obj);
                        }
                      }

                      $this->collCoursesPartial = true;
                    }

                    return $collCourses;
                }

                if($partial && $this->collCourses) {
                    foreach($this->collCourses as $obj) {
                        if($obj->isNew()) {
                            $collCourses[] = $obj;
                        }
                    }
                }

                $this->collCourses = $collCourses;
                $this->collCoursesPartial = false;
            }
        }

        return $this->collCourses;
    }

    /**
     * Sets a collection of Course objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $courses A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setCourses(PropelCollection $courses, PropelPDO $con = null)
    {
        $this->coursesScheduledForDeletion = $this->getCourses(new Criteria(), $con)->diff($courses);

        foreach ($this->coursesScheduledForDeletion as $courseRemoved) {
            $courseRemoved->setCursus(null);
        }

        $this->collCourses = null;
        foreach ($courses as $course) {
            $this->addCourse($course);
        }

        $this->collCourses = $courses;
        $this->collCoursesPartial = false;
    }

    /**
     * Returns the number of related Course objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Course objects.
     * @throws PropelException
     */
    public function countCourses(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCoursesPartial && !$this->isNew();
        if (null === $this->collCourses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCourses) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getCourses());
                }
                $query = CourseQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByCursus($this)
                    ->count($con);
            }
        } else {
            return count($this->collCourses);
        }
    }

    /**
     * Method called to associate a Course object to this object
     * through the Course foreign key attribute.
     *
     * @param    Course $l Course
     * @return Cursus The current object (for fluent API support)
     */
    public function addCourse(Course $l)
    {
        if ($this->collCourses === null) {
            $this->initCourses();
            $this->collCoursesPartial = true;
        }
        if (!$this->collCourses->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddCourse($l);
        }

        return $this;
    }

    /**
     * @param	Course $course The course object to add.
     */
    protected function doAddCourse($course)
    {
        $this->collCourses[]= $course;
        $course->setCursus($this);
    }

    /**
     * @param	Course $course The course object to remove.
     */
    public function removeCourse($course)
    {
        if ($this->getCourses()->contains($course)) {
            $this->collCourses->remove($this->collCourses->search($course));
            if (null === $this->coursesScheduledForDeletion) {
                $this->coursesScheduledForDeletion = clone $this->collCourses;
                $this->coursesScheduledForDeletion->clear();
            }
            $this->coursesScheduledForDeletion[]= $course;
            $course->setCursus(null);
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
     * If this Cursus is new, it will return
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
                    ->filterByCursus($this)
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
            $alertRemoved->setCursus(null);
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
                    ->filterByCursus($this)
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
     * @return Cursus The current object (for fluent API support)
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
        $alert->setCursus($this);
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
            $alert->setCursus(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cursus is new, it will return
     * an empty collection; or if this Cursus has previously
     * been saved, it will retrieve related Alerts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cursus.
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
     * Otherwise if this Cursus is new, it will return
     * an empty collection; or if this Cursus has previously
     * been saved, it will retrieve related Alerts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cursus.
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
     * Otherwise if this Cursus is new, it will return
     * an empty collection; or if this Cursus has previously
     * been saved, it will retrieve related Alerts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cursus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alert[] List of Alert objects
     */
    public function getAlertsJoinTag($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlertQuery::create(null, $criteria);
        $query->joinWith('Tag', $join_behavior);

        return $this->getAlerts($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cursus is new, it will return
     * an empty collection; or if this Cursus has previously
     * been saved, it will retrieve related Alerts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cursus.
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
     * reset is the collContents collection loaded partially
     *
     * @return void
     */
    public function resetPartialContents($v = true)
    {
        $this->collContentsPartial = $v;
    }

    /**
     * Initializes the collContents collection.
     *
     * By default this just sets the collContents collection to an empty array (like clearcollContents());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initContents($overrideExisting = true)
    {
        if (null !== $this->collContents && !$overrideExisting) {
            return;
        }
        $this->collContents = new PropelObjectCollection();
        $this->collContents->setModel('Content');
    }

    /**
     * Gets an array of Content objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Cursus is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Content[] List of Content objects
     * @throws PropelException
     */
    public function getContents($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collContentsPartial && !$this->isNew();
        if (null === $this->collContents || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collContents) {
                // return empty collection
                $this->initContents();
            } else {
                $collContents = ContentQuery::create(null, $criteria)
                    ->filterByCursus($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collContentsPartial && count($collContents)) {
                      $this->initContents(false);

                      foreach($collContents as $obj) {
                        if (false == $this->collContents->contains($obj)) {
                          $this->collContents->append($obj);
                        }
                      }

                      $this->collContentsPartial = true;
                    }

                    return $collContents;
                }

                if($partial && $this->collContents) {
                    foreach($this->collContents as $obj) {
                        if($obj->isNew()) {
                            $collContents[] = $obj;
                        }
                    }
                }

                $this->collContents = $collContents;
                $this->collContentsPartial = false;
            }
        }

        return $this->collContents;
    }

    /**
     * Sets a collection of Content objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $contents A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setContents(PropelCollection $contents, PropelPDO $con = null)
    {
        $this->contentsScheduledForDeletion = $this->getContents(new Criteria(), $con)->diff($contents);

        foreach ($this->contentsScheduledForDeletion as $contentRemoved) {
            $contentRemoved->setCursus(null);
        }

        $this->collContents = null;
        foreach ($contents as $content) {
            $this->addContent($content);
        }

        $this->collContents = $contents;
        $this->collContentsPartial = false;
    }

    /**
     * Returns the number of related Content objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Content objects.
     * @throws PropelException
     */
    public function countContents(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collContentsPartial && !$this->isNew();
        if (null === $this->collContents || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collContents) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getContents());
                }
                $query = ContentQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByCursus($this)
                    ->count($con);
            }
        } else {
            return count($this->collContents);
        }
    }

    /**
     * Method called to associate a Content object to this object
     * through the Content foreign key attribute.
     *
     * @param    Content $l Content
     * @return Cursus The current object (for fluent API support)
     */
    public function addContent(Content $l)
    {
        if ($this->collContents === null) {
            $this->initContents();
            $this->collContentsPartial = true;
        }
        if (!$this->collContents->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddContent($l);
        }

        return $this;
    }

    /**
     * @param	Content $content The content object to add.
     */
    protected function doAddContent($content)
    {
        $this->collContents[]= $content;
        $content->setCursus($this);
    }

    /**
     * @param	Content $content The content object to remove.
     */
    public function removeContent($content)
    {
        if ($this->getContents()->contains($content)) {
            $this->collContents->remove($this->collContents->search($content));
            if (null === $this->contentsScheduledForDeletion) {
                $this->contentsScheduledForDeletion = clone $this->collContents;
                $this->contentsScheduledForDeletion->clear();
            }
            $this->contentsScheduledForDeletion[]= $content;
            $content->setCursus(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cursus is new, it will return
     * an empty collection; or if this Cursus has previously
     * been saved, it will retrieve related Contents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cursus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Content[] List of Content objects
     */
    public function getContentsJoinAuthor($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContentQuery::create(null, $criteria);
        $query->joinWith('Author', $join_behavior);

        return $this->getContents($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cursus is new, it will return
     * an empty collection; or if this Cursus has previously
     * been saved, it will retrieve related Contents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cursus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Content[] List of Content objects
     */
    public function getContentsJoinCourse($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContentQuery::create(null, $criteria);
        $query->joinWith('Course', $join_behavior);

        return $this->getContents($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cursus is new, it will return
     * an empty collection; or if this Cursus has previously
     * been saved, it will retrieve related Contents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cursus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Content[] List of Content objects
     */
    public function getContentsJoinContentType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContentQuery::create(null, $criteria);
        $query->joinWith('ContentType', $join_behavior);

        return $this->getContents($query, $con);
    }

    /**
     * Clears out the collNewss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addNewss()
     */
    public function clearNewss()
    {
        $this->collNewss = null; // important to set this to null since that means it is uninitialized
        $this->collNewssPartial = null;
    }

    /**
     * reset is the collNewss collection loaded partially
     *
     * @return void
     */
    public function resetPartialNewss($v = true)
    {
        $this->collNewssPartial = $v;
    }

    /**
     * Initializes the collNewss collection.
     *
     * By default this just sets the collNewss collection to an empty array (like clearcollNewss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNewss($overrideExisting = true)
    {
        if (null !== $this->collNewss && !$overrideExisting) {
            return;
        }
        $this->collNewss = new PropelObjectCollection();
        $this->collNewss->setModel('News');
    }

    /**
     * Gets an array of News objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Cursus is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|News[] List of News objects
     * @throws PropelException
     */
    public function getNewss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collNewssPartial && !$this->isNew();
        if (null === $this->collNewss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNewss) {
                // return empty collection
                $this->initNewss();
            } else {
                $collNewss = NewsQuery::create(null, $criteria)
                    ->filterByCursus($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collNewssPartial && count($collNewss)) {
                      $this->initNewss(false);

                      foreach($collNewss as $obj) {
                        if (false == $this->collNewss->contains($obj)) {
                          $this->collNewss->append($obj);
                        }
                      }

                      $this->collNewssPartial = true;
                    }

                    return $collNewss;
                }

                if($partial && $this->collNewss) {
                    foreach($this->collNewss as $obj) {
                        if($obj->isNew()) {
                            $collNewss[] = $obj;
                        }
                    }
                }

                $this->collNewss = $collNewss;
                $this->collNewssPartial = false;
            }
        }

        return $this->collNewss;
    }

    /**
     * Sets a collection of News objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $newss A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setNewss(PropelCollection $newss, PropelPDO $con = null)
    {
        $this->newssScheduledForDeletion = $this->getNewss(new Criteria(), $con)->diff($newss);

        foreach ($this->newssScheduledForDeletion as $newsRemoved) {
            $newsRemoved->setCursus(null);
        }

        $this->collNewss = null;
        foreach ($newss as $news) {
            $this->addNews($news);
        }

        $this->collNewss = $newss;
        $this->collNewssPartial = false;
    }

    /**
     * Returns the number of related News objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related News objects.
     * @throws PropelException
     */
    public function countNewss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collNewssPartial && !$this->isNew();
        if (null === $this->collNewss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNewss) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getNewss());
                }
                $query = NewsQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByCursus($this)
                    ->count($con);
            }
        } else {
            return count($this->collNewss);
        }
    }

    /**
     * Method called to associate a News object to this object
     * through the News foreign key attribute.
     *
     * @param    News $l News
     * @return Cursus The current object (for fluent API support)
     */
    public function addNews(News $l)
    {
        if ($this->collNewss === null) {
            $this->initNewss();
            $this->collNewssPartial = true;
        }
        if (!$this->collNewss->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddNews($l);
        }

        return $this;
    }

    /**
     * @param	News $news The news object to add.
     */
    protected function doAddNews($news)
    {
        $this->collNewss[]= $news;
        $news->setCursus($this);
    }

    /**
     * @param	News $news The news object to remove.
     */
    public function removeNews($news)
    {
        if ($this->getNewss()->contains($news)) {
            $this->collNewss->remove($this->collNewss->search($news));
            if (null === $this->newssScheduledForDeletion) {
                $this->newssScheduledForDeletion = clone $this->collNewss;
                $this->newssScheduledForDeletion->clear();
            }
            $this->newssScheduledForDeletion[]= $news;
            $news->setCursus(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cursus is new, it will return
     * an empty collection; or if this Cursus has previously
     * been saved, it will retrieve related Newss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cursus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|News[] List of News objects
     */
    public function getNewssJoinAuthor($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NewsQuery::create(null, $criteria);
        $query->joinWith('Author', $join_behavior);

        return $this->getNewss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cursus is new, it will return
     * an empty collection; or if this Cursus has previously
     * been saved, it will retrieve related Newss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cursus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|News[] List of News objects
     */
    public function getNewssJoinCourse($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NewsQuery::create(null, $criteria);
        $query->joinWith('Course', $join_behavior);

        return $this->getNewss($query, $con);
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
     * If this Cursus is new, it will return
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
                    ->filterByCursus($this)
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
            $scheduleRemoved->setCursus(null);
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
                    ->filterByCursus($this)
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
     * @return Cursus The current object (for fluent API support)
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
        $schedule->setCursus($this);
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
            $schedule->setCursus(null);
        }
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
     * to the current object by way of the users_cursus cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Cursus is new, it will return
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
                    ->filterByCursus($this)
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
     * to the current object by way of the users_cursus cross-reference table.
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
     * to the current object by way of the users_cursus cross-reference table.
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
                    ->filterByCursus($this)
                    ->count($con);
            }
        } else {
            return count($this->collUsers);
        }
    }

    /**
     * Associate a User object to this object
     * through the users_cursus cross reference table.
     *
     * @param  User $user The UsersCursus object to relate
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
        $usersCursus = new UsersCursus();
        $usersCursus->setUser($user);
        $this->addUsersCursus($usersCursus);
    }

    /**
     * Remove a User object to this object
     * through the users_cursus cross reference table.
     *
     * @param User $user The UsersCursus object to relate
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
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->short_name = null;
        $this->name = null;
        $this->description = null;
        $this->description_isLoaded = false;
        $this->responsable_id = null;
        $this->newsletter_id = null;
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
            if ($this->collUsersCursuss) {
                foreach ($this->collUsersCursuss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCourses) {
                foreach ($this->collCourses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAlerts) {
                foreach ($this->collAlerts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collContents) {
                foreach ($this->collContents as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNewss) {
                foreach ($this->collNewss as $o) {
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
        } // if ($deep)

        if ($this->collUsersCursuss instanceof PropelCollection) {
            $this->collUsersCursuss->clearIterator();
        }
        $this->collUsersCursuss = null;
        if ($this->collCourses instanceof PropelCollection) {
            $this->collCourses->clearIterator();
        }
        $this->collCourses = null;
        if ($this->collAlerts instanceof PropelCollection) {
            $this->collAlerts->clearIterator();
        }
        $this->collAlerts = null;
        if ($this->collContents instanceof PropelCollection) {
            $this->collContents->clearIterator();
        }
        $this->collContents = null;
        if ($this->collNewss instanceof PropelCollection) {
            $this->collNewss->clearIterator();
        }
        $this->collNewss = null;
        if ($this->collSchedules instanceof PropelCollection) {
            $this->collSchedules->clearIterator();
        }
        $this->collSchedules = null;
        if ($this->collUsers instanceof PropelCollection) {
            $this->collUsers->clearIterator();
        }
        $this->collUsers = null;
        $this->aResponsable = null;
        $this->aNewsletter = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CursusPeer::DEFAULT_STRING_FORMAT);
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
