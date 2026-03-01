<?php
ob_start();
include("../database/db_connection.php");
$level=$_POST['txtlevel'];
if($level<>"")
	{
			$sql="Select levelname from tbllevel where levelname='$level'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0)
   					{
					header('Location: ../Admin/index.php?msg="Duplicate Subject"');
					}
			else
					{
					$sql="Insert into tbllevel(levelname) values('$level')";
					if (mysqli_query($conn, $sql))
         					{
							header('Location: ../Admin/index.php?msg="Save Successfully"');
							
							}
					else
							{
							header('Location: ../Admin/index.php?msg=' . mysqli_error($conn));
							}
					}
	}
else
	{
		header('location: ../Admin/index.php?msg="Field is required"');
	}	
ob_flush();
?>