<?php

header('Content-type: text/css');

define( 'HTTPROOT', dirname(__FILE__) );

error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );

require_once (dirname(HTTPROOT).'/lib/config_const.php');

?>

.left_div .updatecontent { position:static; overflow:hidden; display:block; padding: 20px 30px 20px 30px; }
.left_div .updatecontent table { margin:0px auto; width:100%; }
.left_div .updatecontent hr { margin:10px 0px 5px 0px; padding:0px; height:1px; border:none; border-top:1px dashed #666666; }
.left_div .updatecontent .submit_title { font-size:24px; font-weight:bold; color:#000000; text-align:left; }
.left_div .updatecontent .submit_input_title { font-size:12px; font-weight:bold; color:#000000; text-align:left; }
.left_div .updatecontent .input_title { padding:3px 6px 3px 6px; font-size: 12px; border: 1px solid #c0c0c0; width:600px; height:18px; }
.left_div .updatecontent .input_content { padding:3px 6px 3px 6px; font-size: 12px; border: 1px solid #c0c0c0; width:740px; height:300px; }
.left_div .updatecontent .submit_button { background:<?php echo D_BASECOLOR;?>; text-align:center; font-size:18px; border:1px solid #c0c0c0; position:relative; overflow:hidden; left:0px; top:0px; margin:10px 0px 10px 0px; width:100%; height:36px; }
.left_div .updatecontent .submit_button_span { font-size:24px; color:#ffffff; }
.content .admin_modify { border:1px solid #c0c0c0; background-color:#6a6aff; text-align:center; width:68px; padding:6px 6px 6px 6px; float:left; }
.content .admin_delete { border:1px solid #c0c0c0; background-color:#ff6a6a; text-align:center; width:68px; padding:6px 6px 6px 6px; float:right; }