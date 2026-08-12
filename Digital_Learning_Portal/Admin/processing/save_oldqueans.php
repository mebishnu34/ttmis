<?php
ob_start();
session_start();
include("../database/db_connection.php");
$subject=$_POST['cmbsubject'];
$question=$_POST['addque'];
$answer=$_POST['addans'];
//mysql_real_escape_string is used to escape the special characters.
if($subject<>"" && $question<>"" && $answer<>"")
	{
		if($_SESSION['level']=="ECD")
			{
			$sql="Select question from tblecdqueans where question='$question' and level='$_SESSION[level]' and queyear='$_SESSION[year]'";
			$rownum=$conn_1->query($sql);
					if($rownum->num_rows>0)
						{
							header('Location: ../Admin/New_quecollection.php?msg="Found Duplicate"');
						}
					else
						{ 						
						$sql="Insert into tblecdqueans(level, queyear, subject, question, answer, remark) values('$_SESSION[level]','$_SESSION[year]', '$subject','$question','$answer','Running')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../Admin/New_quecollection.php?msg=' . mysqli_error($conn_1));
							}
						else
							{
								header('Location: ../Admin/New_quecollection.php?msg="Save Successfully"');
							}
						}
			}
		elseif($_SESSION['level']=="Primary")
			{
			$sql="Select question from tblprimaryqueans where question='$question' and level='$_SESSION[level]' and queyear='$_SESSION[year]'";
				$rownum=$conn_1->query($sql);
					if($rownum->num_rows>0)
						{
							header('Location: ../Admin/New_quecollection.php?msg="Found Duplicate"');
						}
					else
						{ 						
						$sql="Insert into tblprimaryqueans(level, queyear, subject, question, answer, remark) values('$_SESSION[level]','$_SESSION[year]', '$subject','$question','$answer','Running')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../Admin/New_quecollection.php?msg=' . mysqli_error($conn_1));
							}
						else
							{
								header('Location: ../Admin/New_quecollection.php?msg="Save Successfully"');
							}
						}
			}
			elseif($_SESSION['level']=="Secondary")
			{
			$sql="Select question from tblsecondaryqueans where question='$question' and level='$_SESSION[level]' and queyear='$_SESSION[year]'";
			$rownum=$conn_1->query($sql);
			if($rownum->num_rows>0)
						{
							header('Location: ../Admin/New_quecollection.php?msg="Found Duplicate"');
						}
					else
						{ 						
						$sql="Insert into tblsecondaryqueans(level, queyear, subject, question, answer, remark) values('$_SESSION[level]','$_SESSION[year]', '$subject','$question','$answer','Running')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../Admin/New_quecollection.php?msg=' . mysqli_error($conn_1));
							}
						else
							{
								header('Location: ../Admin/New_quecollection.php?msg="Save Successfully"');
							}
						}
			}
			elseif($_SESSION['level']=="Higher Secondary")
			{
			$sql="Select question from tblhigherqueans where question='$question' and level='$_SESSION[level]' and queyear='$_SESSION[year]'";
				$rownum=$conn_1->query($sql);
					if($rownum->num_rows>0)
						{
							header('Location: ../Admin/New_quecollection.php?msg="Found Duplicate"');
						}
					else
						{ 						
						$sql="Insert into tblhigherqueans(level, queyear, subject, question, answer, remark) values('$_SESSION[level]','$_SESSION[year]', '$subject','$question','$answer','Running')";
						if(!mysqli_query($conn_1,$sql))
							{
								header('Location: ../Admin/New_quecollection.php?msg=' . mysqli_error($conn_1));
							}
						else
							{
								header('Location: ../Admin/New_quecollection.php?msg="Save Successfully"');
							}
						}
			}
	}
else
	{
		header('location: ../Admin/New_quecollection.php?msg="Field is required"');
	}	
ob_flush();
?>