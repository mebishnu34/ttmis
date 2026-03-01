<?php
ob_start();
include("../database/db_connection.php");
$level=$_POST['txtlevel'];
$subject=$_POST['txtsubject'];
$postby=$_POST['txtpost'];
$source=$_POST['txtsource'];
$topic=$_POST['txttopic'];
$details=$_POST['txtdetails'];
if(isset($_FILES['image']) && $_FILES['image']['size'] > 0)
{
$tmpName = $_FILES['image']['tmp_name'];
$fp 	 = fopen($tmpName, 'r');
$data    = fread($fp, filesize($tmpName));
$data 	 = addslashes($data);
fclose($fp);
}
if($level<>"" && $subject<>"" && $postby<>"" && $details<>"")
	{
		if($level=="वालविकास केन्द्र")
				{
				$sql="Insert into tblecd(subject, level, faculty, topic, details, image, postby, source, postdate, remark) 
				values('$subject', '$level', '$faculty', '$topic', '$details', '$data', '$postby', '$source', now(), 'running')";
				if(!mysqli_query($conn_1,$sql))
					{
						header('Location: ../Admin/add_subject_details.php?msg=' . mysqli_error());
					}
					
				else
					{
						header('Location: ../Admin/add_subject_details.php?msg="Save Successfully"');
					}
				}
			elseif($level=="आधारभूत (१ –५)")
				{
				$sql="Insert into tblprimary(subject, level, faculty, topic, details, image, postby, source, postdate, remark) 
				values('$subject', '$level', '$faculty', '$topic', '$details', '$data', '$postby', '$source', now(), 'running')";
				if(!mysqli_query($conn_1,$sql))
					{
						header('Location: ../Admin/add_subject_details.php?msg=' . mysqli_error());
					}
					
				else
					{
						header('Location: ../Admin/add_subject_details.php?msg="Save Successfully"');
					}
				}
			elseif($level=="आधारभूत (६ –८)")
				{
				$sql="Insert into tblsecondary(subject, level, faculty, topic, details, image, postby, source, postdate, remark) 
				values('$subject', '$level', '$faculty', '$topic', '$details', '$data', '$postby', '$source', now(), 'running')";
				if(!mysqli_query($conn_1,$sql))
					{
						header('Location: ../Admin/add_subject_details.php?msg=' . mysqli_error());					}
					
				else
					{
						header('Location: ../Admin/add_subject_details.php?msg="Save Successfully"');
					}
				}
			elseif($level=="माध्यमिक(९ –१०)")
				{
				$sql="Insert into tblhigher(subject, level, faculty, topic, details, image, postby, source, postdate, remark) 
				values('$subject', '$level', '$faculty', '$topic', '$details', '$data', '$postby', '$source', now(), 'running')";
				if(!mysqli_query($conn_1,$sql))
					{
						header('Location: ../Admin/add_subject_details.php?msg=' . mysqli_error());
					}
					
				else
					{
						header('Location: ../Admin/add_subject_details.php?msg="Save Successfully"');
					}
				}
			elseif($level=="माध्यमिक(११ –१२)")
				{
				$sql="Insert into tblhigher(subject, level, faculty, topic, details, image, postby, source, postdate, remark) 
				values('$subject', '$level', '$faculty', '$topic', '$details', '$data', '$postby', '$source', now(), 'running')";
				if(!mysqli_query($conn_1,$sql))
					{
						header('Location: ../Admin/add_subject_details.php?msg=' . mysqli_error());
					}
					
				else
					{
						header('Location: ../Admin/add_subject_details.php?msg="Save Successfully"');
					}
				}
			elseif($level=="प्रधानाध्यापक (आधारभूत)")
				{
				$sql="Insert into tblhigher(subject, level, faculty, topic, details, image, postby, source, postdate, remark) 
				values('$subject', '$level', '$faculty', '$topic', '$details', '$data', '$postby', '$source', now(), 'running')";
				if(!mysqli_query($conn_1,$sql))
					{
						header('Location: ../Admin/add_subject_details.php?msg=' . mysqli_error());
					}
					
				else
					{
						header('Location: ../Admin/add_subject_details.php?msg="Save Successfully"');
					}
				}
				elseif($level=="प्रधानाध्यापक (माध्यमिक)")
				{
				$sql="Insert into tblhigher(subject, level, faculty, topic, details, image, postby, source, postdate, remark) 
				values('$subject', '$level', '$faculty', '$topic', '$details', '$data', '$postby', '$source', now(), 'running')";
				if(!mysqli_query($conn_1,$sql))
					{
						header('Location: ../Admin/add_subject_details.php?msg=' . mysqli_error());
					}
					
				else
					{
						header('Location: ../Admin/add_subject_details.php?msg="Save Successfully"');
					}
				}
			elseif($level=="अन्य")
				{
				$sql="Insert into tblhigher(subject, level, faculty, topic, details, image, postby, source, postdate, remark) 
				values('$subject', '$level', '$faculty', '$topic', '$details', '$data', '$postby', '$source', now(), 'running')";
				if(!mysqli_query($conn_1,$sql))
					{
						header('Location: ../Admin/add_subject_details.php?msg=' . mysqli_error());
					}
					
				else
					{
						header('Location: ../Admin/add_subject_details.php?msg="Save Successfully"');
					}
				}
			else
				{
					header('Location:../Admin/add_subject_details.php?msg="Level Error"');
				}
			}
	else
	{
		header('location: ../Admin/add_subject_details.php?msg="Fields are required"');
	}	
ob_flush();
?>