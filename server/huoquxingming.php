<?php
define('SCRIPT', 'huoquxingming');
require '../inc/common.inc.php';

if(isset($_GET['yonghuming'])){
	$yonghuming=$_GET['yonghuming'];
	$query="select top 1 dzyname from zhiydoc where dzycode='".$yonghuming."'";
	$xingming=query_value($query,'dzyname');
	if(!is_null($xingming)){
		echo $xingming;
	}
}
?>