<?php
ob_start();
include("../database/db_connection.php");
$title=$_POST['txttitle'];
$source=$_POST['txtsource'];
$details=mysql_real_escape_string($_POST['txtdetails']);
if(isset($_FILES['image']) && $_FILES['image']['size'] > 0)
{
$tmpName = $_FILES['image']['tmp_name'];
$fp 	 = fopen($tmpName, 'r');
$data    = fread($fp, filesize($tmpName));
$data 	 = addslashes($data);
fclose($fp);
}
if($title<>"" && $details<>"")
	{
	$sql=mysql_query("Select * from tblnews where newstitle='$title' and ondate=now()", $conn_1);
	$rownum=mysql_num_rows($sql);
		if($rownum>0)
			{
				header('Location: ../Admin/index.php?msg="Aleready Posted"');
			}
		else
			{
			$sql="update tblnews set newstitle='$title', news='$details', image='$data',source='$source', ondate=now(), remark='running'"; 
			if(!mysql_query($sql, $conn_1))
					{
						header('Location: ../Admin/index.php?msg=' . mysql_error());
					}
					
				else
					{
						header('Location: ../Admin/index.php?msg="Update Successfully"');
					}
				}
	}
else
	{
		header('location: ../Admin/index.php?msg="Fields are required"');
	}	
ob_flush();
?>