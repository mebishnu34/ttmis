<?php
ob_start();
session_start();
include("../database/db_connection.php");
$lname=$_POST['txtlname'];
$pass=$_POST['txtpass'];
$sql="Select fname, lname,type from tbluser where lname='$lname' and password='$pass'";
$result = $conn_1->query($sql);
if ($result->num_rows > 0)
   {
    if($data = $result->fetch_assoc())
        {
			$_SESSION['Admin']=$lname;
			$_SESSION['fname']=$data["fname"];
			$_SESSION['utype']=$data["type"];
			header('Location: ../Admin/index.php');
		}
	}
else
	{
	header('Location: ../Admin/login.php?msg="Invalid Login Name or Password"');
	}
?>