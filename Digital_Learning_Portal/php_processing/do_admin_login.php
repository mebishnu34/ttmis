<?php
ob_start();
session_start();
include("db_connection.php");
$lname=$_POST['txtlname'];
$pass=$_POST['txtpass'];
$sql1="Select uname, utype from tbladmin where loginname='$lname' and upass='$pass'";
$result = $conn->query($sql1);
if($result->num_rows > 0)
   {
   		if($row1=$result->fetch_assoc())
			{
				$_SESSION['memlname']=$lname;
				$_SESSION['username']=$row1["uname"];		
                $_SESSION['usertype']=$row1["utype"];		
				header('Location: ../Admin/admin_application.php');
			}
	}
else
	{
		header('Location: ../admin_login.php?msg="Invalid Login Name or Password"');
	}
?>
