<?php
require("config.php");
?>
<center>
<?php
$user = "";
if(isset($_GET["user"]))
	$user=$_GET["user"];
$starttime = "";
if(isset($_GET["starttime"]))
	$starttime=$_GET["starttime"];
$usetime = "";
if(isset($_GET["usetime"]))
	$usetime=$_GET["usetime"];
$ngtimes = "";
if(isset($_GET["ngtimes"]))
	$ngtimes=$_GET["ngtimes"];
$ngtime = "";
if(isset($_GET["ngtime"]))
	$ngtime=$_GET["ngtime"];
$ngsecond = "";
if(isset($_GET["ngsecond"]))
	$ngsecond=$_GET["ngsecond"];
if(isset($_GET["del"]) && $_GET["del"] == "true")
{
	$sql = "delete from mainlogtb";
	mysqli_query($con,$sql);
    $sql = "delete from slogtb";
	mysqli_query($con,$sql);
	exit;
}
if($user!=""){
    if($starttime!=""){
        if($usetime!="" && $ngtimes!="" && $usetime > 0){
            $sql = "insert into mainlogtb(user,starttime,usetime,ngtimes)values('".$user."','".$starttime."','".$usetime."','".$ngtimes."')";
            mysqli_query($con,$sql);
            exit;
        }
        else if($ngtime!="" && $ngsecond!=""){
            $sql = "insert into slogtb(user,starttime,ngtime,ngsecond)values('".$user."','".$starttime."','".$ngtime."','".($ngsecond/1000)."')";
            mysqli_query($con,$sql);
            exit;
        }
    }
    else{
        $sql = "select starttime,usetime,ngtimes from mainlogtb where user = '".$user."'";
		$rs = mysqli_query($con,$sql);
		if(mysqli_num_rows($rs) == 0)
			exit;
		echo $user."的使用紀錄列表";
		echo "<table width='100%' align='center' bgcolor='black'>";
		echo "<tr bgcolor='#FFFFFF'><td>開始時間</td><td>計時(時:分:秒)</td><td>警示次數</td><td>平均警示時間(秒/1次)</td><td>姿勢不良時間加總(時:分:秒)</td><td>姿勢不良率(%)</td><td>表現評分</td><td>單次使用警示狀況</td></tr>";
		while(list($starttime2,$usetime2,$ngtimes2)=mysqli_fetch_row($rs))
		{
			$s = $usetime2%60;
			$t = ($usetime2-$s)/60;
			$m = $t%60;
			$h = ($t-$m)/60;
            $tmp=0;
            if($ngtimes2!=0){
                $ngs_sum=0;
                $sql = "select ngsecond from slogtb where user = '".$user."' and starttime = '".$starttime2."'";
                $rs2 = mysqli_query($con,$sql);
                while(list($ngsecond2)=mysqli_fetch_row($rs2))
                {
                    $ngs_sum+=(float)$ngsecond2;
                }
                $s2 = intval($ngs_sum)%60;
                $t2 = (intval($ngs_sum)-$s2)/60;
                $m2 = $t2%60;
                $h2 = ($t2-$m2)/60;
                $tmp=number_format(($ngs_sum*100/(int)$usetime2),2);
            }
            $str="";
            $tmp<=50?($tmp<=30?($tmp<=15?($str='<font color="blue">非常棒</font>'):($str='<font color="green">還可以</font>')):($str='<font color="orange">須注意</font>')):($str='<font color="red">待加強</font>');
            $str="<b>".$str."</b>";
			echo "<tr bgcolor='#FFFFFF'><td>".$starttime2."</td><td>".$h.":".$m.":".$s."</td><td>".$ngtimes2."</td><td>".($ngtimes2==0?"-":intval($usetime2/$ngtimes2))."</td><td>".($ngtimes2==0?"-":($h2.":".$m2.":".$s2.".".substr(number_format(($ngs_sum-intval($ngs_sum)),3),2)))."</td><td>".$tmp."%</td><td>".$str."</td><td>".($ngtimes2==0?'-':("<a href=".'"'."./ngs.php?user=".$user."&starttime=".$starttime2.'"'.">單次使用紀錄</a>"))."</td></tr>";
		}
        echo "</table>";
	//}
}
?>
<br>
<img src="./linechart.php?user=<?php echo $user;?>">
<br><br>
<img src="./barchart.php?user=<?php echo $user;?>">
<br><br>
<img src="./ngratelinechart.php?user=<?php echo $user;?>">
<?php
      }
?>
</center>