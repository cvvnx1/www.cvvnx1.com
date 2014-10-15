<?php

require_once (HTTPROOT.'/lib/atom_mysql.php');
require_once (HTTPROOT.'/lib/config_const.php');

function mysql_standard_query($F_selectitem, $F_tablename, $F_querycondition){
  $F_conn = mysql_connect(D_SQLSERVER, D_SQLUSER, D_SQLPSW);
  if (!$F_conn){
    die('Could not connect: ' . mysql_error());
  }else{
    $F_result = atom_mysql_query($F_conn, D_SQLDATABASE, $F_selectitem, $F_tablename, $F_querycondition);
    if (isset($F_result)){
      return $F_result;
    }else{
      return "0";
    }
  }
  mysql_close($F_conn);
}

function mysql_custom_query($F_sqlstr){
  $F_conn = mysql_connect(D_SQLSERVER, D_SQLUSER, D_SQLPSW);
  if (!$F_conn){
    die('Could not connect: ' . mysql_error());
  }else{
    $F_result = atom_mysql_custom_query($F_conn, D_SQLDATABASE, $F_sqlstr);
    if (isset($F_result)){
      return $F_result;
    }else{
      return "0";
    }
  }
  mysql_close($F_conn);
}

function mysql_standard_update($F_updateitem, $F_tablename, $F_querycondition){
  $F_conn = mysql_connect(D_SQLSERVER, D_SQLUSER, D_SQLPSW);
  if (!$F_conn){
    die('Could not connect: ' . mysql_error());
  }
  else{
    atom_mysql_update($F_conn, D_SQLDATABASE, $F_updateitem, $F_tablename, $F_querycondition);
  }
  mysql_close($F_conn);
}

function mysql_standard_insert($F_insertitem, $F_tablename){
  $F_conn = mysql_connect(D_SQLSERVER, D_SQLUSER, D_SQLPSW);
  if (!$F_conn){
    die('Could not connect: ' . mysql_error());
  }
  else{
    atom_mysql_insert($F_conn, D_SQLDATABASE, $F_insertitem, $F_tablename);
  }
  mysql_close($F_conn);
}

function mysql_standard_delete($F_deletecondition, $F_tablename){
  $F_conn = mysql_connect(D_SQLSERVER, D_SQLUSER, D_SQLPSW);
  if (!$F_conn){
    die('Could not connect: ' . mysql_error());
  }
  else{
    atom_mysql_delete($F_conn, D_SQLDATABASE, $F_deletecondition, $F_tablename);
  }
  mysql_close($F_conn);
}

?>