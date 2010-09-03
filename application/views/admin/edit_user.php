<?php defined('SYSPATH') or die('No direct script access.'); 
?>
<div id="edituser-form">
<?php
if ($errors)
{
?>
<p class="edituser-err">
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
//echo Form::hidden('id', $id);

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
<span>Assigned roles</span>
<ul style="list-style-type: none;">
<?php     
$role_ids = array();
foreach ($user_roles as $ur)
{
    $role_ids[] = $ur['id'];
}

foreach ($roles as $role)
{
?>
<li>
<?php
    echo Form::checkbox('roles[]', $role['id'], in_array($role['id'], $role_ids), array('id' => 'roles_'.$role['id'])).' '
        .Form::label('roles_'.$role['id'], $role['name'].'<br />'.$role['description']);
?>
</li>
<?    
}
?>
</ul>
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