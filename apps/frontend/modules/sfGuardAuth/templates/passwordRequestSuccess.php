<?php
$layout=new ImmExtjsSfGuardLayout();

/**
 * EXTJS REQUEST PASSWORD FORM
 */

$form=new ImmExtjsForm(array('action'=>url_for('@sf_guard_password')/*,'fileUpload'=>true*/));

$fieldset=$form->startFieldset(array('legend'=>'Receive your login details by email'));

$username=new ImmExtjsFieldInput($fieldset,array('name'=>'email','label'=>'Email','value'=>$sf_params->get('email'),'help'=>"Enter your email",'comment'=>'write your email','width'=>'150'));

$form->endFieldset($fieldset);

new ImmExtjsSubmitButton($form,array('action'=>url_for('@sf_guard_password')));
new ImmExtjsLinkButton($form,array('url'=>url_for('@login'),'label'=>'Go to Login'));

$form->end();

$layout->addItem('center',$form);

$tools=new ImmExtjsTools();
//$tools->addItem(array('id'=>'gear','handler'=>array('source'=>"Ext.Msg.alert('Message', 'The Settings tool was clicked.');")));
//$tools->addItem(array('id'=>'close','handler'=>array('parameters'=>'e,target,panel','source'=>"panel.ownerCt.remove(panel, true);")));

$layout->addCenterComponent($tools,array('title'=>'Request Password'));

$layout->end();

?>