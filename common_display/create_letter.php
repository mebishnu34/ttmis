<?php
session_start();
   include("../Processing/db_connection.php");
   if(isset($_GET['tid']))
    {
     $mn=$_GET['tid'];
     $munid=$_SESSION['tid'];
     $sqlm="SELECT * from tbldistrict where ID='$munid'";
    $resultm = $conn->query($sqlm);
    if ($resultm->num_rows > 0)
    {
        if($rowm = $resultm->fetch_assoc())
        {
        $munvdc=$rowm["munvdc"];
        $district=$rowm["districtname"];
        }
    }
    } 
$sqlm="SELECT runtrainingid, ondate,coordinator,pnumber,starttime from tbltraininginfo where msgnumber='$mn' and munid='$munid'";
$resultm = $conn->query($sqlm);
echo "<OL>";
if ($resultm->num_rows > 0)
   {
    $i=0;
    while($rowm = $resultm->fetch_assoc())
    {
        $trainingid=$rowm["runtrainingid"];
        $number[$i]=$rowm["pnumber"];
        $ldate=$rowm["ondate"];
        $coordinator=$rowm["coordinator"];
        $time=$rowm["starttime"];
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
        $i++;
      }
   }
  ?>
<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
</HEAD>
<BODY>
<div align="center">
<table width="90%" style="background-color: #FFFFFF;">
<tr>
<td colspan="3" align="center"><font face="Kantipur" size="3">k|b]z ;/sf/ </font></td>
</tr>
<tr>
<td align="center" width="10%"><img src="..\Image\logo.svg" width="150" height="100"></td>
<td align="center" width="80%"><font face="Kantipur" size="5">;fdflhs ljsf; dGqfno </font><br>
<font face="Kantipur" size="10">lzIff tflnd s]Gb|</font><br>
<font face="Kantipur" size="5">w'lnv]n sfe|[knf~rf]s</font><br><font face="Kantipur" size="5"> k|b]z g+= #</font>
</td>
 <td align="center" width="10%">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="Left" colspan="3"><font face="Kantipur" size="4">r=g+=</font><?php echo $mn;?></td>
</tr>
<tr>
<td align="Right" colspan="3"><font face="Kantipur" size="4">ldlt</font><?php echo $ldate;?></td>
</tr>
<tr>
<td align="Center" colspan="3"><font face="Kantipur" size="4">ljifoM tflnddf ;xeflu k7fpg] ;DaGwdf .</td>
</tr>
<tr>
<td align="Left" colspan="3"><font face="Kantipur" size="4">>L </font><?php echo $munvdc;?></td>
</tr>
<tr>
<td align="Left" colspan="3"><font face="Kantipur" size="4"></font><?php echo $district;?></td>
</tr>

   <tr>
<td align="center" colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="center" colspan="3"><p align="Justify"><font face="Kantipur" size="4">
k|:t't ljifodf o; tflnd s]Gb|sf] cfof]hgfdf ;~rfng x'g] tkl;n adf]lhdsf] tflnddf lgDg cg';f/sf] ;xefuL 5gf}6 u/L k7fO lbg' x'g cg'/f]w 5 .</font> 
 </td>
 </tr>
 <tr>
<td align="Center" colspan="3"><font face="Kantipur" size="4">tk;ln</td>
</tr>
<tr>
  <td colspan="3">
  <table width="100%" border="1">
  <tr>
 <th><font face="Kantipur" size="4">qm=;+=</font></th>
  <th><font face="Kantipur" size="4">tx</font></th>
  <th><font face="Kantipur" size="4">ljifo</font></th>
  <th><font face="Kantipur" size="4">;+Vof</font></th>
  <th><font face="Kantipur" size="4">b]lv</font></th>
  <th><font face="Kantipur" size="4">;Dd</font></th>
  <th><font face="Kantipur" size="4">tflnd ;~rfng x'g] :yfg</font></th>
  <th><font face="Kantipur" size="4">;do</font></th>
  <th><font face="Kantipur" size="4">tflndsf] k|sf/</font></th>
 </tr>
 <?php
 for($d=0;$d<$i;$d++)
 {
 echo "<tr>";
 echo "<td align=center>". ($d + 1) ."</td>";
 echo "<td align=center>". $level[$d] ."</td>";
 echo "<td align=center>". $subject[$d] ."</td>";
 echo "<td align=center>". $number[$d] ."</td>";
 echo "<td align=center>". $sdate[$d] ."</td>";
 echo "<td align=center>". $edate[$d] ."</td>";
 echo "<td align=center>". $venue[$d] ."</td>";
 echo "<td align=center>".$time[$d]."</td>";
 echo "<td align=center>". $training[$d] ."</td>";
 echo "</tr>";
}
 ?>
 </table>
 </td>
 </tr>
 <tr>
<td align="Center" colspan="3"><font face="Kantipur" size="4">&nbsp;</td>
</tr>
<tr>
<td align="Center" colspan="3"><font face="Kantipur" size="4">&nbsp;</td>
</tr>
<tr>
<td align="Center" colspan="3"><font face="Kantipur" size="4">&nbsp;</td>
</tr>
<tr>
<td align="Center" colspan="3"><font face="Kantipur" size="4">&nbsp;</td>
</tr>
<tr>
<td align="Center" colspan="3"><font face="Kantipur" size="4">&nbsp;</td>
</tr>
  <tr>
  <td colspan="3">
  <table width="100%" border="0">
  <tr>
 <td align="center" width="25%"><font face="Kantipur" size="5">tf]ofgfy vgfn</font></td>
  <td align="center"><font face="Kantipur" size="5">&nbsp;</font></td>
   <td align="center" width="30%"><font face="Arial" size="5"><?php echo $coordinator;?></font></td>
 </tr>
 <tr>
 <td align="center"><font face="Kantipur" size="5">tflnd k|d'v</font></td>
  <td align="center"><font face="Kantipur" size="5"></font></td>
   <td align="center"><font face="Kantipur" size="5">;xhstf{</font></td>
 </tr>
 </table>
 </td>
 </tr>
</table>
</div>


</BODY>
</HTML>



    
