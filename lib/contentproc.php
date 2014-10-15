<?php

define( 'HTTPROOT', dirname(dirname(__FILE__)) );

require_once (HTTPROOT.'/lib/lib_login.php');
require_once (HTTPROOT.'/lib/lib_mysql.php');
require_once (HTTPROOT.'/lib/atom_basefunc.php');

if ( login_refresh($_COOKIE['userid'], md5($_COOKIE['userid'].$_SERVER["REMOTE_ADDR"])) ){
  contentproc_main();
}else{
  atom_redirectPage("index.html");
}

function contentproc_main(){
  // input $_POST["title"]
  // input $_POST["content"]
  // input $_POST["time"]
  // input $_POST["author"]

  // input $_POST["deltitle"]
  // input $_POST["deltime"]
  // input $_POST["delauthor"]
  if ( isset($_POST["title"]) ){
    if ( $_POST["time"] == "" ){
      $F_recordtime = "now()";
    }else{
      $F_recordtime = "'".$_POST["time"]."'";
    }

    $F_updateConfirm = atom_sqldata_to_blockarr(mysql_standard_query("*","content", "title='".$_POST["title"]."' and author='".$_POST["author"]."' and recordtime='".$_POST["time"]."'"));

    if ( $F_updateConfirm["datanum"] != 0 ){
      mysql_standard_update("title='".$_POST["title"]."',author='".$_POST["author"]."',recordtime=now(),content='".$_POST["content"]."'","content", "title='".$_POST["title"]."' and author='".$_POST["author"]."' and recordtime=".$F_recordtime);
      echo "Content updated";
    }else{
      mysql_standard_insert("title='".$_POST["title"]."',author='".$_POST["author"]."',recordtime=".$F_recordtime.",content='".$_POST["content"]."'","content");
      echo "Content added";
    }
  }

  if ( isset($_POST["deltitle"]) ){
    mysql_standard_delete("title='".$_POST["deltitle"]."' and author='".$_POST["delauthor"]."' and recordtime='".$_POST["deltime"]."'", "content");
  }
}

?>