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
		echo "<tr bgcolor='#FFFFFF'><td>姿勢不良時間</td><td>至矯正經過時間</td></tr>";
		while(list($ngtime,$ngsecond)=mysqli_fetch_row($rs))
		{
			echo "<tr bgcolor='#FFFFFF'><td>".$ngtime."</td><td>".$ngsecond."</td></tr>";
		}
        echo "</table>";
}
?>
</center>