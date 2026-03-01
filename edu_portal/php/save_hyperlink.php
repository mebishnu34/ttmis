<?php
ob_start();
include("../database/db_connection.php");
$level=$_POST['cmblevel'];
$faculty=$_POST['cmbfaculty'];
$subject=$_POST['cmbsubject'];
$link=$_POST['txthyperlink'];
if($level<>"" && $subject<>"" && $link<>"")
	{
			$sql="Select subject from tblhyperlink where subject='$subject' and level='$level' and faculty='$faculty' and hyperlink='$link'";
			$result=$conn_1->query($sql);
			if($result->num_rows>0)
				{
					header('Location: ../Admin/index.php?msg="Duplicate Subject"');
				}
			else
				{
					$sql="Insert into tblhyperlink(subject, level, faculty, hyperlink) values('$subject', '$level','$faculty','$link')";
					if(!mysqli_query($conn_1,$sql))
						{
							header('Location: ../Admin/index.php?msg=' . mysqli_error());
						}
					else
						{
							header('Location: ../Admin/index.php?msg="Save Successfully"');
						}
				}
	}
else
	{
		header('location: ../Admin/index.php?msg="Fields are required"');
	}	
ob_flush();
?>