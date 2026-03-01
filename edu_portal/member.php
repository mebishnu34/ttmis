<?php
ob_start();
session_start();
ini_set('session.bug_compat_warn', 0);
ini_set('session.bug_compat_42', 0);
//if($_SESSION['memlname']=="")
//	{
//		header('Location: index.php');
//	}
include("database/db_connection.php");
include("../Processing/db_connection.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><link rel="stylesheet" type="text/css" href="css/body.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>OTS:Portal</title><link rel="stylesheet" type="text/css" href="css/verticallmenu.css">
</head>
<body bgcolor="#CCCCCC">
<table width="90%" align="center" bgcolor="#FFFFFF">
<tr>
<td width="100%" align="center" valign="top">
<table width="100%" align="center" bgcolor="#0000FF">
<tr>
<td align="left" width="400"><img src="image/banner.jpg" width="800" height="100"></td>
<td align="left"><?php
if($_SESSION['content']<>'')
{
echo '<img src="data:image/jpeg;base64,' . base64_encode($_SESSION['content']) . '" width="100" height="100">';
}
?></td>
<td align="right"><a href="member_exam.php"><img src="image/test.gif"></a></td>
</tr>
</table>
<table cellpadding="2" bgcolor="#0099FF" width="100%">
<tr>
<td><?php echo $_SESSION['fname'] . "/" . $_SESSION['level'] . "/" . $_SESSION['faculty'];?></td>
<!--
<td align="right"><a href="read_article.php" target="_blank">Read Article</a></td>
<td align="right"><a href="Admin/artical/writer_artical.php" target="_blank">Post Article</a></td>
<td align="right"><a href="Admin/video.php" target="_blank">Post Video</a></td>
<td align="right"><a href="Admin/audio.php" target="_blank">Post Audio</a></td>
<td align="right"><a href="Admin/hyperlink.php" target="_blank">Resource Link</a></td>
<td align="right"><a href="index.php?log=off">Log Off</a></td> -->
</tr>
</table>
<table width="100%">
<tr>
<td valign="top" bgcolor="#0033CC" width="250">
<?php
if($_SESSION['level']<>"None")
	{
	include("include/subject_navigate.php");
	//include("include/question_collectionyear.php");
	}
	?>
</td>
<td width="20" bgcolor="#FFFFCC">&nbsp;</td>
<td valign="top"> 
<?php
	 if($_SESSION['level']=="वालविकास केन्द्र")
	 	{
		if($_SESSION['topic']=="Video")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblvideo where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		elseif($_SESSION['topic']=="Audio")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblaudio where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		elseif($_SESSION['topic']=="Hyperlink")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblvideo where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		else
			{
			$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblecd where level='$_SESSION[level]' and subject='$_SESSION[subject]' and topic='$_SESSION[topic]'";
		 	$rownum1=$conn_1->query($sql);
			}
		}
	elseif($_SESSION['level']=="आधारभूत (१ –५)")
		{
		if($_SESSION['topic']=="Video")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblvideo where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		elseif($_SESSION['topic']=="Audio")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblaudio where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		elseif($_SESSION['topic']=="Hyperlink")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblvideo where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		else
			{
			 	$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblprimary where level='$_SESSION[level]' and subject='$_SESSION[subject]' and topic='$_SESSION[topic]'";
	 			$rownum1=$conn_1->query($sql);
			}
		}
	elseif($_SESSION['level']=="आधारभूत (६ –८)")
		{
		if($_SESSION['topic']=="Video")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblvideo where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		elseif($_SESSION['topic']=="Audio")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblaudio where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		elseif($_SESSION['topic']=="Hyperlink")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblvideo where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		else
			{
			 	$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblsecondary where level='$_SESSION[level]' and subject='$_SESSION[subject]' and topic='$_SESSION[topic]'";
	 			$rownum1=$conn_1->query($sql);
			}
		}
	elseif($_SESSION['level']=="माध्यमिक(९ –१०)")
		{
		if($_SESSION['topic']=="Video")
			{
				$sql="select subject,filename from tblvideo where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		elseif($_SESSION['topic']=="Audio")
			{
				$sql="select subject,filename from tblaudio where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		elseif($_SESSION['topic']=="Hyperlink")
			{
				$sql="select hyperlink from tblhyperlink where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		else
			{
			$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblhigher where level='$_SESSION[level]' and subject='$_SESSION[subject]' and topic='$_SESSION[topic]'";
		 	$rownum1=$conn_1->query($sql);
			}
		}
	elseif($_SESSION['level']=="माध्यमिक(११ –१२)")
		{
		if($_SESSION['topic']=="Video")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblvideo where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		elseif($_SESSION['topic']=="Audio")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblaudio where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		elseif($_SESSION['topic']=="Hyperlink")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblvideo where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		else
			{
			$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblhigher where level='$_SESSION[level]' and subject='$_SESSION[subject]' and topic='$_SESSION[topic]'";
		 	$rownum1=$conn_1->query($sql);
			}
		}
	elseif($_SESSION['level']=="प्रधानाध्यापक (आधारभूत)")
		{
		if($_SESSION['topic']=="Video")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblvideo where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		elseif($_SESSION['topic']=="Audio")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblaudio where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		elseif($_SESSION['topic']=="Hyperlink")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblvideo where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		else
			{
			$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblhigher where level='$_SESSION[level]' and subject='$_SESSION[subject]' and topic='$_SESSION[topic]'";
		 	$rownum1=$conn_1->query($sql);
			}
		}
	elseif($_SESSION['level']=="प्रधानाध्यापक (माध्यमिक)")
		{
		if($_SESSION['topic']=="Video")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblvideo where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		elseif($_SESSION['topic']=="Audio")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblaudio where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		elseif($_SESSION['topic']=="Hyperlink")
			{
				$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblvideo where level='$_SESSION[level]' and subject='$_SESSION[subject]'";
	 			$rownum1=$conn_1->query($sql);
			}
		else
			{
			$sql="select detailsid, subject, level, faculty, topic, details, image, postby, source, postdate, remark from tblhigher where level='$_SESSION[level]'  and subject='$_SESSION[subject]' and topic='$_SESSION[topic]'";
		 	$rownum1=$conn_1->query($sql);
			}
		}
 $i=0;
	?>
<table width="100%" align="center">

<?php
include("include/reference.php");
if($_SESSION['response']=="Test")
	{
		include("randam_question.php");
	}
elseif($_SESSION['response']=="Comments")
	{
		//From Reference
		include("ask_question.php");
		
	
	}
elseif($_SESSION['response']=="que_ans")
	{
		//From Reference
		include("question_answer.php");
	
	}

?>
</table>
 </td>
</tr>
</table>
</td>
</tr>
</table>
<center>
<?php
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
</center>
</body>
</html>
