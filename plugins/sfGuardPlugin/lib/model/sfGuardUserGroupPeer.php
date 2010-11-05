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
 * @version    SVN: $Id: sfGuardUserGroupPeer.php 9999 2008-06-29 21:24:44Z fabien $
 */
class sfGuardUserGroupPeer extends PluginsfGuardUserGroupPeer
{
	
	public static function getAll($uid) {
		$c = new Criteria();
		
		$c->add(self::USER_ID, $uid);
		$res = self::doSelectJoinsfGuardGroup($c);
				
		$selected = $options = array();
		
		foreach($res as $p) {
			$selected[$p->getGroupId()] = $p->getsfGuardGroup()->getName();
		}
		
		$options = sfGuardGroupPeer::getAll();
		
		return array($options,$selected);
		
	}
	
	public static function getAdmins() {
		
		$c = new Criteria();
		$c->add(self::GROUP_ID,1);	
		$res = self::doSelectJoinsfGuardUser($c);
		
		$ret = array();
		
		foreach($res as $item) {
			$ret["ids"][] = $item->getUserId();
			$ret["logins"][] = $item->getSfGuardUser()->getUsername();
		}
		
		return $ret;
				
	}
	
	
}
