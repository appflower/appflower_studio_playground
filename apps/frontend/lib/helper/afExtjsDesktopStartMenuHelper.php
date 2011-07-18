<?php
$startmenu = new afExtjsStartMenu(array('title'=>'AppFlower'));

$dashboard = new afExtjsStartMenuButton($startmenu,array('label'=>'<img src="/images/famfamfam/house_go.png" border="0">','handler'=>'afApp.widgetPopup(\'/pages/dashboard\');','tooltip'=>array('text'=>'Your overview', 'title'=>'Project Dashboard')));$dashboard->end();

$startmenu->end();
?>
