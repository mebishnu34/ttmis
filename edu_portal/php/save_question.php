<?php
ob_start();
session_start();
include("../database/db_connection.php");
$level=$_POST['txtlevel'];
$subject=$_POST['txtsubject'];
$postby=$_POST['txtlname'];
$topic=$_POST['txttopic'];
$question=$_POST['txtquestion'];
if($question<>"")
	{
	if($level=="वालविकास केन्द्र")
		{
			$sql="Select * from tblecdque where level='$level' and faculty='$faculty' and subject='$subject' and topic='$topic' and question='$question'";
			$rownum=$conn_1->query($sql);
				if($rownum->num_rows>0)
					{
						header('Location: ../member.php?msg="This question is asked already, Thank You"');
					}
				else
					{
					$sql="Insert into tblecdque(level, faculty, subject, queby, topic, question, ondate, remark) 
						values('$level', '$faculty','$subject','$postby', '$topic', '$question', now(), 'asked')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../member.php?msg=' . mysqli_error($conn_1));
							}
							
						else
							{
								header('Location: ../member.php?msg="Thanks for your question, we will response as soon as possible."');
							}
					}
					
			}
		elseif($level=="आधारभूत (१ –५)")
			{
			$sql="Select * from tblprimaryque where level='$level' and faculty='$faculty' and subject='$subject' and topic='$topic' and question='$question'";
			$rownum=$conn_1->query($sql);
				if($rownum->num_rows>0)
					{
						header('Location: ../member.php?msg="This question is asked already, Thank You"');
					}
				else
					{
					$sql="Insert into tblprimaryque(level, faculty, subject, queby, topic, question, ondate, remark) 
						values('$level', '$faculty','$subject','$postby', '$topic', '$question', now(), 'asked')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../member.php?msg=' . mysqli_error($conn_1));
							}
							
						else
							{
								header('Location: ../member.php?msg="Thanks for your question, we will response as soon as possible."');
							}
					}
					
			}
	elseif($level=="आधारभूत (६ –८)")
			{
			$sql="Select * from tblsecondaryque where level='$level' and faculty='$faculty' and subject='$subject' and topic='$topic' and question='$question'";
			$rownum=$conn_1->query($sql);
				if($rownum->num_rows>0)
					{
						header('Location: ../member.php?msg="This question is asked already, Thank You"');
					}
				else
					{
					$sql="Insert into tblsecondaryque(level, faculty, subject, queby, topic, question, ondate, remark) 
						values('$level', '$faculty','$subject','$postby', '$topic', '$question', now(), 'asked')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../member.php?msg=' . mysqli_error($conn_1));
							}
							
						else
							{
								header('Location: ../member.php?msg="Thanks for your question, we will response as soon as possible."');
							}
					}
					
			}
		elseif($level=="माध्यमिक(९ –१०)")
			{
			$sql="Select * from tblhigherque where level='$level' and subject='$subject' and topic='$topic' and question='$question'";
			$rownum=$conn_1->query($sql);
				if($rownum->num_rows>0)
					{
						header('Location: ../member.php?msg="This question is asked already, Thank You"');
					}
				else
					{
					$sql="Insert into tblhigherque(level, faculty, subject, queby, topic, question, ondate, remark) 
						values('$level', '','$subject','$postby', '$topic', '$question', now(), 'asked')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../member.php?msg=' . mysqli_error($conn_1));
							}
							
						else
							{
								header('Location: ../member.php?msg="Thanks for your question, we will response as soon as possible."');
							}
					}
			}
		elseif($level=="माध्यमिक(११ –१२)")
			{
			$sql="Select * from tblhigherque where level='$level' and faculty='$faculty' and subject='$subject' and topic='$topic' and question='$question'";
			$rownum=$conn_1->query($sql);
				if($rownum->num_rows>0)
					{
						header('Location: ../member.php?msg="This question is asked already, Thank You"');
					}
				else
					{
					$sql="Insert into tblnineque(level, faculty, subject, queby, topic, question, ondate, remark) 
						values('$level', '$faculty','$subject','$postby', '$topic', '$question', now(), 'asked')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../member.php?msg=' . mysqli_error($conn_1));
							}
							
						else
							{
								header('Location: ../member.php?msg="Thanks for your question, we will response as soon as possible."');
							}
					}
			}
elseif($level=="प्रधानाध्यापक (आधारभूत)")
			{
			$sql="Select * from tblhigherque where level='$level' and faculty='$faculty' and subject='$subject' and topic='$topic' and question='$question'";
			$rownum=$conn_1->query($sql);
				if($rownum->num_rows>0)
					{
						header('Location: ../member.php?msg="This question is asked already, Thank You"');
					}
				else
					{
					$sql="Insert into tblnineque(level, faculty, subject, queby, topic, question, ondate, remark) 
						values('$level', '$faculty','$subject','$postby', '$topic', '$question', now(), 'asked')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../member.php?msg=' . mysqli_error($conn_1));
							}
							
						else
							{
								header('Location: ../member.php?msg="Thanks for your question, we will response as soon as possible."');
							}
					}
			}
elseif($level=="प्रधानाध्यापक (माध्यमिक)")
			{
			$sql="Select * from tblhigherque where level='$level' and faculty='$faculty' and subject='$subject' and topic='$topic' and question='$question'";
			$rownum=$conn_1->query($sql);
				if($rownum->num_rows>0)
					{
						header('Location: ../member.php?msg="This question is asked already, Thank You"');
					}
				else
					{
					$sql="Insert into tblnineque(level, faculty, subject, queby, topic, question, ondate, remark) 
						values('$level', '$faculty','$subject','$postby', '$topic', '$question', now(), 'asked')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../member.php?msg=' . mysqli_error($conn_1));
							}
							
						else
							{
								header('Location: ../member.php?msg="Thanks for your question, we will response as soon as possible."');
							}
					}
			}
	}
else
	{
		header('location: ../member.php?msg="Fields are required"');
	}	
ob_flush();
?>