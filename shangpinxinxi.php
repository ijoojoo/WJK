<?php
/*项目：万家康大药房会员营销系统*/
/*本页介绍：主页*/
/*日期：2017年8月15日*/
/*作者：Administrator*/
define('SCRIPT','shangpinxinxi');
require 'inc/common.inc.php';

/*判断是否登录，未登录跳转到登录*/
if(!is_login()){
    header('Location:yonghudenglu.php');
}
?>
<html>
<head>
<?php require 'inc/link.inc.php';?>
<title><?php echo $GLOBALS['gongsijiancheng'].$GLOBALS['xitongmingcheng'];?>--主页</title>
<script type="text/javascript" src="js/shangpinxinxi.js"></script>
</head>
<body>
<?php require 'inc/header.inc.php';?>
<?php require 'inc/daohangtiao.php';?>
<div id="content">
    <div id="chaxundiv">
    	<ul>
    		<li><input type="text" id="shangpinxinxi" name="shangpinxinxi" required="required" placeholder="在这里输入商品完整的编码、条码或部分品名、助记码！"></li>
    		<li><input type="button" id="chaxunanniu" name="chaxunanniu" value="查询"></li>
    	</ul>
    </div>
    <div id="jieguodiv"></div>
    <div id="yema">
        <ul>
            <li><a id="shouye" href="javascript:void(0);">首页</a></li>
            <li><a id="shangyiye" href="javascript:void(0);">上一页</a></li>
            <li>第<span id="dangqianyeshu">0</span>/<span id="zongyeshu">0</span>页，共<span id="zongtiaoshu">0</span>条</li>
            <li><a id="xiayiye" href="javascript:void(0);">下一页</a></li>
            <li><a id="weiye" href="javascript:void(0);">尾页</a></li>
        </ul>
    </div>
</div>
<?php require 'inc/footer.inc.php';?>
</body>
</html>