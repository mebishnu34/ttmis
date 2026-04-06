<?php
session_start();
if($_SESSION['token']<>"Run")
{
header('Location: ../admin_login.php?msg= "Please Login"');
}
?>
<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <link rel="stylesheet" href="../CSS/main_table.css">
  <link rel="stylesheet" href="../CSS/sidemenu.css">
  <link rel="stylesheet" type="text/css" href="../CSS/div_column.css">
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
<td valign="Top" align="center" width="250">
<table class="tablestyle" width="100%">
<tr>
<td width="100%"><ul id="menu"><li>Application
                                <ul>
								 	<li><a href="report.php?linkid=201TA">Application List</a></li>
                                    <li><a href="report.php?linkid=202TA">Selected Applicant</a></li>
                                    <li><a href="report.php?linkid=204TA">Trainer List</a></li>
                                    <li><a href="report.php?linkid=203TA">Training Certificate</a></li>
								</ul>
                                </li>
                                </ul>
</td>
</tr>
<tr>
<td width="100%"><ul id="menu"><li>Display Application
                                <ul>
								 	<li><a href="report.php?linkid=301TA">From District</a></li>
                                    <li><a href="report.php?linkid=302TA">From Palika</a></li>
                                    <li><a href="report.php?linkid=303TA">From Category</a></li>
                                    <li><a href="report.php?linkid=304TA">From Subject</a></li>
                                    <li><a href="report.php?linkid=305TA">From Training Date</a></li>
								</ul>
                                </li>
                                </ul>
</td>
</tr>

<tr>
<td width="100%"><ul id="menu"><li>Display Teacher
                                <ul>
								 	<li><a href="report.php?linkid=101ts">Teacher From Subject</a></li>
									<li><a href="report.php?linkid=101l">Teacher From Level</a></li>
									<li><a href="report.php?linkid=101s">Teacher From School</a></li>
									<li><a href="report.php?linkid=101m">Teacher From Municipality/Rural</a></li>
                                    <li><a href="report.php?linkid=101d">Teacher From District</a></li>
                                    <li><a href="report.php?linkid=101t">Teacher From Training</a></li>
									<li><a href="report.php?linkid=1001">District Summery</a></li>
									<li><a href="report.php?linkid=1002">District Teacher Summery</a></li>
									<li><a href="report.php?linkid=101all">All Teacher</a></li>

                                </ul>
                                </li>
                                </ul>
</td>
</tr>
<tr>
<td><ul id="menu"><li>TPD Result
                                <ul>
                                    <li><a href="tpd_teacher_result.php" target="_blank">TPD Teacher Result</a></li>
                                    <li><a href="report.php?linkid=100tpdresult">TPD Result</a></li>
                                   <li><a href="tpd_level_result.php" target="_blank">Select Level</a></li>
                                    <li><a href="tpd_subject.php" target="_blank">Select Subject</a></li>
                                    <!--<li><a href="report.php?linkid=602">Select Teacher</a></li> -->
                                    <li><a href="tpd_teacher.php" target="_blank">Select Teacher</a></li>
                                    <li><a href="tpd_localgov.php" target="_blank">Select Palika</a></li>
                                    <li><a href="tpd_district.php" target="_blank">Select District</a></li>
                                    <li><a href="tpd_training_step.php" target="_blank">Select Training Step</a></li>
                                    <li><a href="tpd_year.php" target="_blank">Select Financial Year</a></li>
                                    <li><a href="tpd_teacher_code_update.php" target="_blank">Teacher Code Update</a></li>
                                </ul>
                                </li>
                                </ul></td>
        
</tr>

<!--
<tr>
<td><ul id="menu"><li>Display Other
                                <ul>
                                    <li><a href="report.php?linkid=101od">Other From District</a></li>
                                    <li><a href="report.php?linkid=101om">Other From Municipality/VDC</a></li>
                                    <li><a href="report.php?linkid=101ot">Other From Training</a></li>
                                    <li><a href="report.php?linkid=101os">Other From School</a></li>
                                    <li><a href="report.php?linkid=110">Other Report For TPD Training</a></li>
                                    <li><a href="report.php?linkid=211">Other Report For Customize Training</a></li>
                                </ul>
                                </li>
                                </ul></td>
        
</tr>
-->
<tr>
<td><ul id="menu"><li>Training
                                <ul>
                                    <li><a href="report.php?linkid=202">Training Subject</a></li>
                                    <li><a href="report.php?linkid=102">Running Training</a></li>
									<li><a href="report.php?linkid=302">Teacher Training Details</a></li>
									<li><a href="report.php?linkid=402">Teacher Training Subject</a></li>
                                    <li><a href="report.php?linkid=110">Certificate of Teacher</a></li>
                                    <li><a href="report.php?linkid=111">Certificate of Training</a></li>
								</ul>
                                </li>
                                </ul>
	</td>
</tr>
<tr>
<td><a href="report.php?linkid=207">Display Saved Document</a></td>
</tr>
<tr>
<td><a href="report.php?linkid=113">Display Local Government</a></td>
</tr>

<tr>
<td><a href="report.php?linkid=103">Display School</a></td>
</tr>

