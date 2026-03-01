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
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
    <td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><a href="admin_application.php">Home</a></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
<tr>
<td valign="Top" align="center">
<table class="tablestyle" width="100%">
<tr>
<td><a href="registration.php?linkid=1">Organization</a></td>
</tr>
<tr>
<td><a href="registration.php?linkid=13">Local Government</a></td>
</tr>
<tr>
<td><a href="registration.php?linkid=4">School Registration</a></td>
</tr>
<!--
<tr>
<td><a href="registration.php?linkid=3">Other Registration</a></td>
</tr>
-->
<tr>
<td><a href="registration.php?linkid=14">Teacher Short Info. Registration</a></td>
</tr>

<tr>
<td><a href="registration.php?linkid=2">Teacher Registration</a></td>
</tr>
<tr>
<td><a href="registration.php?linkid=5">Approve Teacher Training</a></td>
</tr>
<tr>
<td><a href="registration.php?linkid=6">Display Request Letter</a></td>
</tr>
</table>
</td>
<td valign="Top" align="center" colspan="2">
<?php
if(isset($_GET['linkid']))
{
$id=$_GET['linkid'];
if($id==1)
{
include("../Input/organization.php");
}
elseif($id==14)
{
include("../Input/teacher_short_info_registration.php");
}
elseif($id==2)
{
include("../Input/teacher_registration.php");
}
elseif($id==5)
{
//include("../Input/teacher_reg_request.php");
include("../Input/add_teacher_training.php");
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
elseif($id==13)
 {
 include("../Input/district.php");
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
