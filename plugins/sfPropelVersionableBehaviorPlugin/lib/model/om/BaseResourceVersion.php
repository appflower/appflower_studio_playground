<?php


/**
 * Base class that represents a row from the 'resource_version' table.
 *
 * 
 *
 * @package    propel.generator.plugins.sfPropelVersionableBehaviorPlugin.lib.model.om
 */
abstract class BaseResourceVersion extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ResourceVersionPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ResourceVersionPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the resource_id field.
	 * @var        int
	 */
	protected $resource_id;

	/**
	 * The value for the resource_name field.
	 * @var        string
	 */
	protected $resource_name;

	/**
	 * The value for the number field.
	 * @var        int
	 */
	protected $number;

	/**
	 * The value for the title field.
	 * @var        string
	 */
	protected $title;

	/**
	 * The value for the comment field.
	 * @var        string
	 */
	protected $comment;

	/**
	 * The value for the created_by field.
	 * @var        string
	 */
	protected $created_by;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * The value for the resource_version_id field.
	 * @var        int
	 */
	protected $resource_version_id;

	/**
	 * @var        ResourceVersion
	 */
	protected $aResourceVersionRelatedByResourceVersionId;

	/**
	 * @var        array ResourceVersion[] Collection to store aggregation of ResourceVersion objects.
	 */
	protected $collResourceVersionsRelatedById;

	/**
	 * @var        array ResourceAttributeVersionHash[] Collection to store aggregation of ResourceAttributeVersionHash objects.
	 */
	protected $collResourceAttributeVersionHashs;

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
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [resource_id] column value.
	 * 
	 * @return     int
	 */
	public function getResourceId()
	{
		return $this->resource_id;
	}

	/**
	 * Get the [resource_name] column value.
	 * 
	 * @return     string
	 */
	public function getResourceName()
	{
		return $this->resource_name;
	}

	/**
	 * Get the [number] column value.
	 * 
	 * @return     int
	 */
	public function getNumber()
	{
		return $this->number;
	}

	/**
	 * Get the [title] column value.
	 * 
	 * @return     string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Get the [comment] column value.
	 * 
	 * @return     string
	 */
	public function getComment()
	{
		return $this->comment;
	}

	/**
	 * Get the [created_by] column value.
	 * 
	 * @return     string
	 */
	public function getCreatedBy()
	{
		return $this->created_by;
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
	 * Get the [resource_version_id] column value.
	 * 
	 * @return     int
	 */
	public function getResourceVersionId()
	{
		return $this->resource_version_id;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     ResourceVersion The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ResourceVersionPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [resource_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ResourceVersion The current object (for fluent API support)
	 */
	public function setResourceId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->resource_id !== $v) {
			$this->resource_id = $v;
			$this->modifiedColumns[] = ResourceVersionPeer::RESOURCE_ID;
		}

		return $this;
	} // setResourceId()

	/**
	 * Set the value of [resource_name] column.
	 * 
	 * @param      string $v new value
	 * @return     ResourceVersion The current object (for fluent API support)
	 */
	public function setResourceName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->resource_name !== $v) {
			$this->resource_name = $v;
			$this->modifiedColumns[] = ResourceVersionPeer::RESOURCE_NAME;
		}

		return $this;
	} // setResourceName()

	/**
	 * Set the value of [number] column.
	 * 
	 * @param      int $v new value
	 * @return     ResourceVersion The current object (for fluent API support)
	 */
	public function setNumber($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->number !== $v) {
			$this->number = $v;
			$this->modifiedColumns[] = ResourceVersionPeer::NUMBER;
		}

		return $this;
	} // setNumber()

	/**
	 * Set the value of [title] column.
	 * 
	 * @param      string $v new value
	 * @return     ResourceVersion The current object (for fluent API support)
	 */
	public function setTitle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = ResourceVersionPeer::TITLE;
		}

		return $this;
	} // setTitle()

	/**
	 * Set the value of [comment] column.
	 * 
	 * @param      string $v new value
	 * @return     ResourceVersion The current object (for fluent API support)
	 */
	public function setComment($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = ResourceVersionPeer::COMMENT;
		}

		return $this;
	} // setComment()

	/**
	 * Set the value of [created_by] column.
	 * 
	 * @param      string $v new value
	 * @return     ResourceVersion The current object (for fluent API support)
	 */
	public function setCreatedBy($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ResourceVersionPeer::CREATED_BY;
		}

		return $this;
	} // setCreatedBy()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ResourceVersion The current object (for fluent API support)
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
				$this->modifiedColumns[] = ResourceVersionPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Set the value of [resource_version_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ResourceVersion The current object (for fluent API support)
	 */
	public function setResourceVersionId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->resource_version_id !== $v) {
			$this->resource_version_id = $v;
			$this->modifiedColumns[] = ResourceVersionPeer::RESOURCE_VERSION_ID;
		}

		if ($this->aResourceVersionRelatedByResourceVersionId !== null && $this->aResourceVersionRelatedByResourceVersionId->getId() !== $v) {
			$this->aResourceVersionRelatedByResourceVersionId = null;
		}

		return $this;
	} // setResourceVersionId()

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

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->resource_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->resource_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->number = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->title = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->comment = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->created_by = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->created_at = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->resource_version_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 9; // 9 = ResourceVersionPeer::NUM_COLUMNS - ResourceVersionPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ResourceVersion object", $e);
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

		if ($this->aResourceVersionRelatedByResourceVersionId !== null && $this->resource_version_id !== $this->aResourceVersionRelatedByResourceVersionId->getId()) {
			$this->aResourceVersionRelatedByResourceVersionId = null;
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
			$con = Propel::getConnection(ResourceVersionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ResourceVersionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aResourceVersionRelatedByResourceVersionId = null;
			$this->collResourceVersionsRelatedById = null;

			$this->collResourceAttributeVersionHashs = null;

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
			$con = Propel::getConnection(ResourceVersionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseResourceVersion:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				ResourceVersionQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseResourceVersion:delete:post') as $callable)
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
			$con = Propel::getConnection(ResourceVersionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseResourceVersion:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			// symfony_timestampable behavior
			
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// symfony_timestampable behavior
				if (!$this->isColumnModified(ResourceVersionPeer::CREATED_AT))
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
				foreach (sfMixer::getCallables('BaseResourceVersion:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				ResourceVersionPeer::addInstanceToPool($this);
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

			if ($this->aResourceVersionRelatedByResourceVersionId !== null) {
				if ($this->aResourceVersionRelatedByResourceVersionId->isModified() || $this->aResourceVersionRelatedByResourceVersionId->isNew()) {
					$affectedRows += $this->aResourceVersionRelatedByResourceVersionId->save($con);
				}
				$this->setResourceVersionRelatedByResourceVersionId($this->aResourceVersionRelatedByResourceVersionId);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ResourceVersionPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(ResourceVersionPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.ResourceVersionPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += ResourceVersionPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collResourceVersionsRelatedById !== null) {
				foreach ($this->collResourceVersionsRelatedById as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collResourceAttributeVersionHashs !== null) {
				foreach ($this->collResourceAttributeVersionHashs as $referrerFK) {
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

			if ($this->aResourceVersionRelatedByResourceVersionId !== null) {
				if (!$this->aResourceVersionRelatedByResourceVersionId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aResourceVersionRelatedByResourceVersionId->getValidationFailures());
				}
			}


			if (($retval = ResourceVersionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collResourceVersionsRelatedById !== null) {
					foreach ($this->collResourceVersionsRelatedById as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collResourceAttributeVersionHashs !== null) {
					foreach ($this->collResourceAttributeVersionHashs as $referrerFK) {
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
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ResourceVersionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getId();
				break;
			case 1:
				return $this->getResourceId();
				break;
			case 2:
				return $this->getResourceName();
				break;
			case 3:
				return $this->getNumber();
				break;
			case 4:
				return $this->getTitle();
				break;
			case 5:
				return $this->getComment();
				break;
			case 6:
				return $this->getCreatedBy();
				break;
			case 7:
				return $this->getCreatedAt();
				break;
			case 8:
				return $this->getResourceVersionId();
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
		$keys = ResourceVersionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getResourceId(),
			$keys[2] => $this->getResourceName(),
			$keys[3] => $this->getNumber(),
			$keys[4] => $this->getTitle(),
			$keys[5] => $this->getComment(),
			$keys[6] => $this->getCreatedBy(),
			$keys[7] => $this->getCreatedAt(),
			$keys[8] => $this->getResourceVersionId(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aResourceVersionRelatedByResourceVersionId) {
				$result['ResourceVersionRelatedByResourceVersionId'] = $this->aResourceVersionRelatedByResourceVersionId->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = ResourceVersionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setId($value);
				break;
			case 1:
				$this->setResourceId($value);
				break;
			case 2:
				$this->setResourceName($value);
				break;
			case 3:
				$this->setNumber($value);
				break;
			case 4:
				$this->setTitle($value);
				break;
			case 5:
				$this->setComment($value);
				break;
			case 6:
				$this->setCreatedBy($value);
				break;
			case 7:
				$this->setCreatedAt($value);
				break;
			case 8:
				$this->setResourceVersionId($value);
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
		$keys = ResourceVersionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setResourceId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setResourceName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumber($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTitle($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setComment($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedAt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setResourceVersionId($arr[$keys[8]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ResourceVersionPeer::DATABASE_NAME);

		if ($this->isColumnModified(ResourceVersionPeer::ID)) $criteria->add(ResourceVersionPeer::ID, $this->id);
		if ($this->isColumnModified(ResourceVersionPeer::RESOURCE_ID)) $criteria->add(ResourceVersionPeer::RESOURCE_ID, $this->resource_id);
		if ($this->isColumnModified(ResourceVersionPeer::RESOURCE_NAME)) $criteria->add(ResourceVersionPeer::RESOURCE_NAME, $this->resource_name);
		if ($this->isColumnModified(ResourceVersionPeer::NUMBER)) $criteria->add(ResourceVersionPeer::NUMBER, $this->number);
		if ($this->isColumnModified(ResourceVersionPeer::TITLE)) $criteria->add(ResourceVersionPeer::TITLE, $this->title);
		if ($this->isColumnModified(ResourceVersionPeer::COMMENT)) $criteria->add(ResourceVersionPeer::COMMENT, $this->comment);
		if ($this->isColumnModified(ResourceVersionPeer::CREATED_BY)) $criteria->add(ResourceVersionPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ResourceVersionPeer::CREATED_AT)) $criteria->add(ResourceVersionPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ResourceVersionPeer::RESOURCE_VERSION_ID)) $criteria->add(ResourceVersionPeer::RESOURCE_VERSION_ID, $this->resource_version_id);

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
		$criteria = new Criteria(ResourceVersionPeer::DATABASE_NAME);
		$criteria->add(ResourceVersionPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
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
	 * @param      object $copyObj An object of ResourceVersion (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setResourceId($this->resource_id);
		$copyObj->setResourceName($this->resource_name);
		$copyObj->setNumber($this->number);
		$copyObj->setTitle($this->title);
		$copyObj->setComment($this->comment);
		$copyObj->setCreatedBy($this->created_by);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setResourceVersionId($this->resource_version_id);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getResourceVersionsRelatedById() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addResourceVersionRelatedById($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getResourceAttributeVersionHashs() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addResourceAttributeVersionHash($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     ResourceVersion Clone of current object.
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
	 * @return     ResourceVersionPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ResourceVersionPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a ResourceVersion object.
	 *
	 * @param      ResourceVersion $v
	 * @return     ResourceVersion The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setResourceVersionRelatedByResourceVersionId(ResourceVersion $v = null)
	{
		if ($v === null) {
			$this->setResourceVersionId(NULL);
		} else {
			$this->setResourceVersionId($v->getId());
		}

		$this->aResourceVersionRelatedByResourceVersionId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ResourceVersion object, it will not be re-added.
		if ($v !== null) {
			$v->addResourceVersionRelatedById($this);
		}

		return $this;
	}


	/**
	 * Get the associated ResourceVersion object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ResourceVersion The associated ResourceVersion object.
	 * @throws     PropelException
	 */
	public function getResourceVersionRelatedByResourceVersionId(PropelPDO $con = null)
	{
		if ($this->aResourceVersionRelatedByResourceVersionId === null && ($this->resource_version_id !== null)) {
			$this->aResourceVersionRelatedByResourceVersionId = ResourceVersionQuery::create()->findPk($this->resource_version_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aResourceVersionRelatedByResourceVersionId->addResourceVersionsRelatedById($this);
			 */
		}
		return $this->aResourceVersionRelatedByResourceVersionId;
	}

	/**
	 * Clears out the collResourceVersionsRelatedById collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addResourceVersionsRelatedById()
	 */
	public function clearResourceVersionsRelatedById()
	{
		$this->collResourceVersionsRelatedById = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collResourceVersionsRelatedById collection.
	 *
	 * By default this just sets the collResourceVersionsRelatedById collection to an empty array (like clearcollResourceVersionsRelatedById());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initResourceVersionsRelatedById()
	{
		$this->collResourceVersionsRelatedById = new PropelObjectCollection();
		$this->collResourceVersionsRelatedById->setModel('ResourceVersion');
	}

	/**
	 * Gets an array of ResourceVersion objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this ResourceVersion is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ResourceVersion[] List of ResourceVersion objects
	 * @throws     PropelException
	 */
	public function getResourceVersionsRelatedById($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collResourceVersionsRelatedById || null !== $criteria) {
			if ($this->isNew() && null === $this->collResourceVersionsRelatedById) {
				// return empty collection
				$this->initResourceVersionsRelatedById();
			} else {
				$collResourceVersionsRelatedById = ResourceVersionQuery::create(null, $criteria)
					->filterByResourceVersionRelatedByResourceVersionId($this)
					->find($con);
				if (null !== $criteria) {
					return $collResourceVersionsRelatedById;
				}
				$this->collResourceVersionsRelatedById = $collResourceVersionsRelatedById;
			}
		}
		return $this->collResourceVersionsRelatedById;
	}

	/**
	 * Returns the number of related ResourceVersion objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ResourceVersion objects.
	 * @throws     PropelException
	 */
	public function countResourceVersionsRelatedById(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collResourceVersionsRelatedById || null !== $criteria) {
			if ($this->isNew() && null === $this->collResourceVersionsRelatedById) {
				return 0;
			} else {
				$query = ResourceVersionQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByResourceVersionRelatedByResourceVersionId($this)
					->count($con);
			}
		} else {
			return count($this->collResourceVersionsRelatedById);
		}
	}

	/**
	 * Method called to associate a ResourceVersion object to this object
	 * through the ResourceVersion foreign key attribute.
	 *
	 * @param      ResourceVersion $l ResourceVersion
	 * @return     void
	 * @throws     PropelException
	 */
	public function addResourceVersionRelatedById(ResourceVersion $l)
	{
		if ($this->collResourceVersionsRelatedById === null) {
			$this->initResourceVersionsRelatedById();
		}
		if (!$this->collResourceVersionsRelatedById->contains($l)) { // only add it if the **same** object is not already associated
			$this->collResourceVersionsRelatedById[]= $l;
			$l->setResourceVersionRelatedByResourceVersionId($this);
		}
	}

	/**
	 * Clears out the collResourceAttributeVersionHashs collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addResourceAttributeVersionHashs()
	 */
	public function clearResourceAttributeVersionHashs()
	{
		$this->collResourceAttributeVersionHashs = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collResourceAttributeVersionHashs collection.
	 *
	 * By default this just sets the collResourceAttributeVersionHashs collection to an empty array (like clearcollResourceAttributeVersionHashs());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initResourceAttributeVersionHashs()
	{
		$this->collResourceAttributeVersionHashs = new PropelObjectCollection();
		$this->collResourceAttributeVersionHashs->setModel('ResourceAttributeVersionHash');
	}

	/**
	 * Gets an array of ResourceAttributeVersionHash objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this ResourceVersion is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ResourceAttributeVersionHash[] List of ResourceAttributeVersionHash objects
	 * @throws     PropelException
	 */
	public function getResourceAttributeVersionHashs($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collResourceAttributeVersionHashs || null !== $criteria) {
			if ($this->isNew() && null === $this->collResourceAttributeVersionHashs) {
				// return empty collection
				$this->initResourceAttributeVersionHashs();
			} else {
				$collResourceAttributeVersionHashs = ResourceAttributeVersionHashQuery::create(null, $criteria)
					->filterByResourceVersion($this)
					->find($con);
				if (null !== $criteria) {
					return $collResourceAttributeVersionHashs;
				}
				$this->collResourceAttributeVersionHashs = $collResourceAttributeVersionHashs;
			}
		}
		return $this->collResourceAttributeVersionHashs;
	}

	/**
	 * Returns the number of related ResourceAttributeVersionHash objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ResourceAttributeVersionHash objects.
	 * @throws     PropelException
	 */
	public function countResourceAttributeVersionHashs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collResourceAttributeVersionHashs || null !== $criteria) {
			if ($this->isNew() && null === $this->collResourceAttributeVersionHashs) {
				return 0;
			} else {
				$query = ResourceAttributeVersionHashQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByResourceVersion($this)
					->count($con);
			}
		} else {
			return count($this->collResourceAttributeVersionHashs);
		}
	}

	/**
	 * Method called to associate a ResourceAttributeVersionHash object to this object
	 * through the ResourceAttributeVersionHash foreign key attribute.
	 *
	 * @param      ResourceAttributeVersionHash $l ResourceAttributeVersionHash
	 * @return     void
	 * @throws     PropelException
	 */
	public function addResourceAttributeVersionHash(ResourceAttributeVersionHash $l)
	{
		if ($this->collResourceAttributeVersionHashs === null) {
			$this->initResourceAttributeVersionHashs();
		}
		if (!$this->collResourceAttributeVersionHashs->contains($l)) { // only add it if the **same** object is not already associated
			$this->collResourceAttributeVersionHashs[]= $l;
			$l->setResourceVersion($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ResourceVersion is new, it will return
	 * an empty collection; or if this ResourceVersion has previously
	 * been saved, it will retrieve related ResourceAttributeVersionHashs from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ResourceVersion.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ResourceAttributeVersionHash[] List of ResourceAttributeVersionHash objects
	 */
	public function getResourceAttributeVersionHashsJoinResourceAttributeVersion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ResourceAttributeVersionHashQuery::create(null, $criteria);
		$query->joinWith('ResourceAttributeVersion', $join_behavior);

		return $this->getResourceAttributeVersionHashs($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->resource_id = null;
		$this->resource_name = null;
		$this->number = null;
		$this->title = null;
		$this->comment = null;
		$this->created_by = null;
		$this->created_at = null;
		$this->resource_version_id = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
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
			if ($this->collResourceVersionsRelatedById) {
				foreach ((array) $this->collResourceVersionsRelatedById as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collResourceAttributeVersionHashs) {
				foreach ((array) $this->collResourceAttributeVersionHashs as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collResourceVersionsRelatedById = null;
		$this->collResourceAttributeVersionHashs = null;
		$this->aResourceVersionRelatedByResourceVersionId = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseResourceVersion:' . $name))
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

} // BaseResourceVersion
