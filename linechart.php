<?php
require("config.php");
define('TTF_DIR', './jpgraph/fonts/');
include('jpgraph/jpgraph.php');
include('jpgraph/jpgraph_line.php');
include('jpgraph/jpgraph_bar.php');

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

	$graph->SetMargin(45,45,20,20);
    $graph->title->SetFont(FF_BIG5);
	$graph->title->Set(mb_convert_encoding($user,"big5","utf-8").'����ĵ�ܮɶ���u��');
    $graph -> yaxis -> title -> SetFont ( FF_BIG5 );
    $graph -> xaxis -> title -> SetFont ( FF_BIG5 );
    $graph->xaxis->SetTitle('�����ɶ�','high');
    $graph->yaxis->SetTitle('�� ���ɥ�ĵ����','high');
    $graph->xaxis->SetTitlemargin(10);
    $graph->yaxis->SetTitlemargin(35);
	$graph->SetBox(false);

	$graph->yaxis->HideZeroLabel(); 
	$graph->yaxis->HideLine(false);
	$graph->yaxis->HideTicks(false,false);
	
	$data1 = array();
	$label = array();
	$idx = 0;
	$sql = "select user,starttime,usetime,ngtimes from mainlogtb where user = '".$user."'";
	$rs = mysqli_query($con,$sql);
	if(mysqli_num_rows($rs) == 0)
		exit;
	while(list($uu,$start,$usetime,$ngtime)=mysqli_fetch_row($rs))
	{
		$label[$idx] = $start;
		//$data1[$idx] = $usetime/($ngtime==0?1:$ngtime);
		$data1[$idx] = ($ngtime==0?0:($usetime)/$ngtime);
		$idx++;
	}
	for($i=1;$i<$idx-1;$i++)
		$label[$i] = ".";

	$graph->xaxis->SetTickLabels($label);
	$graph->ygrid->SetFill(false);
    
    /*if($idx<2){
        $b1 = new BarPlot($data1);
        $graph->Add($b1);
        
        $b1->SetLegend(mb_convert_encoding($user,"big5","utf-8"));
        $b1->SetColor("white");
        $b1->SetFillColor("#164fb6");
        
        $b1->value->SetFormat('%d');
        $b1->value->SetColor('black');
        $b1->value->SetMargin(8);
        $b1->value->SetAlign("");
        //$b1->value->Show();
        
        
    }else{
        $p1 = new LinePlot($data1);
        $graph->Add($p1);

        $p1->SetColor("#164fb6");
        $p1->SetLegend('����ĵ�ܮɶ�');
        $p1->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
        $p1->mark->SetColor('#164fb6');
        $p1->mark->SetFillColor('#164fb6');
        $p1->SetCenter();
        $p1->SetWeight(4);
        $p1->value->SetFormat('%d');
        $p1->value->Show();
        $p1->value->SetColor('black');
        $p1->value->SetMargin(8);
        
    }*/

	$p1 = new LinePlot($data1);
	$graph->Add($p1);

	$p1->SetColor("#164fb6");
	$p1->SetLegend('����ĵ�ܮɶ�');
	$p1->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
	$p1->mark->SetColor('#164fb6');
	$p1->mark->SetFillColor('#164fb6');
	$p1->SetCenter();
    $p1->SetWeight(4);
    $p1->value->SetFormat('%d');
    $p1->value->Show();
    $p1->value->SetColor('black');
    $p1->value->SetMargin(8);

	$graph->legend->SetFont(FF_BIG5);
	$graph->legend->SetFrameWeight(1);
	$graph->legend->SetColor('#4E4E4E','#00A78A');
	$graph->legend->SetMarkAbsSize(8);
    $graph->legend->SetPos(0.01,0.01,'right','top');


	// Output line
	$graph->Stroke();
}
?>