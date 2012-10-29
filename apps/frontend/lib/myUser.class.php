<?php
/**
 * Application User functionality
 *
 * @package Studio Playground
 * @author Łukasz Wojciechowski <luwo@appflower.com>
 * @author Sergey Startsev <startsev.sergey@gmail.com>
 */
class myUser extends afGuardSecurityUser implements AppFlowerSecurityUser
{
    /**
     * Init method
     *
     * @param sfEventDispatcher $dispatcher 
     * @param sfStorage $storage 
     * @param array $options 
     * @return void
     */
    public function initialize(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array())
    {
        // set timeout
        $options['timeout'] = 28800;
        parent::initialize($dispatcher, $storage, $options);
    }
    
    /**
     * Getting AppFlower User
     *
     * @return object
     * @author Łukasz Wojciechowski <luwo@appflower.com>
     */
    public function getAppFlowerUser()
    {
        $guardUser = $this->getGuardUser();
        if ($guardUser) {
            return $guardUser;
        } else {
            return new AppFlowerAnonymousUser;
        }
    }
    
}
