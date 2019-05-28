<?php
require("config.php");
define('TTF_DIR', './jpgraph/fonts/');
include('jpgraph/jpgraph.php');
include('jpgraph/jpgraph_bar.php');
$color=array("a","1","7","b","2","c","4","d","5","0","e","3","8","f","6","9");
$user = "";
if(isset($_GET["user"]))
	$user=$_GET["user"];

if($user != "")
{
	// Setup the graph
	$graph = new Graph(600,400);
	$graph->SetScale("textlin");
    
    $theme_class = new SoftyTheme;
    $graph->SetTheme($theme_class);

    $graph->SetMargin(45,10,20,20);
	$graph->title->SetFont(FF_BIG5);
	$graph->title->Set(mb_convert_encoding($user,"big5","utf-8").'與其他使用者比較長條圖');
    $graph -> yaxis -> title -> SetFont ( FF_BIG5 );
    $graph -> xaxis -> title -> SetFont ( FF_BIG5 );
    $graph->xaxis->SetTitle('次數','high');
    $graph->yaxis->SetTitle('s  間時示警均平','high');
    $graph->xaxis->SetTitlemargin(10);
    $graph->yaxis->SetTitlemargin(35);
	$graph->SetBox(false);

	$graph->yaxis->HideZeroLabel();
	$graph->yaxis->HideLine(false);
	$graph->yaxis->HideTicks(false,false);
	
	$label = array();
	$data1 = array();
	$i = 0;
	$groupbar = array();
	$idx = 0;
	
	$sql = "select user,starttime,usetime,ngtimes from mainlogtb where user = '".$user."'";
	$rs = mysqli_query($con,$sql);
	if(mysqli_num_rows($rs) == 0)
		exit;
	while(list($uu,$start,$usetime,$ngtime)=mysqli_fetch_row($rs))
	{
		$label[$i] = $i+1;
		$data1[$i] = $usetime/($ngtime==0?1:$ngtime);
		$i++;
	}
	$b1plot = new BarPlot($data1);
    //$b1plot->value->Show();
	$b1plot->SetLegend(mb_convert_encoding($user,"big5","utf-8").'的平均警示時間');
	$b1plot->SetColor("white");
	$b1plot->SetFillColor("#cc1111");
    /*$b1plot->value->SetFormat('%d');
    $b1plot->value->Show();
    $b1plot->value->SetColor('black');
    $b1plot->value->SetMargin(8);*/
	$groupbar[$idx] = $b1plot;
	
	$sql = "select user from mainlogtb where user <> '".$user."' group by user";
	$rs = mysqli_query($con,$sql);
	while(list($uu)=mysqli_fetch_row($rs))
	{
		$sql = "select starttime,usetime,ngtimes from mainlogtb where user = '".$uu."'";
		$rs2 = mysqli_query($con,$sql);
		$i = 0;
		$data1 = array();
		$idx++;
		while(list($start,$usetime,$ngtime)=mysqli_fetch_row($rs2))
		{
			$label[$i] = $i+1;
			$data1[$i] = $usetime/($ngtime==0?1:$ngtime);
			$i++;
		}
		$b1plot = new BarPlot($data1);	
		$b1plot->SetLegend(mb_convert_encoding($uu,"big5","utf-8").'的平均警示時間');
		$b1plot->SetColor("white");
		$b1plot->SetFillColor("#".$color[(($idx)%16)].$color[(($idx)%16)].$color[(($idx*7)%16)].$color[(($idx*7)%16)].$color[(($idx*5)%16)].$color[(($idx*5)%16)]);
		$groupbar[$idx] = $b1plot;
	}
	
	$graph->xaxis->SetTickLabels($label);
	$graph->ygrid->SetFill(false);

	// Create the grouped bar plot
	$gbplot = new GroupBarPlot($groupbar);
	$graph->Add($gbplot);
	
	$graph->legend->SetFont(FF_BIG5);
	$graph->legend->SetFrameWeight(1);
	$graph->legend->SetColor('#4E4E4E','#00A78A');
	$graph->legend->SetMarkAbsSize(8);
    $graph->legend->SetPos(0,0,'right','top');
    $graph->legend->SetLayout(LEGEND_VERT);


	// Output line
	$graph->Stroke();
}
?>