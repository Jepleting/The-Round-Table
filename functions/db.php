<?php
$host = "localhost";
$user = "root";
$pwd  = "";
$db   = "roundtable";

$con = mysqli_connect($host,$user,$pwd) or die("Could not connect");
mysqli_select_db($con,$db) or die("No database");

?>
