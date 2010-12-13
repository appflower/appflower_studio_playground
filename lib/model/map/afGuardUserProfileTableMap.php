<?php



/**
 * This class defines the structure of the 'af_guard_user_profile' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class afGuardUserProfileTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.afGuardUserProfileTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('af_guard_user_profile');
		$this->setPhpName('afGuardUserProfile');
		$this->setClassname('afGuardUserProfile');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('USER_ID', 'UserId', 'INTEGER' , 'af_guard_user', 'ID', true, null, null);
		$this->addForeignKey('TIMEZONES_ID', 'TimezonesId', 'INTEGER', 'timezones', 'ID', false, null, null);
		$this->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', false, 20, null);
		$this->addColumn('LAST_NAME', 'LastName', 'VARCHAR', false, 20, null);
		$this->addColumn('JOB_TITLE', 'JobTitle', 'VARCHAR', false, 255, null);
		$this->addColumn('PHONE_MOBILE', 'PhoneMobile', 'VARCHAR', false, 255, null);
		$this->addColumn('PHONE_OFFICE', 'PhoneOffice', 'VARCHAR', false, 255, null);
		$this->addColumn('PERSONAL_BODY', 'PersonalBody', 'LONGVARCHAR', false, null, null);
		$this->addColumn('IMAGE', 'Image', 'VARCHAR', false, 255, null);
		$this->addColumn('IS_DEVELOPER', 'IsDeveloper', 'BOOLEAN', false, null, null);
		$this->addColumn('WIDGET_HELP_IS_ENABLED', 'WidgetHelpIsEnabled', 'BOOLEAN', false, null, true);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('afGuardUser', 'afGuardUser', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('TimeZones', 'TimeZones', RelationMap::MANY_TO_ONE, array('timezones_id' => 'id', ), 'CASCADE', null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // afGuardUserProfileTableMap
