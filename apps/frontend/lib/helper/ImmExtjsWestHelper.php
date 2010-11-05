<?php

/**
 * link to my profile
 */
/*$user=sfContext::getInstance()->getUser();

$my_profile=array('title'=>'My Profile','autoScroll'=>'true','border'=>'false','iconCls'=>'user','html'=>'<a href="/user/myprofile">My Profile</a><br>'.($user->getProfile()->getWidgetHelpIsEnabled()?'<a href="/user/widget/disable">Disable widget help</a>':'<a href="/user/widget/enable">Enable widget help</a>'),'listeners'=>array('expand'=>ImmExtjsLayout::getInstance()->immExtjs->asMethod(array('parameters'=>'panel','source'=>'panel.body.dom.parentNode.style.padding=\'5px\';;'))));
*/
$sfUser=sfContext::getInstance()->getUser()->getGuardUser();
$fullname=($sfUser->getUsername() == "admin")?"Administrator":$sfUser->getProfile()->getFullName();

$profile_content = '	
	<div id="westpanel_link"><div style="background-color:#f8f8f8; padding:3px; border:1px solid #ddd;font-size:11px;"><b>Welcome, '.$fullname.'</b><br>
	Username: '.$sfUser->getUsername().'<br>
	Last Login: '.$sfUser->getLastLogin().'<br>
	<a href="/user/myprofile">[Edit My Profile]</a>
	</div>
	<div style="background-color:#f8f8f8; padding:3px; margin-top:10px; border:1px solid #ddd;font-size:11px;"><b>Widget help is '.($sfUser->getProfile()->getWidgetHelpIsEnabled()?'enabled <img src="/images/famfamfam/accept.png" width=10></b> <a href="/user/widget/disable"> [Disable]</a>':'disabled <img src="/images/famfamfam/delete.png" width=10></b> <a href="/user/widget/enable"> [Enable]</a>').'</b></div></div>';

$my_profile=array('id'=>'profile','title'=>'My Profile','autoHeight'=>'true','border'=>'false','iconCls'=>'user','html'=>$profile_content,'listeners'=>array('expand'=>ImmExtjsLayout::getInstance()->immExtjs->asMethod(array('parameters'=>'panel','source'=>'panel.body.dom.parentNode.style.padding=\'5px\';'))));
/**
 * add the elements the west panel
 */
ImmExtjsLayout::getInstance()->addItem('west',$my_profile);

?>
