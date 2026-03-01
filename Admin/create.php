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
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
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
<td><a href="create.php?linkid=10">Training Name</a></td>
</tr>
<tr>
<td><a href="create.php?linkid=11">Create Training Package</a></td>
</tr>
<tr>
<td><a href="create.php?linkid=18">Send Training Message</a></td>
</tr>
<tr>
<td><a href="create.php?linkid=17">Trainee In Training</a></td>
</tr>
<tr>
<td><a href="create.php?linkid=12">Accept Request For Training</a></td>
</tr>
<tr>
 <td><a href="create.php?linkid=161">Teacher Subject</a></td>
</tr>

<tr>
<td><a href="create.php?linkid=14">Create Contact</a></td>
</tr>

 <tr>
 <td><a href="create.php?linkid=15">New User</a></td>
</tr>
<tr>
 <td><a href="create.php?linkid=16">Send SMS</a></td>
</tr>
<tr>
 <td><a href="create.php?linkid=19">Send E-Mail</a></td>
</tr>

<tr>
 <td><a href="create.php?linkid=160">Send Password</a></td>
</tr>

</table>
</td>
<td valign="Top" align="center" colspan="2">
<?php
if(isset($_GET['linkid']))
{
 $id=$_GET['linkid'];
 if($id==10)
 {
 include("../Input/training.php");
 }
elseif($id==11)
 {
 include("../Input/create_new_training.php");
 }
 elseif($id==12)
 {
 include("../Input/request_participate_for_training.php");
 }
 elseif($id==14)
 {
 include("../Input/contact.php");
 }
 elseif($id==15)
 {
 include("../Input/newuser.php");
 }
 elseif($id==16)
 {
 include("../Input/send_sms.php");
 }
 elseif($id==17)
 {
 include("../Input/add_participate_in_training.php");
 }
 elseif($id==18)
 {
 include("../Input/training_message_to_lgov.php");
 }
 elseif($id==19)
 {
 include("../Input/send_email.php");
 }
 elseif($id==160)
 {
 include("../Input/municipality_password.php");
 }
elseif($id==161)
 {
 include("../Input/teacher_subject.php");
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
