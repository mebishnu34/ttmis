<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['tid']))
{
 $_SESSION['trainingid']=$_GET['tid'];
}
$training= "";
$level="";
$subject="";
$sdate="";
$edate="";
$venue="";
$sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue from tblruntraining where id='$_SESSION[trainingid]' and remark='Completed' ORDER BY trainingname";
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
 <TITLE>TTMIS</TITLE></TITLE>
  <link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY>
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="150" height="100"></td>
<td bgcolor="#FFFFFF" align="left" class="tdradius"><center><img src="..\Image\banner.jpg" width="800" height="150"></center></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"><a href="..\Admin\report.php">Back</a></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<table width="100%" class="dtable">
<tr>
<td colspan="7">Name of Training:-<?php echo $training;?> Level:-<?php echo $level;?> Subject:-<?php echo $subject;?> Start Date:-<?php echo $sdate;?> End Date:-<?php echo $edate;?> Venue:-<?php echo $venue;?></td>
</tr>
<tr>
<th>S.No</th>
<th>Name of Teacher</th>
<th>Gender</th>
<th>Address</th>
<th>Contact</th>
<th>School Code</th>
<th>Municipality/Rural</th>
<th><a href=all_certificate_display.php?trainingid=<?php echo $_SESSION['trainingid']; ?> target=blank>Print All</a></th>
</tr>
<?php
$sn=1;
//echo $_SESSION['trainingid'];
$sql1 = "SELECT * FROM tblttraining where trainingid='$_SESSION[trainingid]'";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
         $teacherid=$row["teacherid"];
         $sql1 = "SELECT * FROM tblteacher where teachercode='$teacherid'";
          $result1 = $conn->query($sql1);
          if ($result1->num_rows > 0)
          {
         if($row1 = $result1->fetch_assoc())
          {
          $tname=$row1["tname"];
          $gender=$row1["gender"];
          $address=$row1["address"];
          $contact=$row1["tcontact"];
          $scode=$row1["schoolcode"];
          $mun=$row1["munvdc"];
            }
          }
         echo "<tr>";
         echo "<td align=center>". $sn . "</td>";
         echo "<td align=center>" . $tname . "</td>";
         echo "<td align=center>" . $gender . "</td>";
         echo "<td align=center>" . $address . "</td>";
         echo "<td align=center>" . $contact . "</td>";
         echo "<td align=center>" . $scode . "</td>";
         echo "<td align=center>" . $mun . "</td>";
         echo "<td align=center bgcolor=blue><a href=certificate_display.php?tid=". $teacherid. " target=blank>Certificate</a></td>";
         echo "</tr>";
         $sn++;
    }
}

?>
</table>
</BODY>
</HTML>
