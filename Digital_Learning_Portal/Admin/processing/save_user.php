<?php
ob_start();
include("../../php_processing/db_connection.php");
$fname=$_POST['txtuser'];
$gender=$_POST['optgender'];
$mobile=$_POST['txtmobile'];
$lname=$_POST['txtloginname'];
$pass=$_POST['txtpass'];
$conpass=$_POST['txtconfirm'];
$utype=$_POST['cmbutype'];
if($pass==$conpass)
	{
		$sql="Select loginname from tbladmin where loginname='$lname'";
		$rownum=$conn->query($sql);
		if($rownum->num_rows>0)
			{
				header('Location: ../admin_application.php?msg="Duplicate Login Name"');
			}
		else
			{
				$sql="Insert into tbladmin(uname, ugender, mobileno, loginname, upass, utype, remark) values('$fname', '$gender','$mobile','$lname', '$pass', '$utype','Active')";
				if(!mysqli_query($conn,$sql))
					{
						header('Location: ../admin_application.php?msg=' . mysqli_error($conn));
					}
				else
					{
						header('Location: ../admin_application.php?msg="Save Successfully"');
					}
			}
	}
	else
		{
			header('location: ../admin_application.php?msg="Password not match"');
		}
	
ob_flush();
?>