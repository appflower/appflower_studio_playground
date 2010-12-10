<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/plugins/appFlowerPlugin/lib/interface/AppFlowerApplicationConfiguration.interface.php';

class frontendConfiguration extends sfApplicationConfiguration implements AppFlowerApplicationConfiguration
{
  public function configure()
  {
  }
  
  public function getAppFlowerUserQuery() {
	return afGuardUserQuery::create();
  }
}
