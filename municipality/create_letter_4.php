<?php
session_start();
   include("../Processing/db_connection.php");
   if(isset($_GET['tid']))
    {
     $mn=$_GET['tid'];
    } 
$sqlm="SELECT teacherid, schoolcode, trainingid, ldate from tbltrainingrequest where schoolcode='$mn'";
$resultm = $conn->query($sqlm);
echo "<OL>";
if ($resultm->num_rows > 0)
   {
    $i=0;
    while($rowm = $resultm->fetch_assoc())
    {
        $trainingid=$rowm["trainingid"];
        //$number[$i]=$rowm["pnumber"];
        $ldate=$rowm["ldate"];
        $teacherid=$rowm["teacherid"];
        $scode=$rowm["schoolcode"];
        //$munvdc=$rowm["munvdc"];
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
        
        $sqlschool = "SELECT schoolname, address, munvdc, district, authorizeperson from tblschool where schoolcode='$scode'";
        $school = $conn->query($sqlschool);
        if ($school->num_rows > 0)
        {
         if($rowschool = $school->fetch_assoc())
            {
    		     $schoolname=$rowschool["schoolname"];
                 $address=$rowschool["address"];
                 $munvdc=$rowschool["munvdc"];
                 $district=$rowschool["district"];
				 $head=$rowschool["authorizeperson"];
                                 
            }
        }
        $i++;
      }
   }
  ?>
<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></HEAD>
<BODY>
<div align="center" style="border:solid 4px black;">
<table width="90%" style="background-color: #FFFFFF;">
<tr>
<td align="center" width="10%"><img src="..\Image\logo.jpg" width="150" height="150"></td>
<td align="center" width="80%"><font size="6"><?php echo $schoolname;?></font><br>
<font  size="4"><?php echo $munvdc . ",". $district;?></font>
</td>
 <td align="center" width="10%">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="Left" colspan="3"><font size="3">इ‍.च.नं.</font><font size="3"> <?php echo $mn;?></font></td>
</tr>
<tr>
<td align="Right" colspan="3"><font  size="3">मितिः </font><font size="3"> <?php echo $ldate;?></font></td>
</tr>

<tr>
<td align="Left" colspan="3"><font size="3">श्री शिक्षा विभाग प्रमुख ज्यू</font></td>
</tr>
<tr>
<td align="Left" colspan="3"><font face="Arial" size="3"><?php echo $munvdc;?></font></td>
</tr>
<tr>
<td align="Left" colspan="3"><font face="Arial" size="3"><?php echo $district;?></td>
</tr>

<tr>
<td align="Center" colspan="3"><font size="3">विषयः सहभागि छनोटगरि पठाएको बारे ।</td>
</tr>

   <tr>
<td align="center" colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="center" colspan="3"><p align="Justify"><font size="3">
प्रस्तुत विषयमा तपसिल बमोजिमको तालिममा निम्न अनुसारको सहभागि छनौट गरी पठाइएको व्यहोरा अनुरोध छ ।</font> 
 </td>
 </tr>
 <tr>
<td align="Center" colspan="3"><font size="0">&nbsp;</td>
</tr>
 <tr>
<td align="Center" colspan="3"><font size="5">तपसिल</td>
</tr>
<tr>
  <td colspan="3">
  <table width="100%" border="1" cellspacing="0" cellpadding="5">
  <tr>
 <th><font size="3">क्र.सं.</font></th>
  <th><font size="3">सहभागि शिक्षकको नाम</font></th>
  <th><font size="3">तह</font></th>
  <th><font size="3">विषय</font></th>
  <th><font size="3">देखि</font></th>
  <th><font size="3">सम्म</font></th>
  <th><font size="3">तालिम सञ्चालन हुने स्थान</font></th>
  <th><font size="3">तालिमको प्रकार</font></th>
 </tr>
 <?php
 for($d=0;$d<$i;$d++)
 {
 echo "<tr>";
 echo "<td align=center><font size=3>". ($d + 1) ."</font></td>";
 echo "<td align=left><font size=3>". $tname[$d] ."</font></td>";
 echo "<td align=center><font size=3>". $level[$d] ."</font></td>";
 echo "<td align=center><font size=3>". $subject[$d] ."</font></td>";
 echo "<td align=center><font size=3>". $sdate[$d] ."</font></td>";
 echo "<td align=center><font size=3>". $edate[$d] ."</font></td>";
 echo "<td align=center><font size=3>".$venue[$d]."</font></td>";
 echo "<td align=center><font size=3>". $training[$d] ."</font></td>";
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
 <td align="center" width="25%"><font face="Kantipur" size="5"></font></td>
  <td align="center"><font face="Kantipur" size="5">&nbsp;</font></td>
   <td align="center" width="30%"><font face="Arial" size="3"><?php echo $head;?></font></td>
 </tr>
 <tr>
 <td align="center"><font face="Kantipur" size="5"></font></td>
  <td align="center"><font face="Kantipur" size="5"></font></td>
   <td align="center" width="60%"><font face="Arial" size="3">विद्यालय प्रमुख</font></td>
 </tr>
 </table>
 </td>
 </tr>
</table>
</div>


</BODY>
</HTML>



    
