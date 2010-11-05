<p class="wizard-num"><?php echo $step; ?></p>
<p>
  <span class="wizard-title" style="color: grey; display: block;"><?php echo $name ?> - <?php echo $step_title ?></span>
  <span class="wizard-titletext"><?php echo nl2br($step_text) ?> </span>
</p>
<div class="clr"></div>
<hr color="grey" class="clear">

<div style="margin-left: 50px; color: grey;">
<?php echo include_partial("wizard/step",array("params" => $step_params)) ?>
</div>