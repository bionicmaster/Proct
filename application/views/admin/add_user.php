<?php defined('SYSPATH') or die('No direct script access.'); 
?>
<div id="adduser-form">
<?php
if ($errors)
{
?>
<p class="adduser-err">
<?php
echo Kohana::debug($errors); 
?>
</p>    
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
echo Form::password('password_confirm', NULL, array('id' => 'password_confirm')).' '
    .Form::label('password_confirm', 'Confirm password');
?>
</p>
<p>
<?php
echo Form::input('email', $email, array('id' => 'email')).' '
    .Form::label('email', 'Email');
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