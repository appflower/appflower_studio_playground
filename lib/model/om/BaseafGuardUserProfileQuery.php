<?php


/**
 * Base class that represents a query for the 'af_guard_user_profile' table.
 *
 * 
 *
 * @method     afGuardUserProfileQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     afGuardUserProfileQuery orderByTimezonesId($order = Criteria::ASC) Order by the timezones_id column
 * @method     afGuardUserProfileQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     afGuardUserProfileQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     afGuardUserProfileQuery orderByJobTitle($order = Criteria::ASC) Order by the job_title column
 * @method     afGuardUserProfileQuery orderByPhoneMobile($order = Criteria::ASC) Order by the phone_mobile column
 * @method     afGuardUserProfileQuery orderByPhoneOffice($order = Criteria::ASC) Order by the phone_office column
 * @method     afGuardUserProfileQuery orderByPersonalBody($order = Criteria::ASC) Order by the personal_body column
 * @method     afGuardUserProfileQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     afGuardUserProfileQuery orderByIsDeveloper($order = Criteria::ASC) Order by the is_developer column
 * @method     afGuardUserProfileQuery orderByWidgetHelpIsEnabled($order = Criteria::ASC) Order by the widget_help_is_enabled column
 * @method     afGuardUserProfileQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     afGuardUserProfileQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     afGuardUserProfileQuery groupByUserId() Group by the user_id column
 * @method     afGuardUserProfileQuery groupByTimezonesId() Group by the timezones_id column
 * @method     afGuardUserProfileQuery groupByFirstName() Group by the first_name column
 * @method     afGuardUserProfileQuery groupByLastName() Group by the last_name column
 * @method     afGuardUserProfileQuery groupByJobTitle() Group by the job_title column
 * @method     afGuardUserProfileQuery groupByPhoneMobile() Group by the phone_mobile column
 * @method     afGuardUserProfileQuery groupByPhoneOffice() Group by the phone_office column
 * @method     afGuardUserProfileQuery groupByPersonalBody() Group by the personal_body column
 * @method     afGuardUserProfileQuery groupByImage() Group by the image column
 * @method     afGuardUserProfileQuery groupByIsDeveloper() Group by the is_developer column
 * @method     afGuardUserProfileQuery groupByWidgetHelpIsEnabled() Group by the widget_help_is_enabled column
 * @method     afGuardUserProfileQuery groupByCreatedAt() Group by the created_at column
 * @method     afGuardUserProfileQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     afGuardUserProfileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     afGuardUserProfileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     afGuardUserProfileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     afGuardUserProfileQuery leftJoinafGuardUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardUser relation
 * @method     afGuardUserProfileQuery rightJoinafGuardUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardUser relation
 * @method     afGuardUserProfileQuery innerJoinafGuardUser($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardUser relation
 *
 * @method     afGuardUserProfileQuery leftJoinTimeZones($relationAlias = null) Adds a LEFT JOIN clause to the query using the TimeZones relation
 * @method     afGuardUserProfileQuery rightJoinTimeZones($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TimeZones relation
 * @method     afGuardUserProfileQuery innerJoinTimeZones($relationAlias = null) Adds a INNER JOIN clause to the query using the TimeZones relation
 *
 * @method     afGuardUserProfile findOne(PropelPDO $con = null) Return the first afGuardUserProfile matching the query
 * @method     afGuardUserProfile findOneOrCreate(PropelPDO $con = null) Return the first afGuardUserProfile matching the query, or a new afGuardUserProfile object populated from the query conditions when no match is found
 *
 * @method     afGuardUserProfile findOneByUserId(int $user_id) Return the first afGuardUserProfile filtered by the user_id column
 * @method     afGuardUserProfile findOneByTimezonesId(int $timezones_id) Return the first afGuardUserProfile filtered by the timezones_id column
 * @method     afGuardUserProfile findOneByFirstName(string $first_name) Return the first afGuardUserProfile filtered by the first_name column
 * @method     afGuardUserProfile findOneByLastName(string $last_name) Return the first afGuardUserProfile filtered by the last_name column
 * @method     afGuardUserProfile findOneByJobTitle(string $job_title) Return the first afGuardUserProfile filtered by the job_title column
 * @method     afGuardUserProfile findOneByPhoneMobile(string $phone_mobile) Return the first afGuardUserProfile filtered by the phone_mobile column
 * @method     afGuardUserProfile findOneByPhoneOffice(string $phone_office) Return the first afGuardUserProfile filtered by the phone_office column
 * @method     afGuardUserProfile findOneByPersonalBody(string $personal_body) Return the first afGuardUserProfile filtered by the personal_body column
 * @method     afGuardUserProfile findOneByImage(string $image) Return the first afGuardUserProfile filtered by the image column
 * @method     afGuardUserProfile findOneByIsDeveloper(boolean $is_developer) Return the first afGuardUserProfile filtered by the is_developer column
 * @method     afGuardUserProfile findOneByWidgetHelpIsEnabled(boolean $widget_help_is_enabled) Return the first afGuardUserProfile filtered by the widget_help_is_enabled column
 * @method     afGuardUserProfile findOneByCreatedAt(string $created_at) Return the first afGuardUserProfile filtered by the created_at column
 * @method     afGuardUserProfile findOneByUpdatedAt(string $updated_at) Return the first afGuardUserProfile filtered by the updated_at column
 *
 * @method     array findByUserId(int $user_id) Return afGuardUserProfile objects filtered by the user_id column
 * @method     array findByTimezonesId(int $timezones_id) Return afGuardUserProfile objects filtered by the timezones_id column
 * @method     array findByFirstName(string $first_name) Return afGuardUserProfile objects filtered by the first_name column
 * @method     array findByLastName(string $last_name) Return afGuardUserProfile objects filtered by the last_name column
 * @method     array findByJobTitle(string $job_title) Return afGuardUserProfile objects filtered by the job_title column
 * @method     array findByPhoneMobile(string $phone_mobile) Return afGuardUserProfile objects filtered by the phone_mobile column
 * @method     array findByPhoneOffice(string $phone_office) Return afGuardUserProfile objects filtered by the phone_office column
 * @method     array findByPersonalBody(string $personal_body) Return afGuardUserProfile objects filtered by the personal_body column
 * @method     array findByImage(string $image) Return afGuardUserProfile objects filtered by the image column
 * @method     array findByIsDeveloper(boolean $is_developer) Return afGuardUserProfile objects filtered by the is_developer column
 * @method     array findByWidgetHelpIsEnabled(boolean $widget_help_is_enabled) Return afGuardUserProfile objects filtered by the widget_help_is_enabled column
 * @method     array findByCreatedAt(string $created_at) Return afGuardUserProfile objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return afGuardUserProfile objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseafGuardUserProfileQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseafGuardUserProfileQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'afGuardUserProfile', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new afGuardUserProfileQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    afGuardUserProfileQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof afGuardUserProfileQuery) {
			return $criteria;
		}
		$query = new afGuardUserProfileQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    afGuardUserProfile|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = afGuardUserProfilePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(afGuardUserProfilePeer::USER_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(afGuardUserProfilePeer::USER_ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the user_id column
	 * 
	 * @param     int|array $userId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(afGuardUserProfilePeer::USER_ID, $userId, $comparison);
	}

	/**
	 * Filter the query on the timezones_id column
	 * 
	 * @param     int|array $timezonesId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByTimezonesId($timezonesId = null, $comparison = null)
	{
		if (is_array($timezonesId)) {
			$useMinMax = false;
			if (isset($timezonesId['min'])) {
				$this->addUsingAlias(afGuardUserProfilePeer::TIMEZONES_ID, $timezonesId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($timezonesId['max'])) {
				$this->addUsingAlias(afGuardUserProfilePeer::TIMEZONES_ID, $timezonesId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(afGuardUserProfilePeer::TIMEZONES_ID, $timezonesId, $comparison);
	}

	/**
	 * Filter the query on the first_name column
	 * 
	 * @param     string $firstName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByFirstName($firstName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($firstName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $firstName)) {
				$firstName = str_replace('*', '%', $firstName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(afGuardUserProfilePeer::FIRST_NAME, $firstName, $comparison);
	}

	/**
	 * Filter the query on the last_name column
	 * 
	 * @param     string $lastName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByLastName($lastName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($lastName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $lastName)) {
				$lastName = str_replace('*', '%', $lastName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(afGuardUserProfilePeer::LAST_NAME, $lastName, $comparison);
	}

	/**
	 * Filter the query on the job_title column
	 * 
	 * @param     string $jobTitle The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByJobTitle($jobTitle = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($jobTitle)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $jobTitle)) {
				$jobTitle = str_replace('*', '%', $jobTitle);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(afGuardUserProfilePeer::JOB_TITLE, $jobTitle, $comparison);
	}

	/**
	 * Filter the query on the phone_mobile column
	 * 
	 * @param     string $phoneMobile The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByPhoneMobile($phoneMobile = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($phoneMobile)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $phoneMobile)) {
				$phoneMobile = str_replace('*', '%', $phoneMobile);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(afGuardUserProfilePeer::PHONE_MOBILE, $phoneMobile, $comparison);
	}

	/**
	 * Filter the query on the phone_office column
	 * 
	 * @param     string $phoneOffice The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByPhoneOffice($phoneOffice = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($phoneOffice)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $phoneOffice)) {
				$phoneOffice = str_replace('*', '%', $phoneOffice);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(afGuardUserProfilePeer::PHONE_OFFICE, $phoneOffice, $comparison);
	}

	/**
	 * Filter the query on the personal_body column
	 * 
	 * @param     string $personalBody The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByPersonalBody($personalBody = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($personalBody)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $personalBody)) {
				$personalBody = str_replace('*', '%', $personalBody);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(afGuardUserProfilePeer::PERSONAL_BODY, $personalBody, $comparison);
	}

	/**
	 * Filter the query on the image column
	 * 
	 * @param     string $image The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByImage($image = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($image)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $image)) {
				$image = str_replace('*', '%', $image);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(afGuardUserProfilePeer::IMAGE, $image, $comparison);
	}

	/**
	 * Filter the query on the is_developer column
	 * 
	 * @param     boolean|string $isDeveloper The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByIsDeveloper($isDeveloper = null, $comparison = null)
	{
		if (is_string($isDeveloper)) {
			$is_developer = in_array(strtolower($isDeveloper), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(afGuardUserProfilePeer::IS_DEVELOPER, $isDeveloper, $comparison);
	}

	/**
	 * Filter the query on the widget_help_is_enabled column
	 * 
	 * @param     boolean|string $widgetHelpIsEnabled The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByWidgetHelpIsEnabled($widgetHelpIsEnabled = null, $comparison = null)
	{
		if (is_string($widgetHelpIsEnabled)) {
			$widget_help_is_enabled = in_array(strtolower($widgetHelpIsEnabled), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(afGuardUserProfilePeer::WIDGET_HELP_IS_ENABLED, $widgetHelpIsEnabled, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(afGuardUserProfilePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(afGuardUserProfilePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(afGuardUserProfilePeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(afGuardUserProfilePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(afGuardUserProfilePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(afGuardUserProfilePeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related afGuardUser object
	 *
	 * @param     afGuardUser $afGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByafGuardUser($afGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardUserProfilePeer::USER_ID, $afGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the afGuardUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function joinafGuardUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('afGuardUser');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'afGuardUser');
		}
		
		return $this;
	}

	/**
	 * Use the afGuardUser relation afGuardUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function useafGuardUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinafGuardUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'afGuardUser', 'afGuardUserQuery');
	}

	/**
	 * Filter the query by a related TimeZones object
	 *
	 * @param     TimeZones $timeZones  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByTimeZones($timeZones, $comparison = null)
	{
		return $this
			->addUsingAlias(afGuardUserProfilePeer::TIMEZONES_ID, $timeZones->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the TimeZones relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function joinTimeZones($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TimeZones');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'TimeZones');
		}
		
		return $this;
	}

	/**
	 * Use the TimeZones relation TimeZones object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TimeZonesQuery A secondary query class using the current class as primary query
	 */
	public function useTimeZonesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinTimeZones($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TimeZones', 'TimeZonesQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     afGuardUserProfile $afGuardUserProfile Object to remove from the list of results
	 *
	 * @return    afGuardUserProfileQuery The current query, for fluid interface
	 */
	public function prune($afGuardUserProfile = null)
	{
		if ($afGuardUserProfile) {
			$this->addUsingAlias(afGuardUserProfilePeer::USER_ID, $afGuardUserProfile->getUserId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseafGuardUserProfileQuery
