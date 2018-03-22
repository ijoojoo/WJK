<?php
define('SCRIPT', 'huoquxiaofeijilu');
require '../inc/common.inc.php';


if(isset($_GET['kaishiriqi'])&&isset($_GET['jiesuriqi'])&&isset($_GET['huiyuankahao'])&&isset($_GET['page_num'])){
	$kaishiriqi=$_GET['kaishiriqi'];
	$jiesuriqi=$_GET['jiesuriqi'];
	$huiyuankahao=$_GET['huiyuankahao'];
	$page_num=$_GET['page_num'];

	$page_row_num=10;
	$start_row;
	$end_row;
	$start_row=($page_num-1)*$page_row_num+1;
	$end_row=$page_num*$page_row_num;

	$query_zongtiaoshu="select count(*) as zongtiaoshu 
from retmxls a
left join spkfk b on a.spid=b.spid
inner join ret_cuxiaoka c on a.cardid=c.cardid
where a.rq between '".$kaishiriqi."' and '".$jiesuriqi."'
and c.kkhcode='".$huiyuankahao."'";

	$query_jieguoji="select /*x.row_number,*/x.rq,x.pm,x.sl,x.je from (
	select row_number()over(order by a.rq) as row_number, substring(a.rq,6,5) rq,b.spbh+'|'+b.spmch+'|'+b.shpgg+'|'+substring(b.shpchd,0,6) pm,convert(varchar(10),a.shl) sl,round(a.sshje,2) je
from retmxls a
left join spkfk b on a.spid=b.spid
inner join ret_cuxiaoka c on a.cardid=c.cardid
where a.rq between '".$kaishiriqi."' and '".$jiesuriqi."'
and c.kkhcode='".$huiyuankahao."'
)x where x.row_number between '".$start_row."'and '".$end_row."'
";
	$zongtiaoshu=(int)query_value($query_zongtiaoshu,'zongtiaoshu');
	/*如果没有数据则当前页为0*/
	if($zongtiaoshu ==0){$page_num=0;$zongyeshu=0;}
	$zongyeshu=ceil($zongtiaoshu/$page_row_num);

	function array_to_table($arr){
		$tab="";
		$tab=$tab.'<table>';
		$tab=$tab.'<tr><th>日期</th><th>商品</th><th>数量</th><th>金额</th></tr>';
		//$tab=$tab.'<caption></caption>';
		foreach($arr as $row) {
	        $tab=$tab."<tr>";
	        foreach($row as $index=>$value){
	            $tab=$tab.'<td class="column_'.$index.'">'.$value.'</td>';
	        }
	        $tab=$tab.'</tr>';
	    }
	    $tab=$tab.'</table>';
		return $tab;
	 }

	$result=Array();
	$result['dangqianyeshu']=$page_num;
	$result['zongyeshu']=$zongyeshu;
	$result['zongtiaoshu']=$zongtiaoshu;
    $array=query_array2($query_jieguoji,null);
    $result['table']=array_to_table($array);

    
    echo json_encode($result);
}
?>