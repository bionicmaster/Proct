<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $title; ?></title>
		<?php echo HTML::style('assets/css/styles.php?css=ui,aero', array('media' => 'screen')); ?>
		<?php echo HTML::script('assets/js/javascript.php?js=ui,easing,aero,admin'); ?>
	</head>
	<body>
		<h1>
		<?php
		    echo $title;
		?>
		</h1>
		<div id="wrapper">
			<?php
		    echo $menu;

		    ?><div class="window"><?php echo $content; ?></div>


		    <?echo $footer;
			?>
		</div>
	</body>
</html>
