<?php
/*项目：万家康大药房会员营销系统*/
/*本页介绍：*/
/*日期：2017年8月15日*/
/*作者：Administrator*/	
define('SCRIPT', 'huiyuanxinxi');
require 'inc/common.inc.php';
?>
<html>
<head>
<?php require 'inc/link.inc.php';?>
<title><?php echo $GLOBALS['gongsijiancheng'].$GLOBALS['xitongmingcheng'];?>--会员信息</title>
<script type="text/javascript" src="js/huiyuanxinxi.js"></script>
</head>
<body>
<?php require 'inc/header.inc.php';?>
<?php require 'inc/daohangtiao.php';?>
<div id="content">
    <div id="chaxundiv">
        <ul>
            <li><input type="text" id="huiyuanxinxi" name="huiyuanxinxi" required="required" placeholder="在这里输入会员卡号或手机号!"></li>
            <li><input type="button" id="chaxunanniu" name="chaxunanniu" value="查询"></li>
        </ul>
    </div>
    <div id="huiyuanxinxidiv">
        <table>
            <tr>
                <td class="column0">姓名：</td>
                <td id="xingming" class="column1"></td>
                <td class="column2">卡号：</td>
                <td id="kahao" class="column3"></td>
                <td class="column4" rowspan="3"><img id="touxiang" src="images/touxiang.png"/></td>
            </tr>
            <tr>
                <td>手机：</td>
                <td id="shouji"></td>
                <td>性别：</td>
                <td id="xingbie"></td>
            </tr>
            <tr>
                <td>积分：</td>
                <td id="jifen" colspan="3"></td>
            </tr>
            <tr>
                <td>住址：</td>
                <td id="zhuzhi" colspan="4"></td>
            </tr>
            <tr>
                <td>等级：</td>
                <td id="dengji" colspan="4"></td>
            </tr>
            <tr>
                <td>标签：</td>
                <td id="biaoqian" colspan="4"></td>
            </tr>
        </table>
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