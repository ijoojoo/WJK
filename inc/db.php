<?php
define('DB_SERVER', '123.160.95.32,11066');
define('DB_USER', 'sa');
define('DB_PASSWORD', 'wjk2016');
define('DB_DATABASE', 'ksoa');
$db_connectinfo = array("UID" => DB_USER,"PWD" => DB_PASSWORD,"Database" => DB_DATABASE);

/* 初始化连接，获得链接资源 */
$conn = sqlsrv_connect(DB_SERVER, $db_connectinfo) or die(print_r(sqlsrv_errors(), true));


/*数据库操作函数 */
/*只要第一行*/
function query_array($query)
{
    $query=UTF8_to_GB2312($query);
    $resource = sqlsrv_query($GLOBALS['conn'], $query);
    
    $row = sqlsrv_fetch_array($resource,SQLSRV_FETCH_ASSOC);
    $row = GB2312_to_UTF8($row);
   /*释放资源*/
   /*关闭连接，释放资源*/
    /*sqlsrv_close($conn);*/
    return $row;
}

/*二维数组*/
function query_array2($query)
{
    $result=Array();
    $query=UTF8_to_GB2312($query);
    $resource = sqlsrv_query($GLOBALS['conn'], $query);
    
    while (!!$row = sqlsrv_fetch_array($resource,SQLSRV_FETCH_ASSOC)) {
        $row = GB2312_to_UTF8($row);
        $result[]=$row;
    }
   /*释放资源*/
   /*关闭连接，释放资源*/
    /*sqlsrv_close($conn);*/
    return $result;
}

/*
 * 执行语句返回<table>标记
 */
 function query_value($query,$index){
     $return=null;
     $query=UTF8_to_GB2312($query);
     $resource = sqlsrv_query($GLOBALS['conn'], $query);
     if(!!$row = sqlsrv_fetch_array($resource,SQLSRV_FETCH_ASSOC)){
         $return= $row[$index];
         $return=GB2312_to_UTF8($return);
     }
    /*sqlsrv_close($conn);*/
     return $return;
 }

function query_table($query, $caption = null)
{
    echo '<table>';
    if ($caption != null) {
        echo '<caption>' . $caption . '</caption>';
    }
    $query=UTF8_to_GB2312($query);
    $result = sqlsrv_query($GLOBALS['conn'], $query);
    if (!sqlsrv_num_rows($result)) {
        while (! ! $row = sqlsrv_fetch_array($result,SQLSRV_FETCH_NUMERIC)) {
            echo "<tr>";
            /*
            foreach ($row as $data) {
                $data=GB2312_to_UTF8($data);
                echo '<td class="lie">' . $data . '</td>';
            }
            */
            for($i=0;$i<count($row);$i++){
                $data=GB2312_to_UTF8($row[$i]);
                echo '<td class="lie'.$i.'">'.$data.'</td>';
            }

            echo '</tr>';
        }
    }
    else{
        alert_back('没有数据');
    }
    /*sqlsrv_close($conn);*/
    echo '</table>';
}

function query_get_table($query, $caption = null)
{
    $ret="";
    $ret=$ret.'<table>';
    if ($caption != null) {
        $ret=$ret.'<caption>' . $caption . '</caption>';
    }
    $query=UTF8_to_GB2312($query);
    $result = sqlsrv_query($GLOBALS['conn'], $query);
    if (!sqlsrv_num_rows($result)) {
        while (! ! $row = sqlsrv_fetch_array($result,SQLSRV_FETCH_NUMERIC)) {
            $ret=$ret."<tr>";
            /*
            foreach ($row as $data) {
                $data=GB2312_to_UTF8($data);
                echo '<td class="lie">' . $data . '</td>';
            }
            */
            for($i=0;$i<count($row);$i++){
                $data=GB2312_to_UTF8($row[$i]);
                $ret=$ret.'<td class="lie'.$i.'">'.$data.'</td>';
            }
            $ret=$ret.'</tr>';
        }
    }
    else{
        alert_back('没有数据');
    }
    /*sqlsrv_close($conn);*/
    $ret=$ret. '</table>';
    return $ret;
}
?>