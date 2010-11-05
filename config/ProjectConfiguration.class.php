<?php

require_once '/var/www/symfony-1.2/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    // for compatibility / remove and enable only the plugins you want
    $this->enableAllPluginsExcept(array('sfDoctrinePlugin', 'sfCompat10Plugin'));
  }
}
