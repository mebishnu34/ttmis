<?php
ob_start();
include("../../php_processing/db_connection.php");
$category=$_POST['txtcategory'];
$sql="Select categoryname from tbl_catagory where categoryname='$category'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
	{
		header('Location: ../admin_application.php?msg="Duplicate Category"');
	}
else
	{
    	$sql="Insert into tbl_catagory(categoryname,remark) values('$category','Ok')";
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