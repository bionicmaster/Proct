<h1>Home</h1>

<p>
	<?php if ($logged_in): ?>
		<?php echo HTML::anchor(Route::get('default')->uri(array('action' => 'change_password')), 'Change password'); ?>,
		<?php echo HTML::anchor(Route::get('default')->uri(array('action' => 'logout')), 'Logout'); ?>
	<?php else: ?>
		<?php echo HTML::anchor(Route::get('default')->uri(array('action' => 'login')), 'Login'); ?>,
		<?php echo HTML::anchor(Route::get('default')->uri(array('action' => 'register')), 'Register'); ?>
	<?php endif; ?>
</p>

<?php if (! $logged_in): ?>
	<p>You are not logged in.</p>
<?php else: ?>
  <p>You are logged in as <strong><?php echo $user->username; ?></strong>.</p>
<?php endif; ?>
