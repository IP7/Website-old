<?php


/**
 * Base class that represents a row from the 'users' table.
 *
 *
 *
 * @package    propel.generator.ip7website.om
 */
abstract class BaseUser extends BaseObject implements Persistent
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
     * The value for the rights field.
     * Note: this column has a database default value of: (expression) 0
     * @var        int
     */
    protected $rights;

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
     * The value for the gender field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $gender;

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
     * The value for the expiration_date field.
     * @var        string
     */
    protected $expiration_date;

    /**
     * The value for the last_visit field.
     * @var        string
     */
    protected $last_visit;

    /**
     * The value for the visits_count field.
     * Note: this column has a database default value of: (expression) 0
     * @var        int
     */
    protected $visits_count;

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
     * The value for the config_show_birthdate field.
     * Note: this column has a database default value of: (expression) 0
     * @var        boolean
     */
    protected $config_show_birthdate;

    /**
     * The value for the config_show_age field.
     * Note: this column has a database default value of: (expression) 1
     * @var        boolean
     */
    protected $config_show_age;

    /**
     * The value for the config_index_profile field.
     * Note: this column has a database default value of: (expression) 0
     * @var        boolean
     */
    protected $config_index_profile;

    /**
     * The value for the config_private_profile field.
     * Note: this column has a database default value of: (expression) 0
     * @var        boolean
     */
    protected $config_private_profile;

    /**
     * The value for the activated field.
     * Note: this column has a database default value of: (expression) 0
     * @var        boolean
     */
    protected $activated;

    /**
     * The value for the is_a_teacher field.
     * Note: this column has a database default value of: (expression) 0
     * @var        boolean
     */
    protected $is_a_teacher;

    /**
     * The value for the is_a_student field.
     * Note: this column has a database default value of: (expression) 0
     * @var        boolean
     */
    protected $is_a_student;

    /**
     * The value for the is_an_alumni field.
     * Note: this column has a database default value of: (expression) 0
     * @var        boolean
     */
    protected $is_an_alumni;

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
     * The value for the remarks field.
     * @var        string
     */
    protected $remarks;

    /**
     * Whether the lazy-loaded $remarks value has been loaded from database.
     * This is necessary to avoid repeated lookups if $remarks column is null in the db.
     * @var        boolean
     */
    protected $remarks_isLoaded = false;

    /**
     * @var        PropelObjectCollection|Cursus[] Collection to store aggregation of Cursus objects.
     */
    protected $collCursusResponsabilitys;
    protected $collCursusResponsabilitysPartial;

    /**
     * @var        PropelObjectCollection|EducationalPath[] Collection to store aggregation of EducationalPath objects.
     */
    protected $collEducationalPathResponsabilitys;
    protected $collEducationalPathResponsabilitysPartial;

    /**
     * @var        PropelObjectCollection|UsersPaths[] Collection to store aggregation of UsersPaths objects.
     */
    protected $collUsersPathss;
    protected $collUsersPathssPartial;

    /**
     * @var        PropelObjectCollection|File[] Collection to store aggregation of File objects.
     */
    protected $collFiles;
    protected $collFilesPartial;

    /**
     * @var        PropelObjectCollection|Content[] Collection to store aggregation of Content objects.
     */
    protected $collContents;
    protected $collContentsPartial;

    /**
     * @var        PropelObjectCollection|Report[] Collection to store aggregation of Report objects.
     */
    protected $collReports;
    protected $collReportsPartial;

    /**
     * @var        PropelObjectCollection|News[] Collection to store aggregation of News objects.
     */
    protected $collNewss;
    protected $collNewssPartial;

    /**
     * @var        PropelObjectCollection|Event[] Collection to store aggregation of Event objects.
     */
    protected $collEvents;
    protected $collEventsPartial;

    /**
     * @var        PropelObjectCollection|Token[] Collection to store aggregation of Token objects.
     */
    protected $collTokens;
    protected $collTokensPartial;

    /**
     * @var        PropelObjectCollection|EducationalPath[] Collection to store aggregation of EducationalPath objects.
     */
    protected $collEducationalPaths;

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
    protected $educationalPathsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $cursusResponsabilitysScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $educationalPathResponsabilitysScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $usersPathssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $filesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $contentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $reportsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $newssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $eventsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tokensScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->gender = 0;
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [username] column value.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the [password_hash] column value.
     *
     * @return string
     */
    public function getPasswordHash()
    {
        return $this->password_hash;
    }

    /**
     * Get the [rights] column value.
     *
     * @return int
     */
    public function getRights()
    {
        return $this->rights;
    }

    /**
     * Get the [firstname] column value.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get the [lastname] column value.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Get the [gender] column value.
     *
     * @return int
     * @throws PropelException - if the stored enum key is unknown.
     */
    public function getGender()
    {
        if (null === $this->gender) {
            return null;
        }
        $valueSet = UserPeer::getValueSet(UserPeer::GENDER);
        if (!isset($valueSet[$this->gender])) {
            throw new PropelException('Unknown stored enum key: ' . $this->gender);
        }

        return $valueSet[$this->gender];
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [phone] column value.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get the [website] column value.
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Get the [optionally formatted] temporal [birth_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBirthDate($format = '%x')
    {
        if ($this->birth_date === null) {
            return null;
        }

        if ($this->birth_date === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->birth_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->birth_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [first_entry] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFirstEntry($format = '%x')
    {
        if ($this->first_entry === null) {
            return null;
        }

        if ($this->first_entry === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->first_entry);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->first_entry, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [last_entry] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastEntry($format = '%x')
    {
        if ($this->last_entry === null) {
            return null;
        }

        if ($this->last_entry === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->last_entry);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_entry, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [expiration_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getExpirationDate($format = '%x')
    {
        if ($this->expiration_date === null) {
            return null;
        }

        if ($this->expiration_date === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->expiration_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->expiration_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [last_visit] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastVisit($format = 'd-m-Y H:i:s')
    {
        if ($this->last_visit === null) {
            return null;
        }

        if ($this->last_visit === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->last_visit);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_visit, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [visits_count] column value.
     *
     * @return int
     */
    public function getVisitsCount()
    {
        return $this->visits_count;
    }

    /**
     * Get the [config_show_email] column value.
     *
     * @return boolean
     */
    public function getConfigShowEmail()
    {
        return $this->config_show_email;
    }

    /**
     * Get the [config_show_phone] column value.
     *
     * @return boolean
     */
    public function getConfigShowPhone()
    {
        return $this->config_show_phone;
    }

    /**
     * Get the [config_show_real_name] column value.
     *
     * @return boolean
     */
    public function getConfigShowRealName()
    {
        return $this->config_show_real_name;
    }

    /**
     * Get the [config_show_birthdate] column value.
     *
     * @return boolean
     */
    public function getConfigShowBirthdate()
    {
        return $this->config_show_birthdate;
    }

    /**
     * Get the [config_show_age] column value.
     *
     * @return boolean
     */
    public function getConfigShowAge()
    {
        return $this->config_show_age;
    }

    /**
     * Get the [config_index_profile] column value.
     *
     * @return boolean
     */
    public function getConfigIndexProfile()
    {
        return $this->config_index_profile;
    }

    /**
     * Get the [config_private_profile] column value.
     *
     * @return boolean
     */
    public function getConfigPrivateProfile()
    {
        return $this->config_private_profile;
    }

    /**
     * Get the [activated] column value.
     *
     * @return boolean
     */
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * Get the [is_a_teacher] column value.
     *
     * @return boolean
     */
    public function getIsATeacher()
    {
        return $this->is_a_teacher;
    }

    /**
     * Get the [is_a_student] column value.
     *
     * @return boolean
     */
    public function getIsAStudent()
    {
        return $this->is_a_student;
    }

    /**
     * Get the [is_an_alumni] column value.
     *
     * @return boolean
     */
    public function getIsAnAlumni()
    {
        return $this->is_an_alumni;
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
     * Get the [remarks] column value.
     *
     * @param PropelPDO $con An optional PropelPDO connection to use for fetching this lazy-loaded column.
     * @return string
     */
    public function getRemarks(PropelPDO $con = null)
    {
        if (!$this->remarks_isLoaded && $this->remarks === null && !$this->isNew()) {
            $this->loadRemarks($con);
        }

        return $this->remarks;
    }

    /**
     * Load the value for the lazy-loaded [remarks] column.
     *
     * This method performs an additional query to return the value for
     * the [remarks] column, since it is not populated by
     * the hydrate() method.
     *
     * @param  PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - any underlying error will be wrapped and re-thrown.
     */
    protected function loadRemarks(PropelPDO $con = null)
    {
        $c = $this->buildPkeyCriteria();
        $c->addSelectColumn(UserPeer::REMARKS);
        try {
            $stmt = UserPeer::doSelectStmt($c, $con);
            $row = $stmt->fetch(PDO::FETCH_NUM);
            $stmt->closeCursor();
            $this->remarks = ($row[0] !== null) ? (string) $row[0] : null;
            $this->remarks_isLoaded = true;
        } catch (Exception $e) {
            throw new PropelException("Error loading value for [remarks] column on demand.", $e);
        }
    }
    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return User The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
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
     * @param string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setUsername($v)
    {
        if ($v !== null && is_numeric($v)) {
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
     * @param string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setPasswordHash($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->password_hash !== $v) {
            $this->password_hash = $v;
            $this->modifiedColumns[] = UserPeer::PASSWORD_HASH;
        }


        return $this;
    } // setPasswordHash()

    /**
     * Set the value of [rights] column.
     *
     * @param int $v new value
     * @return User The current object (for fluent API support)
     */
    public function setRights($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->rights !== $v) {
            $this->rights = $v;
            $this->modifiedColumns[] = UserPeer::RIGHTS;
        }


        return $this;
    } // setRights()

    /**
     * Set the value of [firstname] column.
     *
     * @param string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setFirstname($v)
    {
        if ($v !== null && is_numeric($v)) {
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
     * @param string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setLastname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lastname !== $v) {
            $this->lastname = $v;
            $this->modifiedColumns[] = UserPeer::LASTNAME;
        }


        return $this;
    } // setLastname()

    /**
     * Set the value of [gender] column.
     *
     * @param int $v new value
     * @return User The current object (for fluent API support)
     * @throws PropelException - if the value is not accepted by this enum.
     */
    public function setGender($v)
    {
        if ($v !== null) {
            $valueSet = UserPeer::getValueSet(UserPeer::GENDER);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->gender !== $v) {
            $this->gender = $v;
            $this->modifiedColumns[] = UserPeer::GENDER;
        }


        return $this;
    } // setGender()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
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
     * @param string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[] = UserPeer::PHONE;
        }


        return $this;
    } // setPhone()

    /**
     * Set the value of [website] column.
     *
     * @param string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setWebsite($v)
    {
        if ($v !== null && is_numeric($v)) {
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
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return User The current object (for fluent API support)
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
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return User The current object (for fluent API support)
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
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return User The current object (for fluent API support)
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
     * Sets the value of [expiration_date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return User The current object (for fluent API support)
     */
    public function setExpirationDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expiration_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expiration_date !== null && $tmpDt = new DateTime($this->expiration_date)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expiration_date = $newDateAsString;
                $this->modifiedColumns[] = UserPeer::EXPIRATION_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpirationDate()

    /**
     * Sets the value of [last_visit] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return User The current object (for fluent API support)
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
     * Set the value of [visits_count] column.
     *
     * @param int $v new value
     * @return User The current object (for fluent API support)
     */
    public function setVisitsCount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->visits_count !== $v) {
            $this->visits_count = $v;
            $this->modifiedColumns[] = UserPeer::VISITS_COUNT;
        }


        return $this;
    } // setVisitsCount()

    /**
     * Sets the value of the [config_show_email] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return User The current object (for fluent API support)
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
     * @param boolean|integer|string $v The new value
     * @return User The current object (for fluent API support)
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
     * @param boolean|integer|string $v The new value
     * @return User The current object (for fluent API support)
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
     * Sets the value of the [config_show_birthdate] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return User The current object (for fluent API support)
     */
    public function setConfigShowBirthdate($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->config_show_birthdate !== $v) {
            $this->config_show_birthdate = $v;
            $this->modifiedColumns[] = UserPeer::CONFIG_SHOW_BIRTHDATE;
        }


        return $this;
    } // setConfigShowBirthdate()

    /**
     * Sets the value of the [config_show_age] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return User The current object (for fluent API support)
     */
    public function setConfigShowAge($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->config_show_age !== $v) {
            $this->config_show_age = $v;
            $this->modifiedColumns[] = UserPeer::CONFIG_SHOW_AGE;
        }


        return $this;
    } // setConfigShowAge()

    /**
     * Sets the value of the [config_index_profile] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return User The current object (for fluent API support)
     */
    public function setConfigIndexProfile($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->config_index_profile !== $v) {
            $this->config_index_profile = $v;
            $this->modifiedColumns[] = UserPeer::CONFIG_INDEX_PROFILE;
        }


        return $this;
    } // setConfigIndexProfile()

    /**
     * Sets the value of the [config_private_profile] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return User The current object (for fluent API support)
     */
    public function setConfigPrivateProfile($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->config_private_profile !== $v) {
            $this->config_private_profile = $v;
            $this->modifiedColumns[] = UserPeer::CONFIG_PRIVATE_PROFILE;
        }


        return $this;
    } // setConfigPrivateProfile()

    /**
     * Sets the value of the [activated] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return User The current object (for fluent API support)
     */
    public function setActivated($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->activated !== $v) {
            $this->activated = $v;
            $this->modifiedColumns[] = UserPeer::ACTIVATED;
        }


        return $this;
    } // setActivated()

    /**
     * Sets the value of the [is_a_teacher] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return User The current object (for fluent API support)
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
     * @param boolean|integer|string $v The new value
     * @return User The current object (for fluent API support)
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
     * Sets the value of the [is_an_alumni] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return User The current object (for fluent API support)
     */
    public function setIsAnAlumni($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_an_alumni !== $v) {
            $this->is_an_alumni = $v;
            $this->modifiedColumns[] = UserPeer::IS_AN_ALUMNI;
        }


        return $this;
    } // setIsAnAlumni()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        // Allow unsetting the lazy loaded column even when its not loaded.
        if (!$this->description_isLoaded && $v === null) {
            $this->modifiedColumns[] = UserPeer::DESCRIPTION;
        }

        // explicitly set the is-loaded flag to true for this lazy load col;
        // it doesn't matter if the value is actually set or not (logic below) as
        // any attempt to set the value means that no db lookup should be performed
        // when the getDescription() method is called.
        $this->description_isLoaded = true;

        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = UserPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [remarks] column.
     *
     * @param string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setRemarks($v)
    {
        // Allow unsetting the lazy loaded column even when its not loaded.
        if (!$this->remarks_isLoaded && $v === null) {
            $this->modifiedColumns[] = UserPeer::REMARKS;
        }

        // explicitly set the is-loaded flag to true for this lazy load col;
        // it doesn't matter if the value is actually set or not (logic below) as
        // any attempt to set the value means that no db lookup should be performed
        // when the getRemarks() method is called.
        $this->remarks_isLoaded = true;

        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->remarks !== $v) {
            $this->remarks = $v;
            $this->modifiedColumns[] = UserPeer::REMARKS;
        }


        return $this;
    } // setRemarks()

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
            if ($this->gender !== 0) {
                return false;
            }

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
            $this->username = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->password_hash = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->rights = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->firstname = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->lastname = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->gender = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->email = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->phone = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->website = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->birth_date = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->first_entry = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->last_entry = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->expiration_date = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->last_visit = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->visits_count = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->config_show_email = ($row[$startcol + 16] !== null) ? (boolean) $row[$startcol + 16] : null;
            $this->config_show_phone = ($row[$startcol + 17] !== null) ? (boolean) $row[$startcol + 17] : null;
            $this->config_show_real_name = ($row[$startcol + 18] !== null) ? (boolean) $row[$startcol + 18] : null;
            $this->config_show_birthdate = ($row[$startcol + 19] !== null) ? (boolean) $row[$startcol + 19] : null;
            $this->config_show_age = ($row[$startcol + 20] !== null) ? (boolean) $row[$startcol + 20] : null;
            $this->config_index_profile = ($row[$startcol + 21] !== null) ? (boolean) $row[$startcol + 21] : null;
            $this->config_private_profile = ($row[$startcol + 22] !== null) ? (boolean) $row[$startcol + 22] : null;
            $this->activated = ($row[$startcol + 23] !== null) ? (boolean) $row[$startcol + 23] : null;
            $this->is_a_teacher = ($row[$startcol + 24] !== null) ? (boolean) $row[$startcol + 24] : null;
            $this->is_a_student = ($row[$startcol + 25] !== null) ? (boolean) $row[$startcol + 25] : null;
            $this->is_an_alumni = ($row[$startcol + 26] !== null) ? (boolean) $row[$startcol + 26] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 27; // 27 = UserPeer::NUM_HYDRATE_COLUMNS.

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

        // Reset the remarks lazy-load column
        $this->remarks = null;
        $this->remarks_isLoaded = false;

        if ($deep) {  // also de-associate any related objects?

            $this->collCursusResponsabilitys = null;

            $this->collEducationalPathResponsabilitys = null;

            $this->collUsersPathss = null;

            $this->collFiles = null;

            $this->collContents = null;

            $this->collReports = null;

            $this->collNewss = null;

            $this->collEvents = null;

            $this->collTokens = null;

            $this->collEducationalPaths = null;
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

            if ($this->educationalPathsScheduledForDeletion !== null) {
                if (!$this->educationalPathsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->educationalPathsScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($pk, $remotePk);
                    }
                    UsersPathsQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->educationalPathsScheduledForDeletion = null;
                }

                foreach ($this->getEducationalPaths() as $educationalPath) {
                    if ($educationalPath->isModified()) {
                        $educationalPath->save($con);
                    }
                }
            } elseif ($this->collEducationalPaths) {
                foreach ($this->collEducationalPaths as $educationalPath) {
                    if ($educationalPath->isModified()) {
                        $educationalPath->save($con);
                    }
                }
            }

            if ($this->cursusResponsabilitysScheduledForDeletion !== null) {
                if (!$this->cursusResponsabilitysScheduledForDeletion->isEmpty()) {
                    foreach ($this->cursusResponsabilitysScheduledForDeletion as $cursusResponsability) {
                        // need to save related object because we set the relation to null
                        $cursusResponsability->save($con);
                    }
                    $this->cursusResponsabilitysScheduledForDeletion = null;
                }
            }

            if ($this->collCursusResponsabilitys !== null) {
                foreach ($this->collCursusResponsabilitys as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->educationalPathResponsabilitysScheduledForDeletion !== null) {
                if (!$this->educationalPathResponsabilitysScheduledForDeletion->isEmpty()) {
                    foreach ($this->educationalPathResponsabilitysScheduledForDeletion as $educationalPathResponsability) {
                        // need to save related object because we set the relation to null
                        $educationalPathResponsability->save($con);
                    }
                    $this->educationalPathResponsabilitysScheduledForDeletion = null;
                }
            }

            if ($this->collEducationalPathResponsabilitys !== null) {
                foreach ($this->collEducationalPathResponsabilitys as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
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
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->filesScheduledForDeletion !== null) {
                if (!$this->filesScheduledForDeletion->isEmpty()) {
                    foreach ($this->filesScheduledForDeletion as $file) {
                        // need to save related object because we set the relation to null
                        $file->save($con);
                    }
                    $this->filesScheduledForDeletion = null;
                }
            }

            if ($this->collFiles !== null) {
                foreach ($this->collFiles as $referrerFK) {
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
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
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
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->eventsScheduledForDeletion !== null) {
                if (!$this->eventsScheduledForDeletion->isEmpty()) {
                    foreach ($this->eventsScheduledForDeletion as $event) {
                        // need to save related object because we set the relation to null
                        $event->save($con);
                    }
                    $this->eventsScheduledForDeletion = null;
                }
            }

            if ($this->collEvents !== null) {
                foreach ($this->collEvents as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tokensScheduledForDeletion !== null) {
                if (!$this->tokensScheduledForDeletion->isEmpty()) {
                    foreach ($this->tokensScheduledForDeletion as $token) {
                        // need to save related object because we set the relation to null
                        $token->save($con);
                    }
                    $this->tokensScheduledForDeletion = null;
                }
            }

            if ($this->collTokens !== null) {
                foreach ($this->collTokens as $referrerFK) {
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

        $this->modifiedColumns[] = UserPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UserPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UserPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(UserPeer::USERNAME)) {
            $modifiedColumns[':p' . $index++]  = '`username`';
        }
        if ($this->isColumnModified(UserPeer::PASSWORD_HASH)) {
            $modifiedColumns[':p' . $index++]  = '`password_hash`';
        }
        if ($this->isColumnModified(UserPeer::RIGHTS)) {
            $modifiedColumns[':p' . $index++]  = '`rights`';
        }
        if ($this->isColumnModified(UserPeer::FIRSTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`firstname`';
        }
        if ($this->isColumnModified(UserPeer::LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`lastname`';
        }
        if ($this->isColumnModified(UserPeer::GENDER)) {
            $modifiedColumns[':p' . $index++]  = '`gender`';
        }
        if ($this->isColumnModified(UserPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`email`';
        }
        if ($this->isColumnModified(UserPeer::PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`phone`';
        }
        if ($this->isColumnModified(UserPeer::WEBSITE)) {
            $modifiedColumns[':p' . $index++]  = '`website`';
        }
        if ($this->isColumnModified(UserPeer::BIRTH_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`birth_date`';
        }
        if ($this->isColumnModified(UserPeer::FIRST_ENTRY)) {
            $modifiedColumns[':p' . $index++]  = '`first_entry`';
        }
        if ($this->isColumnModified(UserPeer::LAST_ENTRY)) {
            $modifiedColumns[':p' . $index++]  = '`last_entry`';
        }
        if ($this->isColumnModified(UserPeer::EXPIRATION_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`expiration_date`';
        }
        if ($this->isColumnModified(UserPeer::LAST_VISIT)) {
            $modifiedColumns[':p' . $index++]  = '`last_visit`';
        }
        if ($this->isColumnModified(UserPeer::VISITS_COUNT)) {
            $modifiedColumns[':p' . $index++]  = '`visits_count`';
        }
        if ($this->isColumnModified(UserPeer::CONFIG_SHOW_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`config_show_email`';
        }
        if ($this->isColumnModified(UserPeer::CONFIG_SHOW_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`config_show_phone`';
        }
        if ($this->isColumnModified(UserPeer::CONFIG_SHOW_REAL_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`config_show_real_name`';
        }
        if ($this->isColumnModified(UserPeer::CONFIG_SHOW_BIRTHDATE)) {
            $modifiedColumns[':p' . $index++]  = '`config_show_birthdate`';
        }
        if ($this->isColumnModified(UserPeer::CONFIG_SHOW_AGE)) {
            $modifiedColumns[':p' . $index++]  = '`config_show_age`';
        }
        if ($this->isColumnModified(UserPeer::CONFIG_INDEX_PROFILE)) {
            $modifiedColumns[':p' . $index++]  = '`config_index_profile`';
        }
        if ($this->isColumnModified(UserPeer::CONFIG_PRIVATE_PROFILE)) {
            $modifiedColumns[':p' . $index++]  = '`config_private_profile`';
        }
        if ($this->isColumnModified(UserPeer::ACTIVATED)) {
            $modifiedColumns[':p' . $index++]  = '`activated`';
        }
        if ($this->isColumnModified(UserPeer::IS_A_TEACHER)) {
            $modifiedColumns[':p' . $index++]  = '`is_a_teacher`';
        }
        if ($this->isColumnModified(UserPeer::IS_A_STUDENT)) {
            $modifiedColumns[':p' . $index++]  = '`is_a_student`';
        }
        if ($this->isColumnModified(UserPeer::IS_AN_ALUMNI)) {
            $modifiedColumns[':p' . $index++]  = '`is_an_alumni`';
        }
        if ($this->isColumnModified(UserPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`description`';
        }
        if ($this->isColumnModified(UserPeer::REMARKS)) {
            $modifiedColumns[':p' . $index++]  = '`remarks`';
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
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`username`':
                        $stmt->bindValue($identifier, $this->username, PDO::PARAM_STR);
                        break;
                    case '`password_hash`':
                        $stmt->bindValue($identifier, $this->password_hash, PDO::PARAM_STR);
                        break;
                    case '`rights`':
                        $stmt->bindValue($identifier, $this->rights, PDO::PARAM_INT);
                        break;
                    case '`firstname`':
                        $stmt->bindValue($identifier, $this->firstname, PDO::PARAM_STR);
                        break;
                    case '`lastname`':
                        $stmt->bindValue($identifier, $this->lastname, PDO::PARAM_STR);
                        break;
                    case '`gender`':
                        $stmt->bindValue($identifier, $this->gender, PDO::PARAM_INT);
                        break;
                    case '`email`':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '`phone`':
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case '`website`':
                        $stmt->bindValue($identifier, $this->website, PDO::PARAM_STR);
                        break;
                    case '`birth_date`':
                        $stmt->bindValue($identifier, $this->birth_date, PDO::PARAM_STR);
                        break;
                    case '`first_entry`':
                        $stmt->bindValue($identifier, $this->first_entry, PDO::PARAM_STR);
                        break;
                    case '`last_entry`':
                        $stmt->bindValue($identifier, $this->last_entry, PDO::PARAM_STR);
                        break;
                    case '`expiration_date`':
                        $stmt->bindValue($identifier, $this->expiration_date, PDO::PARAM_STR);
                        break;
                    case '`last_visit`':
                        $stmt->bindValue($identifier, $this->last_visit, PDO::PARAM_STR);
                        break;
                    case '`visits_count`':
                        $stmt->bindValue($identifier, $this->visits_count, PDO::PARAM_INT);
                        break;
                    case '`config_show_email`':
                        $stmt->bindValue($identifier, (int) $this->config_show_email, PDO::PARAM_INT);
                        break;
                    case '`config_show_phone`':
                        $stmt->bindValue($identifier, (int) $this->config_show_phone, PDO::PARAM_INT);
                        break;
                    case '`config_show_real_name`':
                        $stmt->bindValue($identifier, (int) $this->config_show_real_name, PDO::PARAM_INT);
                        break;
                    case '`config_show_birthdate`':
                        $stmt->bindValue($identifier, (int) $this->config_show_birthdate, PDO::PARAM_INT);
                        break;
                    case '`config_show_age`':
                        $stmt->bindValue($identifier, (int) $this->config_show_age, PDO::PARAM_INT);
                        break;
                    case '`config_index_profile`':
                        $stmt->bindValue($identifier, (int) $this->config_index_profile, PDO::PARAM_INT);
                        break;
                    case '`config_private_profile`':
                        $stmt->bindValue($identifier, (int) $this->config_private_profile, PDO::PARAM_INT);
                        break;
                    case '`activated`':
                        $stmt->bindValue($identifier, (int) $this->activated, PDO::PARAM_INT);
                        break;
                    case '`is_a_teacher`':
                        $stmt->bindValue($identifier, (int) $this->is_a_teacher, PDO::PARAM_INT);
                        break;
                    case '`is_a_student`':
                        $stmt->bindValue($identifier, (int) $this->is_a_student, PDO::PARAM_INT);
                        break;
                    case '`is_an_alumni`':
                        $stmt->bindValue($identifier, (int) $this->is_an_alumni, PDO::PARAM_INT);
                        break;
                    case '`description`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`remarks`':
                        $stmt->bindValue($identifier, $this->remarks, PDO::PARAM_STR);
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


            if (($retval = UserPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCursusResponsabilitys !== null) {
                    foreach ($this->collCursusResponsabilitys as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collEducationalPathResponsabilitys !== null) {
                    foreach ($this->collEducationalPathResponsabilitys as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUsersPathss !== null) {
                    foreach ($this->collUsersPathss as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collFiles !== null) {
                    foreach ($this->collFiles as $referrerFK) {
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

                if ($this->collReports !== null) {
                    foreach ($this->collReports as $referrerFK) {
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

                if ($this->collEvents !== null) {
                    foreach ($this->collEvents as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTokens !== null) {
                    foreach ($this->collTokens as $referrerFK) {
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
        $pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getUsername();
                break;
            case 2:
                return $this->getPasswordHash();
                break;
            case 3:
                return $this->getRights();
                break;
            case 4:
                return $this->getFirstname();
                break;
            case 5:
                return $this->getLastname();
                break;
            case 6:
                return $this->getGender();
                break;
            case 7:
                return $this->getEmail();
                break;
            case 8:
                return $this->getPhone();
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
                return $this->getExpirationDate();
                break;
            case 14:
                return $this->getLastVisit();
                break;
            case 15:
                return $this->getVisitsCount();
                break;
            case 16:
                return $this->getConfigShowEmail();
                break;
            case 17:
                return $this->getConfigShowPhone();
                break;
            case 18:
                return $this->getConfigShowRealName();
                break;
            case 19:
                return $this->getConfigShowBirthdate();
                break;
            case 20:
                return $this->getConfigShowAge();
                break;
            case 21:
                return $this->getConfigIndexProfile();
                break;
            case 22:
                return $this->getConfigPrivateProfile();
                break;
            case 23:
                return $this->getActivated();
                break;
            case 24:
                return $this->getIsATeacher();
                break;
            case 25:
                return $this->getIsAStudent();
                break;
            case 26:
                return $this->getIsAnAlumni();
                break;
            case 27:
                return $this->getDescription();
                break;
            case 28:
                return $this->getRemarks();
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
        if (isset($alreadyDumpedObjects['User'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['User'][$this->getPrimaryKey()] = true;
        $keys = UserPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getUsername(),
            $keys[2] => $this->getPasswordHash(),
            $keys[3] => $this->getRights(),
            $keys[4] => $this->getFirstname(),
            $keys[5] => $this->getLastname(),
            $keys[6] => $this->getGender(),
            $keys[7] => $this->getEmail(),
            $keys[8] => $this->getPhone(),
            $keys[9] => $this->getWebsite(),
            $keys[10] => $this->getBirthDate(),
            $keys[11] => $this->getFirstEntry(),
            $keys[12] => $this->getLastEntry(),
            $keys[13] => $this->getExpirationDate(),
            $keys[14] => $this->getLastVisit(),
            $keys[15] => $this->getVisitsCount(),
            $keys[16] => $this->getConfigShowEmail(),
            $keys[17] => $this->getConfigShowPhone(),
            $keys[18] => $this->getConfigShowRealName(),
            $keys[19] => $this->getConfigShowBirthdate(),
            $keys[20] => $this->getConfigShowAge(),
            $keys[21] => $this->getConfigIndexProfile(),
            $keys[22] => $this->getConfigPrivateProfile(),
            $keys[23] => $this->getActivated(),
            $keys[24] => $this->getIsATeacher(),
            $keys[25] => $this->getIsAStudent(),
            $keys[26] => $this->getIsAnAlumni(),
            $keys[27] => ($includeLazyLoadColumns) ? $this->getDescription() : null,
            $keys[28] => ($includeLazyLoadColumns) ? $this->getRemarks() : null,
        );
        if ($includeForeignObjects) {
            if (null !== $this->collCursusResponsabilitys) {
                $result['CursusResponsabilitys'] = $this->collCursusResponsabilitys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEducationalPathResponsabilitys) {
                $result['EducationalPathResponsabilitys'] = $this->collEducationalPathResponsabilitys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUsersPathss) {
                $result['UsersPathss'] = $this->collUsersPathss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFiles) {
                $result['Files'] = $this->collFiles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collContents) {
                $result['Contents'] = $this->collContents->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collReports) {
                $result['Reports'] = $this->collReports->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNewss) {
                $result['Newss'] = $this->collNewss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEvents) {
                $result['Events'] = $this->collEvents->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTokens) {
                $result['Tokens'] = $this->collTokens->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setUsername($value);
                break;
            case 2:
                $this->setPasswordHash($value);
                break;
            case 3:
                $this->setRights($value);
                break;
            case 4:
                $this->setFirstname($value);
                break;
            case 5:
                $this->setLastname($value);
                break;
            case 6:
                $valueSet = UserPeer::getValueSet(UserPeer::GENDER);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setGender($value);
                break;
            case 7:
                $this->setEmail($value);
                break;
            case 8:
                $this->setPhone($value);
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
                $this->setExpirationDate($value);
                break;
            case 14:
                $this->setLastVisit($value);
                break;
            case 15:
                $this->setVisitsCount($value);
                break;
            case 16:
                $this->setConfigShowEmail($value);
                break;
            case 17:
                $this->setConfigShowPhone($value);
                break;
            case 18:
                $this->setConfigShowRealName($value);
                break;
            case 19:
                $this->setConfigShowBirthdate($value);
                break;
            case 20:
                $this->setConfigShowAge($value);
                break;
            case 21:
                $this->setConfigIndexProfile($value);
                break;
            case 22:
                $this->setConfigPrivateProfile($value);
                break;
            case 23:
                $this->setActivated($value);
                break;
            case 24:
                $this->setIsATeacher($value);
                break;
            case 25:
                $this->setIsAStudent($value);
                break;
            case 26:
                $this->setIsAnAlumni($value);
                break;
            case 27:
                $this->setDescription($value);
                break;
            case 28:
                $this->setRemarks($value);
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
        $keys = UserPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setUsername($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPasswordHash($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setRights($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFirstname($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setLastname($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setGender($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setEmail($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setPhone($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setWebsite($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setBirthDate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setFirstEntry($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setLastEntry($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setExpirationDate($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setLastVisit($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setVisitsCount($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setConfigShowEmail($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setConfigShowPhone($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setConfigShowRealName($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setConfigShowBirthdate($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setConfigShowAge($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setConfigIndexProfile($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setConfigPrivateProfile($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setActivated($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setIsATeacher($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setIsAStudent($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setIsAnAlumni($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setDescription($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setRemarks($arr[$keys[28]]);
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
        if ($this->isColumnModified(UserPeer::RIGHTS)) $criteria->add(UserPeer::RIGHTS, $this->rights);
        if ($this->isColumnModified(UserPeer::FIRSTNAME)) $criteria->add(UserPeer::FIRSTNAME, $this->firstname);
        if ($this->isColumnModified(UserPeer::LASTNAME)) $criteria->add(UserPeer::LASTNAME, $this->lastname);
        if ($this->isColumnModified(UserPeer::GENDER)) $criteria->add(UserPeer::GENDER, $this->gender);
        if ($this->isColumnModified(UserPeer::EMAIL)) $criteria->add(UserPeer::EMAIL, $this->email);
        if ($this->isColumnModified(UserPeer::PHONE)) $criteria->add(UserPeer::PHONE, $this->phone);
        if ($this->isColumnModified(UserPeer::WEBSITE)) $criteria->add(UserPeer::WEBSITE, $this->website);
        if ($this->isColumnModified(UserPeer::BIRTH_DATE)) $criteria->add(UserPeer::BIRTH_DATE, $this->birth_date);
        if ($this->isColumnModified(UserPeer::FIRST_ENTRY)) $criteria->add(UserPeer::FIRST_ENTRY, $this->first_entry);
        if ($this->isColumnModified(UserPeer::LAST_ENTRY)) $criteria->add(UserPeer::LAST_ENTRY, $this->last_entry);
        if ($this->isColumnModified(UserPeer::EXPIRATION_DATE)) $criteria->add(UserPeer::EXPIRATION_DATE, $this->expiration_date);
        if ($this->isColumnModified(UserPeer::LAST_VISIT)) $criteria->add(UserPeer::LAST_VISIT, $this->last_visit);
        if ($this->isColumnModified(UserPeer::VISITS_COUNT)) $criteria->add(UserPeer::VISITS_COUNT, $this->visits_count);
        if ($this->isColumnModified(UserPeer::CONFIG_SHOW_EMAIL)) $criteria->add(UserPeer::CONFIG_SHOW_EMAIL, $this->config_show_email);
        if ($this->isColumnModified(UserPeer::CONFIG_SHOW_PHONE)) $criteria->add(UserPeer::CONFIG_SHOW_PHONE, $this->config_show_phone);
        if ($this->isColumnModified(UserPeer::CONFIG_SHOW_REAL_NAME)) $criteria->add(UserPeer::CONFIG_SHOW_REAL_NAME, $this->config_show_real_name);
        if ($this->isColumnModified(UserPeer::CONFIG_SHOW_BIRTHDATE)) $criteria->add(UserPeer::CONFIG_SHOW_BIRTHDATE, $this->config_show_birthdate);
        if ($this->isColumnModified(UserPeer::CONFIG_SHOW_AGE)) $criteria->add(UserPeer::CONFIG_SHOW_AGE, $this->config_show_age);
        if ($this->isColumnModified(UserPeer::CONFIG_INDEX_PROFILE)) $criteria->add(UserPeer::CONFIG_INDEX_PROFILE, $this->config_index_profile);
        if ($this->isColumnModified(UserPeer::CONFIG_PRIVATE_PROFILE)) $criteria->add(UserPeer::CONFIG_PRIVATE_PROFILE, $this->config_private_profile);
        if ($this->isColumnModified(UserPeer::ACTIVATED)) $criteria->add(UserPeer::ACTIVATED, $this->activated);
        if ($this->isColumnModified(UserPeer::IS_A_TEACHER)) $criteria->add(UserPeer::IS_A_TEACHER, $this->is_a_teacher);
        if ($this->isColumnModified(UserPeer::IS_A_STUDENT)) $criteria->add(UserPeer::IS_A_STUDENT, $this->is_a_student);
        if ($this->isColumnModified(UserPeer::IS_AN_ALUMNI)) $criteria->add(UserPeer::IS_AN_ALUMNI, $this->is_an_alumni);
        if ($this->isColumnModified(UserPeer::DESCRIPTION)) $criteria->add(UserPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(UserPeer::REMARKS)) $criteria->add(UserPeer::REMARKS, $this->remarks);

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
     * @param object $copyObj An object of User (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUsername($this->getUsername());
        $copyObj->setPasswordHash($this->getPasswordHash());
        $copyObj->setRights($this->getRights());
        $copyObj->setFirstname($this->getFirstname());
        $copyObj->setLastname($this->getLastname());
        $copyObj->setGender($this->getGender());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setWebsite($this->getWebsite());
        $copyObj->setBirthDate($this->getBirthDate());
        $copyObj->setFirstEntry($this->getFirstEntry());
        $copyObj->setLastEntry($this->getLastEntry());
        $copyObj->setExpirationDate($this->getExpirationDate());
        $copyObj->setLastVisit($this->getLastVisit());
        $copyObj->setVisitsCount($this->getVisitsCount());
        $copyObj->setConfigShowEmail($this->getConfigShowEmail());
        $copyObj->setConfigShowPhone($this->getConfigShowPhone());
        $copyObj->setConfigShowRealName($this->getConfigShowRealName());
        $copyObj->setConfigShowBirthdate($this->getConfigShowBirthdate());
        $copyObj->setConfigShowAge($this->getConfigShowAge());
        $copyObj->setConfigIndexProfile($this->getConfigIndexProfile());
        $copyObj->setConfigPrivateProfile($this->getConfigPrivateProfile());
        $copyObj->setActivated($this->getActivated());
        $copyObj->setIsATeacher($this->getIsATeacher());
        $copyObj->setIsAStudent($this->getIsAStudent());
        $copyObj->setIsAnAlumni($this->getIsAnAlumni());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setRemarks($this->getRemarks());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getCursusResponsabilitys() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCursusResponsability($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEducationalPathResponsabilitys() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEducationalPathResponsability($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUsersPathss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUsersPaths($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFiles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFile($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getContents() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addContent($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getReports() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addReport($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNewss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNews($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEvents() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEvent($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTokens() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addToken($relObj->copy($deepCopy));
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
     * @return User Clone of current object.
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
     * @return UserPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new UserPeer();
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
        if ('CursusResponsability' == $relationName) {
            $this->initCursusResponsabilitys();
        }
        if ('EducationalPathResponsability' == $relationName) {
            $this->initEducationalPathResponsabilitys();
        }
        if ('UsersPaths' == $relationName) {
            $this->initUsersPathss();
        }
        if ('File' == $relationName) {
            $this->initFiles();
        }
        if ('Content' == $relationName) {
            $this->initContents();
        }
        if ('Report' == $relationName) {
            $this->initReports();
        }
        if ('News' == $relationName) {
            $this->initNewss();
        }
        if ('Event' == $relationName) {
            $this->initEvents();
        }
        if ('Token' == $relationName) {
            $this->initTokens();
        }
    }

    /**
     * Clears out the collCursusResponsabilitys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addCursusResponsabilitys()
     */
    public function clearCursusResponsabilitys()
    {
        $this->collCursusResponsabilitys = null; // important to set this to null since that means it is uninitialized
        $this->collCursusResponsabilitysPartial = null;

        return $this;
    }

    /**
     * reset is the collCursusResponsabilitys collection loaded partially
     *
     * @return void
     */
    public function resetPartialCursusResponsabilitys($v = true)
    {
        $this->collCursusResponsabilitysPartial = $v;
    }

    /**
     * Initializes the collCursusResponsabilitys collection.
     *
     * By default this just sets the collCursusResponsabilitys collection to an empty array (like clearcollCursusResponsabilitys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCursusResponsabilitys($overrideExisting = true)
    {
        if (null !== $this->collCursusResponsabilitys && !$overrideExisting) {
            return;
        }
        $this->collCursusResponsabilitys = new PropelObjectCollection();
        $this->collCursusResponsabilitys->setModel('Cursus');
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
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Cursus[] List of Cursus objects
     * @throws PropelException
     */
    public function getCursusResponsabilitys($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCursusResponsabilitysPartial && !$this->isNew();
        if (null === $this->collCursusResponsabilitys || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCursusResponsabilitys) {
                // return empty collection
                $this->initCursusResponsabilitys();
            } else {
                $collCursusResponsabilitys = CursusQuery::create(null, $criteria)
                    ->filterByResponsable($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCursusResponsabilitysPartial && count($collCursusResponsabilitys)) {
                      $this->initCursusResponsabilitys(false);

                      foreach($collCursusResponsabilitys as $obj) {
                        if (false == $this->collCursusResponsabilitys->contains($obj)) {
                          $this->collCursusResponsabilitys->append($obj);
                        }
                      }

                      $this->collCursusResponsabilitysPartial = true;
                    }

                    $collCursusResponsabilitys->getInternalIterator()->rewind();
                    return $collCursusResponsabilitys;
                }

                if($partial && $this->collCursusResponsabilitys) {
                    foreach($this->collCursusResponsabilitys as $obj) {
                        if($obj->isNew()) {
                            $collCursusResponsabilitys[] = $obj;
                        }
                    }
                }

                $this->collCursusResponsabilitys = $collCursusResponsabilitys;
                $this->collCursusResponsabilitysPartial = false;
            }
        }

        return $this->collCursusResponsabilitys;
    }

    /**
     * Sets a collection of CursusResponsability objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $cursusResponsabilitys A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setCursusResponsabilitys(PropelCollection $cursusResponsabilitys, PropelPDO $con = null)
    {
        $cursusResponsabilitysToDelete = $this->getCursusResponsabilitys(new Criteria(), $con)->diff($cursusResponsabilitys);

        $this->cursusResponsabilitysScheduledForDeletion = unserialize(serialize($cursusResponsabilitysToDelete));

        foreach ($cursusResponsabilitysToDelete as $cursusResponsabilityRemoved) {
            $cursusResponsabilityRemoved->setResponsable(null);
        }

        $this->collCursusResponsabilitys = null;
        foreach ($cursusResponsabilitys as $cursusResponsability) {
            $this->addCursusResponsability($cursusResponsability);
        }

        $this->collCursusResponsabilitys = $cursusResponsabilitys;
        $this->collCursusResponsabilitysPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Cursus objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Cursus objects.
     * @throws PropelException
     */
    public function countCursusResponsabilitys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCursusResponsabilitysPartial && !$this->isNew();
        if (null === $this->collCursusResponsabilitys || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCursusResponsabilitys) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getCursusResponsabilitys());
            }
            $query = CursusQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByResponsable($this)
                ->count($con);
        }

        return count($this->collCursusResponsabilitys);
    }

    /**
     * Method called to associate a Cursus object to this object
     * through the Cursus foreign key attribute.
     *
     * @param    Cursus $l Cursus
     * @return User The current object (for fluent API support)
     */
    public function addCursusResponsability(Cursus $l)
    {
        if ($this->collCursusResponsabilitys === null) {
            $this->initCursusResponsabilitys();
            $this->collCursusResponsabilitysPartial = true;
        }
        if (!in_array($l, $this->collCursusResponsabilitys->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCursusResponsability($l);
        }

        return $this;
    }

    /**
     * @param	CursusResponsability $cursusResponsability The cursusResponsability object to add.
     */
    protected function doAddCursusResponsability($cursusResponsability)
    {
        $this->collCursusResponsabilitys[]= $cursusResponsability;
        $cursusResponsability->setResponsable($this);
    }

    /**
     * @param	CursusResponsability $cursusResponsability The cursusResponsability object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeCursusResponsability($cursusResponsability)
    {
        if ($this->getCursusResponsabilitys()->contains($cursusResponsability)) {
            $this->collCursusResponsabilitys->remove($this->collCursusResponsabilitys->search($cursusResponsability));
            if (null === $this->cursusResponsabilitysScheduledForDeletion) {
                $this->cursusResponsabilitysScheduledForDeletion = clone $this->collCursusResponsabilitys;
                $this->cursusResponsabilitysScheduledForDeletion->clear();
            }
            $this->cursusResponsabilitysScheduledForDeletion[]= $cursusResponsability;
            $cursusResponsability->setResponsable(null);
        }

        return $this;
    }

    /**
     * Clears out the collEducationalPathResponsabilitys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addEducationalPathResponsabilitys()
     */
    public function clearEducationalPathResponsabilitys()
    {
        $this->collEducationalPathResponsabilitys = null; // important to set this to null since that means it is uninitialized
        $this->collEducationalPathResponsabilitysPartial = null;

        return $this;
    }

    /**
     * reset is the collEducationalPathResponsabilitys collection loaded partially
     *
     * @return void
     */
    public function resetPartialEducationalPathResponsabilitys($v = true)
    {
        $this->collEducationalPathResponsabilitysPartial = $v;
    }

    /**
     * Initializes the collEducationalPathResponsabilitys collection.
     *
     * By default this just sets the collEducationalPathResponsabilitys collection to an empty array (like clearcollEducationalPathResponsabilitys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEducationalPathResponsabilitys($overrideExisting = true)
    {
        if (null !== $this->collEducationalPathResponsabilitys && !$overrideExisting) {
            return;
        }
        $this->collEducationalPathResponsabilitys = new PropelObjectCollection();
        $this->collEducationalPathResponsabilitys->setModel('EducationalPath');
    }

    /**
     * Gets an array of EducationalPath objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|EducationalPath[] List of EducationalPath objects
     * @throws PropelException
     */
    public function getEducationalPathResponsabilitys($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collEducationalPathResponsabilitysPartial && !$this->isNew();
        if (null === $this->collEducationalPathResponsabilitys || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEducationalPathResponsabilitys) {
                // return empty collection
                $this->initEducationalPathResponsabilitys();
            } else {
                $collEducationalPathResponsabilitys = EducationalPathQuery::create(null, $criteria)
                    ->filterByResponsable($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collEducationalPathResponsabilitysPartial && count($collEducationalPathResponsabilitys)) {
                      $this->initEducationalPathResponsabilitys(false);

                      foreach($collEducationalPathResponsabilitys as $obj) {
                        if (false == $this->collEducationalPathResponsabilitys->contains($obj)) {
                          $this->collEducationalPathResponsabilitys->append($obj);
                        }
                      }

                      $this->collEducationalPathResponsabilitysPartial = true;
                    }

                    $collEducationalPathResponsabilitys->getInternalIterator()->rewind();
                    return $collEducationalPathResponsabilitys;
                }

                if($partial && $this->collEducationalPathResponsabilitys) {
                    foreach($this->collEducationalPathResponsabilitys as $obj) {
                        if($obj->isNew()) {
                            $collEducationalPathResponsabilitys[] = $obj;
                        }
                    }
                }

                $this->collEducationalPathResponsabilitys = $collEducationalPathResponsabilitys;
                $this->collEducationalPathResponsabilitysPartial = false;
            }
        }

        return $this->collEducationalPathResponsabilitys;
    }

    /**
     * Sets a collection of EducationalPathResponsability objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $educationalPathResponsabilitys A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setEducationalPathResponsabilitys(PropelCollection $educationalPathResponsabilitys, PropelPDO $con = null)
    {
        $educationalPathResponsabilitysToDelete = $this->getEducationalPathResponsabilitys(new Criteria(), $con)->diff($educationalPathResponsabilitys);

        $this->educationalPathResponsabilitysScheduledForDeletion = unserialize(serialize($educationalPathResponsabilitysToDelete));

        foreach ($educationalPathResponsabilitysToDelete as $educationalPathResponsabilityRemoved) {
            $educationalPathResponsabilityRemoved->setResponsable(null);
        }

        $this->collEducationalPathResponsabilitys = null;
        foreach ($educationalPathResponsabilitys as $educationalPathResponsability) {
            $this->addEducationalPathResponsability($educationalPathResponsability);
        }

        $this->collEducationalPathResponsabilitys = $educationalPathResponsabilitys;
        $this->collEducationalPathResponsabilitysPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EducationalPath objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related EducationalPath objects.
     * @throws PropelException
     */
    public function countEducationalPathResponsabilitys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collEducationalPathResponsabilitysPartial && !$this->isNew();
        if (null === $this->collEducationalPathResponsabilitys || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEducationalPathResponsabilitys) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getEducationalPathResponsabilitys());
            }
            $query = EducationalPathQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByResponsable($this)
                ->count($con);
        }

        return count($this->collEducationalPathResponsabilitys);
    }

    /**
     * Method called to associate a EducationalPath object to this object
     * through the EducationalPath foreign key attribute.
     *
     * @param    EducationalPath $l EducationalPath
     * @return User The current object (for fluent API support)
     */
    public function addEducationalPathResponsability(EducationalPath $l)
    {
        if ($this->collEducationalPathResponsabilitys === null) {
            $this->initEducationalPathResponsabilitys();
            $this->collEducationalPathResponsabilitysPartial = true;
        }
        if (!in_array($l, $this->collEducationalPathResponsabilitys->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddEducationalPathResponsability($l);
        }

        return $this;
    }

    /**
     * @param	EducationalPathResponsability $educationalPathResponsability The educationalPathResponsability object to add.
     */
    protected function doAddEducationalPathResponsability($educationalPathResponsability)
    {
        $this->collEducationalPathResponsabilitys[]= $educationalPathResponsability;
        $educationalPathResponsability->setResponsable($this);
    }

    /**
     * @param	EducationalPathResponsability $educationalPathResponsability The educationalPathResponsability object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeEducationalPathResponsability($educationalPathResponsability)
    {
        if ($this->getEducationalPathResponsabilitys()->contains($educationalPathResponsability)) {
            $this->collEducationalPathResponsabilitys->remove($this->collEducationalPathResponsabilitys->search($educationalPathResponsability));
            if (null === $this->educationalPathResponsabilitysScheduledForDeletion) {
                $this->educationalPathResponsabilitysScheduledForDeletion = clone $this->collEducationalPathResponsabilitys;
                $this->educationalPathResponsabilitysScheduledForDeletion->clear();
            }
            $this->educationalPathResponsabilitysScheduledForDeletion[]= $educationalPathResponsability;
            $educationalPathResponsability->setResponsable(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related EducationalPathResponsabilitys from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|EducationalPath[] List of EducationalPath objects
     */
    public function getEducationalPathResponsabilitysJoinCursus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EducationalPathQuery::create(null, $criteria);
        $query->joinWith('Cursus', $join_behavior);

        return $this->getEducationalPathResponsabilitys($query, $con);
    }

    /**
     * Clears out the collUsersPathss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addUsersPathss()
     */
    public function clearUsersPathss()
    {
        $this->collUsersPathss = null; // important to set this to null since that means it is uninitialized
        $this->collUsersPathssPartial = null;

        return $this;
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
     * If this User is new, it will return
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
                    ->filterByUser($this)
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

                    $collUsersPathss->getInternalIterator()->rewind();
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
     * @return User The current object (for fluent API support)
     */
    public function setUsersPathss(PropelCollection $usersPathss, PropelPDO $con = null)
    {
        $usersPathssToDelete = $this->getUsersPathss(new Criteria(), $con)->diff($usersPathss);

        $this->usersPathssScheduledForDeletion = unserialize(serialize($usersPathssToDelete));

        foreach ($usersPathssToDelete as $usersPathsRemoved) {
            $usersPathsRemoved->setUser(null);
        }

        $this->collUsersPathss = null;
        foreach ($usersPathss as $usersPaths) {
            $this->addUsersPaths($usersPaths);
        }

        $this->collUsersPathss = $usersPathss;
        $this->collUsersPathssPartial = false;

        return $this;
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
            }

            if($partial && !$criteria) {
                return count($this->getUsersPathss());
            }
            $query = UsersPathsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collUsersPathss);
    }

    /**
     * Method called to associate a UsersPaths object to this object
     * through the UsersPaths foreign key attribute.
     *
     * @param    UsersPaths $l UsersPaths
     * @return User The current object (for fluent API support)
     */
    public function addUsersPaths(UsersPaths $l)
    {
        if ($this->collUsersPathss === null) {
            $this->initUsersPathss();
            $this->collUsersPathssPartial = true;
        }
        if (!in_array($l, $this->collUsersPathss->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
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
        $usersPaths->setUser($this);
    }

    /**
     * @param	UsersPaths $usersPaths The usersPaths object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeUsersPaths($usersPaths)
    {
        if ($this->getUsersPathss()->contains($usersPaths)) {
            $this->collUsersPathss->remove($this->collUsersPathss->search($usersPaths));
            if (null === $this->usersPathssScheduledForDeletion) {
                $this->usersPathssScheduledForDeletion = clone $this->collUsersPathss;
                $this->usersPathssScheduledForDeletion->clear();
            }
            $this->usersPathssScheduledForDeletion[]= clone $usersPaths;
            $usersPaths->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related UsersPathss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UsersPaths[] List of UsersPaths objects
     */
    public function getUsersPathssJoinEducationalPath($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UsersPathsQuery::create(null, $criteria);
        $query->joinWith('EducationalPath', $join_behavior);

        return $this->getUsersPathss($query, $con);
    }

    /**
     * Clears out the collFiles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addFiles()
     */
    public function clearFiles()
    {
        $this->collFiles = null; // important to set this to null since that means it is uninitialized
        $this->collFilesPartial = null;

        return $this;
    }

    /**
     * reset is the collFiles collection loaded partially
     *
     * @return void
     */
    public function resetPartialFiles($v = true)
    {
        $this->collFilesPartial = $v;
    }

    /**
     * Initializes the collFiles collection.
     *
     * By default this just sets the collFiles collection to an empty array (like clearcollFiles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFiles($overrideExisting = true)
    {
        if (null !== $this->collFiles && !$overrideExisting) {
            return;
        }
        $this->collFiles = new PropelObjectCollection();
        $this->collFiles->setModel('File');
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
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|File[] List of File objects
     * @throws PropelException
     */
    public function getFiles($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collFilesPartial && !$this->isNew();
        if (null === $this->collFiles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFiles) {
                // return empty collection
                $this->initFiles();
            } else {
                $collFiles = FileQuery::create(null, $criteria)
                    ->filterByAuthor($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collFilesPartial && count($collFiles)) {
                      $this->initFiles(false);

                      foreach($collFiles as $obj) {
                        if (false == $this->collFiles->contains($obj)) {
                          $this->collFiles->append($obj);
                        }
                      }

                      $this->collFilesPartial = true;
                    }

                    $collFiles->getInternalIterator()->rewind();
                    return $collFiles;
                }

                if($partial && $this->collFiles) {
                    foreach($this->collFiles as $obj) {
                        if($obj->isNew()) {
                            $collFiles[] = $obj;
                        }
                    }
                }

                $this->collFiles = $collFiles;
                $this->collFilesPartial = false;
            }
        }

        return $this->collFiles;
    }

    /**
     * Sets a collection of File objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $files A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setFiles(PropelCollection $files, PropelPDO $con = null)
    {
        $filesToDelete = $this->getFiles(new Criteria(), $con)->diff($files);

        $this->filesScheduledForDeletion = unserialize(serialize($filesToDelete));

        foreach ($filesToDelete as $fileRemoved) {
            $fileRemoved->setAuthor(null);
        }

        $this->collFiles = null;
        foreach ($files as $file) {
            $this->addFile($file);
        }

        $this->collFiles = $files;
        $this->collFilesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related File objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related File objects.
     * @throws PropelException
     */
    public function countFiles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collFilesPartial && !$this->isNew();
        if (null === $this->collFiles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFiles) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getFiles());
            }
            $query = FileQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAuthor($this)
                ->count($con);
        }

        return count($this->collFiles);
    }

    /**
     * Method called to associate a File object to this object
     * through the File foreign key attribute.
     *
     * @param    File $l File
     * @return User The current object (for fluent API support)
     */
    public function addFile(File $l)
    {
        if ($this->collFiles === null) {
            $this->initFiles();
            $this->collFilesPartial = true;
        }
        if (!in_array($l, $this->collFiles->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddFile($l);
        }

        return $this;
    }

    /**
     * @param	File $file The file object to add.
     */
    protected function doAddFile($file)
    {
        $this->collFiles[]= $file;
        $file->setAuthor($this);
    }

    /**
     * @param	File $file The file object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeFile($file)
    {
        if ($this->getFiles()->contains($file)) {
            $this->collFiles->remove($this->collFiles->search($file));
            if (null === $this->filesScheduledForDeletion) {
                $this->filesScheduledForDeletion = clone $this->collFiles;
                $this->filesScheduledForDeletion->clear();
            }
            $this->filesScheduledForDeletion[]= $file;
            $file->setAuthor(null);
        }

        return $this;
    }

    /**
     * Clears out the collContents collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
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
     * If this User is new, it will return
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
                    ->filterByAuthor($this)
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
     * @return User The current object (for fluent API support)
     */
    public function setContents(PropelCollection $contents, PropelPDO $con = null)
    {
        $contentsToDelete = $this->getContents(new Criteria(), $con)->diff($contents);

        $this->contentsScheduledForDeletion = unserialize(serialize($contentsToDelete));

        foreach ($contentsToDelete as $contentRemoved) {
            $contentRemoved->setAuthor(null);
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
                ->filterByAuthor($this)
                ->count($con);
        }

        return count($this->collContents);
    }

    /**
     * Method called to associate a Content object to this object
     * through the Content foreign key attribute.
     *
     * @param    Content $l Content
     * @return User The current object (for fluent API support)
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
        $content->setAuthor($this);
    }

    /**
     * @param	Content $content The content object to remove.
     * @return User The current object (for fluent API support)
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

        return $this;
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
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Contents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
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
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Contents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
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
     * Clears out the collReports collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addReports()
     */
    public function clearReports()
    {
        $this->collReports = null; // important to set this to null since that means it is uninitialized
        $this->collReportsPartial = null;

        return $this;
    }

    /**
     * reset is the collReports collection loaded partially
     *
     * @return void
     */
    public function resetPartialReports($v = true)
    {
        $this->collReportsPartial = $v;
    }

    /**
     * Initializes the collReports collection.
     *
     * By default this just sets the collReports collection to an empty array (like clearcollReports());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
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
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Report[] List of Report objects
     * @throws PropelException
     */
    public function getReports($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collReportsPartial && !$this->isNew();
        if (null === $this->collReports || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collReports) {
                // return empty collection
                $this->initReports();
            } else {
                $collReports = ReportQuery::create(null, $criteria)
                    ->filterByAuthor($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collReportsPartial && count($collReports)) {
                      $this->initReports(false);

                      foreach($collReports as $obj) {
                        if (false == $this->collReports->contains($obj)) {
                          $this->collReports->append($obj);
                        }
                      }

                      $this->collReportsPartial = true;
                    }

                    $collReports->getInternalIterator()->rewind();
                    return $collReports;
                }

                if($partial && $this->collReports) {
                    foreach($this->collReports as $obj) {
                        if($obj->isNew()) {
                            $collReports[] = $obj;
                        }
                    }
                }

                $this->collReports = $collReports;
                $this->collReportsPartial = false;
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
     * @param PropelCollection $reports A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setReports(PropelCollection $reports, PropelPDO $con = null)
    {
        $reportsToDelete = $this->getReports(new Criteria(), $con)->diff($reports);

        $this->reportsScheduledForDeletion = unserialize(serialize($reportsToDelete));

        foreach ($reportsToDelete as $reportRemoved) {
            $reportRemoved->setAuthor(null);
        }

        $this->collReports = null;
        foreach ($reports as $report) {
            $this->addReport($report);
        }

        $this->collReports = $reports;
        $this->collReportsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Report objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Report objects.
     * @throws PropelException
     */
    public function countReports(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collReportsPartial && !$this->isNew();
        if (null === $this->collReports || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collReports) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getReports());
            }
            $query = ReportQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAuthor($this)
                ->count($con);
        }

        return count($this->collReports);
    }

    /**
     * Method called to associate a Report object to this object
     * through the Report foreign key attribute.
     *
     * @param    Report $l Report
     * @return User The current object (for fluent API support)
     */
    public function addReport(Report $l)
    {
        if ($this->collReports === null) {
            $this->initReports();
            $this->collReportsPartial = true;
        }
        if (!in_array($l, $this->collReports->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
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
     * @return User The current object (for fluent API support)
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

        return $this;
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
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Report[] List of Report objects
     */
    public function getReportsJoinContent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ReportQuery::create(null, $criteria);
        $query->joinWith('Content', $join_behavior);

        return $this->getReports($query, $con);
    }

    /**
     * Clears out the collNewss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
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
     * If this User is new, it will return
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
                    ->filterByAuthor($this)
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
     * @return User The current object (for fluent API support)
     */
    public function setNewss(PropelCollection $newss, PropelPDO $con = null)
    {
        $newssToDelete = $this->getNewss(new Criteria(), $con)->diff($newss);

        $this->newssScheduledForDeletion = unserialize(serialize($newssToDelete));

        foreach ($newssToDelete as $newsRemoved) {
            $newsRemoved->setAuthor(null);
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
                ->filterByAuthor($this)
                ->count($con);
        }

        return count($this->collNewss);
    }

    /**
     * Method called to associate a News object to this object
     * through the News foreign key attribute.
     *
     * @param    News $l News
     * @return User The current object (for fluent API support)
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
        $news->setAuthor($this);
    }

    /**
     * @param	News $news The news object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeNews($news)
    {
        if ($this->getNewss()->contains($news)) {
            $this->collNewss->remove($this->collNewss->search($news));
            if (null === $this->newssScheduledForDeletion) {
                $this->newssScheduledForDeletion = clone $this->collNewss;
                $this->newssScheduledForDeletion->clear();
            }
            $this->newssScheduledForDeletion[]= clone $news;
            $news->setAuthor(null);
        }

        return $this;
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
     * Clears out the collEvents collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addEvents()
     */
    public function clearEvents()
    {
        $this->collEvents = null; // important to set this to null since that means it is uninitialized
        $this->collEventsPartial = null;

        return $this;
    }

    /**
     * reset is the collEvents collection loaded partially
     *
     * @return void
     */
    public function resetPartialEvents($v = true)
    {
        $this->collEventsPartial = $v;
    }

    /**
     * Initializes the collEvents collection.
     *
     * By default this just sets the collEvents collection to an empty array (like clearcollEvents());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEvents($overrideExisting = true)
    {
        if (null !== $this->collEvents && !$overrideExisting) {
            return;
        }
        $this->collEvents = new PropelObjectCollection();
        $this->collEvents->setModel('Event');
    }

    /**
     * Gets an array of Event objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Event[] List of Event objects
     * @throws PropelException
     */
    public function getEvents($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collEventsPartial && !$this->isNew();
        if (null === $this->collEvents || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEvents) {
                // return empty collection
                $this->initEvents();
            } else {
                $collEvents = EventQuery::create(null, $criteria)
                    ->filterByAuthor($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collEventsPartial && count($collEvents)) {
                      $this->initEvents(false);

                      foreach($collEvents as $obj) {
                        if (false == $this->collEvents->contains($obj)) {
                          $this->collEvents->append($obj);
                        }
                      }

                      $this->collEventsPartial = true;
                    }

                    $collEvents->getInternalIterator()->rewind();
                    return $collEvents;
                }

                if($partial && $this->collEvents) {
                    foreach($this->collEvents as $obj) {
                        if($obj->isNew()) {
                            $collEvents[] = $obj;
                        }
                    }
                }

                $this->collEvents = $collEvents;
                $this->collEventsPartial = false;
            }
        }

        return $this->collEvents;
    }

    /**
     * Sets a collection of Event objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $events A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setEvents(PropelCollection $events, PropelPDO $con = null)
    {
        $eventsToDelete = $this->getEvents(new Criteria(), $con)->diff($events);

        $this->eventsScheduledForDeletion = unserialize(serialize($eventsToDelete));

        foreach ($eventsToDelete as $eventRemoved) {
            $eventRemoved->setAuthor(null);
        }

        $this->collEvents = null;
        foreach ($events as $event) {
            $this->addEvent($event);
        }

        $this->collEvents = $events;
        $this->collEventsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Event objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Event objects.
     * @throws PropelException
     */
    public function countEvents(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collEventsPartial && !$this->isNew();
        if (null === $this->collEvents || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEvents) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getEvents());
            }
            $query = EventQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAuthor($this)
                ->count($con);
        }

        return count($this->collEvents);
    }

    /**
     * Method called to associate a Event object to this object
     * through the Event foreign key attribute.
     *
     * @param    Event $l Event
     * @return User The current object (for fluent API support)
     */
    public function addEvent(Event $l)
    {
        if ($this->collEvents === null) {
            $this->initEvents();
            $this->collEventsPartial = true;
        }
        if (!in_array($l, $this->collEvents->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddEvent($l);
        }

        return $this;
    }

    /**
     * @param	Event $event The event object to add.
     */
    protected function doAddEvent($event)
    {
        $this->collEvents[]= $event;
        $event->setAuthor($this);
    }

    /**
     * @param	Event $event The event object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeEvent($event)
    {
        if ($this->getEvents()->contains($event)) {
            $this->collEvents->remove($this->collEvents->search($event));
            if (null === $this->eventsScheduledForDeletion) {
                $this->eventsScheduledForDeletion = clone $this->collEvents;
                $this->eventsScheduledForDeletion->clear();
            }
            $this->eventsScheduledForDeletion[]= $event;
            $event->setAuthor(null);
        }

        return $this;
    }

    /**
     * Clears out the collTokens collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addTokens()
     */
    public function clearTokens()
    {
        $this->collTokens = null; // important to set this to null since that means it is uninitialized
        $this->collTokensPartial = null;

        return $this;
    }

    /**
     * reset is the collTokens collection loaded partially
     *
     * @return void
     */
    public function resetPartialTokens($v = true)
    {
        $this->collTokensPartial = $v;
    }

    /**
     * Initializes the collTokens collection.
     *
     * By default this just sets the collTokens collection to an empty array (like clearcollTokens());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTokens($overrideExisting = true)
    {
        if (null !== $this->collTokens && !$overrideExisting) {
            return;
        }
        $this->collTokens = new PropelObjectCollection();
        $this->collTokens->setModel('Token');
    }

    /**
     * Gets an array of Token objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Token[] List of Token objects
     * @throws PropelException
     */
    public function getTokens($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTokensPartial && !$this->isNew();
        if (null === $this->collTokens || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTokens) {
                // return empty collection
                $this->initTokens();
            } else {
                $collTokens = TokenQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTokensPartial && count($collTokens)) {
                      $this->initTokens(false);

                      foreach($collTokens as $obj) {
                        if (false == $this->collTokens->contains($obj)) {
                          $this->collTokens->append($obj);
                        }
                      }

                      $this->collTokensPartial = true;
                    }

                    $collTokens->getInternalIterator()->rewind();
                    return $collTokens;
                }

                if($partial && $this->collTokens) {
                    foreach($this->collTokens as $obj) {
                        if($obj->isNew()) {
                            $collTokens[] = $obj;
                        }
                    }
                }

                $this->collTokens = $collTokens;
                $this->collTokensPartial = false;
            }
        }

        return $this->collTokens;
    }

    /**
     * Sets a collection of Token objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tokens A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setTokens(PropelCollection $tokens, PropelPDO $con = null)
    {
        $tokensToDelete = $this->getTokens(new Criteria(), $con)->diff($tokens);

        $this->tokensScheduledForDeletion = unserialize(serialize($tokensToDelete));

        foreach ($tokensToDelete as $tokenRemoved) {
            $tokenRemoved->setUser(null);
        }

        $this->collTokens = null;
        foreach ($tokens as $token) {
            $this->addToken($token);
        }

        $this->collTokens = $tokens;
        $this->collTokensPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Token objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Token objects.
     * @throws PropelException
     */
    public function countTokens(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTokensPartial && !$this->isNew();
        if (null === $this->collTokens || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTokens) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTokens());
            }
            $query = TokenQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collTokens);
    }

    /**
     * Method called to associate a Token object to this object
     * through the Token foreign key attribute.
     *
     * @param    Token $l Token
     * @return User The current object (for fluent API support)
     */
    public function addToken(Token $l)
    {
        if ($this->collTokens === null) {
            $this->initTokens();
            $this->collTokensPartial = true;
        }
        if (!in_array($l, $this->collTokens->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddToken($l);
        }

        return $this;
    }

    /**
     * @param	Token $token The token object to add.
     */
    protected function doAddToken($token)
    {
        $this->collTokens[]= $token;
        $token->setUser($this);
    }

    /**
     * @param	Token $token The token object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeToken($token)
    {
        if ($this->getTokens()->contains($token)) {
            $this->collTokens->remove($this->collTokens->search($token));
            if (null === $this->tokensScheduledForDeletion) {
                $this->tokensScheduledForDeletion = clone $this->collTokens;
                $this->tokensScheduledForDeletion->clear();
            }
            $this->tokensScheduledForDeletion[]= $token;
            $token->setUser(null);
        }

        return $this;
    }

    /**
     * Clears out the collEducationalPaths collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addEducationalPaths()
     */
    public function clearEducationalPaths()
    {
        $this->collEducationalPaths = null; // important to set this to null since that means it is uninitialized
        $this->collEducationalPathsPartial = null;

        return $this;
    }

    /**
     * Initializes the collEducationalPaths collection.
     *
     * By default this just sets the collEducationalPaths collection to an empty collection (like clearEducationalPaths());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initEducationalPaths()
    {
        $this->collEducationalPaths = new PropelObjectCollection();
        $this->collEducationalPaths->setModel('EducationalPath');
    }

    /**
     * Gets a collection of EducationalPath objects related by a many-to-many relationship
     * to the current object by way of the users_paths cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|EducationalPath[] List of EducationalPath objects
     */
    public function getEducationalPaths($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collEducationalPaths || null !== $criteria) {
            if ($this->isNew() && null === $this->collEducationalPaths) {
                // return empty collection
                $this->initEducationalPaths();
            } else {
                $collEducationalPaths = EducationalPathQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collEducationalPaths;
                }
                $this->collEducationalPaths = $collEducationalPaths;
            }
        }

        return $this->collEducationalPaths;
    }

    /**
     * Sets a collection of EducationalPath objects related by a many-to-many relationship
     * to the current object by way of the users_paths cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $educationalPaths A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setEducationalPaths(PropelCollection $educationalPaths, PropelPDO $con = null)
    {
        $this->clearEducationalPaths();
        $currentEducationalPaths = $this->getEducationalPaths();

        $this->educationalPathsScheduledForDeletion = $currentEducationalPaths->diff($educationalPaths);

        foreach ($educationalPaths as $educationalPath) {
            if (!$currentEducationalPaths->contains($educationalPath)) {
                $this->doAddEducationalPath($educationalPath);
            }
        }

        $this->collEducationalPaths = $educationalPaths;

        return $this;
    }

    /**
     * Gets the number of EducationalPath objects related by a many-to-many relationship
     * to the current object by way of the users_paths cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related EducationalPath objects
     */
    public function countEducationalPaths($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collEducationalPaths || null !== $criteria) {
            if ($this->isNew() && null === $this->collEducationalPaths) {
                return 0;
            } else {
                $query = EducationalPathQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByUser($this)
                    ->count($con);
            }
        } else {
            return count($this->collEducationalPaths);
        }
    }

    /**
     * Associate a EducationalPath object to this object
     * through the users_paths cross reference table.
     *
     * @param  EducationalPath $educationalPath The UsersPaths object to relate
     * @return User The current object (for fluent API support)
     */
    public function addEducationalPath(EducationalPath $educationalPath)
    {
        if ($this->collEducationalPaths === null) {
            $this->initEducationalPaths();
        }
        if (!$this->collEducationalPaths->contains($educationalPath)) { // only add it if the **same** object is not already associated
            $this->doAddEducationalPath($educationalPath);

            $this->collEducationalPaths[]= $educationalPath;
        }

        return $this;
    }

    /**
     * @param	EducationalPath $educationalPath The educationalPath object to add.
     */
    protected function doAddEducationalPath($educationalPath)
    {
        $usersPaths = new UsersPaths();
        $usersPaths->setEducationalPath($educationalPath);
        $this->addUsersPaths($usersPaths);
    }

    /**
     * Remove a EducationalPath object to this object
     * through the users_paths cross reference table.
     *
     * @param EducationalPath $educationalPath The UsersPaths object to relate
     * @return User The current object (for fluent API support)
     */
    public function removeEducationalPath(EducationalPath $educationalPath)
    {
        if ($this->getEducationalPaths()->contains($educationalPath)) {
            $this->collEducationalPaths->remove($this->collEducationalPaths->search($educationalPath));
            if (null === $this->educationalPathsScheduledForDeletion) {
                $this->educationalPathsScheduledForDeletion = clone $this->collEducationalPaths;
                $this->educationalPathsScheduledForDeletion->clear();
            }
            $this->educationalPathsScheduledForDeletion[]= $educationalPath;
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->username = null;
        $this->password_hash = null;
        $this->rights = null;
        $this->firstname = null;
        $this->lastname = null;
        $this->gender = null;
        $this->email = null;
        $this->phone = null;
        $this->website = null;
        $this->birth_date = null;
        $this->first_entry = null;
        $this->last_entry = null;
        $this->expiration_date = null;
        $this->last_visit = null;
        $this->visits_count = null;
        $this->config_show_email = null;
        $this->config_show_phone = null;
        $this->config_show_real_name = null;
        $this->config_show_birthdate = null;
        $this->config_show_age = null;
        $this->config_index_profile = null;
        $this->config_private_profile = null;
        $this->activated = null;
        $this->is_a_teacher = null;
        $this->is_a_student = null;
        $this->is_an_alumni = null;
        $this->description = null;
        $this->description_isLoaded = false;
        $this->remarks = null;
        $this->remarks_isLoaded = false;
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
            if ($this->collCursusResponsabilitys) {
                foreach ($this->collCursusResponsabilitys as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEducationalPathResponsabilitys) {
                foreach ($this->collEducationalPathResponsabilitys as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUsersPathss) {
                foreach ($this->collUsersPathss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFiles) {
                foreach ($this->collFiles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collContents) {
                foreach ($this->collContents as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collReports) {
                foreach ($this->collReports as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNewss) {
                foreach ($this->collNewss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEvents) {
                foreach ($this->collEvents as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTokens) {
                foreach ($this->collTokens as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEducationalPaths) {
                foreach ($this->collEducationalPaths as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collCursusResponsabilitys instanceof PropelCollection) {
            $this->collCursusResponsabilitys->clearIterator();
        }
        $this->collCursusResponsabilitys = null;
        if ($this->collEducationalPathResponsabilitys instanceof PropelCollection) {
            $this->collEducationalPathResponsabilitys->clearIterator();
        }
        $this->collEducationalPathResponsabilitys = null;
        if ($this->collUsersPathss instanceof PropelCollection) {
            $this->collUsersPathss->clearIterator();
        }
        $this->collUsersPathss = null;
        if ($this->collFiles instanceof PropelCollection) {
            $this->collFiles->clearIterator();
        }
        $this->collFiles = null;
        if ($this->collContents instanceof PropelCollection) {
            $this->collContents->clearIterator();
        }
        $this->collContents = null;
        if ($this->collReports instanceof PropelCollection) {
            $this->collReports->clearIterator();
        }
        $this->collReports = null;
        if ($this->collNewss instanceof PropelCollection) {
            $this->collNewss->clearIterator();
        }
        $this->collNewss = null;
        if ($this->collEvents instanceof PropelCollection) {
            $this->collEvents->clearIterator();
        }
        $this->collEvents = null;
        if ($this->collTokens instanceof PropelCollection) {
            $this->collTokens->clearIterator();
        }
        $this->collTokens = null;
        if ($this->collEducationalPaths instanceof PropelCollection) {
            $this->collEducationalPaths->clearIterator();
        }
        $this->collEducationalPaths = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UserPeer::DEFAULT_STRING_FORMAT);
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
