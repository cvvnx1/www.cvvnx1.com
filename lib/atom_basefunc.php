<?php
function atom_setCookie($F_cookieName, $F_cookieContent){
  if (isset($F_cookieName) && isset($F_cookieContent)){
    echo "<script language=\"javascript\">";
    echo "setCookie('$F_cookieName','".$F_cookieContent."',1);";
    echo "</script>";
  }
}

function atom_redirectPage($F_page){
  if (isset($F_page)){
    echo "<script language=\"javascript\">";
    echo "window.location=\"".$F_page."\";";
    echo "</script>";
  }else{
    echo "<script language=\"javascript\">";
    echo "window.location.reload();";
    echo "</script>";
  }
}

?>