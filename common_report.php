<?php
session_start();
if($_SESSION['token']<>"Run")
{
header('Location: ../index.php?msg= "Please Login"');
}
?>
<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
  <link rel="stylesheet" href="CSS/main_table.css">
  <link rel="stylesheet" href="CSS/sidemenu.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="Admin/../Image/logo.svg" width="200" height="150"></td>
<td align="left" bgcolor="#FFFFFF" class="tdradius"><center><img src="Admin/../Image/banner.jpg" width="90%" height="180"></center></td>
</tr>
<tr>
<td colspan="0" bgcolor="#0852FA" align="Right"></td>
<td colspan="0" bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname'];?></font></td>

</tr>
<tr>
<td valign="Top" align="center" width="250">
<table class="tablestyle" width="100%">
<tr>
<td width="100%"><ul id="menu"><li>Display Teacher
                                <ul>
								 	<li><a href="common_report.php?linkid=101ts">Teacher From Subject</a></li>
									<li><a href="common_report.php?linkid=101l">Teacher From Level</a></li>
									<li><a href="common_report.php?linkid=101s">Teacher From School</a></li>
									<li><a href="common_report.php?linkid=101m">Teacher From Municipality/Rural</a></li>
                                    <li><a href="common_report.php?linkid=101d">Teacher From District</a></li>
                                    <li><a href="common_report.php?linkid=101t">Teacher From Training</a></li>
									<li><a href="common_report.php?linkid=1001">District Summery</a></li>
									<li><a href="common_report.php?linkid=1002">District Teacher Summery</a></li>
									<li><a href="common_report.php?linkid=101all">All Teacher</a></li>

                                </ul>
                                </li>
                                </ul>
</td>
</tr>
<td><ul id="menu"><li>Training
                                <ul>
                                    <li><a href="common_report.php?linkid=202">Training Subject</a></li>
                                    <li><a href="common_report.php?linkid=102">Training</a></li>
									<li><a href="common_report.php?linkid=302">Teacher Training Details</a></li>
									<li><a href="common_report.php?linkid=402">Teacher Training Subject</a></li>
                                 </ul>
                                </li>
                                </ul>
	</td>
</tr>
<tr>
<td><a href="common_report.php?linkid=113">Display Local Government</a></td>
</tr>

<tr>
<td><a href="common_report.php?linkid=103">Display School</a></td>
</tr>

<tr>
<td><a href="common_report.php?linkid=104">Mark Ledger</a></td>
</tr>
<tr>
<td><a href="common_report.php?linkid=107">School Document</a></td>
</tr>
<tr>
<td><a href="common_report.php?linkid=108">Teacher Document</a></td>
</tr>
<tr>
<td><a href="common_report.php?linkid=109">Attendance</a></td>
</tr>
<tr>
<td><a href="common_report.php?linkid=110">Certificate of Teacher</a></td>
</tr>
<tr>
<td><a href="common_report.php?linkid=111">Certificate of Training</a></td>
</tr>
</table>
</td>
<td valign="Top" align="center">
<?php
if(isset($_GET['linkid']))
{
 $id=$_GET['linkid'];
 if($id=='101d')
 {
 include("common_display/teacherdisplay_district.php");
 }
  elseif($id=='101m')
 {
 include("common_display/teacherdisplay_municipality.php");
 }
  elseif($id=='101t')
 {
 include("common_display/display_all_training.php");
 }
  elseif($id=='101s')
 {
 include("common_display/schoolcode_for_teacher.php");
 }
elseif($id=='101l')
 {
 include("common_display/teacher_level.php");
 }
elseif($id=='101ts')
 {
 include("common_display/teacher_subject.php");
 }

elseif($id=='101all')
 {
 include("common_display/all_teacher.php");
 }
 elseif($id=='101im')
 {
  include("common_display/display_impot_teacher.php");
  }
 elseif($id==102)
 {
  include("common_display/training_display.php");
 }
  elseif($id==302)
 {
  include("common_display/teachertraining_municipality.php");
 }
 elseif($id==402)
 {
  include("common_display/training_display.php");
 }
 elseif($id==501)
 {
  include("common_display/teacher_level_request.php");
 }
 elseif($id==502)
 {
  include("common_display/school_level_requesst.php");
 }
 elseif($id==503)
 {
  include("common_display/localgov_request.php");
 }

 elseif($id==202)
 {
 include("common_display/training_subject_display.php");
 }
 elseif($id==103)
 {
 include("common_display/school_display.php");
 }
 elseif($id==104)
 {
  include("common_display/mark_ledger.php");
  }
  elseif($id==105)
 {
  include("common_display/teacher_display_TDP.php");
  }
  elseif($id==106)
 {
  include("common_display/teacher_display_customize.php");
  }
 elseif($id==107)
 {
  include("common_display/school_code_1.php");
  }
 elseif($id==108)
 {
  include("common_display/teacher_code_1.php");
  }

  elseif($id==109)
  {
  include("common_display/attendance_display.php");
  }
  elseif($id==110)
  {
  include("common_display/teacher_code.php");
  }
  elseif($id==111)
  {
   include("common_display/training_certificate.php");
  }
   elseif($id==112)
  {
   include("common_display/select_sms.php");
  } 
  elseif($id==113)
  {
   include("common_display/municipality_password.php");
  }
  elseif($id==1001)
  {
   include("common_display/display_district_summery.php");
  }
  elseif($id==1002)
  {
   include("common_display/display_teacher_summery.php");
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
