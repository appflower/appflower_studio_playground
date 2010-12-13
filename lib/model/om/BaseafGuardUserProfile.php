<?php


/**
 * Base class that represents a row from the 'af_guard_user_profile' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseafGuardUserProfile extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'afGuardUserProfilePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        afGuardUserProfilePeer
	 */
	protected static $peer;

	/**
	 * The value for the user_id field.
	 * @var        int
	 */
	protected $user_id;

	/**
	 * The value for the timezones_id field.
	 * @var        int
	 */
	protected $timezones_id;

	/**
	 * The value for the first_name field.
	 * @var        string
	 */
	protected $first_name;

	/**
	 * The value for the last_name field.
	 * @var        string
	 */
	protected $last_name;

	/**
	 * The value for the job_title field.
	 * @var        string
	 */
	protected $job_title;

	/**
	 * The value for the phone_mobile field.
	 * @var        string
	 */
	protected $phone_mobile;

	/**
	 * The value for the phone_office field.
	 * @var        string
	 */
	protected $phone_office;

	/**
	 * The value for the personal_body field.
	 * @var        string
	 */
	protected $personal_body;

	/**
	 * The value for the image field.
	 * @var        string
	 */
	protected $image;

	/**
	 * The value for the is_developer field.
	 * @var        boolean
	 */
	protected $is_developer;

	/**
	 * The value for the widget_help_is_enabled field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $widget_help_is_enabled;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * The value for the updated_at field.
	 * @var        string
	 */
	protected $updated_at;

	/**
	 * @var        afGuardUser
	 */
	protected $aafGuardUser;

	/**
	 * @var        TimeZones
	 */
	protected $aTimeZones;

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
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->widget_help_is_enabled = true;
	}

	/**
	 * Initializes internal state of BaseafGuardUserProfile object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [user_id] column value.
	 * 
	 * @return     int
	 */
	public function getUserId()
	{
		return $this->user_id;
	}

	/**
	 * Get the [timezones_id] column value.
	 * 
	 * @return     int
	 */
	public function getTimezonesId()
	{
		return $this->timezones_id;
	}

	/**
	 * Get the [first_name] column value.
	 * 
	 * @return     string
	 */
	public function getFirstName()
	{
		return $this->first_name;
	}

	/**
	 * Get the [last_name] column value.
	 * 
	 * @return     string
	 */
	public function getLastName()
	{
		return $this->last_name;
	}

	/**
	 * Get the [job_title] column value.
	 * 
	 * @return     string
	 */
	public function getJobTitle()
	{
		return $this->job_title;
	}

	/**
	 * Get the [phone_mobile] column value.
	 * 
	 * @return     string
	 */
	public function getPhoneMobile()
	{
		return $this->phone_mobile;
	}

	/**
	 * Get the [phone_office] column value.
	 * 
	 * @return     string
	 */
	public function getPhoneOffice()
	{
		return $this->phone_office;
	}

	/**
	 * Get the [personal_body] column value.
	 * 
	 * @return     string
	 */
	public function getPersonalBody()
	{
		return $this->personal_body;
	}

	/**
	 * Get the [image] column value.
	 * 
	 * @return     string
	 */
	public function getImage()
	{
		return $this->image;
	}

	/**
	 * Get the [is_developer] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsDeveloper()
	{
		return $this->is_developer;
	}

	/**
	 * Get the [widget_help_is_enabled] column value.
	 * 
	 * @return     boolean
	 */
	public function getWidgetHelpIsEnabled()
	{
		return $this->widget_help_is_enabled;
	}

	/**
	 * Get the [optionally formatted] temporal [created_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}


		if ($this->created_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
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
	 * Get the [optionally formatted] temporal [updated_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->updated_at === null) {
			return null;
		}


		if ($this->updated_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->updated_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
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
	 * Set the value of [user_id] column.
	 * 
	 * @param      int $v new value
	 * @return     afGuardUserProfile The current object (for fluent API support)
	 */
	public function setUserId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = afGuardUserProfilePeer::USER_ID;
		}

		if ($this->aafGuardUser !== null && $this->aafGuardUser->getId() !== $v) {
			$this->aafGuardUser = null;
		}

		return $this;
	} // setUserId()

	/**
	 * Set the value of [timezones_id] column.
	 * 
	 * @param      int $v new value
	 * @return     afGuardUserProfile The current object (for fluent API support)
	 */
	public function setTimezonesId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->timezones_id !== $v) {
			$this->timezones_id = $v;
			$this->modifiedColumns[] = afGuardUserProfilePeer::TIMEZONES_ID;
		}

		if ($this->aTimeZones !== null && $this->aTimeZones->getId() !== $v) {
			$this->aTimeZones = null;
		}

		return $this;
	} // setTimezonesId()

	/**
	 * Set the value of [first_name] column.
	 * 
	 * @param      string $v new value
	 * @return     afGuardUserProfile The current object (for fluent API support)
	 */
	public function setFirstName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->first_name !== $v) {
			$this->first_name = $v;
			$this->modifiedColumns[] = afGuardUserProfilePeer::FIRST_NAME;
		}

		return $this;
	} // setFirstName()

	/**
	 * Set the value of [last_name] column.
	 * 
	 * @param      string $v new value
	 * @return     afGuardUserProfile The current object (for fluent API support)
	 */
	public function setLastName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->last_name !== $v) {
			$this->last_name = $v;
			$this->modifiedColumns[] = afGuardUserProfilePeer::LAST_NAME;
		}

		return $this;
	} // setLastName()

	/**
	 * Set the value of [job_title] column.
	 * 
	 * @param      string $v new value
	 * @return     afGuardUserProfile The current object (for fluent API support)
	 */
	public function setJobTitle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->job_title !== $v) {
			$this->job_title = $v;
			$this->modifiedColumns[] = afGuardUserProfilePeer::JOB_TITLE;
		}

		return $this;
	} // setJobTitle()

	/**
	 * Set the value of [phone_mobile] column.
	 * 
	 * @param      string $v new value
	 * @return     afGuardUserProfile The current object (for fluent API support)
	 */
	public function setPhoneMobile($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->phone_mobile !== $v) {
			$this->phone_mobile = $v;
			$this->modifiedColumns[] = afGuardUserProfilePeer::PHONE_MOBILE;
		}

		return $this;
	} // setPhoneMobile()

	/**
	 * Set the value of [phone_office] column.
	 * 
	 * @param      string $v new value
	 * @return     afGuardUserProfile The current object (for fluent API support)
	 */
	public function setPhoneOffice($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->phone_office !== $v) {
			$this->phone_office = $v;
			$this->modifiedColumns[] = afGuardUserProfilePeer::PHONE_OFFICE;
		}

		return $this;
	} // setPhoneOffice()

	/**
	 * Set the value of [personal_body] column.
	 * 
	 * @param      string $v new value
	 * @return     afGuardUserProfile The current object (for fluent API support)
	 */
	public function setPersonalBody($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->personal_body !== $v) {
			$this->personal_body = $v;
			$this->modifiedColumns[] = afGuardUserProfilePeer::PERSONAL_BODY;
		}

		return $this;
	} // setPersonalBody()

	/**
	 * Set the value of [image] column.
	 * 
	 * @param      string $v new value
	 * @return     afGuardUserProfile The current object (for fluent API support)
	 */
	public function setImage($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->image !== $v) {
			$this->image = $v;
			$this->modifiedColumns[] = afGuardUserProfilePeer::IMAGE;
		}

		return $this;
	} // setImage()

	/**
	 * Set the value of [is_developer] column.
	 * 
	 * @param      boolean $v new value
	 * @return     afGuardUserProfile The current object (for fluent API support)
	 */
	public function setIsDeveloper($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_developer !== $v) {
			$this->is_developer = $v;
			$this->modifiedColumns[] = afGuardUserProfilePeer::IS_DEVELOPER;
		}

		return $this;
	} // setIsDeveloper()

	/**
	 * Set the value of [widget_help_is_enabled] column.
	 * 
	 * @param      boolean $v new value
	 * @return     afGuardUserProfile The current object (for fluent API support)
	 */
	public function setWidgetHelpIsEnabled($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->widget_help_is_enabled !== $v || $this->isNew()) {
			$this->widget_help_is_enabled = $v;
			$this->modifiedColumns[] = afGuardUserProfilePeer::WIDGET_HELP_IS_ENABLED;
		}

		return $this;
	} // setWidgetHelpIsEnabled()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     afGuardUserProfile The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->created_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->created_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = afGuardUserProfilePeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     afGuardUserProfile The current object (for fluent API support)
	 */
	public function setUpdatedAt($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->updated_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->updated_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = afGuardUserProfilePeer::UPDATED_AT;
			}
		} // if either are not null

		return $this;
	} // setUpdatedAt()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->widget_help_is_enabled !== true) {
				return false;
			}

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
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->user_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->timezones_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->first_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->last_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->job_title = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->phone_mobile = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->phone_office = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->personal_body = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->image = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->is_developer = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
			$this->widget_help_is_enabled = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
			$this->created_at = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->updated_at = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 13; // 13 = afGuardUserProfilePeer::NUM_COLUMNS - afGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating afGuardUserProfile object", $e);
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
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aafGuardUser !== null && $this->user_id !== $this->aafGuardUser->getId()) {
			$this->aafGuardUser = null;
		}
		if ($this->aTimeZones !== null && $this->timezones_id !== $this->aTimeZones->getId()) {
			$this->aTimeZones = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
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
			$con = Propel::getConnection(afGuardUserProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = afGuardUserProfilePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aafGuardUser = null;
			$this->aTimeZones = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(afGuardUserProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseafGuardUserProfile:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				afGuardUserProfileQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseafGuardUserProfile:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
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
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(afGuardUserProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseafGuardUserProfile:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			// symfony_timestampable behavior
			if ($this->isModified() && !$this->isColumnModified(afGuardUserProfilePeer::UPDATED_AT))
			{
			  $this->setUpdatedAt(time());
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// symfony_timestampable behavior
				if (!$this->isColumnModified(afGuardUserProfilePeer::CREATED_AT))
				{
				  $this->setCreatedAt(time());
				}

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
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseafGuardUserProfile:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				afGuardUserProfilePeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
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
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
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

			if ($this->aafGuardUser !== null) {
				if ($this->aafGuardUser->isModified() || $this->aafGuardUser->isNew()) {
					$affectedRows += $this->aafGuardUser->save($con);
				}
				$this->setafGuardUser($this->aafGuardUser);
			}

			if ($this->aTimeZones !== null) {
				if ($this->aTimeZones->isModified() || $this->aTimeZones->isNew()) {
					$affectedRows += $this->aTimeZones->save($con);
				}
				$this->setTimeZones($this->aTimeZones);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setNew(false);
				} else {
					$affectedRows += afGuardUserProfilePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
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
	 * @return     boolean Whether all columns pass validation.
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
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
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

			if ($this->aafGuardUser !== null) {
				if (!$this->aafGuardUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aafGuardUser->getValidationFailures());
				}
			}

			if ($this->aTimeZones !== null) {
				if (!$this->aTimeZones->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTimeZones->getValidationFailures());
				}
			}


			if (($retval = afGuardUserProfilePeer::doValidate($this, $columns)) !== true) {
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
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = afGuardUserProfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getUserId();
				break;
			case 1:
				return $this->getTimezonesId();
				break;
			case 2:
				return $this->getFirstName();
				break;
			case 3:
				return $this->getLastName();
				break;
			case 4:
				return $this->getJobTitle();
				break;
			case 5:
				return $this->getPhoneMobile();
				break;
			case 6:
				return $this->getPhoneOffice();
				break;
			case 7:
				return $this->getPersonalBody();
				break;
			case 8:
				return $this->getImage();
				break;
			case 9:
				return $this->getIsDeveloper();
				break;
			case 10:
				return $this->getWidgetHelpIsEnabled();
				break;
			case 11:
				return $this->getCreatedAt();
				break;
			case 12:
				return $this->getUpdatedAt();
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
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $includeForeignObjects = false)
	{
		$keys = afGuardUserProfilePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getUserId(),
			$keys[1] => $this->getTimezonesId(),
			$keys[2] => $this->getFirstName(),
			$keys[3] => $this->getLastName(),
			$keys[4] => $this->getJobTitle(),
			$keys[5] => $this->getPhoneMobile(),
			$keys[6] => $this->getPhoneOffice(),
			$keys[7] => $this->getPersonalBody(),
			$keys[8] => $this->getImage(),
			$keys[9] => $this->getIsDeveloper(),
			$keys[10] => $this->getWidgetHelpIsEnabled(),
			$keys[11] => $this->getCreatedAt(),
			$keys[12] => $this->getUpdatedAt(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aafGuardUser) {
				$result['afGuardUser'] = $this->aafGuardUser->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aTimeZones) {
				$result['TimeZones'] = $this->aTimeZones->toArray($keyType, $includeLazyLoadColumns, true);
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
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = afGuardUserProfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setUserId($value);
				break;
			case 1:
				$this->setTimezonesId($value);
				break;
			case 2:
				$this->setFirstName($value);
				break;
			case 3:
				$this->setLastName($value);
				break;
			case 4:
				$this->setJobTitle($value);
				break;
			case 5:
				$this->setPhoneMobile($value);
				break;
			case 6:
				$this->setPhoneOffice($value);
				break;
			case 7:
				$this->setPersonalBody($value);
				break;
			case 8:
				$this->setImage($value);
				break;
			case 9:
				$this->setIsDeveloper($value);
				break;
			case 10:
				$this->setWidgetHelpIsEnabled($value);
				break;
			case 11:
				$this->setCreatedAt($value);
				break;
			case 12:
				$this->setUpdatedAt($value);
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
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = afGuardUserProfilePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setUserId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTimezonesId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFirstName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLastName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setJobTitle($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPhoneMobile($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPhoneOffice($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPersonalBody($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setImage($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setIsDeveloper($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setWidgetHelpIsEnabled($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatedAt($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUpdatedAt($arr[$keys[12]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(afGuardUserProfilePeer::DATABASE_NAME);

		if ($this->isColumnModified(afGuardUserProfilePeer::USER_ID)) $criteria->add(afGuardUserProfilePeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(afGuardUserProfilePeer::TIMEZONES_ID)) $criteria->add(afGuardUserProfilePeer::TIMEZONES_ID, $this->timezones_id);
		if ($this->isColumnModified(afGuardUserProfilePeer::FIRST_NAME)) $criteria->add(afGuardUserProfilePeer::FIRST_NAME, $this->first_name);
		if ($this->isColumnModified(afGuardUserProfilePeer::LAST_NAME)) $criteria->add(afGuardUserProfilePeer::LAST_NAME, $this->last_name);
		if ($this->isColumnModified(afGuardUserProfilePeer::JOB_TITLE)) $criteria->add(afGuardUserProfilePeer::JOB_TITLE, $this->job_title);
		if ($this->isColumnModified(afGuardUserProfilePeer::PHONE_MOBILE)) $criteria->add(afGuardUserProfilePeer::PHONE_MOBILE, $this->phone_mobile);
		if ($this->isColumnModified(afGuardUserProfilePeer::PHONE_OFFICE)) $criteria->add(afGuardUserProfilePeer::PHONE_OFFICE, $this->phone_office);
		if ($this->isColumnModified(afGuardUserProfilePeer::PERSONAL_BODY)) $criteria->add(afGuardUserProfilePeer::PERSONAL_BODY, $this->personal_body);
		if ($this->isColumnModified(afGuardUserProfilePeer::IMAGE)) $criteria->add(afGuardUserProfilePeer::IMAGE, $this->image);
		if ($this->isColumnModified(afGuardUserProfilePeer::IS_DEVELOPER)) $criteria->add(afGuardUserProfilePeer::IS_DEVELOPER, $this->is_developer);
		if ($this->isColumnModified(afGuardUserProfilePeer::WIDGET_HELP_IS_ENABLED)) $criteria->add(afGuardUserProfilePeer::WIDGET_HELP_IS_ENABLED, $this->widget_help_is_enabled);
		if ($this->isColumnModified(afGuardUserProfilePeer::CREATED_AT)) $criteria->add(afGuardUserProfilePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(afGuardUserProfilePeer::UPDATED_AT)) $criteria->add(afGuardUserProfilePeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(afGuardUserProfilePeer::DATABASE_NAME);
		$criteria->add(afGuardUserProfilePeer::USER_ID, $this->user_id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getUserId();
	}

	/**
	 * Generic method to set the primary key (user_id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setUserId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getUserId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of afGuardUserProfile (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setUserId($this->user_id);
		$copyObj->setTimezonesId($this->timezones_id);
		$copyObj->setFirstName($this->first_name);
		$copyObj->setLastName($this->last_name);
		$copyObj->setJobTitle($this->job_title);
		$copyObj->setPhoneMobile($this->phone_mobile);
		$copyObj->setPhoneOffice($this->phone_office);
		$copyObj->setPersonalBody($this->personal_body);
		$copyObj->setImage($this->image);
		$copyObj->setIsDeveloper($this->is_developer);
		$copyObj->setWidgetHelpIsEnabled($this->widget_help_is_enabled);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setNew(true);
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
	 * @return     afGuardUserProfile Clone of current object.
	 * @throws     PropelException
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
	 * @return     afGuardUserProfilePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new afGuardUserProfilePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a afGuardUser object.
	 *
	 * @param      afGuardUser $v
	 * @return     afGuardUserProfile The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setafGuardUser(afGuardUser $v = null)
	{
		if ($v === null) {
			$this->setUserId(NULL);
		} else {
			$this->setUserId($v->getId());
		}

		$this->aafGuardUser = $v;

		// Add binding for other direction of this 1:1 relationship.
		if ($v !== null) {
			$v->setafGuardUserProfile($this);
		}

		return $this;
	}


	/**
	 * Get the associated afGuardUser object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     afGuardUser The associated afGuardUser object.
	 * @throws     PropelException
	 */
	public function getafGuardUser(PropelPDO $con = null)
	{
		if ($this->aafGuardUser === null && ($this->user_id !== null)) {
			$this->aafGuardUser = afGuardUserQuery::create()->findPk($this->user_id, $con);
			// Because this foreign key represents a one-to-one relationship, we will create a bi-directional association.
			$this->aafGuardUser->setafGuardUserProfile($this);
		}
		return $this->aafGuardUser;
	}

	/**
	 * Declares an association between this object and a TimeZones object.
	 *
	 * @param      TimeZones $v
	 * @return     afGuardUserProfile The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setTimeZones(TimeZones $v = null)
	{
		if ($v === null) {
			$this->setTimezonesId(NULL);
		} else {
			$this->setTimezonesId($v->getId());
		}

		$this->aTimeZones = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the TimeZones object, it will not be re-added.
		if ($v !== null) {
			$v->addafGuardUserProfile($this);
		}

		return $this;
	}


	/**
	 * Get the associated TimeZones object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     TimeZones The associated TimeZones object.
	 * @throws     PropelException
	 */
	public function getTimeZones(PropelPDO $con = null)
	{
		if ($this->aTimeZones === null && ($this->timezones_id !== null)) {
			$this->aTimeZones = TimeZonesQuery::create()->findPk($this->timezones_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aTimeZones->addafGuardUserProfiles($this);
			 */
		}
		return $this->aTimeZones;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->user_id = null;
		$this->timezones_id = null;
		$this->first_name = null;
		$this->last_name = null;
		$this->job_title = null;
		$this->phone_mobile = null;
		$this->phone_office = null;
		$this->personal_body = null;
		$this->image = null;
		$this->is_developer = null;
		$this->widget_help_is_enabled = null;
		$this->created_at = null;
		$this->updated_at = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

		$this->aafGuardUser = null;
		$this->aTimeZones = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseafGuardUserProfile:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BaseafGuardUserProfile
