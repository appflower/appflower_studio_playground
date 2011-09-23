<?php

class myUser extends sfBasicSecurityUser
{
    public function initialize(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array())
    {
        // set timeout
        $options['timeout'] = 28800;
        parent::initialize($dispatcher, $storage, $options);
    }
    
    
    /*
        TODO remove dependency from engine this methods
    */
    public function getAppFlowerUser() { return $this; }
    public function isAnonymous() { return true; }
    public function getId() {}
    
}
