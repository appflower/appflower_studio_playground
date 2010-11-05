<?php

/**
 * SfGuardPermission actions.
 *
 * @package    manager
 * @subpackage SfGuardPermission
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class SfGuardPermissionActions extends CustomActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeList(sfWebRequest $request)
	{

		$this->list = true;
		 
		return XmlParser::layoutExt($this);
		 
	}

	 
	public function executeEdit()
	{

		$this->id = $this->getRequestParameter("id",0);

		if($this->getRequest()->getMethod() === sfRequest::POST) {
			$this->id = $this->getRequestParameter("edit[0][id]");
				
			$post = true;
				
			if (!$this->id)
			{
				$sf_guard_permission = new sfGuardPermission();
				$is_new=true;
			}
			else
			{
				$sf_guard_permission = sfGuardPermissionPeer::retrieveByPk($this->id);
				$this->forward404Unless($sf_guard_permission);
				$sf_guard_permission->setId($this->id);

				$is_new=false;

			}

			//audit log
			if(!$is_new)
			{
				$sf_guard_permission_old=clone $sf_guard_permission;
			}
				
			$sf_guard_permission->setName($this->getRequestParameter('edit[0][name]'));
			$sf_guard_permission->setDescription($this->getRequestParameter('edit[0][description]'));

			$sf_guard_permission->save();
			
			//audit log
   			if(isset($sf_guard_permission_old))
   			{
        		myLogger::logUpdateObject($sf_guard_permission_old, $sf_guard_permission, '/sfGuardPermission/edit?id='.$sf_guard_permission->getId(), $sf_guard_permission->getName(), $this->getUser()->getGuardUser());
   			}else
   			{
        		myLogger::logNewObject($sf_guard_permission,  '/sfGuardPermission/edit?id='.$sf_guard_permission->getId(), $sf_guard_permission->getName(), $this->getUser()->getGuardUser());
   			}

			$result['message']= 'The permission has been '.(($this->id) ? 'modified' : 'created!');
			$result['success']= true;
			$result = json_encode($result);
				
		} else {
			$post = false;
				
			sfProjectConfiguration::getActive()->loadHelpers("Helper");

			$parser = new XmlParser();

			$this->layout = $parser->getLayout();

			$this->setLayout("layoutExtjs");
			$this->setTemplate("ext");

		}

		return ($post) ? $this->renderText($result) : sfView::SUCCESS;
	}


	public function executeDelete() {

		$sf_guard_permission = sfGuardPermissionPeer::retrieveByPk($this->getRequestParameter('id'));
		$this->forward404Unless($sf_guard_permission);

		$sf_guard_permission->delete();
		
		//audit log
    	myLogger::logDeleteObject($sf_guard_permission, $sf_guard_permission->getName(), $this->getUser()->getGuardUser());

		return $this->redirect('/sfGuardPermission/list');

	}


}
