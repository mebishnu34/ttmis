<?php
include("../database/db_connection.php");
if(isset($_GET['approve']))
	{
		$id=$_GET['approve'];
		$sql="update tblmember set Remark='Approved' where memberid='$id'";
			if(!mysqli_query($conn_1,$sql))
				{
					header('Location: ../Admin/displaymember.php?msg=' . mysqli_error());
				}
			else
				{
					header('location: ../Admin/displaymember.php?msg="Approved Successfully"');
				}
	}
elseif(isset($_GET['remove']))
	{
		$id=$_GET['remove'];
		$sql="update tblmember set Remark='' where memberid='$id'";
			if(!mysqli_query($conn_1,$sql))
				{
					header('Location: ../Admin/displaymember.php?msg=' . mysqli_error());
				}
			else
				{
					header('location: ../Admin/displaymember.php?msg="Removed Successfully"');
				}
	}
else
	{
		header('Location: ../Admin/displaymember.php?msg="Click any one Option"');
	}
?>