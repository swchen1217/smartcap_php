<?php
require("config.ini.php");
define('TTF_DIR', './jpgraph/');
include('jpgraph/jpgraph.php');
include('jpgraph/jpgraph_line.php');

$user = "";
if(isset($_GET["user"]))
	$user=$_GET["user"];

if($user != "")
{
	// Setup the graph
	$graph = new Graph(600,400);
	$graph->SetScale("textlin");

	$graph->title->SetFont(FF_BIG5);
	$graph->title->Set(mb_convert_encoding($user,"big5","utf-8").'使用狀況折線圖');
	$graph->SetBox(false);

	$graph->yaxis->HideZeroLabel();
	$graph->yaxis->HideLine(false);
	$graph->yaxis->HideTicks(false,false);
	
	$data1 = array();
	$label = array();
	$idx = 0;
	$sql = "select user,start,usetime,ngtime from logtb where user = '".$user."'";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) == 0)
		exit;
	while(list($uu,$start,$usetime,$ngtime)=mysql_fetch_row($rs))
	{
		$label[$idx] = $start;
		$data1[$idx] = $usetime/($ngtime==0?1:$ngtime);
		$idx++;
	}
	for($i=1;$i<$idx-1;$i++)
		$label[$i] = ".";

	$graph->xaxis->SetTickLabels($label);
	$graph->ygrid->SetFill(false);

	$p1 = new LinePlot($data1);
	$graph->Add($p1);


	$p1->SetColor("#55bbdd");
	$p1->SetLegend('平均警示時間');
	$p1->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
	$p1->mark->SetColor('#55bbdd');
	$p1->mark->SetFillColor('#55bbdd');
	$p1->SetCenter();

	$graph->legend->SetFont(FF_BIG5);
	$graph->legend->SetFrameWeight(1);
	$graph->legend->SetColor('#4E4E4E','#00A78A');
	$graph->legend->SetMarkAbsSize(8);


	// Output line
	$graph->Stroke();
}
?>