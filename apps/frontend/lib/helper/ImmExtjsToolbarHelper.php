<?php
$toolbar = new ImmExtjsToolbar();

$dashboard = new ImmExtjsToolbarButton($toolbar,array('label'=>'<img src="/images/famfamfam/house_go.png" border="0">','url'=>'/pages/dashboard','tooltip'=>array('text'=>'Your overview', 'title'=>'Project Dashboard')));$dashboard->end();
$tabs = new ImmExtjsToolbarButton($toolbar,array('label'=>'Tabbed page','url'=>'/pages/tabs','tooltip'=>array('text'=>'Your overview', 'title'=>'Tabbed')));$tabs->end();

/**
 * Fill
 */
new ImmExtjsToolbarFill($toolbar);

$logout_button = new ImmExtjsToolbarButton($toolbar,array('label'=>'<img src="/images/famfamfam/user_go.png" border="0">','url'=>'/logout','tooltip'=>array('text'=>'Click to log out', 'title'=>sfContext::getInstance()->getUser()->getUsername())));$logout_button->end();

$toolbar->end();
?>
