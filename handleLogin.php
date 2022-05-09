<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	include'dbconnect.php';
	$username = $_POST['loginUsername'];
	$pass = $_POST['loginPass'];

	$sql = "SELECT * FROM `users` WHERE user_name = '$username'";
	$result = mysqli_query($conn,$sql);
	$numRows = mysqli_num_rows($result);
	if($numRows==1){
		$row = mysqli_fetch_assoc($result);
		if(password_verify($pass, $row['user_pass'])){
			session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION['sno'] = $row['sno'];
			$_SESSION['username'] = $username;
			echo "logged in". $username;
				
			}

		header("Location:index.php");
	}
}

?>