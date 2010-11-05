<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserPeer.php 9999 2008-06-29 21:24:44Z fabien $
 */
class sfGuardUserPeer extends PluginsfGuardUserPeer
{
	public static function getAll()
	{
		$objects=self::doSelect(new Criteria());
		
		if($objects!=null)
		{
			foreach ($objects as $object)
			{
				$array[$object->getId()]=$object->getFirstName().' '.$object->getLastName();
			}			
			
			return $array;
		}
		else return array();		
	}
	
	public static function getAllUsers()
	{
		$c = new Criteria();
		$c->addJoin(self::ID,sfGuardUserProfilePeer::USER_ID);
		return $c;
	}
	
	public static function fetchData() {
		$c = new Criteria();
		$c->addAscendingOrderByColumn(self::ID);
		
		return $c;
	}
    
    public static function fetchByProject($project_id) {
		$c = new Criteria();
        
        $cProjectUsers = new Criteria();
        if ($project_id&&$project_id!='all') {
        	$cProjectUsers->add(ProjectUserPeer::PROJECT_ID, $project_id);
        }
        $projectUsers = ProjectUserPeer::doSelect($cProjectUsers);
        $projectUserIds = array();
        if($projectUsers != null) {
            foreach ($projectUsers as $projectUser) {
                $projectUserIds[] = $projectUser->getUserId();
            }
        }
        $c->addAnd(self::ID, $projectUserIds, Criteria::IN);
		return $c;
	}
	
	public static function isEditable(Array $args) {
		if(sfContext::getInstance()->getUser()->hasCredential('user_list_edit')) {
			return true;
		}else{
			return false;
		}
	}

}
