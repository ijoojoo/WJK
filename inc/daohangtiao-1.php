
<div id="daohangtiao">
    <ul>
        <li><a href="index.php">系统主页</a></li>
        <li><a href="">用户中心·<?php echo $_COOKIE['xingming'];?></a></li>
        <li><a href="">会员管理</a></li>
        <li><a href="">会员查询</a></li>
        <li><a href="">商品查询</a></li>
        <li><a onclick="tuichudenglu()">退出登录</a></li>
    </ul>
</div>
<script>
function tuichudenglu(){
	var a=confirm("确定要退出吗？");
	if(a==true){
		window.location.href="tuichudenglu.php";
		}
}
</script>
