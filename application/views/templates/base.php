<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $title; ?></title>
		<?php echo HTML::style('media/stylesheets/base.css', array('media' => 'screen')); ?>
	</head>
	<body>
		<div id="wrapper">
			<?php echo $content; ?>
		</div>
	</body>
</html>
