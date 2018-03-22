<?php
date_default_timezone_set('Asia/Shanghai');
/**
 * 获取会员的消费分布
 */

require_once ("jpgraph/jpgraph.php");
require_once ("jpgraph/jpgraph_pie.php");
require_once ("jpgraph/jpgraph_pie3d.php");
 
$data = array(10.5,100,200.58,58.8,38.5,1028.58);
 
$graph = new PieGraph(500,500);
$graph->SetShadow();

$graph->title->Set("测试");
$graph->title->SetFont(FF_SIMSUN,FS_BOLD);
 
$pieplot = new PiePlot3D($data);  //创建PiePlot3D对象
$pieplot->SetCenter(0.5,0.5); //设置饼图中心的位置
$legend=Array('一月','二月','三月','四月','五月','六月');
/*$pieplot->SetLegends($gDateLocale->GetShortMonth()); //设置图例*/
$pieplot->SetLegends($legend); //设置图例

$graph->Add($pieplot);
$graph->Stroke();
?>