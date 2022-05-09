<?php
include "../functions/db.php";
 				
extract($_POST);
$sql = "INSERT INTO `categories` VALUES ('$cat','$desc')";
$res = mysqli_query($con,$sql);

header("Location:category.php");


?>