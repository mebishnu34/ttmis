<?php
session_start();
include("../database/db_connection.php");
if($_GET['linkid'])
	{
		$_SESSION['id']=$_GET['linkid'];
		$sub=mysql_query("select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblcomputer where detailsid='$_SESSION[id]'",$conn_1);
	 	$data=mysql_fetch_array($sub);
		$_SESSION['csubject']=$data["subject"];
		$_SESSION['ctopic']=$data["topic"];
		header('Location: ../member.php');
	}
?>
