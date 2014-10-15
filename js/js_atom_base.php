<?php

header('Content-type: text/javascript');

define( 'HTTPROOT', dirname(__FILE__) );

require_once (dirname(HTTPROOT).'/lib/config_const.php');

?>

function atom_alertTxt(input_txt){
	alert (input_txt);
}

function atom_addElement(eleParantObj,eleType,eleIdStr){
	if ($('#' + eleIdStr).length > 0){
		alert ('Element ' + eleIdStr + ' exist!');
	}
	else{
		var eleObj = document.createElement(eleType);
		eleObj.id = eleIdStr;
		eleObj.innerHTML = 'test';
		eleParantObj.append(eleObj);
		alert ($('#' + eleIdStr).attr('id'));
	}
}

function atom_setElementClass(eleObj,eleClassnameStr){
	if (eleObj.attr('id').length > 0){
		eleObj.attr('class',eleClassnameStr);
	}
	else{
		alert ('Element not exist!');
	}
}

function atom_convertRgbToHex(color){
	if (color.substr(0, 1) === '#') {
		return color;
	}
	var digits = /(.*?)rgb\((\d+), (\d+), (\d+)\)/.exec(color);

	var red = parseInt(digits[2]);
	var green = parseInt(digits[3]);
	var blue = parseInt(digits[4]);
	return "#" + ((1 << 24) + (red << 16) + (green << 8) + blue).toString(16).slice(1);
}

function atom_pressEnterTriggerEvent(eleObj,eleTriggerObj,eleTriggerEventStr){
	eleObj.bind('keydown',function(e){
		var key = e.which;
		if (key == 13){
			e.preventDefault();
			eleTriggerObj.triggerHandler(eleTriggerEventStr);
		}
	});
}

function atom_setElementHover(eleObj){
	if (eleObj.attr('id').length > 0){
		eleObj.hover(function(){
			T_color = atom_convertRgbToHex(eleObj.css('background-color'));
			switch(T_color){
				case '<?php echo (D_BASECOLOR);?>':
					eleObj.css('background-color','<?php echo (D_BASEFOCUSCOLOR);?>');
				break;
				case '<?php echo (D_BASEFOCUSCOLOR);?>':
					eleObj.css('background-color','<?php echo (D_BASECOLOR);?>');
				break;
				case '<?php echo (D_BACKCOLOR);?>':
					eleObj.css('background-color','<?php echo (D_BACKFOCUSCOLOR);?>');
				break;
				case '<?php echo (D_BACKFOCUSCOLOR);?>':
					eleObj.css('background-color','<?php echo (D_BACKCOLOR);?>');
				break;
				default:
			}
		});
	}
}

function atom_checkInputBlank(checkObj,errorInputClass,errorContentObj,errorMsg){
	if ($.trim(checkObj.val()) == ''){
		checkObj.addClass(errorInputClass);
		errorContentObj.text(errorMsg);
		return 1;
	}else{
		checkObj.removeClass(errorInputClass);
		return 0;
	}
}

function atom_checkInputEqual(firstObj,secondObj,errorInputClass,errorContentObj,errorMsg){
	if (firstObj.val() == secondObj.val()){
		firstObj.removeClass(errorInputClass);
		secondObj.removeClass(errorInputClass);
		errorContentObj.text('');
		return 1;
	}else{
		firstObj.addClass(errorInputClass);
		secondObj.addClass(errorInputClass);
		errorContentObj.text(errorMsg);
		return 0;
	}
}

function atom_cancelErrorMsg(checkObj,errorContentObj){
	var T_i = 0;
	var T_str = '';
	checkObj.each(function(){
		T_str = $(this).val();
		T_str = $.trim(T_str);
		if (T_str == ''){
			T_i += 1;
		}
	});
	if (T_i == 0){
		errorContentObj.text('');
	}
}

function confirmBox(str){  
	str=str.replace(/\'/g,"'&chr(39)&'").replace(/\r\n/g,"'&VBCrLf&'");  
	execScript("n=msgbox('"+str+"',257,'Confirm Msgbox')","vbscript");  
	return(n == 1);  
}
<?php // var params = {'page':'device1','devsn':'io'}; ?>
function jsPost(urlStr, paramsJson){
	var form = document.createElement('form');
	form.setAttribute('method','post');
	form.setAttribute('action', url);

	for ( var i in params){
		var input = document.createElement('input');
		input.type = 'hidden';
		input.name = i;
		input.value = params[i];
		form.appendChild(input);
	}
	document.body.appendChild(form);
	form.submit();
	document.body.removeChild(form);
}

function atomTableDataToJson(tableObj) {
	if (tableObj.html()){
		var T_str = '';
		var T_int = 0;
		T_str += '[';
		tableObj.find("tr").each(function(){
			T_str += '{';
			T_int = 0;
			$(this).find("td").each(function(){
				T_str += '"' + T_int++ + '":"' + $(this).text() + '",';
			});
			T_str = T_str.substring(0, T_str.length - 1);
			T_str += '},';
		});
		T_str = T_str.substring(0, T_str.length - 1);
		T_str += ']';
		return T_str;
	}
}

function setCookie(name,value,days){
	var exp = new Date();
	exp.setTime(exp.getTime() + days*24*60*60*1000);
	document.cookie = name + '='+ escape (value) + ';expires=' + exp.toGMTString();
}

function getCookie(name){
	var arr = document.cookie.match(new RegExp('(^| )' + name + '=([^;]*)(;|$)'));
	if(arr != null){
		return unescape(arr[2]);
	}else{
		return null;
	}
}

function delCookie(name){
	var exp = new Date();
	exp.setTime(exp.getTime() - 1);
	var cval = getCookie(name);
	if(cval != null){document.cookie = name + '=' + cval + ';expires=' + exp.toGMTString()};
}

function atom_ajaxSyncQuery(dataStr,dataTypeStr){
	var result;
	$.ajax({
		data: dataStr,
		dataType: dataTypeStr,
		async: false,
		success: function(data){
			result = data;
		}
	});
	return result;
}