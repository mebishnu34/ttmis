<?php
ob_start();
include("../database/db_connection.php");
$details=$_POST['txtdetails'];
if($details<>"")
	{
	$sql="Select details from tblterm where details='$details'";
	$rownum=$conn_1->query($sql);
		if($rownum->num_rows>0)
			{
				header('Location: ../Admin/index.php?msg="Aleready Exist"');
			}
		else
			{
			$sql="Insert into tblterm(details, ondate) values('$details', now())";
				if(!mysqli_query($conn,$sql))
					{
						header('Location: ../Admin/index.php?msg=' . mysqli_error($conn_1));
					}
					
				else
					{
						header('Location: ../Admin/index.php?msg="Save Successfully"');
					}
				}
	}
else
	{
		header('location: ../Admin/add_details.php?msg="Fields are required"');
	}	
ob_flush();
?>