<?php
ob_start();
session_start();
include("database/db_connection.php");
$mgntsql=mysql_query("select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblmgnt",$con);
$mgntrownum=mysql_num_rows($mgntsql);
$m=0;
while($m<$mgntrownum)
	{
		$mgnttopic[$m]= mysql_result($mgntsql, $m, "topic");
		$mgntpostby[$m]=mysql_result($mgntsql, $m, "postby");
		$m++;
	}
$edusql=mysql_query("select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tbledu",$con);
$edurownum=mysql_num_rows($edusql);
$e=0;
while($e<$edurownum)
	{
		$edutopic[$e]= mysql_result($edusql, $e, "topic");
		$edupostby[$e]=mysql_result($edusql, $e, "postby");
		$e++;
	}
$scisql=mysql_query("select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblscience",$con);
$scirownum=mysql_num_rows($scisql);
$s=0;
while($s<$scirownum)
	{
		$scitopic[$s]= mysql_result($scisql, $s, "topic");
		$scipostby[$s]=mysql_result($scisql, $s, "postby");
		$s++;
	}
$hsql=mysql_query("select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblhuman",$con);
$hrownum=mysql_num_rows($hsql);
$h=0;
while($s<$hrownum)
	{
		$htopic[$h]= mysql_result($hsql, $h, "topic");
		$hpostby[$h]=mysql_result($hsql, $h, "postby");
		$s++;
	}
$compsql=mysql_query("select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblcomputer",$con);
$comprownum=mysql_num_rows($compsql);
$c=0;
while($c<$comprownum)
	{
		$comptopic[$c]= mysql_result($compsql, $c, "topic");
		$comppostby[$c]=mysql_result($compsql, $c, "postby");
		$c++;
	}
?>
