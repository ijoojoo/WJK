<?php
define('SCRIPT', 'huoqushangpinxinxi');
require '../inc/common.inc.php';


if(isset($_GET['shangpinxinxi'])){
	$shangpinxinxi=$_GET['shangpinxinxi'];
	$page_num=$_GET['page_num'];

	$page_row_num=10;
	$start_row;
	$end_row;
	$start_row=($page_num-1)*$page_row_num+1;
	$end_row=$page_num*$page_row_num;

	$query_zongtiaoshu="select count(*) as zongtiaoshu from spkfk a where a.spbh ='".$shangpinxinxi."' or a.sptm ='".$shangpinxinxi."' or a.spmch like'%".$shangpinxinxi."%' or a.shengccj like '%".$shangpinxinxi."%' or a.zjm like '%".$shangpinxinxi."%'";
	$query_jieguoji="select /*x.row_number,*/x.spbh,x.spmch,x.shpgg,x.dw,x.shengccj,round(x.lshj,2)lshj from (
	select row_number()over(order by a.spmch) as row_number,a.spbh,a.spmch,a.shpgg,a.dw,a.shengccj,a.lshj from spkfk a where a.spbh ='".$shangpinxinxi."' or a.sptm ='".$shangpinxinxi."' or a.spmch like'%".$shangpinxinxi."%' or a.shengccj like '%".$shangpinxinxi."%' or a.zjm like '%".$shangpinxinxi."%'
	)x where x.row_number between '".$start_row."'and '".$end_row."'";

	$zongtiaoshu=(int)query_value($query_zongtiaoshu,'zongtiaoshu');
	/*如果没有数据则当前页为0*/
	$zongyeshu=ceil($zongtiaoshu/$page_row_num);
	if($zongtiaoshu ==0){$page_num=0;$zongyeshu=0;}
	$array=query_array2($query_jieguoji);

	function array_to_table($arr){
		$tab="";
		$tab=$tab.'<table>';
		$tab=$tab.'<tr><th>商品编号</th><th>品名</th><th>规格</th><th>单位</th><th>生产企业</th><th>零售价</th></tr>';
		//$tab=$tab.'<caption></caption>';
		foreach ($arr as $row){
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
    $result['table']=array_to_table($array);

    echo json_encode($result);
}
?>