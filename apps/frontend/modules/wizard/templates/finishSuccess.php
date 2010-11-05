<p class="wizard-num">X</p>
<p>
  <span class="wizard-title" style="color: grey; display: block;"><?php echo $name ?> - Congratulations!</span>
  <span class="wizard-titletext">The wizard has been successfuly executed, all changes have been saved.</span>
</p>
<div class="clr"></div>
<hr color="grey" class="clear">

<div style="margin-left: 50px; color: grey;">
<?php if(isset($url)): ?>
	<?php echo link_to($text,$url) ?>
<?php else: ?>
	<a href="javascript:window.close()">You may close this window now..</a>
<?php endif ?>
</div>