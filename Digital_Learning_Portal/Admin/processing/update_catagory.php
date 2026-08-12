<?php
ob_start();
include("../../php_processing/db_connection.php");
$id=$_POST['txtid'];
$subject=$_POST['txtcatagory'];
$sql="Update tbl_catagory set categoryname='$subject' where id='$id'";
if(!mysqli_query($conn,$sql))
	{
		header('Location: ../admin_application.php?msg=' . mysqli_error($conn));
	}
else
	{
		header('Location: ../admin_application.php?msg="Save Successfully"');
	}
ob_flush();
?>