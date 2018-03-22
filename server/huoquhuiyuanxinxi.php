<?php
define('SCRIPT', 'huoquhuiyuanxinxi');
require '../inc/common.inc.php';


if(isset($_GET['huiyuanxinxi'])){
	$huiyuanxinxi=$_GET['huiyuanxinxi'];
	$page_num=$_GET['page_num'];

	$page_row_num=1;
	$start_row;
	$end_row;
	$start_row=($page_num-1)*$page_row_num+1;
	$end_row=$page_num*$page_row_num;

	$query_zongtiaoshu="select count(*)as zongtiaoshu from ret_cuxiaoka where kkhcode='".$huiyuanxinxi."' or shouji='".$huiyuanxinxi."' or xingming like'%".$huiyuanxinxi."%' or zjm like'%".$huiyuanxinxi."%'";

	$query_jieguoji="select  x.xingming,x.kahao,x.shouji,x.xingbie,x.zhuzhi,x.beizhu as dengji,x.biaoqian,x.touxiang,x.jifen from (
select row_number()over(order by kkhcode) row_number, kkhcode as kahao,xingming,shouji,'女'as xingbie,jifen,'美国洛杉矶'as zhuzhi,'哈哈' as beizhu,'糖尿病|慢病'as biaoqian,'images\\touxiang.png'as touxiang from ret_cuxiaoka where kkhcode='".$huiyuanxinxi."' or shouji='".$huiyuanxinxi."' or xingming like'%".$huiyuanxinxi."%' or zjm like'%".$huiyuanxinxi."%'
)x where x.row_number between '".$start_row."'and '".$end_row."'";

	$zongtiaoshu=(int)query_value($query_zongtiaoshu,'zongtiaoshu');
	/*如果没有数据则当前页为0*/
	$zongyeshu=ceil($zongtiaoshu/$page_row_num);

	/*开始处理返回值*/
	$result=Array();
	$array=query_array($query_jieguoji);
	if($zongtiaoshu ==0){
		$page_num=0;$zongyeshu=0;
	}else{
		
		$result['xingming']=$array['xingming'];
	    $result['kahao']=$array['kahao'];
	    $result['shouji']=$array['shouji'];
	    $result['xingbie']=$array['xingbie'];
	    $result['zhuzhi']=$array['zhuzhi'];
	    $result['dengji']=$array['dengji'];
	    $result['biaoqian']=$array['biaoqian'];
	    $result['touxiang']=$array['touxiang'];
	    $result['jifen']=$array['jifen'];
	}

	$result['dangqianyeshu']=$page_num;
	$result['zongyeshu']=$zongyeshu;
	$result['zongtiaoshu']=$zongtiaoshu;

    echo json_encode($result);
}
?>