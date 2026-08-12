<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['id']))
{
 $_SESSION['trunid']=$_GET['id'];
 $sql = "SELECT trainingid from tblruntraining where id='$_SESSION[trunid]'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
	$_SESSION['trainingid']= $row["trainingid"];
	}
	}
}
?>
<HTML>
<HEAD>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <!-- Including our scripting file. -->
   <script type="text/javascript" src="../script/name_search.js"></script>
      
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
 <TITLE>TTMIS</TITLE>
 <link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
	<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
</HEAD>
<BODY>
<table class="maintable">
<tr>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td width="80%" valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td width="150" valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
    <td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"><a href="..\admin_login.php">Log Off</a></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#FFFFFF"><b>Teacher Training Management Information System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
  <form action="../Object/Save_teacher_participate_in_training.php" method="Post">
  <table width="100%">
  <tr>
    <td bgcolor="blue"><a href="../Admin/registration.php?linkid=14" target="_blank">New Teacher</a> &nbsp;&nbsp;&nbsp;<a href="student_search_by_mobileno.php" target="_blank">Teacher Search By Mobile No</a></td>
  <tr>
    <td valign="top">
<input type="text" id="search" placeholder="Search BY Name" />
  <div id="display"></div>
   </td>
    
	<td valign="top" width="30%" align="right">
   <table align="center" bgcolor="#0852FA">
  <tr><td align="right"><b>Teacher Code</b></td>
<td><input type="text" name="txtcode" id="txtcode"></td>

</tr>
<tr><td align="right"><b>Group Number</b></td>
<td><input type="text" name="txtgroup" value="1"></td>

</tr>
<tr>
<td align="right"><b>SMS</b></td>
<td><Select name="optsms">
<option selected>NOSMS</option>
<option>YESSMS</option>
</select></td>
</tr>
<tr>
<td colspan="3" align="center"><input name="btnsave" type="Submit" value="Save" class="button"></td>
</tr>
  </table>
  </form>
  </td>
  </tr>
  </table>
  <?php
  if(isset($_GET['msg']))
  {
    echo $_GET['msg'];
  }
  ?>
</BODY>

</HTML>
