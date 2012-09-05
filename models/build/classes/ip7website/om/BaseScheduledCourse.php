<?php


/**
 * Base class that represents a row from the 'scheduled_courses' table.
 *
 *
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseScheduledCourse extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ScheduledCoursePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ScheduledCoursePeer
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
     * The value for the course_id field.
     * @var        int
     */
    protected $course_id;

    /**
     * The value for the teacher_id field.
     * @var        int
     */
    protected $teacher_id;

    /**
     * The value for the teacher_name field.
     * @var        string
     */
    protected $teacher_name;

    /**
     * The value for the weekday field.
     * @var        int
     */
    protected $weekday;

    /**
     * The value for the beginning field.
     * @var        string
     */
    protected $beginning;

    /**
     * The value for the end field.
     * @var        string
     */
    protected $end;

    /**
     * The value for the place field.
     * @var        string
     */
    protected $place;

    /**
     * @var        Course
     */
    protected $aCourse;

    /**
     * @var        User
     */
    protected $aTeacher;

    /**
     * @var        PropelObjectCollection|SchedulesCourses[] Collection to store aggregation of SchedulesCourses objects.
     */
    protected $collSchedulesCoursess;
    protected $collSchedulesCoursessPartial;

    /**
     * @var        PropelObjectCollection|Schedule[] Collection to store aggregation of Schedule objects.
     */
    protected $collSchedules;

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
    protected $schedulesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $schedulesCoursessScheduledForDeletion = null;

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
     * Get the [course_id] column value.
     *
     * @return int
     */
    public function getCourseId()
    {
        return $this->course_id;
    }

    /**
     * Get the [teacher_id] column value.
     *
     * @return int
     */
    public function getTeacherId()
    {
        return $this->teacher_id;
    }

    /**
     * Get the [teacher_name] column value.
     *
     * @return string
     */
    public function getTeacherName()
    {
        return $this->teacher_name;
    }

    /**
     * Get the [weekday] column value.
     *
     * @return int
     * @throws PropelException - if the stored enum key is unknown.
     */
    public function getWeekday()
    {
        if (null === $this->weekday) {
            return null;
        }
        $valueSet = ScheduledCoursePeer::getValueSet(ScheduledCoursePeer::WEEKDAY);
        if (!isset($valueSet[$this->weekday])) {
            throw new PropelException('Unknown stored enum key: ' . $this->weekday);
        }

        return $valueSet[$this->weekday];
    }

    /**
     * Get the [optionally formatted] temporal [beginning] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBeginning($format = '%X')
    {
        if ($this->beginning === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->beginning);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->beginning, true), $x);
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
     * Get the [optionally formatted] temporal [end] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEnd($format = '%X')
    {
        if ($this->end === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->end);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->end, true), $x);
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
     * Get the [place] column value.
     *
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return ScheduledCourse The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ScheduledCoursePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [course_id] column.
     *
     * @param int $v new value
     * @return ScheduledCourse The current object (for fluent API support)
     */
    public function setCourseId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->course_id !== $v) {
            $this->course_id = $v;
            $this->modifiedColumns[] = ScheduledCoursePeer::COURSE_ID;
        }

        if ($this->aCourse !== null && $this->aCourse->getId() !== $v) {
            $this->aCourse = null;
        }


        return $this;
    } // setCourseId()

    /**
     * Set the value of [teacher_id] column.
     *
     * @param int $v new value
     * @return ScheduledCourse The current object (for fluent API support)
     */
    public function setTeacherId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->teacher_id !== $v) {
            $this->teacher_id = $v;
            $this->modifiedColumns[] = ScheduledCoursePeer::TEACHER_ID;
        }

        if ($this->aTeacher !== null && $this->aTeacher->getId() !== $v) {
            $this->aTeacher = null;
        }


        return $this;
    } // setTeacherId()

    /**
     * Set the value of [teacher_name] column.
     *
     * @param string $v new value
     * @return ScheduledCourse The current object (for fluent API support)
     */
    public function setTeacherName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->teacher_name !== $v) {
            $this->teacher_name = $v;
            $this->modifiedColumns[] = ScheduledCoursePeer::TEACHER_NAME;
        }


        return $this;
    } // setTeacherName()

    /**
     * Set the value of [weekday] column.
     *
     * @param int $v new value
     * @return ScheduledCourse The current object (for fluent API support)
     * @throws PropelException - if the value is not accepted by this enum.
     */
    public function setWeekday($v)
    {
        if ($v !== null) {
            $valueSet = ScheduledCoursePeer::getValueSet(ScheduledCoursePeer::WEEKDAY);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->weekday !== $v) {
            $this->weekday = $v;
            $this->modifiedColumns[] = ScheduledCoursePeer::WEEKDAY;
        }


        return $this;
    } // setWeekday()

    /**
     * Sets the value of [beginning] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ScheduledCourse The current object (for fluent API support)
     */
    public function setBeginning($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->beginning !== null || $dt !== null) {
            $currentDateAsString = ($this->beginning !== null && $tmpDt = new DateTime($this->beginning)) ? $tmpDt->format('H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->beginning = $newDateAsString;
                $this->modifiedColumns[] = ScheduledCoursePeer::BEGINNING;
            }
        } // if either are not null


        return $this;
    } // setBeginning()

    /**
     * Sets the value of [end] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ScheduledCourse The current object (for fluent API support)
     */
    public function setEnd($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->end !== null || $dt !== null) {
            $currentDateAsString = ($this->end !== null && $tmpDt = new DateTime($this->end)) ? $tmpDt->format('H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->end = $newDateAsString;
                $this->modifiedColumns[] = ScheduledCoursePeer::END;
            }
        } // if either are not null


        return $this;
    } // setEnd()

    /**
     * Set the value of [place] column.
     *
     * @param string $v new value
     * @return ScheduledCourse The current object (for fluent API support)
     */
    public function setPlace($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->place !== $v) {
            $this->place = $v;
            $this->modifiedColumns[] = ScheduledCoursePeer::PLACE;
        }


        return $this;
    } // setPlace()

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
            $this->course_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->teacher_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->teacher_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->weekday = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->beginning = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->end = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->place = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 8; // 8 = ScheduledCoursePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ScheduledCourse object", $e);
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

        if ($this->aCourse !== null && $this->course_id !== $this->aCourse->getId()) {
            $this->aCourse = null;
        }
        if ($this->aTeacher !== null && $this->teacher_id !== $this->aTeacher->getId()) {
            $this->aTeacher = null;
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
            $con = Propel::getConnection(ScheduledCoursePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ScheduledCoursePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCourse = null;
            $this->aTeacher = null;
            $this->collSchedulesCoursess = null;

            $this->collSchedules = null;
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
            $con = Propel::getConnection(ScheduledCoursePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ScheduledCourseQuery::create()
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
            $con = Propel::getConnection(ScheduledCoursePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ScheduledCoursePeer::addInstanceToPool($this);
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

            if ($this->aCourse !== null) {
                if ($this->aCourse->isModified() || $this->aCourse->isNew()) {
                    $affectedRows += $this->aCourse->save($con);
                }
                $this->setCourse($this->aCourse);
            }

            if ($this->aTeacher !== null) {
                if ($this->aTeacher->isModified() || $this->aTeacher->isNew()) {
                    $affectedRows += $this->aTeacher->save($con);
                }
                $this->setTeacher($this->aTeacher);
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

            if ($this->schedulesScheduledForDeletion !== null) {
                if (!$this->schedulesScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->schedulesScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($remotePk, $pk);
                    }
                    SchedulesCoursesQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->schedulesScheduledForDeletion = null;
                }

                foreach ($this->getSchedules() as $schedule) {
                    if ($schedule->isModified()) {
                        $schedule->save($con);
                    }
                }
            }

            if ($this->schedulesCoursessScheduledForDeletion !== null) {
                if (!$this->schedulesCoursessScheduledForDeletion->isEmpty()) {
                    SchedulesCoursesQuery::create()
                        ->filterByPrimaryKeys($this->schedulesCoursessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->schedulesCoursessScheduledForDeletion = null;
                }
            }

            if ($this->collSchedulesCoursess !== null) {
                foreach ($this->collSchedulesCoursess as $referrerFK) {
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

        $this->modifiedColumns[] = ScheduledCoursePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ScheduledCoursePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ScheduledCoursePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(ScheduledCoursePeer::COURSE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`COURSE_ID`';
        }
        if ($this->isColumnModified(ScheduledCoursePeer::TEACHER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`TEACHER_ID`';
        }
        if ($this->isColumnModified(ScheduledCoursePeer::TEACHER_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`TEACHER_NAME`';
        }
        if ($this->isColumnModified(ScheduledCoursePeer::WEEKDAY)) {
            $modifiedColumns[':p' . $index++]  = '`WEEKDAY`';
        }
        if ($this->isColumnModified(ScheduledCoursePeer::BEGINNING)) {
            $modifiedColumns[':p' . $index++]  = '`BEGINNING`';
        }
        if ($this->isColumnModified(ScheduledCoursePeer::END)) {
            $modifiedColumns[':p' . $index++]  = '`END`';
        }
        if ($this->isColumnModified(ScheduledCoursePeer::PLACE)) {
            $modifiedColumns[':p' . $index++]  = '`PLACE`';
        }

        $sql = sprintf(
            'INSERT INTO `scheduled_courses` (%s) VALUES (%s)',
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
                    case '`COURSE_ID`':
                        $stmt->bindValue($identifier, $this->course_id, PDO::PARAM_INT);
                        break;
                    case '`TEACHER_ID`':
                        $stmt->bindValue($identifier, $this->teacher_id, PDO::PARAM_INT);
                        break;
                    case '`TEACHER_NAME`':
                        $stmt->bindValue($identifier, $this->teacher_name, PDO::PARAM_STR);
                        break;
                    case '`WEEKDAY`':
                        $stmt->bindValue($identifier, $this->weekday, PDO::PARAM_INT);
                        break;
                    case '`BEGINNING`':
                        $stmt->bindValue($identifier, $this->beginning, PDO::PARAM_STR);
                        break;
                    case '`END`':
                        $stmt->bindValue($identifier, $this->end, PDO::PARAM_STR);
                        break;
                    case '`PLACE`':
                        $stmt->bindValue($identifier, $this->place, PDO::PARAM_STR);
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

            if ($this->aCourse !== null) {
                if (!$this->aCourse->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCourse->getValidationFailures());
                }
            }

            if ($this->aTeacher !== null) {
                if (!$this->aTeacher->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTeacher->getValidationFailures());
                }
            }


            if (($retval = ScheduledCoursePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSchedulesCoursess !== null) {
                    foreach ($this->collSchedulesCoursess as $referrerFK) {
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
        $pos = ScheduledCoursePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getCourseId();
                break;
            case 2:
                return $this->getTeacherId();
                break;
            case 3:
                return $this->getTeacherName();
                break;
            case 4:
                return $this->getWeekday();
                break;
            case 5:
                return $this->getBeginning();
                break;
            case 6:
                return $this->getEnd();
                break;
            case 7:
                return $this->getPlace();
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
        if (isset($alreadyDumpedObjects['ScheduledCourse'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ScheduledCourse'][$this->getPrimaryKey()] = true;
        $keys = ScheduledCoursePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCourseId(),
            $keys[2] => $this->getTeacherId(),
            $keys[3] => $this->getTeacherName(),
            $keys[4] => $this->getWeekday(),
            $keys[5] => $this->getBeginning(),
            $keys[6] => $this->getEnd(),
            $keys[7] => $this->getPlace(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aCourse) {
                $result['Course'] = $this->aCourse->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTeacher) {
                $result['Teacher'] = $this->aTeacher->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSchedulesCoursess) {
                $result['SchedulesCoursess'] = $this->collSchedulesCoursess->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ScheduledCoursePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setCourseId($value);
                break;
            case 2:
                $this->setTeacherId($value);
                break;
            case 3:
                $this->setTeacherName($value);
                break;
            case 4:
                $valueSet = ScheduledCoursePeer::getValueSet(ScheduledCoursePeer::WEEKDAY);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setWeekday($value);
                break;
            case 5:
                $this->setBeginning($value);
                break;
            case 6:
                $this->setEnd($value);
                break;
            case 7:
                $this->setPlace($value);
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
        $keys = ScheduledCoursePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCourseId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTeacherId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setTeacherName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setWeekday($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setBeginning($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setEnd($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPlace($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ScheduledCoursePeer::DATABASE_NAME);

        if ($this->isColumnModified(ScheduledCoursePeer::ID)) $criteria->add(ScheduledCoursePeer::ID, $this->id);
        if ($this->isColumnModified(ScheduledCoursePeer::COURSE_ID)) $criteria->add(ScheduledCoursePeer::COURSE_ID, $this->course_id);
        if ($this->isColumnModified(ScheduledCoursePeer::TEACHER_ID)) $criteria->add(ScheduledCoursePeer::TEACHER_ID, $this->teacher_id);
        if ($this->isColumnModified(ScheduledCoursePeer::TEACHER_NAME)) $criteria->add(ScheduledCoursePeer::TEACHER_NAME, $this->teacher_name);
        if ($this->isColumnModified(ScheduledCoursePeer::WEEKDAY)) $criteria->add(ScheduledCoursePeer::WEEKDAY, $this->weekday);
        if ($this->isColumnModified(ScheduledCoursePeer::BEGINNING)) $criteria->add(ScheduledCoursePeer::BEGINNING, $this->beginning);
        if ($this->isColumnModified(ScheduledCoursePeer::END)) $criteria->add(ScheduledCoursePeer::END, $this->end);
        if ($this->isColumnModified(ScheduledCoursePeer::PLACE)) $criteria->add(ScheduledCoursePeer::PLACE, $this->place);

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
        $criteria = new Criteria(ScheduledCoursePeer::DATABASE_NAME);
        $criteria->add(ScheduledCoursePeer::ID, $this->id);

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
     * @param object $copyObj An object of ScheduledCourse (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCourseId($this->getCourseId());
        $copyObj->setTeacherId($this->getTeacherId());
        $copyObj->setTeacherName($this->getTeacherName());
        $copyObj->setWeekday($this->getWeekday());
        $copyObj->setBeginning($this->getBeginning());
        $copyObj->setEnd($this->getEnd());
        $copyObj->setPlace($this->getPlace());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getSchedulesCoursess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSchedulesCourses($relObj->copy($deepCopy));
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
     * @return ScheduledCourse Clone of current object.
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
     * @return ScheduledCoursePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ScheduledCoursePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Course object.
     *
     * @param             Course $v
     * @return ScheduledCourse The current object (for fluent API support)
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
            $v->addScheduledCourse($this);
        }


        return $this;
    }


    /**
     * Get the associated Course object
     *
     * @param PropelPDO $con Optional Connection object.
     * @return Course The associated Course object.
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
                $this->aCourse->addScheduledCourses($this);
             */
        }

        return $this->aCourse;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param             User $v
     * @return ScheduledCourse The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTeacher(User $v = null)
    {
        if ($v === null) {
            $this->setTeacherId(NULL);
        } else {
            $this->setTeacherId($v->getId());
        }

        $this->aTeacher = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the User object, it will not be re-added.
        if ($v !== null) {
            $v->addScheduledCourse($this);
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
    public function getTeacher(PropelPDO $con = null)
    {
        if ($this->aTeacher === null && ($this->teacher_id !== null)) {
            $this->aTeacher = UserQuery::create()->findPk($this->teacher_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTeacher->addScheduledCourses($this);
             */
        }

        return $this->aTeacher;
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
        if ('SchedulesCourses' == $relationName) {
            $this->initSchedulesCoursess();
        }
    }

    /**
     * Clears out the collSchedulesCoursess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSchedulesCoursess()
     */
    public function clearSchedulesCoursess()
    {
        $this->collSchedulesCoursess = null; // important to set this to null since that means it is uninitialized
        $this->collSchedulesCoursessPartial = null;
    }

    /**
     * reset is the collSchedulesCoursess collection loaded partially
     *
     * @return void
     */
    public function resetPartialSchedulesCoursess($v = true)
    {
        $this->collSchedulesCoursessPartial = $v;
    }

    /**
     * Initializes the collSchedulesCoursess collection.
     *
     * By default this just sets the collSchedulesCoursess collection to an empty array (like clearcollSchedulesCoursess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSchedulesCoursess($overrideExisting = true)
    {
        if (null !== $this->collSchedulesCoursess && !$overrideExisting) {
            return;
        }
        $this->collSchedulesCoursess = new PropelObjectCollection();
        $this->collSchedulesCoursess->setModel('SchedulesCourses');
    }

    /**
     * Gets an array of SchedulesCourses objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ScheduledCourse is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SchedulesCourses[] List of SchedulesCourses objects
     * @throws PropelException
     */
    public function getSchedulesCoursess($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSchedulesCoursessPartial && !$this->isNew();
        if (null === $this->collSchedulesCoursess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSchedulesCoursess) {
                // return empty collection
                $this->initSchedulesCoursess();
            } else {
                $collSchedulesCoursess = SchedulesCoursesQuery::create(null, $criteria)
                    ->filterByScheduledCourse($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSchedulesCoursessPartial && count($collSchedulesCoursess)) {
                      $this->initSchedulesCoursess(false);

                      foreach($collSchedulesCoursess as $obj) {
                        if (false == $this->collSchedulesCoursess->contains($obj)) {
                          $this->collSchedulesCoursess->append($obj);
                        }
                      }

                      $this->collSchedulesCoursessPartial = true;
                    }

                    return $collSchedulesCoursess;
                }

                if($partial && $this->collSchedulesCoursess) {
                    foreach($this->collSchedulesCoursess as $obj) {
                        if($obj->isNew()) {
                            $collSchedulesCoursess[] = $obj;
                        }
                    }
                }

                $this->collSchedulesCoursess = $collSchedulesCoursess;
                $this->collSchedulesCoursessPartial = false;
            }
        }

        return $this->collSchedulesCoursess;
    }

    /**
     * Sets a collection of SchedulesCourses objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $schedulesCoursess A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setSchedulesCoursess(PropelCollection $schedulesCoursess, PropelPDO $con = null)
    {
        $this->schedulesCoursessScheduledForDeletion = $this->getSchedulesCoursess(new Criteria(), $con)->diff($schedulesCoursess);

        foreach ($this->schedulesCoursessScheduledForDeletion as $schedulesCoursesRemoved) {
            $schedulesCoursesRemoved->setScheduledCourse(null);
        }

        $this->collSchedulesCoursess = null;
        foreach ($schedulesCoursess as $schedulesCourses) {
            $this->addSchedulesCourses($schedulesCourses);
        }

        $this->collSchedulesCoursess = $schedulesCoursess;
        $this->collSchedulesCoursessPartial = false;
    }

    /**
     * Returns the number of related SchedulesCourses objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SchedulesCourses objects.
     * @throws PropelException
     */
    public function countSchedulesCoursess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSchedulesCoursessPartial && !$this->isNew();
        if (null === $this->collSchedulesCoursess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSchedulesCoursess) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getSchedulesCoursess());
                }
                $query = SchedulesCoursesQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByScheduledCourse($this)
                    ->count($con);
            }
        } else {
            return count($this->collSchedulesCoursess);
        }
    }

    /**
     * Method called to associate a SchedulesCourses object to this object
     * through the SchedulesCourses foreign key attribute.
     *
     * @param    SchedulesCourses $l SchedulesCourses
     * @return ScheduledCourse The current object (for fluent API support)
     */
    public function addSchedulesCourses(SchedulesCourses $l)
    {
        if ($this->collSchedulesCoursess === null) {
            $this->initSchedulesCoursess();
            $this->collSchedulesCoursessPartial = true;
        }
        if (!$this->collSchedulesCoursess->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddSchedulesCourses($l);
        }

        return $this;
    }

    /**
     * @param	SchedulesCourses $schedulesCourses The schedulesCourses object to add.
     */
    protected function doAddSchedulesCourses($schedulesCourses)
    {
        $this->collSchedulesCoursess[]= $schedulesCourses;
        $schedulesCourses->setScheduledCourse($this);
    }

    /**
     * @param	SchedulesCourses $schedulesCourses The schedulesCourses object to remove.
     */
    public function removeSchedulesCourses($schedulesCourses)
    {
        if ($this->getSchedulesCoursess()->contains($schedulesCourses)) {
            $this->collSchedulesCoursess->remove($this->collSchedulesCoursess->search($schedulesCourses));
            if (null === $this->schedulesCoursessScheduledForDeletion) {
                $this->schedulesCoursessScheduledForDeletion = clone $this->collSchedulesCoursess;
                $this->schedulesCoursessScheduledForDeletion->clear();
            }
            $this->schedulesCoursessScheduledForDeletion[]= $schedulesCourses;
            $schedulesCourses->setScheduledCourse(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this ScheduledCourse is new, it will return
     * an empty collection; or if this ScheduledCourse has previously
     * been saved, it will retrieve related SchedulesCoursess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in ScheduledCourse.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SchedulesCourses[] List of SchedulesCourses objects
     */
    public function getSchedulesCoursessJoinSchedule($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SchedulesCoursesQuery::create(null, $criteria);
        $query->joinWith('Schedule', $join_behavior);

        return $this->getSchedulesCoursess($query, $con);
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
     * Initializes the collSchedules collection.
     *
     * By default this just sets the collSchedules collection to an empty collection (like clearSchedules());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initSchedules()
    {
        $this->collSchedules = new PropelObjectCollection();
        $this->collSchedules->setModel('Schedule');
    }

    /**
     * Gets a collection of Schedule objects related by a many-to-many relationship
     * to the current object by way of the schedules_courses cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ScheduledCourse is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|Schedule[] List of Schedule objects
     */
    public function getSchedules($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collSchedules || null !== $criteria) {
            if ($this->isNew() && null === $this->collSchedules) {
                // return empty collection
                $this->initSchedules();
            } else {
                $collSchedules = ScheduleQuery::create(null, $criteria)
                    ->filterByScheduledCourse($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collSchedules;
                }
                $this->collSchedules = $collSchedules;
            }
        }

        return $this->collSchedules;
    }

    /**
     * Sets a collection of Schedule objects related by a many-to-many relationship
     * to the current object by way of the schedules_courses cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $schedules A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setSchedules(PropelCollection $schedules, PropelPDO $con = null)
    {
        $this->clearSchedules();
        $currentSchedules = $this->getSchedules();

        $this->schedulesScheduledForDeletion = $currentSchedules->diff($schedules);

        foreach ($schedules as $schedule) {
            if (!$currentSchedules->contains($schedule)) {
                $this->doAddSchedule($schedule);
            }
        }

        $this->collSchedules = $schedules;
    }

    /**
     * Gets the number of Schedule objects related by a many-to-many relationship
     * to the current object by way of the schedules_courses cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related Schedule objects
     */
    public function countSchedules($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collSchedules || null !== $criteria) {
            if ($this->isNew() && null === $this->collSchedules) {
                return 0;
            } else {
                $query = ScheduleQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByScheduledCourse($this)
                    ->count($con);
            }
        } else {
            return count($this->collSchedules);
        }
    }

    /**
     * Associate a Schedule object to this object
     * through the schedules_courses cross reference table.
     *
     * @param  Schedule $schedule The SchedulesCourses object to relate
     * @return void
     */
    public function addSchedule(Schedule $schedule)
    {
        if ($this->collSchedules === null) {
            $this->initSchedules();
        }
        if (!$this->collSchedules->contains($schedule)) { // only add it if the **same** object is not already associated
            $this->doAddSchedule($schedule);

            $this->collSchedules[]= $schedule;
        }
    }

    /**
     * @param	Schedule $schedule The schedule object to add.
     */
    protected function doAddSchedule($schedule)
    {
        $schedulesCourses = new SchedulesCourses();
        $schedulesCourses->setSchedule($schedule);
        $this->addSchedulesCourses($schedulesCourses);
    }

    /**
     * Remove a Schedule object to this object
     * through the schedules_courses cross reference table.
     *
     * @param Schedule $schedule The SchedulesCourses object to relate
     * @return void
     */
    public function removeSchedule(Schedule $schedule)
    {
        if ($this->getSchedules()->contains($schedule)) {
            $this->collSchedules->remove($this->collSchedules->search($schedule));
            if (null === $this->schedulesScheduledForDeletion) {
                $this->schedulesScheduledForDeletion = clone $this->collSchedules;
                $this->schedulesScheduledForDeletion->clear();
            }
            $this->schedulesScheduledForDeletion[]= $schedule;
        }
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->course_id = null;
        $this->teacher_id = null;
        $this->teacher_name = null;
        $this->weekday = null;
        $this->beginning = null;
        $this->end = null;
        $this->place = null;
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
            if ($this->collSchedulesCoursess) {
                foreach ($this->collSchedulesCoursess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSchedules) {
                foreach ($this->collSchedules as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collSchedulesCoursess instanceof PropelCollection) {
            $this->collSchedulesCoursess->clearIterator();
        }
        $this->collSchedulesCoursess = null;
        if ($this->collSchedules instanceof PropelCollection) {
            $this->collSchedules->clearIterator();
        }
        $this->collSchedules = null;
        $this->aCourse = null;
        $this->aTeacher = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ScheduledCoursePeer::DEFAULT_STRING_FORMAT);
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
