<?php
session_start();
if($_SESSION['token']<>"SRun")
{
header('Location: school_login.php?msg= "Please Login"');
}
include("Processing/db_connection.php");
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
</tr
><tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><a href="index.php">Log Off</a></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management Information System(TTMIS)</b></font></td>
<td 
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname']."/".$_SESSION['code'];?></font></td>
</tr>
<tr>
<td valign="Top" align="center" width="300">
<table class="tablestyle" width="300">
<tr>
<td><a href="school_application.php?linkid=5006">Update  Information</a></td>
</tr>
<tr>
<td><a href="school_application.php?linkid=5009">Search Teacher</a></td>
</tr>

<tr>
<td><a href="school_application.php?linkid=5001">Teacher Registration</a></td>
</tr>
<tr>
<td><a href="school_application.php?linkid=5007">Letter OF Training</a></td>
</tr>
<tr>
<td><a href="school_application.php?linkid=5002">Request For Training</a></td>
</tr>
<tr>
<td><a href="school_application.php?linkid=5003">Upload Document</a></td>
</tr>
<tr>
<td><a href="school_application.php?linkid=5651">Document From Center</a></td>
</tr>
<tr>
<td><a href="school_application.php?linkid=5004">Training From School</a></td>
</tr>
<tr>
<td><a href="school_application.php?linkid=5005">Teacher Display</a></td>
</tr>

<tr>
<td><a href="school_application.php?linkid=5008">Request For New Training</a></td>
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
 if($id==5001)
 {
include("school/teacher_reg_request.php");
 }
 elseif($id==5002)
 {
 include("school/training_request_to_center.php");
 }
 elseif($id==5003)
 {
 include("school/upload_document.php");
 }
 elseif($id==5004)
 {
 include("school/display_training_details.php");
 }
 elseif($id==5005)
 {
  include("school/school_teacher_display.php");
 }
 elseif($id==5006)
 {
  include("school/update_school_information.php");
 }
 elseif($id==5007)
 {
    include("school/letter_from_lgov.php");
 }
  elseif($id==5008)
 {
    include("school/school_request.php");
 }
 elseif($id==5009)
 {
    include("school/search_add_school_teacher.php");
 }
 elseif($id==5651)
 {
include("Display/display_saved_document_school.php");
 }

 }
if(isset($_GET['tdlinkid']))
{
 $teacherid=$_GET['tdlinkid'];
 include("school/school_teacher_details.php");
}
if(isset($_GET['telinkid']))
{
 $teacherid=$_GET['telinkid'];
 include("school/school_teacher_update.php");
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
