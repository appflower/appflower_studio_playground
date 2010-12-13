<?php


/**
 * Base class that represents a query for the 'timezones' table.
 *
 * 
 *
 * @method     TimeZonesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TimeZonesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     TimeZonesQuery orderByOffset($order = Criteria::ASC) Order by the offset column
 * @method     TimeZonesQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     TimeZonesQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     TimeZonesQuery groupById() Group by the id column
 * @method     TimeZonesQuery groupByName() Group by the name column
 * @method     TimeZonesQuery groupByOffset() Group by the offset column
 * @method     TimeZonesQuery groupByCreatedAt() Group by the created_at column
 * @method     TimeZonesQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     TimeZonesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TimeZonesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TimeZonesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TimeZonesQuery leftJoinafGuardUserProfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the afGuardUserProfile relation
 * @method     TimeZonesQuery rightJoinafGuardUserProfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the afGuardUserProfile relation
 * @method     TimeZonesQuery innerJoinafGuardUserProfile($relationAlias = null) Adds a INNER JOIN clause to the query using the afGuardUserProfile relation
 *
 * @method     TimeZones findOne(PropelPDO $con = null) Return the first TimeZones matching the query
 * @method     TimeZones findOneOrCreate(PropelPDO $con = null) Return the first TimeZones matching the query, or a new TimeZones object populated from the query conditions when no match is found
 *
 * @method     TimeZones findOneById(int $id) Return the first TimeZones filtered by the id column
 * @method     TimeZones findOneByName(string $name) Return the first TimeZones filtered by the name column
 * @method     TimeZones findOneByOffset(int $offset) Return the first TimeZones filtered by the offset column
 * @method     TimeZones findOneByCreatedAt(string $created_at) Return the first TimeZones filtered by the created_at column
 * @method     TimeZones findOneByUpdatedAt(string $updated_at) Return the first TimeZones filtered by the updated_at column
 *
 * @method     array findById(int $id) Return TimeZones objects filtered by the id column
 * @method     array findByName(string $name) Return TimeZones objects filtered by the name column
 * @method     array findByOffset(int $offset) Return TimeZones objects filtered by the offset column
 * @method     array findByCreatedAt(string $created_at) Return TimeZones objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return TimeZones objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTimeZonesQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseTimeZonesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'TimeZones', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TimeZonesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TimeZonesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TimeZonesQuery) {
			return $criteria;
		}
		$query = new TimeZonesQuery();
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
	 * @return    TimeZones|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = TimeZonesPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    TimeZonesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TimeZonesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TimeZonesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TimeZonesPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TimeZonesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TimeZonesPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TimeZonesQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TimeZonesPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the offset column
	 * 
	 * @param     int|array $offset The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TimeZonesQuery The current query, for fluid interface
	 */
	public function filterByOffset($offset = null, $comparison = null)
	{
		if (is_array($offset)) {
			$useMinMax = false;
			if (isset($offset['min'])) {
				$this->addUsingAlias(TimeZonesPeer::OFFSET, $offset['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($offset['max'])) {
				$this->addUsingAlias(TimeZonesPeer::OFFSET, $offset['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TimeZonesPeer::OFFSET, $offset, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TimeZonesQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(TimeZonesPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(TimeZonesPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TimeZonesPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TimeZonesQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(TimeZonesPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(TimeZonesPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TimeZonesPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related afGuardUserProfile object
	 *
	 * @param     afGuardUserProfile $afGuardUserProfile  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TimeZonesQuery The current query, for fluid interface
	 */
	public function filterByafGuardUserProfile($afGuardUserProfile, $comparison = null)
	{
		return $this
			->addUsingAlias(TimeZonesPeer::ID, $afGuardUserProfile->getTimezonesId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the afGuardUserProfile relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TimeZonesQuery The current query, for fluid interface
	 */
	public function joinafGuardUserProfile($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('afGuardUserProfile');
		
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
			$this->addJoinObject($join, 'afGuardUserProfile');
		}
		
		return $this;
	}

	/**
	 * Use the afGuardUserProfile relation afGuardUserProfile object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    afGuardUserProfileQuery A secondary query class using the current class as primary query
	 */
	public function useafGuardUserProfileQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinafGuardUserProfile($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'afGuardUserProfile', 'afGuardUserProfileQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     TimeZones $timeZones Object to remove from the list of results
	 *
	 * @return    TimeZonesQuery The current query, for fluid interface
	 */
	public function prune($timeZones = null)
	{
		if ($timeZones) {
			$this->addUsingAlias(TimeZonesPeer::ID, $timeZones->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseTimeZonesQuery
