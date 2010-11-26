<?php
require_once(sfConfig::get('sf_root_dir').'/plugins/sfGuardPlugin/modules/sfGuardAuth/lib/BasesfGuardAuthActions.class.php');

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     radu
 */
class sfGuardAuthActions extends BasesfGuardAuthActions
{
	public function executeSignout($request)
	{
		/*
		 * Audit log for successful logout.
		 * The guardUser could be missing, if the user
		 * is already signedout due to an inactivity.
		 */
		$guardUser = $this->getUser()->getGuardUser();
		if ($guardUser) {
			//myLogger::logNewObject($guardUser,'','Successful Logout');
		}
		return parent::executeSignout($request);
	}
	public function executeSignin($request)
	{
		$user = $this->getUser();

		if ($user->isAuthenticated())
		{
			return $this->redirect('@homepage');
		}

		if ($request->isMethod('post'))
		{
			if($request->hasParameter('signin'))
			{
				/*$wasCaptchaNeeded = afRateLimit::isCaptchaNeeded($request);
				if(!afRateLimit::verifyCaptchaIfNeeded($request, 'signin[captcha]')){
						return array('success' => false,'message'=>'The captcha verification failed!', 'redirect'=>'/login', 'load'=>'page');
				}*/

				$signin=$request->getParameter('signin');
				$user = sfGuardUserPeer::retrieveByUsername($signin['username']);
												
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

						/*
						 * Audit log for successful login
						 */
						//myLogger::logNewObject($user,'/sfGuardUser/editUser?id='.$user->getId(),'Successful Login');
							
							
						$result = array('success' => true/*,'message'=>'You have logged in succesfuly ! You\'ll be redirected now...'*/,'redirect'=>'/','load'=>'page');
						$result = json_encode($result);
						return $this->renderText($result);
					}
					else 
					{
						/*
						 * Audit log for failed login
						 */
						// Password is wrong for valid user
						// so count invalid password attempt for valid user
						//afRateLimit::rememberSin($request);
						$result = array('success' => false,'message'=>'The username and/or password is invalid. ! Please try again !');
						/*if($wasCaptchaNeeded || afRateLimit::isCaptchaNeeded($request)) {
							$result['redirect'] = '/login';
							$result['load'] = '/page';
						}*/
												
						//myLogger::logNewObject($user,'/sfGuardUser/editUser?id='.$user->getId(),'Failed Login',$user);						
						$result = json_encode($result);
						return $this->renderText($result);
					}
				}
				else 
				{
					/*
					 * Audit log for failed login
					 */

					//myLogger::logMessage('Failed Login: Attempted Username: '.$signin['username']);
					//afRateLimit::rememberSin($request);
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

	/**
	 * Execute Password Request action
	 *
	 */
	public function executePasswordRequest()
	{
		if ($this->getRequest()->getMethod() != sfRequest::POST)
		{
			// display the form
			return sfView::SUCCESS;
		}

		// handle the form submission
		$c = new Criteria();
		$c->add(sfGuardUserPeer::USERNAME, $this->getRequestParameter('email'));
		$user = sfGuardUserPeer::doSelectOne($c);

		// email exists?
		if ($user)
		{
			//audit log
			$user_old=clone $user;
				
			// set new random password
			$password = substr(md5(rand(100000, 999999)), 0, 6);
			$user->setPassword($password);

			$this->getRequest()->setAttribute('password', $password);
			$this->getRequest()->setAttribute('nickname', $this->getRequestParameter('email'));

			/*afAutomailer::saveMail('mail', 'sendPassword',array('email'=>$this->getRequestParameter('email'),
																'from'=>'Ecomap.eu',
																'subject'=>'Forgot pass'));*/
			
			// save new password
			$user->save();

			$result = array('success' => true,'message'=>'Your login information was sent to '.$this->getRequestParameter('email').'. <br>You should receive it shortly, so you can proceed to the '.link_to('login page', '@login').'.');

		}
		else
		{
			$result = array('success' => false,'message'=>'There is no user with this email address. Please try again!');
		}

		$result = json_encode($result);
		return $this->renderText($result);
	}
}
