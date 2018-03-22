<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');


$ydata = array(11,3,8,12,5,1,9,13,5,7);
$y2data = array(354,200,265,99,111,91,198,225,293,251);

// Create the graph and specify the scale for both Y-axis
$graph = new Graph(600,300);
$graph->clearTheme();
$graph->SetScale('textlin');
$graph->SetY2Scale('lin');
$graph->SetShadow();

// Adjust the margin
$graph->img->SetMargin(50,100,50,50);

// Create the two linear plot
$lineplot=new LinePlot($ydata);
$lineplot2=new LinePlot($y2data);

// Add the plot to the graph
$graph->Add($lineplot);
$graph->AddY2($lineplot2);
$lineplot2->SetColor('orange');
$lineplot2->SetWeight(2);

// Adjust the axis color
$graph->y2axis->SetColor('orange');
$graph->yaxis->SetColor('blue');

$graph->title->Set('中文');
$graph->xaxis->title->Set('哈哈');
$graph->yaxis->title->Set('Y-呵呵');
/*
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
*/
$graph->title->SetFont(FF_SIMSUN,FS_BOLD);
$graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD);
$graph->xaxis->title->SetFont(FF_SIMSUN,FS_BOLD);
// Set the colors for the plots
$lineplot->SetColor('blue');
$lineplot->SetWeight(2);
$lineplot2->SetColor('orange');
$lineplot2->SetWeight(2);

// Set the legends for the plots
$lineplot->SetLegend('Plot 1');
$lineplot2->SetLegend('Plot 2');

// Adjust the legend position
$graph->legend->Pos(0.05,0.5,'right','center');

// Display the graph
$graph->Stroke();
?>
