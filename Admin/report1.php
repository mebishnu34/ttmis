<?php
session_start();
?>
<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
  <link rel="stylesheet" href="../CSS/main_table.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="150" height="100"></td>
<td bgcolor="#FFFFFF" align="left" class="tdradius"><img src="..\Image\banner.jpg" width="800" height="150"></td>
</tr>
<tr>
<td colspan="2" bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname'];?></font></td>
</tr>
<tr>
<td valign="Top" align="center">
<table class="tablestyle">
<tr>
<td><a href="admin_application.php?linkid=101">Teacher</a></td>
</tr>
<tr>
<td><a href="admin_application.php?linkid=102">Training</a></td>
</tr>
<tr>
<td><a href="admin_application.php?linkid=103">Exam</a></td>
</tr>
<tr>
<td><a href="admin_application.php?linkid=104">Document</a></td>
</tr>
<tr>
<td><a href="admin_application.php?linkid=105">Attendance</a></td>
</tr>
<tr>
<td><a href="admin_application.php?linkid=106">Certificate</a></td>
</tr>
</table>
</td>
<td valign="Top" align="center">
<?php
if(isset($_GET['linkid']))
{
 $id=$_GET['linkid'];
 if($id==101)
 {
 include("../Display/teacherdisplay.php");
 }
 elseif($id==102)
 {
 include("../Display/training_display.php");
 }
 elseif($id==103)
 {
 include("../Display/exam_display.php");
 }
 elseif($id==104)
 {
  include("../Display/download_document.php");
  }
  elseif($id==105)
  {
  include("../Display/attendance_display.php");
  }
  elseif($id==106)
  {
  include("../Display/certificate_display.php");
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

