<?php
date_default_timezone_set('Asia/Taipei');
$mysql_host = "localhost";
$mysql_user = "swc";
$mysql_pass = "chen1217";
$mysql_db   = "smartcap";
$mysql_con = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);
if (!$mysql_con) 
	echo("連接錯誤: " . mysqli_connect_error()); 
else
	echo("伺服器連線成功");
mysqli_query($mysql_con,"set names utf8");
?>