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
 * @version    SVN: $Id: sfGuardGroupPermissionPeer.php 9999 2008-06-29 21:24:44Z fabien $
 */
class sfGuardGroupPermissionPeer extends PluginsfGuardGroupPermissionPeer
{
	public static function deletePermissionGroups($pid)
	{
		$c = new Criteria();
		$c->add(sfGuardGroupPermissionPeer::GROUP_ID, $pid);
		self::doDelete($c);
	}
	
	
	public static function getGroupPermissions($pid) {
		$c = new Criteria();
		
		$c->add(sfGuardGroupPermissionPeer::GROUP_ID, $pid);
		$res = self::doSelectJoinsfGuardPermission($c);
				
		$selected = $options = array();
		
		foreach($res as $p) {
			$selected[$p->getPermissionId()] = $p->getsfGuardPermission()->getName();
		}
		
		$options = sfGuardPermissionPeer::getAll();
		
		return array($options,$selected);
		
	}
}
