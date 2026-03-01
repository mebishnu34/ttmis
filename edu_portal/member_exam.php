<?php
ob_start();
session_start();
if($_SESSION['memlname']=="")
	{
		header('Location: index.php');
	}
include("database/db_connection.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><link rel="stylesheet" type="text/css" href="css/body.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>E-Book</title>
</head><link rel="stylesheet" type="text/css" href="css/body.css">
<body bgcolor="#CCCCCC">
<table width="90%" align="center" bgcolor="#FFFFFF">
<tr>
<td colspan="3" bgcolor="#0000FF" height="100">
<table width="100%" align="center">
<tr>
<td align="left" width="400"><img src="image/banner.jpg" width="400" height="100"></td>
<td align="left" width="100"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($_SESSION['content']) . '" width="100" height="100">';?></td>
<td align="center"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="3" bgcolor="#00FF00">
<table cellpadding="2" bgcolor="#0099FF" width="100%">
<td><?php echo $_SESSION['fname'] . "/" . $_SESSION['level'] . "/" . $_SESSION['faculty'];?></td>
<td align="right"><a href="member.php">Back</a> &nbsp; <a href="index.php?log=off">Log Off</a></td>
</table>
</td>
</tr>
<tr>
<td valign="top" bgcolor="#0066FF" width="250">
<hr color="#FFFFFF">
<?php
include("include/examsubject.php");
?>
<hr color="#FFFFFF">

</td>
<td width="20" bgcolor="#FFFFCC">&nbsp;</td>
<td valign="top"> 
<?Php
if(isset($_GET['subid']))
{
//include("Question4Student.php");	
$subid=$_GET['subid'];
			$sql="Select subject from tblsubject where subjectid='$subid' and level='$_SESSION[level]'";
			$result=$conn->query($sql);
			if($result->num_rows>0)
				{
				if($row1 = $result->fetch_assoc())
		  			{
		  				$_SESSION['subject']=$row1["subject"];
		  				$_SESSION['subtype']="None";
						$mark=100;
						include("Question4Student_timer.php");	
		  			}
				}

}
if(isset($_GET['gkid']))
{
include("include/general_knowledge.php");
}
if(isset($_GET['tsubid']))
{
include("include/topic_test.php");	
}
if(isset($_GET['tgkid']))
{
include("include/topic_read.php");
}

?>

</table>
 </td>
</tr>
</table>
</body>
</html>
