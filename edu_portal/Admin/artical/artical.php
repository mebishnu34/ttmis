<?php
session_start();
include("../../database/db_connection.php");
if(isset($_GET['wid']))

	{
		//echo "Group ID " .$_GET['linkid'] ." For Edit";
		$id= $_GET['wid'];
		$sql="Select fullname from tblwriter where id='$id'";
		$rownum=$conn->query($sql);
		if($rownum->num_rows>0)
		{
			if($data=$rownum->fetch_assoc())
				{
					$_SESSION['wname']=$data["fullname"];
					header('Location: writer_artical.php');
				}
		}
	}
?>

