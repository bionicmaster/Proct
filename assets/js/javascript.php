<?php
ob_start("ob_gzhandler");
header("Content-type: text/javascript; charset: UTF-8");
header("Cache-Control: must-revalidate");
$off = 0; # Set to a reaonable value later, say 3600 (1 hr);
$exp = "Expires: " . gmdate("D, d M Y H:i:s", time() + $off) . " GMT";
header($exp);

$js = $_GET['js'];

include './jquery.js';
//include './autocomplete.js';

$var_js = explode(',',$js);

foreach($var_js as $var) @include './'.$var.'.js';

?>