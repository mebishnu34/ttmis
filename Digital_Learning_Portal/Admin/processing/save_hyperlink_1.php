<?php
ob_start();
include("../database/db_connection.php");
$level=$_POST['cmblevel'];
$faculty=$_POST['cmbfaculty'];
$subject=$_POST['cmbsubject'];
$link=$_POST['txthyperlink'];
//echo $level;
//echo $subject;
//echo $link;
//exit;
if($level<>"" && $subject<>"" && $link<>"")
	{
			$sql="Select subject from tblhyperlink where subject='$subject' and level='$level' and faculty='$faculty' and hyperlink='$link'";
			$result=$conn->query($sql);
			if($result->num_rows>0)
				{
					header('Location: ../Admin/artical/hyperlink_1.php?msg="Duplicate Subject"');
				}
			else
				{
					$sql="Insert into tblhyperlink(subject, level, faculty, hyperlink) values('$subject', '$level','$faculty','$link')";
					if(!mysqli_query($conn,$sql))
						{
							header('Location: ../Admin/artical/hyperlink_1.php?msg=' . mysqli_error($conn));
						}
					else
						{
							header('Location: ../Admin/artical/hyperlink_1.php?msg="Save Successfully"');
						}
				}
	}
else
	{
		header('location: ../Admin/artical/hyperlink_1.php?msg="Fields are required"');
	}	
ob_flush();
?>