<?php

// atom_mysql_query Example ///////////////////////////////////////////////
/*
$result = atom_mysql_query($conn, $database, $selectitem, $tablename, [$querycondition]);
if (isset($result)){
  ...next code...
}
else{
  ...error code...
}
*/
// atom_mysql_query Example ///////////////////////////////////////////////
function atom_mysql_query($F_conn, $F_database, $F_selectitem, $F_tablename, $F_querycondition){
  if (isset($F_conn) && isset($F_database) && isset($F_selectitem) && isset($F_tablename)){
    mysql_select_db($F_database, $F_conn);
    if (isset($F_querycondition)){
      $F_result = mysql_query("SELECT ".$F_selectitem." FROM ".$F_tablename." WHERE ".$F_querycondition, $F_conn);
    }else{
      $F_result = mysql_query("SELECT ".$F_selectitem." FROM ".$F_tablename, $F_conn);
    }
  }
  return $F_result;
}

function atom_mysql_custom_query($F_conn, $F_database, $F_sqlstr){
  if (isset($F_conn) && isset($F_database) && isset($F_sqlstr)){
    mysql_select_db($F_database, $F_conn);
    $F_result = mysql_query($F_sqlstr, $F_conn);
    return $F_result;
  }
}

// atom_mysql_update Example ///////////////////////////////////////////////
/*
atom_mysql_update($F_conn, $F_database, $F_updateitem, $F_tablename, $F_querycondition);
*/
// atom_mysql_update Example ///////////////////////////////////////////////
function atom_mysql_update($F_conn, $F_database, $F_updateitem, $F_tablename, $F_querycondition){
  if (isset($F_conn) && isset($F_database) && isset($F_updateitem) && isset($F_tablename) && isset($F_querycondition)){
    mysql_select_db($F_database, $F_conn);
    mysql_query("UPDATE ".$F_tablename." SET ".$F_updateitem." WHERE ".$F_querycondition, $F_conn);
  }
}

// atom_mysql_insert Example ///////////////////////////////////////////////
/*
atom_mysql_insert($F_conn, $F_database, $F_insertitem, $F_tablename);
*/
// atom_mysql_insert Example ///////////////////////////////////////////////
function atom_mysql_insert($F_conn, $F_database, $F_insertitem, $F_tablename){
  if (isset($F_conn) && isset($F_database) && isset($F_insertitem) && isset($F_tablename)){
    mysql_select_db($F_database, $F_conn);
    mysql_query("INSERT INTO ".$F_tablename." SET ".$F_insertitem, $F_conn);
  }
}

// atom_mysql_delete Example ///////////////////////////////////////////////
/*
atom_mysql_delete($F_conn, $F_database, $F_deletecondition, $F_tablename);
*/
// atom_mysql_delete Example ///////////////////////////////////////////////
function atom_mysql_delete($F_conn, $F_database, $F_deletecondition, $F_tablename){
  if (isset($F_conn) && isset($F_database) && isset($F_deletecondition) && isset($F_tablename)){
    mysql_select_db($F_database, $F_conn);
    mysql_query("DELETE FROM ".$F_tablename." WHERE ".$F_deletecondition, $F_conn);
  }
}

?>