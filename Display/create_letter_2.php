<?php
session_start();
   include("../Processing/db_connection.php");
   if(isset($_GET['tid']))
    {
     $mn=$_GET['tid'];
    } 
$tname[0]="";
$schoolname[0]="";
$address[0]="";
$level[0]="";
$subject[0]="";
$sdate[0]="";
$edate[0]="";
$venue[0]="";
$training[0]="";
$sqlm="SELECT teacherid, schoolcode, trainingid, ldate, pnumber, munvdc from tblmuncipalityinfo where msgnumber='$mn'";
$resultm = $conn->query($sqlm);
echo "<OL>";
if ($resultm->num_rows > 0)
   {
    $i=0;
    while($rowm = $resultm->fetch_assoc())
    {
        $trainingid=$rowm["trainingid"];
        $number[$i]=$rowm["pnumber"];
        $ldate=$rowm["ldate"];
        $teacherid=$rowm["teacherid"];
        $scode=$rowm["schoolcode"];
        $munvdc=$rowm["munvdc"];
        $sql = "SELECT id, trainingname, level, subject, startdate, enddate,venue from tblruntraining where id='$trainingid'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
         if($row = $result->fetch_assoc())
            {
    		     $training[$i]=$row["trainingname"];
                 $level[$i]= $row["level"];
                 $subject[$i]= $row["subject"];
                 $sdate[$i]= $row["startdate"];
                 $edate[$i]=$row["enddate"];
                 $venue[$i]=$row["venue"];
                 
            }
         }
         $sqlteacher = "SELECT tname from tblteacher where teacherid='$teacherid'";
        $teacher = $conn->query($sqlteacher);
        if ($teacher->num_rows > 0)
        {
         if($rowteacher = $teacher->fetch_assoc())
            {
    		     $tname[$i]=$rowteacher["tname"];
                                 
            }
         }
        
        $sqlschool = "SELECT schoolname, address from tblschool where schoolcode='$scode'";
        $school = $conn->query($sqlschool);
        if ($school->num_rows > 0)
        {
         if($rowschool = $school->fetch_assoc())
            {
    		     $schoolname[$i]=$rowschool["schoolname"];
                 $address[$i]=$rowschool["address"];
                                 
            }
        }
        $i++;
      }
   }
  ?>
<HTML>
<HEAD>
 <TITLE>TTMIS Bagamati</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></HEAD>
<BODY>
<div align="center">
<table width="90%" style="background-color: #FFFFFF;">

<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="Right" colspan="3"><font  size="5">मितिः </font><font size="5"> <?php echo $ldate;?></font></td>
</tr>

<tr>
<td align="Left" colspan="3"><font size="5">श्री तालिम प्रमुख्र ज्यू</font></td>
</tr>
<tr>
<td align="Left" colspan="3"><font size="5">शिक्षा तालिम केन्द्र</font></td>
</tr>
<tr>
<td align="Left" colspan="3"><font size="5">धुलिखेल, काभ्रेपलाञ्चोक</td>
</tr>

<tr>
<td align="Center" colspan="3"><font size="5">विषयः सहभागि छनोटगरि पठाएको बारे ।</td>
</tr>

   <tr>
<td align="center" colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="center" colspan="3"><p align="Justify"><font size="5">
प्रस्तुत विषयमा त्यस तालिम केन्द्रको आयोजनामा सञ्चालन हुने तालिममा निम्न अनुसारको सहभागि छनौट गरी पठाइएको व्यहोरा अनुरोध छ ।</font> 
 </td>
 </tr>
 <tr>
<td align="Center" colspan="3"><font size="5">तपसिल</td>
</tr>
<tr>
  <td colspan="3">
  <table width="100%" border="1">
  <tr>
 <th><font size="5">क्र.सं.</font></th>
  <th><font size="5">सहभागि शिक्षकको नाम</font></th>
  <th><font size="5">विद्यालयको नाम र ठेगाना</font></th>
  <th><font size="5">तह</font></th>
  <th><font size="5">विषय</font></th>
  <th><font size="5">देखि</font></th>
  <th><font size="5">सम्म</font></th>
  <th><font size="5">तालिम सञ्चालन हुने स्थान</font></th>
  <th><font size="5">तालिमको प्रकार</font></th>
 </tr>
 <?php
 
 for($d=0;$d<$i;$d++)
 {
 echo "<tr>";
 echo "<td align=center><font size=5>". ($d + 1) ."</font></td>";
 echo "<td align=left><font size=5>". $tname[$d] ."</font></td>";
 echo "<td align=center><font size=5>". $schoolname[$d] . "/". $address[$d]."</font></td>";
 echo "<td align=center><font size=5>". $level[$d] ."</font></td>";
 echo "<td align=center><font size=5>". $subject[$d] ."</font></td>";
 echo "<td align=center><font size=5>". $sdate[$d] ."</font></td>";
 echo "<td align=center><font size=5>". $edate[$d] ."</font></td>";
 echo "<td align=center><font size=5>".$venue[$d]."</font></td>";
 echo "<td align=center><font size=5>". $training[$d] ."</font></td>";
 echo "</tr>";
}
 ?>
 </table>
 </td>
 </tr>
 <tr>
<td align="Center" colspan="3"><font face="Kantipur" size="6">&nbsp;</td>
</tr>
<tr>
<td align="Center" colspan="3"><font face="Kantipur" size="6">&nbsp;</td>
</tr>
<tr>
<td align="Center" colspan="3"><font face="Kantipur" size="6">&nbsp;</td>
</tr>
<tr>
<td align="Center" colspan="3"><font face="Kantipur" size="6">&nbsp;</td>
</tr>
<tr>
<td align="Center" colspan="3"><font face="Kantipur" size="6">&nbsp;</td>
</tr>
  <tr>
  <td colspan="3">
  <table width="100%" border="0">
  <tr>
 <td align="center" width="25%"><font face="Kantipur" size="6"></font></td>
  <td align="center"><font face="Kantipur" size="5">&nbsp;</font></td>
   <td align="center" width="30%"><font face="Arial" size="5"><?php echo $munvdc;?></font></td>
 </tr>
 <tr>
 <td align="center"><font face="Kantipur" size="6"></font></td>
  <td align="center"><font face="Kantipur" size="5"></font></td>
   <td align="center"><font size="5">शिक्षा शाखा</font></td>
 </tr>
 </table>
 </td>
 </tr>
</table>
</div>


</BODY>
</HTML>



    
