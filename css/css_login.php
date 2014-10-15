<?php

header('Content-type: text/css');

define( 'HTTPROOT', dirname(__FILE__) );

require_once (dirname(HTTPROOT).'/lib/config_const.php');

?>

.login_button_div { background:<?php echo D_BASECOLOR;?>; text-align:center; font-size:18px; border:1px solid #c0c0c0; position:relative; overflow:hidden; left:0px; top:0px; margin:0px; width:100%; height:40px; }

.login_button_span { font-size:24px; color:#ffffff; }

.login_rememberme { color:#999999; font-size:14px; }

.framediv { width:336px; margin:0px auto;}

.framediv .text_input { padding:6px; font-size: 18px; border: 1px solid #c0c0c0; width:240px; height:24px; }