<?php
session_start();
if($_SESSION['memlname']=="")
	{
		header('Location: index.php');
	}
include("database/db_connection.php");
if(isset($_GET['queid']))
{
	$qid=$_GET['queid'];
	if($_SESSION['faculty']=="Management")
	 	{
		$sql="select queansid, level, queyear, subject, question, answer, remark from tblmgntqueans where queansid='$qid'";
	 	$row=$conn->query($sql);
		}
	elseif($_SESSION['faculty']=="Education")
		{
	 	$sql="select queansid, level, queyear, subject, question, answer, remark from tbleduqueans where queansid='$qid'";
	 	$row=$conn->query($sql);
		}
	elseif($_SESSION['faculty']=="Science")
		{
	 	$sql="select queansid, level, queyear, subject, question, answer, remark from tblsciencequeans where queansid='$qid'";
	 	$row=$conn->query($sql);
		}
	elseif($_SESSION['faculty']=="Humannities")
		{
	 	$sql="select queansid, level, queyear, subject, question, answer, remark from tblhumanequeans where queansid='$qid'";
	 	$row=$conn->query($sql);
		}
	elseif($_SESSION['faculty']=="SLC")
		{
	 	$sql="select queansid, level, queyear, subject, question, answer, remark from tblslcqueans where queansid='$qid'";
	 	$row=$conn->query($sql);
		}
}
	?>
<html>
<head>
<title>Online Study</title>
</head>
<body bgcolor="#CCCCCC">
<table width="80%" align="center" bgcolor="#FFFFFF" border="1" bordercolor="#FFFFFF">
<tr>
<td>
<table width="100%" align="center" bgcolor="#0000FF">
<tr>
<td align="left" width="400"><img src="image/banner.jpg" width="400" height="100"></td>
<td align="left"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($_SESSION['content']) . '" width="100" height="100">';?></td>

</tr>
</table>
<form action="php/save_stuans.php" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="10" align="center">
<tr>
<td bgcolor="#FFFFFF"><font size="+2" color="#FFFFFF"><b><?php //echo $data["question"];?></b></font><input type="hidden" name="txtqueid" value="<?php echo $_GET['queid'];?>"</td>
</tr>
<tr>
<td colspan="4" align="center">
<?php
	include("fckeditor/fckeditor.php") ;
  	$oFCKeditor = new FCKeditor("ans");
 	$oFCKeditor->BasePath = "FCKeditor/";
  	$oFCKeditor->Value    = "";
 	$oFCKeditor->Width    = 900;
 	$oFCKeditor->Height   = 400;
  	echo $oFCKeditor->CreateHtml();
   ?>
</td>
</tr>
<tr>
<td colspan="4" align="center"><input type="submit" value="Save Answer"></td>
</tr>
</table>
</form>
</td>
</tr>
</table>
</body>
</html>
