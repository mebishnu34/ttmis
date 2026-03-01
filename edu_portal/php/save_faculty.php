<?php
ob_start();
include("../database/db_connection.php");
$faculty=$_POST['txtfaculty'];
if($faculty<>"")
	{
			$sql="Select faculty from tblfaculty where faculty='$faculty'";
			$result=$conn_1->query($sql);
					if($result->num_rows>0)
						{
							header('Location: ../Admin/index.php?msg="Found Duplicate"');
						}
					else
						{
						$sql="Insert into tblfaculty(faculty) values('$faculty')";
						if (!mysqli_query($conn_1, $sql))
							{
								header('Location: ../Admin/index.php?msg=' . mysqli_error());
							}
						else
							{
								header('Location: ../Admin/index.php?msg="Save Successfully"');
							}
						}
		}
else
	{
		header('location: ../Admin/index.php?msg="Field is required"');
	}	
ob_flush();
?>