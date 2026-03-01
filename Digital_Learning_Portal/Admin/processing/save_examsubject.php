<?php
ob_start();
include("../database/db_connection.php");
$subject=$_POST['txtsubject'];
if($subject<>"")
	{
			$sql=mysql_query("Select examsubject from tblexamsubject where examsubject='$subject'", $conn_1n_1);
				$rownum=mysql_num_rows($sql);
					if($rownum>0)
						{
							header('Location: ../Admin/index.php?msg="Duplicate Subject"');
						}
					else
						{
						$sql="Insert into tblexamsubject(examsubject, remark) values('$subject', 'running')";
						if(!mysql_query($sql, $conn_1n_1))
							{
								header('Location: ../Admin/index.php?msg=' . mysql_error());
							}
						else
							{
								header('Location: ../Admin/index.php?msg="Save Successfully"');
							}
						}
		}
else
	{
		header('location: ../Admin/Index.php?msg="Fields are required"');
	}	
ob_flush();
?>