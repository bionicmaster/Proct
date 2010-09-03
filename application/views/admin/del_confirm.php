<?php defined('SYSPATH') or die('No direct script access.'); 
?>
<div id="deluser-form">
<p>
    <span id="deluser-confirm">Are you sure 
        to delete user <em><?php echo $username; ?></em>?</span>
</p>
<?php
echo Form::open();
?>
<p>
<?php
echo Form::hidden('id', $id);
                                       
echo Form::submit('ok', 'OK');
echo Form::submit('cancel', 'Cancel');
?>
</p>
<?php
echo Form::close();
?>
</div>