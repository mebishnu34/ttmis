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
    <td bgcolor="#0000FF" align="Right"></font></td>
<td valign="buttom" align="center" bgcolor="#0000FF"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1" color="#FFFFFF"><b>Teacher Training Management System(TTMIS)</b></font></td>
<td bgcolor="#0000FF"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
 <?php
  include("../Processing/db_connection.php");
 ?>

<br />
<table align="Left" bgcolor="blue" cellspacing="10">
<?php
if(isset($_GET['id']))
{
$tid=$_GET['id'];
$_SESSION['trainingid']=$tid;
$training="";
$level="";
$subject="";
$sdate="";
$edate="";
$sql = "SELECT id,trainingid, trainingname, level, subject, startdate, enddate,venue from tblruntraining where remark='Running' and id='$tid'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
   if($row = $result->fetch_assoc())
      {
	  $training=$row["trainingname"];
	  $level=$row["level"];
	  $subject=$row["subject"];
	  $sdate=$row["startdate"];
	  $edate=$row["enddate"];
	  
      }
 	}
?>
<div>
<?php echo $training . " / " . $level . " / " . $subject . "(" . $sdate . " To " . $edate . ")"; ?>
</div>
<?php
$sqlm="SELECT DISTINCT munvdc,msgnumber,ondate,munvdc from tblmuncipalityinfo where trainingid='$tid' and remark='Request' ORDER By ondate DESC";
$resultm = $conn->query($sqlm);
echo "<UL>";
if ($resultm->num_rows > 0)
   {
    while($rowm = $resultm->fetch_assoc())
    {
      echo "<tr><td>";
      echo "<Li><a href=../Display/training_letter_from_lgov.php?mid=$rowm[msgnumber] target=_blank>"."<b>Download Letter On ".$rowm["ondate"]." / -".$rowm["munvdc"]."</b></a></</Li>";
      echo "</td></tr>";
    }
   }
     echo "</UL>";
}
?>
</table>
    
