<?php
ob_start();
include("../../php_processing/db_connection.php");
$level=$_POST['txtlevel'];
$sql="Select levelname from tbllevel where levelname='$level'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
	{
		header('Location: ../admin_application.php?msg="Duplicate Subject"');
	}
else
	{
		$sql="Insert into tbllevel(levelname) values('$level')";
		if (mysqli_query($conn, $sql))
			{
				header('Location: ../admin_application.php?msg="Save Successfully"');
			}
		else
			{
				header('Location: ../admin_application.php?msg=' . mysqli_error($conn));
			}
	}
ob_flush();
?>