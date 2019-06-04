<?php
require("config.php");
define('TTF_DIR', './jpgraph/fonts/');
include('jpgraph/jpgraph.php');
include('jpgraph/jpgraph_bar.php');
include('jpgraph/jpgraph_line.php');
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
	$graph->title->Set(mb_convert_encoding($user,"big5","utf-8").'平均警示時間與其他使用者比較長條圖');
    $graph -> yaxis -> title -> SetFont ( FF_BIG5 );
    $graph -> xaxis -> title -> SetFont ( FF_BIG5 );
    $graph->xaxis->SetTitle('次數(第n次)','high');
    $graph->yaxis->SetTitle('秒 間時示警均平','high');
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
    
    $data=array(array());
    $user_list=array();
    
    $sql = "SELECT `user` FROM `mainlogtb` group by `user`";
	$rs = mysqli_query($con,$sql);
	if(mysqli_num_rows($rs) == 0)
		exit;
    $n=0;
    while(list($user_in)=mysqli_fetch_row($rs)){
        $user_list[$n]=$user_in;
        $n++;
    }

    $sql2 = "select user,starttime,usetime,ngtimes from mainlogtb where user = '".$user."'";
    $rs2 = mysqli_query($con,$sql2);
    if(mysqli_num_rows($rs2) == 0)
        exit;
    if(mysqli_num_rows($rs2)>1){
        while(list($uu,$start,$usetime,$ngtime)=mysqli_fetch_row($rs2))
        {
            $label[$i] = $i+1;
            $i++;
        }
        for($k=0;$k<mysqli_num_rows($rs);$k++){
            $sql3 = "select user,starttime,usetime,ngtimes from mainlogtb where user = '".$user_list[$k]."'";
            $rs3 = mysqli_query($con,$sql3);
            if(mysqli_num_rows($rs3) == 0)
                exit;
            $m=0;
            while(list($uu,$start,$usetime,$ngtime)=mysqli_fetch_row($rs3)){
                if($m+1>$i)
                    break;
                $data[$k][$m]=($ngtime==0?0:($usetime)/$ngtime);
                $m++;
            }
        }
        for($j=0;$j<mysqli_num_rows($rs);$j++){
            $p[$j] = new LinePlot($data[$j]);
            $graph->Add($p[$j]);
            $p[$j]->SetColor("#".$color[(($j)%16)].$color[(($j)%16)].$color[(($j*7)%16)].$color[(($j*7)%16)].$color[(($j*5)%16)].$color[(($j*5)%16)]);
            $p[$j]->SetLegend(mb_convert_encoding($user_list[$j],"big5","utf-8"));
            $p[$j]->mark->SetType(MARK_FILLEDCIRCLE,'',1);
            $p[$j]->mark->SetColor('#164fb6');
            $p[$j]->mark->SetFillColor('black');
            $p[$j]->SetCenter();
            $p[$j]->SetWeight(4);
            $p[$j]->value->SetFormat('%d');
            $p[$j]->value->Show();
            $p[$j]->value->SetColor('black');
            $p[$j]->value->SetMargin(5);
        }
    }else{
        $m=0;
        while(list($uu,$start,$usetime,$ngtime)=mysqli_fetch_row($rs2)){
        $label[$i] = $i+1;
        $data[0][$m]=($ngtime==0?0:($usetime)/$ngtime);
        $i++;
        $m++;
        $b1plot = new BarPlot($data[0]);
        $b1plot->SetLegend(mb_convert_encoding($user,"big5","utf-8"));
        $b1plot->SetColor("white");
        $b1plot->SetFillColor("#cc1111");
        $groupbar[$idx] = $b1plot;
        $sql = "select user from mainlogtb where user <> '".$user."' group by user";
        $rs = mysqli_query($con,$sql);
        while(list($uu)=mysqli_fetch_row($rs)){
            $sql4 = "select starttime,usetime,ngtimes from mainlogtb where user = '".$uu."'";
            $rs4 = mysqli_query($con,$sql4);
            $i = 0;
            $data1 = array();
            $idx++;
            while(list($start,$usetime,$ngtime)=mysqli_fetch_row($rs4))
            {
                $label[$i] = $i+1;
                $data1[$i] = ($ngtime==0?0:($usetime)/$ngtime);
                $i++;
            }
            $b1plot = new BarPlot($data1);	
            $b1plot->SetLegend(mb_convert_encoding($uu,"big5","utf-8"));
            $b1plot->SetColor("white");
            $b1plot->SetFillColor("#".$color[(($idx)%16)].$color[(($idx)%16)].$color[(($idx*7)%16)].$color[(($idx*7)%16)].$color[(($idx*5)%16)].$color[(($idx*5)%16)]);
            $groupbar[$idx] = $b1plot;
            }
        }
        $gbplot = new GroupBarPlot($groupbar);
        $graph->Add($gbplot);
    }
	
	$graph->legend->SetFont(FF_BIG5);
	$graph->legend->SetFrameWeight(1);
	$graph->legend->SetColor('#4E4E4E','#00A78A');
	$graph->legend->SetMarkAbsSize(8);
    $graph->legend->SetLineWeight(5);
    $graph->legend->SetPos(0.01,0.01,'right','top');
    $graph->legend->SetLayout(LEGEND_VERT);


	// Output line
	$graph->Stroke();
}
?>