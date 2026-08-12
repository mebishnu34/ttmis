<?php
session_start();
if($_SESSION['token']<>"NRun")
{
header('Location: index.php?msg= "Please Login"');
}
?>
<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
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
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><?php echo $_SESSION['uname'];?></font></td>
</tr>
<tr>
<td colspan="2" align="center">
<br><br>
<a href="Display/publish_notice.php"><img src="Image/notice.jpg"></a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<a href="Display/contact_list.php"><img src="Image/contact.jpg"></a>
</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
</BODY>
</HTML>
