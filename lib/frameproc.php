<?php

define( 'HTTPROOT', dirname(dirname(__FILE__)) );

require_once (HTTPROOT.'/lib/lib_mysql.php');
require_once (HTTPROOT.'/lib/config_const.php');
require_once (HTTPROOT.'/lib/atom_sqldataproc.php');

$sqlStr="SELECT title,author,recordtime,content FROM content ORDER BY recordtime DESC LIMIT ".$_POST["divlength"].",".D_DIVSCROLLNUM;
$frameproc_content = atom_sqldata_to_blockarr(mysql_custom_query($sqlStr));

if ( $frameproc_content["datanum"] != 0 ){
  foreach ($frameproc_content["data"] as $T_value){
    frameproc_writeFrame($T_value);
  }
}

function frameproc_writeFrame($F_Arr_frameInfo){

  $search_words = array(chr(13).chr(10),"[img]","[/img]");
  $replace_words = array("</p><p>","<img src=\"","\" />");

  echo "<div class=\"content\">";
  echo "<table>";
  echo "<tr>";
  echo "<td colspan=\"2\"><div class=\"content_title\">".$F_Arr_frameInfo["title"]."</div></td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td colspan=\"2\"><hr /></td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td><div class=\"content_author\">".$F_Arr_frameInfo["author"]."</div></td>";
  echo "<td><div class=\"content_time\">".$F_Arr_frameInfo["recordtime"]."</div></td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td colspan=\"2\">";
  echo "<div class=\"content_text\"><br /><p>".str_replace($search_words,$replace_words,$F_Arr_frameInfo["content"])."</p></div>";
  echo "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td colspan=\"2\"><hr /></td>";
  echo "</tr>";

  switch ($_POST["pagetype"]){
    case "admin":
      echo "<tr>";
      echo "<td colspan=\"2\" align=\"right\">";
      echo "<div class=\"admin_modify\">MODIFY</div>";
      echo "<div class=\"admin_delete\">DELETE</div>";
      echo "</td>";
      echo "</tr>";
    break;
    default:
  }
  echo "</table>";
  echo "</div>";
}

?>