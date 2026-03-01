<?php
ob_start();
include("../database/db_connection.php");
$fname=$_POST['txtfname'];
$gender=$_POST['optgender'];
$address=$_POST['txtaddress'];
$email='';
$contact=$_POST['txtcontact'];
$college='';
$level=$_POST['cmblevel'];
$lname=$_POST['txtlname'];
$pass=$_POST['txtpass'];
$conpass=$_POST['txtconpass'];
$vno='';
$cond=$_POST['condition'];
if(isset($_FILES['image']) && $_FILES['image']['size'] > 0)
{
$tmpName = $_FILES['image']['tmp_name'];
$fp 	 = fopen($tmpName, 'r');
$data    = fread($fp, filesize($tmpName));
$data 	 = addslashes($data);
fclose($fp);
}
if($fname<>"" && $contact<>"" && $level<>"" && $lname<>"" && $pass<>"" && $cond<>"")
	{
		if($pass==$conpass)
			{
				$sql="Select * from tblmember where lname='$lname'";
				$rownum=$conn_1->query($sql);
					if($rownum->num_rows>0)
						{
							header('Location: ../new_member.php?msg="Duplicate Login Name"');
						}
					else
						{
						$sql="Insert into tblmember(fname, gender, address, email, contact, memphoto, institute, level, faculty, lname,ondate, lpass) 
						values('$fname','$gender','$address', '$email','$contact', '$data', '$college','$level','', '$lname', now(), '$pass')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../new_member.php?msg=' . mysqli_error());
							}
							
						else
							{
								header('Location: ../index.php?msg="Save Successfully"');
							}
						}
				}
			else
				{
					header('location: ../new_member.php?msg="Password not match"');
				}
	}
else
	{
		header('location: ../new_member.php?msg="Fields are required"');
	}	
ob_flush();
?>