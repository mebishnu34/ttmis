<?php
session_start();
if($_SESSION['token']<>"Run")
{
header('Location: ../admin_login.php?msg= "Please Login"');
}
include("../Processing/db_connection.php");
?>
<HTML>
<HEAD>
 <TITLE>TTMIS Bagamati</TITLE>
  <link rel="stylesheet" href="../CSS/main_table.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="200" height="180"></td>
<td align="left" bgcolor="#FFFFFF" class="tdradius"><center><img src="..\Image\banner.jpg" width="90%" height="180"></center></td>
</tr>
<tr>
<td colspan="0" bgcolor="#0852FA" align="Right"><a href="admin_application.php">Home</a></td>
<td colspan="0" bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname'];?></font></td>
</tr>
</table>
<table class="maintable">
<tr>
<td valign="Top" align="center" width="25%">
<table class="tablestyle" width="100%">
<tr>
<td><a href="registration_1.php?linkid=1">Organization</a></td>
</tr>
<tr>
<td><a href="registration_1.php?linkid=2">Teacher Registration</a></td>
</tr>
<tr>
<td><a href="registration_1.php?linkid=5">Accept Teacher Request</a></td>
</tr>
<tr>
<td><a href="registration_1.php?linkid=3">Other Registration</a></td>
</tr>
<tr>
<td><a href="registration_1.php?linkid=4">School Registration</a></td>
</tr>
<tr>
<td><a href="registration_1.php?linkid=6">Display Request Letter</a></td>
</tr>
<tr>
<td><a href="registration_1.php?linkid=7">Front Contents</a></td>
</tr>
</table>
</td>
<td valign="Top" align="center">
<?php
if(isset($_GET['linkid']))
{
$id=$_GET['linkid'];
if($id==1)
{
include("../Input/organization.php");
}
elseif($id==2)
{
include("../Input/teacher_registration.php");
}
elseif($id==5)
{
include("../Input/teacher_reg_request.php");
}
elseif($id==3)
{
include("../Input/civil_registration.php");
}
elseif($id==4)
{
include("../Input/school_registration.php");
}
elseif($id==6)
{
include("../Display/letter_from_municipality.php");
}
elseif($id==7)
{
include("../Input/content_remark.php");
}
}
  if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
</td>
</tr>
</table>
</div>
</BODY>
</HTML>
