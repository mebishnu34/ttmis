<?php
ob_start();
include("../database/db_connection.php");
$details=$_POST['txtdetails'];
//echo $details;
if($details<>"")
	{
	$sql="Update tblterm set details='$details', ondate=now()";
		if(!mysqli_query($conn_1,$sql))
			{
				header('Location: ../Admin/index.php?msg=' . mysqli_error($conn_1));
			}
			
		else
			{
				header('Location: ../Admin/index.php?msg="Update Successfully"');
			}
	}
else
	{
		header('location: ../Admin/add_details.php?msg="Fields are required"');
	}	
ob_flush();
?>