<?php
/*项目：万家康大药房会员营销系统*/
/*本页介绍：*/
/*日期：2017年8月15日*/
/*作者：Administrator*/	
define('SCRIPT', 'huiyuanbanli');
require 'inc/common.inc.php';
?>
<html>
<head>
<?php require 'inc/link.inc.php';?>
<title><?php echo $GLOBALS['gongsijiancheng'].$GLOBALS['xitongmingcheng'];?>--会员办理</title>
<script type="text/javascript" src=""></script>
</head>
<body>
<?php require 'inc/header.inc.php';?>
<?php require 'inc/daohangtiao.php';?>
<div id="content">
	<div id="huiyuanbanli">
	<form>
		<ul>
			<li>卡　　号</li>
			<li><input type="text" name="kahao" required="required" /></li>
			<li>姓　　名</li>
			<li><input type="text" name="kahao" required="required" /></li>
			<li>性　　别：<select><option>男</option><option>女</option></select></li>
			<li>手 机 号</li>
			<li><input type="text" name="kahao" required="required" /></li>
			<li>照　　片<input type="file" accept="image/*" capture="camera"/></li>
			<li><input type="submit" id="tijiao" name="tijiao" value="提交"></li>
		</ul>
	</form>
	</div>
</div>
<?php require 'inc/footer.inc.php';?>
</body>
</html>