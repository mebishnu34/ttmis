<?php
session_start();
include("../database/db_connection.php");
if(isset($_GET['linkid']))
	{
		$_SESSION['response']='';
		$_SESSION['id']=$_GET['linkid'];
		$mlevel=$_SESSION['level'];
	if($mlevel=="वालविकास केन्द्र")
	 	{
		$sub="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblsix where detailsid='$_SESSION[id]'";
	 	$data=$conn_1->query($sub);
		}
	elseif($mlevel=="आधारभूत (१ –५)")
		{
	 	$sub="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblseven where detailsid='$_SESSION[id]'";
	 	$data=$conn_1->query($sub);
		}
	elseif($mlevel=="आधारभूत (६ –८)")
		{
	 	$sub="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tbleight where detailsid='$_SESSION[id]'";
	 	$data=$conn_1->query($sub);
		}
	elseif($mlevel=="माध्यमिक(९ –१०)")
		{
		$sub="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblhigher where detailsid='$_SESSION[id]'";
	 	$data=$conn_1->query($sub);
		}
	elseif($mlevel=="माध्यमिक(११ –१२)")
		{
	 	$sub="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblten where detailsid='$_SESSION[id]'";
	 	$data=$conn_1->query($sub);
		}
	elseif($mlevel=="प्रधानाध्यापक (आधारभूत)")
		{
	 	$sub="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblelven where detailsid='$_SESSION[id]'";
	 	$data=$conn_1->query($sub);
		}
	elseif($mlevel=="प्रधानाध्यापक (माध्यमिक)")
		{
		$sub="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tbltwelve where detailsid='$_SESSION[id]'";
	 	$data=$conn_1->query($sub);
		}
if($data->num_rows>0)
	{
	if($subdata=$data->fetch_assoc())
		{
			$_SESSION['subject']=$subdata["subject"];
			$_SESSION['topic']=$subdata["topic"];
		}
	}
else
	{
			$_SESSION['subject']="None";
			$_SESSION['topic']="None";
	}
header('Location: ../member.php');
}
?>
