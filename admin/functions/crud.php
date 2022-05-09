<?php
include "functions.php";

$action = $_POST['action'];

switch($action){
	case "deleteuser":
	$user_name= $_POST['signupUsername'];
	deleteuser($user_name);
	break;
}




?>