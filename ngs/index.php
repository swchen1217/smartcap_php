<?php
require("config.php");
$ngs = "";
if(isset($_GET["ngs"])){
    $ngs=$_GET["ngs"];
    $sql = "insert into ngs(ngs)values('".$ngs."')";
		mysqli_query($con,$sql);
		exit;
}
?>