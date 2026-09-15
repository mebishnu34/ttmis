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
<form method="Post" Action="../Object/save_training_allowance.php">
<table width="100%" class="dtable">
<tr>
<td colspan="14">
<?php
echo "Name of Tranining:-".$training . " / Level :-".$level . " / Subject :-".$subject . " / Start Date:-".$sdate. " / End Date:-". $edate . " / Venue:-". $venue;
?>
</td>

</tr>
<tr>
<th>क्र.सं.</th>
<th>शिक्षककाे नाम</th>
<th>लिङ्ग</th>
<th>मोबाइल नं.</th>
<th>तह</th>
<th width="250">बिद्यालयको नाम</th>
<th>जिल्ला</th>
<th>गा.वि.स./न.पा.</th>
<th>रकम</th>

</tr>
<?php
$sn=1;
$tname="";
$gender="";
$mobileno="";
$scode="";
$district="";
$mun="";
$sql = "SELECT ID,teacherid,allowance FROM tblttraining where trainingid='$id' and remark<>'Cancel' ORDER BY trainingid";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
         $tid=$row["ID"];
         $teacherid=$row["teacherid"];
         $allowance=$row["allowance"];
         $sql1 = "SELECT tname, gender, mobileno, citizenshipno, schoolname,bankname,bankacno,acholdername, panno, appointdate,appointmonth,appointday,appointsubject,appointletter,citizenship,schoolrecommend,trainingcategory,trainingsubject,appointlocallevel,schooldistrict, schoollocallevel,priority1model FROM tblapplication where appid='$teacherid' and financialyear='".$_SESSION['appyear']."'";
          $result1 = $conn->query($sql1);
          if ($result1->num_rows > 0)
          {
         while($row1 = $result1->fetch_assoc())
          {
          $tname=$row1["tname"];
          $gender=$row1["gender"];
          $mobileno=$row1["mobileno"];
          $level=$row1["appointlocallevel"];
		  $district=$row1["schooldistrict"];
		  $mun=$row1["schoollocallevel"];
          $scode=$row1["schoolname"];
          $bankname=$row1["bankname"];
          $bankac=$row1["bankacno"];
          $acholdername=$row1["acholdername"];
          $panno=$row1["panno"];
          }
          }
         echo "<tr>";
         echo "<td align=center>". $sn . "</td>";
         echo "<td align=center>" . $tname . "</td>";
         echo "<td align=center>" . $gender . "</td>";
         echo "<td align=center>" . $mobileno . "</td>";
         echo "<td align=center>" . $level . "</td>";
         echo "<td align=center>" . $scode . "</td>";
         echo "<td align=center>" . $district . "</td>";
		 echo "<td align=center>" . $mun . "</td>";
         echo "<td align=center><input type=hidden size=3 name=txtid[] value=". $tid. "><input type=text size=3 name=txtallowance[] value=". $allowance. " ></td>";
        
             echo "</tr>";
         $sn++;
    }
}
}
?>
</table>
<center><input type="Submit" value="Save" class="button"> </center>
</form>
</BODY>
</HTML>
