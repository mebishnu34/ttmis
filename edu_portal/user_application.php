<?php
session_start();
if($_SESSION['token']<>"TRun")
{
header('Location: teacher_login.php?msg= "Please Login"');
}
?>
<HTML>
<HEAD>
 <TITLE>TTMIS:Bagamati</TITLE>
  <link rel="stylesheet" href="CSS/main_table.css">
    <link rel="stylesheet" href="CSS/sidemenu.css">
</HEAD>
<BODY class="bg">
<div align="center">
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="Image\logo.svg" width="150" height="100"></td>
<td bgcolor="#FFFFFF" align="left" class="tdradius"><img src="Image\banner.jpg" width="800" height="150"></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><a href="index.php">Log Off</a></font></td>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname']."/".$_SESSION['tid'];?></font></td>
</tr>
<tr>
<td colspan="2" align="center">
<table width="100%">
<tr>
<td align="center" height="100" colspan="4">&nbsp</td>
</tr>
<tr>
<td align="center"><a href="application.php"><img src="Image\personal_info.jpg"></a></td>
<td align="center"><a href="Display\publish_notice.php"><img src="Image\notice.jpg"></a></td>
<td align="center"><a href="Display\contact_list.php"><img src="Image\contact.jpg"></a></td>
<td align="center"><a href="edu_portal/member.php" target="_blank"><img src="edu_portal\image\btnotsp.jpg"></a></td>
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
