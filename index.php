<?php
require("config.php"); //包含設定檔

?>
<center>
<?php
if(isset($_GET["del"]) && $_GET["del"] == "true") //如果網址有傳入del變數且這個變數的值為true
{
	$sql = "delete from logtb";     //將logtb清空
	mysql_query($sql);				//執行上面的指令
	exit;							//結束程式
}
$user = "";
if(isset($_GET["user"]))		    //如果網址有傳入user變數就存放到$user變數中
	$user=$_GET["user"];
$usetime = "";
if(isset($_GET["usetime"]))			//如果網址有傳入usetime變數就存放到$usetime變數中(使用的時間)
	$usetime=$_GET["usetime"];
$ngtime = "";
if(isset($_GET["ngtime"]))			//如果網址有傳入ngtime變數就存放到$ngtime變數中(低頭的次數)
	$ngtime=$_GET["ngtime"];

if($user != "")
{
	if($usetime != "" && $ngtime != "" && $usetime < 36000)  //使用時間小於36000秒才為有效資料
	{
		$sql = "insert into logtb(user,start,usetime,ngtime)values('".$user."','".date("Y-m-d H:i:s",time()-$usetime)."','".$usetime."','".$ngtime."')";
		mysql_query($sql);         //將使用紀錄塞進資料表
		exit;
	}
	else		//沒有傳入使用時間表示是要看紀錄
	{
		$sql = "select user,start,usetime,ngtime from logtb where user = '".$user."'";  //選取自己的使用紀錄
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) == 0)   //完全沒有紀錄就離開程式
			exit;
		echo $user."的使用紀錄列表";     //畫出使用紀錄的表格
		echo "<table width='100%' align='center' bgcolor='black'>";
		echo "<tr bgcolor='#FFFFFF'><td>使用時間</td><td>使用者</td><td>計時(時:分:秒)</td><td>警示次數</td><td>平均警示時間</td></tr>";
		while(list($uu,$start,$usetime,$ngtime)=mysql_fetch_row($rs))
		{
			$s = $usetime%60;
			$t = ($usetime-$s)/60;
			$m = $t%60;
			$h = ($t-$m)/60;
			echo "<tr bgcolor='#FFFFFF'><td>".$start."</td><td>".$uu."</td><td>".$h.":".$m.":".$s."</td><td>".$ngtime."</td><td>".($ngtime==0?"---":intval($usetime/$ngtime))."</td></tr>";
		}
		echo "</table>";
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
