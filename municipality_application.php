<?php
session_start();
if($_SESSION['token']<>"MRun")
{
header('Location: mun_login.php?msg= "Please Login"');
}
include("Processing/db_connection.php");

?>
<HTML>
<HEAD>
 <TITLE>TTMIS</TITLE>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

  <link rel="stylesheet" href="CSS/main_table.css">
  <link rel="stylesheet" href="CSS/table_css.css">
  <link rel="stylesheet" type="text/css" href="CSS/div_column.css">
  <link rel="stylesheet" href="CSS/sidemenu.css">
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
<td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><a href="index.php">Log Out</a></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management Information System(TTMIS)</b></font></td>
<td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname']."/".$_SESSION['tid'];?></font></td>
</tr>
<tr>
<td valign="Top" align="center">
<table class="tablestyle">
<tr>
<td>
<ul id="menu">
	<li>Add_Create
	    <ul>
		<li><a href="municipality_application.php?linkid=594">Name of Training</a></li>
		<li><a href="municipality_application.php?linkid=595">New Training Package</a></li>
		<li><a href="municipality_application.php?linkid=552">New School</a></li>
		<li><a href="municipality_application.php?linkid=553">New Teacher</a></li>
		<li><a href="municipality_application.php?linkid=597">Subject of Teacher</a></li>
		</ul>
   </li>
</ul>
</td>
</tr>
<tr>
<td>
<ul id="menu">
	<li>Search_Change
	    <ul>
			<li><a href="municipality_application.php?linkid=593">School</a></li>		
			<li><a href="municipality_application.php?linkid=592">Teacher</a></li>
		</ul>
   </li>
</ul>

</td>
</tr>
<tr>
<td><a href="municipality_application.php?linkid=591">Add Teacher In Training</a></td>
</tr>
<tr>
<td>
<ul id="menu">
	<li>Teacher Training Report
	    <ul>
			<li><a href="municipality_application.php?linkid=502">Ongoing Training</a></li>
			<li><a href="municipality_application.php?linkid=504">Training From Center</a></li>
			<li><a href="municipality_application.php?linkid=596">Internal Training</a></li>
		</ul>
   </li>
</ul>
</tr>
<tr>
<td>
<ul id="menu">
	<li>Send_Receive
	    <ul>
			<li><a href="municipality_application.php?linkid=507">Letter of Training</a></li>
			<li><a href="municipality_application.php?linkid=506">Training Message To School</a></li>
			<li><a href="municipality_application.php?linkid=509">Letter From School</a></li>
			<li><a href="municipality_application.php?linkid=508">Training Request From School</a></li>
			<li><a href="municipality_application.php?linkid=510">Request To Training Center</a></li>
		</ul>
   </li>
</ul>
</td>
</tr>
<tr>
<td>
<a href="municipality_application.php?linkid=501">Display School</a>
</td>
</tr>
<tr>
<td>
<ul id="menu">
	<li>Display Teacher
	    <ul>
			<li><a href="municipality_application.php?linkid=505">All Teacher</a></li>
			<li><a href="municipality_application.php?linkid=590">Teacher Contact</a></li>
		</ul>
   </li>
</ul>
</tr>
<tr>
<td><a href="municipality_application.php?linkid=503">Upload Document</a></td>
</tr>
<tr>
<td><a href="municipality_application.php?linkid=651">Document From Training Center</a></td>
</tr>

 <tr>
<td><a href="municipality_application.php?linkid=551">Update Information</a></td>
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
 if($id==501)
 {
 include("municipality/municipality_display_school.php");
 }
 elseif($id==502)
 {
 include("municipality/running_training.php");
 }
 elseif($id==503)
 {
 include("upload_document.php");
 }
 elseif($id==504)
 {
     include("municipality/teacher_training_municipality_1.php");
 }
 elseif($id==505)
 {
 include("municipality/municipality_all_teacher.php");
 }
 elseif($id==591)
 {
include("municipality/add_teacher_in_training.php");
 }
 elseif($id==506)
 {
include("municipality/training_message_to_school.php");
 }
 elseif($id==507)
 {
include("municipality/letter_from_training_center.php");
 }
 elseif($id==508)
 {
include("municipality/request_participate_for_training_school.php");
 }
 elseif($id==509)
 {
include("municipality/letter_from_school.php");
 }
elseif($id==510)
 {
include("municipality/localgov_request.php");
 }
elseif($id==551)
 {
include("municipality/update_localgovernment.php");
 }
elseif($id==552)
 {
include("municipality/school_registration_1.php");
 }
elseif($id==553)
 {
include("municipality/teacher_reg_request_1.php");
 }
elseif($id==590)
 {
include("teacher_contact_mun.php");
 }
elseif($id==592)
 {
include("municipality/search_add_teacher.php");
 }
elseif($id==593)
 {
include("municipality/search_add_school.php");
 }
 elseif($id==594)
 {
include("municipality/palika_training.php");
 }
elseif($id==595)
 {
include("municipality/create_palika_new_training.php");
 }
elseif($id==596)
 {
include("municipality/teacher_training_palika.php");
 }
elseif($id==597)
 {
include("municipality/palika_subject.php");
 }
 elseif($id==651)
 {
include("Display/display_saved_document_palika.php");
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