<tr>
<td><a href="report.php?linkid=104">Teacher Training Report</a></td>
</tr>
<tr>
<td><a href="report.php?linkid=107">School Document</a></td>
</tr>
<tr>
<td><a href="report.php?linkid=108">Teacher Document</a></td>
</tr>
<tr>
<td><ul id="menu"><li>Training Request
                                <ul><!--
                                    <li><a href="../Display/display_teacher_request.php" target="_blank">Request By Teacher</a></li>
                                    <li><a href="../Display/display_school_request.php" target="_blank">Request By School</a></li>
									<li><a href="../Display/display_localgov_request.php" target="_blank">Request By Local Government</a></li>
									-->
									<li><a href="report.php?linkid=501">Request By Teacher</a></li>
                                    <li><a href="report.php?linkid=502">Request By School</a></li>
									<li><a href="report.php?linkid=503">Request By Local Government</a></li>
                                 </ul>
                                </li>
                                </ul>
	</td>
</tr>
<!--
<tr>
<td><a href="report.php?linkid=109">Attendance</a></td>
</tr>
-->
<tr>
<td><a href="report.php?linkid=112">Display SMS</a></td>
</tr>
<tr>
<td><a href="report.php?linkid=1003">Display User</a></td>
</tr>
<tr>
<td><a href="report.php?linkid=2003">Login Report</a></td>
</tr>
</table>
</td>
<td valign="Top" align="center" colspan="2">
<?php
if(isset($_GET['linkid']))
{
 $id=$_GET['linkid'];
 if($id=='101d')
 {
 include("../Display/teacherdisplay_district.php");
 }
  elseif($id=='101m')
 {
 include("../Display/teacherdisplay_municipality.php");
 }
  elseif($id=='101t')
 {
 include("../Display/display_all_training.php");
 }
  elseif($id=='101s')
 {
 include("../Display/schoolcode_for_teacher.php");
 }
elseif($id=='101l')
 {
 include("../Display/teacher_level.php");
 }
elseif($id=='101ts')
 {
 include("../Display/teacher_subject.php");
 }
elseif($id=='201TA')
 {
 include("../Display/teacher_application_list.php");
 }
elseif($id=='202TA')
 {
 include("../Display/selected_trainee_for_training.php");
 }
elseif($id=='203TA')
 {
 include("../Display/passout_trainee.php");
 }
 elseif($id=='204TA')
 {
 include("../Display/trainee_application_list.php");
 }
 
 elseif($id=='301TA')
 {
 include("../Display/applicant_from_district.php");
 }
elseif($id=='302TA')
 {
 include("../Display/applicant_from_palika.php");
 }
 elseif($id=='303TA')
 {
 include("../Display/applicant_from_category.php");
 }
 elseif($id=='304TA')
 {
 include("../Display/applicant_from_subject.php");
 }
 elseif($id=='305TA')
 {
 include("../Display/training_date.php");
 }
elseif($id=='101all')
 {
 include("../Display/all_teacher.php");
 }
 elseif($id=='101im')
 {
  include("../Display/display_impot_teacher.php");
  }
 elseif($id==102)
 {
  include("../Display/running.php");
 }
  elseif($id==302)
 {
  include("../Display/teachertraining_municipality.php");
 }
 elseif($id==402)
 {
  include("../Display/training_display.php");
 }
 elseif($id==501)
 {
  include("../Display/teacher_level_request.php");
 }
 elseif($id==502)
 {
  include("../Display/school_level_requesst.php");
 }
 elseif($id==503)
 {
  include("../Display/localgov_request.php");
 }

 elseif($id==202)
 {
 include("../Display/training_subject_display.php");
 }
 elseif($id==103)
 {
 include("../Display/school_display.php");
 }
 elseif($id==104)
 {
  //include("../Display/mark_ledger.php");
  include("../Display/teacher_training_report_1.php");
  }
  elseif($id==105)
 {
  include("../Display/teacher_display_TDP.php");
  }
  elseif($id==106)
 {
  include("../Display/teacher_display_customize.php");
  }
 elseif($id==107)
 {
  include("../Display/school_code_1.php");
  }
 elseif($id==108)
 {
  include("../Display/teacher_code_1.php");
  }

  elseif($id==109)
  {
  include("../Display/attendance_display.php");
  }
  elseif($id==110)
  {
  include("../Display/teacher_code.php");
  }
  elseif($id==111)
  {
   include("../Display/training_certificate.php");
  }
   elseif($id==112)
  {
   include("../Display/select_sms.php");
  } 
  elseif($id==113)
  {
   include("../Display/municipality_password.php");
  }
  elseif($id==1001)
  {
   include("../Display/display_district_summery.php");
  }
  elseif($id==1002)
  {
   include("../Display/display_teacher_summery.php");
  }
  elseif($id==1003)
  {
   include("../Display/display_user.php");
  }
  elseif($id==2003)
  {
   include("../Display/usertype.php");
  }
  elseif($id==207)
  {
   include("../Display/display_saved_document.php");
  }
  elseif($id=='100tpdresult')
  {
   include("../Display/all_teacher_subject_result.php");
  }

  /*
  elseif($id==601)
  {
   include("tpd_subject.php");
  }
  elseif($id==602)
  {
   include("tpd_teacher.php");
  }
   
  elseif($id==603)
  {
   include("tpd_localgov");
  }

  elseif($id==604)
  {
   include("tpd_district");
  }
   
  elseif($id==605)
  {
   include("tpd_training_step.php");
  }
   
  elseif($id==606)
  {
   include("tpd_year.php");
  }
*/
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
