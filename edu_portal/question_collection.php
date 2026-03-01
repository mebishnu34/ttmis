<?php
ob_start();
session_start();
//echo $_SESSION['memlname'];
//exit;
if($_SESSION['memlname']=="")
	{
		header('Location: index.php');
	}
include("database/db_connection.php");
//echo $_SESSION['memlname'];
$sql="Select fname, gender, address, email, contact, memphoto, institute, level, faculty, lname, lpass from tblmember where lname='$_SESSION[memlname]'";
$result=$conn->query($sql);
if($result->num_rows>0)
{
if($data=$result->fetch_assoc())
	{
		$_SESSION['content']=$data['memphoto'];
		$_SESSION['level']=$data["level"];
		$_SESSION['faculty']=$data["faculty"];
		$_SESSION['lname']=$data["lname"];
		$_SESSION['fname']=$data["fname"];
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><link rel="stylesheet" type="text/css" href="css/body.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>E-Book</title><link rel="stylesheet" type="text/css" href="css/verticallmenu.css">
</head>
<body bgcolor="#CCCCCC">
<table width="90%" align="center" bgcolor="#FFFFFF">
<tr>
<td colspan="3" bgcolor="#0000FF" height="100">
<table width="100%" align="center">
<tr>
<td align="left" width="400"><img src="image/banner.jpg" width="400" height="100"></td>
<td align="left" width="100"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($_SESSION['content']) . '" width="100" height="100">';?></td>
<td align="right"><a href="member_exam.php"><img src="image/test.gif"></a></td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="3" bgcolor="#00FF00">
<table cellpadding="2" bgcolor="#0099FF" width="100%">
<td><?php echo $_SESSION['fname'] . "/" . $_SESSION['level'] . "/" . $_SESSION['faculty'];?></td>
<td align="right"><a href="member.php">Back</a> &nbsp; <a href="index.php?log=off">Log Off</a></td>
</table></td>
</tr>
<tr>
<td valign="top" bgcolor="#0000FF" width="250">

<hr color="#FFFFFF">
<?php
	include("include/subject_quecollection.php");
?>	
</td>
<td width="20" bgcolor="#FFFFCC">&nbsp;</td>
<td valign="top"> 
<table width="100%" align="center">
<?php
if(isset($_GET['queans'])=="display")
	{
		include("include/display_stuqueans.php");
	}
else
	{
	include("include/dis_sub4que_collection.php");
	}
?>

</table>
 </td>
</tr>
</table>
</body>
</html>
