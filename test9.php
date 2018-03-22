<?php
/*test9.php*/
define('SCRIPT', 'daohangtiao');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link rel="stylesheet" type="text/css" href="css/<?php echo SCRIPT; ?>.css"/>
<title>测试标题</title>
<script type="text/javascript" src="js/test9.js"></script>
</head>
<body>
<?php 
for($i=0;$i<10000;$i++){
	echo '啊啊啊';
}
?>
<?php require'inc/daohangtiao1.php'; ?>
</body>
</html>