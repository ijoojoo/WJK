<?php
/*项目：万家康大药房会员营销系统*/
/*本页介绍：*/
/*日期：2017年8月15日*/
/*作者：Administrator*/	
define('SCRIPT', 'test2');
require 'inc/common.inc.php';
?>
<html>
<head>
<?php require 'inc/link.inc.php';?>
<script>
function ajax_test(){
	alert("AJAX开始");
	var ajax=new XMLHttpRequest();
	ajax.onreadystatechanged=function(){
		if(ajax.readyState==4&&ajax.status=200){
			alert("dfff");}
	}
	ajax.open("GET","test3.php",true);
	ajax.send();
}

</script>
<title>TEST2</title>
</head>
<body>
<button type="button" onclick="ajax_test()">请求数据</button>
</body>