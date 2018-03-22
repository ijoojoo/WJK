<?php
/*项目：万家康大药房会员营销系统*/
/*本页介绍：主页*/
/*日期：2017年8月15日*/
/*作者：Administrator*/
define('SCRIPT','404');
require 'inc/common.inc.php';

/*判断是否登录，未登录跳转到登录*/
if(!is_login()){
    header('Location:yonghudenglu.php');
}
?>
<html>
<head>
<?php require 'inc/link.inc.php';?>
<title><?php echo $GLOBALS['gongsijiancheng'].$GLOBALS['xitongmingcheng'];?>--404</title>
</head>
<body>
<?php require 'inc/header.inc.php';?>
<?php require 'inc/daohangtiao.php';?>
<div id="content">
    <div id="wenzi">
    	<p>404<br/> 您要的页面没有找到！<br/>回首页吧！</p>
    </div>
</div>
<?php require 'inc/footer.inc.php';?>
</body>
</html>