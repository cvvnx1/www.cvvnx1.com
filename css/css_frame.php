<?php

header('Content-type: text/css');

define( 'HTTPROOT', dirname(__FILE__) );

require_once (dirname(HTTPROOT).'/lib/config_const.php');

?>

.main_div { position:static; overflow:hidden; display:block; z-index:10; top:0px; background-color:#ffffff; margin:0px auto; width:1100px; }

.left_div { position:static; overflow:hidden; display:block; margin:0px auto; width:800px; }
.left_div .content { position:static; overflow:hidden; display:block; padding: 20px 30px 20px 30px; }
.left_div .content table { margin:0px auto; width:100%; }
.left_div .content hr { margin:10px 0px 5px 0px; padding:0px; height:1px; border:none; border-top:1px dashed #666666; }
.left_div .content .content_title { font-size:24px; font-weight:bold; color:#000000; text-align:left; }
.left_div .content .content_author { font-size:12px; font-weight:bold; color:#000000; text-align:left; }
.left_div .content .content_time { font-size:12px; font-weight:normal; color:#000000; text-align:right; }
.left_div .content .content_text { font-size:18px; font-weight:normal; color:#000000; text-align:left; }
.left_div .content .content_text p { text-indent:2em; }

.oddframebg { background-color:#ffffcc; }
.evenframebg { background-color:#ccffff; }

.right_div { position:static; overflow:hidden; display:block; margin:0px auto; width:300px; }

.copyright_div { position:static; overflow:hidden; display:block; z-index:10; top:0px; background-color:<?php echo D_BASECOLOR; ?>; margin:0px auto; width:1100px; height:12px; margin:0 auto; text-align:center; line-height:12px; }
.copyright_div p { margin:0px; padding:0px; font-size:6px; color:<?php echo D_BACKCOLOR; ?>;}
.copyright_div p a:visited { color:<?php echo D_BACKFOCUSCOLOR; ?>; }
.copyright_div p a:hover { color:<?php echo D_BACKFOCUSCOLOR; ?>; }
.copyright_div p a:active { color:<?php echo D_BACKFOCUSCOLOR; ?>; }

