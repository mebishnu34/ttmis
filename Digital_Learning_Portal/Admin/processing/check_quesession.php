<?php
session_start();
include("../database/db_connection.php");
if($_GET['qsubject'])
	{
	$_SESSION['subject']=$_GET['qsubject'];
	$level=$_SESSION['level'];
	if($level=="six")
	 	{
		$sub=mysql_query("select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblsix where detailsid='$_SESSION[id]'",$conn_1n_1);
	 	$data=mysql_fetch_array($sub);
		}
	elseif($level=="seven")
		{
	 	$sub=mysql_query("select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblseven where detailsid='$_SESSION[id]'",$conn_1);
	 	$data=mysql_fetch_array($sub);
		}
	elseif($faculty=="Eight")
		{
	 	$sub=mysql_query("select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tbleight where detailsid='$_SESSION[id]'",$conn_1);
	 	$data=mysql_fetch_array($sub);
		}
	elseif($faculty=="Nine")
		{
		$sub=mysql_query("select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblnine where detailsid='$_SESSION[id]'",$conn_1);
	 	$data=mysql_fetch_array($sub);
		}
	elseif($level=="Ten")
		{
	 	$sub=mysql_query("select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblten where detailsid='$_SESSION[id]'",$conn_1);
	 	$data=mysql_fetch_array($sub);
		}
	elseif($faculty=="Eleven")
		{
	 	$sub=mysql_query("select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblelven where detailsid='$_SESSION[id]'",$conn_1);
	 	$data=mysql_fetch_array($sub);
		}
	elseif($faculty=="Twelve")
		{
		$sub=mysql_query("select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tbltwelve where detailsid='$_SESSION[id]'",$conn_1);
	 	$data=mysql_fetch_array($sub);
		}
$_SESSION['qsubject']=$data["subject"];
$_SESSION['qtopic']=$data["topic"];
header('Location: ../question_collection.php');
}
?>
