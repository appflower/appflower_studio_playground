<?php

class myUser extends sfBasicSecurityUser
{
    public function initialize(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array())
    {
        // set timeout
        $options['timeout'] = 28800;
        parent::initialize($dispatcher, $storage, $options);
    }
    
    
    public function getAppFlowerUser()
    {
        return new AppFlowerAnonymousUser();
    }
}
