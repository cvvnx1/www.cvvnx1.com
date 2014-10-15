<?php

// data block example ///////////////////////////////////////
/*
Array (
	[data] => Array (
		[0] => Array ( [content1] => value1 [content2] => value2 [content3] => value3 )
		[1] => Array ( [content1] => value1 [content2] => value2 [content3] => value3 )
	)
	[key] => Array (
		[0] => content1
		[1] => content2
		[2] => content3
	)
	[keynum] => 2
	[datanum] => 2
)
*/
/////////////////////////////////////////////////////////////

function atom_sqldata_to_blockarr($F_Arr_data){
// blockarr means multi-dimensional array
  if (isset($F_Arr_data)){
    $F_Arr_return["data"][] = array();
    $F_Arr_return["key"] = array();
    $F_Arr_return["keynum"] = mysql_num_fields($F_Arr_data) - 1;
    $F_Arr_return["datanum"] = mysql_num_rows($F_Arr_data);
    for ($T_i = 0;$T_i <= $F_Arr_return["keynum"];$T_i++){
      $F_Arr_return["key"][$T_i] = mysql_field_name($F_Arr_data,$T_i);
    }
    $T_i = 0;
    while ($T_row = mysql_fetch_array($F_Arr_data)){
      foreach($F_Arr_return["key"] as $T_value){
        $F_Arr_return["data"][$T_i][$T_value] = $T_row[$T_value];
      }
      $T_i++;
    }
    return $F_Arr_return;
  }else{
    return "0";
  }
}

// json data block example //////////////////////////////////
// echo json_encode(atom_sqlresult_to_blockarr($F_Arr_result));
/*
{"data":[
	{"userid":"admin","username":"admin","usergroup":"IT"},
	{"userid":"cdp","username":"cdpname","usergroup":"IT"}
],
"key":["userid","username","usergroup"],
"keynum":2}
*/
/////////////////////////////////////////////////////////////

?>