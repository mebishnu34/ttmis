<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['tid']))
{
 $id=$_GET['tid'];
 $_SESSION['trainingid']=$id;

$sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue from tblruntraining where trainingid='$id' ORDER BY trainingname";
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
 <TITLE>TTMIS</TITLE>
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
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<table width="100%" class="dtable">
<tr>
<td colspan="6">
<?php
echo "Name of Tranining:-".$training . " / Level :-".$level . " / Subject :-".$subject . " / Start Date:-".$sdate. " / End Date:-". $edate . " / Venue:-". $venue;
?>
</td>

</tr>
<tr>
<th>S.No</th>
<th>Name of Teacher</th>
<th>Gender</th>
<th>Mobile No</th>
<th>District</th>
<th>Mun/VVDC</th>
<th>Name of School</th>
<th>Co-Ordinator</th>
<th>G. N</th>
<th></th>
</tr>
<?php
$sn=1;
$tname="";
$gender="";
$mobileno="";
$scode="";
$district="";
$mun="";
$sql = "SELECT * FROM tblttraining where trainingid='$id' and remark<>'Cancel' ORDER BY trainingid";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
         $teacherid=$row["teacherid"];
         $sql1 = "SELECT * FROM tblteacher where teachercode='$teacherid'";
          $result1 = $conn->query($sql1);
          if ($result1->num_rows > 0)
          {
         while($row1 = $result1->fetch_assoc())
          {
          $tname=$row1["tname"];
          $gender=$row1["gender"];
          $mobileno=$row1["tcontact"];
		  $district=$row1["district"];
		  $mun=$row1["munvdc"];
          $scode=$row1["schoolname"];
          }
          }
         echo "<tr>";
         echo "<td align=center>". $sn . "</td>";
         echo "<td align=center>" . $tname . "</td>";
         echo "<td align=center>" . $gender . "</td>";
         echo "<td align=center>" . $mobileno . "</td>";
		          echo "<td align=center>" . $district . "</td>";
				  echo "<td align=center>" . $mun . "</td>";
         echo "<td align=center>" . $scode . "</td>";
          echo "<td align=center>" . $row["coordinator"] . "</td>";
           echo "<td align=center>" . $row["gnumber"] . "</td>";
		   echo "<td align=center><a href=../Input/remove_teacher_fromtraining.php?tid=$teacherid target=_blank>Remove</a></td>";
          echo "</tr>";
         $sn++;
    }
}
}
?>
</table>

</BODY>
</HTML>
