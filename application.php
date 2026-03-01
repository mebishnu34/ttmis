<?php
session_start();
if($_SESSION['token']<>"TRun")
{
header('Location:teacher_login.php?msg= "Please Login"');
}
include("print_function.php");
?>
<HTML>
<HEAD>
 <TITLE>TTMIS:Bagamati</TITLE>
  <link rel="stylesheet" href="CSS/main_table.css">
  <link rel="stylesheet" type="text/css" href="CSS/table_css.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table class="maintable">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="Image\banner.jpg" height="130"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><a href="user_application.php">Home</a></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname']."/".$_SESSION['tid'];?></font></td>
</tr>
<tr>
<td valign="Top" align="center">
<table class="tablestyle">
<?php
if($_SESSION['utype']=="Teacher")
{
?>
<tr>
<td><a href="application.php?linkid=1001">Update Personal Information</a></td>
</tr>

<?php
}
elseif($_SESSION['utype']=="Other")
{
?>
<tr>
<td><a href="application.php?linkid=1002">Other Registration</a></td>
</tr>
<?php
}
?>
<tr>
<td><a href="application.php?linkid=1012">Selected In Training</a></td>
</tr>
<tr>
<td><a href="application.php?linkid=1011">Add Training Information</a></td>
</tr>

<tr>
<td><a href="application.php?linkid=1003">Upload Document</a></td>
</tr>
<tr>
<td><a href="application.php?linkid=1013">Document From Training Center</a></td>
</tr>

<tr>
<td><a href="application.php?linkid=1004">Display Personal Details</a></td>
</tr>
<tr>
<td><a href="application.php?linkid=1005">Attendance</a></td>
</tr>
<tr>
<td><a href="application.php?linkid=1006">Training Report</a></td>
</tr>
<tr>
<td><a href="application.php?linkid=1007">Request For Training</a></td>
</tr>

 <tr>
<td><a href="application.php?linkid=1008">Certificate</a></td>
</tr>
<tr>
<td>&nbsp</td>
</tr>
</table>
</td>
<td valign="Top" align="center" colspan="2">
<?php
if(isset($_GET['linkid']))
{
 $id=$_GET['linkid'];
 if($id==1001)
 {
 include("teacher_reg_request.php");
 }
 elseif($id==1002)
 {
 include("civil_reg_request.php");
 }
 elseif($id==1003)
 {
 include("upload_document.php");
 }
 elseif($id==1004)
 {
 include("personal_details.php");
 }
 elseif($id==1005)
 {
 include("Input/exam.php");
 }
 elseif($id==1006)
 {
 include("teacher_training_display_1.php");
 }
 elseif($id==1007)
 {
 include("teacher_request.php");
 }
 elseif($id==1008)
 {
 include("teacher_training_display_1.php");
 }
 elseif($id==1009)
 {
 include("Input/newuser.php");
 }
 elseif($id==1010)
 {
 include("Input/district.php");
 }
 elseif($id==1011)
 {
 include("add_teacher_training.php");
 }

 elseif($id==1012)
 {
 include("selected_in_training.php");
 }
 elseif($id==1013)
 {
include("Display/display_saved_document_teacher.php");
 }
 elseif($id==1014)
 {
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
