<?php defined('SYSPATH') or die('No direct script access.'); 
?>
<div id="congrats">
Hello, <?php echo $user->username; ?>!<br />

Really you have permissions to view this page!!!<br />

You can <a href="/admin/users">manage user profiles</a> or <a href="/admin/logout">log out</a>
</div>