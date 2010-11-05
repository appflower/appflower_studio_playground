<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if(!class_exists("BaseSfGuardUserGeneratorConfiguration")) {
	require_once(sfConfig::get('sf_root_dir').'/lib/guard/autoSfGuardUser/lib/BaseSfGuardUserGeneratorConfiguration.class.php');
}

if(!class_exists("BaseSfGuardUserGeneratorHelper")) {
	require_once(sfConfig::get('sf_root_dir').'/lib/guard/autoSfGuardUser/lib/BaseSfGuardUserGeneratorHelper.class.php');
}

if(!class_exists("autoSfGuardUserActions")) {
	require_once(sfConfig::get('sf_root_dir').'/lib/guard/autoSfGuardUser/actions/actions.class.php');
}

require_once(sfConfig::get('sf_root_dir').'/plugins/sfGuardPlugin/modules/sfGuardUser/lib/BasesfGuardUserActions.class.php');

/**
 * User management.
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 3422 2007-02-07 11:57:05Z fabien $
 */
class sfGuardUserActions extends BasesfGuardUserActions
{


	public function executeRegenerate() {

		return sfView::NONE;

	}

	public function executeStatus()
	{
		$c = new Criteria();
		$c->addJoin(sfGuardUserPeer::ID, sfGuardUserProfilePeer::USER_ID);
		$c->add(sfGuardUserProfilePeer::HASH, $this->getRequestParameter('hash'));
		$sf_guard_user = sfGuardUserPeer::doSelectOne($c);

		$this->forward404Unless($sf_guard_user);

		if($sf_guard_user->getIsActive())
		{
			$sf_guard_user->setIsActive(0);
		}
		else {
			$sf_guard_user->setIsActive(1);
		}

		$sf_guard_user->save();

		return $this->redirect('sfGuardUser/listUser');
	}


	public function executeListUser($request)
	{
		return XmlParser::layoutExt($this);
	}


	public function executeEditUser(sfWebRequest $request)
	{
		if($this->getRequestParameter("id")) {
			$tmp = sfGuardUserPeer::retrieveByPK($this->getRequestParameter("id"));
			if($tmp) {

				if($tmp->getProfile()->getTimeZones()) {
					$this->zone = $tmp->getProfile()->getTimeZones()->getId();
				} else {
					$this->zone = "";
				}
				$this->checked = $tmp->getIsActive();
			}
		} else {
			$this->zone = "";
			$this->checked = true;
		}

		if($this->getRequest()->getMethod() === sfRequest::POST)
		{
			$new_user = false;
				
			if (!$this->getRequestParameter('edit[0][id]'))
			{
				$sf_guard_user = new sfGuardUser();
				$new_user = true;
			}
			else
			{
				$sf_guard_user = sfGuardUserPeer::retrieveByPK($this->getRequestParameter('edit[0][id]'));
				$this->forward404Unless($sf_guard_user);
			}

			//audit log
			if(!$new_user)
			{
				$sf_guard_user_old = clone $sf_guard_user;
			}

			$sf_guard_user->setUsername($this->getRequestParameter('edit[0][username]'));

			// Change the password, if something is entered in the form.
			if( strlen($this->getRequestParameter('edit[0][guard_password]')) > 0)
			{
				$sf_guard_user->setPassword($this->getRequestParameter('edit[0][guard_password]'));
			}

			$sf_guard_user->setIsActive($this->getRequest()->hasParameter('edit[0][is_active]') ? 1 : 0);
			$sf_guard_user->save();
			
			//audit log
   			if(isset($sf_guard_user_old))
   			{
        		myLogger::logUpdateObject($sf_guard_user_old, $sf_guard_user, '/sfGuardUser/editUser?id='.$sf_guard_user->getId(), $sf_guard_user->getUsername(), $this->getUser()->getGuardUser());
   			}else
   			{
        		myLogger::logNewObject($sf_guard_user,  '/sfGuardUser/editUser?id='.$sf_guard_user->getId(), $sf_guard_user->getUsername(), $this->getUser()->getGuardUser());
   			}

			// Validate the user_profile account for existens
			$sf_guard_user_profile = sfGuardUserProfilePeer::retrieveByPk($sf_guard_user->getId());
			if (!$sf_guard_user_profile)
			{
				$sf_guard_user_profile = new sfGuardUserProfile();
				$new_profile = true;
			}
			else
			{
				$this->forward404Unless($sf_guard_user_profile);
				$new_profile = false;
			}

			//audit log
			if(!$new_profile)
			{
				$sf_guard_user_profile_old = clone $sf_guard_user_profile;
			}
			
			// clear group data to save it again
			$c = new Criteria();
			$c->add(sfGuardUserGroupPeer::USER_ID, $sf_guard_user->getId());
			sfGuardUserGroupPeer::doDelete($c);
				
			// save groups
			$groups = explode(",",$this->getRequestParameter('edit[0][associated_sf_guard_group]'));

			if ($groups)
			{
				foreach ($groups as $id)
				{
					if($id) {
						$group = new sfGuardUserGroup();
						$group->setGroupId($id);
						$group->setUserId($sf_guard_user->getId());
						$group->save();
					}

				}
			}

			//audit log
			$sf_guard_user_profile_old = clone $sf_guard_user_profile;

			// Store the info about the user profile.
			$sf_guard_user_profile->setUserId($sf_guard_user->getId());
			$sf_guard_user_profile->setFirstName($this->getRequestParameter('edit[0][first_name]'));
			$sf_guard_user_profile->setLastName($this->getRequestParameter('edit[0][last_name]'));

			$gmt = TimeZonesPeer::getGMT();

			try
			{
				if(!is_object($gmt))
				{
					throw new Exception("Was unable to select GMT record from timezones!");
				}
			}
			catch(Exception $e)
			{
				throw $e;
			}

			// Setting the time zone, defaults to GMT.
			if(!$this->getRequestParameter('edit[0][timezone_id_value]'))
			{
				$sf_guard_user_profile->setTimeZonesId($gmt->getId());
			}
			else
			{
				$sf_guard_user_profile->setTimeZonesId($this->getRequestParameter('edit[0][timezone_id_value]'));
			}

			$sf_guard_user_profile->save();

			$result = array('success' => true, 'message' => 'Successfully saved your information! ');
			$result = json_encode($result);
			return $this->renderText($result);
		}


		$this->id = $this->getRequestParameter('id','');
		return XmlParser::layoutExt($this);
	}

