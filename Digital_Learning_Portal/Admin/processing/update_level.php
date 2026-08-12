<?php
ob_start();
include("../../php_processing/db_connection.php");
$id=$_POST['txtid'];
$subject=$_POST['txtlevel'];
$sql="Select levelname from tbllevel where levelname='$subject'";
$result=$conn->query($sql);
if($result->num_rows>0)
	{
		header('Location: ../admin_application.php?msg="Found Duplicate"');
	}
else
	{
		$sql="Update tbllevel set levelname='$subject' where levelid='$id'";
		if(!mysqli_query($conn,$sql))
			{
				header('Location: ../admin_application.php?msg=' . mysqli_error($conn));
			}
		else
			{
				header('Location: ../admin_application.php?msg="Save Successfully"');
			}
	}
ob_flush();
?>