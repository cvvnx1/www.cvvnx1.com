<?php

require_once (HTTPROOT.'/lib/lib_mysql.php');
require_once (HTTPROOT.'/lib/config_const.php');
require_once (HTTPROOT.'/lib/atom_sqldataproc.php');

function login_verify($F_userid, $F_userpsw, $F_ipaddr){
// usage ////////////////////////////////////////////////////
/*
if ( login_verify($F_userid, md5($F_userpsw), $F_ipaddr) ){
	// logined process
}else{
	// non-login process
}
*/
// suggest
// login_verify($_POST['userid'], md5($_POST['userpsw']), $_SERVER["REMOTE_ADDR"])
/////////////////////////////////////////////////////////////
	$F_Arr_loginInfo = atom_sqldata_to_blockarr(mysql_standard_query("userpsw", "user", "userid='".$F_userid."'"));

	if ($F_userpsw == $F_Arr_loginInfo['data'][0]['userpsw']){
		mysql_standard_update("ipaddr='".$F_ipaddr."',logintime=now(),"."loginstring='".md5($F_userid.$F_ipaddr)."'", "user", "userid='".$F_userid."'");
		return TRUE;
	}else{
		return FALSE;
	}
}

function login_refresh($F_userid, $F_loginstring){
// usage ////////////////////////////////////////////////////
/*
if ( login_refresh($F_userid, $F_loginstring) ){
	// logined process
}else{
	// non-login process
}
*/
// suggest
// login_refresh($_COOKIE['userid'], md5($_COOKIE['userid'].$_SERVER["REMOTE_ADDR"]))
/////////////////////////////////////////////////////////////
  if(isset($F_userid) && isset($F_loginstring)){
    $F_Arr_loginInfo = atom_sqldata_to_blockarr(mysql_standard_query("UNIX_TIMESTAMP(logintime),loginstring,UNIX_TIMESTAMP(now())","user","userid='".$F_userid."'"));
    if ((($F_Arr_loginInfo['data'][0]['UNIX_TIMESTAMP(now())'] - $F_Arr_loginInfo['data'][0]['UNIX_TIMESTAMP(logintime)']) <= D_LOGINTIMEOUT) && ($F_loginstring == $F_Arr_loginInfo['data'][0]['loginstring'])){
      mysql_standard_update("logintime=now()", "user", "userid='".$F_userid."'");
//echo "<script type=\"text/javascript\">";
//echo "alert ('test');";
//echo "<\/script>";
      return TRUE;
    }else{
      return FALSE;
    }
  }else{
    return FALSE;
  }
}
?>