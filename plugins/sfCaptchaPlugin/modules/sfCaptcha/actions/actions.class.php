<?php

/**
 * captcha actions.
 *
 * @package    captcha
 * @subpackage captcha
 * @author     Voznyak Nazar <voznyaknazar@gmail.com>
 * @version    
 */
class sfCaptchaActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
  	$captcha = new Captcha();  	
  	$captcha->Set($captcha->generate());
  	print $captcha->plot();
   }
}
