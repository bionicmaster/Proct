<h1>Registro</h1>

<?php if($errors): ?>
	<ul class="errors">
  	<?php foreach($errors as $field => $error): ?>
		  <li><?php echo $error; ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

<div id="user_form">
  <?php echo Form::open(); ?>
  <p><?php echo Form::label('username', 'Usuario: '); ?>
  <?php echo Form::input('username', $user->username, array('id' => 'username')); ?></p>

  <p><?php echo Form::label('email', 'Correo: '); ?><?php echo Form::input('email', $user->email, array('id' => 'email')); ?></p>

 <p><?php echo Form::label('first_name', 'Nombre: '); ?><?php echo Form::input('first_name', $meta->first_name, array('id' => 'first_name')); ?></p>

<p><?php echo Form::label('last_name', 'Apellido(s): '); ?><?php echo Form::input('last_name', $meta->last_name, array('id' => 'last_name')); ?></p>

 <p><?php echo Form::label('area', 'Marca o Departamento: '); ?><?php echo Form::input('area', $meta->area, array('id' => 'area')); ?></p>

<p><?php echo Form::label('phone', 'Telefono: '); ?><?php echo Form::input('phone', $meta->phone, array('id' => 'phone')); ?></p>

  <p><?php echo Form::label('password', 'Contrase&ntilde;a: '); ?><?php echo Form::password('password', NULL, array('id' => 'password')); ?></p>

  <p><?php echo Form::label('password_confirm', 'Confirmar Contrase&ntilde;a: '); ?><?php echo Form::password('password_confirm', NULL, array('id' => 'password_confirm')); ?></p>

  <p>
    <?php echo Form::submit('register', 'Registrarse'); ?>

  </p>
  
  <?php echo Form::close(); ?>
</div>
