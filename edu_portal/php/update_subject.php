<?php
ob_start();
include("../database/db_connection.php");
$level=$_POST['cmblevel'];
$faculty=$_POST['cmbfaculty'];
$subject=$_POST['txtsubject'];
if($level<>"" && $subject<>"")
	{
			$sql=mysql_query("Select subject from tblsubject where subject='$subject' and level='$level' and faculty='$faculty'", $conn_1);
				$rownum=mysql_num_rows($sql);
					if($rownum>0)
						{
							header('Location: ../Admin/index.php?msg="Duplicate Subject"');
						}
					else
						{
						$sql="update tblsubject set subject='$subject', level='$level', faculty='$faculty' where subjectid='$_POST[txtid]'";
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