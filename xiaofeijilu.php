<?php
/*项目：万家康大药房会员营销系统*/
/*本页介绍：*/
/*日期：2017年8月15日*/
/*作者：Administrator*/	
define('SCRIPT', 'xiaofeijilu');
require 'inc/common.inc.php';
?>
<html>
<head>
<?php require 'inc/link.inc.php';?>
<title><?php echo $GLOBALS['gongsijiancheng'].$GLOBALS['xitongmingcheng'];?>--消费记录</title>
<script type="text/javascript" src="js/xiaofeijilu.js"></script>
</head>
<body>
<?php require 'inc/header.inc.php';?>
<?php require 'inc/daohangtiao.php';?>
<div id="content">
    <div id="chaxundiv">
        <table>
            <tr>
                <td>会员卡号：</td>
                <td><input type="text" id="huiyuankahao" class="input" required="required" placeholder="请输入会员卡号或手机号！" value="610201"></td>
            </tr>
            <tr>
                <td>开始日期：</td>
                <td><input type="date" id="kaishiriqi" class="input" required="required" value="<?php 
                    echo date("Y-m-d",strtotime("-6 Month")); ?>"></td>
            </tr>
            <tr>
                <td>结束日期：</td>
                <td><input type="date" id="jiesuriqi" class="input" required="required" value="<?php echo date('Y-m-d',time()); ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="button" id="chaxun" class="chaxun" value="查询"></td>
            </tr>
        </table>
    </div>
    <div id="jieguoji">
        <!--里面放入ajax获取到的table*/-->
    </div>
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