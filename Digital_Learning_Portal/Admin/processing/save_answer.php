<?php
ob_start();
session_start();
echo $_SESSION['level'];

include("../database/db_connection.php");
$id=$_POST['txtqueid'];
$ans=$_POST['txtanswer'];
$lname=$_POST['txtlname'];

if($ans<>"")
	{
	   
	  if($_SESSION['level']=="वालविकास केन्द्र")
		{
	    $sql="Insert into tblhigherans(queid,answer, answerby, ondate, remark) 
				values('$id', '$ans','$lname', now(), 'continue')";
				if(!mysqli_query($conn_1,$sql))
					{
						header('Location: ../Admin/question.php?msg=' . mysqli_error($conn_1));
					}
					
				else
					{
						header('Location: ../Admin/question.php?msg="Answer Post Successfully"');
					}
			
		}
		elseif($_SESSION['level']=="आधारभूत (१ –५)")
		{
	    $sql="Insert into tblhigherans(queid,answer, answerby, ondate, remark) 
				values('$id', '$ans','$lname', now(), 'continue')";
				if(!mysqli_query($conn_1,$sql))
					{
						header('Location: ../Admin/question.php?msg=' . mysqli_error($conn_1));
					}
					
				else
					{
						header('Location: ../Admin/question.php?msg="Answer Post Successfully"');
					}
			
		}
		elseif($_SESSION['level']=="आधारभूत (६ –८)")
		{
	    $sql="Insert into tblhigherans(queid,answer, answerby, ondate, remark) 
				values('$id', '$ans','$lname', now(), 'continue')";
				if(!mysqli_query($conn_1,$sql))
					{
						header('Location: ../Admin/question.php?msg=' . mysqli_error($conn_1));
					}
					
				else
					{
						header('Location: ../Admin/question.php?msg="Answer Post Successfully"');
					}
			
		}
		elseif($_SESSION['level']=="माध्यमिक(९ –१०)")
		{
	    $sql="Insert into tblhigherans(queid,answer, answerby, ondate, remark) 
				values('$id', '$ans','$lname', now(), 'continue')";
				if(!mysqli_query($conn_1,$sql))
					{
						header('Location: ../Admin/question.php?msg=' . mysqli_error($conn_1));
					}
					
				else
					{
						header('Location: ../Admin/question.php?msg="Answer Post Successfully"');
					}
			
		}

	}
else
	{
		header('location: ../Admin/question.php?msg="Fields are required"');
	}	
ob_flush();
?>