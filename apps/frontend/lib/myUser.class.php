<?php

class myUser extends afGuardSecurityUser implements AppFlowerSecurityUser
{
	public function initialize(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array())
	{
		// set timeout
		$options['timeout'] = 28800;
		parent::initialize($dispatcher, $storage, $options);
	}
	
	function  getAppFlowerUser() {
        return $this->getGuardUser();
    }
}
