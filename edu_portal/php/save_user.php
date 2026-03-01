<?php
ob_start();
include("../database/db_connection.php");
$fname=$_POST['txtfname'];
$lname=$_POST['txtlname'];
$pass=$_POST['txtpass'];
$conpass=$_POST['txtconpass'];
$type=$_POST['cmbtype'];
if($fname<>"" && $lname<>"" && $pass<>"")
	{
		if($pass==$conpass)
			{
				$sql="Select lname from tbluser where lname='$lname'";
				$rownum=$conn_1->query($sql);
					if($rownum->num_rows>0)
						{
							header('Location: ../Admin/index.php?msg="Duplicate Login Name"');
						}
					else
						{
						$sql="Insert into tbluser(fname, lname, password, type,remark) values('$fname', '$lname', '$pass', '$type','Active')";
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
					header('location: ../Admin/index.php?msg="Password not match"');
				}
	}
else
	{
		header('location: ../Admin/index.php?msg="Fields are required"');
	}	
ob_flush();
?>