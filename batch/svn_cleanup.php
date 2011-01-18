<?php
/**
 * search for svn locks and do svn cleanup
 */
require_once(dirname(__FILE__).'/init_symfony.inc.php');

$path = sfConfig::get('sf_root_dir');

$files = sfFinder::type('file')->name('lock')->maxdepth(0)->in($path);

print_r($files);