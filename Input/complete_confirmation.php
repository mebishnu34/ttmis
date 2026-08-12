<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['tid']))
{
 $_SESSION['trainingid']=$_GET['tid'];
}
$sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue from tblruntraining where id='$_SESSION[trainingid]' and remark='Running' ORDER BY trainingname";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    if($row = $result->fetch_assoc())
    {
    		    $training= $row["trainingname"];
                 $level=$row["level"];
                 $subject=$row["subject"];
                 $sdate= $row["startdate"];
                 $edate= $row["enddate"];
                 $venue=$row["venue"];
                 }
     }
?>
<HTML>
<HEAD>
<TITLE>New Document</TITLE>
  <link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY>
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="../Image/logo.svg" width="200" height="180"></td>
<td align="left" bgcolor="#FFFFFF" class="tdradius"><center><img src="../Image/banner.jpg" width="90%" height="180"></center></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><a href="../Admin/entry.php">Back</a></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<br />
<br />
<form method="POST" ACTION="..\Object\complete_training.php">
<center>
Name of Training:-<?php echo $training;?><br />
Level:-<?php echo $level;?><br />
Subject:-<?php echo $subject;?><br />
Start Date:-<?php echo $sdate;?><br />
End Date:-<?php echo $edate;?><br />
Venue:-<?php echo $venue;?>
</center>
<center>Are You Confirm To Complete Training?</center> <br>
<center><input type="Submit" value="Yes" class="button"></center>
</form>
</BODY>
</HTML>
