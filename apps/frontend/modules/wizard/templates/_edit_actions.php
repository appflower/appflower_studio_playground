<?php if(isset($config["steps"][$step]["skippable"])): ?>
<div style="float: left margin-top: 10px">
	<?php echo button_to("Skip","wizard/show?step=".($step+1)) ?>
</div>
<?php endif ?>
<div style="float: right; margin-top: 10px">
<?php echo submit_tag(($step < sizeof($config["steps"])) ? 'Next' : 'Save') ?>
<?php if($step > 1): ?>
	<?php echo button_to("Previous","wizard/show?step=".($step-1)) ?>
<?php endif ?>
<?php if($config["popup"] && $step > 1): ?>
&nbsp;<?php echo button_to_function('Cancel',"window.close()") ?>
<?php else: ?>
	<?php if($step > 1): ?>
		<?php if($config["cancel_restart"]): ?>
				<?php $url = "wizard/init?prefix=".$config["prefix"]."&step=1"; ?>
			<?php else: ?>
				<?php $url = "/"; ?>	
			<?php endif ?>
		&nbsp;<?php echo button_to('Cancel',$url, array("confirm" => "The wizard hasn't been finished yet. You'll have to restart the process.\n\nAre you sure?")) ?>
	<?php endif ?>
<?php endif ?>
</div>
