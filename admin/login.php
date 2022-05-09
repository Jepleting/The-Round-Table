<?php
    session_start();
	
	include '../functions/db.php';

	$uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
	//$pwd = md5($password);

	$uname = mysqli_real_escape_string($con,$_POST['uname']);
    $pwd = mysqli_real_escape_string($con,$_POST['pwd']);

    $query = "SELECT * FROM tbladmin WHERE uname = '$uname' AND pwd = '$pwd'";
    $result = mysqli_query($con,$query) or die ("Verification error");
    $array = mysqli_fetch_array($result);
    
    if ($array['uname'] == $uname){
        $_SESSION['uname'] = $uname;
        header("Location: home.php");
    }
    
    else{
    	echo '<script language="javascript">';
        echo 'alert("Incorrect username or password")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=index.php" />';
    }


?>
