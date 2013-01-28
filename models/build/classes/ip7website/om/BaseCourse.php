<?php


/**
 * Base class that represents a row from the 'courses' table.
 *
 *
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseCourse extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CoursePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        CoursePeer
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
     * The value for the cursus_id field.
     * @var        int
     */
    protected $cursus_id;

    /**
     * The value for the semester field.
     * Note: this column has a database default value of: (expression) 0
     * @var        int
     */
    protected $semester;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the short_name field.
     * @var        string
     */
    protected $short_name;

    /**
     * The value for the ects field.
     * Note: this column has a database default value of: (expression) 3
     * @var        double
     */
    protected $ects;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the use_latex field.
     * Note: this column has a database default value of: (expression) 0
     * @var        boolean
     */
    protected $use_latex;

    /**
     * The value for the use_sourcecode field.
     * Note: this column has a database default value of: (expression) 1
     * @var        boolean
     */
    protected $use_sourcecode;

    /**
     * The value for the deleted field.
     * Note: this column has a database default value of: (expression) 0
     * @var        boolean
     */
    protected $deleted;

    /**
     * @var        Cursus
     */
    protected $aCursus;

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
     * @var        PropelObjectCollection|Content[] Collection to store aggregation of Content objects.
     */
    protected $collContents;
    protected $collContentsPartial;

    /**
     * @var        PropelObjectCollection|Note[] Collection to store aggregation of Note objects.
     */
    protected $collNotes;
    protected $collNotesPartial;

    /**
     * @var        PropelObjectCollection|News[] Collection to store aggregation of News objects.
     */
    protected $collNewss;
    protected $collNewssPartial;

    /**
     * @var        PropelObjectCollection|Exam[] Collection to store aggregation of Exam objects.
     */
    protected $collExams;
    protected $collExamsPartial;

    /**
     * @var        PropelObjectCollection|ScheduledCourse[] Collection to store aggregation of ScheduledCourse objects.
     */
    protected $collScheduledCourses;
    protected $collScheduledCoursesPartial;

    /**
     * @var        PropelObjectCollection|EducationalPath[] Collection to store aggregation of EducationalPath objects.
     */
    protected $collOptionalEducationalPaths;

    /**
     * @var        PropelObjectCollection|EducationalPath[] Collection to store aggregation of EducationalPath objects.
     */
    protected $collMandatoryEducationalPaths;

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
    protected $optionalEducationalPathsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mandatoryEducationalPathsScheduledForDeletion = null;

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
    protected $contentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $notesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $newssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $examsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $scheduledCoursesScheduledForDeletion = null;

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
     * Initializes internal state of BaseCourse object.
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
     * Get the [cursus_id] column value.
     *
     * @return int
     */
    public function getCursusId()
    {
        return $this->cursus_id;
    }

    /**
     * Get the [semester] column value.
     *
     * @return int
     */
    public function getSemester()
    {
        return $this->semester;
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
     * Get the [short_name] column value.
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->short_name;
    }

    /**
     * Get the [ects] column value.
     *
     * @return double
     */
    public function getEcts()
    {
        return $this->ects;
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
     * Get the [use_latex] column value.
     *
     * @return boolean
     */
    public function getUseLatex()
    {
        return $this->use_latex;
    }

    /**
     * Get the [use_sourcecode] column value.
     *
     * @return boolean
     */
    public function getUseSourcecode()
    {
        return $this->use_sourcecode;
    }

    /**
     * Get the [deleted] column value.
     *
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Course The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = CoursePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [cursus_id] column.
     *
     * @param int $v new value
     * @return Course The current object (for fluent API support)
     */
    public function setCursusId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cursus_id !== $v) {
            $this->cursus_id = $v;
            $this->modifiedColumns[] = CoursePeer::CURSUS_ID;
        }

        if ($this->aCursus !== null && $this->aCursus->getId() !== $v) {
            $this->aCursus = null;
        }


        return $this;
    } // setCursusId()

    /**
     * Set the value of [semester] column.
     *
     * @param int $v new value
     * @return Course The current object (for fluent API support)
     */
    public function setSemester($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->semester !== $v) {
            $this->semester = $v;
            $this->modifiedColumns[] = CoursePeer::SEMESTER;
        }


        return $this;
    } // setSemester()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Course The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = CoursePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [short_name] column.
     *
     * @param string $v new value
     * @return Course The current object (for fluent API support)
     */
    public function setShortName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->short_name !== $v) {
            $this->short_name = $v;
            $this->modifiedColumns[] = CoursePeer::SHORT_NAME;
        }


        return $this;
    } // setShortName()

    /**
     * Set the value of [ects] column.
     *
     * @param double $v new value
     * @return Course The current object (for fluent API support)
     */
    public function setEcts($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->ects !== $v) {
            $this->ects = $v;
            $this->modifiedColumns[] = CoursePeer::ECTS;
        }


        return $this;
    } // setEcts()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Course The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = CoursePeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Sets the value of the [use_latex] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Course The current object (for fluent API support)
     */
    public function setUseLatex($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->use_latex !== $v) {
            $this->use_latex = $v;
            $this->modifiedColumns[] = CoursePeer::USE_LATEX;
        }


        return $this;
    } // setUseLatex()

    /**
     * Sets the value of the [use_sourcecode] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Course The current object (for fluent API support)
     */
    public function setUseSourcecode($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->use_sourcecode !== $v) {
            $this->use_sourcecode = $v;
            $this->modifiedColumns[] = CoursePeer::USE_SOURCECODE;
        }


        return $this;
    } // setUseSourcecode()

    /**
     * Sets the value of the [deleted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Course The current object (for fluent API support)
     */
    public function setDeleted($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->deleted !== $v) {
            $this->deleted = $v;
            $this->modifiedColumns[] = CoursePeer::DELETED;
        }


        return $this;
    } // setDeleted()

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
            $this->cursus_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->semester = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->short_name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->ects = ($row[$startcol + 5] !== null) ? (double) $row[$startcol + 5] : null;
            $this->description = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->use_latex = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
            $this->use_sourcecode = ($row[$startcol + 8] !== null) ? (boolean) $row[$startcol + 8] : null;
            $this->deleted = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 10; // 10 = CoursePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Course object", $e);
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
            $con = Propel::getConnection(CoursePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = CoursePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCursus = null;
            $this->collEducationalPathsOptionalCoursess = null;

            $this->collEducationalPathsMandatoryCoursess = null;

            $this->collContents = null;

            $this->collNotes = null;

            $this->collNewss = null;

            $this->collExams = null;

            $this->collScheduledCourses = null;

            $this->collOptionalEducationalPaths = null;
            $this->collMandatoryEducationalPaths = null;
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
            $con = Propel::getConnection(CoursePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = CourseQuery::create()
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
            $con = Propel::getConnection(CoursePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                CoursePeer::addInstanceToPool($this);
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

            if ($this->optionalEducationalPathsScheduledForDeletion !== null) {
                if (!$this->optionalEducationalPathsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->optionalEducationalPathsScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($pk, $remotePk);
                    }
                    EducationalPathsOptionalCoursesQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->optionalEducationalPathsScheduledForDeletion = null;
                }

                foreach ($this->getOptionalEducationalPaths() as $optionalEducationalPath) {
                    if ($optionalEducationalPath->isModified()) {
                        $optionalEducationalPath->save($con);
                    }
                }
            }

            if ($this->mandatoryEducationalPathsScheduledForDeletion !== null) {
                if (!$this->mandatoryEducationalPathsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->mandatoryEducationalPathsScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($pk, $remotePk);
                    }
                    EducationalPathsMandatoryCoursesQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->mandatoryEducationalPathsScheduledForDeletion = null;
                }

                foreach ($this->getMandatoryEducationalPaths() as $mandatoryEducationalPath) {
                    if ($mandatoryEducationalPath->isModified()) {
                        $mandatoryEducationalPath->save($con);
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

            if ($this->notesScheduledForDeletion !== null) {
                if (!$this->notesScheduledForDeletion->isEmpty()) {
                    NoteQuery::create()
                        ->filterByPrimaryKeys($this->notesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->notesScheduledForDeletion = null;
                }
            }

            if ($this->collNotes !== null) {
                foreach ($this->collNotes as $referrerFK) {
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

            if ($this->examsScheduledForDeletion !== null) {
                if (!$this->examsScheduledForDeletion->isEmpty()) {
                    ExamQuery::create()
                        ->filterByPrimaryKeys($this->examsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->examsScheduledForDeletion = null;
                }
            }

            if ($this->collExams !== null) {
                foreach ($this->collExams as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->scheduledCoursesScheduledForDeletion !== null) {
                if (!$this->scheduledCoursesScheduledForDeletion->isEmpty()) {
                    ScheduledCourseQuery::create()
                        ->filterByPrimaryKeys($this->scheduledCoursesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->scheduledCoursesScheduledForDeletion = null;
                }
            }

            if ($this->collScheduledCourses !== null) {
                foreach ($this->collScheduledCourses as $referrerFK) {
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

        $this->modifiedColumns[] = CoursePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CoursePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CoursePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(CoursePeer::CURSUS_ID)) {
            $modifiedColumns[':p' . $index++]  = '`CURSUS_ID`';
        }
        if ($this->isColumnModified(CoursePeer::SEMESTER)) {
            $modifiedColumns[':p' . $index++]  = '`SEMESTER`';
        }
        if ($this->isColumnModified(CoursePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`NAME`';
        }
        if ($this->isColumnModified(CoursePeer::SHORT_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`SHORT_NAME`';
        }
        if ($this->isColumnModified(CoursePeer::ECTS)) {
            $modifiedColumns[':p' . $index++]  = '`ECTS`';
        }
        if ($this->isColumnModified(CoursePeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }
        if ($this->isColumnModified(CoursePeer::USE_LATEX)) {
            $modifiedColumns[':p' . $index++]  = '`USE_LATEX`';
        }
        if ($this->isColumnModified(CoursePeer::USE_SOURCECODE)) {
            $modifiedColumns[':p' . $index++]  = '`USE_SOURCECODE`';
        }
        if ($this->isColumnModified(CoursePeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`DELETED`';
        }

        $sql = sprintf(
            'INSERT INTO `courses` (%s) VALUES (%s)',
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
                    case '`CURSUS_ID`':
                        $stmt->bindValue($identifier, $this->cursus_id, PDO::PARAM_INT);
                        break;
                    case '`SEMESTER`':
                        $stmt->bindValue($identifier, $this->semester, PDO::PARAM_INT);
                        break;
                    case '`NAME`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`SHORT_NAME`':
                        $stmt->bindValue($identifier, $this->short_name, PDO::PARAM_STR);
                        break;
                    case '`ECTS`':
                        $stmt->bindValue($identifier, $this->ects, PDO::PARAM_STR);
                        break;
                    case '`DESCRIPTION`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`USE_LATEX`':
                        $stmt->bindValue($identifier, (int) $this->use_latex, PDO::PARAM_INT);
                        break;
                    case '`USE_SOURCECODE`':
                        $stmt->bindValue($identifier, (int) $this->use_sourcecode, PDO::PARAM_INT);
                        break;
                    case '`DELETED`':
                        $stmt->bindValue($identifier, (int) $this->deleted, PDO::PARAM_INT);
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


            if (($retval = CoursePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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

                if ($this->collContents !== null) {
                    foreach ($this->collContents as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collNotes !== null) {
                    foreach ($this->collNotes as $referrerFK) {
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

                if ($this->collExams !== null) {
                    foreach ($this->collExams as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collScheduledCourses !== null) {
                    foreach ($this->collScheduledCourses as $referrerFK) {
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
        $pos = CoursePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getCursusId();
                break;
            case 2:
                return $this->getSemester();
                break;
            case 3:
                return $this->getName();
                break;
            case 4:
                return $this->getShortName();
                break;
            case 5:
                return $this->getEcts();
                break;
            case 6:
                return $this->getDescription();
                break;
            case 7:
                return $this->getUseLatex();
                break;
            case 8:
                return $this->getUseSourcecode();
                break;
            case 9:
                return $this->getDeleted();
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
        if (isset($alreadyDumpedObjects['Course'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Course'][$this->getPrimaryKey()] = true;
        $keys = CoursePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCursusId(),
            $keys[2] => $this->getSemester(),
            $keys[3] => $this->getName(),
            $keys[4] => $this->getShortName(),
            $keys[5] => $this->getEcts(),
            $keys[6] => $this->getDescription(),
            $keys[7] => $this->getUseLatex(),
            $keys[8] => $this->getUseSourcecode(),
            $keys[9] => $this->getDeleted(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aCursus) {
                $result['Cursus'] = $this->aCursus->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collEducationalPathsOptionalCoursess) {
                $result['EducationalPathsOptionalCoursess'] = $this->collEducationalPathsOptionalCoursess->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEducationalPathsMandatoryCoursess) {
                $result['EducationalPathsMandatoryCoursess'] = $this->collEducationalPathsMandatoryCoursess->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collContents) {
                $result['Contents'] = $this->collContents->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNotes) {
                $result['Notes'] = $this->collNotes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNewss) {
                $result['Newss'] = $this->collNewss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExams) {
                $result['Exams'] = $this->collExams->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collScheduledCourses) {
                $result['ScheduledCourses'] = $this->collScheduledCourses->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = CoursePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setCursusId($value);
                break;
            case 2:
                $this->setSemester($value);
                break;
            case 3:
                $this->setName($value);
                break;
            case 4:
                $this->setShortName($value);
                break;
            case 5:
                $this->setEcts($value);
                break;
            case 6:
                $this->setDescription($value);
                break;
            case 7:
                $this->setUseLatex($value);
                break;
            case 8:
                $this->setUseSourcecode($value);
                break;
            case 9:
                $this->setDeleted($value);
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
        $keys = CoursePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCursusId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSemester($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setShortName($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setEcts($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDescription($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setUseLatex($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setUseSourcecode($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setDeleted($arr[$keys[9]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CoursePeer::DATABASE_NAME);

        if ($this->isColumnModified(CoursePeer::ID)) $criteria->add(CoursePeer::ID, $this->id);
        if ($this->isColumnModified(CoursePeer::CURSUS_ID)) $criteria->add(CoursePeer::CURSUS_ID, $this->cursus_id);
        if ($this->isColumnModified(CoursePeer::SEMESTER)) $criteria->add(CoursePeer::SEMESTER, $this->semester);
        if ($this->isColumnModified(CoursePeer::NAME)) $criteria->add(CoursePeer::NAME, $this->name);
        if ($this->isColumnModified(CoursePeer::SHORT_NAME)) $criteria->add(CoursePeer::SHORT_NAME, $this->short_name);
        if ($this->isColumnModified(CoursePeer::ECTS)) $criteria->add(CoursePeer::ECTS, $this->ects);
        if ($this->isColumnModified(CoursePeer::DESCRIPTION)) $criteria->add(CoursePeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(CoursePeer::USE_LATEX)) $criteria->add(CoursePeer::USE_LATEX, $this->use_latex);
        if ($this->isColumnModified(CoursePeer::USE_SOURCECODE)) $criteria->add(CoursePeer::USE_SOURCECODE, $this->use_sourcecode);
        if ($this->isColumnModified(CoursePeer::DELETED)) $criteria->add(CoursePeer::DELETED, $this->deleted);

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
        $criteria = new Criteria(CoursePeer::DATABASE_NAME);
        $criteria->add(CoursePeer::ID, $this->id);

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
     * @param object $copyObj An object of Course (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCursusId($this->getCursusId());
        $copyObj->setSemester($this->getSemester());
        $copyObj->setName($this->getName());
        $copyObj->setShortName($this->getShortName());
        $copyObj->setEcts($this->getEcts());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setUseLatex($this->getUseLatex());
        $copyObj->setUseSourcecode($this->getUseSourcecode());
        $copyObj->setDeleted($this->getDeleted());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

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

            foreach ($this->getContents() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addContent($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNotes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNote($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNewss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNews($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExams() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExam($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getScheduledCourses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addScheduledCourse($relObj->copy($deepCopy));
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
     * @return Course Clone of current object.
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
     * @return CoursePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new CoursePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Cursus object.
     *
     * @param             Cursus $v
     * @return Course The current object (for fluent API support)
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
            $v->addCourse($this);
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
                $this->aCursus->addCourses($this);
             */
        }

        return $this->aCursus;
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
        if ('EducationalPathsOptionalCourses' == $relationName) {
            $this->initEducationalPathsOptionalCoursess();
        }
        if ('EducationalPathsMandatoryCourses' == $relationName) {
            $this->initEducationalPathsMandatoryCoursess();
        }
        if ('Content' == $relationName) {
            $this->initContents();
        }
        if ('Note' == $relationName) {
            $this->initNotes();
        }
        if ('News' == $relationName) {
            $this->initNewss();
        }
        if ('Exam' == $relationName) {
            $this->initExams();
        }
        if ('ScheduledCourse' == $relationName) {
            $this->initScheduledCourses();
        }
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
     * If this Course is new, it will return
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
                    ->filterByOptionalCourse($this)
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
            $educationalPathsOptionalCoursesRemoved->setOptionalCourse(null);
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
                    ->filterByOptionalCourse($this)
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
     * @return Course The current object (for fluent API support)
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
        $educationalPathsOptionalCourses->setOptionalCourse($this);
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
            $educationalPathsOptionalCourses->setOptionalCourse(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Course is new, it will return
     * an empty collection; or if this Course has previously
     * been saved, it will retrieve related EducationalPathsOptionalCoursess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Course.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|EducationalPathsOptionalCourses[] List of EducationalPathsOptionalCourses objects
     */
    public function getEducationalPathsOptionalCoursessJoinOptionalEducationalPath($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EducationalPathsOptionalCoursesQuery::create(null, $criteria);
        $query->joinWith('OptionalEducationalPath', $join_behavior);

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
     * If this Course is new, it will return
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
                    ->filterByMandatoryCourse($this)
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
            $educationalPathsMandatoryCoursesRemoved->setMandatoryCourse(null);
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
                    ->filterByMandatoryCourse($this)
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
     * @return Course The current object (for fluent API support)
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
        $educationalPathsMandatoryCourses->setMandatoryCourse($this);
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
            $educationalPathsMandatoryCourses->setMandatoryCourse(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Course is new, it will return
     * an empty collection; or if this Course has previously
     * been saved, it will retrieve related EducationalPathsMandatoryCoursess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Course.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|EducationalPathsMandatoryCourses[] List of EducationalPathsMandatoryCourses objects
     */
    public function getEducationalPathsMandatoryCoursessJoinMandatoryEducationalPath($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EducationalPathsMandatoryCoursesQuery::create(null, $criteria);
        $query->joinWith('MandatoryEducationalPath', $join_behavior);

        return $this->getEducationalPathsMandatoryCoursess($query, $con);
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
     * If this Course is new, it will return
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
                    ->filterByCourse($this)
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
            $contentRemoved->setCourse(null);
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
                    ->filterByCourse($this)
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
     * @return Course The current object (for fluent API support)
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
        $content->setCourse($this);
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
            $content->setCourse(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Course is new, it will return
     * an empty collection; or if this Course has previously
     * been saved, it will retrieve related Contents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Course.
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
     * Otherwise if this Course is new, it will return
     * an empty collection; or if this Course has previously
     * been saved, it will retrieve related Contents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Course.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Content[] List of Content objects
     */
    public function getContentsJoinCursus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContentQuery::create(null, $criteria);
        $query->joinWith('Cursus', $join_behavior);

        return $this->getContents($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Course is new, it will return
     * an empty collection; or if this Course has previously
     * been saved, it will retrieve related Contents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Course.
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
     * Clears out the collNotes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addNotes()
     */
    public function clearNotes()
    {
        $this->collNotes = null; // important to set this to null since that means it is uninitialized
        $this->collNotesPartial = null;
    }

    /**
     * reset is the collNotes collection loaded partially
     *
     * @return void
     */
    public function resetPartialNotes($v = true)
    {
        $this->collNotesPartial = $v;
    }

    /**
     * Initializes the collNotes collection.
     *
     * By default this just sets the collNotes collection to an empty array (like clearcollNotes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNotes($overrideExisting = true)
    {
        if (null !== $this->collNotes && !$overrideExisting) {
            return;
        }
        $this->collNotes = new PropelObjectCollection();
        $this->collNotes->setModel('Note');
    }

    /**
     * Gets an array of Note objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Course is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Note[] List of Note objects
     * @throws PropelException
     */
    public function getNotes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collNotesPartial && !$this->isNew();
        if (null === $this->collNotes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNotes) {
                // return empty collection
                $this->initNotes();
            } else {
                $collNotes = NoteQuery::create(null, $criteria)
                    ->filterByCourse($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collNotesPartial && count($collNotes)) {
                      $this->initNotes(false);

                      foreach($collNotes as $obj) {
                        if (false == $this->collNotes->contains($obj)) {
                          $this->collNotes->append($obj);
                        }
                      }

                      $this->collNotesPartial = true;
                    }

                    return $collNotes;
                }

                if($partial && $this->collNotes) {
                    foreach($this->collNotes as $obj) {
                        if($obj->isNew()) {
                            $collNotes[] = $obj;
                        }
                    }
                }

                $this->collNotes = $collNotes;
                $this->collNotesPartial = false;
            }
        }

        return $this->collNotes;
    }

    /**
     * Sets a collection of Note objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $notes A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setNotes(PropelCollection $notes, PropelPDO $con = null)
    {
        $this->notesScheduledForDeletion = $this->getNotes(new Criteria(), $con)->diff($notes);

        foreach ($this->notesScheduledForDeletion as $noteRemoved) {
            $noteRemoved->setCourse(null);
        }

        $this->collNotes = null;
        foreach ($notes as $note) {
            $this->addNote($note);
        }

        $this->collNotes = $notes;
        $this->collNotesPartial = false;
    }

    /**
     * Returns the number of related Note objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Note objects.
     * @throws PropelException
     */
    public function countNotes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collNotesPartial && !$this->isNew();
        if (null === $this->collNotes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNotes) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getNotes());
                }
                $query = NoteQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByCourse($this)
                    ->count($con);
            }
        } else {
            return count($this->collNotes);
        }
    }

    /**
     * Method called to associate a Note object to this object
     * through the Note foreign key attribute.
     *
     * @param    Note $l Note
     * @return Course The current object (for fluent API support)
     */
    public function addNote(Note $l)
    {
        if ($this->collNotes === null) {
            $this->initNotes();
            $this->collNotesPartial = true;
        }
        if (!$this->collNotes->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddNote($l);
        }

        return $this;
    }

    /**
     * @param	Note $note The note object to add.
     */
    protected function doAddNote($note)
    {
        $this->collNotes[]= $note;
        $note->setCourse($this);
    }

    /**
     * @param	Note $note The note object to remove.
     */
    public function removeNote($note)
    {
        if ($this->getNotes()->contains($note)) {
            $this->collNotes->remove($this->collNotes->search($note));
            if (null === $this->notesScheduledForDeletion) {
                $this->notesScheduledForDeletion = clone $this->collNotes;
                $this->notesScheduledForDeletion->clear();
            }
            $this->notesScheduledForDeletion[]= $note;
            $note->setCourse(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Course is new, it will return
     * an empty collection; or if this Course has previously
     * been saved, it will retrieve related Notes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Course.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Note[] List of Note objects
     */
    public function getNotesJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NoteQuery::create(null, $criteria);
        $query->joinWith('User', $join_behavior);

        return $this->getNotes($query, $con);
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
     * If this Course is new, it will return
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
                    ->filterByCourse($this)
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
            $newsRemoved->setCourse(null);
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
                    ->filterByCourse($this)
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
     * @return Course The current object (for fluent API support)
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
        $news->setCourse($this);
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
            $news->setCourse(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Course is new, it will return
     * an empty collection; or if this Course has previously
     * been saved, it will retrieve related Newss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Course.
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
     * Otherwise if this Course is new, it will return
     * an empty collection; or if this Course has previously
     * been saved, it will retrieve related Newss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Course.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|News[] List of News objects
     */
    public function getNewssJoinCursus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NewsQuery::create(null, $criteria);
        $query->joinWith('Cursus', $join_behavior);

        return $this->getNewss($query, $con);
    }

    /**
     * Clears out the collExams collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExams()
     */
    public function clearExams()
    {
        $this->collExams = null; // important to set this to null since that means it is uninitialized
        $this->collExamsPartial = null;
    }

    /**
     * reset is the collExams collection loaded partially
     *
     * @return void
     */
    public function resetPartialExams($v = true)
    {
        $this->collExamsPartial = $v;
    }

    /**
     * Initializes the collExams collection.
     *
     * By default this just sets the collExams collection to an empty array (like clearcollExams());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExams($overrideExisting = true)
    {
        if (null !== $this->collExams && !$overrideExisting) {
            return;
        }
        $this->collExams = new PropelObjectCollection();
        $this->collExams->setModel('Exam');
    }

    /**
     * Gets an array of Exam objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Course is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Exam[] List of Exam objects
     * @throws PropelException
     */
    public function getExams($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collExamsPartial && !$this->isNew();
        if (null === $this->collExams || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExams) {
                // return empty collection
                $this->initExams();
            } else {
                $collExams = ExamQuery::create(null, $criteria)
                    ->filterByCourse($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collExamsPartial && count($collExams)) {
                      $this->initExams(false);

                      foreach($collExams as $obj) {
                        if (false == $this->collExams->contains($obj)) {
                          $this->collExams->append($obj);
                        }
                      }

                      $this->collExamsPartial = true;
                    }

                    return $collExams;
                }

                if($partial && $this->collExams) {
                    foreach($this->collExams as $obj) {
                        if($obj->isNew()) {
                            $collExams[] = $obj;
                        }
                    }
                }

                $this->collExams = $collExams;
                $this->collExamsPartial = false;
            }
        }

        return $this->collExams;
    }

    /**
     * Sets a collection of Exam objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $exams A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setExams(PropelCollection $exams, PropelPDO $con = null)
    {
        $this->examsScheduledForDeletion = $this->getExams(new Criteria(), $con)->diff($exams);

        foreach ($this->examsScheduledForDeletion as $examRemoved) {
            $examRemoved->setCourse(null);
        }

        $this->collExams = null;
        foreach ($exams as $exam) {
            $this->addExam($exam);
        }

        $this->collExams = $exams;
        $this->collExamsPartial = false;
    }

    /**
     * Returns the number of related Exam objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Exam objects.
     * @throws PropelException
     */
    public function countExams(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collExamsPartial && !$this->isNew();
        if (null === $this->collExams || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExams) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getExams());
                }
                $query = ExamQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByCourse($this)
                    ->count($con);
            }
        } else {
            return count($this->collExams);
        }
    }

    /**
     * Method called to associate a Exam object to this object
     * through the Exam foreign key attribute.
     *
     * @param    Exam $l Exam
     * @return Course The current object (for fluent API support)
     */
    public function addExam(Exam $l)
    {
        if ($this->collExams === null) {
            $this->initExams();
            $this->collExamsPartial = true;
        }
        if (!$this->collExams->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddExam($l);
        }

        return $this;
    }

    /**
     * @param	Exam $exam The exam object to add.
     */
    protected function doAddExam($exam)
    {
        $this->collExams[]= $exam;
        $exam->setCourse($this);
    }

    /**
     * @param	Exam $exam The exam object to remove.
     */
    public function removeExam($exam)
    {
        if ($this->getExams()->contains($exam)) {
            $this->collExams->remove($this->collExams->search($exam));
            if (null === $this->examsScheduledForDeletion) {
                $this->examsScheduledForDeletion = clone $this->collExams;
                $this->examsScheduledForDeletion->clear();
            }
            $this->examsScheduledForDeletion[]= $exam;
            $exam->setCourse(null);
        }
    }

    /**
     * Clears out the collScheduledCourses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addScheduledCourses()
     */
    public function clearScheduledCourses()
    {
        $this->collScheduledCourses = null; // important to set this to null since that means it is uninitialized
        $this->collScheduledCoursesPartial = null;
    }

    /**
     * reset is the collScheduledCourses collection loaded partially
     *
     * @return void
     */
    public function resetPartialScheduledCourses($v = true)
    {
        $this->collScheduledCoursesPartial = $v;
    }

    /**
     * Initializes the collScheduledCourses collection.
     *
     * By default this just sets the collScheduledCourses collection to an empty array (like clearcollScheduledCourses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initScheduledCourses($overrideExisting = true)
    {
        if (null !== $this->collScheduledCourses && !$overrideExisting) {
            return;
        }
        $this->collScheduledCourses = new PropelObjectCollection();
        $this->collScheduledCourses->setModel('ScheduledCourse');
    }

    /**
     * Gets an array of ScheduledCourse objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Course is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ScheduledCourse[] List of ScheduledCourse objects
     * @throws PropelException
     */
    public function getScheduledCourses($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collScheduledCoursesPartial && !$this->isNew();
        if (null === $this->collScheduledCourses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collScheduledCourses) {
                // return empty collection
                $this->initScheduledCourses();
            } else {
                $collScheduledCourses = ScheduledCourseQuery::create(null, $criteria)
                    ->filterByCourse($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collScheduledCoursesPartial && count($collScheduledCourses)) {
                      $this->initScheduledCourses(false);

                      foreach($collScheduledCourses as $obj) {
                        if (false == $this->collScheduledCourses->contains($obj)) {
                          $this->collScheduledCourses->append($obj);
                        }
                      }

                      $this->collScheduledCoursesPartial = true;
                    }

                    return $collScheduledCourses;
                }

                if($partial && $this->collScheduledCourses) {
                    foreach($this->collScheduledCourses as $obj) {
                        if($obj->isNew()) {
                            $collScheduledCourses[] = $obj;
                        }
                    }
                }

                $this->collScheduledCourses = $collScheduledCourses;
                $this->collScheduledCoursesPartial = false;
            }
        }

        return $this->collScheduledCourses;
    }

    /**
     * Sets a collection of ScheduledCourse objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $scheduledCourses A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setScheduledCourses(PropelCollection $scheduledCourses, PropelPDO $con = null)
    {
        $this->scheduledCoursesScheduledForDeletion = $this->getScheduledCourses(new Criteria(), $con)->diff($scheduledCourses);

        foreach ($this->scheduledCoursesScheduledForDeletion as $scheduledCourseRemoved) {
            $scheduledCourseRemoved->setCourse(null);
        }

        $this->collScheduledCourses = null;
        foreach ($scheduledCourses as $scheduledCourse) {
            $this->addScheduledCourse($scheduledCourse);
        }

        $this->collScheduledCourses = $scheduledCourses;
        $this->collScheduledCoursesPartial = false;
    }

    /**
     * Returns the number of related ScheduledCourse objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ScheduledCourse objects.
     * @throws PropelException
     */
    public function countScheduledCourses(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collScheduledCoursesPartial && !$this->isNew();
        if (null === $this->collScheduledCourses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collScheduledCourses) {
                return 0;
            } else {
                if($partial && !$criteria) {
                    return count($this->getScheduledCourses());
                }
                $query = ScheduledCourseQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByCourse($this)
                    ->count($con);
            }
        } else {
            return count($this->collScheduledCourses);
        }
    }

    /**
     * Method called to associate a ScheduledCourse object to this object
     * through the ScheduledCourse foreign key attribute.
     *
     * @param    ScheduledCourse $l ScheduledCourse
     * @return Course The current object (for fluent API support)
     */
    public function addScheduledCourse(ScheduledCourse $l)
    {
        if ($this->collScheduledCourses === null) {
            $this->initScheduledCourses();
            $this->collScheduledCoursesPartial = true;
        }
        if (!$this->collScheduledCourses->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddScheduledCourse($l);
        }

        return $this;
    }

    /**
     * @param	ScheduledCourse $scheduledCourse The scheduledCourse object to add.
     */
    protected function doAddScheduledCourse($scheduledCourse)
    {
        $this->collScheduledCourses[]= $scheduledCourse;
        $scheduledCourse->setCourse($this);
    }

    /**
     * @param	ScheduledCourse $scheduledCourse The scheduledCourse object to remove.
     */
    public function removeScheduledCourse($scheduledCourse)
    {
        if ($this->getScheduledCourses()->contains($scheduledCourse)) {
            $this->collScheduledCourses->remove($this->collScheduledCourses->search($scheduledCourse));
            if (null === $this->scheduledCoursesScheduledForDeletion) {
                $this->scheduledCoursesScheduledForDeletion = clone $this->collScheduledCourses;
                $this->scheduledCoursesScheduledForDeletion->clear();
            }
            $this->scheduledCoursesScheduledForDeletion[]= $scheduledCourse;
            $scheduledCourse->setCourse(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Course is new, it will return
     * an empty collection; or if this Course has previously
     * been saved, it will retrieve related ScheduledCourses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Course.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ScheduledCourse[] List of ScheduledCourse objects
     */
    public function getScheduledCoursesJoinTeacher($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ScheduledCourseQuery::create(null, $criteria);
        $query->joinWith('Teacher', $join_behavior);

        return $this->getScheduledCourses($query, $con);
    }

    /**
     * Clears out the collOptionalEducationalPaths collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addOptionalEducationalPaths()
     */
    public function clearOptionalEducationalPaths()
    {
        $this->collOptionalEducationalPaths = null; // important to set this to null since that means it is uninitialized
        $this->collOptionalEducationalPathsPartial = null;
    }

    /**
     * Initializes the collOptionalEducationalPaths collection.
     *
     * By default this just sets the collOptionalEducationalPaths collection to an empty collection (like clearOptionalEducationalPaths());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initOptionalEducationalPaths()
    {
        $this->collOptionalEducationalPaths = new PropelObjectCollection();
        $this->collOptionalEducationalPaths->setModel('EducationalPath');
    }

    /**
     * Gets a collection of EducationalPath objects related by a many-to-many relationship
     * to the current object by way of the educational_paths_optional_courses cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Course is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|EducationalPath[] List of EducationalPath objects
     */
    public function getOptionalEducationalPaths($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collOptionalEducationalPaths || null !== $criteria) {
            if ($this->isNew() && null === $this->collOptionalEducationalPaths) {
                // return empty collection
                $this->initOptionalEducationalPaths();
            } else {
                $collOptionalEducationalPaths = EducationalPathQuery::create(null, $criteria)
                    ->filterByOptionalCourse($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collOptionalEducationalPaths;
                }
                $this->collOptionalEducationalPaths = $collOptionalEducationalPaths;
            }
        }

        return $this->collOptionalEducationalPaths;
    }

    /**
     * Sets a collection of EducationalPath objects related by a many-to-many relationship
     * to the current object by way of the educational_paths_optional_courses cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $optionalEducationalPaths A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setOptionalEducationalPaths(PropelCollection $optionalEducationalPaths, PropelPDO $con = null)
    {
        $this->clearOptionalEducationalPaths();
        $currentOptionalEducationalPaths = $this->getOptionalEducationalPaths();

        $this->optionalEducationalPathsScheduledForDeletion = $currentOptionalEducationalPaths->diff($optionalEducationalPaths);

        foreach ($optionalEducationalPaths as $optionalEducationalPath) {
            if (!$currentOptionalEducationalPaths->contains($optionalEducationalPath)) {
                $this->doAddOptionalEducationalPath($optionalEducationalPath);
            }
        }

        $this->collOptionalEducationalPaths = $optionalEducationalPaths;
    }

    /**
     * Gets the number of EducationalPath objects related by a many-to-many relationship
     * to the current object by way of the educational_paths_optional_courses cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related EducationalPath objects
     */
    public function countOptionalEducationalPaths($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collOptionalEducationalPaths || null !== $criteria) {
            if ($this->isNew() && null === $this->collOptionalEducationalPaths) {
                return 0;
            } else {
                $query = EducationalPathQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByOptionalCourse($this)
                    ->count($con);
            }
        } else {
            return count($this->collOptionalEducationalPaths);
        }
    }

    /**
     * Associate a EducationalPath object to this object
     * through the educational_paths_optional_courses cross reference table.
     *
     * @param  EducationalPath $educationalPath The EducationalPathsOptionalCourses object to relate
     * @return void
     */
    public function addOptionalEducationalPath(EducationalPath $educationalPath)
    {
        if ($this->collOptionalEducationalPaths === null) {
            $this->initOptionalEducationalPaths();
        }
        if (!$this->collOptionalEducationalPaths->contains($educationalPath)) { // only add it if the **same** object is not already associated
            $this->doAddOptionalEducationalPath($educationalPath);

            $this->collOptionalEducationalPaths[]= $educationalPath;
        }
    }

    /**
     * @param	OptionalEducationalPath $optionalEducationalPath The optionalEducationalPath object to add.
     */
    protected function doAddOptionalEducationalPath($optionalEducationalPath)
    {
        $educationalPathsOptionalCourses = new EducationalPathsOptionalCourses();
        $educationalPathsOptionalCourses->setOptionalEducationalPath($optionalEducationalPath);
        $this->addEducationalPathsOptionalCourses($educationalPathsOptionalCourses);
    }

    /**
     * Remove a EducationalPath object to this object
     * through the educational_paths_optional_courses cross reference table.
     *
     * @param EducationalPath $educationalPath The EducationalPathsOptionalCourses object to relate
     * @return void
     */
    public function removeOptionalEducationalPath(EducationalPath $educationalPath)
    {
        if ($this->getOptionalEducationalPaths()->contains($educationalPath)) {
            $this->collOptionalEducationalPaths->remove($this->collOptionalEducationalPaths->search($educationalPath));
            if (null === $this->optionalEducationalPathsScheduledForDeletion) {
                $this->optionalEducationalPathsScheduledForDeletion = clone $this->collOptionalEducationalPaths;
                $this->optionalEducationalPathsScheduledForDeletion->clear();
            }
            $this->optionalEducationalPathsScheduledForDeletion[]= $educationalPath;
        }
    }

    /**
     * Clears out the collMandatoryEducationalPaths collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMandatoryEducationalPaths()
     */
    public function clearMandatoryEducationalPaths()
    {
        $this->collMandatoryEducationalPaths = null; // important to set this to null since that means it is uninitialized
        $this->collMandatoryEducationalPathsPartial = null;
    }

    /**
     * Initializes the collMandatoryEducationalPaths collection.
     *
     * By default this just sets the collMandatoryEducationalPaths collection to an empty collection (like clearMandatoryEducationalPaths());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initMandatoryEducationalPaths()
    {
        $this->collMandatoryEducationalPaths = new PropelObjectCollection();
        $this->collMandatoryEducationalPaths->setModel('EducationalPath');
    }

    /**
     * Gets a collection of EducationalPath objects related by a many-to-many relationship
     * to the current object by way of the educational_paths_mandatory_courses cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Course is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|EducationalPath[] List of EducationalPath objects
     */
    public function getMandatoryEducationalPaths($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collMandatoryEducationalPaths || null !== $criteria) {
            if ($this->isNew() && null === $this->collMandatoryEducationalPaths) {
                // return empty collection
                $this->initMandatoryEducationalPaths();
            } else {
                $collMandatoryEducationalPaths = EducationalPathQuery::create(null, $criteria)
                    ->filterByMandatoryCourse($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collMandatoryEducationalPaths;
                }
                $this->collMandatoryEducationalPaths = $collMandatoryEducationalPaths;
            }
        }

        return $this->collMandatoryEducationalPaths;
    }

    /**
     * Sets a collection of EducationalPath objects related by a many-to-many relationship
     * to the current object by way of the educational_paths_mandatory_courses cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mandatoryEducationalPaths A Propel collection.
     * @param PropelPDO $con Optional connection object
     */
    public function setMandatoryEducationalPaths(PropelCollection $mandatoryEducationalPaths, PropelPDO $con = null)
    {
        $this->clearMandatoryEducationalPaths();
        $currentMandatoryEducationalPaths = $this->getMandatoryEducationalPaths();

        $this->mandatoryEducationalPathsScheduledForDeletion = $currentMandatoryEducationalPaths->diff($mandatoryEducationalPaths);

        foreach ($mandatoryEducationalPaths as $mandatoryEducationalPath) {
            if (!$currentMandatoryEducationalPaths->contains($mandatoryEducationalPath)) {
                $this->doAddMandatoryEducationalPath($mandatoryEducationalPath);
            }
        }

        $this->collMandatoryEducationalPaths = $mandatoryEducationalPaths;
    }

    /**
     * Gets the number of EducationalPath objects related by a many-to-many relationship
     * to the current object by way of the educational_paths_mandatory_courses cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related EducationalPath objects
     */
    public function countMandatoryEducationalPaths($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collMandatoryEducationalPaths || null !== $criteria) {
            if ($this->isNew() && null === $this->collMandatoryEducationalPaths) {
                return 0;
            } else {
                $query = EducationalPathQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByMandatoryCourse($this)
                    ->count($con);
            }
        } else {
            return count($this->collMandatoryEducationalPaths);
        }
    }

    /**
     * Associate a EducationalPath object to this object
     * through the educational_paths_mandatory_courses cross reference table.
     *
     * @param  EducationalPath $educationalPath The EducationalPathsMandatoryCourses object to relate
     * @return void
     */
    public function addMandatoryEducationalPath(EducationalPath $educationalPath)
    {
        if ($this->collMandatoryEducationalPaths === null) {
            $this->initMandatoryEducationalPaths();
        }
        if (!$this->collMandatoryEducationalPaths->contains($educationalPath)) { // only add it if the **same** object is not already associated
            $this->doAddMandatoryEducationalPath($educationalPath);

            $this->collMandatoryEducationalPaths[]= $educationalPath;
        }
    }

    /**
     * @param	MandatoryEducationalPath $mandatoryEducationalPath The mandatoryEducationalPath object to add.
     */
    protected function doAddMandatoryEducationalPath($mandatoryEducationalPath)
    {
        $educationalPathsMandatoryCourses = new EducationalPathsMandatoryCourses();
        $educationalPathsMandatoryCourses->setMandatoryEducationalPath($mandatoryEducationalPath);
        $this->addEducationalPathsMandatoryCourses($educationalPathsMandatoryCourses);
    }

    /**
     * Remove a EducationalPath object to this object
     * through the educational_paths_mandatory_courses cross reference table.
     *
     * @param EducationalPath $educationalPath The EducationalPathsMandatoryCourses object to relate
     * @return void
     */
    public function removeMandatoryEducationalPath(EducationalPath $educationalPath)
    {
        if ($this->getMandatoryEducationalPaths()->contains($educationalPath)) {
            $this->collMandatoryEducationalPaths->remove($this->collMandatoryEducationalPaths->search($educationalPath));
            if (null === $this->mandatoryEducationalPathsScheduledForDeletion) {
                $this->mandatoryEducationalPathsScheduledForDeletion = clone $this->collMandatoryEducationalPaths;
                $this->mandatoryEducationalPathsScheduledForDeletion->clear();
            }
            $this->mandatoryEducationalPathsScheduledForDeletion[]= $educationalPath;
        }
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->cursus_id = null;
        $this->semester = null;
        $this->name = null;
        $this->short_name = null;
        $this->ects = null;
        $this->description = null;
        $this->use_latex = null;
        $this->use_sourcecode = null;
        $this->deleted = null;
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
            if ($this->collContents) {
                foreach ($this->collContents as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNotes) {
                foreach ($this->collNotes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNewss) {
                foreach ($this->collNewss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExams) {
                foreach ($this->collExams as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collScheduledCourses) {
                foreach ($this->collScheduledCourses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOptionalEducationalPaths) {
                foreach ($this->collOptionalEducationalPaths as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMandatoryEducationalPaths) {
                foreach ($this->collMandatoryEducationalPaths as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collEducationalPathsOptionalCoursess instanceof PropelCollection) {
            $this->collEducationalPathsOptionalCoursess->clearIterator();
        }
        $this->collEducationalPathsOptionalCoursess = null;
        if ($this->collEducationalPathsMandatoryCoursess instanceof PropelCollection) {
            $this->collEducationalPathsMandatoryCoursess->clearIterator();
        }
        $this->collEducationalPathsMandatoryCoursess = null;
        if ($this->collContents instanceof PropelCollection) {
            $this->collContents->clearIterator();
        }
        $this->collContents = null;
        if ($this->collNotes instanceof PropelCollection) {
            $this->collNotes->clearIterator();
        }
        $this->collNotes = null;
        if ($this->collNewss instanceof PropelCollection) {
            $this->collNewss->clearIterator();
        }
        $this->collNewss = null;
        if ($this->collExams instanceof PropelCollection) {
            $this->collExams->clearIterator();
        }
        $this->collExams = null;
        if ($this->collScheduledCourses instanceof PropelCollection) {
            $this->collScheduledCourses->clearIterator();
        }
        $this->collScheduledCourses = null;
        if ($this->collOptionalEducationalPaths instanceof PropelCollection) {
            $this->collOptionalEducationalPaths->clearIterator();
        }
        $this->collOptionalEducationalPaths = null;
        if ($this->collMandatoryEducationalPaths instanceof PropelCollection) {
            $this->collMandatoryEducationalPaths->clearIterator();
        }
        $this->collMandatoryEducationalPaths = null;
        $this->aCursus = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CoursePeer::DEFAULT_STRING_FORMAT);
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
