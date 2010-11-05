<?php
ini_set('log_errors', true);
//-- INITIALIZE SYMFONY -------------------------------------------------------
require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
sfContext::createInstance($configuration);

// initialize database manager
$databaseManager = new sfDatabaseManager($configuration);
$databaseManager->loadConfiguration();

