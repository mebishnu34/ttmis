<?php
ob_start();
session_start();
include("../database/db_connection.php");
$subject=$_POST['txtsubject'];
$question=$_POST['addque'];
$topic=$_POST['cmbtopic'];
$ans1=$_POST['ans1'];
$ans2=$_POST['ans2'];
$ans3=$_POST['ans3'];
$ans4=$_POST['ans4'];
$correct=$_POST['txtcorrect'];
$category=$_POST['cmbcategory'];
if($subject<>"" && $question<>"" && $topic<>"" && $category=="Text")
	{
			$sql="Select question from tblquestion where question='$question'";
				$rownum=$conn_1->query($sql);
					if($rownum->num_rows>0)
						{
							header('Location: ../Admin/exam/New_Question.php?msg="Found Duplicate"');
						}
					else
						{
						$sql="Insert into tblquestion(level, question, ordering, subject, topic, ans1, ans2, ans3, ans4, correctno) values('$_SESSION[level]', '$question','$_POST[txtorder]', '$subject','$topic','$ans1','$ans2','$ans3','$ans4','$correct')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../Admin/eaxm/New_Question.php?msg=' . mysqli_error($conn_1));
							}
						else
							{
								header('Location: ../Admin/exam/New_Question.php?msg="Save Successfully"');
							}
						}
		}
elseif($subject<>"" && $question<>"" && $topic<>"" && $category=="audio")
	{
			$sql="Select question from tblaudioquestion where question='$question'";
				$rownum=$conn_1->query($sql);
					if($rownum->num_rows>0)
						{
							header('Location: ../Admin/exam/New_Question.php?msg="Found Duplicate"');
						}
					else
						{
						$sql="Insert into tblaudioquestion(level, question, ordering, subject, topic, ans1, ans2, ans3, ans4, correctno) values('$_SESSION[level]', '$question','$_POST[txtorder]', '$subject','$topic','$ans1','$ans2','$ans3','$ans4','$correct')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../Admin/eaxm/New_Question.php?msg=' . mysqli_error($conn_1));
							}
						else
							{
								header('Location: ../Admin/exam/New_Question.php?msg="Save Successfully"');
							}
						}
		}
elseif($subject<>"" && $question<>"" && $topic<>"" && $category=="Video")
	{
			$sql="Select question from tblvideoquestion where question='$question'";
				$rownum=$conn_1->query($sql);
					if($rownum->num_rows>0)
						{
							header('Location: ../Admin/exam/New_Question.php?msg="Found Duplicate"');
						}
					else
						{
						$sql="Insert into tblvideoquestion(level, question, ordering, subject, topic, ans1, ans2, ans3, ans4, correctno) values('$_SESSION[level]', '$question','$_POST[txtorder]', '$subject','$topic','$ans1','$ans2','$ans3','$ans4','$correct')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../Admin/eaxm/New_Question.php?msg=' . mysqli_error($conn_1));
							}
						else
							{
								header('Location: ../Admin/exam/New_Question.php?msg="Save Successfully"');
							}
						}
		}
elseif($subject<>"" && $question<>"" && $topic<>"" && $category=="Hyperlink")
	{
			$sql="Select question from tblhyperlinkquestion where question='$question'";
				$rownum=$conn_1->query($sql);
					if($rownum->num_rows>0)
						{
							header('Location: ../Admin/exam/New_Question.php?msg="Found Duplicate"');
						}
					else
						{
						$sql="Insert into tblhyperlinkquestion(level, question, ordering, subject, topic, ans1, ans2, ans3, ans4, correctno) values('$_SESSION[level]', '$question','$_POST[txtorder]', '$subject','$topic','$ans1','$ans2','$ans3','$ans4','$correct')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../Admin/eaxm/New_Question.php?msg=' . mysqli_error($conn_1));
							}
						else
							{
								header('Location: ../Admin/exam/New_Question.php?msg="Save Successfully"');
							}
						}
		}
else
	{
		header('location: ../Admin/exam/New_Question.php?msg="Field is required"');
	}	
ob_flush();
?>