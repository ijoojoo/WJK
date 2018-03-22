<?php
	/*项目名称：万家康大药房会员管理系统*/
	/*作    者：Administrator*/
	/*日    期：2017年8月18日*/
	/*session_start();*/
	define('SCRIPT', 'yonghudenglu');
	require 'inc/common.inc.php';
	
	/*判断是否已经登录，是跳转到主页*/
	if(is_login()){
		/**/
	    header('Location:index.php');
	}
	if(isset($_POST['denglu'])&&isset($_POST['yonghuming'])&&isset($_POST['mima'])){
	    $yonghuming = trim($_POST['yonghuming']);
	    $mima = trim($_POST['mima']);
	    $zidongdenglu = ($_POST['zidongdenglu']);
	    
	    if(mb_strlen($yonghuming)==0||mb_strlen($mima)==0){
	        alert_back('用户名或密码不能为空！');
	    }
	    /*判断用户名密码是否正确*/
	    $query_yonghuming="select count(*) num from zhiydoc where dzycode='".$yonghuming."'";
	    $query_mima="select count(*) num from zhiydoc where dzycode='".$yonghuming."' and kl='".$mima."'";
	    $num_yonghuming=0;$num_mima=0;
	    if(query_value($query_yonghuming,'num')>0){
	        if(query_value($query_mima, 'num')>=0){
	            /*登陆成功，*/
	            /*查询用户姓名*/
	            $query_xingming="select dzyname as xingming from zhiydoc where dzycode='".$yonghuming."'";
	            $xingming = query_value($query_xingming, 'xingming');
	            if($zidongdenglu>0){
	                $remeber_time=7*24*60*60;
	                setcookie('yonghuming' , $yonghuming , time()+$remeber_time);
	                setcookie('xingming' , $xingming , time()+$remeber_time);
	            }else{
	                setcookie('yonghuming',$yonghuming, time()+$remeber_time);
	                setcookie('xingming',$xingming, time()+$remeber_time);
	            }
	            header('Location:index.php');
	        }
	        else{
	            alert('密码错误！');
	        }
	    }
	    else{
	        alert('用户名不存在！'.$yonghuming);
	    } 
	}
?>

<html>
<head>
<?php require 'inc/link.inc.php';?>
<title><?php echo $GLOBALS['gongsijiancheng'].$GLOBALS['xitongmingcheng'];?>--用户登录</title>
<script type="text/javascript" src="js/yonghudenglu.js"></script>
</head>
<body>
<?php require 'inc/header.inc.php';?>
<div id="content">
	<div id="denglukuang">
	<form method="post" action="yonghudenglu.php">
	    <table>
	        <tr>
	            <td class="wenbenkuang">用 户 名：</td>
	            <td><input type="text" id="yonghuming" name="yonghuming" class="shurukuang" required="required" placeholder="在这里输入用户名！"></td>
	        </tr>
	         <tr>
	         	<td></td>
	            <td class="xingming"><label id="xingming"></label></td>
	        </tr>
	        <tr>
	            <td class="wenbenkuang">密　　码：</td>
	            <td><input type="password" id="mima" name="mima" class="shurukuang" required="required" placeholder="在这里输入密码！"></td>
	        </tr>
	        <tr>
	            <td colspan="2"><input type="submit" id="denglu" name="denglu" class="denglu" value="登录"></td>
	        </tr>
	        <tr>
	        	<td></td>
	            <td><input type="checkbox" name="zidongdenglu" class="zidongdenglu" value="1" checked="checked">
	            <label class="zidongdenglu" for="zidongdenglu">下次自动登录</label></td>
	        </tr>
	    </table>
	</form>
	</div>
</div>
<?php require 'inc/footer.inc.php';?>
</body>
</html>