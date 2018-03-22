<?php
header("Content-type: text/html; charset=utf-8");
require 'inc/common.func.php';
$serverName = "116.196.84.163"; //数据库服务器地址
$uid = "sa"; //数据库用户名
$pwd = "Liuzhiyong1989"; //数据库密码
$connectionInfo = array("UID"=>$uid, "PWD"=>$pwd, "Database"=>"test");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn == false)
{
    echo "连接失败！";
    die( print_r( sqlsrv_errors(), true));
}else{
    echo "连接成功！";  
}
$resouce = sqlsrv_query($GLOBALS['conn'], $query);
$query = sqlsrv_query($conn, "select * from spkfk");
while(!!$row = sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC))
{
    $row=GB2312_to_UTF8($row);
    print_r($row);
}

?>