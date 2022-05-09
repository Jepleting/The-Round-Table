<?php


function dbcon(){
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$db = "roundtable";

	$con = mysqli_connect($host,$user,$pwd) or die ("ERROR Connecting to Database");

	$sel = mysqli_select_db($db);
}

function dbclose(){
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$db = "roundtable";

	$con = mysqli_connect($host,$user,$pwd) or die ("ERROR Connecting to Database");

	$sel = mysqli_select_db($con,$db);

	mysqli_close($con);
}

function deleteuser($user_Id){
	dbcon();
	$sel = mysqli_query($con,"DELETE from tbluser where user_Id='$user_Id' ");

	if($sel==true){
		$del = mysqli_query($con,"DELETE from tblacct where user_Id='$user_Id' ");
			echo "success";
		
	}
	else{
		echo "failed";
	}

	dbclose();
}

function category(){
	dbcon();
	$sel = mysqli_query($con,"SELECT * from category");

	if($sel==true){
		while($row=mysqli_fetch_assoc($sel)){
			extract($row);
			echo '<option value='.$cat_id.'>'.$category.'</option>';
		}
	}


	dbclose();
}

?>