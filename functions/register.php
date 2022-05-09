<?php
include "db.php";

extract($_POST);

	$fname = str_replace("'","`",$fname); 
	$fname = mysqli_real_escape_string($con,$fname);
	
	$lname = str_replace("'","`",$lname); 
	$lname = mysqli_real_escape_string($con,$lname); 
	        
	$username = str_replace("'","`",$username); 
	$username = mysqli_real_escape_string($con,$username); 

	$password = str_replace("'","`",$password); 
	$password = mysqli_real_escape_string($con,$password);
	$password = md5($password);

$sql = "INSERT INTO `tbluser`(`fname`, `lname`, `gender`) VALUES ('$fname','$lname','$gender')";
$result = mysqli_query($con,$sql);

 if($result)
	{
		$a = mysqli_query($con,"SELECT * FROM `tbluser` WHERE `fname` = '$fname' ");
		$aa = mysqli_fetch_array($a);
		
		if($a)
		{
			$aaa = $aa['user_Id'];
			$sql = "INSERT INTO `tblaccount`(`username`, `password`, `user_Id`) VALUES('$username','$password',$aaa)";
			$res = mysqli_query($con,$sql);
			
			if($res==true)
                            {
                                   echo '<script language="javascript">';
                                    echo 'alert("Successfully Registered")';
                                    echo '</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=../index.php" />';
                            }

		}
			
		
	}




?>