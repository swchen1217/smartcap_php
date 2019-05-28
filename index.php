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
            $sql = "insert into slogtb(user,starttime,ngtime,ngsecond)values('".$user."','".$starttime."','".$ngtime."','".$ngsecond."')";
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
		echo "<tr bgcolor='#FFFFFF'><td>開始時間</td><td>計時(時:分:秒)</td><td>警示次數</td><td>平均警示時間</td><td>單次使用警示狀況</td></tr>";
		while(list($starttime2,$usetime2,$ngtimes2)=mysqli_fetch_row($rs))
		{
			$s = $usetime2%60;
			$t = ($usetime2-$s)/60;
			$m = $t%60;
			$h = ($t-$m)/60;
			echo "<tr bgcolor='#FFFFFF'><td>".$starttime2."</td><td>".$h.":".$m.":".$s."</td><td>".$ngtimes2."</td><td>".($ngtimes2==0?"-":intval($usetime2/$ngtimes2))."</td><td>".($ngtimes2==0?'-':("<a href=".'"'."./ngslinechart.php?user=".$user."&starttime=".$starttime2.'"'.">折線圖</a>"))."</td></tr>";
		}
        echo "</table>";
	//}
}
?>
<br>
<img src="./linechart.php?user=<?php echo $user;?>"> <!--畫出折線圖-->
<br><br>
<img src="./barchart.php?user=<?php echo $user;?>">  <!--畫出直方圖-->
<?php
      }
?>
</center>