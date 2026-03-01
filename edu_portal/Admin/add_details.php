<?php
include("header.php");
include("../../Processing/db_connection.php");
if(isset($_GET['subid']))
	{
		$id=$_GET['subid'];
	//	echo $id;
		$sql="Select subject from tbltraining where ID='$id'";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
		    if($data=$result->fetch_assoc())
				{
				    $_SESSION['subject']=$data["subject"];
					header('Location:add_subject_details.php');
					
				}
		}
	}
?>
