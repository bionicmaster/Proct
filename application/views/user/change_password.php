<h1>Change Password</h1>

<?php if($errors): ?>
	<ul class="errors">
  	<?php foreach($errors as $field => $error): ?>
		  <li><?php echo $error; ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

<div id="user_form">
  <?php echo Form::open(); ?>

  <p><?php echo Form::label('password', 'New Password'); ?></p>
  <p><?php echo Form::password('password', NULL, array('id' => 'password')); ?></p>

  <p><?php echo Form::label('password_confirm', 'New Password (confirm)'); ?></p>
  <p><?php echo Form::password('password_confirm', NULL, array('id' => 'password_confirm')); ?></p>

  <p>
    <?php echo Form::submit('change_password', 'Change password'); ?>
    or <?php echo HTML::anchor(Route::get('default')->uri(array('action' => 'index')), 'return to the index'); ?>.
  </p>
  
  <?php echo Form::close(); ?>
</div>
