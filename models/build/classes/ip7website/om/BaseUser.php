<?php


/**
 * Base class that represents a row from the 'users' table.
 *
 * 
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseUser extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'UserPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        UserPeer
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
     * The value for the username field.
     * @var        string
     */
    protected $username;

    /**
     * The value for the password_hash field.
     * @var        string
     */
    protected $password_hash;

    /**
     * The value for the type field.
     * Note: this column has a database default value of: (expression) 0
     * @var        int
     */
    protected $type;

    /**
     * The value for the firstname field.
     * @var        string
     */
    protected $firstname;

    /**
     * The value for the lastname field.
     * @var        string
     */
    protected $lastname;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the phone field.
     * @var        string
     */
    protected $phone;

    /**
     * The value for the address field.
     * @var        string
     */
    protected $address;

    /**
     * The value for the website field.
     * @var        string
     */
    protected $website;

    /**
     * The value for the birth_date field.
     * @var        string
     */
    protected $birth_date;

    /**
     * The value for the first_entry field.
     * @var        string
     */
    protected $first_entry;

    /**
     * The value for the last_entry field.
     * @var        string
     */
    protected $last_entry;

    /**
     * The value for the last_visit field.
     * @var        string
     */
    protected $last_visit;

    /**
     * The value for the visits_nb field.
     * Note: this column has a database default value of: (expression) 0
     * @var        int
     */
    protected $visits_nb;

    /**
     * The value for the config_show_email field.
     * Note: this column has a database default value of: (expression) 0
     * @var        boolean
     */
    protected $config_show_email;

    /**
     * The value for the config_show_phone field.
     * Note: this column has a database default value of: (expression) 0
     * @var        boolean
     */
    protected $config_show_phone;

    /**
     * The value for the config_show_real_name field.
     * Note: this column has a database default value of: (expression) 1
     * @var        boolean
     */
    protected $config_show_real_name;

    /**
     * The value for the deactivated field.
     * Note: this column has a database default value of: (expression) 0
     * @var        boolean
     */
    protected $deactivated;

    /**
     * The value for the is_a_teacher field.
     * Note: this column has a database default value of: (expression) 0
     * @var        boolean
     */
    protected $is_a_teacher;

    /**
     * The value for the is_a_student field.
     * Note: this column has a database default value of: (expression) 1
     * @var        boolean
     */
    protected $is_a_student;

    /**
     * The value for the avatar_id field.
     * @var        int
     */
    protected $avatar_id;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * Whether the lazy-loaded $description value has been loaded from database.
     * This is necessary to avoid repeated lookups if $description column is NULL in the db.
     * @var        boolean
     */
    protected $description_isLoaded = false;

    /**
     * The value for the comments field.
     * @var        string
     */
    protected $comments;

    /**
     * Whether the lazy-loaded $comments value has been loaded from database.
     * This is necessary to avoid repeated lookups if $comments column is NULL in the db.
     * @var        boolean
     */
    protected $comments_isLoaded = false;

    /**
     * @var        File
     */
    protected $aAvatar;

    /**
     * @var        PropelObjectCollection|Cursus[] Collection to store aggregation of Cursus objects.
     */
    protected $collCursuss;

    /**
     * @var        PropelObjectCollection|UsersCursus[] Collection to store aggregation of UsersCursus objects.
     */
    protected $collUsersCursuss;

    /**
     * @var        PropelObjectCollection|File[] Collection to store aggregation of File objects.
     */
    protected $collFilesRelatedByAuthorId;

    /**
     * @var        PropelObjectCollection|NewslettersSubscribers[] Collection to store aggregation of NewslettersSubscribers objects.
     */
    protected $collNewslettersSubscriberss;

    /**
     * @var        PropelObjectCollection|Alert[] Collection to store aggregation of Alert objects.
     */
    protected $collAlerts;

    /**
     * @var        PropelObjectCollection|Content[] Collection to store aggregation of Content objects.
     */
    protected $collContents;

    /**
     * @var        PropelObjectCollection|Comment[] Collection to store aggregation of Comment objects.
     */
    protected $collComments;

    /**
     * @var        PropelObjectCollection|Report[] Collection to store aggregation of Report objects.
     */
    protected $collReports;

    /**
     * @var        PropelObjectCollection|Note[] Collection to store aggregation of Note objects.
     */
    protected $collNotes;

    /**
     * @var        PropelObjectCollection|News[] Collection to store aggregation of News objects.
     */
    protected $collNewss;

    /**
     * @var        PropelObjectCollection|Ad[] Collection to store aggregation of Ad objects.
     */
    protected $collAds;

    /**
     * @var        PropelObjectCollection|Transaction[] Collection to store aggregation of Transaction objects.
     */
    protected $collTransactions;

    /**
     * @var        PropelObjectCollection|ForumMessage[] Collection to store aggregation of ForumMessage objects.
     */
    protected $collForumMessages;

    /**
     * @var        PropelObjectCollection|ScheduledCourse[] Collection to store aggregation of ScheduledCourse objects.
     */
    protected $collScheduledCourses;

    /**
     * @var        PropelObjectCollection|Cursus[] Collection to store aggregation of Cursus objects.
     */
    protected $collCursuss;

    /**
     * @var        PropelObjectCollection|Newsletter[] Collection to store aggregation of Newsletter objects.
     */
    protected $collNewsletters;

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
    protected $cursussScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $newslettersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $cursussScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $usersCursussScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $filesRelatedByAuthorIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $newslettersSubscriberssScheduledForDeletion = null;

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
    protected $commentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $reportsScheduledForDeletion = null;

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
    protected $adsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $transactionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $forumMessagesScheduledForDeletion = null;

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
     * Initializes internal state of BaseUser object.
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
     * @return   int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [username] column value.
     * 
     * @return   string
     */
    public function getUsername()
    {

        return $this->username;
    }

    /**
     * Get the [password_hash] column value.
     * 
     * @return   string
     */
    public function getPasswordHash()
    {

        return $this->password_hash;
    }

    /**
     * Get the [type] column value.
     * 
     * @return   int
     */
    public function getType()
    {

        return $this->type;
    }

    /**
     * Get the [firstname] column value.
     * 
     * @return   string
     */
    public function getFirstname()
    {

        return $this->firstname;
    }

    /**
     * Get the [lastname] column value.
     * 
     * @return   string
     */
    public function getLastname()
    {

        return $this->lastname;
    }

    /**
     * Get the [email] column value.
     * 
     * @return   string
     */
    public function getEmail()
    {

        return $this->email;
    }

    /**
     * Get the [phone] column value.
     * 
     * @return   string
     */
    public function getPhone()
    {

        return $this->phone;
    }

    /**
     * Get the [address] column value.
     * 
     * @return   string
     */
    public function getAddress()
    {

        return $this->address;
    }

    /**
     * Get the [website] column value.
     * 
     * @return   string
     */
    public function getWebsite()
    {

        return $this->website;
    }

    /**
     * Get the [optionally formatted] temporal [birth_date] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBirthDate($format = '%x')
    {
        if ($this->birth_date === null) {
            return null;
        }


        if ($this->birth_date === '0000-00-00') {
            // while technically this is not a default value of NULL,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->birth_date);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->birth_date, true), $x);
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
     * Get the [optionally formatted] temporal [first_entry] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFirstEntry($format = '%x')
    {
        if ($this->first_entry === null) {
            return null;
        }


        if ($this->first_entry === '0000-00-00') {
            // while technically this is not a default value of NULL,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->first_entry);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->first_entry, true), $x);
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
     * Get the [optionally formatted] temporal [last_entry] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastEntry($format = '%x')
    {
        if ($this->last_entry === null) {
            return null;
        }


        if ($this->last_entry === '0000-00-00') {
            // while technically this is not a default value of NULL,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->last_entry);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_entry, true), $x);
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
     * Get the [optionally formatted] temporal [last_visit] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastVisit($format = '{d-m-Y H:i:s}')
    {
        if ($this->last_visit === null) {
            return null;
        }


        if ($this->last_visit === '0000-00-00 00:00:00') {
            // while technically this is not a default value of NULL,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->last_visit);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_visit, true), $x);
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
     * Get the [visits_nb] column value.
     * 
     * @return   int
     */
    public function getVisitsNb()
    {

        return $this->visits_nb;
    }

    /**
     * Get the [config_show_email] column value.
     * 
     * @return   boolean
     */
    public function getConfigShowEmail()
    {

        return $this->config_show_email;
    }

    /**
     * Get the [config_show_phone] column value.
     * 
     * @return   boolean
     */
    public function getConfigShowPhone()
    {

        return $this->config_show_phone;
    }

    /**
     * Get the [config_show_real_name] column value.
     * 
     * @return   boolean
     */
    public function getConfigShowRealName()
    {

        return $this->config_show_real_name;
    }

    /**
     * Get the [deactivated] column value.
     * 
     * @return   boolean
     */
    public function getDeactivated()
    {

        return $this->deactivated;
    }

    /**
     * Get the [is_a_teacher] column value.
     * 
     * @return   boolean
     */
    public function getIsATeacher()
    {

        return $this->is_a_teacher;
    }

    /**
     * Get the [is_a_student] column value.
     * 
     * @return   boolean
     */
    public function getIsAStudent()
    {

        return $this->is_a_student;
    }

    /**
     * Get the [avatar_id] column value.
     * 
     * @return   int
     */
    public function getAvatarId()
    {

        return $this->avatar_id;
    }

    /**
     * Get the [description] column value.
     * 
     * @param      PropelPDO $con An optional PropelPDO connection to use for fetching this lazy-loaded column.
     * @return   string
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
        $c->addSelectColumn(UserPeer::DESCRIPTION);
        try {
            $stmt = UserPeer::doSelectStmt($c, $con);
            $row = $stmt->fetch(PDO::FETCH_NUM);
            $stmt->closeCursor();
            $this->description = ($row[0] !== null) ? (string) $row[0] : null;
            $this->description_isLoaded = true;
        } catch (Exception $e) {
            throw new PropelException("Error loading value for [description] column on demand.", $e);
        }
    }
    /**
     * Get the [comments] column value.
     * 
     * @param      PropelPDO $con An optional PropelPDO connection to use for fetching this lazy-loaded column.
     * @return   string
     */
    public function getComments(PropelPDO $con = null)
    {
        if (!$this->comments_isLoaded && $this->comments === null && !$this->isNew()) {
            $this->loadComments($con);
        }


        return $this->comments;
    }

    /**
     * Load the value for the lazy-loaded [comments] column.
     *
     * This method performs an additional query to return the value for
     * the [comments] column, since it is not populated by
     * the hydrate() method.
     *
     * @param  PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - any underlying error will be wrapped and re-thrown.
     */
    protected function loadComments(PropelPDO $con = null)
    {
        $c = $this->buildPkeyCriteria();
        $c->addSelectColumn(UserPeer::COMMENTS);
        try {
            $stmt = UserPeer::doSelectStmt($c, $con);
            $row = $stmt->fetch(PDO::FETCH_NUM);
            $stmt->closeCursor();
            $this->comments = ($row[0] !== null) ? (string) $row[0] : null;
            $this->comments_isLoaded = true;
        } catch (Exception $e) {
            throw new PropelException("Error loading value for [comments] column on demand.", $e);
        }
    }
    /**
     * Set the value of [id] column.
     * 
     * @param      int $v new value
     * @return   User The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = UserPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [username] column.
     * 
     * @param      string $v new value
     * @return   User The current object (for fluent API support)
     */
    public function setUsername($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->username !== $v) {
            $this->username = $v;
            $this->modifiedColumns[] = UserPeer::USERNAME;
        }


        return $this;
    } // setUsername()

    /**
     * Set the value of [password_hash] column.
     * 
     * @param      string $v new value
     * @return   User The current object (for fluent API support)
     */
    public function setPasswordHash($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password_hash !== $v) {
            $this->password_hash = $v;
            $this->modifiedColumns[] = UserPeer::PASSWORD_HASH;
        }


        return $this;
    } // setPasswordHash()

    /**
     * Set the value of [type] column.
     * 
     * @param      int $v new value
     * @return   User The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[] = UserPeer::TYPE;
        }


        return $this;
    } // setType()

    /**
     * Set the value of [firstname] column.
     * 
     * @param      string $v new value
     * @return   User The current object (for fluent API support)
     */
    public function setFirstname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->firstname !== $v) {
            $this->firstname = $v;
            $this->modifiedColumns[] = UserPeer::FIRSTNAME;
        }


        return $this;
    } // setFirstname()

    /**
     * Set the value of [lastname] column.
     * 
     * @param      string $v new value
     * @return   User The current object (for fluent API support)
     */
    public function setLastname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lastname !== $v) {
            $this->lastname = $v;
            $this->modifiedColumns[] = UserPeer::LASTNAME;
        }


        return $this;
    } // setLastname()

    /**
     * Set the value of [email] column.
     * 
     * @param      string $v new value
     * @return   User The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = UserPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [phone] column.
     * 
     * @param      string $v new value
     * @return   User The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[] = UserPeer::PHONE;
        }


        return $this;
    } // setPhone()

    /**
     * Set the value of [address] column.
     * 
     * @param      string $v new value
     * @return   User The current object (for fluent API support)
     */
    public function setAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address !== $v) {
            $this->address = $v;
            $this->modifiedColumns[] = UserPeer::ADDRESS;
        }


        return $this;
    } // setAddress()

    /**
     * Set the value of [website] column.
     * 
     * @param      string $v new value
     * @return   User The current object (for fluent API support)
     */
    public function setWebsite($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->website !== $v) {
            $this->website = $v;
            $this->modifiedColumns[] = UserPeer::WEBSITE;
        }


        return $this;
    } // setWebsite()

    /**
     * Sets the value of [birth_date] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   User The current object (for fluent API support)
     */
    public function setBirthDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->birth_date !== null || $dt !== null) {
            $currentDateAsString = ($this->birth_date !== null && $tmpDt = new DateTime($this->birth_date)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->birth_date = $newDateAsString;
                $this->modifiedColumns[] = UserPeer::BIRTH_DATE;
            }
        } // if either are not null


        return $this;
    } // setBirthDate()

    /**
     * Sets the value of [first_entry] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   User The current object (for fluent API support)
     */
    public function setFirstEntry($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->first_entry !== null || $dt !== null) {
            $currentDateAsString = ($this->first_entry !== null && $tmpDt = new DateTime($this->first_entry)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->first_entry = $newDateAsString;
                $this->modifiedColumns[] = UserPeer::FIRST_ENTRY;
            }
        } // if either are not null


        return $this;
    } // setFirstEntry()

    /**
     * Sets the value of [last_entry] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   User The current object (for fluent API support)
     */
    public function setLastEntry($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_entry !== null || $dt !== null) {
            $currentDateAsString = ($this->last_entry !== null && $tmpDt = new DateTime($this->last_entry)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_entry = $newDateAsString;
                $this->modifiedColumns[] = UserPeer::LAST_ENTRY;
            }
        } // if either are not null


        return $this;
    } // setLastEntry()

    /**
     * Sets the value of [last_visit] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   User The current object (for fluent API support)
     */
    public function setLastVisit($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_visit !== null || $dt !== null) {
            $currentDateAsString = ($this->last_visit !== null && $tmpDt = new DateTime($this->last_visit)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_visit = $newDateAsString;
                $this->modifiedColumns[] = UserPeer::LAST_VISIT;
            }
        } // if either are not null


        return $this;
    } // setLastVisit()

    /**
     * Set the value of [visits_nb] column.
     * 
     * @param      int $v new value
     * @return   User The current object (for fluent API support)
     */
    public function setVisitsNb($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->visits_nb !== $v) {
            $this->visits_nb = $v;
            $this->modifiedColumns[] = UserPeer::VISITS_NB;
        }


        return $this;
    } // setVisitsNb()

    /**
     * Sets the value of the [config_show_email] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * 
     * @param      boolean|integer|string $v The new value
     * @return   User The current object (for fluent API support)
     */
    public function setConfigShowEmail($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->config_show_email !== $v) {
            $this->config_show_email = $v;
            $this->modifiedColumns[] = UserPeer::CONFIG_SHOW_EMAIL;
        }


        return $this;
    } // setConfigShowEmail()

    /**
     * Sets the value of the [config_show_phone] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * 
     * @param      boolean|integer|string $v The new value
     * @return   User The current object (for fluent API support)
     */
    public function setConfigShowPhone($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->config_show_phone !== $v) {
            $this->config_show_phone = $v;
            $this->modifiedColumns[] = UserPeer::CONFIG_SHOW_PHONE;
        }


        return $this;
    } // setConfigShowPhone()

    /**
     * Sets the value of the [config_show_real_name] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * 
     * @param      boolean|integer|string $v The new value
     * @return   User The current object (for fluent API support)
     */
    public function setConfigShowRealName($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->config_show_real_name !== $v) {
            $this->config_show_real_name = $v;
            $this->modifiedColumns[] = UserPeer::CONFIG_SHOW_REAL_NAME;
        }


        return $this;
    } // setConfigShowRealName()

    /**
     * Sets the value of the [deactivated] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * 
     * @param      boolean|integer|string $v The new value
     * @return   User The current object (for fluent API support)
     */
    public function setDeactivated($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->deactivated !== $v) {
            $this->deactivated = $v;
            $this->modifiedColumns[] = UserPeer::DEACTIVATED;
        }


        return $this;
    } // setDeactivated()

    /**
     * Sets the value of the [is_a_teacher] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * 
     * @param      boolean|integer|string $v The new value
     * @return   User The current object (for fluent API support)
     */
    public function setIsATeacher($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_a_teacher !== $v) {
            $this->is_a_teacher = $v;
            $this->modifiedColumns[] = UserPeer::IS_A_TEACHER;
        }


        return $this;
    } // setIsATeacher()

    /**
     * Sets the value of the [is_a_student] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * 
     * @param      boolean|integer|string $v The new value
     * @return   User The current object (for fluent API support)
     */
    public function setIsAStudent($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_a_student !== $v) {
            $this->is_a_student = $v;
            $this->modifiedColumns[] = UserPeer::IS_A_STUDENT;
        }


        return $this;
    } // setIsAStudent()

    /**
     * Set the value of [avatar_id] column.
     * 
     * @param      int $v new value
     * @return   User The current object (for fluent API support)
     */
    public function setAvatarId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->avatar_id !== $v) {
            $this->avatar_id = $v;
            $this->modifiedColumns[] = UserPeer::AVATAR_ID;
        }

        if ($this->aAvatar !== null && $this->aAvatar->getId() !== $v) {
            $this->aAvatar = null;
        }


        return $this;
    } // setAvatarId()

    /**
     * Set the value of [description] column.
     * 
     * @param      string $v new value
     * @return   User The current object (for fluent API support)
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
            $this->modifiedColumns[] = UserPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [comments] column.
     * 
     * @param      string $v new value
     * @return   User The current object (for fluent API support)
     */
    public function setComments($v)
    {
        // explicitly set the is-loaded flag to true for this lazy load col;
        // it doesn't matter if the value is actually set or not (logic below) as
        // any attempt to set the value means that no db lookup should be performed
        // when the getComments() method is called.
        $this->comments_isLoaded = true;

        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->comments !== $v) {
            $this->comments = $v;
            $this->modifiedColumns[] = UserPeer::COMMENTS;
        }


        return $this;
    } // setComments()

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
            $this->username = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->password_hash = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->type = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->firstname = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->lastname = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->email = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->phone = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->address = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->website = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->birth_date = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->first_entry = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->last_entry = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->last_visit = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->visits_nb = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->config_show_email = ($row[$startcol + 15] !== null) ? (boolean) $row[$startcol + 15] : null;
            $this->config_show_phone = ($row[$startcol + 16] !== null) ? (boolean) $row[$startcol + 16] : null;
            $this->config_show_real_name = ($row[$startcol + 17] !== null) ? (boolean) $row[$startcol + 17] : null;
            $this->deactivated = ($row[$startcol + 18] !== null) ? (boolean) $row[$startcol + 18] : null;
            $this->is_a_teacher = ($row[$startcol + 19] !== null) ? (boolean) $row[$startcol + 19] : null;
            $this->is_a_student = ($row[$startcol + 20] !== null) ? (boolean) $row[$startcol + 20] : null;
            $this->avatar_id = ($row[$startcol + 21] !== null) ? (int) $row[$startcol + 21] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 22; // 22 = UserPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating User object", $e);
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

        if ($this->aAvatar !== null && $this->avatar_id !== $this->aAvatar->getId()) {
            $this->aAvatar = null;
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
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = UserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        // Reset the description lazy-load column
        $this->description = null;
        $this->description_isLoaded = false;

        // Reset the comments lazy-load column
        $this->comments = null;
        $this->comments_isLoaded = false;

        if ($deep) {  // also de-associate any related objects?

            $this->aAvatar = null;
            $this->collCursuss = null;

            $this->collUsersCursuss = null;

            $this->collFilesRelatedByAuthorId = null;

            $this->collNewslettersSubscriberss = null;

            $this->collAlerts = null;

            $this->collContents = null;

            $this->collComments = null;

            $this->collReports = null;

            $this->collNotes = null;

            $this->collNewss = null;

            $this->collAds = null;

            $this->collTransactions = null;

            $this->collForumMessages = null;

            $this->collScheduledCourses = null;

            $this->collCursuss = null;
            $this->collNewsletters = null;
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
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = UserQuery::create()
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
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                UserPeer::addInstanceToPool($this);
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

            if ($this->aAvatar !== null) {
                if ($this->aAvatar->isModified() || $this->aAvatar->isNew()) {
                    $affectedRows += $this->aAvatar->save($con);
                }
                $this->setAvatar($this->aAvatar);
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

            if ($this->cursussScheduledForDeletion !== null) {
                if (!$this->cursussScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->cursussScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($pk, $remotePk);
                    }
                    UsersCursusQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->cursussScheduledForDeletion = null;
                }

                foreach ($this->getCursuss() as $cursus) {
                    if ($cursus->isModified()) {
                        $cursus->save($con);
                    }
                }
            }

            if ($this->newslettersScheduledForDeletion !== null) {
                if (!$this->newslettersScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->newslettersScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($pk, $remotePk);
                    }
                    NewslettersSubscribersQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->newslettersScheduledForDeletion = null;
                }

                foreach ($this->getNewsletters() as $newsletter) {
                    if ($newsletter->isModified()) {
                        $newsletter->save($con);
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

            if ($this->filesRelatedByAuthorIdScheduledForDeletion !== null) {
                if (!$this->filesRelatedByAuthorIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->filesRelatedByAuthorIdScheduledForDeletion as $fileRelatedByAuthorId) {
                        // need to save related object because we set the relation to null
                        $fileRelatedByAuthorId->save($con);
                    }
                    $this->filesRelatedByAuthorIdScheduledForDeletion = null;
                }
            }

            if ($this->collFilesRelatedByAuthorId !== null) {
                foreach ($this->collFilesRelatedByAuthorId as $referrerFK) {
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

            if ($this->alertsScheduledForDeletion !== null) {
                if (!$this->alertsScheduledForDeletion->isEmpty()) {
                    AlertQuery::create()
                        ->filterByPrimaryKeys($this->alertsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

            if ($this->commentsScheduledForDeletion !== null) {
                if (!$this->commentsScheduledForDeletion->isEmpty()) {
                    foreach ($this->commentsScheduledForDeletion as $comment) {
                        // need to save related object because we set the relation to null
                        $comment->save($con);
                    }
                    $this->commentsScheduledForDeletion = null;
                }
            }

            if ($this->collComments !== null) {
                foreach ($this->collComments as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->reportsScheduledForDeletion !== null) {
                if (!$this->reportsScheduledForDeletion->isEmpty()) {
                    foreach ($this->reportsScheduledForDeletion as $report) {
                        // need to save related object because we set the relation to null
                        $report->save($con);
                    }
                    $this->reportsScheduledForDeletion = null;
                }
            }

            if ($this->collReports !== null) {
                foreach ($this->collReports as $referrerFK) {
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
                    NewsQuery::create()
                        ->filterByPrimaryKeys($this->newssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

            if ($this->adsScheduledForDeletion !== null) {
                if (!$this->adsScheduledForDeletion->isEmpty()) {
                    AdQuery::create()
                        ->filterByPrimaryKeys($this->adsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->adsScheduledForDeletion = null;
                }
            }

            if ($this->collAds !== null) {
                foreach ($this->collAds as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->transactionsScheduledForDeletion !== null) {
                if (!$this->transactionsScheduledForDeletion->isEmpty()) {
                    foreach ($this->transactionsScheduledForDeletion as $transaction) {
                        // need to save related object because we set the relation to null
                        $transaction->save($con);
                    }
                    $this->transactionsScheduledForDeletion = null;
                }
            }

            if ($this->collTransactions !== null) {
                foreach ($this->collTransactions as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->forumMessagesScheduledForDeletion !== null) {
                if (!$this->forumMessagesScheduledForDeletion->isEmpty()) {
                    ForumMessageQuery::create()
                        ->filterByPrimaryKeys($this->forumMessagesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->forumMessagesScheduledForDeletion = null;
                }
            }

            if ($this->collForumMessages !== null) {
                foreach ($this->collForumMessages as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->scheduledCoursesScheduledForDeletion !== null) {
                if (!$this->scheduledCoursesScheduledForDeletion->isEmpty()) {
                    foreach ($this->scheduledCoursesScheduledForDeletion as $scheduledCourse) {
                        // need to save related object because we set the relation to null
                        $scheduledCourse->save($con);
                    }
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
     * @param      PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = UserPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UserPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UserPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(UserPeer::USERNAME)) {
            $modifiedColumns[':p' . $index++]  = '`USERNAME`';
        }
        if ($this->isColumnModified(UserPeer::PASSWORD_HASH)) {
            $modifiedColumns[':p' . $index++]  = '`PASSWORD_HASH`';
        }
        if ($this->isColumnModified(UserPeer::TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`TYPE`';
        }
        if ($this->isColumnModified(UserPeer::FIRSTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`FIRSTNAME`';
        }
        if ($this->isColumnModified(UserPeer::LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`LASTNAME`';
        }
        if ($this->isColumnModified(UserPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`EMAIL`';
        }
        if ($this->isColumnModified(UserPeer::PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`PHONE`';
        }
        if ($this->isColumnModified(UserPeer::ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`ADDRESS`';
        }
        if ($this->isColumnModified(UserPeer::WEBSITE)) {
            $modifiedColumns[':p' . $index++]  = '`WEBSITE`';
        }
        if ($this->isColumnModified(UserPeer::BIRTH_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`BIRTH_DATE`';
        }
        if ($this->isColumnModified(UserPeer::FIRST_ENTRY)) {
            $modifiedColumns[':p' . $index++]  = '`FIRST_ENTRY`';
        }
        if ($this->isColumnModified(UserPeer::LAST_ENTRY)) {
            $modifiedColumns[':p' . $index++]  = '`LAST_ENTRY`';
        }
        if ($this->isColumnModified(UserPeer::LAST_VISIT)) {
            $modifiedColumns[':p' . $index++]  = '`LAST_VISIT`';
        }
        if ($this->isColumnModified(UserPeer::VISITS_NB)) {
            $modifiedColumns[':p' . $index++]  = '`VISITS_NB`';
        }
        if ($this->isColumnModified(UserPeer::CONFIG_SHOW_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`CONFIG_SHOW_EMAIL`';
        }
        if ($this->isColumnModified(UserPeer::CONFIG_SHOW_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`CONFIG_SHOW_PHONE`';
        }
        if ($this->isColumnModified(UserPeer::CONFIG_SHOW_REAL_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`CONFIG_SHOW_REAL_NAME`';
        }
        if ($this->isColumnModified(UserPeer::DEACTIVATED)) {
            $modifiedColumns[':p' . $index++]  = '`DEACTIVATED`';
        }
        if ($this->isColumnModified(UserPeer::IS_A_TEACHER)) {
            $modifiedColumns[':p' . $index++]  = '`IS_A_TEACHER`';
        }
        if ($this->isColumnModified(UserPeer::IS_A_STUDENT)) {
            $modifiedColumns[':p' . $index++]  = '`IS_A_STUDENT`';
        }
        if ($this->isColumnModified(UserPeer::AVATAR_ID)) {
            $modifiedColumns[':p' . $index++]  = '`AVATAR_ID`';
        }
        if ($this->isColumnModified(UserPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }
        if ($this->isColumnModified(UserPeer::COMMENTS)) {
            $modifiedColumns[':p' . $index++]  = '`COMMENTS`';
        }

        $sql = sprintf(
            'INSERT INTO `users` (%s) VALUES (%s)',
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
                    case '`USERNAME`':
						$stmt->bindValue($identifier, $this->username, PDO::PARAM_STR);
                        break;
                    case '`PASSWORD_HASH`':
						$stmt->bindValue($identifier, $this->password_hash, PDO::PARAM_STR);
                        break;
                    case '`TYPE`':
						$stmt->bindValue($identifier, $this->type, PDO::PARAM_INT);
                        break;
                    case '`FIRSTNAME`':
						$stmt->bindValue($identifier, $this->firstname, PDO::PARAM_STR);
                        break;
                    case '`LASTNAME`':
						$stmt->bindValue($identifier, $this->lastname, PDO::PARAM_STR);
                        break;
                    case '`EMAIL`':
						$stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '`PHONE`':
						$stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case '`ADDRESS`':
						$stmt->bindValue($identifier, $this->address, PDO::PARAM_STR);
                        break;
                    case '`WEBSITE`':
						$stmt->bindValue($identifier, $this->website, PDO::PARAM_STR);
                        break;
                    case '`BIRTH_DATE`':
						$stmt->bindValue($identifier, $this->birth_date, PDO::PARAM_STR);
                        break;
                    case '`FIRST_ENTRY`':
						$stmt->bindValue($identifier, $this->first_entry, PDO::PARAM_STR);
                        break;
                    case '`LAST_ENTRY`':
						$stmt->bindValue($identifier, $this->last_entry, PDO::PARAM_STR);
                        break;
                    case '`LAST_VISIT`':
						$stmt->bindValue($identifier, $this->last_visit, PDO::PARAM_STR);
                        break;
                    case '`VISITS_NB`':
						$stmt->bindValue($identifier, $this->visits_nb, PDO::PARAM_INT);
                        break;
                    case '`CONFIG_SHOW_EMAIL`':
						$stmt->bindValue($identifier, (int) $this->config_show_email, PDO::PARAM_INT);
                        break;
                    case '`CONFIG_SHOW_PHONE`':
						$stmt->bindValue($identifier, (int) $this->config_show_phone, PDO::PARAM_INT);
                        break;
                    case '`CONFIG_SHOW_REAL_NAME`':
						$stmt->bindValue($identifier, (int) $this->config_show_real_name, PDO::PARAM_INT);
                        break;
                    case '`DEACTIVATED`':
						$stmt->bindValue($identifier, (int) $this->deactivated, PDO::PARAM_INT);
                        break;
                    case '`IS_A_TEACHER`':
						$stmt->bindValue($identifier, (int) $this->is_a_teacher, PDO::PARAM_INT);
                        break;
                    case '`IS_A_STUDENT`':
						$stmt->bindValue($identifier, (int) $this->is_a_student, PDO::PARAM_INT);
                        break;
                    case '`AVATAR_ID`':
						$stmt->bindValue($identifier, $this->avatar_id, PDO::PARAM_INT);
                        break;
                    case '`DESCRIPTION`':
						$stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`COMMENTS`':
						$stmt->bindValue($identifier, $this->comments, PDO::PARAM_STR);
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

            if ($this->aAvatar !== null) {
                if (!$this->aAvatar->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAvatar->getValidationFailures());
                }
            }


            if (($retval = UserPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCursuss !== null) {
                    foreach ($this->collCursuss as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUsersCursuss !== null) {
                    foreach ($this->collUsersCursuss as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collFilesRelatedByAuthorId !== null) {
                    foreach ($this->collFilesRelatedByAuthorId as $referrerFK) {
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

                if ($this->collComments !== null) {
                    foreach ($this->collComments as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collReports !== null) {
                    foreach ($this->collReports as $referrerFK) {
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

                if ($this->collAds !== null) {
                    foreach ($this->collAds as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTransactions !== null) {
                    foreach ($this->collTransactions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collForumMessages !== null) {
                    foreach ($this->collForumMessages as $referrerFK) {
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
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getUsername();
                break;
            case 2:
                return $this->getPasswordHash();
                break;
            case 3:
                return $this->getType();
                break;
            case 4:
                return $this->getFirstname();
                break;
            case 5:
                return $this->getLastname();
                break;
            case 6:
                return $this->getEmail();
                break;
            case 7:
                return $this->getPhone();
                break;
            case 8:
                return $this->getAddress();
                break;
            case 9:
                return $this->getWebsite();
                break;
            case 10:
                return $this->getBirthDate();
                break;
            case 11:
                return $this->getFirstEntry();
                break;
            case 12:
                return $this->getLastEntry();
                break;
            case 13:
                return $this->getLastVisit();
                break;
            case 14:
                return $this->getVisitsNb();
                break;
            case 15:
                return $this->getConfigShowEmail();
                break;
            case 16:
                return $this->getConfigShowPhone();
                break;
            case 17:
                return $this->getConfigShowRealName();
                break;
            case 18:
                return $this->getDeactivated();
                break;
            case 19:
                return $this->getIsATeacher();
                break;
            case 20:
                return $this->getIsAStudent();
                break;
            case 21:
                return $this->getAvatarId();
                break;
            case 22:
                return $this->getDescription();
                break;
            case 23:
                return $this->getComments();
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
        if (isset($alreadyDumpedObjects['User'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['User'][$this->getPrimaryKey()] = true;
        $keys = UserPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getUsername(),
            $keys[2] => $this->getPasswordHash(),
            $keys[3] => $this->getType(),
            $keys[4] => $this->getFirstname(),
            $keys[5] => $this->getLastname(),
            $keys[6] => $this->getEmail(),
            $keys[7] => $this->getPhone(),
            $keys[8] => $this->getAddress(),
            $keys[9] => $this->getWebsite(),
            $keys[10] => $this->getBirthDate(),
            $keys[11] => $this->getFirstEntry(),
            $keys[12] => $this->getLastEntry(),
            $keys[13] => $this->getLastVisit(),
            $keys[14] => $this->getVisitsNb(),
            $keys[15] => $this->getConfigShowEmail(),
            $keys[16] => $this->getConfigShowPhone(),
            $keys[17] => $this->getConfigShowRealName(),
            $keys[18] => $this->getDeactivated(),
            $keys[19] => $this->getIsATeacher(),
            $keys[20] => $this->getIsAStudent(),
            $keys[21] => $this->getAvatarId(),
            $keys[22] => ($includeLazyLoadColumns) ? $this->getDescription() : null,
            $keys[23] => ($includeLazyLoadColumns) ? $this->getComments() : null,
        );
        if ($includeForeignObjects) {
            if (null !== $this->aAvatar) {
                $result['Avatar'] = $this->aAvatar->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collCursuss) {
                $result['Cursuss'] = $this->collCursuss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUsersCursuss) {
                $result['UsersCursuss'] = $this->collUsersCursuss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFilesRelatedByAuthorId) {
                $result['FilesRelatedByAuthorId'] = $this->collFilesRelatedByAuthorId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNewslettersSubscriberss) {
                $result['NewslettersSubscriberss'] = $this->collNewslettersSubscriberss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAlerts) {
                $result['Alerts'] = $this->collAlerts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collContents) {
                $result['Contents'] = $this->collContents->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collComments) {
                $result['Comments'] = $this->collComments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collReports) {
                $result['Reports'] = $this->collReports->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNotes) {
                $result['Notes'] = $this->collNotes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNewss) {
                $result['Newss'] = $this->collNewss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAds) {
                $result['Ads'] = $this->collAds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTransactions) {
                $result['Transactions'] = $this->collTransactions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collForumMessages) {
                $result['ForumMessages'] = $this->collForumMessages->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setUsername($value);
                break;
            case 2:
                $this->setPasswordHash($value);
                break;
            case 3:
                $this->setType($value);
                break;
            case 4:
                $this->setFirstname($value);
                break;
            case 5:
                $this->setLastname($value);
                break;
            case 6:
                $this->setEmail($value);
                break;
            case 7:
                $this->setPhone($value);
                break;
            case 8:
                $this->setAddress($value);
                break;
            case 9:
                $this->setWebsite($value);
                break;
            case 10:
                $this->setBirthDate($value);
                break;
            case 11:
                $this->setFirstEntry($value);
                break;
            case 12:
                $this->setLastEntry($value);
                break;
            case 13:
                $this->setLastVisit($value);
                break;
            case 14:
                $this->setVisitsNb($value);
                break;
            case 15:
                $this->setConfigShowEmail($value);
                break;
            case 16:
                $this->setConfigShowPhone($value);
                break;
            case 17:
                $this->setConfigShowRealName($value);
                break;
            case 18:
                $this->setDeactivated($value);
                break;
            case 19:
                $this->setIsATeacher($value);
                break;
            case 20:
                $this->setIsAStudent($value);
                break;
            case 21:
                $this->setAvatarId($value);
                break;
            case 22:
                $this->setDescription($value);
                break;
            case 23:
                $this->setComments($value);
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
        $keys = UserPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setUsername($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPasswordHash($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setType($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFirstname($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setLastname($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setEmail($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPhone($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setAddress($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setWebsite($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setBirthDate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setFirstEntry($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setLastEntry($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setLastVisit($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setVisitsNb($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setConfigShowEmail($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setConfigShowPhone($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setConfigShowRealName($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setDeactivated($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setIsATeacher($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setIsAStudent($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setAvatarId($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setDescription($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setComments($arr[$keys[23]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(UserPeer::DATABASE_NAME);

        if ($this->isColumnModified(UserPeer::ID)) $criteria->add(UserPeer::ID, $this->id);
        if ($this->isColumnModified(UserPeer::USERNAME)) $criteria->add(UserPeer::USERNAME, $this->username);
        if ($this->isColumnModified(UserPeer::PASSWORD_HASH)) $criteria->add(UserPeer::PASSWORD_HASH, $this->password_hash);
        if ($this->isColumnModified(UserPeer::TYPE)) $criteria->add(UserPeer::TYPE, $this->type);
        if ($this->isColumnModified(UserPeer::FIRSTNAME)) $criteria->add(UserPeer::FIRSTNAME, $this->firstname);
        if ($this->isColumnModified(UserPeer::LASTNAME)) $criteria->add(UserPeer::LASTNAME, $this->lastname);
        if ($this->isColumnModified(UserPeer::EMAIL)) $criteria->add(UserPeer::EMAIL, $this->email);
        if ($this->isColumnModified(UserPeer::PHONE)) $criteria->add(UserPeer::PHONE, $this->phone);
        if ($this->isColumnModified(UserPeer::ADDRESS)) $criteria->add(UserPeer::ADDRESS, $this->address);
        if ($this->isColumnModified(UserPeer::WEBSITE)) $criteria->add(UserPeer::WEBSITE, $this->website);
        if ($this->isColumnModified(UserPeer::BIRTH_DATE)) $criteria->add(UserPeer::BIRTH_DATE, $this->birth_date);
        if ($this->isColumnModified(UserPeer::FIRST_ENTRY)) $criteria->add(UserPeer::FIRST_ENTRY, $this->first_entry);
        if ($this->isColumnModified(UserPeer::LAST_ENTRY)) $criteria->add(UserPeer::LAST_ENTRY, $this->last_entry);
        if ($this->isColumnModified(UserPeer::LAST_VISIT)) $criteria->add(UserPeer::LAST_VISIT, $this->last_visit);
        if ($this->isColumnModified(UserPeer::VISITS_NB)) $criteria->add(UserPeer::VISITS_NB, $this->visits_nb);
        if ($this->isColumnModified(UserPeer::CONFIG_SHOW_EMAIL)) $criteria->add(UserPeer::CONFIG_SHOW_EMAIL, $this->config_show_email);
        if ($this->isColumnModified(UserPeer::CONFIG_SHOW_PHONE)) $criteria->add(UserPeer::CONFIG_SHOW_PHONE, $this->config_show_phone);
        if ($this->isColumnModified(UserPeer::CONFIG_SHOW_REAL_NAME)) $criteria->add(UserPeer::CONFIG_SHOW_REAL_NAME, $this->config_show_real_name);
        if ($this->isColumnModified(UserPeer::DEACTIVATED)) $criteria->add(UserPeer::DEACTIVATED, $this->deactivated);
        if ($this->isColumnModified(UserPeer::IS_A_TEACHER)) $criteria->add(UserPeer::IS_A_TEACHER, $this->is_a_teacher);
        if ($this->isColumnModified(UserPeer::IS_A_STUDENT)) $criteria->add(UserPeer::IS_A_STUDENT, $this->is_a_student);
        if ($this->isColumnModified(UserPeer::AVATAR_ID)) $criteria->add(UserPeer::AVATAR_ID, $this->avatar_id);
        if ($this->isColumnModified(UserPeer::DESCRIPTION)) $criteria->add(UserPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(UserPeer::COMMENTS)) $criteria->add(UserPeer::COMMENTS, $this->comments);

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
        $criteria = new Criteria(UserPeer::DATABASE_NAME);
        $criteria->add(UserPeer::ID, $this->id);

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
     * @param      object $copyObj An object of User (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUsername($this->getUsername());
        $copyObj->setPasswordHash($this->getPasswordHash());
        $copyObj->setType($this->getType());
        $copyObj->setFirstname($this->getFirstname());
        $copyObj->setLastname($this->getLastname());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setAddress($this->getAddress());
        $copyObj->setWebsite($this->getWebsite());
        $copyObj->setBirthDate($this->getBirthDate());
        $copyObj->setFirstEntry($this->getFirstEntry());
        $copyObj->setLastEntry($this->getLastEntry());
        $copyObj->setLastVisit($this->getLastVisit());
        $copyObj->setVisitsNb($this->getVisitsNb());
        $copyObj->setConfigShowEmail($this->getConfigShowEmail());
        $copyObj->setConfigShowPhone($this->getConfigShowPhone());
        $copyObj->setConfigShowRealName($this->getConfigShowRealName());
        $copyObj->setDeactivated($this->getDeactivated());
        $copyObj->setIsATeacher($this->getIsATeacher());
        $copyObj->setIsAStudent($this->getIsAStudent());
        $copyObj->setAvatarId($this->getAvatarId());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setComments($this->getComments());

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

            foreach ($this->getUsersCursuss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUsersCursus($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFilesRelatedByAuthorId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFileRelatedByAuthorId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNewslettersSubscriberss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNewslettersSubscribers($relObj->copy($deepCopy));
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

            foreach ($this->getComments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addComment($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getReports() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addReport($relObj->copy($deepCopy));
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

            foreach ($this->getAds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAd($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTransactions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTransaction($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getForumMessages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addForumMessage($relObj->copy($deepCopy));
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
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return                 User Clone of current object.
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
     * @return   UserPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new UserPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a File object.
     *
     * @param                  File $v
     * @return                 User The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAvatar(File $v = null)
    {
        if ($v === null) {
            $this->setAvatarId(NULL);
        } else {
            $this->setAvatarId($v->getId());
        }

        $this->aAvatar = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the File object, it will not be re-added.
        if ($v !== null) {
            $v->addUserRelatedByAvatarId($this);
        }


        return $this;
    }


    /**
     * Get the associated File object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 File The associated File object.
     * @throws PropelException
     */
    public function getAvatar(PropelPDO $con = null)
    {
        if ($this->aAvatar === null && ($this->avatar_id !== null)) {
            $this->aAvatar = FileQuery::create()->findPk($this->avatar_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAvatar->addUsersRelatedByAvatarId($this);
             */
        }

        return $this->aAvatar;
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
        if ('UsersCursus' == $relationName) {
            $this->initUsersCursuss();
        }
        if ('FileRelatedByAuthorId' == $relationName) {
            $this->initFilesRelatedByAuthorId();
        }
        if ('NewslettersSubscribers' == $relationName) {
            $this->initNewslettersSubscriberss();
        }
        if ('Alert' == $relationName) {
            $this->initAlerts();
        }
        if ('Content' == $relationName) {
            $this->initContents();
        }
        if ('Comment' == $relationName) {
            $this->initComments();
        }
        if ('Report' == $relationName) {
            $this->initReports();
        }
        if ('Note' == $relationName) {
            $this->initNotes();
        }
        if ('News' == $relationName) {
            $this->initNewss();
        }
        if ('Ad' == $relationName) {
            $this->initAds();
        }
        if ('Transaction' == $relationName) {
            $this->initTransactions();
        }
        if ('ForumMessage' == $relationName) {
            $this->initForumMessages();
        }
        if ('ScheduledCourse' == $relationName) {
            $this->initScheduledCourses();
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
     * If this User is new, it will return
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
                    ->filterByResponsable($this)
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
            $cursusRemoved->setResponsable(null);
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
                    ->filterByResponsable($this)
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
     * @return   User The current object (for fluent API support)
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
        $cursus->setResponsable($this);
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
            $cursus->setResponsable(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Cursuss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Cursus[] List of Cursus objects
     */
    public function getCursussJoinNewsletter($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CursusQuery::create(null, $criteria);
        $query->joinWith('Newsletter', $join_behavior);

        return $this->getCursuss($query, $con);
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
        $this->collUsersCursuss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collUsersCursuss collection.
     *
     * By default this just sets the collUsersCursuss collection to an empty array (like clearcollUsersCursuss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
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
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|UsersCursus[] List of UsersCursus objects
     * @throws PropelException
     */
    public function getUsersCursuss($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collUsersCursuss || null !== $criteria) {
            if ($this->isNew() && null === $this->collUsersCursuss) {
                // return empty collection
                $this->initUsersCursuss();
            } else {
                $collUsersCursuss = UsersCursusQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collUsersCursuss;
                }
                $this->collUsersCursuss = $collUsersCursuss;
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
     * @param      PropelCollection $usersCursuss A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setUsersCursuss(PropelCollection $usersCursuss, PropelPDO $con = null)
    {
        $this->usersCursussScheduledForDeletion = $this->getUsersCursuss(new Criteria(), $con)->diff($usersCursuss);

        foreach ($this->usersCursussScheduledForDeletion as $usersCursusRemoved) {
            $usersCursusRemoved->setUser(null);
        }

        $this->collUsersCursuss = null;
        foreach ($usersCursuss as $usersCursus) {
            $this->addUsersCursus($usersCursus);
        }

        $this->collUsersCursuss = $usersCursuss;
    }

    /**
     * Returns the number of related UsersCursus objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related UsersCursus objects.
     * @throws PropelException
     */
    public function countUsersCursuss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collUsersCursuss || null !== $criteria) {
            if ($this->isNew() && null === $this->collUsersCursuss) {
                return 0;
            } else {
                $query = UsersCursusQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByUser($this)
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
     * @return   User The current object (for fluent API support)
     */
    public function addUsersCursus(UsersCursus $l)
    {
        if ($this->collUsersCursuss === null) {
            $this->initUsersCursuss();
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
        $usersCursus->setUser($this);
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
            $usersCursus->setUser(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related UsersCursuss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UsersCursus[] List of UsersCursus objects
     */
    public function getUsersCursussJoinCursus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UsersCursusQuery::create(null, $criteria);
        $query->joinWith('Cursus', $join_behavior);

        return $this->getUsersCursuss($query, $con);
    }

    /**
     * Clears out the collFilesRelatedByAuthorId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFilesRelatedByAuthorId()
     */
    public function clearFilesRelatedByAuthorId()
    {
        $this->collFilesRelatedByAuthorId = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collFilesRelatedByAuthorId collection.
     *
     * By default this just sets the collFilesRelatedByAuthorId collection to an empty array (like clearcollFilesRelatedByAuthorId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFilesRelatedByAuthorId($overrideExisting = true)
    {
        if (null !== $this->collFilesRelatedByAuthorId && !$overrideExisting) {
            return;
        }
        $this->collFilesRelatedByAuthorId = new PropelObjectCollection();
        $this->collFilesRelatedByAuthorId->setModel('File');
    }

    /**
     * Gets an array of File objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|File[] List of File objects
     * @throws PropelException
     */
    public function getFilesRelatedByAuthorId($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collFilesRelatedByAuthorId || null !== $criteria) {
            if ($this->isNew() && null === $this->collFilesRelatedByAuthorId) {
                // return empty collection
                $this->initFilesRelatedByAuthorId();
            } else {
                $collFilesRelatedByAuthorId = FileQuery::create(null, $criteria)
                    ->filterByAuthor($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collFilesRelatedByAuthorId;
                }
                $this->collFilesRelatedByAuthorId = $collFilesRelatedByAuthorId;
            }
        }

        return $this->collFilesRelatedByAuthorId;
    }

    /**
     * Sets a collection of FileRelatedByAuthorId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $filesRelatedByAuthorId A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setFilesRelatedByAuthorId(PropelCollection $filesRelatedByAuthorId, PropelPDO $con = null)
    {
        $this->filesRelatedByAuthorIdScheduledForDeletion = $this->getFilesRelatedByAuthorId(new Criteria(), $con)->diff($filesRelatedByAuthorId);

        foreach ($this->filesRelatedByAuthorIdScheduledForDeletion as $fileRelatedByAuthorIdRemoved) {
            $fileRelatedByAuthorIdRemoved->setAuthor(null);
        }

        $this->collFilesRelatedByAuthorId = null;
        foreach ($filesRelatedByAuthorId as $fileRelatedByAuthorId) {
            $this->addFileRelatedByAuthorId($fileRelatedByAuthorId);
        }

        $this->collFilesRelatedByAuthorId = $filesRelatedByAuthorId;
    }

    /**
     * Returns the number of related File objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related File objects.
     * @throws PropelException
     */
    public function countFilesRelatedByAuthorId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collFilesRelatedByAuthorId || null !== $criteria) {
            if ($this->isNew() && null === $this->collFilesRelatedByAuthorId) {
                return 0;
            } else {
                $query = FileQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByAuthor($this)
                    ->count($con);
            }
        } else {
            return count($this->collFilesRelatedByAuthorId);
        }
    }

    /**
     * Method called to associate a File object to this object
     * through the File foreign key attribute.
     *
     * @param    File $l File
     * @return   User The current object (for fluent API support)
     */
    public function addFileRelatedByAuthorId(File $l)
    {
        if ($this->collFilesRelatedByAuthorId === null) {
            $this->initFilesRelatedByAuthorId();
        }
        if (!$this->collFilesRelatedByAuthorId->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddFileRelatedByAuthorId($l);
        }

        return $this;
    }

    /**
     * @param	FileRelatedByAuthorId $fileRelatedByAuthorId The fileRelatedByAuthorId object to add.
     */
    protected function doAddFileRelatedByAuthorId($fileRelatedByAuthorId)
    {
        $this->collFilesRelatedByAuthorId[]= $fileRelatedByAuthorId;
        $fileRelatedByAuthorId->setAuthor($this);
    }

    /**
     * @param	FileRelatedByAuthorId $fileRelatedByAuthorId The fileRelatedByAuthorId object to remove.
     */
    public function removeFileRelatedByAuthorId($fileRelatedByAuthorId)
    {
        if ($this->getFilesRelatedByAuthorId()->contains($fileRelatedByAuthorId)) {
            $this->collFilesRelatedByAuthorId->remove($this->collFilesRelatedByAuthorId->search($fileRelatedByAuthorId));
            if (null === $this->filesRelatedByAuthorIdScheduledForDeletion) {
                $this->filesRelatedByAuthorIdScheduledForDeletion = clone $this->collFilesRelatedByAuthorId;
                $this->filesRelatedByAuthorIdScheduledForDeletion->clear();
            }
            $this->filesRelatedByAuthorIdScheduledForDeletion[]= $fileRelatedByAuthorId;
            $fileRelatedByAuthorId->setAuthor(null);
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
     * If this User is new, it will return
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
                    ->filterBySubscriber($this)
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
            $newslettersSubscribersRemoved->setSubscriber(null);
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
                    ->filterBySubscriber($this)
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
     * @return   User The current object (for fluent API support)
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
        $newslettersSubscribers->setSubscriber($this);
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
            $newslettersSubscribers->setSubscriber(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related NewslettersSubscriberss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|NewslettersSubscribers[] List of NewslettersSubscribers objects
     */
    public function getNewslettersSubscriberssJoinNewsletter($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NewslettersSubscribersQuery::create(null, $criteria);
        $query->joinWith('Newsletter', $join_behavior);

        return $this->getNewslettersSubscriberss($query, $con);
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
        $this->collAlerts = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collAlerts collection.
     *
     * By default this just sets the collAlerts collection to an empty array (like clearcollAlerts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
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
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Alert[] List of Alert objects
     * @throws PropelException
     */
    public function getAlerts($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collAlerts || null !== $criteria) {
            if ($this->isNew() && null === $this->collAlerts) {
                // return empty collection
                $this->initAlerts();
            } else {
                $collAlerts = AlertQuery::create(null, $criteria)
                    ->filterBySubscriber($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collAlerts;
                }
                $this->collAlerts = $collAlerts;
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
     * @param      PropelCollection $alerts A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setAlerts(PropelCollection $alerts, PropelPDO $con = null)
    {
        $this->alertsScheduledForDeletion = $this->getAlerts(new Criteria(), $con)->diff($alerts);

        foreach ($this->alertsScheduledForDeletion as $alertRemoved) {
            $alertRemoved->setSubscriber(null);
        }

        $this->collAlerts = null;
        foreach ($alerts as $alert) {
            $this->addAlert($alert);
        }

        $this->collAlerts = $alerts;
    }

    /**
     * Returns the number of related Alert objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Alert objects.
     * @throws PropelException
     */
    public function countAlerts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collAlerts || null !== $criteria) {
            if ($this->isNew() && null === $this->collAlerts) {
                return 0;
            } else {
                $query = AlertQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBySubscriber($this)
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
     * @return   User The current object (for fluent API support)
     */
    public function addAlert(Alert $l)
    {
        if ($this->collAlerts === null) {
            $this->initAlerts();
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
        $alert->setSubscriber($this);
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
            $alert->setSubscriber(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Alerts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
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
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Alerts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
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
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Alerts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
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
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Alerts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
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
        $this->collContents = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collContents collection.
     *
     * By default this just sets the collContents collection to an empty array (like clearcollContents());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
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
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Content[] List of Content objects
     * @throws PropelException
     */
    public function getContents($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collContents || null !== $criteria) {
            if ($this->isNew() && null === $this->collContents) {
                // return empty collection
                $this->initContents();
            } else {
                $collContents = ContentQuery::create(null, $criteria)
                    ->filterByAuthor($this)
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
     * Sets a collection of Content objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $contents A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setContents(PropelCollection $contents, PropelPDO $con = null)
    {
        $this->contentsScheduledForDeletion = $this->getContents(new Criteria(), $con)->diff($contents);

        foreach ($this->contentsScheduledForDeletion as $contentRemoved) {
            $contentRemoved->setAuthor(null);
        }

        $this->collContents = null;
        foreach ($contents as $content) {
            $this->addContent($content);
        }

        $this->collContents = $contents;
    }

    /**
     * Returns the number of related Content objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Content objects.
     * @throws PropelException
     */
    public function countContents(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
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
                    ->filterByAuthor($this)
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
     * @return   User The current object (for fluent API support)
     */
    public function addContent(Content $l)
    {
        if ($this->collContents === null) {
            $this->initContents();
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
        $content->setAuthor($this);
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
            $content->setAuthor(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Contents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
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
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Contents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
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
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Contents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Content[] List of Content objects
     */
    public function getContentsJoinContentType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContentQuery::create(null, $criteria);
        $query->joinWith('ContentType', $join_behavior);

        return $this->getContents($query, $con);
    }

    /**
     * Clears out the collComments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addComments()
     */
    public function clearComments()
    {
        $this->collComments = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collComments collection.
     *
     * By default this just sets the collComments collection to an empty array (like clearcollComments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initComments($overrideExisting = true)
    {
        if (null !== $this->collComments && !$overrideExisting) {
            return;
        }
        $this->collComments = new PropelObjectCollection();
        $this->collComments->setModel('Comment');
    }

    /**
     * Gets an array of Comment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Comment[] List of Comment objects
     * @throws PropelException
     */
    public function getComments($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collComments || null !== $criteria) {
            if ($this->isNew() && null === $this->collComments) {
                // return empty collection
                $this->initComments();
            } else {
                $collComments = CommentQuery::create(null, $criteria)
                    ->filterByAuthor($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collComments;
                }
                $this->collComments = $collComments;
            }
        }

        return $this->collComments;
    }

    /**
     * Sets a collection of Comment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $comments A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setComments(PropelCollection $comments, PropelPDO $con = null)
    {
        $this->commentsScheduledForDeletion = $this->getComments(new Criteria(), $con)->diff($comments);

        foreach ($this->commentsScheduledForDeletion as $commentRemoved) {
            $commentRemoved->setAuthor(null);
        }

        $this->collComments = null;
        foreach ($comments as $comment) {
            $this->addComment($comment);
        }

        $this->collComments = $comments;
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
    public function countComments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collComments || null !== $criteria) {
            if ($this->isNew() && null === $this->collComments) {
                return 0;
            } else {
                $query = CommentQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByAuthor($this)
                    ->count($con);
            }
        } else {
            return count($this->collComments);
        }
    }

    /**
     * Method called to associate a Comment object to this object
     * through the Comment foreign key attribute.
     *
     * @param    Comment $l Comment
     * @return   User The current object (for fluent API support)
     */
    public function addComment(Comment $l)
    {
        if ($this->collComments === null) {
            $this->initComments();
        }
        if (!$this->collComments->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddComment($l);
        }

        return $this;
    }

    /**
     * @param	Comment $comment The comment object to add.
     */
    protected function doAddComment($comment)
    {
        $this->collComments[]= $comment;
        $comment->setAuthor($this);
    }

    /**
     * @param	Comment $comment The comment object to remove.
     */
    public function removeComment($comment)
    {
        if ($this->getComments()->contains($comment)) {
            $this->collComments->remove($this->collComments->search($comment));
            if (null === $this->commentsScheduledForDeletion) {
                $this->commentsScheduledForDeletion = clone $this->collComments;
                $this->commentsScheduledForDeletion->clear();
            }
            $this->commentsScheduledForDeletion[]= $comment;
            $comment->setAuthor(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Comments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Comment[] List of Comment objects
     */
    public function getCommentsJoinReplyToComment($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CommentQuery::create(null, $criteria);
        $query->joinWith('ReplyToComment', $join_behavior);

        return $this->getComments($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Comments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Comment[] List of Comment objects
     */
    public function getCommentsJoinContent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CommentQuery::create(null, $criteria);
        $query->joinWith('Content', $join_behavior);

        return $this->getComments($query, $con);
    }

    /**
     * Clears out the collReports collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addReports()
     */
    public function clearReports()
    {
        $this->collReports = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collReports collection.
     *
     * By default this just sets the collReports collection to an empty array (like clearcollReports());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initReports($overrideExisting = true)
    {
        if (null !== $this->collReports && !$overrideExisting) {
            return;
        }
        $this->collReports = new PropelObjectCollection();
        $this->collReports->setModel('Report');
    }

    /**
     * Gets an array of Report objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Report[] List of Report objects
     * @throws PropelException
     */
    public function getReports($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collReports || null !== $criteria) {
            if ($this->isNew() && null === $this->collReports) {
                // return empty collection
                $this->initReports();
            } else {
                $collReports = ReportQuery::create(null, $criteria)
                    ->filterByAuthor($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collReports;
                }
                $this->collReports = $collReports;
            }
        }

        return $this->collReports;
    }

    /**
     * Sets a collection of Report objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $reports A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setReports(PropelCollection $reports, PropelPDO $con = null)
    {
        $this->reportsScheduledForDeletion = $this->getReports(new Criteria(), $con)->diff($reports);

        foreach ($this->reportsScheduledForDeletion as $reportRemoved) {
            $reportRemoved->setAuthor(null);
        }

        $this->collReports = null;
        foreach ($reports as $report) {
            $this->addReport($report);
        }

        $this->collReports = $reports;
    }

    /**
     * Returns the number of related Report objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Report objects.
     * @throws PropelException
     */
    public function countReports(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collReports || null !== $criteria) {
            if ($this->isNew() && null === $this->collReports) {
                return 0;
            } else {
                $query = ReportQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByAuthor($this)
                    ->count($con);
            }
        } else {
            return count($this->collReports);
        }
    }

    /**
     * Method called to associate a Report object to this object
     * through the Report foreign key attribute.
     *
     * @param    Report $l Report
     * @return   User The current object (for fluent API support)
     */
    public function addReport(Report $l)
    {
        if ($this->collReports === null) {
            $this->initReports();
        }
        if (!$this->collReports->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddReport($l);
        }

        return $this;
    }

    /**
     * @param	Report $report The report object to add.
     */
    protected function doAddReport($report)
    {
        $this->collReports[]= $report;
        $report->setAuthor($this);
    }

    /**
     * @param	Report $report The report object to remove.
     */
    public function removeReport($report)
    {
        if ($this->getReports()->contains($report)) {
            $this->collReports->remove($this->collReports->search($report));
            if (null === $this->reportsScheduledForDeletion) {
                $this->reportsScheduledForDeletion = clone $this->collReports;
                $this->reportsScheduledForDeletion->clear();
            }
            $this->reportsScheduledForDeletion[]= $report;
            $report->setAuthor(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Reports from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Report[] List of Report objects
     */
    public function getReportsJoinContent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ReportQuery::create(null, $criteria);
        $query->joinWith('Content', $join_behavior);

        return $this->getReports($query, $con);
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
        $this->collNotes = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collNotes collection.
     *
     * By default this just sets the collNotes collection to an empty array (like clearcollNotes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
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
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Note[] List of Note objects
     * @throws PropelException
     */
    public function getNotes($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collNotes || null !== $criteria) {
            if ($this->isNew() && null === $this->collNotes) {
                // return empty collection
                $this->initNotes();
            } else {
                $collNotes = NoteQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collNotes;
                }
                $this->collNotes = $collNotes;
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
     * @param      PropelCollection $notes A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setNotes(PropelCollection $notes, PropelPDO $con = null)
    {
        $this->notesScheduledForDeletion = $this->getNotes(new Criteria(), $con)->diff($notes);

        foreach ($this->notesScheduledForDeletion as $noteRemoved) {
            $noteRemoved->setUser(null);
        }

        $this->collNotes = null;
        foreach ($notes as $note) {
            $this->addNote($note);
        }

        $this->collNotes = $notes;
    }

    /**
     * Returns the number of related Note objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Note objects.
     * @throws PropelException
     */
    public function countNotes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collNotes || null !== $criteria) {
            if ($this->isNew() && null === $this->collNotes) {
                return 0;
            } else {
                $query = NoteQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByUser($this)
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
     * @return   User The current object (for fluent API support)
     */
    public function addNote(Note $l)
    {
        if ($this->collNotes === null) {
            $this->initNotes();
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
        $note->setUser($this);
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
            $note->setUser(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Notes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Note[] List of Note objects
     */
    public function getNotesJoinCourse($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NoteQuery::create(null, $criteria);
        $query->joinWith('Course', $join_behavior);

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
        $this->collNewss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collNewss collection.
     *
     * By default this just sets the collNewss collection to an empty array (like clearcollNewss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
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
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|News[] List of News objects
     * @throws PropelException
     */
    public function getNewss($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collNewss || null !== $criteria) {
            if ($this->isNew() && null === $this->collNewss) {
                // return empty collection
                $this->initNewss();
            } else {
                $collNewss = NewsQuery::create(null, $criteria)
                    ->filterByAuthor($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collNewss;
                }
                $this->collNewss = $collNewss;
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
     * @param      PropelCollection $newss A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setNewss(PropelCollection $newss, PropelPDO $con = null)
    {
        $this->newssScheduledForDeletion = $this->getNewss(new Criteria(), $con)->diff($newss);

        foreach ($this->newssScheduledForDeletion as $newsRemoved) {
            $newsRemoved->setAuthor(null);
        }

        $this->collNewss = null;
        foreach ($newss as $news) {
            $this->addNews($news);
        }

        $this->collNewss = $newss;
    }

    /**
     * Returns the number of related News objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related News objects.
     * @throws PropelException
     */
    public function countNewss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collNewss || null !== $criteria) {
            if ($this->isNew() && null === $this->collNewss) {
                return 0;
            } else {
                $query = NewsQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByAuthor($this)
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
     * @return   User The current object (for fluent API support)
     */
    public function addNews(News $l)
    {
        if ($this->collNewss === null) {
            $this->initNewss();
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
        $news->setAuthor($this);
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
            $news->setAuthor(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Newss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|News[] List of News objects
     */
    public function getNewssJoinCourse($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NewsQuery::create(null, $criteria);
        $query->joinWith('Course', $join_behavior);

        return $this->getNewss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Newss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|News[] List of News objects
     */
    public function getNewssJoinCursus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NewsQuery::create(null, $criteria);
        $query->joinWith('Cursus', $join_behavior);

        return $this->getNewss($query, $con);
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
        $this->collAds = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collAds collection.
     *
     * By default this just sets the collAds collection to an empty array (like clearcollAds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAds($overrideExisting = true)
    {
        if (null !== $this->collAds && !$overrideExisting) {
            return;
        }
        $this->collAds = new PropelObjectCollection();
        $this->collAds->setModel('Ad');
    }

    /**
     * Gets an array of Ad objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Ad[] List of Ad objects
     * @throws PropelException
     */
    public function getAds($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collAds || null !== $criteria) {
            if ($this->isNew() && null === $this->collAds) {
                // return empty collection
                $this->initAds();
            } else {
                $collAds = AdQuery::create(null, $criteria)
                    ->filterByAuthor($this)
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
     * Sets a collection of Ad objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $ads A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setAds(PropelCollection $ads, PropelPDO $con = null)
    {
        $this->adsScheduledForDeletion = $this->getAds(new Criteria(), $con)->diff($ads);

        foreach ($this->adsScheduledForDeletion as $adRemoved) {
            $adRemoved->setAuthor(null);
        }

        $this->collAds = null;
        foreach ($ads as $ad) {
            $this->addAd($ad);
        }

        $this->collAds = $ads;
    }

    /**
     * Returns the number of related Ad objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Ad objects.
     * @throws PropelException
     */
    public function countAds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
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
                    ->filterByAuthor($this)
                    ->count($con);
            }
        } else {
            return count($this->collAds);
        }
    }

    /**
     * Method called to associate a Ad object to this object
     * through the Ad foreign key attribute.
     *
     * @param    Ad $l Ad
     * @return   User The current object (for fluent API support)
     */
    public function addAd(Ad $l)
    {
        if ($this->collAds === null) {
            $this->initAds();
        }
        if (!$this->collAds->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddAd($l);
        }

        return $this;
    }

    /**
     * @param	Ad $ad The ad object to add.
     */
    protected function doAddAd($ad)
    {
        $this->collAds[]= $ad;
        $ad->setAuthor($this);
    }

    /**
     * @param	Ad $ad The ad object to remove.
     */
    public function removeAd($ad)
    {
        if ($this->getAds()->contains($ad)) {
            $this->collAds->remove($this->collAds->search($ad));
            if (null === $this->adsScheduledForDeletion) {
                $this->adsScheduledForDeletion = clone $this->collAds;
                $this->adsScheduledForDeletion->clear();
            }
            $this->adsScheduledForDeletion[]= $ad;
            $ad->setAuthor(null);
        }
    }

    /**
     * Clears out the collTransactions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTransactions()
     */
    public function clearTransactions()
    {
        $this->collTransactions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collTransactions collection.
     *
     * By default this just sets the collTransactions collection to an empty array (like clearcollTransactions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTransactions($overrideExisting = true)
    {
        if (null !== $this->collTransactions && !$overrideExisting) {
            return;
        }
        $this->collTransactions = new PropelObjectCollection();
        $this->collTransactions->setModel('Transaction');
    }

    /**
     * Gets an array of Transaction objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Transaction[] List of Transaction objects
     * @throws PropelException
     */
    public function getTransactions($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collTransactions || null !== $criteria) {
            if ($this->isNew() && null === $this->collTransactions) {
                // return empty collection
                $this->initTransactions();
            } else {
                $collTransactions = TransactionQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collTransactions;
                }
                $this->collTransactions = $collTransactions;
            }
        }

        return $this->collTransactions;
    }

    /**
     * Sets a collection of Transaction objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $transactions A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setTransactions(PropelCollection $transactions, PropelPDO $con = null)
    {
        $this->transactionsScheduledForDeletion = $this->getTransactions(new Criteria(), $con)->diff($transactions);

        foreach ($this->transactionsScheduledForDeletion as $transactionRemoved) {
            $transactionRemoved->setUser(null);
        }

        $this->collTransactions = null;
        foreach ($transactions as $transaction) {
            $this->addTransaction($transaction);
        }

        $this->collTransactions = $transactions;
    }

    /**
     * Returns the number of related Transaction objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Transaction objects.
     * @throws PropelException
     */
    public function countTransactions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collTransactions || null !== $criteria) {
            if ($this->isNew() && null === $this->collTransactions) {
                return 0;
            } else {
                $query = TransactionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByUser($this)
                    ->count($con);
            }
        } else {
            return count($this->collTransactions);
        }
    }

    /**
     * Method called to associate a Transaction object to this object
     * through the Transaction foreign key attribute.
     *
     * @param    Transaction $l Transaction
     * @return   User The current object (for fluent API support)
     */
    public function addTransaction(Transaction $l)
    {
        if ($this->collTransactions === null) {
            $this->initTransactions();
        }
        if (!$this->collTransactions->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddTransaction($l);
        }

        return $this;
    }

    /**
     * @param	Transaction $transaction The transaction object to add.
     */
    protected function doAddTransaction($transaction)
    {
        $this->collTransactions[]= $transaction;
        $transaction->setUser($this);
    }

    /**
     * @param	Transaction $transaction The transaction object to remove.
     */
    public function removeTransaction($transaction)
    {
        if ($this->getTransactions()->contains($transaction)) {
            $this->collTransactions->remove($this->collTransactions->search($transaction));
            if (null === $this->transactionsScheduledForDeletion) {
                $this->transactionsScheduledForDeletion = clone $this->collTransactions;
                $this->transactionsScheduledForDeletion->clear();
            }
            $this->transactionsScheduledForDeletion[]= $transaction;
            $transaction->setUser(null);
        }
    }

    /**
     * Clears out the collForumMessages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addForumMessages()
     */
    public function clearForumMessages()
    {
        $this->collForumMessages = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collForumMessages collection.
     *
     * By default this just sets the collForumMessages collection to an empty array (like clearcollForumMessages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initForumMessages($overrideExisting = true)
    {
        if (null !== $this->collForumMessages && !$overrideExisting) {
            return;
        }
        $this->collForumMessages = new PropelObjectCollection();
        $this->collForumMessages->setModel('ForumMessage');
    }

    /**
     * Gets an array of ForumMessage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|ForumMessage[] List of ForumMessage objects
     * @throws PropelException
     */
    public function getForumMessages($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collForumMessages || null !== $criteria) {
            if ($this->isNew() && null === $this->collForumMessages) {
                // return empty collection
                $this->initForumMessages();
            } else {
                $collForumMessages = ForumMessageQuery::create(null, $criteria)
                    ->filterByAuthor($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collForumMessages;
                }
                $this->collForumMessages = $collForumMessages;
            }
        }

        return $this->collForumMessages;
    }

    /**
     * Sets a collection of ForumMessage objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $forumMessages A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setForumMessages(PropelCollection $forumMessages, PropelPDO $con = null)
    {
        $this->forumMessagesScheduledForDeletion = $this->getForumMessages(new Criteria(), $con)->diff($forumMessages);

        foreach ($this->forumMessagesScheduledForDeletion as $forumMessageRemoved) {
            $forumMessageRemoved->setAuthor(null);
        }

        $this->collForumMessages = null;
        foreach ($forumMessages as $forumMessage) {
            $this->addForumMessage($forumMessage);
        }

        $this->collForumMessages = $forumMessages;
    }

    /**
     * Returns the number of related ForumMessage objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related ForumMessage objects.
     * @throws PropelException
     */
    public function countForumMessages(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collForumMessages || null !== $criteria) {
            if ($this->isNew() && null === $this->collForumMessages) {
                return 0;
            } else {
                $query = ForumMessageQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByAuthor($this)
                    ->count($con);
            }
        } else {
            return count($this->collForumMessages);
        }
    }

    /**
     * Method called to associate a ForumMessage object to this object
     * through the ForumMessage foreign key attribute.
     *
     * @param    ForumMessage $l ForumMessage
     * @return   User The current object (for fluent API support)
     */
    public function addForumMessage(ForumMessage $l)
    {
        if ($this->collForumMessages === null) {
            $this->initForumMessages();
        }
        if (!$this->collForumMessages->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddForumMessage($l);
        }

        return $this;
    }

    /**
     * @param	ForumMessage $forumMessage The forumMessage object to add.
     */
    protected function doAddForumMessage($forumMessage)
    {
        $this->collForumMessages[]= $forumMessage;
        $forumMessage->setAuthor($this);
    }

    /**
     * @param	ForumMessage $forumMessage The forumMessage object to remove.
     */
    public function removeForumMessage($forumMessage)
    {
        if ($this->getForumMessages()->contains($forumMessage)) {
            $this->collForumMessages->remove($this->collForumMessages->search($forumMessage));
            if (null === $this->forumMessagesScheduledForDeletion) {
                $this->forumMessagesScheduledForDeletion = clone $this->collForumMessages;
                $this->forumMessagesScheduledForDeletion->clear();
            }
            $this->forumMessagesScheduledForDeletion[]= $forumMessage;
            $forumMessage->setAuthor(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related ForumMessages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ForumMessage[] List of ForumMessage objects
     */
    public function getForumMessagesJoinTopic($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ForumMessageQuery::create(null, $criteria);
        $query->joinWith('Topic', $join_behavior);

        return $this->getForumMessages($query, $con);
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
        $this->collScheduledCourses = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collScheduledCourses collection.
     *
     * By default this just sets the collScheduledCourses collection to an empty array (like clearcollScheduledCourses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
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
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|ScheduledCourse[] List of ScheduledCourse objects
     * @throws PropelException
     */
    public function getScheduledCourses($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collScheduledCourses || null !== $criteria) {
            if ($this->isNew() && null === $this->collScheduledCourses) {
                // return empty collection
                $this->initScheduledCourses();
            } else {
                $collScheduledCourses = ScheduledCourseQuery::create(null, $criteria)
                    ->filterByTeacher($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collScheduledCourses;
                }
                $this->collScheduledCourses = $collScheduledCourses;
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
     * @param      PropelCollection $scheduledCourses A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setScheduledCourses(PropelCollection $scheduledCourses, PropelPDO $con = null)
    {
        $this->scheduledCoursesScheduledForDeletion = $this->getScheduledCourses(new Criteria(), $con)->diff($scheduledCourses);

        foreach ($this->scheduledCoursesScheduledForDeletion as $scheduledCourseRemoved) {
            $scheduledCourseRemoved->setTeacher(null);
        }

        $this->collScheduledCourses = null;
        foreach ($scheduledCourses as $scheduledCourse) {
            $this->addScheduledCourse($scheduledCourse);
        }

        $this->collScheduledCourses = $scheduledCourses;
    }

    /**
     * Returns the number of related ScheduledCourse objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related ScheduledCourse objects.
     * @throws PropelException
     */
    public function countScheduledCourses(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collScheduledCourses || null !== $criteria) {
            if ($this->isNew() && null === $this->collScheduledCourses) {
                return 0;
            } else {
                $query = ScheduledCourseQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByTeacher($this)
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
     * @return   User The current object (for fluent API support)
     */
    public function addScheduledCourse(ScheduledCourse $l)
    {
        if ($this->collScheduledCourses === null) {
            $this->initScheduledCourses();
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
        $scheduledCourse->setTeacher($this);
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
            $scheduledCourse->setTeacher(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related ScheduledCourses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ScheduledCourse[] List of ScheduledCourse objects
     */
    public function getScheduledCoursesJoinCourse($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ScheduledCourseQuery::create(null, $criteria);
        $query->joinWith('Course', $join_behavior);

        return $this->getScheduledCourses($query, $con);
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
     * By default this just sets the collCursuss collection to an empty collection (like clearCursuss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initCursuss()
    {
        $this->collCursuss = new PropelObjectCollection();
        $this->collCursuss->setModel('Cursus');
    }

    /**
     * Gets a collection of Cursus objects related by a many-to-many relationship
     * to the current object by way of the users_cursus cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|Cursus[] List of Cursus objects
     */
    public function getCursuss($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collCursuss || null !== $criteria) {
            if ($this->isNew() && null === $this->collCursuss) {
                // return empty collection
                $this->initCursuss();
            } else {
                $collCursuss = CursusQuery::create(null, $criteria)
                    ->filterByUser($this)
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
     * Sets a collection of Cursus objects related by a many-to-many relationship
     * to the current object by way of the users_cursus cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $cursuss A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setCursuss(PropelCollection $cursuss, PropelPDO $con = null)
    {
        $this->clearCursuss();
        $currentCursuss = $this->getCursuss();

        $this->cursussScheduledForDeletion = $currentCursuss->diff($cursuss);

        foreach ($cursuss as $cursus) {
            if (!$currentCursuss->contains($cursus)) {
                $this->doAddCursus($cursus);
            }
        }

        $this->collCursuss = $cursuss;
    }

    /**
     * Gets the number of Cursus objects related by a many-to-many relationship
     * to the current object by way of the users_cursus cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      PropelPDO $con Optional connection object
     *
     * @return int the number of related Cursus objects
     */
    public function countCursuss($criteria = null, $distinct = false, PropelPDO $con = null)
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
                    ->filterByUser($this)
                    ->count($con);
            }
        } else {
            return count($this->collCursuss);
        }
    }

    /**
     * Associate a Cursus object to this object
     * through the users_cursus cross reference table.
     *
     * @param  Cursus $cursus The UsersCursus object to relate
     * @return void
     */
    public function addCursus(Cursus $cursus)
    {
        if ($this->collCursuss === null) {
            $this->initCursuss();
        }
        if (!$this->collCursuss->contains($cursus)) { // only add it if the **same** object is not already associated
            $this->doAddCursus($cursus);

            $this->collCursuss[]= $cursus;
        }
    }

    /**
     * @param	Cursus $cursus The cursus object to add.
     */
    protected function doAddCursus($cursus)
    {
        $usersCursus = new UsersCursus();
        $usersCursus->setCursus($cursus);
        $this->addUsersCursus($usersCursus);
    }

    /**
     * Remove a Cursus object to this object
     * through the users_cursus cross reference table.
     *
     * @param      Cursus $cursus The UsersCursus object to relate
     * @return void
     */
    public function removeCursus(Cursus $cursus)
    {
        if ($this->getCursuss()->contains($cursus)) {
            $this->collCursuss->remove($this->collCursuss->search($cursus));
            if (null === $this->cursussScheduledForDeletion) {
                $this->cursussScheduledForDeletion = clone $this->collCursuss;
                $this->cursussScheduledForDeletion->clear();
            }
            $this->cursussScheduledForDeletion[]= $cursus;
        }
    }

    /**
     * Clears out the collNewsletters collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addNewsletters()
     */
    public function clearNewsletters()
    {
        $this->collNewsletters = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collNewsletters collection.
     *
     * By default this just sets the collNewsletters collection to an empty collection (like clearNewsletters());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initNewsletters()
    {
        $this->collNewsletters = new PropelObjectCollection();
        $this->collNewsletters->setModel('Newsletter');
    }

    /**
     * Gets a collection of Newsletter objects related by a many-to-many relationship
     * to the current object by way of the newsletters_subscribers cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|Newsletter[] List of Newsletter objects
     */
    public function getNewsletters($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collNewsletters || null !== $criteria) {
            if ($this->isNew() && null === $this->collNewsletters) {
                // return empty collection
                $this->initNewsletters();
            } else {
                $collNewsletters = NewsletterQuery::create(null, $criteria)
                    ->filterBySubscriber($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collNewsletters;
                }
                $this->collNewsletters = $collNewsletters;
            }
        }

        return $this->collNewsletters;
    }

    /**
     * Sets a collection of Newsletter objects related by a many-to-many relationship
     * to the current object by way of the newsletters_subscribers cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $newsletters A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setNewsletters(PropelCollection $newsletters, PropelPDO $con = null)
    {
        $this->clearNewsletters();
        $currentNewsletters = $this->getNewsletters();

        $this->newslettersScheduledForDeletion = $currentNewsletters->diff($newsletters);

        foreach ($newsletters as $newsletter) {
            if (!$currentNewsletters->contains($newsletter)) {
                $this->doAddNewsletter($newsletter);
            }
        }

        $this->collNewsletters = $newsletters;
    }

    /**
     * Gets the number of Newsletter objects related by a many-to-many relationship
     * to the current object by way of the newsletters_subscribers cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      PropelPDO $con Optional connection object
     *
     * @return int the number of related Newsletter objects
     */
    public function countNewsletters($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collNewsletters || null !== $criteria) {
            if ($this->isNew() && null === $this->collNewsletters) {
                return 0;
            } else {
                $query = NewsletterQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBySubscriber($this)
                    ->count($con);
            }
        } else {
            return count($this->collNewsletters);
        }
    }

    /**
     * Associate a Newsletter object to this object
     * through the newsletters_subscribers cross reference table.
     *
     * @param  Newsletter $newsletter The NewslettersSubscribers object to relate
     * @return void
     */
    public function addNewsletter(Newsletter $newsletter)
    {
        if ($this->collNewsletters === null) {
            $this->initNewsletters();
        }
        if (!$this->collNewsletters->contains($newsletter)) { // only add it if the **same** object is not already associated
            $this->doAddNewsletter($newsletter);

            $this->collNewsletters[]= $newsletter;
        }
    }

    /**
     * @param	Newsletter $newsletter The newsletter object to add.
     */
    protected function doAddNewsletter($newsletter)
    {
        $newslettersSubscribers = new NewslettersSubscribers();
        $newslettersSubscribers->setNewsletter($newsletter);
        $this->addNewslettersSubscribers($newslettersSubscribers);
    }

    /**
     * Remove a Newsletter object to this object
     * through the newsletters_subscribers cross reference table.
     *
     * @param      Newsletter $newsletter The NewslettersSubscribers object to relate
     * @return void
     */
    public function removeNewsletter(Newsletter $newsletter)
    {
        if ($this->getNewsletters()->contains($newsletter)) {
            $this->collNewsletters->remove($this->collNewsletters->search($newsletter));
            if (null === $this->newslettersScheduledForDeletion) {
                $this->newslettersScheduledForDeletion = clone $this->collNewsletters;
                $this->newslettersScheduledForDeletion->clear();
            }
            $this->newslettersScheduledForDeletion[]= $newsletter;
        }
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->username = null;
        $this->password_hash = null;
        $this->type = null;
        $this->firstname = null;
        $this->lastname = null;
        $this->email = null;
        $this->phone = null;
        $this->address = null;
        $this->website = null;
        $this->birth_date = null;
        $this->first_entry = null;
        $this->last_entry = null;
        $this->last_visit = null;
        $this->visits_nb = null;
        $this->config_show_email = null;
        $this->config_show_phone = null;
        $this->config_show_real_name = null;
        $this->deactivated = null;
        $this->is_a_teacher = null;
        $this->is_a_student = null;
        $this->avatar_id = null;
        $this->description = null;
        $this->description_isLoaded = false;
        $this->comments = null;
        $this->comments_isLoaded = false;
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
            if ($this->collUsersCursuss) {
                foreach ($this->collUsersCursuss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFilesRelatedByAuthorId) {
                foreach ($this->collFilesRelatedByAuthorId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNewslettersSubscriberss) {
                foreach ($this->collNewslettersSubscriberss as $o) {
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
            if ($this->collComments) {
                foreach ($this->collComments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collReports) {
                foreach ($this->collReports as $o) {
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
            if ($this->collAds) {
                foreach ($this->collAds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTransactions) {
                foreach ($this->collTransactions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collForumMessages) {
                foreach ($this->collForumMessages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collScheduledCourses) {
                foreach ($this->collScheduledCourses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCursuss) {
                foreach ($this->collCursuss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNewsletters) {
                foreach ($this->collNewsletters as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collCursuss instanceof PropelCollection) {
            $this->collCursuss->clearIterator();
        }
        $this->collCursuss = null;
        if ($this->collUsersCursuss instanceof PropelCollection) {
            $this->collUsersCursuss->clearIterator();
        }
        $this->collUsersCursuss = null;
        if ($this->collFilesRelatedByAuthorId instanceof PropelCollection) {
            $this->collFilesRelatedByAuthorId->clearIterator();
        }
        $this->collFilesRelatedByAuthorId = null;
        if ($this->collNewslettersSubscriberss instanceof PropelCollection) {
            $this->collNewslettersSubscriberss->clearIterator();
        }
        $this->collNewslettersSubscriberss = null;
        if ($this->collAlerts instanceof PropelCollection) {
            $this->collAlerts->clearIterator();
        }
        $this->collAlerts = null;
        if ($this->collContents instanceof PropelCollection) {
            $this->collContents->clearIterator();
        }
        $this->collContents = null;
        if ($this->collComments instanceof PropelCollection) {
            $this->collComments->clearIterator();
        }
        $this->collComments = null;
        if ($this->collReports instanceof PropelCollection) {
            $this->collReports->clearIterator();
        }
        $this->collReports = null;
        if ($this->collNotes instanceof PropelCollection) {
            $this->collNotes->clearIterator();
        }
        $this->collNotes = null;
        if ($this->collNewss instanceof PropelCollection) {
            $this->collNewss->clearIterator();
        }
        $this->collNewss = null;
        if ($this->collAds instanceof PropelCollection) {
            $this->collAds->clearIterator();
        }
        $this->collAds = null;
        if ($this->collTransactions instanceof PropelCollection) {
            $this->collTransactions->clearIterator();
        }
        $this->collTransactions = null;
        if ($this->collForumMessages instanceof PropelCollection) {
            $this->collForumMessages->clearIterator();
        }
        $this->collForumMessages = null;
        if ($this->collScheduledCourses instanceof PropelCollection) {
            $this->collScheduledCourses->clearIterator();
        }
        $this->collScheduledCourses = null;
        if ($this->collCursuss instanceof PropelCollection) {
            $this->collCursuss->clearIterator();
        }
        $this->collCursuss = null;
        if ($this->collNewsletters instanceof PropelCollection) {
            $this->collNewsletters->clearIterator();
        }
        $this->collNewsletters = null;
        $this->aAvatar = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UserPeer::DEFAULT_STRING_FORMAT);
    }

} // BaseUser
