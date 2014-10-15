<?php

header('Content-type: text/css');

define( 'HTTPROOT', dirname(__FILE__) );

require_once (dirname(HTTPROOT).'/lib/config_const.php');

//$inputa = $_GET['input'];

?>

* { margin:0px; padding:0px; font-family:'Microsoft YaHei'; }

table { border:0px; border-collapse:collapse; border-spacing:0; }

.select_input { background:#ffffff; color:#333333; padding: 6px; font-size: 18px; border: 1px solid #c0c0c0; width:240px; height:38px; }

span { color:#333333; padding: 6px; font-size:18px; }

.showerr_div { width:100%; height:16px; text-align:center; font-size:12px; color:#ff0000; padding:2px; }

.input_field_err { border:1px solid #cc0000; }

.loading { font-size:32px; }