	public function executeListActionsRemoveUser(){
		//If no additional operations is to be performed use this block #################
		/*if($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$post = $this->getRequest()->getParameterHolder()->getAll();
			return $this->renderText(Util::listActionsRemove("NetRoutePeer",$post,"/appliance_system/listNetworkStaticRoute"));
		}*/
		// ##############################################################################
		if($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$post = $this->getRequest()->getParameterHolder()->getAll();
			if(isset($post['all'])){
				//Additional action to perfom: delete runtime route...............................
				$c = new Criteria();				
				$c->addJoin(sfGuardUserPeer::ID, sfGuardUserProfilePeer::USER_ID);
		
				$sf_guard_users = sfGuardUserPeer::doSelect($c);
				foreach($sf_guard_users as $sf_guard_user){
					if($sf_guard_user->getUsername() != "admin"){
						// Delete the user from db.
						$sf_guard_user->delete();
					}
				}		
				
				$msg = "All data removed successfully";
			}else{							
				$items = json_decode($post["selections"],true);
				if(!count($items)){
					$result = array('success' => false,'message'=>'No items selected..');
					$result = json_encode($result);
					return $this->renderText($result);
				}
				foreach ($items as $item){
					// Delete individual 
					preg_match("/id=([0-9]+)/",$item['action1'],$matches);
					$id = preg_replace("/id=([0-9]+)/","$1",$matches[0]);					
					$c = new Criteria();
					$c->add(sfGuardUserPeer::ID,$id);
					$c->addJoin(sfGuardUserPeer::ID, sfGuardUserProfilePeer::USER_ID);
			
					$sf_guard_user = sfGuardUserPeer::doSelectOne($c);
			
					$this->forward404Unless($sf_guard_user);
													
					// Delete the user from db.
					$sf_guard_user->delete();				
				}
				$msg = "Selected data removed successfully";
			}

			$result = array('success' => true, 'message' => $msg, 'redirect' => "/sfGuardUser/listUser");
			$result = json_encode($result);
			return $this->renderText($result);
				
		}
	}
	public function executeListActionsUserStatus(){
		if($this->getRequest()->getMethod() == sfRequest::POST)
		{			
			$post = $this->getRequest()->getParameterHolder()->getAll();
			$items = json_decode($post["selections"],true);
			if(!count($items)){
				$result = array('success' => true,'message'=>'No items selected..');
				$result = json_encode($result);
				return $this->renderText($result);	
			}		
			foreach ($items as $item){
				preg_match("/id=([0-9]+)/",$item['action1'],$matches);
				$id = preg_replace("/id=([0-9]+)/","$1",$matches[0]);
				$c = new Criteria();
				$c->add(sfGuardUserPeer::ID,$id);
				$user = sfGuardUserPeer::doSelectOne($c);
				if(isset($post['activate'])){
					$what = "activated";								
					$user->setIsActive(true);
				}
				if(isset($post['deactivate'])){
					$what = "deactivated";
					$user->setIsActive(false);
				}								
				
				$user->save();
				$users[] = $user->getUsername();				
			}			
			myAuditLogger::logMessage("$what users ".implode(",",$users));
			$result = array('success' => true, 'message' => 'The selected users(s) are '.$what.' successfully.', 'redirect' => "/sfGuardUser/listUser");
			$result = json_encode($result);
			return $this->renderText($result);
			
		}
	}
	public function executeDeleteUser(sfWebRequest $request)
	{
		$c = new Criteria();
		$c->add(sfGuardUserPeer::ID,$this->getRequestParameter('id'));
		$c->addJoin(sfGuardUserPeer::ID, sfGuardUserProfilePeer::USER_ID);

		$sf_guard_user = sfGuardUserPeer::doSelectOne($c);

		$this->forward404Unless($sf_guard_user);

		// Delete the user from db.
		$sf_guard_user->delete();
		
		//audit log
    	myLogger::logDeleteObject($sf_guard_user, $sf_guard_user->getUsername(), $this->getUser()->getGuardUser());

		return $this->redirect('/sfGuardUser/listUser');
	}


}
