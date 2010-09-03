<?php defined('SYSPATH') or die('No direct script access.');   
       
if (is_array($items) AND ! empty($items))
{
?>    
<ul id="nav"> 
<?php
    foreach ($items as $item)
    {
?>
    <li style="display: inline;"><?php echo $item; ?></li>
<?php
    }
?>    
</ul> 
<?php
}