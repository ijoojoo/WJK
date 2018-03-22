<?php
define('SCRIPT','guanyu');
require 'inc/common.inc.php';
/*判断是否登录，未登录跳转到登录*/
if(!is_login()){
    header('Location:yonghudenglu.php');
}
?>

<html>
<head>
<?php require 'inc/link.inc.php';?>
<title><?php echo $GLOBALS['gongsijiancheng'].$GLOBALS['xitongmingcheng'];?>--关于</title>
</head>
<body>
<?php require 'inc/header.inc.php';?>
<?php require 'inc/daohangtiao.php';?>
<div id="content">
    <div id="guanyu">
        <p title="<?php echo $GLOBALS['xitongjieshao'];?>"><?php if(mb_strlen($GLOBALS['xitongjieshao'])>100){ echo mb_substr($GLOBALS['xitongjieshao'],0,100,"utf-8").'...';}else{ echo $GLOBALS['xitongjieshao'];}?></p>
        <ul>
            <li><?php echo $GLOBALS['gongsiquancheng'] ; ?></li>
            <li>&nbsp;版权所有&copy;2017-2020</li>
            <li><a href="<?php echo $GLOBALS['gongsiwangzhi']; ?>" target="_blank"><?php echo $GLOBALS['gongsiwangzhi'] ; ?></a></li>
            <li><a tel=""><?php echo $GLOBALS['gongsidianhua'] ; ?></a></li>
            <li></li>
        </ul>
        <div id="gongsizhaopian"><img src="images/logo.png"></div>
    </div>
</div>
<?php require 'inc/footer.inc.php';?>
</body>
</html>