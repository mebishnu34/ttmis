<?php
session_start();
//echo ini_set('display_errors', 'off');
//error_reporting(0);
//session_set_cookie_params(0,'/','https://ttmis.bagamati.gov.np');
//echo "Good Morning";
//echo $_SESSION['lname'];
//echo $_SESSION['token'];
//echo "Admin_Application";
//echo $_SESSION['$a'];
//$_SESSION['name']="Hello";
//echo $_SESSION['name'];
//exit;
if($_SESSION['token']<>"Run")
{
header('Location: ../admin_login.php?msg= "Please Login"');
}
?>
<HTML>
<HEAD>
 <TITLE>TTIMS</TITLE>
  <link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
</HEAD>
<BODY class="bg">
<div align="center">
<table class="maintable">
<tr>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
    <td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><a href="..\admin_login.php">Log Out</a></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#FFFFFF"><b>Teacher Training Management Information System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
<tr>
<td colspan="3" align="center">
<table width="100%">
<tr>
<td align="right" height="100" colspan="4"><a href="../teacher_contact.php" target="blank">Teacher Contact</a></td>
</tr>
<tr>
<td align="center"><a href="registration.php"><img src="..\Image\register.jpg"></a></td>
<td align="center"><a href="create.php"><img src="..\Image\create.jpg"></a></td>
<td align="center"><a href="entry.php"><img src="..\Image\entry.jpg"></a></td>
<td align="center"><a href="report.php"><img src="..\Image\report.jpg"></a></td>
</tr>
<tr>
<td align="center" height="100" colspan="4">&nbsp</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
</BODY>
</HTML>
