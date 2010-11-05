<?php 
/**
 * myLogger writes changelogs using Propel Object Changelog
 * 
 * @author radu
 * @package apps.frontend.lib
 */
class myLogger {
	/**
	 * logs changes between an old Propel object and a new Propel Object
	 * the structure of old and new Propel Objects must be the same
	 *
	 * @param Propel $old_object
	 * @param Propel $new_object
	 * @param string $user_commit_msg
	 * @author radu
	 * @access public
	 */
	public static function logUpdateObject($old_object,$new_object,$url='',$user_commit_msg='',$userObj=false)
	{
		sfLoader::loadHelpers(array('Url'));
		
		$new_object_peer=$new_object->getPeer();
		$new_object_name=get_class($new_object);
		$new_object_fields=$new_object_peer->getFieldNames(BasePeer::TYPE_NUM);
		$new_object_fields_fieldname=$new_object_peer->getFieldNames(BasePeer::TYPE_FIELDNAME);
		
		foreach ($new_object_fields as $k=>$new_object_field)
		{
			if($old_object->getByPosition($new_object_field)!=$new_object->getByPosition($new_object_field))
			{
				$changes['fields']['old'][$new_object_fields_fieldname[$k]]=$old_object->getByPosition($new_object_field);
				$changes['fields']['new'][$new_object_fields_fieldname[$k]]=$new_object->getByPosition($new_object_field);
			}
		}
		
		if(isset($changes)&&count($changes)>0)
		{
		
			$changelog=new Changelog();
			$changelog->setObjectId($new_object->getId());
			$changelog->setObjectName($new_object_name);
			$changelog->setObjectChangeType(0);
			$changelog->setObjectLink(url_for($url,array(),true));
			$changelog->setModuleName(sfContext::getInstance()->getModuleName());
			$changelog->setChanges(serialize($changes));
			$changelog->setUserCommitMsg($user_commit_msg);
			$changelog->setUserId(($userObj?$userObj->getId():sfContext::getInstance()->getUser()->getGuardUser()->getId()));
			$changelog->setUpdatedAt(time());
			$changelog->save();
		
		}
	}
	/**
	 * logs a new Propel Object
	 *
	 * @param Propel $new_object
	 * @param string $user_commit_msg
	 * @author radu
	 * @access public
	 */
	public static function logNewObject($new_object,$url='',$user_commit_msg='',$userObj=false)
	{
		sfLoader::loadHelpers(array('Url'));
		
		$new_object_peer=$new_object->getPeer();
		$new_object_name=get_class($new_object);
		$new_object_fields=$new_object_peer->getFieldNames(BasePeer::TYPE_NUM);
		$new_object_fields_fieldname=$new_object_peer->getFieldNames(BasePeer::TYPE_FIELDNAME);
		
		foreach ($new_object_fields as $k=>$new_object_field)
		{
			$changes['fields'][$new_object_fields_fieldname[$k]]=$new_object->getByPosition($new_object_field);
		}
			
		//use this to find the table name from peer	
		//eval("return (".get_class($new_object_peer)."::TABLE_NAME);")
		
		$changelog=new Changelog();
		$changelog->setObjectId($new_object->getId());
		$changelog->setObjectName($new_object_name);
		$changelog->setObjectChangeType(1);
		$changelog->setObjectLink(url_for($url,array(),true));
		$changelog->setModuleName(sfContext::getInstance()->getModuleName());
		$changelog->setChanges(serialize($changes));
		$changelog->setUserCommitMsg($user_commit_msg);
		$changelog->setUserId(($userObj?$userObj->getId():sfContext::getInstance()->getUser()->getGuardUser()->getId()));
		$changelog->setUpdatedAt(time());
		$changelog->save();
	}
	/**
	 * logs the deletion of a Propel Object
	 *
	 * @param Propel $new_object
	 * @param string $user_commit_msg
	 */
	public static function logDeleteObject($new_object,$user_commit_msg='',$userObj=false)
	{
		$new_object_peer=$new_object->getPeer();
		$new_object_name=get_class($new_object);
		$new_object_fields=$new_object_peer->getFieldNames(BasePeer::TYPE_NUM);
		$new_object_fields_fieldname=$new_object_peer->getFieldNames(BasePeer::TYPE_FIELDNAME);
		
		foreach ($new_object_fields as $k=>$new_object_field)
		{
			$changes['fields'][$new_object_fields_fieldname[$k]]=$new_object->getByPosition($new_object_field);
		}
		
		$changelog=new Changelog();
		$changelog->setObjectId($new_object->getId());
		$changelog->setObjectName($new_object_name);
		$changelog->setObjectChangeType(-1);
		$changelog->setModuleName(sfContext::getInstance()->getModuleName());
		$changelog->setChanges(serialize($changes));
		$changelog->setUserCommitMsg($user_commit_msg);
		$changelog->setUserId(($userObj?$userObj->getId():sfContext::getInstance()->getUser()->getGuardUser()->getId()));
		$changelog->setUpdatedAt(time());
		$changelog->save();
	}
	/**
	 * gets an array from myLoggerObjects.yml
	 *
	 * @return array
	 */
	public static function getMyLoggerObjects()
	{
		$myLoggerObjects_array=sfYaml::load(SF_ROOT_DIR.'/apps/frontend/config/myLoggerObjects.yml');
		
		return $myLoggerObjects_array;
	}
	/**
	 * sets myLoggerObjects.yml by getting information from schema.yml
	 * then myLoggerObjects.yml should be edited manually
	 */
	public static function extractBaseMyLoggerObjects()
	{
		$myLoggerObjects_array=self::getMyLoggerObjects();
		
		$schema_array=sfYaml::load(SF_ROOT_DIR.'/config/schema.yml');
		$base_myLoggerObjects=$myLoggerObjects_array;
		
		foreach ($schema_array['propel'] as $table_name=>$properties)
		{
			if(isset($properties['_attributes']['phpName'])&&!isset($myLoggerObjects_array['objects'][$properties['_attributes']['phpName']]))
			{
				$base_myLoggerObjects['objects'][$properties['_attributes']['phpName']]['name']=$properties['_attributes']['phpName'];
				foreach ($properties as $name=>$infos)
				{
					if($name!='_attributes')
					{
						$base_myLoggerObjects['objects'][$properties['_attributes']['phpName']]['display_fields'][]=$name;
					}
				}
			}
		}
		
		$myLoggerObjects_yml=sfYaml::dump($base_myLoggerObjects);
		
		file_put_contents(SF_ROOT_DIR.'/apps/frontend/config/myLoggerObjects.yml',$myLoggerObjects_yml);
	}
}


?>