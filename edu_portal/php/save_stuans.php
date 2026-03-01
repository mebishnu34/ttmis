<?php
ob_start();
session_start();
include("../database/db_connection.php");
$id=$_POST['txtqueid'];
$ans=$_POST['ans'];
if($ans<>"" && $id<>"")
	{
		$sql="Insert into tblpostanswer(queyear, subject,queid,answer) values('$_SESSION[year]', '$_SESSION[subject]','$id', '$ans')";
		if(!mysqli_query($conn_1,$sql))
			{
				header('Location: ../post_queans.php?msg=' . mysqli_error($conn_1));
			}
			
		else
			{
				 echo "<script>window.close();</script>";
			}
		}
else
	{
		header('Location: ../post_queans.php');
	}
ob_flush();
?>