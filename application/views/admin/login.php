<?php defined('SYSPATH') or die('No direct script access.');
?>
<div id="login-form">
<?php
if ($errors)
{
?>
<p class="login-err">Tu usuario o contrase&ntilde;a es incorrecto</p>    
<?php    
}                 

echo Form::open();
?>
<p>
<?php
echo Form::input('username', $username, array('id' => 'username')).' '
    .Form::label('username', 'Username');
?>
</p>
<p>
<?php
echo Form::password('password', NULL, array('id' => 'password')).' '
    .Form::label('password', 'Password');
?>
</p>
<p>
<?php
echo Form::checkbox('remember', 1, FALSE, array('id' => 'remember')).' '
    .Form::label('remember', 'Remember me');
?>
</p>
<p>
<?php
echo Form::submit('submit', 'Submit');
?>
</p>
<?php
echo Form::close();

?>
</div>