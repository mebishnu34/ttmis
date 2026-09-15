<?php
session_start();
include("../Processing/db_connection.php");
$sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue from tblruntraining where trainingid='".$_SESSION['trainingid']."' ORDER BY trainingname";
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

$output='';
$output .='
<table width="100%" class="dtable">
<tr>
<td colspan=14>
Name of Tranining:-'.$training . ' / Level :-'.$level . ' / Subject :-'.$subject . ' / Start Date:-'.$sdate. ' / End Date:-'. $edate . ' / Venue:-'. $venue .'<td>
</tr>
<tr>
<th>क्र.सं.</th>
<th>शिक्षककाे नाम</th>
<th>तह</th>
<th>बिद्यालयको नाम</th>
<th>बैंकमा भएको खातावालाको नाम</th>
<th>बैंकको नाम</th>
<th>खाता नं.</th>
<th>पान नं.</th>
<th>रकम</th>
</tr>';
$sn=1;
$tname="";
$gender="";
$mobileno="";
$scode="";
$district="";
$mun="";
$sql = "SELECT teacherid,allowance FROM tblttraining where trainingid='".$_SESSION['trainingid']."' and remark<>'Cancel' ORDER BY trainingid";
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
      $output .='
         <tr>
         <td align=center>'. $sn . '</td>';
         $output .='<td>' . $tname . '</td>';
         $output .='<td align=center>' . $level . '</td>';
         $output .='<td align=center>' . $scode . '</td>';
         $output .='<td align=center>' . $acholdername . '</td>';
         $output .='<td align=center>' . $bankname . '</td>';
         $output .='<td align=center>' . $bankac . '</td>';
         $output .='<td align=center>' . $panno . '</td>';   
		   $output .='<td align=center>' . $allowance . '</td>';
             $output .='</tr>';
         $sn++;
    }
}
mysqli_close($conn);
$output .= '</table>';
header("Content-Type: allowance_details/xls");
header("Content-Disposition: attachment; filename=allowance_details.xls");
echo $output;
?>
