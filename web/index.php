<?php

//ini_set('display_errors',true);

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

//$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true);
sfContext::createInstance($configuration)->dispatch();
