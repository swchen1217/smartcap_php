<?php
require("config.php");
define('TTF_DIR', './jpgraph/fonts/');
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
    
    $theme_class = new SoftyTheme;
    $graph->SetTheme($theme_class);

	$graph->SetMargin(45,45,20,20);
    $graph->title->SetFont(FF_BIG5);
	$graph->title->Set(mb_convert_encoding($user,"big5","utf-8").'姿勢不良率折線圖');
    $graph -> yaxis -> title -> SetFont ( FF_BIG5 );
    $graph -> xaxis -> title -> SetFont ( FF_BIG5 );
    $graph->xaxis->SetTitle('開始時間','high');
    $graph->yaxis->SetTitle('% 率良不勢姿','high');
    $graph->xaxis->SetTitlemargin(10);
    $graph->yaxis->SetTitlemargin(40);
	$graph->SetBox(false);

	$graph->yaxis->HideZeroLabel();
	$graph->yaxis->HideLine(false);
	$graph->yaxis->HideTicks(false,false);
	
	$data1 = array();
	$label = array();
	$idx = 0;
	$sql = "select starttime,usetime,ngtimes from mainlogtb where user = '".$user."'";
	$rs = mysqli_query($con,$sql);
	if(mysqli_num_rows($rs) == 0)
		exit;
	while(list($starttime,$usetime,$ngtimes)=mysqli_fetch_row($rs))
	{
		$label[$idx] = $starttime;
        $tmp=0;
        if($ngtimes!=0){
            $ngs_sum=0;
            $sql2 = "select ngsecond from slogtb where user = '".$user."' and starttime = '".$starttime."'";
            $rs2 = mysqli_query($con,$sql2);
            while(list($ngsecond)=mysqli_fetch_row($rs2))
            {
                $ngs_sum+=(float)$ngsecond;
            }
            $tmp=number_format(($ngs_sum*100/(int)$usetime),2);
        }
		$data1[$idx] = $tmp;
		$idx++;
	}
	for($i=1;$i<$idx-1;$i++)
		$label[$i] = ".";

	$graph->xaxis->SetTickLabels($label);
	$graph->ygrid->SetFill(false);

	$p1 = new LinePlot($data1);
	$graph->Add($p1);

	$p1->SetColor("#55bbdd");
	$p1->SetLegend('姿勢不良率');
	$p1->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
	$p1->mark->SetColor('#55bbdd');
	$p1->mark->SetFillColor('#55bbdd');
	$p1->SetCenter();
    $p1->SetWeight(4);
    $p1->value->SetFormat('%.2f');
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