  <?php echo form_error($name, array('class' => 'error_message')) ?>
  <?php if($field["type"] == "input"): ?>	
  	<?php echo input_tag($name, $field["value"], $options) ?>
  <?php elseif($field["type"] == "select"): ?>	
  	<?php echo select_tag($name, options_for_select($field["items"],$field["value"]), $options) ?>
  <?php elseif($field["type"] == "textarea"): ?>	
  	<?php echo textarea_tag($name, $field["value"], $options) ?>
  <?php elseif($field["type"] == "password"): ?>	
  	<?php echo input_password_tag($name, "",$options) ?>
  <?php elseif($field["type"] == "checkbox"): ?>	
  	<?php echo checkbox_tag($name, $field["value"], (isset($field["checked"])) ? array("checked" => true) : "") ?>
  <?php elseif($field["type"] == "cancel"): ?>	
  	<?php echo button_to($field["text"], "wizard/init?prefix=".$thiss["prefix"]."&page=1") ?>
  <?php elseif($field["type"] == "button"): ?>	
  	<?php echo button_to($field["text"], $field["url"]) ?>
  <?php elseif($field["type"] == "permissions"): ?>	
  	<?php echo object_admin_double_list(new sfGuardUser(), 'getsfGuardGroup', 'through_class=sfGuardUserGroup') ?>
  <?php endif ?>