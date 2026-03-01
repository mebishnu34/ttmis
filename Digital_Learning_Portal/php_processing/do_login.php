<?php
ob_start();
session_start();
include("db_connection.php");
$lname=$_POST['txtlname'];
$pass=$_POST['txtpass'];
$sql1="Select username from tbl_user where loginname='$lname' and password='$pass'";
$result = $conn->query($sql1);
if($result->num_rows > 0)
   {
   		if($row1=$result->fetch_assoc())
			{
				$_SESSION['memlname']=$lname;
				$_SESSION['username']=$row1["username"];		
				header('Location: ../user_application.php');
			}
	}
else
	{
		header('Location: ../index.php?msg="Invalid Login Name or Password"');
	}
?>
