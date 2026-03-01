<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <!-- Including our scripting file. -->
   <!--<script type="text/javascript" src="script/search_script.js"></script>-->
   <script type="text/javascript" src="script/teachercontact.js"></script>
   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
 <TITLE>TTMIS</TITLE>
 <link rel="stylesheet" href="CSS/main_table.css">
    <link rel="stylesheet" href="CSS/sidemenu.css">
	<link rel="stylesheet" type="text/css" href="CSS/table_css.css">
</HEAD>

<?php
session_start();
?>
<BODY>
<table class="maintable">
<tr>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="Image\logo.jpg" width="150" height="130"></td>
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="Image\banner.jpg" height="130"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="Image/np_flag.gif" width="150" height="130"></
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><a href="Input/../Admin/create.php">Back</a></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<table width="100%">
  <tr>
    <td valign="top">
<input type="text" id="search" onchange="display_teacher(this.value)" placeholder="Search" />

  <div id="display"></div>
    </td>
</tr>
  </table>
</BODY>

</HTML>
