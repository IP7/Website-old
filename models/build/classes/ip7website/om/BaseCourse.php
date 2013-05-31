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
     * @var        PropelObjectCollection|CourseAlias[] Collection to store aggregation of CourseAlias objects.
     */
    protected $collCourseAliass;
    protected $collCourseAliassPartial;

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
     * @var        PropelObjectCollection|News[] Collection to store aggregation of News objects.
     */
    protected $collNewss;
    protected $collNewssPartial;

    /**
     * @var        PropelObjectCollection|CourseUrl[] Collection to store aggregation of CourseUrl objects.
     */
    protected $collCourseUrls;
    protected $collCourseUrlsPartial;

    /**
     * @var        PropelObjectCollection|CoursesContentsArchives[] Collection to store aggregation of CoursesContentsArchives objects.
     */
    protected $collCoursesContentsArchivess;
    protected $collCoursesContentsArchivessPartial;

    /**
     * @var        PropelObjectCollection|EducationalPath[] Collection to store aggregation of EducationalPath objects.
     */
    protected $collOptionalEducationalPaths;

    /**
     * @var        PropelObjectCollection|EducationalPath[] Collection to store aggregation of EducationalPath objects.
     */
    protected $collMandatoryEducationalPaths;

    /**
     * @var        PropelObjectCollection|File[] Collection to store aggregation of File objects.
     */
    protected $collContentsArchives;

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
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

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
    protected $contentsArchivesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $courseAliassScheduledForDeletion = null;

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
    protected $newssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $courseUrlsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $coursesContentsArchivessScheduledForDeletion = null;

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
        if ($v !== null && is_numeric($v)) {
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
        if ($v !== null && is_numeric($v)) {
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
        if ($v !== null && is_numeric($v)) {
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
        if ($v !== null && is_numeric($v)) {
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
        if ($v !== null && is_numeric($v)) {
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
        if ($v !== null && is_numeric($v)) {
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
        if ($v !== null && is_numeric($v)) {
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
            $this->postHydrate($row, $startcol, $rehydrate);
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
            $this->collCourseAliass = null;

            $this->collEducationalPathsOptionalCoursess = null;

            $this->collEducationalPathsMandatoryCoursess = null;

            $this->collContents = null;

            $this->collNewss = null;

            $this->collCourseUrls = null;

            $this->collCoursesContentsArchivess = null;

            $this->collOptionalEducationalPaths = null;
            $this->collMandatoryEducationalPaths = null;
            $this->collContentsArchives = null;
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
            } elseif ($this->collOptionalEducationalPaths) {
                foreach ($this->collOptionalEducationalPaths as $optionalEducationalPath) {
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
            } elseif ($this->collMandatoryEducationalPaths) {
                foreach ($this->collMandatoryEducationalPaths as $mandatoryEducationalPath) {
                    if ($mandatoryEducationalPath->isModified()) {
                        $mandatoryEducationalPath->save($con);
                    }
                }
            }

            if ($this->contentsArchivesScheduledForDeletion !== null) {
                if (!$this->contentsArchivesScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->contentsArchivesScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($pk, $remotePk);
                    }
                    CoursesContentsArchivesQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->contentsArchivesScheduledForDeletion = null;
                }

                foreach ($this->getContentsArchives() as $contentsArchive) {
                    if ($contentsArchive->isModified()) {
                        $contentsArchive->save($con);
                    }
                }
            } elseif ($this->collContentsArchives) {
                foreach ($this->collContentsArchives as $contentsArchive) {
                    if ($contentsArchive->isModified()) {
                        $contentsArchive->save($con);
                    }
                }
            }

            if ($this->courseAliassScheduledForDeletion !== null) {
                if (!$this->courseAliassScheduledForDeletion->isEmpty()) {
                    CourseAliasQuery::create()
                        ->filterByPrimaryKeys($this->courseAliassScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->courseAliassScheduledForDeletion = null;
                }
            }

            if ($this->collCourseAliass !== null) {
                foreach ($this->collCourseAliass as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
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
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
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
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
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
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
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
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->courseUrlsScheduledForDeletion !== null) {
                if (!$this->courseUrlsScheduledForDeletion->isEmpty()) {
                    CourseUrlQuery::create()
                        ->filterByPrimaryKeys($this->courseUrlsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->courseUrlsScheduledForDeletion = null;
                }
            }

            if ($this->collCourseUrls !== null) {
                foreach ($this->collCourseUrls as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->coursesContentsArchivessScheduledForDeletion !== null) {
                if (!$this->coursesContentsArchivessScheduledForDeletion->isEmpty()) {
                    CoursesContentsArchivesQuery::create()
                        ->filterByPrimaryKeys($this->coursesContentsArchivessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->coursesContentsArchivessScheduledForDeletion = null;
                }
            }

            if ($this->collCoursesContentsArchivess !== null) {
                foreach ($this->collCoursesContentsArchivess as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
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
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(CoursePeer::CURSUS_ID)) {
            $modifiedColumns[':p' . $index++]  = '`cursus_id`';
        }
        if ($this->isColumnModified(CoursePeer::SEMESTER)) {
            $modifiedColumns[':p' . $index++]  = '`semester`';
        }
        if ($this->isColumnModified(CoursePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(CoursePeer::SHORT_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`short_name`';
        }
        if ($this->isColumnModified(CoursePeer::ECTS)) {
            $modifiedColumns[':p' . $index++]  = '`ECTS`';
        }
        if ($this->isColumnModified(CoursePeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`description`';
        }
        if ($this->isColumnModified(CoursePeer::USE_LATEX)) {
            $modifiedColumns[':p' . $index++]  = '`use_latex`';
        }
        if ($this->isColumnModified(CoursePeer::USE_SOURCECODE)) {
            $modifiedColumns[':p' . $index++]  = '`use_sourcecode`';
        }
        if ($this->isColumnModified(CoursePeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
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
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`cursus_id`':
                        $stmt->bindValue($identifier, $this->cursus_id, PDO::PARAM_INT);
                        break;
                    case '`semester`':
                        $stmt->bindValue($identifier, $this->semester, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`short_name`':
                        $stmt->bindValue($identifier, $this->short_name, PDO::PARAM_STR);
                        break;
                    case '`ECTS`':
                        $stmt->bindValue($identifier, $this->ects, PDO::PARAM_STR);
                        break;
                    case '`description`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`use_latex`':
                        $stmt->bindValue($identifier, (int) $this->use_latex, PDO::PARAM_INT);
                        break;
                    case '`use_sourcecode`':
                        $stmt->bindValue($identifier, (int) $this->use_sourcecode, PDO::PARAM_INT);
                        break;
                    case '`deleted`':
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
        }

        $this->validationFailures = $res;

        return false;
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


                if ($this->collCourseAliass !== null) {
                    foreach ($this->collCourseAliass as $referrerFK) {
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

                if ($this->collCourseUrls !== null) {
                    foreach ($this->collCourseUrls as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCoursesContentsArchivess !== null) {
                    foreach ($this->collCoursesContentsArchivess as $referrerFK) {
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
            if (null !== $this->collCourseAliass) {
                $result['CourseAliass'] = $this->collCourseAliass->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
            if (null !== $this->collNewss) {
                $result['Newss'] = $this->collNewss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCourseUrls) {
                $result['CourseUrls'] = $this->collCourseUrls->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCoursesContentsArchivess) {
                $result['CoursesContentsArchivess'] = $this->collCoursesContentsArchivess->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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

            foreach ($this->getCourseAliass() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCourseAlias($relObj->copy($deepCopy));
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

            foreach ($this->getCourseUrls() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCourseUrl($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCoursesContentsArchivess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCoursesContentsArchives($relObj->copy($deepCopy));
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
     * @param $doQuery Executes a query to get the object if required
     * @return Cursus The associated Cursus object.
     * @throws PropelException
     */
    public function getCursus(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCursus === null && ($this->cursus_id !== null) && $doQuery) {
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
        if ('CourseAlias' == $relationName) {
            $this->initCourseAliass();
        }
        if ('EducationalPathsOptionalCourses' == $relationName) {
            $this->initEducationalPathsOptionalCoursess();
        }
        if ('EducationalPathsMandatoryCourses' == $relationName) {
            $this->initEducationalPathsMandatoryCoursess();
        }
        if ('Content' == $relationName) {
            $this->initContents();
        }
        if ('News' == $relationName) {
            $this->initNewss();
        }
        if ('CourseUrl' == $relationName) {
            $this->initCourseUrls();
        }
        if ('CoursesContentsArchives' == $relationName) {
            $this->initCoursesContentsArchivess();
        }
    }

    /**
     * Clears out the collCourseAliass collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Course The current object (for fluent API support)
     * @see        addCourseAliass()
     */
    public function clearCourseAliass()
    {
        $this->collCourseAliass = null; // important to set this to null since that means it is uninitialized
        $this->collCourseAliassPartial = null;

        return $this;
    }

    /**
     * reset is the collCourseAliass collection loaded partially
     *
     * @return void
     */
    public function resetPartialCourseAliass($v = true)
    {
        $this->collCourseAliassPartial = $v;
    }

    /**
     * Initializes the collCourseAliass collection.
     *
     * By default this just sets the collCourseAliass collection to an empty array (like clearcollCourseAliass());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCourseAliass($overrideExisting = true)
    {
        if (null !== $this->collCourseAliass && !$overrideExisting) {
            return;
        }
        $this->collCourseAliass = new PropelObjectCollection();
        $this->collCourseAliass->setModel('CourseAlias');
    }

    /**
     * Gets an array of CourseAlias objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Course is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|CourseAlias[] List of CourseAlias objects
     * @throws PropelException
     */
    public function getCourseAliass($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCourseAliassPartial && !$this->isNew();
        if (null === $this->collCourseAliass || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCourseAliass) {
                // return empty collection
                $this->initCourseAliass();
            } else {
                $collCourseAliass = CourseAliasQuery::create(null, $criteria)
                    ->filterByCourse($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCourseAliassPartial && count($collCourseAliass)) {
                      $this->initCourseAliass(false);

                      foreach($collCourseAliass as $obj) {
                        if (false == $this->collCourseAliass->contains($obj)) {
                          $this->collCourseAliass->append($obj);
                        }
                      }

                      $this->collCourseAliassPartial = true;
                    }

                    $collCourseAliass->getInternalIterator()->rewind();
                    return $collCourseAliass;
                }

                if($partial && $this->collCourseAliass) {
                    foreach($this->collCourseAliass as $obj) {
                        if($obj->isNew()) {
                            $collCourseAliass[] = $obj;
                        }
                    }
                }

                $this->collCourseAliass = $collCourseAliass;
                $this->collCourseAliassPartial = false;
            }
        }

        return $this->collCourseAliass;
    }

    /**
     * Sets a collection of CourseAlias objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $courseAliass A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Course The current object (for fluent API support)
     */
    public function setCourseAliass(PropelCollection $courseAliass, PropelPDO $con = null)
    {
        $courseAliassToDelete = $this->getCourseAliass(new Criteria(), $con)->diff($courseAliass);

        $this->courseAliassScheduledForDeletion = unserialize(serialize($courseAliassToDelete));

        foreach ($courseAliassToDelete as $courseAliasRemoved) {
            $courseAliasRemoved->setCourse(null);
        }

        $this->collCourseAliass = null;
        foreach ($courseAliass as $courseAlias) {
            $this->addCourseAlias($courseAlias);
        }

        $this->collCourseAliass = $courseAliass;
        $this->collCourseAliassPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CourseAlias objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related CourseAlias objects.
     * @throws PropelException
     */
    public function countCourseAliass(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCourseAliassPartial && !$this->isNew();
        if (null === $this->collCourseAliass || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCourseAliass) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getCourseAliass());
            }
            $query = CourseAliasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCourse($this)
                ->count($con);
        }

        return count($this->collCourseAliass);
    }

    /**
     * Method called to associate a CourseAlias object to this object
     * through the CourseAlias foreign key attribute.
     *
     * @param    CourseAlias $l CourseAlias
     * @return Course The current object (for fluent API support)
     */
    public function addCourseAlias(CourseAlias $l)
    {
        if ($this->collCourseAliass === null) {
            $this->initCourseAliass();
            $this->collCourseAliassPartial = true;
        }
        if (!in_array($l, $this->collCourseAliass->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCourseAlias($l);
        }

        return $this;
    }

    /**
     * @param	CourseAlias $courseAlias The courseAlias object to add.
     */
    protected function doAddCourseAlias($courseAlias)
    {
        $this->collCourseAliass[]= $courseAlias;
        $courseAlias->setCourse($this);
    }

    /**
     * @param	CourseAlias $courseAlias The courseAlias object to remove.
     * @return Course The current object (for fluent API support)
     */
    public function removeCourseAlias($courseAlias)
    {
        if ($this->getCourseAliass()->contains($courseAlias)) {
            $this->collCourseAliass->remove($this->collCourseAliass->search($courseAlias));
            if (null === $this->courseAliassScheduledForDeletion) {
                $this->courseAliassScheduledForDeletion = clone $this->collCourseAliass;
                $this->courseAliassScheduledForDeletion->clear();
            }
            $this->courseAliassScheduledForDeletion[]= clone $courseAlias;
            $courseAlias->setCourse(null);
        }

        return $this;
    }

    /**
     * Clears out the collEducationalPathsOptionalCoursess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Course The current object (for fluent API support)
     * @see        addEducationalPathsOptionalCoursess()
     */
    public function clearEducationalPathsOptionalCoursess()
    {
        $this->collEducationalPathsOptionalCoursess = null; // important to set this to null since that means it is uninitialized
        $this->collEducationalPathsOptionalCoursessPartial = null;

        return $this;
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

                    $collEducationalPathsOptionalCoursess->getInternalIterator()->rewind();
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
     * @return Course The current object (for fluent API support)
     */
    public function setEducationalPathsOptionalCoursess(PropelCollection $educationalPathsOptionalCoursess, PropelPDO $con = null)
    {
        $educationalPathsOptionalCoursessToDelete = $this->getEducationalPathsOptionalCoursess(new Criteria(), $con)->diff($educationalPathsOptionalCoursess);

        $this->educationalPathsOptionalCoursessScheduledForDeletion = unserialize(serialize($educationalPathsOptionalCoursessToDelete));

        foreach ($educationalPathsOptionalCoursessToDelete as $educationalPathsOptionalCoursesRemoved) {
            $educationalPathsOptionalCoursesRemoved->setOptionalCourse(null);
        }

        $this->collEducationalPathsOptionalCoursess = null;
        foreach ($educationalPathsOptionalCoursess as $educationalPathsOptionalCourses) {
            $this->addEducationalPathsOptionalCourses($educationalPathsOptionalCourses);
        }

        $this->collEducationalPathsOptionalCoursess = $educationalPathsOptionalCoursess;
        $this->collEducationalPathsOptionalCoursessPartial = false;

        return $this;
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
            }

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

        return count($this->collEducationalPathsOptionalCoursess);
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
        if (!in_array($l, $this->collEducationalPathsOptionalCoursess->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
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
     * @return Course The current object (for fluent API support)
     */
    public function removeEducationalPathsOptionalCourses($educationalPathsOptionalCourses)
    {
        if ($this->getEducationalPathsOptionalCoursess()->contains($educationalPathsOptionalCourses)) {
            $this->collEducationalPathsOptionalCoursess->remove($this->collEducationalPathsOptionalCoursess->search($educationalPathsOptionalCourses));
            if (null === $this->educationalPathsOptionalCoursessScheduledForDeletion) {
                $this->educationalPathsOptionalCoursessScheduledForDeletion = clone $this->collEducationalPathsOptionalCoursess;
                $this->educationalPathsOptionalCoursessScheduledForDeletion->clear();
            }
            $this->educationalPathsOptionalCoursessScheduledForDeletion[]= clone $educationalPathsOptionalCourses;
            $educationalPathsOptionalCourses->setOptionalCourse(null);
        }

        return $this;
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
     * @return Course The current object (for fluent API support)
     * @see        addEducationalPathsMandatoryCoursess()
     */
    public function clearEducationalPathsMandatoryCoursess()
    {
        $this->collEducationalPathsMandatoryCoursess = null; // important to set this to null since that means it is uninitialized
        $this->collEducationalPathsMandatoryCoursessPartial = null;

        return $this;
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

                    $collEducationalPathsMandatoryCoursess->getInternalIterator()->rewind();
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
     * @return Course The current object (for fluent API support)
     */
    public function setEducationalPathsMandatoryCoursess(PropelCollection $educationalPathsMandatoryCoursess, PropelPDO $con = null)
    {
        $educationalPathsMandatoryCoursessToDelete = $this->getEducationalPathsMandatoryCoursess(new Criteria(), $con)->diff($educationalPathsMandatoryCoursess);

        $this->educationalPathsMandatoryCoursessScheduledForDeletion = unserialize(serialize($educationalPathsMandatoryCoursessToDelete));

        foreach ($educationalPathsMandatoryCoursessToDelete as $educationalPathsMandatoryCoursesRemoved) {
            $educationalPathsMandatoryCoursesRemoved->setMandatoryCourse(null);
        }

        $this->collEducationalPathsMandatoryCoursess = null;
        foreach ($educationalPathsMandatoryCoursess as $educationalPathsMandatoryCourses) {
            $this->addEducationalPathsMandatoryCourses($educationalPathsMandatoryCourses);
        }

        $this->collEducationalPathsMandatoryCoursess = $educationalPathsMandatoryCoursess;
        $this->collEducationalPathsMandatoryCoursessPartial = false;

        return $this;
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
            }

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

        return count($this->collEducationalPathsMandatoryCoursess);
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
        if (!in_array($l, $this->collEducationalPathsMandatoryCoursess->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
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
     * @return Course The current object (for fluent API support)
     */
    public function removeEducationalPathsMandatoryCourses($educationalPathsMandatoryCourses)
    {
        if ($this->getEducationalPathsMandatoryCoursess()->contains($educationalPathsMandatoryCourses)) {
            $this->collEducationalPathsMandatoryCoursess->remove($this->collEducationalPathsMandatoryCoursess->search($educationalPathsMandatoryCourses));
            if (null === $this->educationalPathsMandatoryCoursessScheduledForDeletion) {
                $this->educationalPathsMandatoryCoursessScheduledForDeletion = clone $this->collEducationalPathsMandatoryCoursess;
                $this->educationalPathsMandatoryCoursessScheduledForDeletion->clear();
            }
            $this->educationalPathsMandatoryCoursessScheduledForDeletion[]= clone $educationalPathsMandatoryCourses;
            $educationalPathsMandatoryCourses->setMandatoryCourse(null);
        }

        return $this;
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
     * @return Course The current object (for fluent API support)
     * @see        addContents()
     */
    public function clearContents()
    {
        $this->collContents = null; // important to set this to null since that means it is uninitialized
        $this->collContentsPartial = null;

        return $this;
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

                    $collContents->getInternalIterator()->rewind();
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
     * @return Course The current object (for fluent API support)
     */
    public function setContents(PropelCollection $contents, PropelPDO $con = null)
    {
        $contentsToDelete = $this->getContents(new Criteria(), $con)->diff($contents);

        $this->contentsScheduledForDeletion = unserialize(serialize($contentsToDelete));

        foreach ($contentsToDelete as $contentRemoved) {
            $contentRemoved->setCourse(null);
        }

        $this->collContents = null;
        foreach ($contents as $content) {
            $this->addContent($content);
        }

        $this->collContents = $contents;
        $this->collContentsPartial = false;

        return $this;
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
            }

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

        return count($this->collContents);
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
        if (!in_array($l, $this->collContents->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
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
     * @return Course The current object (for fluent API support)
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

        return $this;
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
     * Clears out the collNewss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Course The current object (for fluent API support)
     * @see        addNewss()
     */
    public function clearNewss()
    {
        $this->collNewss = null; // important to set this to null since that means it is uninitialized
        $this->collNewssPartial = null;

        return $this;
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

                    $collNewss->getInternalIterator()->rewind();
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
     * @return Course The current object (for fluent API support)
     */
    public function setNewss(PropelCollection $newss, PropelPDO $con = null)
    {
        $newssToDelete = $this->getNewss(new Criteria(), $con)->diff($newss);

        $this->newssScheduledForDeletion = unserialize(serialize($newssToDelete));

        foreach ($newssToDelete as $newsRemoved) {
            $newsRemoved->setCourse(null);
        }

        $this->collNewss = null;
        foreach ($newss as $news) {
            $this->addNews($news);
        }

        $this->collNewss = $newss;
        $this->collNewssPartial = false;

        return $this;
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
            }

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

        return count($this->collNewss);
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
        if (!in_array($l, $this->collNewss->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
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
     * @return Course The current object (for fluent API support)
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

        return $this;
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
     * Clears out the collCourseUrls collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Course The current object (for fluent API support)
     * @see        addCourseUrls()
     */
    public function clearCourseUrls()
    {
        $this->collCourseUrls = null; // important to set this to null since that means it is uninitialized
        $this->collCourseUrlsPartial = null;

        return $this;
    }

    /**
     * reset is the collCourseUrls collection loaded partially
     *
     * @return void
     */
    public function resetPartialCourseUrls($v = true)
    {
        $this->collCourseUrlsPartial = $v;
    }

    /**
     * Initializes the collCourseUrls collection.
     *
     * By default this just sets the collCourseUrls collection to an empty array (like clearcollCourseUrls());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCourseUrls($overrideExisting = true)
    {
        if (null !== $this->collCourseUrls && !$overrideExisting) {
            return;
        }
        $this->collCourseUrls = new PropelObjectCollection();
        $this->collCourseUrls->setModel('CourseUrl');
    }

    /**
     * Gets an array of CourseUrl objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Course is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|CourseUrl[] List of CourseUrl objects
     * @throws PropelException
     */
    public function getCourseUrls($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCourseUrlsPartial && !$this->isNew();
        if (null === $this->collCourseUrls || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCourseUrls) {
                // return empty collection
                $this->initCourseUrls();
            } else {
                $collCourseUrls = CourseUrlQuery::create(null, $criteria)
                    ->filterByCourse($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCourseUrlsPartial && count($collCourseUrls)) {
                      $this->initCourseUrls(false);

                      foreach($collCourseUrls as $obj) {
                        if (false == $this->collCourseUrls->contains($obj)) {
                          $this->collCourseUrls->append($obj);
                        }
                      }

                      $this->collCourseUrlsPartial = true;
                    }

                    $collCourseUrls->getInternalIterator()->rewind();
                    return $collCourseUrls;
                }

                if($partial && $this->collCourseUrls) {
                    foreach($this->collCourseUrls as $obj) {
                        if($obj->isNew()) {
                            $collCourseUrls[] = $obj;
                        }
                    }
                }

                $this->collCourseUrls = $collCourseUrls;
                $this->collCourseUrlsPartial = false;
            }
        }

        return $this->collCourseUrls;
    }

    /**
     * Sets a collection of CourseUrl objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $courseUrls A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Course The current object (for fluent API support)
     */
    public function setCourseUrls(PropelCollection $courseUrls, PropelPDO $con = null)
    {
        $courseUrlsToDelete = $this->getCourseUrls(new Criteria(), $con)->diff($courseUrls);

        $this->courseUrlsScheduledForDeletion = unserialize(serialize($courseUrlsToDelete));

        foreach ($courseUrlsToDelete as $courseUrlRemoved) {
            $courseUrlRemoved->setCourse(null);
        }

        $this->collCourseUrls = null;
        foreach ($courseUrls as $courseUrl) {
            $this->addCourseUrl($courseUrl);
        }

        $this->collCourseUrls = $courseUrls;
        $this->collCourseUrlsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CourseUrl objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related CourseUrl objects.
     * @throws PropelException
     */
    public function countCourseUrls(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCourseUrlsPartial && !$this->isNew();
        if (null === $this->collCourseUrls || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCourseUrls) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getCourseUrls());
            }
            $query = CourseUrlQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCourse($this)
                ->count($con);
        }

        return count($this->collCourseUrls);
    }

    /**
     * Method called to associate a CourseUrl object to this object
     * through the CourseUrl foreign key attribute.
     *
     * @param    CourseUrl $l CourseUrl
     * @return Course The current object (for fluent API support)
     */
    public function addCourseUrl(CourseUrl $l)
    {
        if ($this->collCourseUrls === null) {
            $this->initCourseUrls();
            $this->collCourseUrlsPartial = true;
        }
        if (!in_array($l, $this->collCourseUrls->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCourseUrl($l);
        }

        return $this;
    }

    /**
     * @param	CourseUrl $courseUrl The courseUrl object to add.
     */
    protected function doAddCourseUrl($courseUrl)
    {
        $this->collCourseUrls[]= $courseUrl;
        $courseUrl->setCourse($this);
    }

    /**
     * @param	CourseUrl $courseUrl The courseUrl object to remove.
     * @return Course The current object (for fluent API support)
     */
    public function removeCourseUrl($courseUrl)
    {
        if ($this->getCourseUrls()->contains($courseUrl)) {
            $this->collCourseUrls->remove($this->collCourseUrls->search($courseUrl));
            if (null === $this->courseUrlsScheduledForDeletion) {
                $this->courseUrlsScheduledForDeletion = clone $this->collCourseUrls;
                $this->courseUrlsScheduledForDeletion->clear();
            }
            $this->courseUrlsScheduledForDeletion[]= clone $courseUrl;
            $courseUrl->setCourse(null);
        }

        return $this;
    }

    /**
     * Clears out the collCoursesContentsArchivess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Course The current object (for fluent API support)
     * @see        addCoursesContentsArchivess()
     */
    public function clearCoursesContentsArchivess()
    {
        $this->collCoursesContentsArchivess = null; // important to set this to null since that means it is uninitialized
        $this->collCoursesContentsArchivessPartial = null;

        return $this;
    }

    /**
     * reset is the collCoursesContentsArchivess collection loaded partially
     *
     * @return void
     */
    public function resetPartialCoursesContentsArchivess($v = true)
    {
        $this->collCoursesContentsArchivessPartial = $v;
    }

    /**
     * Initializes the collCoursesContentsArchivess collection.
     *
     * By default this just sets the collCoursesContentsArchivess collection to an empty array (like clearcollCoursesContentsArchivess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCoursesContentsArchivess($overrideExisting = true)
    {
        if (null !== $this->collCoursesContentsArchivess && !$overrideExisting) {
            return;
        }
        $this->collCoursesContentsArchivess = new PropelObjectCollection();
        $this->collCoursesContentsArchivess->setModel('CoursesContentsArchives');
    }

    /**
     * Gets an array of CoursesContentsArchives objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Course is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|CoursesContentsArchives[] List of CoursesContentsArchives objects
     * @throws PropelException
     */
    public function getCoursesContentsArchivess($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCoursesContentsArchivessPartial && !$this->isNew();
        if (null === $this->collCoursesContentsArchivess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCoursesContentsArchivess) {
                // return empty collection
                $this->initCoursesContentsArchivess();
            } else {
                $collCoursesContentsArchivess = CoursesContentsArchivesQuery::create(null, $criteria)
                    ->filterByCourse($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCoursesContentsArchivessPartial && count($collCoursesContentsArchivess)) {
                      $this->initCoursesContentsArchivess(false);

                      foreach($collCoursesContentsArchivess as $obj) {
                        if (false == $this->collCoursesContentsArchivess->contains($obj)) {
                          $this->collCoursesContentsArchivess->append($obj);
                        }
                      }

                      $this->collCoursesContentsArchivessPartial = true;
                    }

                    $collCoursesContentsArchivess->getInternalIterator()->rewind();
                    return $collCoursesContentsArchivess;
                }

                if($partial && $this->collCoursesContentsArchivess) {
                    foreach($this->collCoursesContentsArchivess as $obj) {
                        if($obj->isNew()) {
                            $collCoursesContentsArchivess[] = $obj;
                        }
                    }
                }

                $this->collCoursesContentsArchivess = $collCoursesContentsArchivess;
                $this->collCoursesContentsArchivessPartial = false;
            }
        }

        return $this->collCoursesContentsArchivess;
    }

    /**
     * Sets a collection of CoursesContentsArchives objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $coursesContentsArchivess A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Course The current object (for fluent API support)
     */
    public function setCoursesContentsArchivess(PropelCollection $coursesContentsArchivess, PropelPDO $con = null)
    {
        $coursesContentsArchivessToDelete = $this->getCoursesContentsArchivess(new Criteria(), $con)->diff($coursesContentsArchivess);

        $this->coursesContentsArchivessScheduledForDeletion = unserialize(serialize($coursesContentsArchivessToDelete));

        foreach ($coursesContentsArchivessToDelete as $coursesContentsArchivesRemoved) {
            $coursesContentsArchivesRemoved->setCourse(null);
        }

        $this->collCoursesContentsArchivess = null;
        foreach ($coursesContentsArchivess as $coursesContentsArchives) {
            $this->addCoursesContentsArchives($coursesContentsArchives);
        }

        $this->collCoursesContentsArchivess = $coursesContentsArchivess;
        $this->collCoursesContentsArchivessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CoursesContentsArchives objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related CoursesContentsArchives objects.
     * @throws PropelException
     */
    public function countCoursesContentsArchivess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCoursesContentsArchivessPartial && !$this->isNew();
        if (null === $this->collCoursesContentsArchivess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCoursesContentsArchivess) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getCoursesContentsArchivess());
            }
            $query = CoursesContentsArchivesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCourse($this)
                ->count($con);
        }

        return count($this->collCoursesContentsArchivess);
    }

    /**
     * Method called to associate a CoursesContentsArchives object to this object
     * through the CoursesContentsArchives foreign key attribute.
     *
     * @param    CoursesContentsArchives $l CoursesContentsArchives
     * @return Course The current object (for fluent API support)
     */
    public function addCoursesContentsArchives(CoursesContentsArchives $l)
    {
        if ($this->collCoursesContentsArchivess === null) {
            $this->initCoursesContentsArchivess();
            $this->collCoursesContentsArchivessPartial = true;
        }
        if (!in_array($l, $this->collCoursesContentsArchivess->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCoursesContentsArchives($l);
        }

        return $this;
    }

    /**
     * @param	CoursesContentsArchives $coursesContentsArchives The coursesContentsArchives object to add.
     */
    protected function doAddCoursesContentsArchives($coursesContentsArchives)
    {
        $this->collCoursesContentsArchivess[]= $coursesContentsArchives;
        $coursesContentsArchives->setCourse($this);
    }

    /**
     * @param	CoursesContentsArchives $coursesContentsArchives The coursesContentsArchives object to remove.
     * @return Course The current object (for fluent API support)
     */
    public function removeCoursesContentsArchives($coursesContentsArchives)
    {
        if ($this->getCoursesContentsArchivess()->contains($coursesContentsArchives)) {
            $this->collCoursesContentsArchivess->remove($this->collCoursesContentsArchivess->search($coursesContentsArchives));
            if (null === $this->coursesContentsArchivessScheduledForDeletion) {
                $this->coursesContentsArchivessScheduledForDeletion = clone $this->collCoursesContentsArchivess;
                $this->coursesContentsArchivessScheduledForDeletion->clear();
            }
            $this->coursesContentsArchivessScheduledForDeletion[]= clone $coursesContentsArchives;
            $coursesContentsArchives->setCourse(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Course is new, it will return
     * an empty collection; or if this Course has previously
     * been saved, it will retrieve related CoursesContentsArchivess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Course.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|CoursesContentsArchives[] List of CoursesContentsArchives objects
     */
    public function getCoursesContentsArchivessJoinContentsArchive($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CoursesContentsArchivesQuery::create(null, $criteria);
        $query->joinWith('ContentsArchive', $join_behavior);

        return $this->getCoursesContentsArchivess($query, $con);
    }

    /**
     * Clears out the collOptionalEducationalPaths collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Course The current object (for fluent API support)
     * @see        addOptionalEducationalPaths()
     */
    public function clearOptionalEducationalPaths()
    {
        $this->collOptionalEducationalPaths = null; // important to set this to null since that means it is uninitialized
        $this->collOptionalEducationalPathsPartial = null;

        return $this;
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
     * @return Course The current object (for fluent API support)
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

        return $this;
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
     * @return Course The current object (for fluent API support)
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

        return $this;
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
     * @return Course The current object (for fluent API support)
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

        return $this;
    }

    /**
     * Clears out the collMandatoryEducationalPaths collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Course The current object (for fluent API support)
     * @see        addMandatoryEducationalPaths()
     */
    public function clearMandatoryEducationalPaths()
    {
        $this->collMandatoryEducationalPaths = null; // important to set this to null since that means it is uninitialized
        $this->collMandatoryEducationalPathsPartial = null;

        return $this;
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
     * @return Course The current object (for fluent API support)
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

        return $this;
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
     * @return Course The current object (for fluent API support)
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

        return $this;
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
     * @return Course The current object (for fluent API support)
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

        return $this;
    }

    /**
     * Clears out the collContentsArchives collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Course The current object (for fluent API support)
     * @see        addContentsArchives()
     */
    public function clearContentsArchives()
    {
        $this->collContentsArchives = null; // important to set this to null since that means it is uninitialized
        $this->collContentsArchivesPartial = null;

        return $this;
    }

    /**
     * Initializes the collContentsArchives collection.
     *
     * By default this just sets the collContentsArchives collection to an empty collection (like clearContentsArchives());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initContentsArchives()
    {
        $this->collContentsArchives = new PropelObjectCollection();
        $this->collContentsArchives->setModel('File');
    }

    /**
     * Gets a collection of File objects related by a many-to-many relationship
     * to the current object by way of the courses_contents_archives cross-reference table.
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
     * @return PropelObjectCollection|File[] List of File objects
     */
    public function getContentsArchives($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collContentsArchives || null !== $criteria) {
            if ($this->isNew() && null === $this->collContentsArchives) {
                // return empty collection
                $this->initContentsArchives();
            } else {
                $collContentsArchives = FileQuery::create(null, $criteria)
                    ->filterByCourse($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collContentsArchives;
                }
                $this->collContentsArchives = $collContentsArchives;
            }
        }

        return $this->collContentsArchives;
    }

    /**
     * Sets a collection of File objects related by a many-to-many relationship
     * to the current object by way of the courses_contents_archives cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $contentsArchives A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Course The current object (for fluent API support)
     */
    public function setContentsArchives(PropelCollection $contentsArchives, PropelPDO $con = null)
    {
        $this->clearContentsArchives();
        $currentContentsArchives = $this->getContentsArchives();

        $this->contentsArchivesScheduledForDeletion = $currentContentsArchives->diff($contentsArchives);

        foreach ($contentsArchives as $contentsArchive) {
            if (!$currentContentsArchives->contains($contentsArchive)) {
                $this->doAddContentsArchive($contentsArchive);
            }
        }

        $this->collContentsArchives = $contentsArchives;

        return $this;
    }

    /**
     * Gets the number of File objects related by a many-to-many relationship
     * to the current object by way of the courses_contents_archives cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related File objects
     */
    public function countContentsArchives($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collContentsArchives || null !== $criteria) {
            if ($this->isNew() && null === $this->collContentsArchives) {
                return 0;
            } else {
                $query = FileQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByCourse($this)
                    ->count($con);
            }
        } else {
            return count($this->collContentsArchives);
        }
    }

    /**
     * Associate a File object to this object
     * through the courses_contents_archives cross reference table.
     *
     * @param  File $file The CoursesContentsArchives object to relate
     * @return Course The current object (for fluent API support)
     */
    public function addContentsArchive(File $file)
    {
        if ($this->collContentsArchives === null) {
            $this->initContentsArchives();
        }
        if (!$this->collContentsArchives->contains($file)) { // only add it if the **same** object is not already associated
            $this->doAddContentsArchive($file);

            $this->collContentsArchives[]= $file;
        }

        return $this;
    }

    /**
     * @param	ContentsArchive $contentsArchive The contentsArchive object to add.
     */
    protected function doAddContentsArchive($contentsArchive)
    {
        $coursesContentsArchives = new CoursesContentsArchives();
        $coursesContentsArchives->setContentsArchive($contentsArchive);
        $this->addCoursesContentsArchives($coursesContentsArchives);
    }

    /**
     * Remove a File object to this object
     * through the courses_contents_archives cross reference table.
     *
     * @param File $file The CoursesContentsArchives object to relate
     * @return Course The current object (for fluent API support)
     */
    public function removeContentsArchive(File $file)
    {
        if ($this->getContentsArchives()->contains($file)) {
            $this->collContentsArchives->remove($this->collContentsArchives->search($file));
            if (null === $this->contentsArchivesScheduledForDeletion) {
                $this->contentsArchivesScheduledForDeletion = clone $this->collContentsArchives;
                $this->contentsArchivesScheduledForDeletion->clear();
            }
            $this->contentsArchivesScheduledForDeletion[]= $file;
        }

        return $this;
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
        $this->alreadyInClearAllReferencesDeep = false;
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
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collCourseAliass) {
                foreach ($this->collCourseAliass as $o) {
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
            if ($this->collCourseUrls) {
                foreach ($this->collCourseUrls as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCoursesContentsArchivess) {
                foreach ($this->collCoursesContentsArchivess as $o) {
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
            if ($this->collContentsArchives) {
                foreach ($this->collContentsArchives as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aCursus instanceof Persistent) {
              $this->aCursus->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collCourseAliass instanceof PropelCollection) {
            $this->collCourseAliass->clearIterator();
        }
        $this->collCourseAliass = null;
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
        if ($this->collNewss instanceof PropelCollection) {
            $this->collNewss->clearIterator();
        }
        $this->collNewss = null;
        if ($this->collCourseUrls instanceof PropelCollection) {
            $this->collCourseUrls->clearIterator();
        }
        $this->collCourseUrls = null;
        if ($this->collCoursesContentsArchivess instanceof PropelCollection) {
            $this->collCoursesContentsArchivess->clearIterator();
        }
        $this->collCoursesContentsArchivess = null;
        if ($this->collOptionalEducationalPaths instanceof PropelCollection) {
            $this->collOptionalEducationalPaths->clearIterator();
        }
        $this->collOptionalEducationalPaths = null;
        if ($this->collMandatoryEducationalPaths instanceof PropelCollection) {
            $this->collMandatoryEducationalPaths->clearIterator();
        }
        $this->collMandatoryEducationalPaths = null;
        if ($this->collContentsArchives instanceof PropelCollection) {
            $this->collContentsArchives->clearIterator();
        }
        $this->collContentsArchives = null;
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
