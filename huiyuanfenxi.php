<?php
/*项目：万家康大药房会员营销系统*/
/*本页介绍：*/
/*日期：2017年8月15日*/
/*作者：Administrator*/	
define('SCRIPT', 'huiyuanfenxi');
require 'inc/common.inc.php';
?>
<html>
<head>
<?php require 'inc/link.inc.php';?>
<title><?php echo $GLOBALS['gongsijiancheng'].$GLOBALS['xitongmingcheng'];?>--会员分析</title>
</head>
<body>
<?php require 'inc/header.inc.php';?>
<?php require 'inc/daohangtiao.php';?>
<div id="content">
	<div id="chaxun">
		<input type="text" name="shuruxinxi" class="shurukuang" placeholder="请输入会员卡号或手机号！"/>
		<input type="button" class="anniu" value="查询"/>
	</div>
    <div id="xiaofeifenbu">
        <img alt="消费分布" src="inc/xiaofeifenbu.php">
    </div>
    <div id="xiaofeiquxian">
    	<img alt="消费曲线" src="inc/xiaofeiquxian.php">
    </div>
</div>
<?php require 'inc/footer.inc.php';?>
</body>
</html>