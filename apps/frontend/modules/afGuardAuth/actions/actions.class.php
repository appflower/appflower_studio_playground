<?php
require_once(dirname(__FILE__).'/../../../../../plugins/afGuardPlugin/modules/afGuardAuth/lib/BaseafGuardAuthActions.class.php');
class afGuardAuthActions extends BaseafGuardAuthActions
{
	public function executeSignout($request)
	{
		afsNotificationPeer::log('Successful logout from the system!');
		
        $this->getUser()->signOut();

        $signoutUrl = sfConfig::get('app_sf_guard_plugin_success_signout_url', $request->getReferer());

        $this->redirect('' != $signoutUrl ? $signoutUrl : '@homepage');
	}
	
	public function executeSignin($request)
	{

		$user = $this->getUser();
        $captchaEnabled = in_array( 'sfCaptchaPlugin', sfProjectConfiguration::getActive()->getPlugins());

		if ($user->isAuthenticated())
		{
			return $this->redirect('@homepage');
		}

		if ($request->isMethod('post'))
		{
			if($request->hasParameter('signin'))
			{
				$signin=$request->getParameter('signin');

                if ($captchaEnabled) {
                    $wasCaptchaNeeded = afRateLimit::isCaptchaNeeded($request);
                    $captcha = ( isset($signin['captcha']) ? $signin['captcha'] : null);
                    if(!afRateLimit::verifyCaptchaIfNeeded($request, $captcha)){
                    	afsNotificationPeer::log('Failed to get authenticated in the system!');
                        return array('success' => false,'message'=>'The captcha verification failed!', 'redirect'=>'/login', 'load'=>'page');
                    }
                }

                $afUserQuery = ProjectConfiguration::getActive()->getAppFlowerUserQuery();
				$user = $afUserQuery->findOneByUsername($signin['username']);

				// user exists?
				if ($user)
				{
					// password is ok?
					//Now the user is valid
					if ($user->checkPassword($signin['password']))
					{
						//success

						$this->getUser()->signin($user, array_key_exists('remember', $signin) ? (($signin['remember']=='on')?true:false) : false);

						/**
						 * redirect to the referer page, or to @homepage, if no referer
						 *
						 * @author radu
						 */
						$signinUrl=$this->getRequest()->getReferer();
						$signinUrl=($signinUrl!=null)?$signinUrl:url_for('@homepage');
						
						afsNotificationPeer::log('Successful authentication in the system!');

						$result = array('success' => true/*,'message'=>'You have logged in succesfuly ! You\'ll be redirected now...'*/,'redirect'=>$signinUrl,'load'=>'page');
						$result = json_encode($result);
						return $this->renderText($result);
					}
					else
					{
						afsNotificationPeer::log('Failed to get authenticated in the system!');
						$result = array('success' => false,'message'=>'The username and/or password is invalid. ! Please try again !');
                        if ($captchaEnabled) {
                            afRateLimit::rememberSin($request);
                            if($wasCaptchaNeeded || afRateLimit::isCaptchaNeeded($request)) {
                                $result['redirect'] = '/login';
                                $result['load'] = '/page';
                            }
                        }
						$result = json_encode($result);
						return $this->renderText($result);
					}
				}
				else
				{
                    if ($captchaEnabled) {
                        afRateLimit::rememberSin($request);
                    }
                    afsNotificationPeer::log('Failed to get authenticated in the system!');
					$result = array('success' => false,'message'=>'The username and/or password is invalid. ! Please try again !','redirect'=>'/login','load'=>'page');
					$result = json_encode($result);
					return $this->renderText($result);
				}
			}
			else {
				if($request->hasParameter('limit')&&$request->hasParameter('start'))
				{
					$result['success']=true;
					$result['totalCount']=1;
					$result['rows'][]=array('message'=>'You were logged out ! You\'ll be redirected to the login page!','redirect'=>'/login','load'=>'page');
				}
				else {
					$result = array('success' => false,'message'=>'You were logged out ! You\'ll be redirected to the login page!','redirect'=>'/login','load'=>'page');
				}
				$result = json_encode($result);
				return $this->renderText($result);
			}
		}
		else
		{
			// if we have been forwarded, then the referer is the current URL
			// if not, this is the referer of the current request
			$user->setReferer($this->getContext()->getActionStack()->getSize() > 1 ? $request->getUri() : $request->getReferer());

			$module = sfConfig::get('sf_login_module');
			if ($this->getModuleName() != $module)
			{
				$result = array('success' => false,'message'=>'You were logged out ! You\'ll be redirected to the login page!','redirect'=>'/login','load'=>'page');
				$result = json_encode($result);
				return $this->renderText($result);
			}
		}
	}
}
