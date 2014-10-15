<?php

header('Content-type: text/javascript');

define( 'HTTPROOT', dirname(__FILE__) );

require_once (dirname(HTTPROOT).'/lib/config_const.php');

?>

function loginSubmit(handlePage,inputObj,displayObj,errPage){
	$.ajax({
		type: 'POST',
		url: handlePage,
		data: inputObj.serialize().toLowerCase(),
		dataType: 'text',
		beforeSend:function(){
			displayObj.append("<li id='loading'>loading...</li>");
		},
		success:function(returnData){
			displayObj.empty();
			displayObj.append(returnData);
		},
		error:function(){
			displayObj.empty();
			window.location=errPage;
		}
	});
}
