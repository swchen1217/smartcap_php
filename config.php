<?php
date_default_timezone_set('Asia/Taipei');
$mysql_host = "localhost";
$mysql_user = "swc";
$mysql_pass = "chen1217";
$mysql_db   = "smartcap";
$con = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);
if (!$con) 
	//die("連接錯誤: " . iconv('gbk', 'utf-8//IGNORE', mysqli_connect_error())); 
	die("連接錯誤"); 
else
	echo("伺服器連線成功");
mysqli_query($con,"set names utf8");
?>