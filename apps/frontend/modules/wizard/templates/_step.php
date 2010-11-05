<?php use_helper('Validation', 'Object', 'ObjectAdmin','Javascript') ?>

<?php $step = $params["step"] ?>
<?php $thiss = $params["config"]["steps"][$step] ?>
<?php echo form_tag('wizard/save?step='.$step.'&id='.$params["id"],array('id' => 'sf_guard_user', 'onsubmit'  => 'double_list_submit(\'sf_guard_user\'); return true;')) ?>

<?php if(isset($thiss["fieldsets"])): ?>
	<?php foreach($thiss["fieldsets"] as $fieldset_title => $fieldset): ?>
	<fieldset style="margin-left: -50px">
	<legend><?php echo ucwords($fieldset_title) ?></legend>
	<table class="listing">
	<tbody>
	<?php foreach($fieldset as $name => $field): ?>
		<?php $options = array('size' => 80, 'class' => 'textfield') ?>
		<?php if(isset($field["options"])): ?>
			<?php foreach($field["options"] as $key => $op): ?>
				<?php $options[$key] = $op ?>
			<?php endforeach ?>
		<?php endif ?>
		<tr>
		  <th width="25%"><?php echo ucfirst($field["label"]) ?>:</th>
		  <td>
		  <?php echo form_error($name, array('class' => 'error_message')) ?>
		  <?php if($field["type"] == "input"): ?>	
		  	<?php echo input_tag($name, $field["value"], $options) ?>
		  <?php elseif($field["type"] == "select"): ?>	
		  	<?php $options["size"] = ($options["size"] == 80) ? 1 : $options["size"] ?>
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
		  <?php elseif($field["type"] == "checklist"): ?>	
		  	<?php foreach($field["items"] as $chk => $text): ?>
		  		<?php echo checkbox_tag("chkbox_".$chk, $chk) ?>&nbsp;<?php echo $text ?><br />
		  	<?php endforeach ?>
		  <?php endif ?>
		  <i><?php if(isset($field["help"])): ?>
		  	<?php echo $field["help"] ?>
		  <?php endif ?></i>
		  <?php if(isset($field["controls"])): ?>
		  	<div style="float: right">
		  	<?php foreach($field["controls"] as $control): ?>
		  		<?php if(strstr($control["url"],"javascript:")): ?>
		  			<?php echo button_to_function($control["label"],$control["url"]); ?>&nbsp;
		  		<?php else: ?>
		  			<?php echo button_to($control["label"],$control["url"]); ?>&nbsp;
		  		<?php endif ?>
		  	<?php endforeach ?>
		  <?php endif ?>
		  	</div>
		  </td>
		</tr>
		<?php endforeach ?>
		</tbody>
		</table>
		</fieldset>
	<?php endforeach ?>
<?php endif ?>

<?php if(!isset($thiss["hidecontrols"])): ?>
	<?php include_partial("edit_actions",array("step" => $step, "config" => $params["config"])) ?>
<?php endif  ?>

</form>
