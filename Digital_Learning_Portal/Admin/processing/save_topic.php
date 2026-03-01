<?php
ob_start();
include("../../php_processing/db_connection.php");
$category=$_POST['cmbcategory'];
$level=$_POST['cmblevel'];
$subject=$_POST['cmbsubject'];
$content_topic=$_POST['txttopic'];
$sql="Select levelid from tbltopic where categoryid='$category' and subjectid='$subject' and levelid='$level' and content_topic='$content_topic'";
$result=$conn->query($sql);
if($result->num_rows>0)
	{
		header('Location: ../admin_application.php?msg="Duplicate Subject"');
	}
else
	{
		$sql="Insert into tbltopic(categoryid,levelid,subjectid,content_topic) values('$category','$level','$subject','$content_topic')";
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