<?php
ob_start();
include("db_connection.php");
$uname=$_POST['username'];
$email=$_POST['useremail'];
$mobile=$_POST['usermobile'];
$address=$_POST['useraddress'];
//$province=$_POST['province'];
$province='Bagamati';
$district=$_POST['cmbdistrict'];
$lgov=$_POST['cmbmun'];
$ward=$_POST['cmbward'];
$utype=$_POST['usertype'];
$sql="Select * from tbl_user where mobileno='$mobile' and loginname='$mobile'";
$rownum=$conn->query($sql);
	if($rownum->num_rows>0)
		{
			header('Location: ../new_user.php?msg="Duplicate Login Name"');
		}
	else
		{
			$sql="Insert into tbl_user(username, email, mobileno, province, district, l_govern, wardno, address, usertype,loginname,password,remark) 
				values('$uname','$email','$mobile','$province','$district','$lgov','$ward','$address','$utype','$mobile','$mobile','Active User')";
			if(!mysqli_query($conn,$sql))
				{
					header('Location: ../new_user.php?msg=' . mysqli_error($conn));
					//echo mysqli_error($conn);
				}
							
			else
				{
					header('Location: ../new_user.php?msg="Save Successfully"');
				}
		}
ob_flush();
?>