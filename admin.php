<?php

define( 'HTTPROOT', dirname(__FILE__) );

require_once (HTTPROOT.'/lib/config_const.php');
require_once (HTTPROOT.'/lib/lib_login.php');
require_once (HTTPROOT.'/lib/atom_basefunc.php');
require_once (HTTPROOT.'/lib/lib_inc.php');

?>

<?php

inc_html_header();

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cvvnx1's blog - admin</title>
<link rel="stylesheet" type="text/css" href="<?php echo D_BASELINK;?>css/css_base.php" />
<link rel="stylesheet" type="text/css" href="<?php echo D_BASELINK;?>css/css_frame.php" />
<link rel="stylesheet" type="text/css" href="<?php echo D_BASELINK;?>css/css_admin.php" />
<script type="text/javascript" src="<?php echo D_BASELINK;?>js/jquery.min.js"></script>
<!--[if (gte IE 6)&(lte IE 8)]>
  <script type="text/javascript" src="http://www.cvvnx1.com/js/selectivizr.min.js"></script>
  <noscript><link rel="stylesheet" href="<?php echo D_BASELINK;?>css/css_frame.php" /></noscript>
<![endif]-->
<script type="text/javascript">
$(document).ready(function(){

  appendFrame('admin');
  submitContent('<?php echo D_BASELINK;?>lib/contentproc.php');

  var maxnum = 999;
  var num = 0;

  $(window).scroll(function(){  
    if( $(window).scrollTop() >= ( $(document).height() - $(window).height() ) && num != maxnum){
      appendFrame('admin');
      num++;
    }
  });

});

function appendFrame(appendMethod){
  switch(appendMethod){
  case 'admin':
    getFrameInfo('<?php echo D_BASELINK;?>lib/frameproc.php',$("div#left_div"),'divlength=' + $(".content").size() + '&pagetype=admin');
    $("div#left_div").find('.content:odd').addClass('oddframebg');
    $("div#left_div").find('.content:even').addClass('evenframebg');
    break;
  case 'index':
    getFrameInfo('<?php echo D_BASELINK;?>lib/frameproc.php',$("div#left_div"),'divlength=' + $(".content").size() + '&pagetype=index');
    $("div#left_div").find('.content:odd').addClass('oddframebg');
    $("div#left_div").find('.content:even').addClass('evenframebg');
    break;
  }
}

function getFrameInfo(handlePage,appendObj,inputData){
  $.ajax({
    type: 'POST',
    async: true,
    contentType: 'application/x-www-form-urlencoded; charset=utf-8',
    url: handlePage,
    data: inputData,
    dataType: 'text',
    success:function(returnData){
      //appendObj.append(returnData);
      $(returnData).appendTo(appendObj);
      $('.admin_modify').unbind();
      $('.admin_delete').unbind();
      contentModify();
      contentDelete();
    },
    error:function(){
      window.location.reload();
    }
  });
}

function submitContent(handlePage){
  $('#submit_button').click(function(){
      $.ajax({
        type: 'POST',
        async: false,
        contentType: 'application/x-www-form-urlencoded; charset=utf-8',
        url: handlePage,
        data: $('#updatesubmit').serialize(),
        dataType: 'text',
        success:function(returnData){
		  alert(returnData);
          window.location.reload();
        },
        error:function(){
          window.location.reload();
        }
      });
  });
}

function deleteContent(handlePage,inputData){
  $.ajax({
    type: 'POST',
    async: false,
    contentType: 'application/x-www-form-urlencoded; charset=utf-8',
    url: handlePage,
    data: inputData,
    dataType: 'text',
    success:function(returnData){
      window.location.reload();
    },
    error:function(){
      window.location.reload();
    }
  });
}

function contentModify(){
  $('.admin_modify').click(function(){
    $('#input_title').val($(this).parent().parent().parent().find('.content_title').text());
    $('#input_content').val($(this).parent().parent().parent().find('.content_text').text());
    $('#input_author').val($(this).parent().parent().parent().find('.content_author').text());
    $('#input_time').val($(this).parent().parent().parent().find('.content_time').text());
  });
}

function contentDelete(){
  $('.admin_delete').click(function(){
    if ( confirm('Are you sure to delete it?') ){
      deleteContent('<?php echo D_BASELINK;?>lib/contentproc.php','deltitle=' + $(this).parent().parent().parent().find('.content_title').text() + '&deltime=' + $(this).parent().parent().parent().find('.content_time').text() + '&delauthor=' + $(this).parent().parent().parent().find('.content_author').text());
    }
  });
}

</script>
</head>
<body style="background-color:#CCCCCC;">
<?php

if ( login_refresh($_COOKIE['userid'], md5($_COOKIE['userid'].$_SERVER["REMOTE_ADDR"])) ){
  admin_main();
}else{
  atom_redirectPage("index.html");
}

function admin_main(){
//  echo "test";
}
?>
<div class="main_div" id="main_div">
<table width="1100px">
<form id="updatesubmit">
<tr>
  <td>
    <div class="left_div" id="left_div">
      <div class="updatecontent" id="updatecontent">
      <table>
        <tr>
          <td colspan="2"><div class="submit_title">Add new form</div></td>
        </tr>
        <tr>
          <td colspan="2"><hr /></td>
        </tr>
        <tr>
          <td colspan="2"><div class="submit_input_title">Title&nbsp;:&nbsp;<input type="text" id="input_title" name="title" class="input_title" /></div></td>
        </tr>
        <tr>
          <td colspan="2"><div class="submit_content"><br /><textarea wrap="virtual" id="input_content" name="content" class="input_content" /></textarea></div></td>
        </tr>
        <tr>
          <td colspan="2">
		  <input type="hidden" id="input_author" name="author" value="<?php echo $_COOKIE['userid']; ?>" />
		  <input type="hidden" id="input_time" name="time" value="" />
		  <div class="submit_button" id="submit_button" /><span class="submit_button_span">提&nbsp;&nbsp;交</span></div>
		  </td>
        </tr>
        <tr>
          <td colspan="2"><hr /></td>
        </tr>
	  </table>
      </div>
    </div>
  </td>
  <td>

    <div class="right_div" id="right_div">
      
    </div>
  </td>
</tr>
</form>
</table>
</div>

<div class="copyright_div" id="copyright_div">
<p>Power by <a href=\"mailto:cvvnx1@163.com\">cvvnx1</a> &#169; 2013</p>
</div>
</body>
</html>
