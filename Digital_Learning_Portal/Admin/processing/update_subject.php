<?php
ob_start();
include("../../php_processing/db_connection.php");
$id=$_POST['txtid'];
$subject=$_POST['txtsubject'];
$sql="Select subject from tblsubject where subject='$subject'";
$result=$conn->query($sql);
if($result->num_rows>0)
	{
		header('Location: ../admin_application.php?msg="Found Duplicate"');
	}
else
	{
		$sql="Update tblsubject set subject='$subject' where subjectid='$id'";
		if(!mysqli_query($conn,$sql))
			{
				header('Location: ../admin_application.php?msg=' . mysqli_error($conn));
			}
		else
			{
				header('Location: ../admin_application.php?msg="Update Successfully"');
			}
	}
ob_flush();
?>