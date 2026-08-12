<?php
ob_start();
include("../database/db_connection.php");
if(isset($_FILES['image']) && $_FILES['image']['size'] > 0)
{
$tmpName = $_FILES['image']['tmp_name'];
$fp 	 = fopen($tmpName, 'r');
$data    = fread($fp, filesize($tmpName));
$data 	 = addslashes($data);
fclose($fp);
}
if($_POST['txtwriter']<>"")
	{
			$sql="Select fullname from tblwriter where fullname='$_POST[txtwriter]'";
			$rownum=$conn_1->query($sql);
			if($rownum->num_rows>0)
				{
					header('Location: ../Admin/index.php?msg="Duplicate Name!"');
				}
			else
				{
					$sql="Insert into tblwriter(fullname, address, contact, email, qualification, experence,photo, ondate, remark) values('$_POST[txtwriter]', '$_POST[txtaddress]','$_POST[txtcontact]', '$_POST[txtemail]','$_POST[txtquali]','$_POST[experence]','$data',now(),'working')";
					if(!mysqli_query($conn_1,$sql))
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
		header('location: ../Admin/index.php?msg="Field is required"');
	}	
ob_flush();
?>