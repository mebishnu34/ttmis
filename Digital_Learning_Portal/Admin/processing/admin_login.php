<?php
echo "Hello";
ob_start();
session_start();
include("db_connection.php");
$lname=$_POST['txtlname'];
$pass=$_POST['txtpass'];
$sql="Select uname,utype from tbluser where loginname='$lname' and upass='$pass'";
$result = $conn_1->query($sql);
if ($result->num_rows > 0)
   {
    if($data = $result->fetch_assoc())
        {
			$_SESSION['Admin']=$lname;
			$_SESSION['fname']=$data["uname"];
			$_SESSION['utype']=$data["utype"];
			header('Location: ../admin_application.php');
		}
	}
else
	{
        //echo $lname;
        //echo $pass;
	header('Location: ../../admin_login.php?msg="Invalid Login Name or Password"');
	}
?>