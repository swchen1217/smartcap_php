<?php
date_default_timezone_set('Asia/Taipei');
function connect_db($host,$user,$pass,$db)
{	
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($db,$link);
	mysql_query("set names utf8");
	return $link;
}
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "nisc27978831";
$mysql_db   = "smartcapdb";
$mysql_link = connect_db($mysql_host,$mysql_user,$mysql_pass,$mysql_db);
?>