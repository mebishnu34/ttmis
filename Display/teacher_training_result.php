<?php
session_start();
include("../Processing/db_connection.php");
if(isset($_GET['tid']))
{
 $_SESSION['trainingid']=$_GET['tid'];

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
}
?>
<HTML>
<HEAD>
 <TITLE>TTMIS:TPD Result</TITLE>
 <link rel="stylesheet" href="../CSS/main_table.css">
    <link rel="stylesheet" href="../CSS/sidemenu.css">
</HEAD>
<BODY>

<table class="maintable">
<tr>
<td align="center" bgcolor="#FFFFFF" class="tdradius"><img src="..\Image\logo.svg" width="200" height="180"></td>
<td align="left" bgcolor="#FFFFFF" class="tdradius"><center><img src="..\Image\banner.jpg" width="90%" height="180"></center></td>
</tr>
<tr>
<td bgcolor="#0852FA" align="Right"></td>
<td bgcolor="#0852FA"><font color="#FFFFFF" size="2"><div align="right"><?php echo $_SESSION['uname'];?></div></font></td>
</tr>
</table>
<form method="post" action="../export/export_tpd_result.php">
<table width="100%">
<tr>
<th colspan="2">Financial Year:<?php echo $_SESSION['fyear'];?></th>
<th colspan="2">Name of Training:<?php echo $_SESSION['training'];?></th>
<th>Subject:<?php echo $_SESSION['subs'];?></th>
<th>Level:<?php echo $_SESSION['level'];?></th>
<th>Start Date:<?php echo $_SESSION['sdate'];?></th>
<th>End Date:<?php echo $_SESSION['edate'];?></th>
</tr>
</table>
<table width="120%" border="1" cellspacing="0" cellpadding="0">
<tr>
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
</tr>
<?php
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
          echo "<tr>";
          echo "<td align=center>". $sn . "</td>";
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

          echo "<td>";
          echo $row1["tname"];
          ?>
           </td>
          <?php
           echo "<td align=center>". $regu ."</td>";
           echo "<td align=center>". $creative. "</td>";
           echo "<td align=center>". $fol. " </td>";
           echo "<td align=center>". $com . " </td>";
           echo "<td align=center>". $written. " </td>";
           echo "<td align=center>". $planning. " </td>";
           echo "<td align=center bgcolor='#f0f0f0'>". $total. " </td>";
           echo "<td align=center>". $comple. " </td>";
           echo "<td align=center>". $rep. " </td>";
           echo "<td align=center>". $pre. " </td>";
           echo "<td align=center bgcolor='#f0f0f0'>". $total1. " </td>";
           echo "<td align=center bgcolor='#f0f0f0'>". $gtotal. " </td>";
           echo "<td align=center bgcolor='#f0f0f0'>". $gtotal. " </td>";
           echo "<td align=center bgcolor='#f0f0f0'>". $remark. " </td>";
           echo "<td align=center bgcolor='#f0f0f0'>". $division. " </td>";
            echo "</tr>";
            $sn++;
           }
      }
    }
   }
echo "</table>";
?>
<div><center><input type="submit" value="Export In Excel" name="teacherdistrict"></center></div>
</form>
</BODY>
</HTML>
