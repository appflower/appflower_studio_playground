<?php

class frontendConfiguration extends sfApplicationConfiguration implements AppFlowerApplicationConfiguration
{
  public function configure()
  {
  }
  
  public function getAppFlowerUserQuery() {
	return afGuardUserQuery::create();
  }
}
