<?php
ob_start();
include("../../php_processing/db_connection.php");
$category=$_POST['cmbcategory'];
$level=$_POST['cmblevel'];
$subject=$_POST['cmbsubject'];
$topic=$_POST['cmbtopic'];
$link=$_POST['reflink'];
$url=$_POST['refurl'];
$sql="Select link from tbl_hyperlink where referenceurl='$url'";
$result=$conn->query($sql);
if($result->num_rows>0)
	{
		header('Location: ../admin_application.php?msg="Duplicate Subject"');
	}
else
	{
		$sql="Insert into tbl_hyperlink(categoryid, levelid, subjectid,topicid, link,referenceurl,remark) values('$category','$level','$subject', '$topic','$link','$url','Ok')";
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