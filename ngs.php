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
if($user!="" && $starttime!=""){
    $sql = "select ngtime,ngsecond from slogtb where user = '".$user."' and starttime = '".$starttime."'";
		$rs = mysqli_query($con,$sql);
		if(mysqli_num_rows($rs) == 0)
			exit;
		echo $user."在".$starttime."的使用紀錄";
		echo "<table width='100%' align='center' bgcolor='black'>";
		echo "<tr bgcolor='#FFFFFF'><td>姿勢不良時間</td><td>至矯正經過時間(秒)</td></tr>";
        $ngs_sum=0;
		while(list($ngtime,$ngsecond)=mysqli_fetch_row($rs))
		{
			echo "<tr bgcolor='#FFFFFF'><td>".$ngtime."</td><td>".$ngsecond."</td></tr>";
            $ngs_sum+=(float)$ngsecond;
		}
        echo "</table><br>";
        $sql = "select usetime from mainlogtb where user = '".$user."' and starttime = '".$starttime."'";
        $rs = mysqli_query($con,$sql);
        list($usetime)=mysqli_fetch_row($rs);
        $tmp=number_format(($ngs_sum*100/(int)$usetime),2);
        echo '<font color="blue">本次使用時間共<b>'.(int)$usetime."</b>秒,姿勢不良時間共<b>".$ngs_sum."</b>秒,姿勢不良時間佔使用時間的<b>".$tmp."%</b>,這次的表現:</font>";
        $str="";
        $tmp<=50?($tmp<=15?($str='<font color="green">非常棒</font>'):($str='<font color="orange">還不錯</font>')):($str='<font color="red">待加強</font>');
        $str="<b>".$str."</b>";
        echo $str;
//}
?>
<br>
<img src="./ngslinechart.php?user=<?php echo $user;?>&starttime=<?php echo $starttime;?>">
<?php
}
?>
</center>