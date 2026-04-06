<?php
session_start();
if($_SESSION['token']<>"Run")
{
header('Location: ../admin_login.php?msg= "Please Login"');
}
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
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management Information System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
<tr>
<td valign="Top" align="center" width="20%">
<table class="tablestyle" width="100%">
<tr>
<td><a href="entry.php?linkid=7">Mark of Selected Trainee</a></td>
</tr>
<tr>
<td><a href="entry.php?linkid=8">Mark Entry</a></td>
</tr>
<tr>
<td><a href="entry.php?linkid=9">Attendance</a></td>
</tr>
<tr>
<td><a href="entry.php?linkid=10">Training Complete</a></td>
</tr>
<tr>
<td><a href="entry.php?linkid=12">Course Complete</a></td>
</tr>
<tr>
<td><a href="entry.php?linkid=14">Rerun Training</a></td>
</tr>
<tr>
<td><a href="entry.php?linkid=13">Import From Excel</a></td>
</tr>
<tr>
<td><a href="entry.php?linkid=15">Upload Document</a></td>
</tr>

</table>
</td>
<td valign="Top" align="center">
<?php
if(isset($_GET['linkid']))
{
 $id=$_GET['linkid'];
 if($id==7)
 {
 include("../Input/mark_entry_trainee.php");
 }
 elseif($id==8)
 {
 include("../Input/select_training_for_mark_entry.php");
 }
 elseif($id==9)
 {
 include("../Input/attendance.php");
 }
elseif($id==10)
{
include("../Input/training_completion_tpd.php");
}
 elseif($id==12)
{
include("../Input/training_completion.php");
}
 elseif($id=='c12')
{
include("../Input/complete_confirmation.php");
}
 elseif($id=='r12')
{
include("../Object/complete_training.php");
}
elseif($id==13)
  {
   include("../Display/import_from_excel.php");
  }
 elseif($id==14)
  {
   include("../Input/rerun_training.php");
  }
  elseif($id==15)
  {
   include("../Input/save_document.php");
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
