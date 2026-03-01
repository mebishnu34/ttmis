<?php 
session_start();
if(isset($_POST['btnadddetails']))
{
	$_SESSION['category']=$_POST['cmbcategory'];
	$_SESSION['level']=$_POST['cmblevel'];
	$_SESSION['subject']=$_POST['cmbsubject'];
	$_SESSION['topic']=$_POST['cmbtopic'];
	header('Location: add_subject_details_1.php');
}