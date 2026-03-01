<?php
ob_start();
session_start();
include("../database/db_connection.php");
$id=$_POST['txtid'];
$level=$_POST['txtlevel'];
$faculty=$_POST['txtfaculty'];
$subject=$_POST['txtsubject'];
$postby=$_POST['txtpost'];
$source=$_POST['txtsource'];
$topic=$_POST['txttopic'];
$details=mysql_real_escape_string($_POST['txtdetails']);
if(isset($_FILES['image']) && $_FILES['image']['size'] > 0)
{
$tmpName = $_FILES['image']['tmp_name'];
$fp 	 = fopen($tmpName, 'r');
$data    = fread($fp, filesize($tmpName));
$data 	 = addslashes($data);
fclose($fp);
}
if($level<>"" && $faculty<>"" && $subject<>"" && $postby<>"" && $details<>"")
	{
		if($level=="ECD")
				{
				$sql="update tblECD set subject='$subject', level='$level', faculty='$faculty', topic='$topic', details='$details', image='$data', postby='$postby', source='$source', postdate=now(), remark='running' where detailsid='$id'";
				if(!mysql_query($sql, $conn_1))
					{
						header('Location: ../Admin/display_topic.php?msg=' . mysql_error());
					}
					
				else
					{
						header('Location: ../Admin/display_topic.php?msg="Update Successfully"');
					}
				}
			elseif($level=="Primary")
				{
				$sql="update tblprimary set subject='$subject', level='$level', faculty='$faculty', topic='$topic', details='$details', image='$data', postby='$postby', source='$source', postdate=now(), remark='running' where detailsid='$id'";
				if(!mysql_query($sql, $conn_1))
					{
						header('Location: ../Admin/display_topic.php?msg=' . mysql_error());
					}
					
				else
					{
						header('Location: ../Admin/display_topic.php?msg="Update Successfully"');
					}
				}
			elseif($level=="Secondary")
				{
				$sql="update tblsecondary set subject='$subject', level='$level', faculty='$faculty', topic='$topic', details='$details', image='$data', postby='$postby', source='$source', postdate=now(), remark='running' where detailsid='$id'";
				if(!mysql_query($sql, $conn_1))
					{
						header('Location: ../Admin/display_topic.php?msg=' . mysql_error());
					}
					
				else
					{
						header('Location: ../Admin/display_topic.php?msg="Update Successfully"');
					}
				}
			elseif($level=="Higher Secondary")
				{
				$sql="update tblhigher set subject='$subject', level='$level', faculty='$faculty', topic='$topic', details='$details', image='$data', postby='$postby', source='$source', postdate=now(), remark='running' where detailsid='$id'";
				if(!mysql_query($sql, $conn_1))
					{
						header('Location: ../Admin/display_topic.php?msg=' . mysql_error());
					}
					
				else
					{
						header('Location: ../Admin/display_topic.php?msg="Update Successfully"');
					}
				}
			else
				{
					header('Location:../Admin/display_topic.php?msg="Faculty Error"');
				} 
	}
		
else
	{
		header('location: ../Admin/display_topic.php?msg="Fields are required"');
	}	
ob_flush();
?>