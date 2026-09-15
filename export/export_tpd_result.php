<?php
session_start();
include("../Processing/db_connection.php");
$sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue,coordinator,financialyear from tblruntraining where id='$_SESSION[trainingid]'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
   {
    if($row = $result->fetch_assoc())
    {
      $_SESSION['training']=$row["trainingname"];
      $_SESSION['level']=$row["level"];
      $_SESSION['subs']=$row["subject"];
      $_SESSION['sdate']=$row["startdate"];
      $_SESSION['edate']=$row["enddate"];
      $_SESSION['venu']=$row["venue"];
      $_SESSION['facilator']=$row["coordinator"];
      $_SESSION['fyear']=$row["financialyear"];
      
    }
   }
$output='';
$output .='
<table width="100%">
<tr>
<th colspan="2">Financial Year:'.$_SESSION['fyear'].'</th>
<th colspan="2">Name of Training:'.$_SESSION['training'].'</th>
<th>Subject:'.$_SESSION['subs'].'</th>
<th>Level:'.$_SESSION['level'].'</th>
<th>Start Date:'.$_SESSION['sdate'].'</th>
<th>End Date:'.$_SESSION['edate'].'</th>
</tr>
</table>
<table width="150%" bgcolor="#FFFFFF" border="1" cellspacing="0" cellpadding="2" id="datatable">
<tr>
<th align="center">
<font size="+2"><b>टि.पि.डि नतिजा विवरण</b></font>
 <table width="150%" bgcolor="#FFFFFF" border="1" cellspacing="0" cellpadding="2">
<th rowspan="2">सि.नं.</th>
<th rowspan="2">नाम</th>
<th colspan="6">सहभागिता(50)</th>
<th rowspan="2">जम्मा</th>
<th colspan="3">विद्यालयमा आधारित तालिमका क्रियाकलाप(50)</th>
<th rowspan="2">जम्मा</th>
<th rowspan="2">खुद जम्मा</th>
<th rowspan="2">प्राप्त प्रतिशत</th>
<th rowspan="2">नतिजा</th>
<th rowspan="2">श्रेणी</th>

</tr>
<tr>
<th>उपस्थिति(3)</th>
<th>सक्रियता(6)</th>
<th>आचारसंहिताको <br> पालना(3)</th>
<th>तालिमप्रतिको <br> प्रतिबद्धता(3)</th>
<th>लिखित परीक्षा(30)</th>
<th>कार्ययोजना(5)</th>
<th>कार्यसम्पादन(21)</th>
<th>प्रतिवेदन(21)</th>
<th>प्रस्तुतीकरण(8)</th>
</tr>';
$i=1;
$sn=1;
  $regu='';
   $creative='';
   $fol='';
   $com='';
   $written='';
   $planning='';
   $comple='';
   $rep='';
   $pre='';
   $remark='';
   $division='';
   $total='';
   $total1='';
   $gtotal ='';
$sql1 = "SELECT teacherid FROM tblttraining where runid='$_SESSION[trainingid]' ORDER BY teacherid";
$result = $conn->query($sql1);
if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc())
    {
    $teacherid=$row["teacherid"];
      $sql1 = "SELECT tname,tcontact FROM tblteacher where teachercode='$teacherid'";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0)
      {
         if($row1 = $result1->fetch_assoc())
         {
            $output .='
                  <tr>
                  <td align=center>'. $sn . '</td>';
          //echo "<td align=center>";
          //echo $teacherid;
          $sql1 = "SELECT tcode,regularatten, creative,followrules, comitment, written, planning, workcomplete, reporting, present FROM tbltpd where (tcode='$teacherid' OR tcodes='$teacherid') and tsubject='$_SESSION[subs]' and fyear='".$_SESSION['fyear']."'";
         $result1 = $conn->query($sql1);
           if ($result1->num_rows > 0)
           {
             if($mark = $result1->fetch_assoc())
                  {
                     $regu=$mark["regularatten"];
                     $creative=$mark["creative"];
                     $fol=$mark["followrules"];
                     $com=$mark["comitment"];
                     $written=$mark["written"];
                     $planning=$mark["planning"];
                     $comple=$mark["workcomplete"];
                     $rep=$mark["reporting"];
                     $pre=$mark["present"];
                     $total=$regu+$creative+$fol+$com+$written+$planning;
                     $total1=$comple+$rep+$pre;
                     $gtotal=$total+$total1;
                  if($total>=25 && $total1>=25)
                        {
                           $remark='सफल';
                        }
                     else
                        {
                           $remark='असफल';
                        }
                  if($gtotal>=90)
                        {
                           $division='विशिष्टतासहित प्रथम श्रेणी';
                        }
                     else if($gtotal>=80)
                        {
                           $division='प्रथम श्रेणी';
                        }
                     else if($gtotal>=65)
                        {
                           $division='द्धितीय श्रेणी';
                        }
                     else if($gtotal>=50)
                        {
                           $division='तृतीय श्रेणी';
                        }
                     else
                        {
                           $division='असफल';
                        }
                  }
               else
                  {
                     $regu='';
                     $creative='';
                     $fol='';
                     $com='';
                     $written='';
                     $planning='';
                     $comple='';
                     $rep='';
                     $pre='';
                     $total='';
                     $total1='';
                     $gtotal ='';
                  }

           }
            $output .='
          <td>' . $row1["tname"] . '</td>
           <td align=center>'. $regu .'</td>
           <td align=center>'. $creative .'</td>
           <td align=center>'. $fol .'</td>
           <td align=center>'. $com .'</td>
           <td align=center>'. $written .'</td>
           <td align=center>'. $planning .'</td>
           <td align=center bgcolor=#f0f0f0>'. $total. ' </td>
           <td align=center>'. $comple. ' </td>
           <td align=center>'. $rep. ' </td>
           <td align=center>'. $pre. ' </td>
           <td align=center bgcolor=#f0f0f0>'. $total1. ' </td>
           <td align=center bgcolor=#f0f0f0>'. $gtotal. ' </td>
           <td align=center bgcolor=#f0f0f0>'. $gtotal. ' </td>
           <td align=center bgcolor=#f0f0f0>'. $remark. ' </td>
           <td align=center bgcolor=#f0f0f0>'. $division. ' </td>
            </tr>';
            $sn++;
           }
      }
    }
   }
mysqli_close($conn);
$output .= '</table>';
header("Content-Type: tpd_result/xls");
header("Content-Disposition: attachment; filename=tpd_result.xls");
echo $output;
?>
