<script>
var a=confirm("确定要退出吗？");
if(a==false){
	history.back();
}
</script>
<?php
	setcookie('yonghuming','',time()-1);
	setcookie('xingming','',time()-1);
	header('Location:index.php');
?>