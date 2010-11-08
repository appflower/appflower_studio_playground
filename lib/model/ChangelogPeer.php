<?php

/**
 * Subclass for performing query and update operations on the 'changelog' table.
 *
 * 
 * @author radu
 * @package lib.model
 */ 
class ChangelogPeer extends BaseChangelogPeer
{
	/**
	 * getting unique users from timeline as objects, for select
	 *
	 * @return objects
	 * @author radu
	 */
	public static function getUniqueUsers()
	{
		$c=new Criteria();
		$c->addJoin(self::USER_ID,sfGuardUserPeer::ID);
		$c->setDistinct();
		$uniqueUsersObjs=sfGuardUserPeer::doSelect($c);
		
		return $uniqueUsersObjs;
	}
	
	/**
	 * getting unique users from timeline as array
	 *
	 * @return objects
	 * @author radu
	 */
	public static function getUniqueUsersArray()
	{
		$c=new Criteria();
		$c->addJoin(self::USER_ID,sfGuardUserPeer::ID);
		$c->setDistinct();
		$uniqueUsersObjs=sfGuardUserPeer::doSelect($c);
		
		foreach ($uniqueUsersObjs as $uniqueUsersObj)
		{
			$uniqueUsersArray['name'][$uniqueUsersObj->getId()]=$uniqueUsersObj->getFullName();
			$uniqueUsersArray['color'][$uniqueUsersObj->getId()]=myToolkit::generateRandomColor();
		}
			
		return $uniqueUsersArray;
	}
	
	/**
	 * getting unique module names from timeline, for select
	 *
	 * @return assoc array
	 * @author radu
	 */
	public static function getUniqueModuleNames() 
	{
		$uniqueModuleNames=array();
		
		$c=new Criteria();
	    $c->clearSelectColumns()->addSelectColumn(self::MODULE_NAME);
	    $rs = self::doSelectRS($c);
	    $uniqueModuleNames = array();
	    while($rs->next()) {
	      $uniqueModuleNames[$rs->get(1)] = ucfirst($rs->get(1));
	    }
	    return $uniqueModuleNames;
	}
	
	/**
	 * getting unique module names from timeline as array
	 *
	 * @return unknown
	 */
	public static function getUniqueModuleNamesArray() 
	{
		$uniqueModuleNames=array();
		
		$c=new Criteria();
	    $c->clearSelectColumns()->addSelectColumn(self::MODULE_NAME);
	    $rs = self::doSelectRS($c);
	    $uniqueModuleNames = array();
	    while($rs->next()) {
	      $uniqueModuleNames['name'][$rs->get(1)] = ucfirst($rs->get(1));
	      $uniqueModuleNames['color'][$rs->get(1)] = myToolkit::generateRandomColor();
	    }
	    return $uniqueModuleNames;
	}
	
	public static function fetchData() 
	{
		$c = new Criteria();
		$c->addDescendingOrderByColumn(self::UPDATED_AT);
		
		return $c;
	}
	
	public static function showChanges($id) 
	{
		sfProjectConfiguration::getActive()->loadHelpers('Partial');
		$changeLog = ChangelogPeer::retrieveByPk($id);
		$changes = unserialize( $changeLog->getChanges() );
		$body=get_partial('auditLog/viewChanges',array('changeLog'=>$changeLog, 'changes'=>$changes));
		$body = str_replace("\n", "", $body);
		return $body;
	}

}
