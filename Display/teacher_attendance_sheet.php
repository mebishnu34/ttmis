<?php
session_start();
include("../print_function.php");
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
    <style>
        .big_button {
            font-size: 20px;
            padding: 10px 20px;
            width: 100px;
            height: 42px;
        }
        </style>
</HEAD>
<BODY>
<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="150" height="100"></td>
<td bgcolor="#FFFFFF" align="left" class="tdradius"><center><img src="..\Image\banner.jpg" width="100%" height="150"></center></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"><font color="#FFFFFF"></font></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<form method="post" action="../export/export_attendance_sheet.php">
<div id="pdata">
    <center><h1>सहभागी हाजिरी विवरण</h1></center>
<table width="100%" class="dtable" border="1">
<tr>
<td colspan="8" align="center">
<?php
echo "Name of Tranining:-".$training . " / Level :-".$level . " / Subject :-".$subject . " / Start Date:-".$sdate. " / End Date:-". $edate . " / Venue:-". $venue;
?>
</td>

</tr>
<tr>
<th>क्र.सं.</th>
<th>शिक्षककाे नाम</th>
<th>तह</th>
<th>बिद्यालयको नाम</th>
<th>पहिलो सेसन</th>
<th>दास्रो सेसन</th>
<th>तेस्रो सेसन</th>
<th>प्रमाणित गर्ने</th>
</tr>
<?php
$sn=1;
$tname="";
$gender="";
$mobileno="";
$scode="";
$district="";
$mun="";
$sql = "SELECT teacherid,allowance FROM tblttraining where trainingid='$id' and remark<>'Cancel' ORDER BY trainingid";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
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
         echo "<td align=center>" . $level . "</td>";
         echo "<td align=center>" . $scode . "</td>";
         echo "<td align=center></td>";
         echo "<td align=center></td>";
         echo "<td align=center></td>";
         echo "<td align=center></td>";
          echo "</tr>";
         $sn++;
    }
}
}
?>
</table>
</div>
<div><center><input type="submit" value="Export In Excel" name="teacherdistrict">&nbsp;&nbsp;&nbsp;<input type="Button" name="btnprint" value="Print" class="big_button" onClick="javascript:CallPrint('pdata');"></center></center></div>
</form>

</BODY>
</HTML>
