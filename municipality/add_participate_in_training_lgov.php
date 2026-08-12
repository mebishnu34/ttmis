<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['id']))
{
 $_SESSION['trunid']=$_GET['id'];
}
$sql = "SELECT trainingid,trainingname, level, subject, startdate, enddate,venue from tblruntraining where id='$_SESSION[trunid]'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    if($row = $result->fetch_assoc())
    {
	$_SESSION['trainingid']= $row["trainingid"];
	$training= $row["trainingname"];
    $level= $row["level"];
	$subject=$row["subject"];
    $sdate=$row["startdate"];
    $edate=$row["enddate"];
     $venu=$row["venue"];
	}
	}

$count=0;
?>
<HTML>
<HEAD>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <!-- Including our scripting file. -->
   <script type="text/javascript" src="../script/lgovn_name_search.js"></script>
   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
 <TITLE>TTMIS</TITLE>
 <link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
	<link rel="stylesheet" type="text/css" href="../CSS/table_css.css">
</HEAD>
<BODY>
<table class="maintable">
<tr>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image\logo.jpg" width="150" height="130"></td>
<td  valign="top" bgcolor="#FFFFFF"><img src="..\Image\banner.jpg" height="130"></td>
<td valign="buttom" align="center" bgcolor="#FFFFFF"><img src="..\Image/np_flag.gif" width="150" height="130"></td>
</tr>
<tr>
    <td bgcolor="#0000FF" align="Right"><font color="#FFFFFF"></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<div>
Name of Training:<?php echo $training;?> Level:<?php echo $level;?> Subject:<?php echo $subject;?> Start Date:<?php echo $sdate;?> End Date:<?php echo $edate;?> Venu:<?php echo $venu;?>
</div>
  <form action="../Object/Save_teacher_munparticipate_in_training.php" method="Post">
  <table width="100%">
  <tr>
    <td valign="top">
<input type="text" id="search" placeholder="Search" />
  <div id="display"></div>
    </td>
	<td valign="top" width="30%" align="right">
   <table align="center" bgcolor="#0852FA">
  <tr><td align="right"><b>Teacher Code</b></td>
<td><input type="text" name="txtcode" id="txtcode"><?php echo $count;?></td>

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
</BODY>

</HTML>
