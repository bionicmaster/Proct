<?php
ob_start("ob_gzhandler");
ob_start("compress");
header("Content-type: text/css; charset: UTF-8");
header("Cache-Control: must-revalidate");
$off = 3600; # Poner a un valor razonable, por decir 3600 (1 hr);
$exp = "Expires: " . gmdate("D, d M Y H:i:s", time() + $off) . " GMT";
header($exp);

function compress($buffer) {
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer); // remover comments
    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer); // remove tabs, spaces, newlines, etc.
    $buffer = str_replace('{ ', '{', $buffer); // remover espacios.
    $buffer = str_replace(' }', '}', $buffer);
    $buffer = str_replace('; ', ';', $buffer);
    $buffer = str_replace(', ', ',', $buffer);
    $buffer = str_replace(' {', '{', $buffer);
    $buffer = str_replace('} ', '}', $buffer);
    $buffer = str_replace(': ', ':', $buffer);
    $buffer = str_replace(' ,', ',', $buffer);
    $buffer = str_replace(' ;', ';', $buffer);
    return $buffer;
}
$css = $_GET['css'];
$tpl = $_GET['tpl'];
$img = "/assets/img/tpl/$tpl/{$tpl}_";

$var_css = explode(',',$css);

include './styles.css';
include './autocomplete.css';

foreach($var_css as $var) @include './'.$var.'.css';
?>