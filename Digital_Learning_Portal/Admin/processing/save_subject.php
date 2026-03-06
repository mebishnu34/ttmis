<?php
ob_start();
include("../../php_processing/db_connection.php");
$subject=$_POST['txtsubject'];
$sql="Select subject from tblsubject where subjectname='$subject'";
$result=$conn->query($sql);
if($result->num_rows>0)
	{
		header('Location: ../admin_application.php?msg="Found Duplicate"');
	}
else
	{
		$sql="Insert into tblsubject(subject) values('$subject')";
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