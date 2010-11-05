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
			myLogger::logNewObject($guardUser,'','Successful Logout');
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
				$signin=$request->getParameter('signin');
				$user = sfGuardUserPeer::retrieveByUsername($signin['username']);
				if(!$user){
					$this->getUser()->setAttribute('SHOW_CAPTCHA',"YES");
					$this->getUser()->setAttribute('INVALID_USER_ATTEMPT',"YES");					
				}
				if(isset($signin['captcha'])){
					$captcha = new Captcha();
					if(!$captcha->verify($signin['captcha'])){
						$this->getUser()->setAttribute('SHOW_CAPTCHA',"YES");
						$result = array('success' => false,'message'=>'The captcha verification failed!');
						$result = json_encode($result);
						return $this->renderText($result);
					}
				}
												
				// user exists?
				if ($user)
				{
					// password is ok?
					//Now the user is valid
					$this->getUser()->setAttribute('SHOW_CAPTCHA',"NO");	
					
					if ($user->checkPassword($signin['password']))
					{
						//success
						
						$this->getUser()->signin($user, array_key_exists('remember', $signin) ? (($signin['remember']=='on')?true:false) : false);
						/*
						 $time_zone_offset = (($this->getUser()->getProfile()->getTimeZones()->getOffset()/60)/60);

						 if($time_zone_offset < 0) {
						 $time_zone_offset += 1;
						 $time_zone_sign = "-";
						 } else {
						 $time_zone_offset -= 1;
						 $time_zone_sign = "+";
						 }


						 if(!is_integer($time_zone_offset)) {
						 $time_zone_hours = strtok($time_zone_offset,".");
						 $time_zone_secs = 60 * ((float) ("0.".strtok(".")));
						 } else {
						 $time_zone_hours = $time_zone_offset;
						 $time_zone_secs = "00";
						 }

						 $connection = Propel::getConnection();
						 $query = "SET global time_zone='".$time_zone_sign.$time_zone_hours.":".$time_zone_secs."'";
						 $statement = $connection->prepare($query);
						 $r = $statement->execute();
						 	
						 */
							
						/* Signin URL has been defined in app.yml, since it was requested. Now siginin always redirects to that
						 * url.
						 *
						 * Otherwise the code is intact here
						 *
						 * Tamas
						 */

						// always redirect to a URL set in app.yml
						// or to the referer
						// or to the homepage
						//$signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $this->getUser()->getReferer('@homepage'));
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
						
						// Successful login, so remove show_captcha and invalid_password_attempt
						$this->getUser()->setAttribute('SHOW_CAPTCHA',"NO");
						$this->getUser()->setAttribute('INVALID_PASSWORD_ATTEMPT',0);
						$this->getUser()->setAttribute('INVALID_USER_ATTEMPT',"NO");
						myLogger::logNewObject($user,'','Successful Login');
							
							
						$result = array('success' => true/*,'message'=>'You have logged in succesfuly ! You\'ll be redirected now...'*/,'redirect'=>$signinUrl);
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
						$this->getUser()->setAttribute('INVALID_PASSWORD_ATTEMPT',(int)$this->getUser()->getAttribute('INVALID_PASSWORD_ATTEMPT')+1);
						if($this->getUser()->getAttribute('INVALID_PASSWORD_ATTEMPT') > 2 && $this->getUser()->getAttribute('INVALID_USER_ATTEMPT') != "YES"){							
							$this->getUser()->setAttribute('SHOW_CAPTCHA',"YES");		
							$result = array('success' => false,'message'=>'The username and/or password is invalid. ! Please try again !','redirect'=>'/login');
						}else{
							$result = array('success' => false,'message'=>'The username and/or password is invalid. ! Please try again !');
						}
												
						myLogger::logNewObject($user,'','Failed Login',$user);						
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
					$result = array('success' => false,'message'=>'The username and/or password is invalid. ! Please try again !','redirect'=>'/login');
					$result = json_encode($result);
					return $this->renderText($result);
				}
			}
			else {
				if($request->hasParameter('limit')&&$request->hasParameter('start'))
				{
					$result['success']=true;
					$result['totalCount']=1;
					$result['rows'][]=array('message'=>'You were logged out ! You\'ll be redirected to the login page!','redirect'=>'/login');
				}
				else {
					$result = array('success' => false,'message'=>'You were logged out ! You\'ll be redirected to the login page!','redirect'=>'/login');
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
				$result = array('success' => false,'message'=>'You were logged out ! You\'ll be redirected to the login page!','redirect'=>'/login');
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

			$raw_email = $this->getController()->sendEmail('mail', 'sendPassword');
			$this->logMessage($raw_email, 'debug');

			// save new password
			$user->save();

			//audit log
			myLogger::logUpdateObject($user_old,$user);

			// Set the shell password
			$shell_username = sprintf("user%04s", $user->getId());
			posix_setpgid(0, 0);

			// Create temporary file with password, since sudo will send pass to logfile.
			$filename = '/tmp/'.time();
			$fh = fopen($filename, 'w');
			fwrite($fh, $password);
			fclose($fh);

			exec('/usr/bin/sudo /installed/system/syscontrol.sh system user chpass '.$shell_username .' '. $filename, $status);

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
