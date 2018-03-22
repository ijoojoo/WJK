<?php
include_once('../connect/connect.php');

$page = intval($_POST['pageNum']);

$result = mysql_query("select id from news");
$total = mysql_num_rows($result);//总记录数

$pageSize = 6; //每页显示数
$totalPage = ceil($total/$pageSize); //总页数

$startPage = $page*$pageSize;
$arr['total'] = $total;
$arr['pageSize'] = $pageSize;
$arr['totalPage'] = $totalPage;
$query = mysql_query("select id,title,content,date from news order by id desc limit $startPage,$pageSize");
while($row=mysql_fetch_array($query)){
     $arr['list'][] = array(
        'id' => $row['id'],
        'title' => $row['title'],
        'content' => $row['content'],
        'date' => date("Y-m-d H:i:s",$row['date'])
     );
}
//print_r($arr);
echo json_encode($arr);
?>