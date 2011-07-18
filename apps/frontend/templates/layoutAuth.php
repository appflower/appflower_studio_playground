<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>
</head>

<body style="background-image: url(/appFlowerStudioPlugin/images/bg/backgrond_3.2.2.jpg);background-position: 50% 50%;background-repeat: no-repeat;">
	<!-- Page Frame -->
	<?php if (has_slot('content')): ?>
		<?php include_slot('content') ?>
	<?php endif; ?>

	<?php echo $sf_data->getRaw('sf_content') ?>
</body>
</html>
