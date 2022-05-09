<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"]=="POST"){ 
	include'dbconnect.php';
	$user_name = $_POST['signupUsername'];
	$user_email = $_POST['signupEmail'];
	$pass = $_POST['signupPassword'];
	$cpass = $_POST['signupcPassword'];

	//check whether username exists
	$existSql = "SELECT * FROM `users` WHERE user_name = '$user_name'";
	$result = mysqli_query($conn,$existSql);
	$numRows = mysqli_num_rows($result);
	if($numRows>0){
		$showError = "This username already exists";
	}
	else{ 
		if($pass == $cpass){
		$hash = password_hash($pass,PASSWORD_DEFAULT);
	    $sql = "INSERT INTO `users` (`user_name`,`user_email`, `user_pass`, `timestamp`) VALUES ('$user_name','$user_email', '$hash', current_timestamp())";
	    $result = mysqli_query($conn,$sql);   
	    if($result){
	    	$showAlert = true;
	    	header("Location:index.php?signupsuccess=true");
	    	    exit();

	    }


	}
    else{
    	$showError = "Passwords do not match";
    	
        }

    }
    header("Location:index.php?signupsuccess=false&error=$showError");

}

?>