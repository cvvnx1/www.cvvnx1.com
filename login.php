<?php
header("Content-type: text/html; charset=utf-8");

define( 'HTTPROOT', dirname(__FILE__) );

require_once (HTTPROOT.'/lib/lib_login.php');
require_once (HTTPROOT.'/lib/atom_basefunc.php');

if ( login_verify($_POST['userid'], md5($_POST['userpsw']), $_SERVER["REMOTE_ADDR"]) ){
  atom_setCookie("userid",$_POST['userid']);
  atom_redirectPage("admin.php");
}else{
  // redirect to window.location.reload()
  atom_redirectPage();
}
?>